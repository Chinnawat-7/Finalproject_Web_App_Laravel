<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    public function index(){
        //auth()->user()->role()->assignRole('users');
        $student=Student::paginate(10);
        if( $user=auth()->user()->hasRole("admin")){
            $user=auth()->user();
            $user->givePermissionTo('manage');
        }
        
        else{
            $user=auth()->user();
            $user->givePermissionTo('read');
        }
        return view('admin.student.index',compact('student'));
    }
    
    public function store(Request $request){
        
        //ตรวจสอบข้อมูล
        $request->validate([
            'student_name'=>'required',
            'student_id'=>'required',
            'student_subject'=>'required|unique:students'
        ]);
        //บันทึกข้อมูล
        $student = new Student;
        $student->student_name = $request->student_name;
        $student->student_id = $request->student_id;
        $student->student_subject = $request->student_subject;
        $student->user_id = Auth::user()->id;
        $student->save();
        return redirect()->back()->with('success',"บันทึกข้อมูลสำเร็จ");
    }

    public function edit($id){
        $student = Student::find($id);
        return view('admin.student.edit',compact('student'));
        
    }

    public function update(Request $request,$id){
        //ตรวจสอบข้อมูล
        $request->validate([
            'student_name'=>'required',
            'student_id'=>'required',
            'student_subject'=>'required'
        ]);
        $update = Student::find($id)->update([ 
            'student_name'=>$request->student_name,
            'student_id'=>$request->student_id,
            'student_subject'=>$request->student_subject,
            'user_id'=>Auth::user()->id,
        ]);
        return redirect()->route('student')->with('success',"อัพเดทข้อมูลสำเร็จ");
    }

    public function delete($id){
        $delete = Student::find($id)->forceDelete();
        return redirect()->route('student')->with('success',"ลบข้อมูลเรียบร้อย");
    }

    

}
