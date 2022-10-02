@extends('admin.master')
@section('title', 'Edit Schedule | ' . env('APP_NAME'))

@section('content')

    <h1 class=" ml-4">Edit Schedule</h1>
    @include('admin.errors')

    <form action="{{ route('admin.schedule.update',$schedule->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="mb-3 ml-4">
            <label>Day</label>
            <input type="text" name="day" placeholder="Day" class="form-control" value="{{ $schedule->day }}">
        </div>
        <div class="mb-3 ml-4">
            <label>EndDay</label>
            <input type="text" name="EndDay" placeholder="EndDay" class="form-control" value="{{ $schedule->EndDay }}">
        </div>
        <div class="mb-3 ml-4">
            <label>Start</label>
            <input type="time" name="start" placeholder="Start" class="form-control" value="{{ $schedule->start }}">
        </div>
        <div class="mb-3 ml-4">
            <label>End</label>
            <input type="time" name="end" placeholder="End" class="form-control" value="{{ $schedule->end }}">
        </div>
        <button class="btn btn-success px-5 ml-4">Update</button>
    </form>

@stop
