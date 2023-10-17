@extends('layouts.base')

@section('body')
    @yield('hero')
    @yield('story')

    @isset($slot)
        {{ $slot }}
    @endisset
@endsection
