<?php

namespace App\Http\Controllers;


use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TypeController extends Controller
{
    
    public function read(Request $request){
        if($request->search){
            $data = DB :: table ('types')
            ->where(function ($query) use ($request) {
            $query->where('type_lit','LIKE','%'.$request->search.'%');
            $query->orWhere ('genre','LIKE','%'.$request->search.'%')->get();
            })->get();
        }else{
            $data = DB :: select ('SELECT * FROM types');
        }
        return view('typeview')->with ('data',$data);
    }

    public function add(){

        return view('typeadd');
    }

    public function insert(Request $request){
        //dd($request->all());
        $request->validate([
            'id_type'=>'required',
            'type_lit'=> 'required',
            'genre'=>'required',
        ]);
    
        DB::insert ('INSERT INTO types (id_type, type_lit, genre) VALUES (:id_type, :type_lit, :genre)',
        [
            'id_type'=>$request->id_type,
            'type_lit'=>$request->type_lit,
            'genre' =>$request->genre,
        ]);
        return redirect()->route('type')->with('success','New Data Added Successfully');
    }

    public function showtype($id_type){
        $data=DB :: table ('types')->where('id_type', $id_type)->first();
        return view('showtype')->with('data', $data);
    }

    public function updatetype(Request $request, $id_type){
        $request->validate([
            'id_type'=>'required',
            'type_lit'=> 'required',
            'genre'=>'required',
        ]);
    
        DB::update ('UPDATE types SET type_lit= :type_lit, genre= :genre WHERE id_type= :id_type',
        [
            'id_type'=>$request->id_type,
            'type_lit'=>$request->type_lit,
            'genre' =>$request->genre,
        ]);
        return redirect()->route('type')->with ('success','Data Update Successfully');
    }

    public function delete($id_type){
        $deleted = DB::table('types')->where('id_type', $id_type)->delete();
        return redirect ()->route('type')->with ('success','Data has been Deleted');
    }
}
