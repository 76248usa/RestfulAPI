<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Model\Subject;

class SubjectController extends Controller
{

    public function index()
    {
        $subjects = DB::table('subjects')->get();
        return response()->json($subjects);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'subject_name' => 'required',
            'class_id' => 'required',
            'subject_code' => 'required'
        ]);

        $subject = Subject::create($request->all());
        return response()->json('Inserted');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $subject = DB::table('subjects')->where('id',$id)->first();
        return response()->json($subject);
    }

    public function update(Request $request, $id)
    {
        $subject = Subject::findOrFail($id);

        $ValidateData = $request->validate([
            'subject_name' => 'required',
            'subject_code' => 'required',
            'class_id' => 'required'
        ]);

        $subject->update([
            'subject_name' => $request->subject_name,
            'subject_code' => $request->subject_code,
            'class_id' => $request->class_id

        ]);
        return response()->json('Updated');
    }

    public function destroy($id)
    {
        $subject = Subject::find($id)->delete();
    }
}
