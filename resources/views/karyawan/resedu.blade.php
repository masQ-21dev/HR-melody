@extends('layout.main')

@section('title', 'resderu');

@section('content')
    {{-- <h1>{{now()->format('d-m-Y')}} </h1>
    <h1>{{ date('j \\ F Y', strtotime(now()->format('d-m-Y')))}}</h1> --}}



    @foreach ($data as $item)
        {{ $item['name'] }}
        {{ $item['countdata'] }} <br>
        {{-- {{gettype($item)}} --}}
    @endforeach

    {{gettype($departemen)}}
        @foreach ($departemen as $item)
            {{$item}}
        @endforeach
    {{-- {{gettype($data)}} --}}
    <br>
    {{-- {{$data}} --}}


@endsection
