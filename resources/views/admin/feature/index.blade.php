@extends('admin.master')
@section('title', 'Feature | ' . env('APP_NAME'))
@section('content')

    <h1>All Features</h1>
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
                    <td>{{  $feature->department ? $feature->department->name : '' }} </td>
                    <td>{{  $feature->doctor ? $feature->doctor->name : ''  }} </td>
                    <td>{{  $feature->content  }} </td>
                    <td>{{  $feature->type  }} </td>
                    <td>
                        <a class="btn btn-primary" href="{{ route('admin.feature.edit', $feature->id) }}"><i class="fas fa-edit"></i></a>
                        <form class="d-inline" action="{{ route('admin.feature.destroy', $feature->id) }}" method="POST">
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

