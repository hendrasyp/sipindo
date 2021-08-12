<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class User_model extends Model
{
    protected $table = "users";
    public $timestamps = false;
    // kategori
    public function login($username,$password)
    {
        $query = DB::table('users')
            ->select('*')
            ->where(array(  'users.username'	=> $username,
                            'users.password'    => sha1($password)))
            ->orderBy('id_user','DESC')
            ->first();
        return $query;
    }
}
