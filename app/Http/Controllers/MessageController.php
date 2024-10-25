<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\Controller;
use App\Models\Message;


class MessageController extends Controller
{
    public function index(){
        $messages = Message::list()->paginate(5);

        return view('message.index', compact('messages'));
    }

    public function post(Request $request) : RedirectResponse {
        $request->validate([
            'name' => ['required', 'string', 'max:50', 'min:2'],
            'description' => ['required', 'string', 'max:500', 'min:2'],
        ]);
    
        Message::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        $request->session()->flash('message', '投稿しました。'); 

        return redirect('/');
    }
}
