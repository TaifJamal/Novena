<?php

namespace App\Http\Controllers\Admin;

use App\Models\Doctor;
use Illuminate\Http\Request;
use App\Models\Qualification;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Gate;

class QualificationController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Gate::authorize('all_qualification');
        $qualifications=Qualification::with('doctor')->paginate(10);
        return view('admin.qualification.index',compact('qualifications'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Gate::authorize('add_qualification');
        $doctors=Doctor::select('id','name')->get();
        return view('admin.qualification.create',compact('doctors'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Gate::authorize('add_qualification');

        $request->validate([
            'name'=>'required',
            'place'=>'required',
            'Year'=>'required',
            'content'=>'required',
            'doctor_id'=>'required',
        ]);
        $img_name= '';
        if($request->image){
            $img_name=rand().time().$request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('image/qualifications'),$img_name);
        }

        Qualification::create([
            'name'=>$request->name,
            'place'=>$request->place,
            'Year'=>$request->Year,
            'content'=>$request->content,
            'doctor_id'=>$request->doctor_id,
            'image'=>$img_name,
        ]);
        return redirect()->route('admin.qualification.index')->
        with('msg', 'Qualification added successfully')->with('type', 'success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        Gate::authorize('all_qualification');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        Gate::authorize('edit_qualification');
        $doctors=Doctor::select('id','name')->get();
        $qualification=Qualification::find($id);
        return view('admin.qualification.edit',compact('qualification','doctors'));
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
        Gate::authorize('edit_qualification');
        $qualification=Qualification::find($id);
        $request->validate([
            'name'=>'required',
            'place'=>'required',
            'Year'=>'required',
            'content'=>'required',
            'doctor_id'=>'required',
        ]);
        $img_name=$qualification->image;
        if($request->image){
        $img_name=rand().time().$request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path('image/qualifications'),$img_name);
        File::delete(public_path('image/qualifications/'.$qualification->image));

        }

        $qualification->update([
            'name'=>$request->name,
            'place'=>$request->place,
            'Year'=>$request->Year,
            'content'=>$request->content,
            'doctor_id'=>$request->doctor_id,
            'image'=>$img_name,

        ]);

        return redirect()->route('admin.qualification.index')->
        with('msg', 'Qualification update successfully')->with('type', 'success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Gate::authorize('delete_qualification');

        $qualification=Qualification::find($id);
        File::delete(public_path('image/qualifications/'.$qualification->image));
        $qualification->delete();
        return redirect()->route('admin.qualification.index')->
        with('msg', 'Qualification delete successfully')->with('type', 'success');
    }

    public function trash()
    {
        Gate::authorize('delete_qualification');
        $qualifications = Qualification::onlyTrashed()->paginate(10);
        return view('admin.qualification.trash', compact('qualifications'));
    }

    public function restore($id)
    {
        Gate::authorize('delete_qualification');
        // Qualification::onlyTrashed()->find($id)->update(['deleted_at' => null]);
        Qualification::onlyTrashed()->find($id)->restore();
        return redirect()->route('admin.qualification.index')->with('msg', 'Qualification restored successfully')->with('type', 'warning');
    }

    public function forcedelete($id)
    {
        Gate::authorize('delete_qualification');
        Qualification::onlyTrashed()->find($id)->forcedelete();
        return redirect()->route('admin.qualification.index')->with('msg', 'Qualification deleted permanintly successfully')->with('type', 'danger');
    }
}
