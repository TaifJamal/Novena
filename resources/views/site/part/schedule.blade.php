@foreach ($schedules as $schedule)
<li class="d-flex justify-content-between align-items-center">
    <span>{{ $schedule->day }} {{ $schedule->EndDay ?'-'.$schedule->EndDay : ''  }}</span>
    <span>{{ $schedule->start }}- {{ $schedule->end }}</span>
</li>
@endforeach
