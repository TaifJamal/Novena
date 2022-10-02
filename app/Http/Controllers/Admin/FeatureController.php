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
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index()
   {
       Gate::authorize('all_feature');
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
      Gate::authorize('add_feature');
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
    Gate::authorize('add_feature');
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
     Gate::authorize('all_feature');
   }

   /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function edit($id)
   {
      Gate::authorize('edit_feature');
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
      Gate::authorize('edit_feature');
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
      Gate::authorize('delete_feature');
       Feature::destroy($id);
       return redirect()->route('admin.feature.index')->
       with('msg', 'Feature delete successfully')->with('type', 'success');
   }

   public function trash()
   {
       Gate::authorize('delete_feature');
       $features = Feature::onlyTrashed()->paginate(10);
       return view('admin.feature.trash', compact('features'));
   }

   public function restore($id)
   {
       Gate::authorize('delete_feature');
       Feature::onlyTrashed()->find($id)->restore();
       return redirect()->route('admin.feature.index')->with('msg', 'Feature restored successfully')->with('type', 'warning');
   }

   public function forcedelete($id)
   {
       Gate::authorize('delete_feature');
       Feature::onlyTrashed()->find($id)->forcedelete();
       return redirect()->route('admin.feature.index')->with('msg', 'Feature deleted permanintly successfully')->with('type', 'danger');
   }
}
