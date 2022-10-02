@extends('admin.master')
@section('title', 'Edit Department | ' . env('APP_NAME'))

@section('content')

    <h1 class=" ml-4">Edit Department</h1>
    @include('admin.errors')

    <form action="{{ route('admin.doctor.update',$doctor->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="mb-3 ml-4">
            <label>Name</label>
            <input type="text" name="name" placeholder="Name" class="form-control" value="{{ $doctor->name }}">
        </div>
        <div class="mb-3 ml-4">
            <label>description</label>
            <textarea name="description" placeholder="description" class="form-control">{{ $doctor->description }}</textarea>
        </div>
        <div class="mb-3 ml-4">
            <label>Skills</label>
            <input type="text" name="skills" placeholder="Skills" class="form-control" value="{{ $doctor->skills }}">
        </div>
        <div class="mb-3 ml-4">
            <label>Facebook</label>
            <input type="text" name="facebook" placeholder="Facebook" class="form-control" value="{{ $doctor->facebook }}">
        </div>
        <div class="mb-3 ml-4">
            <label>Twitter</label>
            <input type="text" name="twitter" placeholder="Twitter" class="form-control" value="{{ $doctor->twitter }}">
        </div>
        <div class="mb-3 ml-4">
            <label>Skype</label>
            <input type="text" name="skype" placeholder="Skype" class="form-control" value="{{ $doctor->skype }}">
        </div>
        <div class="mb-3 ml-4">
            <label>Department</label>
            <select name="department_id" class="form-control">
                <option value="">selected</option>
               @foreach ($departments as $item)
                    <option {{ $item->id==$doctor->id ?'selected': '' }} value="{{ $item->id }}">{{ $item->name }}</option>
               @endforeach
            </select>
        </div>
        <div class="mb-3 ml-4">
            <label>Image</label>
            <input type="file" name="image" class="form-control">
            <img width="80" src="{{ asset('image/doctors/'.$doctor->image) }}" alt="">
        </div>

        <table class="table" class="mb-3 ml-4">
            <tr>
                <th></th>
                <th>Day</th>
                <th>Start</th>
                <th>End</th>
            </tr>
            @foreach ($schedules as $schedule)
            <tr>
                <td><input {{ $doctor->schedules->find($schedule->id) ? 'checked' : '' }} type="checkbox" name="schedule_id[]" value="{{ $schedule->id }}"></td>
                <td>{{ $schedule->day }}</td>
                <td>{{ $schedule->start }}</td>
                <td>{{ $schedule->end }}</td>
            </tr>
            @endforeach
        </table>

        <button class="btn btn-success px-5 ml-4">Update</button>
    </form>

@stop
