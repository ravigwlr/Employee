<?php

namespace App\Imports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;

class UsersImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new User([
            'name'     => $row['name'],
            'email'    => $row['email'],
            'dob'    => $row['dob'], 
            'gender'    => $row['gender'],
            'password' => \Hash::make($row['password']),
            'salary'    => $row['salary'],
            'designation'    => $row['designation'],
            'address'    => $row['address'],
        ]);
    }
}
