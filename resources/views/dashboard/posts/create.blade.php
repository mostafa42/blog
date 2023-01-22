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

    <form action="{{url('dashboard/posts')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">post title</label>
            <input type="text" name="title" class="form-control" id="exampleFormControlInput1">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">content</label>
            <textarea class="form-control" name="content" id="exampleFormControlTextarea1" rows="5"></textarea>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">images</label>
            <input type="file" accept="image/png, image/gif, image/jpeg" name="images[]" multiple class="form-control" id="exampleFormControlInput1">
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">add</button>
        </div>
    </form>
</div><br>
@include('dashboard.footer')