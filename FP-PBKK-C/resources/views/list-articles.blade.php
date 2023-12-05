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
        <h2>List of Articles</h2>
        @if(count($articles) > 0)
            <ul>
                @foreach($articles as $article)
                    <li>
                        <img src="{{ asset('storage/article_images/' . $article->Foto) }}" alt="{{ $article->Judul }}">
                        <span>{{ $article->created_at->format('d F Y') }} / Happy Gym Buddy</span>
                        <h3><a href="{{ route('article.view', ['id' => $article->id]) }}">{{ $article->Judul }}</a></h3>
                        <p>{{ $article->Text }}</p>
                    </li>
                @endforeach
            </ul>
        @else
            <p>No articles available.</p>
        @endif
    </div>
    </div>
</body>
</html>