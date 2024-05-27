@extends('frontend.layouts.app')

@section('title', __('sign_in'))

@section('meta')
    @php
        $data = metaData('login');
    @endphp

    <meta name="title" content="{{ $data->title }}">
    <meta name="description" content="{{ $data->description }}">

    <meta property="og:image" content="{{ $data->image_url }}" />
    <meta property="og:site_name" content="{{ config('app.name') }}">
    <meta property="og:title" content="{{ $data->title }}">
    <meta property="og:url" content="{{ route('frontend.login') }}">
    <meta property="og:type" content="article">
    <meta property="og:description" content="{{ $data->description }}">

    <meta name=twitter:card content={{ $data->image_url }} />
    <meta name=twitter:site content="{{ config('app.name') }}" />
    <meta name=twitter:url content="{{ route('frontend.login') }}" />
    <meta name=twitter:title content="{{ $data->title }}" />
    <meta name=twitter:description content="{{ $data->description }}" />
    <meta name=twitter:image content="{{ $data->image_url }}" />
@endsection

@section('content')
    @livewire('auth.login')
@endsection
