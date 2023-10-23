@extends('layouts.base')

@section('body')
    @include('components.hero')
    @include('components.how')
    @include('components.projects')
    @include('components.comments')
    @include('components.pricing')
    @include('components.services')
    @include('components.story')
    @include('components.stack')
    @include('components.faq')
    @include('components.footer')

    @isset($slot)
        {{ $slot }}
    @endisset
@endsection
