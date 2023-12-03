<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GoGym - Create Schedule</title>
    <link rel="stylesheet" href="{{ asset('/css/home-style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>
<script>
        function validateTime() {
            const startTime = document.getElementById('start_time').value;
            const endTime = document.getElementById('end_time').value;

            if (startTime >= endTime) {
                alert('End Time harus lebih besar dari Start Time.');
            }
        }
    </script>
<body>
    <nav>
        <div class="wrapper">
            <div class="logo">
                <a href="{{ route('list-myschedules') }}">GoGym</a>
            </div>
        </div>
    </nav>

    <div class="createarticle">
        <h2>Update Schedule</h2>
        <p>Hai {{ $trainer->name }}! Kamu mau mengupdate jadwalmu?{{  $schedule->day }}</p>
        <form action="{{ route('schedule.update', $schedule->id) }}" method="POST" enctype="multipart/form-data" onsubmit="return validateTime()">
        @csrf
        @method('PUT') <!-- Tambahkan metode PUT untuk formulir edit -->

        <!-- Add a hidden input field to send the actual HTTP method -->
        <input type="hidden" name="_method" value="PUT">
        <!-- Tambahkan elemen formulir untuk jadwal, seperti hari, waktu mulai, dan waktu selesai -->
        <label for="day">Hari:</label>
        <select id="day" name="day" required>
            <option value="Senin" {{ old('day', $schedule->day) == 'Senin' ? 'selected' : '' }}>Senin</option>
            <option value="Selasa" {{ old('day', $schedule->day) == 'Selasa' ? 'selected' : '' }}>Selasa</option>
            <option value="Rabu" {{ old('day', $schedule->day) == 'Rabu' ? 'selected' : '' }}>Rabu</option>
            <option value="Kamis" {{ old('day', $schedule->day) == 'Kamis' ? 'selected' : '' }}>Kamis</option>
            <option value="Jumat" {{ old('day', $schedule->day) == 'Jumat' ? 'selected' : '' }}>Jumat</option>
            <option value="Sabtu" {{ old('day', $schedule->day) == 'Sabtu' ? 'selected' : '' }}>Sabtu</option>
            <option value="Minggu" {{ old('day', $schedule->day) == 'Minggu' ? 'selected' : '' }}>Minggu</option>
        </select>
        <label for="start_time">Start Time:</label>
<input type="time" id="start_time" name="start_time" value="{{ old('start_time', date('H:i', strtotime($schedule->start_time))) }}" required>

<label for="end_time">End Time:</label>
<input type="time" id="end_time" name="end_time" value="{{ old('end_time', date('H:i', strtotime($schedule->end_time))) }}" required>



        <br>
        <button type="submit">Update Schedule</button>
        <br>
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

    </form>

    </div>
</body>

</html>
