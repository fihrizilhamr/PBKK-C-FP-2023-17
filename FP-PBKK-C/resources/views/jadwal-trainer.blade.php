
<x-app-layout>
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
<script>
        document.addEventListener('DOMContentLoaded', function () {
            const checkboxes = document.querySelectorAll('.schedule-checkbox');
            const button = document.querySelector('#checkout-button');

            checkboxes.forEach(function (checkbox) {
                checkbox.addEventListener('change', function () {
                    const selectedSchedules = document.querySelectorAll('.schedule-checkbox:checked');
                    const selectedSchedulesCount = selectedSchedules.length;

                    if (selectedSchedulesCount < 1) {
                        alert('Please select at least one schedule.');
                        button.style.display = 'none';
                    } else {
                        button.style.display = 'block';
                    }

                    const selectedSchedulesIds = Array.from(selectedSchedules).map(checkbox => checkbox.value);
                    document.querySelector('#selectedSchedulesCount').value = selectedSchedulesCount;
                    document.querySelector('#selectedSchedulesIds').value = selectedSchedulesIds.join(',');
                });
            });
        });
    </script>
<body>
    <div class="jadwal-container">
    <table id="userTable">
        <thead>
            <tr>
                <th>Property</th>
                <th>Value</th>
            </tr>
        </thead>
        <tbody>
                <tr>
                    <td><strong>Nama :</strong></td>
                    <td>{{ $trainer->user->name }}</td>
                </tr>
                <tr>
                    <td><strong>Email :</strong></td>
                    <td>{{ $trainer->user->email }}</td>
                </tr>
                <tr>
                    <td><strong>No. Handphone :</strong></td>
                    <td>{{ $trainer->user->phone_number }}</td>
                </tr>
                <tr>
                    <td><strong>Gender :</strong></td>
                    <td>{{ $trainer->user->gender }}</td>
                </tr>
        </tbody>
    </table>

    <br><br>
    @if($trainer->schedules->count() > 0)
    <div class="listTable">
        <table id="userTable">
            <thead>
                <tr>
                    <th>Foto</th>
                    <th>Day</th>
                    <th>Start Time</th>
                    <th>End Time</th>
                    <th>Select</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($trainer->schedules as $index => $schedule)
                    <tr>
                        @if ($index === 0)
                            <td rowspan="{{ count($trainer->schedules) }}">
                                <img src="{{ asset('storage/trainer_images/' . $trainer->Foto) }}" alt="{{ asset('storage/trainer_images/' . $trainer->Foto) }}">
                            </td>
                        @endif
                        <td>{{ $schedule->day }}</td>
                        <td>{{ $schedule->start_time }}</td>
                        <td>{{ $schedule->end_time }}</td>
                        <td>
                            <input type="checkbox" name="selected_schedules[]" value="{{ $schedule->id }}" class="schedule-checkbox">
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @else
            <p>No schedules available.</p>
        @endif


        <br>

        
    </div>
    <form action="{{ route('checkout', ['trainer_id' => $trainer->id]) }}" method="post">
        @csrf <!-- Laravel CSRF token -->
        <!-- ... (existing content) ... -->

        
        <input type="hidden" name="selectedSchedulesCount" id="selectedSchedulesCount">
        <input type="hidden" name="selectedSchedulesIds" id="selectedSchedulesIds">


        <button id="checkout-button" style="display: none" type="submit">
            Checkout
        </button>
    </form>
    </div>
        <br>
        <br>

    </x-app-layout>
