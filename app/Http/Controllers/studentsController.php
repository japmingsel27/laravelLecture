<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Students;
use Illuminate\Support\Facades\DB;
class studentsController extends Controller
{
    public function index(){
      $students = Students::all();
      return view('students.add_students', compact('students'));  
    }

    public function get($id){
        $qry = Students::where('studno', $id)->first();
        dd($qry);
    }

    public function store(Request $request){
      
      $request->validate([
        'fname' => 'required|max:50',
        'lname' => 'required|max:50',
        'gender' => 'required|max:1',
        'bdate' => 'required'
      ]);

      $qry = Students::insert([
        'fname' => $request->fname,
        'mname' => $request->mname,
        'lname' => $request->lname,
        'sname' => $request->sname,
        'gender' => $request->gender,
        'bdate' => $request->bdate
      ]);

      return ($qry) ? redirect('/') : redirect('/');
    
    }

    public function updateView($id){
      $student = Students::where('studno', $id)->first();
      return view('students.updateStudentView', compact('student'));
    }

    public function update(){

    }

    public function delete($id){
      $qry = Students::where('studno', $id)->delete();
      return redirect('/');
    }

}
