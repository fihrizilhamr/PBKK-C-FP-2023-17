<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List of My Chats</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        h1 {
            color: #333;
        }

        h2 {
            color: #555;
            margin-top: 20px;
        }

        ul {
            list-style-type: none;
            padding: 0;
            width: 100%;
            max-width: 400px;
        }

        li {
            background-color: #fff;
            margin: 10px 0;
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            transition: background-color 0.3s ease;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        li:hover {
            background-color: #f0f0f0;
        }

        p {
            color: #777;
        }
    </style>
</head>

<body>
    <h1>List of My Chats</h1>

    @if($existingTrainerChat->count() > 0)
    <h2>Trainer Chats</h2>
    <ul>
        @foreach($existingTrainerChat as $chat)
            @if($chat->trainer)
                <li>
                <a href="{{ route('chat', [
    'userId1' => min($chat->trainer->user->id, $chat->member->user->id),
    'userId2' => max($chat->trainer->user->id, $chat->member->user->id)
]) }}">
                        <span>Trainer: {{ $chat->trainer->user->name }}</span>
                        <!-- You can add more details from your Chat model as needed -->
                    </a>
                </li>
            @else
                <li>
                    <span>Trainer: Unknown</span>
                </li>
            @endif
        @endforeach
    </ul>
    @else
    <p>No Trainer chats available.</p>
    @endif

    @if($existingMemberChat->count() > 0)
    <h2>Member Chats</h2>
    <ul>
        @foreach($existingMemberChat as $chat)
            @if($chat->member)
                <li>
                <a href="{{ route('chat', [
    'userId1' => min($chat->trainer->user->id, $chat->member->user->id),
    'userId2' => max($chat->trainer->user->id, $chat->member->user->id)
]) }}">
                        <span>Member: {{ $chat->member->user->name }}</span>
                        <!-- You can add more details from your Chat model as needed -->
                    </a>
                </li>
            @else
                <li>
                    <span>Member: Unknown</span>
                </li>
            @endif
        @endforeach
    </ul>
    @else
    <p>No Member chats available.</p>
    @endif

    <!-- Add any additional HTML or Blade directives as needed -->

</body>

</html>