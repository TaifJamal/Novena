@extends('admin.master')
@section('title', 'Trashed Features | ' . env('APP_NAME'))
@section('content')

    <h1>All Trashed Features</h1>
    @if (session('msg'))
        <div class="alert alert-{{ session('type') }}">
            {{ session('msg') }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Department</th>
                <th>Doctor</th>
                <th>Content</th>
                <th>Type</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                @foreach ($features as $feature)
                <td>{{  $feature->id }}</td>
                <<td>{{  $feature->department ? $feature->department->name : '' }} </td>
                <td>{{  $feature->doctor ? $feature->doctor->name : ''  }} </td>
                <td>{{  $feature->content  }} </td>
                <td>{{  $feature->type  }} </td>
                    <td>
                        <a class="btn btn-sm btn-primary" href="{{ route('admin.feature.restore', $feature->id) }}"><i class="fas fa-undo"></i></a>
                        <form class="d-inline" action="{{ route('admin.feature.forcedelete', $feature->id) }}" method="POST">
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
