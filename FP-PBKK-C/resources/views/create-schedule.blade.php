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
@include('layouts.home-navbar')

    <div class="createarticle">
        <h2>Create Schedule</h2>
        <p>Hai {{ $trainer->name }}! Kamu mau membuat jadwal?{{$trainer->trainer->id}}</p>
        <form action="{{ route('schedule.submit', ['id' => $trainer->trainer->id])}}" method="POST" enctype="multipart/form-data" onsubmit="return validateTime()">
            @csrf
            <!-- Tambahkan elemen formulir untuk jadwal, seperti hari, waktu mulai, dan waktu selesai -->
            <label for="day">Hari:</label>
            <select id="day" name="day" required>
                <option value="Senin">Senin</option>
                <option value="Selasa">Selasa</option>
                <option value="Rabu">Rabu</option>
                <option value="Kamis">Kamis</option>
                <option value="Jumat">Jumat</option>
                <option value="Sabtu">Sabtu</option>
                <option value="Minggu">Minggu</option>
            </select>


            <label for="start_time">Start Time:</label>
            <input type="time" id="start_time" name="start_time" required>

            <label for="end_time">End Time:</label>
            <input type="time" id="end_time" name="end_time" required>
            
            <br>
            <button type="submit">Create Schedule</button>
        </form>
    </div>
</body>

</html>
