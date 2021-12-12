<?php

namespace App\Http\Controllers;

use App\Models\Goal;
use App\Models\Rule;
use App\Models\Admin;
use App\Models\Hasil;
use App\Models\Premis;
use App\Models\Analisa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function login_attempt(Request $request)
    {
        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            return redirect('/admin');
        } else {
            Session::flash('failed');
            return redirect()->back()->withInput($request->all());
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }

    public function dashboard()
    {
        $analisa = Analisa::where('hasil_akhir', '!=', null)->where('hasil_akhir', '!=', 'failed')->get();
        $analisa = count($analisa);

        $failed = Analisa::where('hasil_akhir', 'failed')->get();
        $failed = count($failed);

        $goal = Goal::all();
        $goal = count($goal);

        $premis = Premis::all();
        $premis = count($premis);

        return view('admin.dashboard', compact('analisa', 'failed', 'goal', 'premis'));
    }

    public function hasil_rekomendasi()
    {
        $data = Analisa::where('hasil_akhir', '!=', null)->where('hasil_akhir', '!=', 'failed')->orderBy('created_at', 'DESC')->paginate(7);
        return response()->json($data);
    }

    public function goal()
    {
        $premis = Premis::all();
        return view('admin.goal', compact('premis'));
    }

    public function get_goal()
    {
        $goalFirst = Goal::all();
        $goal = [];
        foreach ($goalFirst as $g) {
            $goal[] = [
                "id" => $g->id,
                "jurusan" => $g->jurusan,
                "created" => date('d M Y', strtotime($g->created_at))
            ];
        }
        return response()->json($goal);
    }

    public function goal_relasi(Request $request)
    {
        $goal = Goal::find($request->idGoal);
        $premis = Premis::all();
        return view('admin.goal-relasi', compact('goal', 'premis'));
    }

    public function goal_update(Request $request)
    {
        Goal::where('id', $request->idGoal)->update([
            'jurusan' => $request->jurusan,
            'deskripsi' => $request->deskripsi
        ]);

        Rule::where('id_goal', $request->idGoal)->delete();

        foreach ($request->idPertanyaan as $p) {
            Rule::create([
                'id_goal' => $request->idGoal,
                'id_premis' => $p
            ]);
        }

        return response()->json($request->idGoal);
    }

    public function goal_add(Request $request)
    {
        $no = 1;
        while (true) {
            $check = Goal::where('id', 'G' . $no)->first();
            if (!$check) {
                Goal::create([
                    "id" => 'G' . $no,
                    "jurusan" => $request->jurusan,
                    "deskripsi" => $request->deskripsi
                ]);

                foreach ($request->idPertanyaan as $p) {
                    Rule::create([
                        'id_goal' => 'G' . $no,
                        'id_premis' => $p
                    ]);
                }
                return response()->json('G' . $no);
            }
            $no++;
        }
    }

    public function goal_delete(Request $request)
    {
        Goal::where('id', $request->idGoal)->delete();
        Rule::where('id_goal', $request->idGoal)->delete();
        return response()->json($request->idGoal);
    }


    public function pertanyaan()
    {
        $goal = Goal::all();
        return view('admin.pertanyaan', compact('goal'));
    }

    public function get_pertanyaan()
    {
        $premis = Premis::all();
        $pertanyaan = [];
        foreach ($premis as $p) {
            $pertanyaan[] = [
                "id" => $p->id,
                "pertanyaan" => $p->pertanyaan,
                "created" => date('d M Y', strtotime($p->created_at))
            ];
        }
        return response()->json($pertanyaan);
    }

    public function pertanyaan_relasi(Request $request)
    {
        $pertanyaan = Premis::find($request->idPertanyaan);
        $goal = Goal::all();
        return view('admin.pertanyaan-relasi', compact('pertanyaan', 'goal'));
    }

    public function pertanyaan_update(Request $request)
    {
        Premis::where('id', $request->idPertanyaan)->update([
            'pertanyaan' => $request->pertanyaan
        ]);

        Rule::where('id_premis', $request->idPertanyaan)->delete();

        foreach ($request->idGoal as $goal) {
            Rule::create([
                'id_goal' => $goal,
                'id_premis' => $request->idPertanyaan
            ]);
        }

        return response()->json($request->idPertanyaan);
    }

    public function pertanyaan_add(Request $request)
    {
        $no = 1;
        while (true) {
            $check = Premis::where('id', 'P' . $no)->first();
            if (!$check) {
                Premis::create([
                    "id" => 'P' . $no,
                    "pertanyaan" => $request->pertanyaan
                ]);

                foreach ($request->idGoal as $g) {
                    Rule::create([
                        'id_goal' => $g,
                        'id_premis' => 'P' . $no
                    ]);
                }
                return response()->json('P' . $no);
            }
            $no++;
        }
    }

    public function pertanyaan_delete(Request $request)
    {
        Premis::where('id', $request->idPertanyaan)->delete();
        Rule::where('id_premis', $request->idPertanyaan)->delete();
        return response()->json($request->idPertanyaan);
    }
}
