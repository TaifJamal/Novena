@extends('admin.master')
@section('title', 'Edit Feature | ' . env('APP_NAME'))

@section('content')

    <h1 class=" ml-4">Edit Feature</h1>
    @include('admin.errors')

    <form action="{{ route('admin.feature.update',$feature->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="mb-3 ml-4">
            <label>content</label>
            <textarea name="content" placeholder="content" class="form-control">{{ $feature->content }}</textarea>
        </div>

        <div class="mb-3 ml-4">
            <label>Department</label>
            <select name="department_id" class="form-control" {{ $feature->type == 'department' ? '' : 'disabled' }}>
                <option value="">selected</option>
               @foreach ($departments as $item)
                    <option {{ $item->id== $feature->id ? 'selected' : ''  }} value="{{ $item->id }}">{{ $item->name }}</option>
               @endforeach
            </select>
        </div>

        <div class="mb-3 ml-4">
            <label>Doctor</label>
            <select name="doctor_id" class="form-control" {{ $feature->type == 'doctor' ? '' : 'disabled' }}>
                <option value="">selected</option>
               @foreach ($doctors as $doc)
                    <option {{ $doc->id== $feature->id ? 'selected' : ''  }}  value="{{ $doc->id }}">{{ $doc->name }}</option>
               @endforeach
            </select>
        </div>

        <div class="mb-3 ml-4">
            <label>Type</label>
            <select disabled name="type" class="form-control">
                <option value="">Selected</option>
                <option {{ $feature->type=='department' ? 'selected':'' }}  value="department">Department</option>
                <option {{ $feature->type=='doctor' ? 'selected':'' }}    value="doctor">Doctor</option>
            </select>
        </div>

        <button class="btn btn-success px-5 ml-4">Update</button>
    </form>

@stop
