@extends('admin.master')
@section('title', 'Edit Qualification | ' . env('APP_NAME'))
@section('content')

    <h1 class=" ml-4">Edit Qualification</h1>
    @include('admin.errors')

    <form action="{{ route('admin.qualification.update',$qualification->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')

        <div class="mb-3 ml-4">
            <label>Name</label>
            <input type="text" name="name" placeholder="Name" class="form-control" value="{{ $qualification->name }}">
        </div>
        <div class="mb-3 ml-4">
            <label>Place</label>
            <input type="text" name="place" placeholder="Place" class="form-control" value="{{ $qualification->place }}">
        </div>
        <div class="mb-3 ml-4">
            <label>Year</label>
            <input type="text" name="Year" placeholder="Year" class="form-control" value="{{ $qualification->Year }}">
        </div>
        <div class="mb-3 ml-4">
            <label>content</label>
            <textarea name="content" placeholder="content" class="form-control">{{ $qualification->content }}</textarea>
        </div>
        <div class="mb-3 ml-4">
            <label>Doctor</label>
            <select name="doctor_id" class="form-control">
                <option value="">Selected</option>
                @foreach ($doctors as $item)
                <option {{ $item->id==$qualification->id ? 'selected': '' }} value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3 ml-4">
            <label>Image</label>
            <input type="file" name="image" class="form-control">
            <img width="80" src="{{ asset('image/qualifications/'.$qualification->image) }}" alt="">
        </div>

        <button class="btn btn-success px-5 ml-4">Update</button>
    </form>

@stop
