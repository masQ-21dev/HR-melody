@extends('layout.main')

@section("title", 'home')

@section("content")

    <h3>anda login denga akun {{Auth::user()->username}}</h3>
    <h4>sebai role {{ Auth::user()->role->role_name}}</h4>



    <a href="/logout">logout</a>
    <br>
    <a href="/karyawan">karyawan</a>
@endsection
