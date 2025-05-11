@extends('layouts.app')

@section('title', $community->name)

@section('content')
<div class="container mx-auto px-4 py-12 max-w-4xl">
    <div class="bg-white rounded-xl shadow-md overflow-hidden mb-8">
        <img src="{{'../'. $community->banner_image ?? asset('img/defecto.png') }}" alt="{{ $community->name }}" class="w-full h-64 object-cover">

        <div class="p-8">

            <div class="flex">
                <h1 class="text-3xl font-bold text-gray-900 mb-4 flex-auto">{{ $community->name }}</h1>
                <a href="{{ route('communities.index') }}"
                class="inline-block mb-6 text-sm px-4 py-2 bg-gray-200 text-gray-800 rounded hover:bg-gray-300 transition ">
                    ← Volver
                </a>
            </div>
            <div class="text-gray-700 mb-6">
                <p class="mb-3"><strong>Ubicación:</strong> {{ $community->location ?? 'No especificada' }}</p>
                <p class="mb-3"><strong>Lengua:</strong> {{ $community->language ?? 'No especificada' }}</p>
            </div>

            <div class="prose max-w-none text-gray-700 mb-6">
                @if($community->history)
                    <h3 class="font-bold">Historia</h3>
                    <p>{{ $community->history }}</p>
                @endif

                @if($community->traditions)
                    <h3 class="font-bold">Tradiciones</h3>
                    <p>{{ $community->traditions }}</p>
                @endif

                @if($community->bio)
                    <h3 class="font-bold">Biografía</h3>
                    <p>{{ $community->bio }}</p>
                @endif

                @if($community->contact_info)
                    <h3 class="font-bold">Contacto</h3>
                    <p>{{ $community->contact_info }}</p>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
