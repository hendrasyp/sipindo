<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kegiatan_model extends Model
{
    use HasFactory;

    protected $table = "kegiatan";
    protected $primaryKey = "id_kegiatan";

    public function cari($keywords)
    {
        $query = DB::table('kegiatan')
            ->select('*')
            ->where('kegiatan.judul', 'LIKE', "%{$keywords}%") 
            ->orWhere('kegiatan.deskripsi', 'LIKE', "%{$keywords}%") 
            ->orderBy('id_kegiatan','DESC')
           ->paginate(5);
        return $query;
    }
}
