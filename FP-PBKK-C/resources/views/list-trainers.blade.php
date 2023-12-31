
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
<x-app-layout>
    <div class="wrapper">
        <br>
        <div class="blog-heading">
            <h3>Our Collections</h3>
        </div>
        <section id="koleksi">
        @foreach($trainers as $trainer)
            <div class="trainer">
            <img src="{{ asset('storage/trainer_images/' . $trainer->Foto) }}" alt="{{ asset('storage/trainer_images/' . $trainer->Foto) }}">
                <a href="{{ route('pick-trainer', ['id' => $trainer->id]) }}"><h4>{{ $trainer->user->name }}</h4></a>
                <p>{{ $trainer->Lokasi }}</p>
                <p>{{ $trainer->id }}</p>
            </div>
        @endforeach
        </section>
    </div>
    <script src="{{ asset('js/app.js') }}" defer></script>
</body>
</html>
</x-app-layout>