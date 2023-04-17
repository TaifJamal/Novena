@extends('admin.master')
@section('titel','Add Role')
@section('content')
<h1>Add new Role</h1>
    @include('admin.errors')
    <form action="{{ route('admin.roles.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" placeholder="Name" class="form-control" value="{{ old('name') }}">
        </div>

        <div class="mb-3">
            <label>Permission</label>
            <table class="table">
                @foreach ($permissions as $permission)
                    <tr>
                        <td width="20"><input type="checkbox" name="permission[]"  value="{{ $permission->id  }}"></td>
                        <td>{{ $permission->name}}</td>
                    </tr>
                @endforeach
            </table>
        </div>

        <button class="btn btn-success px-5">Add</button>
    </form>
@stop
