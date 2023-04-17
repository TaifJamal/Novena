@extends('admin.master')
@section('titel','Edit Role')
@section('content')
<h1>Edit new Role</h1>
    @include('admin.errors')
    <form action="{{ route('admin.roles.update',$role->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')

        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" placeholder="Name" class="form-control" value="{{$role->name }}">
        </div>

        <div class="mb-3">
            <label>Permission</label>
            <table class="table">
                @foreach ($permissions as $permission)
                    <tr>
                        <td width="20"><input  type="checkbox" name="permission[]"  value="{{ $permission->id}}" {{in_array($permission->id,$rolePermissions) ?'checked':'' }} ></td>
                        <td>{{ $permission->name}}</td>
                    </tr>
                @endforeach
            </table>
        </div>

        <button class="btn btn-success px-5">Add</button>
    </form>
@stop
