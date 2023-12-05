<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GoGym</title>
</head>
<body>
@include('layouts.home-navbar')
    <div class="listarticles">
    <div class="container">
    <h2>My Schedules</h2>
    <a href="{{ route('schedule.create') }}" class="create-button" style="display: flex; justify-content: center;">Create Schedule</a>
    @if($schedules->count() > 0)
        <table>
            <thead>
                <tr>
                    <th>Day</th>
                    <th>Start Time</th>
                    <th>End Time</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach($schedules as $schedule)
                    <tr>
                        <td>{{ $schedule->day }}</td>
                        <td>{{ $schedule->start_time }}</td>
                        <td>{{ $schedule->end_time }}</td>
                        <td>
                        <div class="article-actions">
                            <form action="{{ route('schedule.edit', ['id' => $schedule->id]) }}" method="get">
                                <button type="submit" class="edit-button">Edit</button>
                            </form>
                        </div>
                        </td>
                        <td>
                        <form action="{{ route('schedule.delete', ['id' => $schedule->id]) }}" method="get" onsubmit="return confirm('Are you sure you want to delete this schedule?')">
                                @csrf
                                <button type="submit" class="delete-button">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <br><br><br>
        <p>...No schedules available.</p>
    @endif
    </div>
    </div>

</body>
</html>