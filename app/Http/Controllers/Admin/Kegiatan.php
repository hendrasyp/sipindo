<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Kegiatan_model;

class Kegiatan extends Controller
{
    public function index()
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        $kegiatans = DB::table('kegiatan')->orderBy('id_kegiatan', 'DESC')->paginate(8);
        $keg = DB::table('kegiatan')->get();

        $data = array(
            'title' => 'Kegiatan',
            'breadcrumb' => 'Kegiatan Kami',
            'kegiatans' => $kegiatans,
            'keg' => $keg,
            'content' => 'admin/kegiatan/index'
        );
        return view('admin/layout/wrapper', $data);
    }

    public function tambah(Request $request)
    {
        if ($request->hasFile('gambar')) {
            $slug = uniqid();
            $file = $request->file('gambar');
            $name = $slug . '.' . $file->getClientOriginalExtension();
            $request->file('gambar')->move("uploads/kegiatan/", $name);
            $gambar = $name;
        } else {
            $gambar = '';
        }

        DB::table('kegiatan')->insert([
            'gambar' => $gambar,
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'judul_en' => $request->judul_en,
            'deskripsi_en' => $request->deskripsi_en,
            'link_url' => $request->link_url,
            'status' => $request->status
        ]);

        return redirect()->back()->with(['sukses', 'Data Berhasil Ditambahkan']);
    }

    public function edit(Request $request)
    {
        if ($request->hasFile('gambar')) {
            $slug = uniqid();
            $file = $request->file('gambar');
            $name = $slug . '.' . $file->getClientOriginalExtension();
            $request->file('gambar')->move("uploads/kegiatan/", $name);
            $gambar = $name;
        } else {
            $gambar = $request->gambar2;
        }

        if($request->deskripsi != ""){
            $deskripsi = $request->deskripsi;
        }else{
            $deskripsi = $request->deskripsi2;
        }

        if($request->deskripsi_en != ""){
            $deskripsi_en = $request->deskripsi_en;
        }else{
            $deskripsi_en = $request->deskripsi_en2;
        }

        DB::table('kegiatan')->where('id_kegiatan', $request->id_kegiatan)->update([
            'gambar' => $gambar,
            'judul' => $request->judul,
            'judul_en' => $request->judul_en,
            'deskripsi' => $deskripsi,
            'deskripsi_en' => $deskripsi_en,
            'link_url' => $request->link_url,
            'status' => $request->status
        ]);

        return redirect()->back()->with(['sukses' => 'Data Berhasil Diubah']);
    }

    public function delete($id_kegiatan)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        Kegiatan_model::where('id_kegiatan', $id_kegiatan)->delete();
        return redirect()->back()->with(['sukses', 'Data berhasil Dihapus']);
    }

    public function cari()
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        $cari_kegiatan           = new Kegiatan();
        $keywords           = $request->keywords;
        $kegiatans             = $cari_kegiatan->cari($keywords);
        $data = array(  'title'             => 'Data Kegiatan',
                        'kegiatans' => $kegiatans,
                        'content'           => 'admin/kegiatan/index'
                    );
        return view('admin/layout/wrapper',$data);
    }
}
