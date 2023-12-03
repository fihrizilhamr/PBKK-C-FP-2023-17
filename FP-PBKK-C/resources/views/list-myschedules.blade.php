<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GoGym</title>
    <link rel="stylesheet" href="{{ asset('/css/home-style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>
<body>
    <nav>
    <div class="wrapper">
            <div class="logo">
                <a href ="{{ route('list-trainers') }}">GoGym</a>
            </div>
        </div>
    </nav>
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