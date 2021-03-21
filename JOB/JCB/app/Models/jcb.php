<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class jcb extends Model
{
    protected $guarded  =[];
    use HasFactory;
    public static function getdata()
    {
        DB::statement(DB::raw('set @row:=0'));
         $users=DB::select('select (@row:=@row + 1) AS NO,filename,substring(A.Field1,1,12) as Institution_Code,B.Short_Name,B.Account_Number,
            CASE
                 WHEN substring(A.Field1,1,12) like "000%" THEN format(substring(A.Field1,162,28),2)
                 ELSE "0.00"
                 END AS MPU_Comm,
            CASE
                WHEN substring(A.Field1,1,12) like "000%" THEN "0.00"
                WHEN substring(A.Field1,139,2) like substring(A.Field1,160,2) THEN format(replace(substring(A.Field1,141,19),","," ") + replace(substring(A.Field1,162,28),","," "),2)
                ELSE format(replace(substring(A.Field1,141,19),","," ") - replace(substring(A.Field1,162,28),","," "),2)
                END AS Acq_Bank_Settle_Amt,
            CASE
                WHEN substring(A.Field1,1,12) like "000%" THEN "0.00"
                WHEN substring(A.Field1,139,2) like "D%" and substring(A.Field1,160,2) like "D%" THEN format(replace(substring(A.Field1,141,19),","," ") + replace(substring(A.Field1,162,28),","," "),2)
                ELSE "0.00"
                END AS Debit,
            CASE
                WHEN substring(A.Field1,1,12) like "000%" THEN format(substring(A.Field1,162,28),2)
                WHEN substring(A.Field1,139,2) like "C%" and substring(A.Field1,160,2) like "C%" THEN format(replace(substring(A.Field1,141,19),","," ") + replace(substring(A.Field1,162,28),","," "),2)
                WHEN substring(A.Field1,139,2) like "C%" and substring(A.Field1,160,2) like "D%" THEN format(replace(substring(A.Field1,141,19),","," ") - replace(substring(A.Field1,162,28),","," "),2)
                WHEN substring(A.Field1,139,2) like "D%" and substring(A.Field1,160,2) like "C%" THEN format(replace(substring(A.Field1,141,19),","," ") - replace(substring(A.Field1,162,28),","," "),2)
                ELSE "0.00"
                END AS Credit,
            substring(A.Field1,203,3) as Currency from jcbs A inner join institutiion_codes B
            on substring(A.Field1,1,12) = B.Institution_Code');

            return $users;
    }

}
