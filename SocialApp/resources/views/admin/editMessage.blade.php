<x-adminlayout>
<form class="text-center border border-light p-5" action="{{route('editUpdateMessage',$editMessage->id)}}" method="POST">
    @csrf
    <p class="h4 mb-4">Update Message</p>

    <!-- Username -->
    <input name="username" type="text" id="defaultLoginFormPassword" class="form-control mb-4" placeholder="Username" value="{{$editMessage->username}}">
    @error('username')
        <p class="text-danger">{{$message}}</p>
    @enderror
    <!-- Email -->
    <input name="email" type="email" id="defaultLoginFormEmail" class="form-control mb-4" placeholder="E-mail" value="{{$editMessage->email}}">
    @error('email')
        <p class="text-danger">{{$message}}</p>
    @enderror
    {{-- message --}}
    <textarea name="message" id="" cols="30" rows="10" class="form-control mb-4" placeholder="Your Message">{{$editMessage->messages}}</textarea>
    @error('message')
        <p class="text-danger">{{$message}}</p>
    @enderror

    <!-- Send Message button -->
    <button class="btn btn-info btn-block my-4" type="submit">Update Message</button>

</form>
</x-adminlayout>
