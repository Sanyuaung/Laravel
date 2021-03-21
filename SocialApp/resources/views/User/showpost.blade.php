<x-pagelayout>
    <div class="container mt-5">
        <div class="text-center">
            <img src="{{asset('images/posts/'.$post->image)}}" width="1000px" height="600px" class="mr-3">
        </div>
        <p class="mt-3">{{$post->content}}</p>
        <div class="text-center">
            {{-- from AuthServiceProvider --}}
        @can('PremiumAdminPostowner',$post->id)
            <a href="{{route('editPost',$post->id)}}" class="btn btn-success">Edit Post</a>
            <a href="{{route('deletePost',$post->id)}}" class="btn btn-danger ml-3" onclick="return confirm('Are you sure?')">Deletet</a>
        @endcan
        </div>
    </div>

</x-pagelayout>
