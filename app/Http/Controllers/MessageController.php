<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Http\Requests\RegisterRequest; 

class MessageController extends Controller
{
    public function index(){
        $messages = Message::list()->paginate(5);

        return view('message.index', compact('messages'));
    }

    public function post(RegisterRequest $request) : RedirectResponse {
    
        Message::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        $request->session()->flash('message', '投稿しました。'); 

        return redirect('/');
    }
}
