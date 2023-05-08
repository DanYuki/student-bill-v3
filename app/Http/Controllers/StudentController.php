<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Student;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Cell\Cell;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return 'test';
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return "ok";
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }


    // Import data using spreadsheet, esp. in xlsx format

    public function storeImport(Request $request){
        // dd('ok');
        $this->validate($request, [
            'spreadsheet' => 'required|file|mimes:xlsx,xls'
        ]);

        // dd($request->spreadsheet->hashName());
        $importFile = $request->file('spreadsheet');
        // $importFile->storeAs('public/spreadsheets', $importFile->hashName());

        $reader = IOFactory::createReader("Xlsx");
        $spreadsheet = $reader->load($importFile);
        $spreadsheet->setActiveSheetIndex(1);
        // $cellValue = $spreadsheet->getActiveSheet()->getCell('N5')->getValue();
        $cellValue = $spreadsheet->getActiveSheet()->rangeToArray('L5:R53', NULL, TRUE, TRUE, TRUE);
        dd($cellValue);
        $count = 0;
        foreach($cellValue as $data){
            $birthdate = $data['P'];
            $birthdate = str_replace('/', '-', $birthdate);
            Student::create([
                'student_name' => addslashes($data['N']),
                'class' => $data['R'],
                'nisn' => $data['L'],
                'birthdate' => date("Y-m-d", strtotime($birthdate)),
                'gender' => $data['Q']
            ]);
            $count++;
        }
        echo "Data yang masuk : ".$count;
        // dd($cellValue);
        // $cellValue = $spreadsheet->getSheetByName('Daftar Siswa')->getCell('A3')->getValue();
        // dd($cellValue);

        // return $cellValue;
    }
}
