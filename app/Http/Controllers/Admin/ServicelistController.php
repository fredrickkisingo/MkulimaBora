<?php

namespace App\Http\Controllers\Admin;

use App\Models\Servicelist;
use App\Models\Servicecategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ServicelistController extends Controller
{
    public function index()
    {
        $service_category=Servicecategory::all();
        $service_list= Servicelist::all();
        return view('admin.service-list.index')
        ->with('service_category',$service_category)
        ->with('service_list',$service_list);
    }

    public function store(Request $request)
    {
        $serlist= new Servicelist();
        $serlist->serv_cate_id=$request->input('serv_cate_id');
        $serlist->title=$request->input('title');
        $serlist->description=$request->input('description');
        $serlist->duration=$request->input('duration');
        $serlist->price=$request->input('price');
        $serlist->save();
        return redirect()->back()->with('status','Service List is Added');


    }

    public function edit($id)
    {
        $ser_list = Servicelist::find($id);
        $service_category=Servicecategory::all();
        return view('admin.service-list.edit')
        ->with('ser_list',$ser_list)
        ->with('service_category',$service_category);
    }

    public function update(Request $request ,$id)
    {
        $serv_list=Servicelist::find($id);
        $serv_list->serv_cate_id=$request->input('serv_cate_id');
        $serv_list->title=$request->input('title');
        $serv_list->description=$request->input('description');
        $serv_list->duration=$request->input('duration');
        $serv_list->price=$request->input('price');
        $serv_list->update();
        return redirect('/service-list')->with('status','Service List Updated');



    }
}
