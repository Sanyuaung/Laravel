@extends('layouts/layout')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script src="https://www.position-absolute.com/creation/print/jquery.printPage.js"></script>
   <div class="container-fluid mt-5">
       <div class="text-center">
            <a class="btn purple-gradient float-right mb-3 " href="{{route('download')}}">Download</a>
            <a class="btn purple-gradient float-left" href="{{route('home')}}">Home</a>
            <button class="btn purple-gradient float-center" onclick="window.print()">Print</button>
        </div>

    <table class="table table-hover text-center aqua-gradient black-text">
        <thead>
          <tr>
            <th scope="col">NO</th>
            <th scope="col">Institution Code</th>
            <th scope="col">Acquiriing Bank Name</th>
            <th scope="col">Account Number</th>
            <th scope="col">Settlement Date</th>
            <th scope="col">MPU Commission</th>
            <th scope="col">Acquiriing Settlement Amount</th>
            <th scope="col">Debit</th>
            <th scope="col">Credit</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
              <td>{{$user->NO}}</td>
              <td><b>{{$user->Institution_Code}}</td>
              <td><b>{{$user->Short_Name}}</td>
              <td><b>{{$user->Account_Number}}</td>
              <td><b>{{$user->filename}}</td>
              <td><b>{{$user->MPU_Comm}}</td>
              <td><b>{{$user->Acq_Bank_Settle_Amt}}</td>
              <td><b>{{$user->Debit}}</td>
              <td><b>{{$user->Credit}}</td>
            </tr>
            @endforeach
        </tbody>
      </table>
   </div>
{{-- <script type="text/javascript">
    $(document).ready(function(){
    $('.btnprn').printPage();
    });
</script> --}}

@endsection
