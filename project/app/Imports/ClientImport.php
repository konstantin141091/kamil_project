<?php

namespace App\Imports;

use App\Models\ClientModel;
use Maatwebsite\Excel\Concerns\ToModel;

class ClientImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new ClientModel([
            'client'     => $row[0],
            'source'    => $row[1],
            'address' => $row[2],
            'phone' => $row[3],
            'sum' => $row[4],
            'comment' => $row[5],
        ]);
    }
}
