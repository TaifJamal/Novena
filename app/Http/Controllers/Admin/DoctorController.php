<?php

namespace App\Http\Controllers\Admin;

use App\Models\Doctor;
use App\Models\Schedule;
use App\Models\Department;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Gate;

class DoctorController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:doctor-list|doctor-create|doctor-edit|doctor-delete', ['only' => ['index','store']]);
         $this->middleware('permission:doctor-create', ['only' => ['create','store']]);
         $this->middleware('permission:doctor-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:doctor-delete', ['only' => ['destroy']]);
    }
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index()
   {
       $doctors=Doctor::with('department')->paginate(10);
       return view('admin.doctor.index',compact('doctors'));
   }

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create()
   {
       $schedules = Schedule::all();
       $departments =Department::select('id','name')->get();
       return view('admin.doctor.create',compact('departments','schedules'));

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
           'department_id'=>'required',
           'name'=>'required',
           'image'=>'required',
           'description'=>'required',
            'skills'=>'required',
            'facebook'=>'required',
            'twitter'=>'required',
            'skype'=>'required',
            'schedule_id'=>'required'
       ]);
       $img_name=rand().time().$request->file('image')->getClientOriginalName();
       $request->file('image')->move(public_path('image/doctors'),$img_name);

       Doctor::create([
           'department_id'=>$request->department_id,
           'name'=>$request->name,
           'image'=>$img_name,
           'description'=>$request->description,
           'skills'=>$request->skills,
           'facebook'=>$request->facebook,
           'twitter'=>$request->twitter,
           'skype'=>$request->skype
       ]);

       $doctor = Doctor::orderByDesc('id')->first();
       $doctor->schedules()->sync($request->schedule_id);
       return redirect()->route('admin.doctor.index')->
       with('msg', 'Doctor added successfully')->with('type', 'success');
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
        $schedules = Schedule::all();
        $doctor=Doctor::find($id);
        $departments =Department::select('id','name')->get();
       return view('admin.doctor.edit',compact('doctor','departments','schedules'));
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
       $doctor=Doctor::find($id);
       $request->validate([
        'department_id'=>'required',
        'name'=>'required',
        'description'=>'required',
        'skills'=>'required',
        'facebook'=>'required',
        'twitter'=>'required',
        'skype'=>'required',
        'schedule_id'=>'required'
       ]);
       $img_name=$doctor->image;
       if($request->image){
       $img_name=rand().time().$request->file('image')->getClientOriginalName();
       $request->file('image')->move(public_path('image/doctors'),$img_name);
       File::delete(public_path('image/doctors/'.$doctor->image));
       }

       $doctor->update([
        'department_id'=>$request->department_id,
        'name'=>$request->name,
        'image'=>$img_name,
        'description'=>$request->description,
        'skills'=>$request->skills,
        'facebook'=>$request->facebook,
        'twitter'=>$request->twitter,
        'skype'=>$request->skype

       ]);
       $doctor->schedules()->sync($request->schedule_id);
       return redirect()->route('admin.doctor.index')->
       with('msg', 'Doctor update successfully')->with('type', 'success');
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function destroy($id)
   {
       $doctor=Doctor::find($id);
       File::delete(public_path('image/doctors/'.$doctor->image));
       $doctor->delete();
       return redirect()->route('admin.doctor.index')->
       with('msg', 'Doctor delete successfully')->with('type', 'success');
   }

   public function trash()
   {
       $doctors = Doctor::onlyTrashed()->paginate(10);
       return view('admin.doctor.trash', compact('doctors'));
   }

   public function restore($id)
   {
       Doctor::onlyTrashed()->find($id)->restore();
       return redirect()->route('admin.doctor.index')->with('msg', 'Doctor restored successfully')->with('type', 'warning');
   }

   public function forcedelete($id)
   {
       Doctor::onlyTrashed()->find($id)->forcedelete();
       return redirect()->route('admin.doctor.index')->with('msg', 'Doctor deleted permanintly successfully')->with('type', 'danger');
   }
}
