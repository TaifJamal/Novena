<?php

namespace App\Http\Controllers\Site;

use App\Models\Award;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\Contact;
use App\Models\About;
use App\Models\Appoinment;
use App\Models\Department;
use App\Models\Doctor;
use App\Models\Partner;
use App\Models\Qualification;
use Illuminate\Support\Facades\Mail;

class SiteController extends Controller
{
    public function index()
    {
        $departments =Department::all();
        $awards = Award::paginate(10);
        $testimonials = Testimonial::where('type','home')->paginate(10);
        $partners = Partner::paginate(10);
        return view('site.index',compact('awards','testimonials','partners','departments'));
    }

    public function about()
    {
        $abouts = About::where('type','about')->paginate(10);
        $qualifications= Qualification::where('image','!=','')->select('image')->paginate(10);
        $doctors = Doctor::select('id','name','image')->get();
        $testimonials = Testimonial::where('type','about')->paginate(10);
        return view('site.about',compact('abouts','qualifications','doctors','testimonials'));
    }

    public function service()
    {
        $services = About::where('type','service')->paginate(10);
        return view('site.service',compact('services'));
    }

    public function department()
    {
        $departments= Department::paginate(10);
        return view('site.department',compact('departments'));
    }

    public function department_single($id)
    {
        $department= Department::find($id);
        $features = $department->features;
        $schedules = $department->schedules;
        return view('site.department-single',compact('department','features','schedules'));
    }

    public function doctor()
    {
       $departments= Department::all();
       return view('site.doctor',compact('departments'));
    }

    public function doctor_single($id)
    {
        $doctor = Doctor::find($id);
        $expertises = $doctor->features;
        $schedules = $doctor->schedules;
        return view('site.doctor-single',compact('doctor','expertises','schedules'));
    }

    public function contact()
    {
        return view('site.contact');
    }

    public function contact_data(Request $request)
    {
        $data=$request->except('_token','submit');
        Mail::to('taif@gimal.com')->send(new Contact($data));
    }

    public function appoinment()
    {
        $departments =Department::all();
        return view('site.appoinment',compact('departments'));
    }

    public function appoinment_data(Request $request)
    {
       return Department::find($request->id)->doctors;
    }

    public function appoinment_data_form(Request $request)
    {
        $request->validate([
            'date'=>'required',
            'time'=>'required',
            'name'=>'required',
            'phone'=>'required',
            'message'=>'required',
            'department_id'=>'required',
            'doctor_id'=>'required'
        ]);

        Appoinment::create([
            'date'=>$request->date,
            'time'=>$request->time,
            'name'=>$request->name,
            'phone'=>$request->phone,
            'message'=>$request->message,
            'department_id'=>$request->department_id,
            'doctor_id'=>$request->doctor_id,
        ]);

        return redirect()->route('site.confirmation')->with('msg', 'Appoinment Created Successfully');

    }

    public function confirmation()
    {
        return view('site.confirmation');
    }
}
