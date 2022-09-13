<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Model\Student;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::all();
        return response()->json($students);

    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'class_id' => 'required',
            'subject_id' => 'required',
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'password' => 'required',
            'address' => 'required',
            'gender' => 'required'

        ]);

        $students = DB::table('students')->insert([
            'class_id' => $request->class_id,
            'subject_id' => $request->subject_id,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'photo' => $request->photo,
            'address' => $request->address,
            'gender' => $request->gender
        ]);

        return response()->json($students);
    }

    public function show($id)
    {
        $student = DB::table('students')->where('id',$id)->get();
        return response()->json($student);
    }

    public function update(Request $request, $id)
    {
        $student = DB::table('students')->update([
            'class_id' => $request->class_id,
           // 'subject_id' => $request->subject_id,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'photo' => $request->photo,
            'address' => $request->address,
            'gender' => $request->gender
        ]);
        return response('Updated');
    }


    public function destroy($id)
    {
        DB::table('students')->where('id',$id)->delete();
        return response('Deleted');
    }
}
