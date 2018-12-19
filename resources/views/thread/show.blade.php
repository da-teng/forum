@extends('thread.layout')
@section('content')
    <div>
    <div class="columns">
    <div class="container column is-three-fifths">
        <div class="box columns">
            <div class="content column is-four-fifths">
                <h3 class="title"><a href="{{$thread->path()}}">{{$thread->title}}</a></h3>
                <p>
                    {{$thread->body}}
                </p>
            </div>
            {{--@can('update', $thread)--}}
            <div class="column">
                <form action="/threads/{{$thread->channel->slug}}/{{$thread->id}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="button is-danger">Delete</button>
                </form>
            </div>
            {{--@endcan--}}
        </div>
    </div>
        <div class="container column">
            <article class="message is-info">
                <div class="message-body">
                    This thread as published {{$thread->created_at->diffForHumans()}} by <a href="">{{$thread->owner->name}}</a>
                    , and currently has {{$thread->replies_count}} {{str_plural('comment', $thread->replies_count)}}.
                </div>
            </article>
        </div>
    </div>
        @foreach($replies as $reply)
@include('thread.reply')
            @endforeach
        @if(auth()->check())
        <form method="post" action="{{$thread->path().'/replies'}}">
            @csrf
            <div class="field">
                <label class="label" for="body">Reply</label>
                <div class="control">
                    <textarea class="textarea" placeholder="input your reply" name="body"></textarea>
                </div>
            </div>
            <div class="field">
                <div class="control">
                    <button class="button is-link">Submit</button>
                </div>
            </div>
        </form>
            @else
            <div class="notification is-warning">
                Please <a href="/login">Log In</a> to join in our discussion!!!
            </div>
            @endif
    </div>

    @endsection