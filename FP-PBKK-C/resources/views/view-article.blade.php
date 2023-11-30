<!-- resources/views/view-article.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $article->Judul }} - GoGym</title>
    <link rel="stylesheet" href="{{ asset('/css/view-article-style.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>
<body>
    <nav>
        <div class="wrapper">
            <div class="logo">
                <a href="{{ route('list-articles') }}">GoGym</a>
            </div>
        </div>
    </nav>

    <div class="container">
        <article>
            <h2>{{ $article->Judul }}</h2>
            
            <div class="trainer-info">
                <p>Created By:</p>
                <img src="{{ asset('storage/trainer_images/' . $trainer->Foto) }}" alt="{{ $trainer->Nama }}">
                <p>{{ $trainer->name }}</p>
            </div>

            <img src="{{ asset('storage/article_images/' . $article->Foto) }}" alt="{{ $article->Judul }}">
            <span>{{ $article->created_at->format('d F Y') }} / Happy Gym Buddy</span>
            <p>{{ $article->Text }}</p>
        </article>
    </div>
</body>
</html>
