@extends('layouts.app')
@section('title', 'Show User - PetsApp')

@section('content')

<header class="nav level-2">
    <a href="{{ url('pets') }}">
        <img src="{{ asset('images/ico-back.svg') }}" alt="Back">
    </a>
    <img src="{{ asset('images/logo.svg') }}" alt="Logo" width="200px">
    <a href="javascript:;" class="mburger">
        <img src="{{ asset('images/mburger.svg') }}" alt="Menu Burger">
    </a>
</header>
<section class="show">
    <h1>Show User</h1>
    <img src="{{ asset('images/'.$pet->photo) }}" alt="Photo" class="photo">
    <p class="role">{{$pet->kind}}</p>
    <div class="info">
        <p>{{$pet->name}}</p>
        <p>{{$pet->kind}}</p>  
        <p>{{$pet->weight}}</p>
        <p>{{$pet->age}}</p>
        <p>{{$pet->breed}}</p>
        <p>{{$pet->location}}</p>
    </div>
</section>
@endsection 