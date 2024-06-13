@extends('layouts.app')

@section('title')
    Dashboard
@endsection

@section('content')
    <div class=" font-semibold text-secondary text-4xl mb-4">Dashboard</div>
    <div class="grid grid-cols-4 gap-4">
        <div class="bg-secondary p-8 rounded-md text-white">
            <div class="text-2xl font-semibold">Kategori</div>
            <div class="text-6xl font-semibold">{{ $category }} <span class="text-lg font-medium">data</span></div>
        </div>
        <div class="bg-secondary p-8 rounded-md text-white">
            <div class="text-2xl font-semibold">Cafe</div>
            <div class="text-6xl font-semibold">{{ $cafe }} <span class="text-lg font-medium">data</span></div>
        </div>
        <div class="bg-secondary p-8 rounded-md text-white">
            <div class="text-2xl font-semibold">Menu</div>
            <div class="text-6xl font-semibold">{{ $menu }} <span class="text-lg font-medium">data</span></div>
        </div>
    </div>
@endsection
