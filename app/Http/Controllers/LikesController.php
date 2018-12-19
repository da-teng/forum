<?php

namespace App\Http\Controllers;

use App\Like;
use App\Reply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LikesController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');

    }



    public function store(Reply $reply)
    {
        $reply->like(auth()->user());
        return redirect('/threads/{$reply}');
    }

}
