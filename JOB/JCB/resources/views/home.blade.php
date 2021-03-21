@extends('layouts.layout')
@section('content')
<div class="container mt-5 p-5">
    <form class=" border border-light p-5" action="{{route('upload')}}" method="POST" enctype="multipart/form-data">
        @csrf
            @if(session('error'))
                <div class="alert alert-success">
                    {{session('error')}}
                </div>
            @endif
        {{-- @error('file')
            <p class="text-danger">{{$message}}</p>
        @enderror --}}
        <div class="input-group">

            <div class="input-group-prepend">
                <button class="btn purple-gradient white-text input-group-text" id="inputGroupFileAddon01">Upload</button>
            </div>

            <div class="custom-file mt-2">
                <input type="file" class="custom-file-input" id="inputGroupFile01" name="file"
                    aria-describedby="inputGroupFileAddon01">
                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
            </div>
        </div>
    </form>
</div>


@endsection
