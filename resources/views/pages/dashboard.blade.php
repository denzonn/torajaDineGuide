@extends('layouts.app')

@section('title')
    Dashboard
@endsection

@section('content')
    <div class="bg-white p-8 rounded-md text-gray-500">
        <div class=" font-semibold text-primary text-4xl">Dashboard</div>
        <div class=" mt-4 mb-2 text-2xl font-semibold ">Jumlah Data</div>
        <div class="grid grid-cols-4 gap-4">
            <div class="bg-secondary rounded-md p-4 text-white">
                <div class="text-2xl font-semibold">Kategori</div>
                <div class="text-6xl font-semibold">{{ $category }} <span class="text-lg font-medium">data</span></div>
            </div>
            <div class="bg-secondary rounded-md p-4 text-white">
                <div class="text-2xl font-semibold">Cafe</div>
                <div class="text-6xl font-semibold">{{ $cafe }} <span class="text-lg font-medium">data</span></div>
            </div>
            <div class="bg-secondary rounded-md p-4 text-white">
                <div class="text-2xl font-semibold">Menu</div>
                <div class="text-6xl font-semibold">{{ $menu }} <span class="text-lg font-medium">data</span></div>
            </div>
        </div>
    </div>
@endsection
