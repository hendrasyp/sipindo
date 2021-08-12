<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fitur_model extends Model
{
    use HasFactory;

    protected $table = "fitur";

    protected $primary = "id_fitur";

    public function cari($keywords)
    {
        $query = DB::table('fitur')
            ->select('*')
            ->where('nama_fitur', 'LIKE', "%{$keywords}%") 
            ->orderBy('id_fitur','DESC')
           ->paginate(5);
        return $query;
    }
}
