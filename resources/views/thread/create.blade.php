<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://unpkg.com/normalize.css/">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.2/css/bulma.min.css">
    <title>Document</title>
</head>
<body>

</body>
</html>
<section class="hero is-primary">
    <div class="hero-body">
        <div class="container is-fluid">
            <h1 class="title">
                Create New Post
            </h1>
        </div>
    </div>
</section>
<section>
    <form method="post" action="/threads" class="container is-fluid">
        @csrf
        <div class="field">
            <label class="label" for="title">Title</label>
            <div class="control">
                <input class="input" type="text" placeholder="title" name="title" value="{{old('title')}}">
            </div>
        </div>
        <div class="field">
            <label class="label" for="body">Body</label>
            <div class="control">
                <textarea class="textarea" placeholder="Textarea" name="body" value="{{old('body')}}"></textarea>
            </div>
        </div>
        <div class="field">
            <label class="label" for="channel_id">Channel</label>
            <div class="control">
                <div class="select">
                    <select name="channel_id">
                        <option>Choose one...</option>
                        @foreach(\App\Channel::all() as $channel)
                        <option value="{{$channel->id}}" {{old('channel')==$channel->id ? "selected": ''}}>{{$channel->name}}</option>
                            @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="field">
            <div class="control">
                <button class="button is-link">Publish</button>
            </div>
        </div>
    </form>
</section>

@include('thread.errors')