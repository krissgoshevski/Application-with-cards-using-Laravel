@extends('layouts.app')

@section('content')
<center> 
<h2>Create New Card</h2> <br>


<form method="POST" action=" {{ route('card.store') }}">
    @csrf

<p>Title:<input type="text" name="title"/> </p>
<p>Sub Title:<input type="text" name="sub_title"/> </p>
<p>Description: <textarea name="description" cols="30" rows="10" placeholder="Enter card description"></textarea> </p> <br>
<button type="submit">Create card</button>
</form>
</center>


<hr>
<center><h2>List of all cards</h2></center>


        @foreach($cards as $card)
<div>
    <h2> {{ $card->title }}</h2>
    <h4> {{ $card->sub_title }}</h4>
    <h5> {{ $card->description }}</h5> 
</div>



<form method="POST" action=" {{ route('card.destroy', $card->id) }}">
@csrf
@method('DELETE')
<button type="submit">Delete</button>
</form> <hr>

<a href="{{ route('card.edit', $card->id) }}">Edit</a>

        @endforeach
@endsection