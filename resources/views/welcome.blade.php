@extends('layouts.app')

@section('title', 'Inicio')

@section('content')

    @include('components.sections.hero')

    @include('components.sections.communities')

    @include('components.sections.heritage')

    @include('components.sections.testimonials')

@endsection
