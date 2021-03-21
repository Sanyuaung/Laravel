<?php

use Illuminate\Database\Migrations\Migration;
namespace App\Http\Controllers;
use App\Exports\DataExport;
use App\Models\jcb;
use DateTimeInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
// use Maatwebsite\Excel\Excel;


class HomeController extends Controller
{

    function home()
    {
        return view('home');
    }
    public function upload()
    {
        $validation=request()->validate([
            "file"=>"required",
        ]);
        if($validation){
            $name=request('file');
            $filename=$name->getClientoriginalName();
        }else{
            return redirect()-> back()->with('error',"done");

        }

            $files=file(request('file')->getRealPath());
            $data=(array_slice($files,0));
            $parts =(array_chunk($data, 5000));
            foreach($parts as $part){
                $name=request('file');
                $filename=$name->getClientoriginalName();
                $fileName=uniqid()."_".$name->getClientoriginalName();
                $fileSave=resource_path('file/'.$fileName.'.txt');
                file_put_contents($fileSave,$part);
            }
            $path=$fileSave;
            $filePath=glob($path);
                foreach($filePath as $file){
                    $data=array_map('str_getcsv',file($file));
                    // dd($data);
                    DB::delete('delete from jcbs');
                        foreach($data as $row){
                            // dd($row);
                            jcb::Create([
                                'Field1'=>$row [0],
                                'filename'=>$filename,
                            ]);
                        };
                }
                $data=new jcb();
                $users=$data->getdata();
                return view('upload', ['users' => $users]);
                // foreach ($users as $user) {
                //     echo $user->Debit;


    }

    public function download(){
        $data=new jcb();
        $users=$data->getdata();
        foreach ($users as $user){
            $filename = $user->filename.'.xlsx';
        // dd($filename);
        }
        return Excel::download(new DataExport, $filename);
    }

    public function s()
    {
        $data=new jcb();
        $users=$data->getdata();
        return view('upload',compact('users'));
    }

 }
