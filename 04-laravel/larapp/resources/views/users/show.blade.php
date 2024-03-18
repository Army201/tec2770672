@extends('layouts.app')
@section('title', 'Show User - PetsApp')

@section('content')

<header class="nav level-2">
    <a href="{{ url('users') }}">
        <img src="{{ asset('images/ico-back.svg') }}" alt="Back">
    </a>
    <img src="{{ asset('images/logo.svg') }}" alt="Logo" width="200px">
    <a href="javascript:;" class="mburger">
        <img src="{{ asset('images/mburger.svg') }}" alt="Menu Burger">
    </a>
</header>
<section class="show">
    <h1>Show User</h1>
    <img src="{{ asset('images/'.$user->photo) }}" alt="Photo" class="photo">
    <p class="role">{{$user->role}}</p>
    <div class="info">
        <p>{{$user->document}}</p>
        <p>{{$user->fullname}}</p>  
        <p>{{$user->email}}</p>
        <p>{{$user->phone}}</p>
        <p>{{$user->gender}}</p>
        <p>{{Carbon\Carbon::parse($user->birthdate)->diffforhumans()}}</p>
    </div>
</section>
@endsection 