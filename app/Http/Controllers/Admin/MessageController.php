<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Message;

class MessageController extends Controller
{
    public function index()
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        $messages = Message::all();

        $data = array(  'title'     => 'Data Pesan',
                        'breadcrumb' => 'Pesan',
                        'messages'  => $messages,
                        'content'   => 'admin/message/index'
                    );
        return view('admin/layout/wrapper',$data);
    }

    // Delete
    public function delete(Request $request, $id)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        
        $message = Message::where('id', $id);
        $message->delete();
        return redirect()->back()->with(['sukses' => 'Data telah dihapus']);
    }
}
