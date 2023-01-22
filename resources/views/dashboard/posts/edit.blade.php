@include('dashboard.header')

<br><br>
@if(session()->has('message'))
<div class="alert alert-success">
    {{ session()->get('message') }}
</div>
@endif
@foreach ($errors->all() as $error)
<p style="color: red; font-size: 20px; text-align:center">{{ $error }}</p><br>
@endforeach
<div style="width: 50%; margin: auto !important; background-color: #aaa; padding: 10px; color:white;">

    <form action="{{url('dashboard/posts/' . $post->id)}}" method="POST" enctype="multipart/form-data">
        {{ method_field('PUT') }}
        @csrf
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">post title</label>
            <input type="text" value="{{$post->title}}" name="title" class="form-control" id="exampleFormControlInput1">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">content</label>
            <textarea class="form-control" name="content" id="exampleFormControlTextarea1"
                rows="5">{{$post->content}}</textarea>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">images</label>
            <input type="file" accept="image/png, image/gif, image/jpeg" name="images[]" multiple class="form-control"
                id="exampleFormControlInput1">
        </div>

        <div class="mb-3">
            @foreach ($post->images as $image)
            <img src="{{asset('image_for_web/' . $image->image)}}" style="width: 70px;"> <a href="{{url('dashboard/delete-image/' . $image->id)}}" class="btn btn-danger">Delete</a>
            @endforeach
        </div>

        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>
</div><br>
@include('dashboard.footer')