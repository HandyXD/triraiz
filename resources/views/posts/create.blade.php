@extends('layouts.app')

@section('title', 'Crea tú Post')


@section('content')
    @include('posts.form', ['post' => null, 'categories' => $categories, 'communities' => $communities])
@endsection