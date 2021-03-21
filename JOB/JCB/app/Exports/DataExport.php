<?php

namespace App\Exports;

use App\Models\jcb;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Events\AfterSheet;

class DataExport implements FromCollection,WithHeadings,WithMapping
{

    use Exportable;

    public function collection()
    {
        return collect(jcb::getdata());
    }
    public function headings(): array
    {
        return [
            'No',
            'Institution Code',
            'Acquiring Bank Name',
            'Account Number',
            'Settlement Date',
            'MPU Commussion',
            'Acquiriing Settlement Amount',
            'Debit',
            'Credit',
        ];
    }
    public function map($users): array
    {
        return [

            $users->NO,
            $users->Institution_Code,
            $users->Short_Name,
            $users->Account_Number,
            $users->filename,
            $users->MPU_Comm,
            $users->Acq_Bank_Settle_Amt,
            $users->Debit,
            $users->Credit,
        ];
    }

}
