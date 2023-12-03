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
                <a href="{{ route('list-articles') }}">GoGym</a>
            </div>
        </div>
    </nav>

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
            <p>No articles available.</p>
        @endif
    </div>
</div>
</body>
</html>