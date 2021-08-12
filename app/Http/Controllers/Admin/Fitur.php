<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Fitur_model;

class Fitur extends Controller
{
    public function index()
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        $fiturs = DB::table('fitur')->orderBy('id_fitur', 'DESC')->paginate(8);
        $fit = DB::table('fitur')->get();

        $data = array(
            'title' => 'Kegiatan',
            'breadcrumb' => 'Kegiatan Kami',
            'fiturs' => $fiturs,
            'fit' => $fit,
            'content' => 'admin/fitur/index'
        );
        return view('admin/layout/wrapper', $data);
    }

    public function tambah(Request $request)
    {
        DB::table('fitur')->insert([
            'icon' => $request->icon,
            'nama_fitur' => $request->nama_fitur,
            'nama_fitur_en' => $request->nama_fitur_en,
            'status' => $request->status
        ]);

        return redirect()->back()->with(['sukses', 'Data Berhasil Ditambahkan']);
    }

    public function edit(Request $request)
    {
        DB::table('fitur')->where('id_fitur', $request->id_fitur)->update([
            'icon' => $request->icon,
            'nama_fitur' => $request->nama_fitur,
            'nama_fitur_en' => $request->nama_fitur_en,
            'status' => $request->status
        ]);

        return redirect()->back()->with(['sukses' => 'Data Berhasil Diubah']);
    }

    public function delete($id_fitur)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        Fitur_model::where('id_fitur', $id_fitur)->delete();
        return redirect()->back()->with(['sukses', 'Data berhasil Dihapus']);
    }

    public function cari()
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        $cari_fitur           = new Fitur_model();
        $keywords           = $request->keywords;
        $fiturs             = $cari_fitur->cari($keywords);
        $data = array(  'title'             => 'Data Kegiatan',
                        'fiturs' => $fiturs,
                        'content'           => 'admin/fitur/index'
                    );
        return view('admin/layout/wrapper',$data);
    }
}
