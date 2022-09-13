<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sections = DB::table('sections')->get();
        return response()->json($sections);

    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'section_name' => 'required',

            'class_id' => 'required'
        ]);

        DB::table('sections')->insert([
            'section_name' => $request->section_name,

            'class_id' => $request->class_id
        ]);

        return response()->json('Inserted');
    }

    public function show($id)
    {
        $section = DB::table('sections')->where('id',$id)->first();
        return response()->json($section);
    }

    public function update(Request $request, $id)
    {
        $section = DB::table('sections')->where('id',$id);

        $section->update([
            'section_name' => $request->section_name,

            'class_id' => $request->class_id
        ]);

        return response()->json('Updated');
    }

    public function destroy($id)
    {
        DB::table('sections')->where('id',$id)->delete();
        return response()->json('Deleted');
    }
}
