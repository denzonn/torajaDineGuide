@extends('layouts.app')

@section('title')
    Update Cafe
@endsection

@section('content')
    <div class="bg-white p-8 rounded-md text-gray-500">
        <div class="flex flex-row gap-3 items-center">
            <a href="{{ route('cafe.index') }}" class="py-1 px-2 rounded-md bg-secondary text-white"><i
                    class="fa-solid fa-arrow-left"></i></a>
            <div class="text-xl font-semibold">Update Cafe</div>
        </div>
        <div>
            <form action="{{ route('cafe.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="grid grid-cols-2 gap-2">
                    <div class="mt-6 flex flex-col gap-2">
                        <label for="">Nama Cafe</label>
                        <input type="text" placeholder="Masukkan Nama Cafe" name="name"
                            class="w-full border px-4 py-2 rounded-md bg-transparent" value="{{ $data->name }}"
                            required />
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="mt-6 flex flex-col gap-2">
                            <label for="">Jenis Kuliner</label>
                            <select name="kuliner_type" id=""
                                class="bg-transparent border px-4 py-[8px] rounded-md">
                                <option value="Cafe" {{ $data->kuliner_type === 'Cafe' ? 'selected' : '' }}>Cafe</option>
                                <option value="Rumah Makan" {{ $data->kuliner_type === 'Rumah Makan' ? 'selected' : '' }}>
                                    Rumah Makan</option>
                            </select>
                        </div>
                        <div class="mt-6 flex flex-col gap-2">
                            <label for="">Nama Cafe</label>
                            <select name="is_halal" id="" class="bg-transparent border px-4 py-[8px] rounded-md">
                                <option value="1" {{ $data->is_halal === 1 ? 'selected' : '' }}>Halal</option>
                                <option value="0" {{ $data->is_halal === 0 ? 'selected' : '' }}>Non Halal</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-2">
                    <div class="mt-6 flex flex-col gap-2">
                        <label for="">Lokasi Latitude</label>
                        <input type="text" placeholder="Masukkan Lokasi Latitude" name="latitude"
                            class="w-full border px-4 py-2 rounded-md bg-transparent" value="{{ $data->latitude }}"
                            required />
                    </div>
                    <div class="mt-6 flex flex-col gap-2">
                        <label for="">Lokasi Longitude</label>
                        <input type="text" placeholder="Masukkan Lokasi Longitude" name="longitude"
                            class="w-full border px-4 py-2 rounded-md bg-transparent" value="{{ $data->longitude }}"
                            required />
                    </div>
                </div>
                <div class="mt-6 grid grid-cols-2 gap-2">
                    <div>
                        <label for="">Foto Kuliner <span class="text-red-500 text-xs">*Tidak perlu upload klaw tidak
                                ingin mengganti</span></label>
                        <input type="file" name="photo" class="w-full border px-4 py-[6px] rounded-md bg-transparent"
                            accept=".png, .jpg, .jpeg" />
                    </div>
                    <div>
                        <div>Foto Kuliner</div>
                        <img src="{{ Storage::url($data->photo) }}" alt="" class="w-48">
                    </div>
                </div>
                <button type="submit" class="w-full rounded-md bg-secondary mt-8 text-white py-2 text-lg">Update
                    Cafe</button>
            </form>
        </div>
    </div>
@endsection
