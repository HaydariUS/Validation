<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Messages</title>
</head>
<body>
    <h1>Send a Message</h1>
    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <form action="/messages" method="POST">
        @csrf
        <label>Name:</label>
        <input type="text" name="name" required><br>

        <label>Email:</label>
        <input type="email" name="email" required><br>

        <label>Message:</label>
        <textarea name="message" required></textarea><br>

        <button type="submit">Send</button>
    </form>

    <h2>Received Messages</h2>
    <ul>
        @foreach($messages as $message)
            <li>{{ $message->name }} ({{ $message->email }}) - {{ $message->message }} | Sent on: {{ $message->created_at }}</li>
        @endforeach
    </ul>
</body>
</html>
