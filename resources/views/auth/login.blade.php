@extends('layouts.app')
@section("content")
<div class="card">
    <h2>Login Kasir</h2>
    <form method="POST" action="/login">
        @csrf
        <input type="text" name="username" placeholder="Username" required><br><br>
        <input type="password" name="password" placeholder="Password" required><br><br>
        <button type="submit">Login</button>
    </form>
@endsection
