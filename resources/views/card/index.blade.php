@extends('layouts.app')

@section('content')
<center> <h2>List of all cards</h2> </center>


@foreach($cards as $card)


<div>
    <h2> {{ $card->title }}</h2>
    <h4> {{ $card->sub_title }}</h4>
    <h5> {{ $card->description }}</h5> <hr>
</div>

@endforeach
@endsection