<?php

namespace App\Http\Controllers\Admin;

use App\Models\Doctor;
use App\Models\Feature;
use App\Models\Department;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;

class FeatureController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:feature-list|feature-create|feature-edit|feature-delete', ['only' => ['index','store']]);
         $this->middleware('permission:feature-create', ['only' => ['create','store']]);
         $this->middleware('permission:feature-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:feature-delete', ['only' => ['destroy']]);
    }
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index()
   {
       $features=Feature::with('department','doctor')->paginate(10);
       return view('admin.feature.index',compact('features'));
   }

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create()
   {
       $departments=Department::select('id','name')->get();
       $doctors=Doctor::select('id','name')->get();
       return view('admin.feature.create',compact('departments','doctors'));

   }

   /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
   public function store(Request $request)
   {
       $request->validate([
           'content'=>'required',
           'type'=>'required',
       ]);

       Feature::create([
           'department_id'=>$request->department_id,
           'doctor_id'=>$request->doctor_id,
           'content'=>$request->content,
           'type'=>$request->type,

       ]);
       return redirect()->route('admin.feature.index')->
       with('msg', 'Feature added successfully')->with('type', 'success');
   }

   /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function show($id)
   {

   }

   /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function edit($id)
   {
       $departments=Department::select('id','name')->get();
       $doctors=Doctor::select('id','name')->get();
       $feature=Feature::find($id);
       return view('admin.feature.edit',compact('feature','departments','doctors'));
   }

   /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function update(Request $request, $id)
   {
       $feature=Feature::find($id);
       $request->validate([
        'content'=>'required',
       ]);
       $feature->update([
        'department_id'=>$request->department_id,
        'doctor_id'=>$request->doctor_id,
        'content'=>$request->content,
        'type'=>$feature->type,
       ]);

       return redirect()->route('admin.feature.index')->
       with('msg', 'Feature update successfully')->with('type', 'success');

    }
   /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function destroy($id)
   {
       Feature::destroy($id);
       return redirect()->route('admin.feature.index')->
       with('msg', 'Feature delete successfully')->with('type', 'success');
   }

   public function trash()
   {
       $features = Feature::onlyTrashed()->paginate(10);
       return view('admin.feature.trash', compact('features'));
   }

   public function restore($id)
   {
       Feature::onlyTrashed()->find($id)->restore();
       return redirect()->route('admin.feature.index')->with('msg', 'Feature restored successfully')->with('type', 'warning');
   }

   public function forcedelete($id)
   {
       Feature::onlyTrashed()->find($id)->forcedelete();
       return redirect()->route('admin.feature.index')->with('msg', 'Feature deleted permanintly successfully')->with('type', 'danger');
   }
}
