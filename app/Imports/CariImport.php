<?php

namespace App\Imports;

use App\Models\Cari;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CariImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {

        
        $cari = new Cari([
            "carikodu" => $row['carikodu'],
            "cariadi" => $row['cariadi'],
            "carigrubu" => $row['carigrubuno'],
            "tcno" => $row['tcno'],
            "vergino" => $row['vergino'],
            "ticariunvan" => $row['ticariunvan'],
            "adres" => $row['adres'],
            "telefon" => $row['telefon'],
            "email" => $row['email'],
            "image" => $row['image'],
            "durum" => $row['durum'],
            "ozelkod" => $row['ozelkod']
        ]);

        return $cari;

    }
}