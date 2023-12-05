<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GoGym - Create Schedule</title>
    <link rel="stylesheet" href="{{ asset('/css/home-style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>
<style>
    body {
    font-family: 'Poppins', sans-serif;
    background-color: #f8f9fa;
    margin: 0;
    padding: 0;
}

h1 {
    text-align: center;
    color: #343a40;
}

form {
    max-width: 600px;
    margin: 20px auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

label {
    display: block;
    margin-bottom: 8px;
    color: #343a40;
}

input, select {
    width: 100%;
    padding: 8px;
    margin-bottom: 16px;
    border: 1px solid #ced4da;
    border-radius: 4px;
    box-sizing: border-box;
}

button {
    background-color: #007bff;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

button:hover {
    background-color: #0056b3;
}

#adminFields,
#trainerFields,
#memberFields {
    margin-top: 16px;
}

    </style>
<script>
        function showHideFields() {
            var selectedRole = document.getElementById('role').value;

            // Hide all additional fields
            document.getElementById('adminFields').style.display = 'none';
            document.getElementById('trainerFields').style.display = 'none';
            document.getElementById('memberFields').style.display = 'none';

            // Show fields based on the selected role
            if (selectedRole === 'admin') {
                document.getElementById('adminFields').style.display = 'block';
            } else if (selectedRole === 'trainer') {
                document.getElementById('trainerFields').style.display = 'block';
            } else if (selectedRole === 'member') {
                document.getElementById('memberFields').style.display = 'block';
            }
        }
    </script>

<body>
@include('layouts.home-navbar')
    <h1>Update User</h1>
    @if ($errors->any())
    <div style="color: red;">
        <strong>Error:</strong>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="{{ route('user.update', $user->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Basic User Information -->
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" required>
        <br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" required>
        <br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" value="{{ old('password') }}" required>
        <br>

        <label for="birthdate">Birthdate:</label>
        <input type="date" id="birthdate" name="birthdate" value="{{ old('birthdate', $user->birthdate) }}" required>
        <br>

        <label for="address">Address:</label>
        <input type="text" id="address" name="address" value="{{ old('address', $user->address) }}" required>
        <br>

        <label for="phone_number">Phone Number:</label>
        <input type="tel" id="phone_number" name="phone_number" value="{{ old('phone_number', $user->phone_number) }}"
            required>
        <br>

        <label for="gender">Gender:</label>
        <select id="gender" name="gender" required>
            <option value="Male" {{ old('gender', $user->gender) === 'Male' ? 'selected' : '' }}>Male</option>
            <option value="Female" {{ old('gender', $user->gender) === 'Female' ? 'selected' : '' }}>Female</option>
        </select>
        <br>

        <!-- Role Selection -->
        <label for="role">User Role:</label>
        <select id="role" name="role" onchange="showHideFields()" required>
            <option value="admin">Admin</option>
            <option value="trainer">Trainer</option>
            <option value="member">Member</option>
        </select>
        <br>

        <!-- Admin Information -->
        <div id="adminFields" style="display: none;">
            <label for="admin_info">Admin Information:</label>
            <input type="hidden" id="admin_info" name="admin_info">
            <br>
        </div>

        <!-- Trainer Information -->
        <div id="trainerFields" style="display: none;">
    <label for="lokasi">Trainer Location:</label>
    <input type="text" id="lokasi" name="lokasi" value="{{ old('lokasi', optional($user->trainer)->lokasi) }}">
    <br>

    <label for="foto">Trainer Photo:</label>
    <input type="file" id="foto" name="foto">
    <br>
</div>

<!-- Member Information -->
<div id="memberFields" style="display: none;">
    <label for="tinggi_badan">Member Height:</label>
    <input type="numeric" id="tinggi_badan" name="tinggi_badan"
        value="{{ old('tinggi_badan', optional($user->member)->tinggi_badan) }}">
    <br>

    <label for="berat_badan">Member Weight:</label>
    <input type="numeric" id="berat_badan" name="berat_badan"
        value="{{ old('berat_badan', optional($user->member)->berat_badan) }}">
    <br>
</div>

        <!-- Submit Button -->
        <button type="submit">Update User</button>
    </form>
</body>
</html>