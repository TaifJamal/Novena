@extends('admin.master')

@section('title', 'Dashboard | Admin')

@section('styles')

<style>
    ul {
        column-count: 4;
    }
</style>

@stop

@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Add new Category</h1>
@include('admin.errors')
<form action="{{ route('admin.role.store') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label>Name</label>
        <input type="text" name="name" placeholder="Name" class="form-control" />
    </div>

    <label><input type="checkbox" id="check_all"> Select All</label> <br>
    <ul class="list-unstyled">
        @foreach ($abitities as $ability)
            <li><label><input type="checkbox" name="ability[]" value="{{ $ability->id }}"> {{ $ability->name }}</label></li>
        @endforeach
    </ul>

    <button class="btn btn-success w-25">Add</button>
</form>
@stop


@section('script')
<script>
    $('#check_all').on('change', function() {
        $('input[type=checkbox]').prop('checked', $(this).prop('checked'));
    })
</script>
@stop
