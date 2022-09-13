<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class SclassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sclass = DB::table('sclasses')->get();
        return response()->json($sclass);
    }





    public function store(Request $request)
    {
        $validate = $request->validate([
            'class_name' => 'required'
        ]);

        $classname = DB::table('sclasses')->insert([
            'class_name' => $request->class_name
        ]);

        return response('Inserted successfully');
    }

    public function update(Request $request, $id){
        $class = DB::table('sclasses')->where('id', $id)->update([
            'class_name' => $request->class_name
        ]);
        return response('Updated');
    }

    public function show($id)
    {
        $class = DB::table('sclasses')->where('id', $id)->first();
        return response()->json($class);
    }

    public function destroy($id)
    {
        $class = DB::table('sclasses')->where('id',$id)->delete();

        return response('Deleted successfully');
    }
}
