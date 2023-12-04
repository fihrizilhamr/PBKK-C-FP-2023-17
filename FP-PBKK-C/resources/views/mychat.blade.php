<!DOCTYPE html>
<html lang="en">
<head>
  <title>Chat Laravel Pusher | Edlin App</title>
  <link rel="icon" href="https://assets.edlin.app/favicon/favicon.ico"/>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- JavaScript -->
  <script src="https://js.pusher.com/7.2/pusher.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <!-- End JavaScript -->

  <!-- CSS -->
  <link rel="stylesheet" href="{{ asset('/css/chat-style.css') }}">
  <!-- End CSS -->

</head>

<body>
<div class="chat">

  <!-- Header -->
  <div class="top">
  <img src="{{ asset('storage/trainer_images/' . $gambar) }}" alt="Avatar">
    <div>
      <p>{{$lawanBicara -> name}}</p>
      <small>Online</small>
      
    </div>
  </div>
  <!-- End Header -->

  <!-- Chat -->
  <div class="messages">

    @include('receive', ['message' => "Hey! What's up!  👋", 'timestamp' => now()->format('Y/m/d H:i:s'), 'gambar' => "default.png"])
    @include('broadcast', ['message' => "Helo! 👋", 'timestamp' => now()->format('Y/m/d H:i:s'), 'gambar' => "default.png"])
</div>



  <!-- End Chat -->

  <!-- Footer -->
  <div class="bottom">
    <form>
    @csrf
      <input type="text" id="message" name="message" placeholder="Enter message..." autocomplete="off">
      <button type="submit"></button>
    </form>
  </div>
  <!-- End Footer -->

</div>
</body>

<script type="module">
    // Your script code here
    const pusher = new Pusher('{{ config('broadcasting.connections.pusher.key') }}', { cluster: 'ap1' });
    const userId1 = parseInt("{{ $userId1 ?? '0' }}");
    const userId2 = parseInt("{{ $userId2 ?? '0' }}");
    let userNih = ("{{ $check }}" == 0) ? userId1 : userId2;

    console.log("{{ $gambar }}");
    console.log("{{ $check }}");
    console.log("User ID 1:", userId1);
    console.log("User ID 2:", userId2);

    import Echo from 'https://cdn.jsdelivr.net/npm/laravel-echo@1.11.1/dist/echo.js';

    window.Echo = new Echo({
        broadcaster: 'pusher',
        key: '25f9d000964cd1649bff',
        cluster: 'ap1',
        encrypted: true,
        logToConsole: true,
    });

// revceive messages
    window.Echo.private('private-chat.' + Math.min(userId1, userId2) + '.' + Math.max(userId1, userId2))
    .listen('.chat', (data) => {
        // console.log('Event triggered!');
        console.log(data);
        $.post("/receive/" + Math.min(userId1, userId2) + '.' + Math.max(userId1, userId2), {
            _token: data._token,
            message: data.message,
            timestamp: data.timestamp,
        }).done(function (res) {
            console.log('Server response for receive:', res);
            $(".messages > .message").last().after(res);
            $(document).scrollTop($(document).height());
        });
        // .fail(function (error) {
        //     console.error('Error in $.post for receive:', error);
        // });
      });


// Broadcast messages
$("form").submit(function (event) {
    event.preventDefault();

    console.log('Sending message:', $("form #message").val());

    $.ajax({
        url:     "/broadcast/" + Math.min(userId1, userId2) + '.' + Math.max(userId1, userId2),
        method:  'POST',
        headers: {
            'X-Socket-Id': pusher.connection.socket_id
        },
        data: {
            _token: '{{ csrf_token() }}',
            message: $("form #message").val(),
            timestamp: new Date().toLocaleString(),
        }

    }).done(function (res) {
        console.log('Server response for broadcast:', res);
        $(".messages > .message").last().after(res);
        $("form #message").val('');
        $(document).scrollTop($(document).height());
    });
});



</script>
</html>
