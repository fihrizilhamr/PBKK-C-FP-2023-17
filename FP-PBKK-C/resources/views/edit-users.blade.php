

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
                <a href ="{{ route('list-users') }}">GoGym</a>
            </div>
        </div>
    </nav>
    <div class="wrapper">
        <div class="signup">
        <br><br>
        <!-- form -->
        <form action="{{ route('user.update', $user->id) }}" method="post" enctype="multipart/form-data">
            <!-- logo dalam form -->
            <div class="logo">
                <a href ="{{ route('list-users') }}">GoGym</a>
            </div>
            <br>
            @csrf
            <label for="Email">Email:</label>
            <input type="email" name="Email" value="{{ old('Email', $user->Email) }}" required>
            <br>

            <label for="Password">Password:</label>
            <input type="password" name="Password" value="{{ old('Password', $user->Password) }}" required>
            <br>

            <label for="Nama">Nama Lengkap:</label>
            <input type="text" name="Nama" value="{{ old('Nama', $user->Nama) }}" required>
            <br>

            <label for="TL">Tanggal Lahir:</label>
            <input type="date" name="TL" value="{{ old('TL', $user->TL) }}" required>
            <br>

            <label for="Alamat">Alamat:</label>
            <textarea name="Alamat" required>{{ old('Alamat', $user->Alamat) }}</textarea>
            <br>

            <label for="NHP">Nomor Hp:</label>
            <input type="tel" name="NHP" value="{{ old('NHP', $user->NHP) }}" required>
            <br>

            <label for="Gender">Jenis Kelamin:</label>
            <select name="Gender" required>
                <option value="" disabled selected>Pilih Jenis Kelamin</option>
                <option value="Laki-laki" {{ old('Gender', $user->Gender) == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                <option value="Perempuan" {{ old('Gender', $user->Gender) == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
            </select>
            <br>



            

            <button type="submit">Save Changes</button>
            @if ($errors->any())
            <!-- <h2>Input Error: </h2> -->
            <div class="alert">
                <ul>
                    <h3>Input Error</h3>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
        </form>
        </div>
    </div>
</body>
</html>