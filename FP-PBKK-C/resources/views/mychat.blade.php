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
  <link rel="stylesheet" href="css/chat-style.css">
  <!-- End CSS -->

</head>

<body>
<div class="chat">

  <!-- Header -->
  <div class="top">
    <img src="https://assets.edlin.app/images/rossedlin/03/rossedlin-03-100.jpg" alt="Avatar">
    <div>
      <p>Ross Edlin</p>
      <small>Online</small>
    </div>
  </div>
  <!-- End Header -->

  <!-- Chat -->
  <div class="messages">
    @include('receive', ['message' => "Hey! What's up!  👋", 'timestamp' => now()])
    @include('receive', ['message' => "Ask a friend to open this link and you can chat with them!", 'timestamp' => now()])
</div>


  <!-- End Chat -->

  <!-- Footer -->
  <div class="bottom">
    <form>
      <input type="text" id="message" name="message" placeholder="Enter message..." autocomplete="off">
      <button type="submit"></button>
    </form>
  </div>
  <!-- End Footer -->

</div>
</body>

<script>
  const pusher = new Pusher('{{config('broadcasting.connections.pusher.key')}}', {cluster: 'ap1'});

  const channel = pusher.subscribe('public');

  // Receive messages
channel.bind('chat', function (data) {
    console.log('Received message data:', data);

    $.post("/receive", {
        _token:  '{{ csrf_token() }}',
        message: data.message,
        timestamp: data.timestamp,
    }).done(function (res) {
        console.log('Server response for receive:', res);
        $(".messages > .message").last().after(res);
        $(document).scrollTop($(document).height());
    });
});

// Broadcast messages
$("form").submit(function (event) {
    event.preventDefault();

    console.log('Sending message:', $("form #message").val());

    $.ajax({
        url:     "/broadcast",
        method:  'POST',
        headers: {
            'X-Socket-Id': pusher.connection.socket_id
        },
        data:    {
            _token:  '{{ csrf_token() }}',
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
