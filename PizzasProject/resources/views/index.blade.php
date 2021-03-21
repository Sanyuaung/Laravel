@extends('layout.layout')
@section('content')
<div class="container">
        <h1 class="grey-text mt-4 d-inline">Welcome From My Online Fashion Shop</h1>
        <img src="{{asset('images/Fashion.jpeg')}}" width="200px" height="200px" class="img-responsive ">

        @if (Session('success'))
        <div class="alert alert-success">
            {{Session('success')}}
        </div>
        @endif

        <!-- Material form register -->
    <div class="card mt-4">

    <h5 class="card-header indigo  white-text text-center py-4">
        <strong>Order Form</strong>
    </h5>

    <!--Card content-->
    <div class="card-body px-lg-5 pt-0">

        <!-- Form -->
        <form class="text-center" action="{{route('order_now')}}" method="post">
            @csrf
            <!-- User Name -->
            <div class="md-form mt-4">
                <input type="text" id="materialRegisterFormEmail" class="form-control" name="username">
                <label for="materialRegisterFormEmail">User Name</label>
                @error('username')
                    <p class="text-danger">{{$message}}</p>
                @enderror
            </div>

            <!-- Pizza Name -->
            <div class="md-form mt-4">
                <input type="text" id="materialRegisterFormEmail" class="form-control" name="itemname">
                <label for="materialRegisterFormEmail">Item Name</label>
                @error('itemname')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>

            <!-- Toppings -->
            <div class="md-form mt-4">
                <input type="text" id="materialRegisterFormEmail" class="form-control" name="color">
                <label for="materialRegisterFormEmail">Color</label>
                @error('color')
                    <p class="text-danger">{{$message}}</p>
                @enderror
            </div>

            <!-- Sauce -->
            <div class="md-form mt-4">
                <input type="text" id="materialRegisterFormEmail" class="form-control" name="pics">
                <label for="materialRegisterFormEmail">No: Pics</label>
                @error('pics')
                    <p class="text-danger">{{$message}}</p>
                @enderror
            </div>

            <!-- Price -->
            <div class="md-form mt-4">
                <input type="text" id="materialRegisterFormEmail" class="form-control" name="price">
                <label for="materialRegisterFormEmail">Price</label>
                @error('price')
                    <p class="text-danger">{{$message}}</p>
                @enderror
            </div>


            <!-- Order button -->
            <button class="btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0" type="sumbit">Order Now</button>

            <!-- Social register -->
            <p>or sign up with:</p>

            <a type="button" class="btn-floating btn-fb btn-sm">
                <i class="fab fa-facebook-f"></i>
            </a>
            <a type="button" class="btn-floating btn-tw btn-sm">
                <i class="fab fa-twitter"></i>
            </a>
            <a type="button" class="btn-floating btn-li btn-sm">
                <i class="fab fa-linkedin-in"></i>
            </a>
            <a type="button" class="btn-floating btn-git btn-sm">
                <i class="fab fa-github"></i>
            </a>

            <hr>

            <!-- Terms of service -->
            <p>By clicking
                <em>Sign up</em> you agree to our
                <a href="" target="_blank">terms of service</a>

        </form>
        <!-- Form -->

    </div>

</div>
<!-- Material form register -->
    </div>
@endsection
