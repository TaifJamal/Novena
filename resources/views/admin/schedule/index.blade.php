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
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                @foreach ($schedules as $schedule)
                    <td>{{ $schedule->id }}</td>
                    <td>{{ $schedule->day }} </td>
                    <td>{{ $schedule->EndDay }} </td>
                    <td>{{ $schedule->start  }} </td>
                    <td>{{ $schedule->end }} </td>
                    <td>
                        <a class="btn btn-primary" href="{{ route('admin.schedule.edit', $schedule->id) }}"><i class="fas fa-edit"></i></a>
                        <form class="d-inline" action="{{ route('admin.schedule.destroy', $schedule->id) }}" method="POST">
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

