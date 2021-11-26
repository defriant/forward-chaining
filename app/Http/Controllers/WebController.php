<?php

namespace App\Http\Controllers;

use App\Models\Goal;
use App\Models\Rule;
use App\Models\Hasil;
use App\Models\Premis;
use App\Models\Analisa;
use Illuminate\Http\Request;

class WebController extends Controller
{
    public function analisa(Request $request)
    {
        $cek = Analisa::where('id', @$request->id)->first();
        if ($cek) {
            Analisa::where('id', $request->id)->update([
                'hasil_akhir' => null
            ]);
            Hasil::where('id_analisa', $request->id)->delete();
            $id = $request->id;
            $pertanyaan = Premis::where('id', 'P1')->first();
            $no = 1;
            return view('user.pertanyaan', compact('id', 'pertanyaan', 'no'));
        } else {
            $id = time();
            Analisa::create([
                'id' => $id,
                'nama' => $request->nama,
                'email' => $request->email
            ]);

            $pertanyaan = Premis::where('id', 'P1')->first();
            $no = 1;
            return view('user.pertanyaan', compact('id', 'pertanyaan', 'no'));
        }
    }

    public function process(Request $request)
    {
        $cek = Hasil::where('id_analisa', $request->idAnalisa)->where('id_premis', $request->premis)->first();
        if (!$cek) {
            $pertanyaan = Premis::find($request->premis)->pertanyaan;
            Hasil::create([
                'id_analisa' => $request->idAnalisa,
                'id_premis' => $request->premis,
                'pertanyaan' => $pertanyaan,
                'jawaban' => $request->jawaban
            ]);
        }

        $subGoal = Goal::all();
        $hasil = Hasil::where('id_analisa', $request->idAnalisa)->where('jawaban', 1)->get();
        $goal = [];
        foreach ($subGoal as $g) {
            foreach ($g->rule as $gRule) {
                $goal[$g->id][] = $gRule->id_premis;
            }
        }

        $subHasil = [];
        foreach ($hasil as $h) {
            $subHasil[] = $h->id_premis;
        }

        $queue = [];
        $skipped = [];
        for ($i = 0; $i < count($subHasil); $i++) {
            foreach ($goal as $gKey => $gVal) {
                if (array_search($gKey, $skipped) !== false) {
                    // Skipp goal
                } else {
                    if (@$gVal[$i] == $subHasil[$i]) {
                        // Add to queue
                        if (array_search($gKey, $queue) !== false) {
                        } else {
                            $queue[] = $gKey;
                        }
                    } else {
                        // Remove From Queue
                        $key = array_search($gKey, $queue);
                        if ($key !== false) {
                            unset($queue[$key]);
                        }

                        // Add for skip goal
                        if (array_search($gKey, $skipped) !== false) {
                        } else {
                            $skipped[] = $gKey;
                        }
                    }
                }
            }
        }

        $ignoreHasil = Hasil::where('id_analisa', $request->idAnalisa)->where('jawaban', 0)->get();
        if (count($ignoreHasil) > 0) {
            foreach ($ignoreHasil as $ignore) {
                foreach ($goal as $gKey => $gVal) {
                    foreach ($gVal as $g) {
                        if ($ignore->id_premis == $g) {
                            $key = array_search($gKey, $queue);
                            if ($key !== false) {
                                unset($queue[$key]);
                            }

                            $sKey = array_search($gKey, $skipped);
                            if ($sKey !== false) {
                                # code...
                            } else {
                                $skipped[] = $gKey;
                            }
                        }
                    }
                }
            }
        }

        if (count($queue) == 0) {
            if (count($goal) == count($skipped)) {
                Analisa::where('id', $request->idAnalisa)->update([
                    'hasil_akhir' => 'failed'
                ]);
                return response()->json('failed');
            }
            $premisTotal = Premis::all();
            $premisTotal = count($premisTotal);
            $premisDone = Hasil::where('id_analisa', $request->idAnalisa)->get();
            $nextPremisNo = count($premisDone) + 1;
            $nextPremis = 'P' . $nextPremisNo;
            for ($i = $nextPremisNo; $i <= $premisTotal; $i++) {
                $premisCheck = Hasil::where('id_analisa', $request->idAnalisa)->where('id_premis', $nextPremis)->first();
                if (!$premisCheck) {
                    foreach ($goal as $gKey => $gVal) {
                        if ($gVal[0] == $nextPremis) {
                            $premis = Premis::where('id', $nextPremis)->first();
                            $no = $request->no + 1;
                            return response()->json([
                                "no" => $no,
                                "premis" => $premis->id,
                                "pertanyaan" => $premis->pertanyaan,
                                "goal" => $goal,
                                "queue" => $queue,
                                "skipped" => $skipped
                            ]);
                        }
                    }
                }
                $nextPremisNo = $nextPremisNo + 1;
                $nextPremis = 'P' . $nextPremisNo;
            }
            Analisa::where('id', $request->idAnalisa)->update([
                'hasil_akhir' => 'failed'
            ]);
            return response()->json('failed');
        } elseif (count($queue) == 1) {
            $queue = reset($queue);
            $sisa = array_diff($goal[$queue], $subHasil);
            if (count($sisa) > 0) {
                $sisa = reset($sisa);
                $premis = Premis::where('id', $sisa)->first();
                $no = $request->no + 1;
                return response()->json([
                    "no" => $no,
                    "premis" => $premis->id,
                    "pertanyaan" => $premis->pertanyaan,
                    "goal" => $goal,
                    "queue" => $queue
                ]);
            } else {
                Analisa::where('id', $request->idAnalisa)->update([
                    'hasil_akhir' => Goal::find($queue)->jurusan
                ]);
                return response()->json('selesai');
            }
        } elseif (count($queue) > 1) {
            $premisTotal = Premis::all();
            $premisTotal = count($premisTotal);
            $premisDone = Hasil::where('id_analisa', $request->idAnalisa)->get();
            $nextPremisNo = count($premisDone) + 1;
            $nextPremis = 'P' . $nextPremisNo;

            for ($i = $nextPremisNo; $i <= $premisTotal; $i++) {
                $premisCheck = Hasil::where('id_analisa', $request->idAnalisa)->where('id_premis', $nextPremis)->first();
                if (!$premisCheck) {
                    foreach ($queue as $q) {
                        $testLoop[] = $q;
                        if (array_search($nextPremis, $goal[$q]) !== false) {
                            $premis = Premis::where('id', $nextPremis)->first();
                            $no = $request->no + 1;
                            return response()->json([
                                "no" => $no,
                                "premis" => $premis->id,
                                "pertanyaan" => $premis->pertanyaan,
                                "goal" => $goal,
                                "queue" => $queue
                            ]);
                        }
                    }
                }
                $nextPremisNo = $nextPremisNo + 1;
                $nextPremis = 'P' . $nextPremisNo;
            }
        }
    }

    public function hasil_analisa($id)
    {
        $analisa = Analisa::where('id', $id)->where('hasil_akhir', '!=', null)->first();
        return view('user.hasil', compact('analisa'));
    }
}
