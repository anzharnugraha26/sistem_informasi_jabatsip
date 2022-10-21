<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KabinetController extends Controller
{
    public function index()
    {
        $k = DB::table('kabinet')->get();
        $c = DB::table('kabinet')->count();
        return view('kabinet.index', compact('k', 'c'));
    }

    public function tambah()
    {
        $data['flag'] = 0;
        return view('kabinet.form', $data);
    }

    public function delete($id)
    {
        DB::table('kabinet')->where('id', $id)->delete();
        return redirect()->back();
    }

    public function save(Request $request)
    {
        $array = [
            'kode_kabinet' => $request->kode_kabinet,
            'nama_kabinet' => $request->nama_kabinet,
            'slot' => $request->slot
        ];
        DB::table('kabinet')->insert(
            $array
        );

        return redirect('kabinet');
    }
}
