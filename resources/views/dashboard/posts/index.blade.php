@include('dashboard.header')
@foreach ($errors->all() as $error)
<p style="color: red; font-size: 20px; text-align:center">{{ $error }}</p><br>
@endforeach
<div
    style="width: 80%; margin: auto !important; background-color: #aaa; padding: 10px; color:white; overflow-y: scroll; overflow-x: none; height: 600px;">
    @foreach ($posts as $post)
    <div class="card" style="color: #000">
        <div class="container">
            <div class="row">
                @foreach ($post->images as $image)
                <div class="col-lg-6">
                    <img class="card-img-top" src="{{asset('image_for_web/' . $image->image)}}" style="width: 70px;"
                        alt="Card image cap">
                </div>

                @endforeach

            </div>
        </div>
        <div class="card-body">
            <h5 class="card-title"> {{ $post->title }} </h5>
            <p class="card-text"> {{ $post->content }} </p>
            <a href="{{url('dashboard/posts/' . $post->id)}}" class="btn btn-primary">comments <span
                    class="badge badge-secondary"> {{
                    $post->comments->count() }}</span> </a>
            <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal[{{$post->id}}]"
                onclick="geiveMeId({{$post->id}})">Add comment</button>

            <form style="display: contents;" action="{{url('dashboard/posts/' . $post->id)}}" method="POST">
                {{ method_field('DELETE') }}
                @csrf
                <button type="submit" class="btn btn-danger"> Delete </button>
            </form>
            <a href="{{url('dashboard/posts/' . $post->id . "/edit")}}" type="submit" class="btn btn-success"> Edit </a><br>
            @include('dashboard.posts.modal')
        </div>
    </div><br>
    @endforeach
</div>

<script>
    function geiveMeId(post_id){
        $("#setPostId").val(post_id)
        $("#setPostIdForComments").val(post_id)
    }
</script>



@include('dashboard.footer')