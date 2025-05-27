<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <style>
        body { font-family: sans-serif; background: #f4f4f4; }
        .card { max-width: 400px; margin: 100px auto; padding: 20px; background: white; border-radius: 8px; }
    </style>
</head>
<body>
<div class="card">
    <h2>Login Kasir</h2>
    <form method="POST" action="/login">
        @csrf
        <input type="text" name="username" placeholder="Username" required><br><br>
        <input type="password" name="password" placeholder="Password" required><br><br>
        <button type="submit">Login</button>
    </form>
</div>
</body>
</html>
