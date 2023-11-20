

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
                <a href ="{{ route('home') }}">GoGym</a>
            </div>
        </div>
    </nav>
    <div class="signup_result">
        <h1>Selamat Datang di GoGym, {{ $results }}!</h1><br>
        <h2>Akun Anda berhasil dibuat. Selamat bergabung!<br>Anda sekarang dapat masuk dan mengeksplorasi fitur-fitur kami.<br>Jangan ragu untuk menghubungi kami jika ada pertanyaan atau masalah.</h2>
    </div>
</body>
</html>