@extends('admin.master')
@section('title', 'Trashed Departments | ' . env('APP_NAME'))
@section('content')

    <h1>All Trashed Departments</h1>
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
                <th>Content</th>
                <th>Image</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                @foreach ($departments as $department)
                <td>{{ $department->id }}</td>
                <td>{{ $department->name }} </td>
                <td>{{  $department->content  }} </td>
                <td><img width="80" src="{{ asset('image/departments/'.$department->image) }}" alt=""></td>
                <td>{{ $department->description }} </td>
                    <td>
                        <a class="btn btn-sm btn-primary" href="{{ route('admin.department.restore', $department->id) }}"><i class="fas fa-undo"></i></a>
                        <form class="d-inline" action="{{ route('admin.department.forcedelete', $department->id) }}" method="POST">
                            @csrf
                            @method('delete')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure')"><i class="fas fa-times"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>


@stop
