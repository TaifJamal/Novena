@extends('admin.master')
@section('title', 'Add New Testimonial | ' . env('APP_NAME'))
@section('content')

    <h1 class=" ml-4">Add new Testimonials</h1>
    @include('admin.errors')

    <form action="{{ route('admin.testimonial.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3 ml-4">
            <label>Name</label>
            <input type="text" name="name" placeholder="Name" class="form-control" value="{{ old('name') }}">
        </div>
        <div class="mb-3 ml-4">
            <label>smallDes</label>
            <textarea name="smallDes" placeholder="smallDes" class="form-control">{{ old('smallDes') }}</textarea>
        </div>
        <div class="mb-3 ml-4">
            <label>comment</label>
            <textarea name="comment" placeholder="comment" class="form-control">{{ old('comment') }}</textarea>
        </div>

        <div class="mb-3 ml-4">
            <label>Type</label>
            <select name="type" class="form-control">
                <option value="">Selected</option>
                <option value="home">Home</option>
                <option value="about">About</option>
            </select>
        </div>

        <div class="mb-3 ml-4">
            <label>Image</label>
            <input type="file" name="image" class="form-control">
        </div>

        <button class="btn btn-success px-5 ml-4">Add</button>
    </form>

@stop
