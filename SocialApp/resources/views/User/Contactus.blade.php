<x-pagelayout>

<div class="container-fluid">
    <h1 class="mt-4">Contact Message</h1>
    <div class="row">
        <div class="col-md-6">
            {{-- map here --}}
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15472194.019809926!2d87.63639886146298!3d18.78071526373716!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x305652a7714e2907%3A0xba7b0ee41c622b11!2sMyanmar%20(Burma)!5e0!3m2!1sen!2smm!4v1614851212760!5m2!1sen!2smm" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>
        <div class="col-md-6">
            <!-- Default form login -->
<form class="text-center border border-light p-5" action="{{route('post_contact_message')}}" method="POST">
    @csrf
    <p class="h4 mb-4">Contact Us</p>

    <!-- Username -->
    <input name="username" type="text" id="defaultLoginFormPassword" class="form-control mb-4" placeholder="Username">
    @error('username')
        <p class="text-danger">{{$message}}</p>
    @enderror
    <!-- Email -->
    <input name="email" type="email" id="defaultLoginFormEmail" class="form-control mb-4" placeholder="E-mail">
    @error('email')
        <p class="text-danger">{{$message}}</p>
    @enderror
    {{-- message --}}
    <textarea name="message" id="" cols="30" rows="10" class="form-control mb-4" placeholder="Your Message"></textarea>
    @error('message')
        <p class="text-danger">{{$message}}</p>
    @enderror

    <!-- Send Message button -->
    <button class="btn btn-info btn-block my-4" type="submit">Send Message</button>

</form>
<!-- Default form login -->
        </div>
    </div>
</div>



</x-pagelayout>
