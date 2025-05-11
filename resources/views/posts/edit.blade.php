@extends('layouts.app')
@section('title', 'Edita tú Post')

@section('content')
    @include('posts.form', ['post' => $post, 'categories' => $categories, 'communities' => $communities])
@endsection
