<?php

namespace App\Imports;

use App\Models\Stok;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class StokImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {

        
        $stok = new Stok([
            "stokkodu" => $row['stokkodu'],
            "stokadi" => $row['stokadi'],
            "barkodu" => $row['barkodu'],
            "grubu" => $row['grubu'],
            "altgrubu" => $row['altgrubu'],
            "marka" => $row['marka'],
            "birimi" => $row['birimi'],
            "alisfiyati" => $row['alisfiyati'],
            "perakendesatis" => $row['perakendesatis'],
            "vadelisatis" => $row['vadelisatis'],
            "kdvalis" => $row['kdvalis'],
            "kdvsatisprk" => $row['kdvsatisprk'],
            "kdvsatistptn" => $row['kdvsatistptn'],
            "indirim" => $row['indirim'],
            "ozelkodu" => $row['ozelkodu'],
            "durum" => $row['durum'],
            "aciklama" => $row['aciklama'],
            "resim" => $row['resim']
        ]);

        return $stok;

    }
}
