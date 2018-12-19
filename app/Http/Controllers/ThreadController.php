<?php

namespace App\Http\Controllers;

use App\Channel;
use App\Thread;
use App\Filters\ThreadFilter;
use Illuminate\Http\Request;
use vendor\project\StatusTest;

class ThreadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }
    public function index(Channel $channel, ThreadFilter $filter)
    {
        //
        if($channel->exists){
            $threads =  Thread::with('channel')->where('channel_id', $channel->id)->latest();
        }else{
            $threads = Thread::latest();
        }
        $threads = $threads->filter($filter)->get();
        return view('thread.index', compact('threads'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('thread.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $attribute = $this->validatePost();
        $attribute['user_id'] = auth()->id();
        $attribute['channel_id'] =
        Thread::create($attribute);
        return redirect('/threads');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($channelID, Thread $thread)
    {
        //
        $replies = $thread->replies()->paginate('25');
        return view('thread.show', compact(['thread', 'replies']));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($channel, Thread $thread)
    {
        $this->authorize('update', $thread);
        $thread->delete();
    }

    public function validatePost()
    {
        return \request()->validate(['title' => ['required'], 'body' => ['required'], 'channel_id' => ['required']]);
    }
}
