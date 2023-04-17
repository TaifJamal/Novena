@extends('admin.master')
@section('titel','Add User')
@section('content')
<h1>Add new User</h1>
    @include('admin.errors')
    <form action="{{ route('admin.users.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" placeholder="Name" class="form-control" value="{{ old('name') }}">
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" placeholder="Email" class="form-control" value="{{ old('email') }}">
        </div>

        <div class="mb-3">
            <label>Password</label>
            <input type="password" name="password" placeholder="Password" class="form-control" value="{{ old('password') }}">
        </div>

        <div class="mb-3">
            <label>Confirm Password</label>
            <input type="password" name="confirPmassword" placeholder="Confirm Password" class="form-control" value="{{ old('confirPmassword') }}">
        </div>

        <div class="mb-3">
            <label>Type</label>
            <select name="type" class="form-control">
                <option value=""></option>
                <option value="user">User</option>
                <option value="admin">Admin</option>
            </select>
        </div>


        <div class="mb-3">
            <label>Role</label>
            <table class="table">
                @foreach ($roles as $roles)
                    <tr>
                        <td width="20"><input type="checkbox" name="roles[]"  value="{{ $roles->id  }}"></td>
                        <td>{{ $roles->name}}</td>
                    </tr>
                @endforeach
            </table>
        </div>

        <button class="btn btn-success px-5">Add</button>
    </form>
@stop
