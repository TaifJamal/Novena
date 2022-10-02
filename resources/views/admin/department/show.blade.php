@extends('admin.master')
@section('title', 'Schedule | ' . env('APP_NAME'))
@section('content')

    <h1>All Schedules</h1>
    @if (session('msg'))
        <div class="alert alert-{{ session('type') }}">
            {{ session('msg') }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Day</th>
                <th>EndDay</th>
                <th>Start</th>
                <th>End</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($schedules as $schedule)
                <tr>
                    <td>{{ $schedule->id }}</td>
                    <td>{{ $schedule->day }} </td>
                    <td>{{ $schedule->EndDay }} </td>
                    <td>{{ $schedule->start  }} </td>
                    <td>{{ $schedule->end }} </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-end mb-4">
        <a class="btn btn-success px-5 ml-4 mr-2 " href="{{ route('admin.department.index')  }}">Bake</a>
    </div>


@stop

