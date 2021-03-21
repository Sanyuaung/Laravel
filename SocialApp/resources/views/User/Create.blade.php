<x-pagelayout>
    <div class="container">
        <h1 class="mt-4 mb-4">Create Post</h1>
        <!-- Default form login -->
<form class=" border border-light p-5" action="{{route('post')}}" method="POST" enctype="multipart/form-data">
@csrf
    <label   label for="">Title</label>
    <input type="text" id="defaultLoginFormEmail" class="form-control mb-4" name="title" value="{{old('title')}}">
    @error('title')
        <p class="text-danger">{{$message}}</p>
    @enderror

    <label for="">Photo</label>
    <input type="file" id="defaultLoginFormPassword" class="form-control mb-4" placeholder="Password" name="image">
    @error('image')
        <p class="text-danger">{{$message}}</p>
    @enderror

    <label for="">Content</label>
    <textarea name="content" id="" cols="30" rows="10"class="form-control mb-4">{{old('title')}}</textarea>
    @error('content')
        <p class="text-danger">{{$message}}</p>
    @enderror
    <!-- Add post button -->
    <button class="btn pink white-text btn-block my-4 " type="submit">Add Post</button>


</form>
<!-- Default form login -->
    </div>
</x-pagelayout>
