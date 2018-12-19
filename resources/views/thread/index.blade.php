@extends('thread.layout')
@section('content')
<div class="container">
    @foreach($threads as $thread)
        <div class="box columns">
            <div class="content column is-four-fifths">
                <h3 class="title"><a href="{{$thread->path()}}">{{$thread->title}}</a></h3>
                <p>
                    {{$thread->body}}
                </p>
            </div>
            <div class="column">
                <p>{{$thread->replies_count}} {{str_plural('comment', $thread->replies_count)}}</p>
            </div>
        </div>
        @endforeach
</div>
    @endsection
