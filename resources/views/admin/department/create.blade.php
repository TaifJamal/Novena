@extends('admin.master')
@section('title', 'Add New Department | ' . env('APP_NAME'))
@section('content')

    <h1 class=" ml-4">Add new Department</h1>
    @include('admin.errors')

    <form action="{{ route('admin.department.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3 ml-4">
            <label>Name</label>
            <input type="text" name="name" placeholder="Name" class="form-control" value="{{ old('name') }}">
        </div>
        <div class="mb-3 ml-4">
            <label>content</label>
            <textarea name="content" placeholder="content" class="form-control">{{ old('content') }}</textarea>
        </div>
        <div class="mb-3 ml-4">
            <label>Image</label>
            <input type="file" name="image" class="form-control">
        </div>

        <div class="mb-3 ml-4">
            <label>description</label>
            <textarea name="description" placeholder="description" class="form-control">{{ old('description') }}</textarea>
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
                <td><input type="checkbox" name="schedule_id[]" value="{{ $schedule->id }}"></td>
                <td>{{ $schedule->day }}</td>
                <td>{{ $schedule->start }}</td>
                <td>{{ $schedule->end }}</td>
            </tr>
            @endforeach
        </table>

        <button class="btn btn-success px-5 ml-4">Add</button>
    </form>

@stop
