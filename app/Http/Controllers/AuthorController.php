<?php

namespace App\Http\Controllers;


use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



class AuthorController extends Controller
{
    //membuat function utk mendefinisikan method index di file web.php
    public function read(Request $request){
        if($request->search){
            $data = DB :: table ('authors')
            ->where('deleted_at', '=', NULL)
            ->where(function ($query) use ($request) {
                $query->where ('name','LIKE','%'.$request->search.'%');
                $query->orWhere ('year','LIKE','%'.$request->search.'%');
                $query->orWhere ('country','LIKE','%'.$request->search.'%');
            })->get();
        }else{
            $data = DB :: select ('SELECT * FROM authors WHERE deleted_at is NULL');
        }
        return view('authorview')->with ('data',$data);
    }

    public function add(){

        return view('authoradd');
    }

    public function insert(Request $request){
        //dd($request->all());
         $request->validate([
            'id_aut'=>'required',
            'name'=> 'required',
            'country'=>'required',
            'year'=>'required',
        ]);
    
        DB::insert ('INSERT INTO authors(id_aut, name, country, year) VALUES (:id_aut, :name, :country, :year)',
        [
            'id_aut'=>$request->id_aut,
            'name'=> $request->name,
            'country'=>$request->country,
            'year'=>$request->year,
        ]);
            
            return redirect ()->route('author')->with ('success','New Data Added Successfully');
    }

    public function showauthor($id_aut){
        //dd($id_aut);
        $data=DB :: table ('authors')->where('id_aut', $id_aut)->first();
        return view('showauthor')->with('data', $data);
    }

    public function updateauthor(Request $request, $id_aut){
        //dd($request)->all();
        $request->validate([
            // 'id_aut'=>'required',
            'name'=> 'required',
            'country'=>'required',
            'year'=>'required',
        ]);
        DB::update ('UPDATE authors SET name= :name, country= :country, year= :year WHERE id_aut= :id_aut',
        [
            
            'id_aut'=>$request->id_aut,
            'name'=> $request->name,
            'country'=>$request->country,
            'year'=>$request->year,
        ]);
        return redirect()->route('author')->with ('success','Data Update Successfully');
        
    }

    public function delete($id_aut){
        $deleted = DB::table('authors')->where('id_aut', $id_aut)->delete();
        return redirect ()->route('author')->with ('success','Data has been Delete');
    }

    public function softDelete($id_aut){
        $data=DB :: table ('authors')->where('id_aut', $id_aut)->update(['deleted_at' => now()]);
        return redirect ()->route('author')->with ('success','Data has been Delete');
    }
}
