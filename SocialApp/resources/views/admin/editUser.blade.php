<x-adminlayout>
    <form class="text-center border border-light p-5" action="{{route('editUpdateUser',$editUser->id)}}" method="POST">
        @csrf
        <p class="h4 mb-4">Update User</p>

        <!-- name -->
        <input name="name" type="text" id="defaultLoginFormPassword" class="form-control mb-4" placeholder="Username" value="{{$editUser->name}}">
        @error('name')
            <p class="text-danger">{{$message}}</p>
        @enderror
        <!-- Email -->
        <input name="email" type="email" id="defaultLoginFormEmail" class="form-control mb-4" placeholder="E-mail" value="{{$editUser->email}}">
        @error('email')
            <p class="text-danger">{{$message}}</p>
        @enderror
        {{-- isAdmin --}}
        <label for="">isAdmin</label>
            <select name="isAdmin" id="" class="form-control mb-4">
                <option value="1" {{$editUser->isAdmin=="1" ? "selected" : ""}}>TRUE</option>
                <option value="0" {{$editUser->isAdmin=="0" ? "selected" : ""}}>FALSE</option>
            </select>
            {{-- isPremium --}}
        <label for="">isPremium</label>
            <select name="isPremium" id="" class="form-control mb-4">
                <option value="1" {{$editUser->isPremium=="1" ? "selected" : ""}}>TRUE</option>
                <option value="0"{{$editUser->isPremium=="0" ? "selected" : ""}}>FALSE</option>
            </select>


        <!-- Send Message button -->
        <button class="btn btn-info btn-block my-4" type="submit">Update</button>

    </form>

</x-adminlayout>
