<x-pagelayout>
    <div class="container">
        <h1 class="mt-4 mb-4">User Profile</h1>
        <!-- Default form login -->
<form class=" border border-light p-5" action="{{route("post_user_profile")}}" method="POST" enctype="multipart/form-data">
    @csrf
    @if (session("success"))
        <div class="alert alert-success">
            {{session("success")}}
         </div>
    @endif
    @if (session("error"))
    <div class="alert alert-danger">
        {{session("error")}}
     </div>
@endif

    <label   label for="">User Name</label>
    <input type="text" id="defaultLoginFormEmail" class="form-control mb-4" value="{{auth()->user()->name}}" name="username">

    <label   label for="">Email</label>
    <input type="email" id="defaultLoginFormEmail" class="form-control mb-4" value="{{auth()->user()->email}}" name="email">

    <label for="">Photo</label>
    <input type="file" id="defaultLoginFormPassword" class="form-control mb-4" name="image">
    <img src="{{asset('images/profiles/'.auth()->user()->image)}}" alt="avatar image" height="200px" width="200px">
    <br>

    <label   label for="">Old Password</label>
    <input type="password" id="defaultLoginFormEmail" class="form-control mb-4" name="old_password">

     <label   label for="">New Password Password</label>
    <input type="password" id="defaultLoginFormEmail" class="form-control mb-4" name="new_password">

    <!-- Add post button -->
    <button class="btn btn-pink btn-block my-4 " type="submit">Update Profile</button>


</form>
<!-- Default form login -->
    </div>
</x-pagelayout>
