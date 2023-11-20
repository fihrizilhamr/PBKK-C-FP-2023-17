

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
         <!-- menu dan logo di wrapper -->
        <div class="wrapper">
            <!-- logo -->
            <div class="logo">
                <a href ="{{ route('list-trainers') }}">GoGym</a>
            </div>
        </div>
    </nav>
    <!-- Assuming $users is an array of user objects passed from the controller -->
    <table id="userTable">
    <thead>
                    <tr>
                        <th>Property</th>
                        <th>Value</th>
                    </tr>
                </thead>
        <tbody>
            @foreach ($trainer->getAttributes() as $property => $value)
                <tr>
                    <td><strong>{{ $property }}:</strong></td>
                    <td>{{ $value }}</td>
                </tr>
            @endforeach
        </tbody>
    </table><br><br>
    <div class="listTable">
    <img src="{{ asset('storage/trainer_images/' . $trainer->Foto) }}" alt="{{ asset('storage/trainer_images/' . $trainer->Foto) }}">
    <br>
    <table id="userTable">
            <thead>
                <tr>
                    <th>Schedule</th>
                    <th>Day</th>
                    <th>Start Time</th>
                    <th>End Time</th>
                    <th>Select</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($trainer->schedules as $schedule)
                    <tr>
                        <td>{{ $schedule->id }}</td>
                        <td>{{ $schedule->day }}</td>
                        <td>{{ $schedule->start_time }}</td>
                        <td>{{ $schedule->end_time }}</td>
                        <td>
                            <input type="checkbox" name="selected_schedules[]" value="{{ $schedule->id }}">
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
    </div><br><br>
</body>
</html>