<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\StudentBill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Student;
use App\Models\PaymentHistory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Cell\Cell;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $students = Student::paginate(20);
        return view('students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('students.add');
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
    public function show(string $student_id)
    {
        $p_histories = PaymentHistory::where('student_id', $student_id)->get();

        $datas = DB::table('student_bills')
            ->join('bills', 'student_bills.bill_id', '=', 'bills.bill_id')
            ->select('bills.bill_name', 'student_bills.bill_amount', 'student_bills.created_at')
            ->where('student_bills.student_id', '=', $student_id)
            ->get();

        return view('students.detail', compact('p_histories', 'datas', 'student_id'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('students.detail');
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

    public function import(){
        return view('students.import');
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
        return redirect()->route('student.index')->with('message', 'Berhasil import data sejumlah : '.$count);
    }
}
