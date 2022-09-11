<?php

namespace App\Imports;

use App\Formatilies;
use Maatwebsite\Excel\Concerns\ToModel;

class FormalitiesImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return Formatilies|null
     */
    public function model(array $row)
    {
        return new Formatilies([
           'name'     => $row[0],
           'email'    => $row[1]
        ]);
    }
}
