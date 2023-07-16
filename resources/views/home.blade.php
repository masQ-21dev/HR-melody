@extends('layout.main')

@section("title", 'home')

@section("content")

    {{ Auth::user()->role}}

    <a href="/logout">logout</a>
@endsection
