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
        <a href="{{ route('article.create') }}" class="create-button" style="display: flex; justify-content: center;">Create Article</a>
        <br>
        @if(count($articles) > 0)
            <ul>
                @foreach($articles as $article)
                    <li>
                        <img src="{{ asset('storage/article_images/' . $article->Foto) }}" alt="{{ $article->Judul }}">
                        <span>{{ $article->created_at->format('d F Y') }} / Happy Gym Buddy</span>
                        <h3><a href="{{ route('article.view', ['id' => $article->id]) }}">{{ $article->Judul }}</a></h3>
                        <p>{{ $article->Text }}</p>
                        <div class="article-actions">
                            <form action="{{ route('article.edit', ['id' => $article->id]) }}" method="get">
                                <button type="submit" class="edit-button">Edit</button>
                            </form>
                            <form action="{{ route('article.delete', ['id' => $article->id]) }}" method="get" onsubmit="return confirm('Are you sure you want to delete this user?')">
                                @csrf
                                <button type="submit" class="delete-button">Delete</button>
                            </form>
                            <!-- <a href="{{ route('article.edit', ['id' => $article->id]) }}" class="edit-button">Edit</a>
                            <form action="{{ route('article.delete', ['id' => $article->id]) }}" method="DELETE" onsubmit="return confirm('Are you sure you want to delete this user?')>
                                <button type="submit" class="delete-button">Delete</button>
                            </form> -->
                        </div>
                    </li>
                @endforeach
            </ul>
        @else
        <br><br><br>
            <p>...No articles available.</p>
        @endif
    </div>
</div>
</body>
</html>