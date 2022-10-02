@extends('admin.master')
@section('title', 'Testimonials | ' . env('APP_NAME'))
@section('content')

    <h1>All Testimonials</h1>
    @if (session('msg'))
        <div class="alert alert-{{ session('type') }}">
            {{ session('msg') }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>SmallDes</th>
                <th>Comment</th>
                <th>Type</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                @foreach ($testimonials as $testimonial)
                    <td>{{ $testimonial->id }}</td>
                    <td>{{ $testimonial->name }} </td>
                    <td>{{  $testimonial->smallDes  }} </td>
                    <td>{{  $testimonial->comment  }} </td>
                    <td>{{  $testimonial->type  }} </td>
                    <td><img width="80" src="{{ asset('image/testimonials/'.$testimonial->image) }}" alt=""></td>

                    <td>
                        <a class="btn btn-primary" href="{{ route('admin.testimonial.edit', $testimonial->id) }}"><i class="fas fa-edit"></i></a>
                        <form class="d-inline" action="{{ route('admin.testimonial.destroy', $testimonial->id) }}" method="POST">
                            @csrf
                            @method('delete')
                        <button class="btn btn-danger" onclick="return confirm('Are you sure')"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@stop

