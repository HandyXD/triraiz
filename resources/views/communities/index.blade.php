@extends('layouts.app')

@section('title', 'Comunidades')

@section('content')
<section class="py-12">
    <div class="container mx-auto px-6">
        <h1 class="text-3xl font-bold mb-8">Nuestras Comunidades</h1>
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            @foreach($communities as $community)
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <img src="{{ $community->banner_image ?? asset('img/defecto.png') }}" class="w-full h-48 object-cover" alt="{{ $community->name }}">
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-2">{{ $community->name }}</h3>
                        <p class="text-gray-600 mb-4">{{ Str::limit($community->description, 100) }}</p>
                        <a href="{{ route('communities.show', $community) }}" class="text-yellow-600 hover:underline font-semibold">Más información →</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
