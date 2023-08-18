@extends('layouts.app')

@section('content')
<center> <h2>Edit card</h2> </center>
<input type="hidden" name="id" value="{{ $card->id }}">


<form method="POST" action="{{ route('card.update', [$card->id]) }}">
    @csrf
    @method('PUT')


<p>Title:<input type="text" name="title" value="{{ $card->title }}"/> </p>
<p>Sub Title:<input type="text" name="sub_title" value="{{ $card->sub_title }}"/> </p>
<p>Description: <textarea name="description" cols="30" rows="10" placeholder="Enter card description">{{ $card->description }}</textarea> </p> <br>
<button type="submit">Update this card</button>
</form>


@endsection