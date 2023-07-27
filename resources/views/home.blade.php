@extends('layout.navigate')

@section("title", 'home')

@section("content")

    <h3>anda login denga akun {{Auth::user()->username}}</h3>
    <h4>sebai role {{ Auth::user()->role->role_name}}</h4>



    <a href="{{route('logout')}}">logout</a>
    <br>
    <a href="{{route('karyawan.index')}}">karyawan</a>
    <br>
    <a href="{{ route('print.aplication', ['id'=>1]) }}">apl</a>
    <br>
    <a href="{{ route('print.lampiran', ['id'=>1]) }}">lmp</a>
@endsection
