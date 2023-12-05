<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List of My Chats</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: whitesmoke;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        #chat-title {
                color: #333;
            }

            #trainer-chats,
            #member-chats {
                color: #555;
                margin-top: 20px;
            }

            #chat-list {
                list-style-type: none;
                padding: 0;
                width: 100%;
                max-width: 400px;
            }

            .chat-item {
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

            .chat-item:hover {
                background-color: #f0f0f0;
            }

            .chat-details {
                color: #777;
            }
        </style>
    </head>
    @include('layouts.home-navbar')
    <body>
        <br><br>
        <h1 id="chat-title">List of My Chats</h1>

        @if($existingTrainerChat->count() > 0)
            <h2 id="trainer-chats">Trainer Chats</h2>
            <ul id="chat-list">
                @foreach($existingTrainerChat as $chat)
                    @if($chat->trainer)
                        <li class="chat-item">
                            <a href="{{ route('chat', [
                                'userId1' => min($chat->trainer->user->id, $chat->member->user->id),
                                'userId2' => max($chat->trainer->user->id, $chat->member->user->id)
                            ]) }}">
                                <span class="chat-details">Trainer: {{ $chat->trainer->user->name }}</span>
                                <!-- You can add more details from your Chat model as needed -->
                            </a>
                        </li>
                    @else
                        <li class="chat-item">
                            <span class="chat-details">Trainer: Unknown</span>
                        </li>
                    @endif
                @endforeach
            </ul>
        @else
            <p class="chat-details">No Trainer chats available.</p>
        @endif

        @if($existingMemberChat->count() > 0)
            <h2 id="member-chats">Member Chats</h2>
            <ul id="chat-list">
                @foreach($existingMemberChat as $chat)
                    @if($chat->member)
                        <li class="chat-item">
                            <a href="{{ route('chat', [
                                'userId1' => min($chat->trainer->user->id, $chat->member->user->id),
                                'userId2' => max($chat->trainer->user->id, $chat->member->user->id)
                            ]) }}">
                                <span class="chat-details">Member: {{ $chat->member->user->name }}</span>
                                <!-- You can add more details from your Chat model as needed -->
                            </a>
                        </li>
                    @else
                        <li class="chat-item">
                            <span class="chat-details">Member: Unknown</span>
                        </li>
                    @endif
                @endforeach
            </ul>
        @else
            <p class="chat-details">No Member chats available.</p>
        @endif

        <!-- Add any additional HTML or Blade directives as needed -->

    </body>
