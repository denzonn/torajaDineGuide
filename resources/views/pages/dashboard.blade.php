@extends('layouts.app')

@section('title')
    Dashboard
@endsection

@section('content')
    <div class=" font-semibold text-secondary text-4xl mb-4">Dashboard</div>
    <div class="grid grid-cols-4 gap-4">
        <div class="bg-white p-8 rounded-md text-gray-500">
            <div class="text-2xl font-semibold">Kategori</div>
            <div class="text-6xl font-semibold text-secondary">{{ $category }} <span class="text-lg font-medium text-gray-500">data</span></div>
        </div>
        <div class="bg-gray-200 p-8 rounded-md text-gray-600">
            <div class="text-2xl font-semibold">Cafe</div>
            <div class="text-6xl font-semibold">{{ $cafe }} <span class="text-lg font-medium">data</span></div>
        </div>
        <div class="bg-gray-400 p-8 rounded-md text-gray-800">
            <div class="text-2xl font-semibold">Menu</div>
            <div class="text-6xl font-semibold">{{ $menu }} <span class="text-lg font-medium">data</span></div>
        </div>
    </div>
@endsection
