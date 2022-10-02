<?php

namespace App\Http\Controllers\Admin;

use App\Models\Schedule;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;

class ScheduleController extends Controller
{
    public function index()
    {
        Gate::authorize('all_schedule');
        $schedules=Schedule::paginate(10);
        return view('admin.schedule.index',compact('schedules'));
    }

    public function create()
    {
        Gate::authorize('add_schedule');
        return view('admin.schedule.create');

    }

    public function store(Request $request)
    {
        Gate::authorize('add_schedule');
        $request->validate([
            'day'=>'required',
            'start'=>'required',
            'end'=>'required',

        ]);
        $endDay =null ;
        if($request->EndDay){
            $endDay=$request->EndDay;
        }
        Schedule::create([
            'day'=>$request->day,
            'start'=>$request->start,
            'end'=>$request->end,
            'EndDay'=>$endDay,
        ]);
        return redirect()->route('admin.schedule.index')->
        with('msg', 'Schedule added successfully')->with('type', 'success');
    }

    public function show($id)
    {
        Gate::authorize('all_schedule');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        Gate::authorize('edit_schedule');
        $schedule=Schedule::find($id);
        return view('admin.schedule.edit',compact('schedule'));
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
        Gate::authorize('edit_schedule');
        $schedule=Schedule::find($id);
        $request->validate([
            'day'=>'required',
            'start'=>'required',
            'end'=>'required',

        ]);
        $endDay =$schedule->EndDay ;
        if($request->EndDay){
            $endDay=$request->EndDay;
        }
        $schedule->update([
            'day'=>$request->day,
            'start'=>$request->start,
            'end'=>$request->end,
            'EndDay'=>$endDay,

        ]);

        return redirect()->route('admin.schedule.index')->
        with('msg', 'Schedule update successfully')->with('type', 'success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Gate::authorize('delete_schedule');
        $schedule=Schedule::find($id);
        $schedule->delete();
        return redirect()->route('admin.schedule.index')->
        with('msg', 'Schedule delete successfully')->with('type', 'success');
    }

    public function trash()
    {
        Gate::authorize('delete_schedule');
        $schedules = Schedule::onlyTrashed()->paginate(10);
        return view('admin.schedule.trash', compact('schedules'));
    }

    public function restore($id)
    {
        Gate::authorize('delete_schedule');
        // Schedule::onlyTrashed()->find($id)->update(['deleted_at' => null]);
        Schedule::onlyTrashed()->find($id)->restore();
        return redirect()->route('admin.schedule.index')->with('msg', 'Schedule restored successfully')->with('type', 'warning');
    }

    public function forcedelete($id)
    {
        Gate::authorize('delete_schedule');
        Schedule::onlyTrashed()->find($id)->forcedelete();
        return redirect()->route('admin.schedule.index')->with('msg', 'Schedule deleted permanintly successfully')->with('type', 'danger');
    }
}



