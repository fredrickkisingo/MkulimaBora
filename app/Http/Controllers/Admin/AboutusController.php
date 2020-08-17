<?php

namespace App\Http\Controllers\Admin;

use Session;
use App\Models\Abouts;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AboutusController extends Controller
{
    public function index(){
        $aboutus = Abouts::all(); //here we are using the eloquent model technique
        return view('admin.aboutus')->with('aboutus',$aboutus);
    }

    public function store(Request $request){

            $aboutus= new Abouts;
            $aboutus->title = $request->input('title');
            $aboutus->subtitle = $request->input('subtitle');
            $aboutus->description = $request->input('description');

            $aboutus->save();

            Session::flash('statuscode','success');
            return redirect('/abouts')->with('status','Data Added for About Us');


    }

  
    public function edit($id){
        $aboutus = Abouts::findOrFail($id);
        return view('admin.abouts.edit')
        ->with('aboutus',$aboutus);

    }

    public function update(Request $request, $id)
    {
        $aboutus=  Abouts::findOrFail($id);
        $aboutus->title =$request->input('title');
        $aboutus->subtitle =$request->input('subtitle');
        $aboutus->description =$request->input('description');
        $aboutus->update();

        Session::flash('statuscode','info');
        return redirect('abouts')->with('status','Data Added for About us');

    }

    public function delete($id){
        $aboutus= Abouts::findOrFail($id);
        $aboutus->delete();


        Session::flash('statuscode','error');
        return redirect('abouts')->with('status','Data Deleted');

    }

}
