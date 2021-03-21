<x-pagelayout>
    <div class="container">
        <h1 class="mt-4 mb-4">Edit Post</h1>
        <!-- Default form login -->
<form class=" border border-light p-5" action="{{route('editUpdatePost',$editPost->id)}}" method="POST" enctype="multipart/form-data">
@csrf
    <label   label for="">Title</label>
    <input type="text" id="defaultLoginFormEmail" class="form-control mb-4" name="title" value="{{$editPost->title}}">

    <label for="">Photo</label>
    <input type="file" id="defaultLoginFormPassword" class="form-control mb-4" placeholder="Password" name="image">
    <img src="{{asset('images/posts/'.$editPost->image)}}" alt="avatar image" height="300px" width="300px">
    <br>


    <label for="">Content</label>
    <textarea name="content" id="" cols="30" rows="10"class="form-control mb-4">{{$editPost->content}}</textarea>

    <!-- Add post button -->
    <button class="btn pink white-text btn-block my-4 " type="submit">Update Post</button>


</form>
<!-- Default form login -->
    </div>
</x-pagelayout>
