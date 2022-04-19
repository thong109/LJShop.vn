<?php

namespace App\Imports;

use App\Models\Word;
use Maatwebsite\Excel\Concerns\ToModel;

class ProductImports implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Word([
            'name'=> $row[0],
            'photo'=> $row[1],
            'phone_ext'=> $row[2],
            'mobile'=> $row[3],
            'email'=> $row[4],
            'position'=> $row[5],
            'position_other'=> $row[6],
            'address'=> $row[7],
            'phone'=> $row[8],
            'birthday'=> $row[9],
            'place_birth'=> $row[10],
            'description'=> $row[11],
            'addtime'=> $row[12],
            'edittime'=> $row[13],
            'organid'=> $row[14],
            'weight'=> $row[15],
            'active'=> $row[16],
            'dayinto'=> $row[17],
            'dayparty'=> $row[18],
            'marital_status'=> $row[19],
            'professional'=> $row[20],
            'political'=> $row[21],
        ]);
    }
}
