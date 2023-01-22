@include('dashboard.header')
<br>
<div style="margin: auto; text-align: center">
    <a href="{{url('dashboard/posts')}}" class="btn btn-primary">Back</a>
</div>
<br>
<div
    style="width: 80%; margin: auto !important; background-color: #aaa; padding: 10px; color:white; overflow-y: scroll; overflow-x: none; height: 600px;">

    @if($post->comments->count() > 0)
        @foreach( $post->comments as $comment )
            <div class="card" style="color: #000">
                <div class="card-body">
                    <h5 class="card-title" style="color: #aaa; font-weight: bold;"> {{ $comment->user->name }} </h5>
                    <p class="card-text" style="color: #ccc; font-weight: bold; margin-left: 5px;"> {{ $comment->created_at }} </p>
                    <p class="card-text" style="color: #000; font-weight: bold;"> {{ $comment->comment }} </p>
                    @include('dashboard.posts.modal')
                </div>
            </div><br>
        @endforeach
    @else
            <h1>No comments</h1>
    @endif

</div>


@include('dashboard.footer')