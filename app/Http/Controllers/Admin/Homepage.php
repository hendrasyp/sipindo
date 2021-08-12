<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Konfigurasi_model;
use App\Models\Layanan_model;
use Datatables;
use DB;
use App\Models\Kegiatan;

class Homepage extends Controller
{
    public function sipindo() 
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        $mykonfigurasi  = new Konfigurasi_model();
        $site           = $mykonfigurasi->listing();

        $data = array(  'title'        => 'Profil '.$site->namaweb,
                        'breadcrumb'  => 'Profil',
                        'site'         => $site,
                        'content'      => 'admin/homepage/sipindo'
                    );
        return view('admin/layout/wrapper',$data);
    }


    public function mainBackground()
    {
    	if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
    	$mylayanan 	= new Layanan_model();
		$layanan 	= $mylayanan->layanan_update();
		$konfigurasi 	= DB::table('konfigurasi')->first();

        $data = array(  'title'       => 'Data Layanan',
                        'breadcrumb' => 'Layanan',
						'konfigurasi'    => $konfigurasi,
                        'content'     => 'admin/homepage/main'
                    );
        return view('admin/layout/wrapper',$data);
    }

    public function updateMainBackground(Request $request)
    {
        if ($request->hasFile('hero_bg')) {
            $slug = uniqid();
            $file = $request->file('hero_bg');
            $name = $slug . '.' . $file->getClientOriginalExtension();
            $request->file('hero_bg')->move("uploads/image/", $name);
            $hero_bg = $name;
        } else {
            $hero_bg = $request->hero_bg2;
        }

        if($request->hero_text != ""){
            $hero_text = $request->hero_text;
        }else{
            $hero_text = $request->hero_text2;
        }

        if($request->hero_text_en != ""){
            $hero_text_en = $request->hero_text_en;
        }else{
            $hero_text_en = $request->hero_text_en2;
        }

        DB::table('konfigurasi')->where('id_konfigurasi', $request->id_konfigurasi)->update([
            'hero_title' => $request->hero_title,
            'hero_title_en' => $request->hero_title_en,
            'hero_text' => $hero_text,
            'hero_text_en' => $hero_text_en,
            'hero_bg' => $hero_bg
        ]);

        return redirect()->back()->with(['sukses' => 'Data Berhasil Ditambahkan']);


    }
	
}
