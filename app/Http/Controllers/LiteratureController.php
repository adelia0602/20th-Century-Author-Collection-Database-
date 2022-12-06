<?php

namespace App\Http\Controllers;

use App\Models\Literature;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class LiteratureController extends Controller
{
    public function read(Request $request) {

        if($request->has('search')){
            //$data = Literatures :: where('name_lit','LIKE','%'.$request->search.'%')->get();
            $data = DB::table('literatures')
            ->join('authors', 'authors.id_aut', '=', 'literatures.id_aut')
            ->join('types', 'types.id_type', '=', 'literatures.id_type') 
            ->select('literatures.id_lit','authors.name', 'literatures.name_lit','literatures.year_lit', 'types.type_lit','types.genre')
            ->where('literatures.deleted_at', '=', NULL)
            ->where(function ($query) use ($request) {
                $query->where ('literatures.name_lit','LIKE','%'.$request->search.'%');
                $query->orWhere ('literatures.year_lit','LIKE','%'.$request->search.'%');
                $query->orWhere ('authors.name','LIKE','%'.$request->search.'%');
                $query->orWhere ('types.type_lit','LIKE','%'.$request->search.'%');
                $query->orWhere ('types.genre','LIKE','%'.$request->search.'%');
            })->get();
        }else{
            $data = DB::table('literatures')
            ->join('authors', 'authors.id_aut', '=', 'literatures.id_aut')
            ->join('types', 'types.id_type', '=', 'literatures.id_type')
            ->select('literatures.id_lit','authors.name', 'literatures.name_lit','literatures.year_lit', 'types.type_lit','types.genre')
            ->where ('Literatures.deleted_at','=',NULL)
            ->get();
        }
        return view('literatureview', compact ('data'));
    }

    public function add(){

        return view('literatureadd');
    }

    public function insert(Request $request){
        // dd($request->all());
        $request->validate([
            'id_lit'=>'required',
            'name_lit'=> 'required',
            'year_lit'=>'required',
            'id_aut'=>'required',
            'id_type'=>'required',
        ]);
    
        DB::insert ('INSERT INTO literatures(id_lit, name_lit, year_lit, id_aut, id_type) VALUES (:id_lit, :name_lit, :year_lit, :id_aut, :id_type)',
        [
            'id_lit'=>$request->id_lit,
            'name_lit'=> $request->name_lit,
            'year_lit'=>$request->year_lit,
            'id_aut'=>$request->id_aut,
            'id_type'=>$request->id_type,
        ]);
            
            return redirect ()->route('literature')->with ('success','New Data Added Successfully');
    }

    public function showliterature($id_lit){
        
        $data=DB :: table ('literatures')->where('id_lit', $id_lit)->first();
        return view('showliterature')->with('data', $data);
    }

    public function updateliterature(Request $request, $id_lit){
        $request->validate([
            'id_lit'=>'required',
            'name_lit'=> 'required',
            'year_lit'=>'required',
            'id_aut'=>'required',
            'id_type'=>'required',
        ]);
        DB::update ('UPDATE literatures SET name_lit= :name_lit, year_lit= :year_lit, id_aut= :id_aut, id_type= :id_type WHERE id_lit= :id_lit',
        [
            
            'id_lit'=>$request->id_lit,
            'name_lit'=> $request->name_lit,
            'year_lit'=>$request->year_lit,
            'id_aut'=>$request->id_aut,
            'id_type'=>$request->id_type,
        ]);
        return redirect()->route('literature')->with ('success','Data Update Successfully');
    }
    
    public function delete($id_lit){
        $deleted = DB::table('literatures')->where('id_lit', $id_lit)->delete();
        return redirect ()->route('literature')->with ('success','Data Deleted Permanently');
    }
    
    public function softDelete($id_lit){
        $data=DB :: table ('literatures')->where('id_lit', $id_lit)->update(['deleted_at' => now()]);
        return redirect ()->route('literature')->with ('success','Data has been Deleted');
    }

}
