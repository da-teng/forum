 <div class="box columns">
        <div class="content column is-four-fifths">
            <p><strong><a href="/profiles/{{$reply->owner->id}}">{{$reply->owner->name}}</a></strong> said {{$reply->created_at->diffForHumans()}}</p>
            <p>
                {{$reply->body}}
            </p>
        </div>
        <div>
            <form method="post" action="/replies/{{$reply->id}}/like">
                @csrf
                <button class="button is-light"><span class="icon"><i class="fas fa-heart" style="color: red;">{{$reply->likes_count}}</i></span> </button>
            </form>
        </div>
</div>
