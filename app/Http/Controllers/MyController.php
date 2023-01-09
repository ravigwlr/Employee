<?php

namespace App\Http\Controllers;
    
use Illuminate\Http\Request;
use App\Exports\UsersExport;
use App\Imports\UsersImport;
use App\Models\User;
use PDF;
use Maatwebsite\Excel\Facades\Excel;
    
class MyController extends Controller
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function importView()
    {
       return view('import');
    }
     
    /**
    * @return \Illuminate\Support\Collection
    */
    public function export() 
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }
     
    /**
    * @return \Illuminate\Support\Collection
    */
    public function import() 
    {
        Excel::import(new UsersImport,request()->file('file'));
             
        return back();
    }

    public function generatePDF()
    {
        $users = User::get();

        $data = [
            'title' => 'Employees',
            'users' => $users
        ];
          
        $pdf = PDF::loadView('myPDF', $data);
    
        return $pdf->download('employee.pdf');
    }
}
