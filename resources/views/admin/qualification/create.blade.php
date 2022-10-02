@extends('admin.master')
@section('title', 'Add New Qualification | ' . env('APP_NAME'))
@section('content')

    <h1 class=" ml-4">Add new Qualification</h1>
    @include('admin.errors')

    <form action="{{ route('admin.qualification.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3 ml-4">
            <label>Name</label>
            <input type="text" name="name" placeholder="Name" class="form-control" value="{{ old('name') }}">
        </div>
        <div class="mb-3 ml-4">
            <label>Place</label>
            <input type="text" name="place" placeholder="Place" class="form-control" value="{{ old('place') }}">
        </div>
        <div class="mb-3 ml-4">
            <label>Year</label>
            <input type="text" name="Year" placeholder="Year" class="form-control" value="{{ old('Year') }}">
        </div>
        <div class="mb-3 ml-4">
            <label>content</label>
            <textarea name="content" placeholder="content" class="form-control">{{ old('content') }}</textarea>
        </div>
        <div class="mb-3 ml-4">
            <label>Doctor</label>
            <select name="doctor_id" class="form-control">
                <option value="">Selected</option>
                @foreach ($doctors as $doctor)
                <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3 ml-4">
            <label>Image</label>
            <input type="file" name="image" class="form-control">
        </div>


        <button class="btn btn-success px-5 ml-4">Add</button>
    </form>

@stop
