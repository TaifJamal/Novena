@extends('admin.master')
@section('title', 'Edit Testimonial | ' . env('APP_NAME'))

@section('content')

    <h1 class=" ml-4">Edit Testimonial</h1>
    @include('admin.errors')

    <form action="{{ route('admin.testimonial.update',$testimonial->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="mb-3 ml-4">
            <label>Name</label>
            <input type="text" name="name" placeholder="Name" class="form-control" value="{{ $testimonial->name }}">
        </div>
        <div class="mb-3 ml-4">
            <label>smallDes</label>
            <textarea name="smallDes" placeholder="smallDes" class="form-control">{{ $testimonial->smallDes }}</textarea>
        </div>
        <div class="mb-3 ml-4">
            <label>comment</label>
            <textarea name="comment" placeholder="comment" class="form-control">{{ $testimonial->comment }}</textarea>
        </div>

        <div class="mb-3 ml-4">
            <label>Type</label>
            <select name="type" class="form-control">
                <option value="">Selected</option>
                <option {{ $testimonial->type=='home' ? 'selected':'' }} value="home">Home</option>
                <option {{ $testimonial->type=='about' ? 'selected':''  }} value="about">About</option>
            </select>
        </div>

        <div class="mb-3 ml-4">
            <label>Image</label>
            <input type="file" name="image" class="form-control">
            <img width="80" src="{{ asset('image/testimonials/'.$testimonial->image) }}" alt="">
        </div>

        <button class="btn btn-success px-5 ml-4">Update</button>
    </form>

@stop
