@extends('layout.layout')
@section('content')
<div class="container">
@if (Session('delete'))
    <div class="alert alert-success mt-3 bt-3">
        {{Session("delete")}}
    </div>
@endif
@if (Session('orderupdate'))
<div class="alert alert-success mt-3 bt-3">
    {{Session("orderupdate")}}
 </div>
@endif
    <table class="table table-hover mx-4 scrolling">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">User Name</th>
            <th scope="col">Item Name</th>
            <th scope="col">Color</th>
            <th scope="col">No: Pics</th>
            <th scope="col">Price</th>
            <th scope="col">Edit Order</th>
            <th scope="col">Order Complete</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($order_now as $order)
            <tr>
              <th scope="row">{{$order->id}}</th>
              <th scope="row">{{$order['username']}}</th>
              <th scope="row">{{$order['itemname']}}</th>
              <th scope="row">{{$order['color']}}</th>
              <th scope="row">{{$order['pics']}}</th>
              <th scope="row">{{$order['price']}} $</th>


              <td><a class="btn btn-sm btn-warning" href="{{route("edit",$order->id)}}">Edit Order</a></td>
              <td><a class="btn btn-sm btn-success" href="{{route("delete",$order->id)}}">Order Complete</a></td>
            </tr>
            @endforeach
         </tbody>
      </table>
    </div>
  </div>
</div>
</div>
@endsection

