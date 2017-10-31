@extends('base')
@section('content')

<h2>Profile {{$user->name}}</h2>
    <div><a href="{{route('profile')}}">Info</a> | <a href="{{route('listgoods')}}">Listing my goods</a> | <a href="{{route('creategood')}}">Create good</a> | <a href="{{route('listsalesprofile')}}">My Sales</a> | <a href="{{route('listpurchaseprofile')}}">My Purchases</a></div>
    <div class="profile">
        @yield('tab')
    </div>

    @endsection
