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
            'name' => ['required', 'between:2,25'],
            'description' => ['required', 'between:2,200'],
        ]);

        Message::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        $request->session()->flash('message', '投稿しました。'); 

        return redirect('/');
    }
}
