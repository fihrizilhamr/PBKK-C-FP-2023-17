<!-- reference
https://colorhunt.co/palette/f0f0f02135554f709ce5d283
https://www.youtube.com/watch?v=McPdzhLRzCg
https://www.youtube.com/watch?v=5JwWqjd4e9o 
https://www.youtube.com/watch?v=WVOmmc0UTiM
https://www.youtube.com/watch?v=7uEqQx4S50E-->

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

            <div class="search-container">
                <input type="text" id="searchInput" placeholder="Search...">
            </div>
        </div>
    </nav>
    <div class="listTable">
    <!-- Assuming $users is an array of user objects passed from the controller -->
    <table id="userTable">
        <thead>
            <tr>
                <th>Email</th>
                <th>Password</th>
                <th>Nama</th>
                <th>Tanggal Lahir</th>
                <th>Alamat</th>
                <th>No. HP</th>
                <th>Gender</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->Email }}</td>
                    <td>{{ $user->Password }}</td>
                    <td>{{ $user->Nama }}</td>
                    <td>{{ $user->TL }}</td>
                    <td>{{ $user->Alamat }}</td>
                    <td>{{ $user->NHP }}</td>
                    <td>{{ $user->Gender }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    </div>
</body>
</html>