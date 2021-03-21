<x-pagelayout>

{{-- background image --}}
    <header></header>

{{-- posts --}}
    <div class="container">
        <h1 class="mt-3">All Posts</h1>
        <div class="row">
            @foreach ($posts as $post)
            <div class="col-md-4 mt-3">
                <!-- Card -->
                <div class="card">

                <!-- Card image -->
                <div class="view view-cascade overlay">
                    <img class="card-img-top" src="{{asset('images/posts/'.$post->image)}}" width="250px" height="250px" alt="Card image cap">
                    <a href="{{route('showPostByID',$post->id)}}">
                    <div class="mask rgba-white-slight"></div>
                    </a>
                </div>

                <!-- Card content -->
                <div class="card-body">

                    <!-- Title -->
                    <h4 class="card-title">{{$post->title}}</h4>
                     <!-- user is function name of Post Models -->
                    <p>( Posted by {{$post->user->name}} )</p>
                    <!-- Text -->
                    {{-- <p class="card-text">{{$post->content}}</p> --}}
                    <!-- Button -->
                    <a href="{{route('showPostByID',$post->id)}}" class="btn pink text-white">See More</a>

                </div>


                </div>
                <!-- Card -->
            </div>
            @endforeach
            {{$posts->links()}}
        </div>
    </div>
</x-pagelayout>


