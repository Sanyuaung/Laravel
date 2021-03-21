<?php

namespace App\Http\Controllers;
use App\Models\Item;
use Illuminate\Http\Request;


class FashionController extends Controller
{
    function index() {
        return view('index');
    }


    function order()
     {
//    $order=[
//             fake data (data from DB)
//              array format
//             ["id"=>1,"username"=>"SYA","itemname"=>"Ring","color"=>"gold","pics"=>3,"price"=>10],
//             ["id"=>2,"username"=>"AA","itemname"=>"Earing","color"=>"gold","pics"=>3,"price"=>17.2],
//             ["id"=>3,"username"=>"KK","itemname"=>"Ring","color"=>"gold","pics"=>3,"price"=>10.2],
//             ["id"=>4,"username"=>"MGMG","itemname"=>"Glass","color"=>"Rose gold","pics"=>3,"price"=>20.2],



//         ];
//  object format
        $order=Item::all();

        //send data to blade file
        return view('order',['order_now'=>$order]);
    }

    function insert(Request $req)
    {
        // return $req->toArray();
        // validation
        $validation=$req->validate([
            'username'=> "required",
            'itemname'=>"required",
            'color'=>"required",
            'pics'=>"required",
            'price'=>"required"
        ]);
        if ( $validation) {
            //insert data to DB
            $item=new Item();
            $item->username=$req->username;
            $item->itemname=$req->itemname;
            $item->color=$req->color;
            $item->pics=$req->pics;
            $item->price=$req->price;
            $item->save();
            // return $item;
            return back()->with("success","Thank You For Your Order");
        }
        else{
            return back()->withErrors( $validation);
         }
    }
         function delete($id)
        {
            // return $id;
            // find data by id
            $delete_item_data=Item::find($id);

            // delete that data
            $delete_item_data->delete();
            return back()->with("delete","$delete_item_data->username 's Order is Completed.");
        }

        function edit($id)
        {
            $order=Item::find($id);
            return view("edit",['edit_order'=>$order]);
            // return ("$aa");
        }
        function orderupdate ($id,Request $req)
        {
            // return $id;
            $orderupdate=Item::find($id);
            $orderupdate->username=$req->username;
            $orderupdate->itemname=$req->itemname;
            $orderupdate->color=$req->color;
            $orderupdate->pics=$req->pics;
            $orderupdate->price=$req->price;
            $orderupdate->update();
            return redirect()->route("order")->with("orderupdate","$orderupdate->username 's Order is updated.");
        }


}

