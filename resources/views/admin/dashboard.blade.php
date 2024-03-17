@extends('layouts.admin')

@section('title')
    Dashboard
@endsection

@section('content')
    <h1> dashboard</h1>
    @auth
        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <a :href="route('admin.logout')"
                onclick="event.preventDefault();
                        this.closest('form').submit();">
                {{ __('Log Out') }}
            </a>
        </form>
    @endauth
@endsection
