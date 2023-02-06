@extends('layouts.app')

@section('content')

<h1>{{$dish->name}}</h1>
<h2>{{$dish->price}}</h2>
<h3>{{$dish->description}}</h3>

@endsection