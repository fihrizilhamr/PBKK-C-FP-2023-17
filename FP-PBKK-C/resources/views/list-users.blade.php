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
    <div class="listTable">
        <!-- Assuming $users is an array of user objects passed from the controller -->
        <table id="userTable">
            <thead>
                <tr>
                    <th>Create</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Birthdate</th>
                    <th>Address</th>
                    <th>Phone Number</th>
                    <th>Gender</th>
                    <th>Role</th>
                    <th>Additional Info</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $index => $user)
                    <tr>
                        @if ($index === 0)
                            <td rowspan="{{ count($users) }}">
                            <form action="{{ route('user.create') }}" method="get">
                                <button type="submit">Create User</button>
                            </form>
                            </td>
                        @endif
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->birthdate }}</td>
                        <td>{{ $user->address }}</td>
                        <td>{{ $user->phone_number }}</td>
                        <td>{{ $user->gender }}</td>
                        <td>{{ $user->role }}</td>
                        <td>
                        @if ($user->admin)
                            <h2>Admin Details:</h2>
                            <p>ID: {{ $user->admin->id }}</p>
                            <p>User ID: {{ $user->admin->user_id }}</p>
                            <p>Created At: {{ $user->admin->created_at }}</p>
                            <p>Updated At: {{ $user->admin->updated_at }}</p>
                        @elseif ($user->trainer)
                            <h2>Trainer Details:</h2>
                            <p>ID: {{ $user->trainer->id }}</p>
                            <p>User ID: {{ $user->trainer->user_id }}</p>
                            <p>Lokasi: {{ $user->trainer->Lokasi }}</p>
                            <p>Foto: {{ $user->trainer->Foto }}</p>
                            <p>Created At: {{ $user->trainer->created_at }}</p>
                            <p>Updated At: {{ $user->trainer->updated_at }}</p>
                        @else
                            @if ($user->member)
                                <h2>Member Details:</h2>
                                <p>ID: {{ $user->member->id }}</p>
                                <p>User ID: {{ $user->member->user_id }}</p>
                                <p>Tinggi Badan: {{ $user->member->tinggi_badan }}</p>
                                <p>Berat Badan: {{ $user->member->berat_badan }}</p>
                                <p>Created At: {{ $user->member->created_at }}</p>
                                <p>Updated At: {{ $user->member->updated_at }}</p>
                            @else
                                <p>This user is not a member.</p>
                            @endif
                        @endif

                        </td>

                        <td>
                            <form action="{{ route('user.edit', ['id' => $user->id]) }}" method="get">
                                <button type="submit">Edit</button>
                            </form>
                        </td>
                        <td>
                            <form action="{{ route('user.delete', ['id' => $user->id]) }}" method="get" onsubmit="return confirm('Are you sure you want to delete this user?')">
                                @csrf
                                <button type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>