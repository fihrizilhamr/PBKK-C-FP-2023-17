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
@include('layouts.home-navbar')

    <div class="createarticle">
    <h2>Edit Article</h2>
    <p>Hai {{ $trainer->name }}! Kamu mau mengedit artikelmu?</p>

    <!-- Menampilkan foto lama -->
    <img src="{{ asset('storage/article_images/' . old('Foto', $article->Foto)) }}" alt="Old Image">

    <form action="{{ route('article.update', $article->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT') <!-- Tambahkan metode PUT untuk formulir edit -->

        <!-- Add a hidden input field to send the actual HTTP method -->
        <input type="hidden" name="_method" value="PUT">

        <label for="Judul">Title:</label>
        <input type="text" id="Judul" name="Judul" value="{{ old('Judul', $article->Judul) }}" required>

        <label for="Text">Content:</label>
        <textarea id="Text" name="Text" rows="6" required>{{ old('Text', $article->Text) }}</textarea>

        <label for="Foto">Image:</label>
        <input type="file" id="Foto" name="Foto" accept="image/*">
        
        <br>
        <button type="submit">Update Article</button>
    </form>
</div>



</body>
</html>