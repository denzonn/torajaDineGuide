@extends('layouts.app')

@section('title')
    Buat Cafe
@endsection

@section('content')
    <div class="bg-white p-8 rounded-md text-gray-500">
        <div class="flex flex-row gap-3 items-center">
            <a href="{{ route('cafe.index') }}" class="py-1 px-2 rounded-md bg-secondary text-white"><i class="fa-solid fa-arrow-left"></i></a>
            <div class="text-xl font-semibold">Tambahkan Cafe</div>
        </div>
        <div>
            <form action="{{ route('cafe.store') }}" method="POST">
                @csrf
                <div class="grid grid-cols-2 gap-2">
                    <div class="mt-6 flex flex-col gap-2">
                        <label for="">Nama Cafe</label>
                        <input type="text" placeholder="Masukkan Nama Cafe" name="name"
                            class="w-full border px-4 py-2 rounded-md bg-transparent" required />
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="mt-6 flex flex-col gap-2">
                            <label for="">Jenis Kuliner</label>
                            <select name="kuliner_type" id=""
                                class="bg-transparent border px-4 py-[8px] rounded-md">
                                <option value="Cafe" selected>Cafe</option>
                                <option value="Rumah Makan">Rumah Makan</option>
                            </select>
                        </div>
                        <div class="mt-6 flex flex-col gap-2">
                            <label for="">Status</label>
                            <select name="is_halal" id="" class="bg-transparent border px-4 py-[8px] rounded-md">
                                <option value="1" selected>Halal</option>
                                <option value="0">Non Halal</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-2">
                    <div class="mt-6 flex flex-col gap-2">
                        <label for="">Titik Latitude</label>
                        <input type="text" placeholder="Masukkan Titik Latitude" name="latitude"
                            class="w-full border px-4 py-2 rounded-md bg-transparent" required />
                    </div>
                    <div class="mt-6 flex flex-col gap-2">
                        <label for="">Titik Longitude</label>
                        <input type="text" placeholder="Masukkan Titik Longitude" name="longitude"
                            class="w-full border px-4 py-2 rounded-md bg-transparent" required />
                    </div>
                </div>
                <button type="submit" class="w-full rounded-md bg-secondary mt-8 text-white py-2 text-lg">Tambah
                    Cafe</button>
            </form>
        </div>
    </div>
@endsection
