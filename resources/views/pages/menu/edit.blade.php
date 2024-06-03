@extends('layouts.app')

@section('title')
    Edit Menu
@endsection

@section('content')
    <div class="bg-white p-8 rounded-md text-gray-500">
        <div class="text-xl font-semibold">Edit Menu</div>
        <div>
            <form action="{{ route('menu-update', $data->id) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="grid grid-cols-2 gap-2">
                    <div class="mt-6 flex flex-col gap-2">
                        <label for="">Nama Menu</label>
                        <input type="text" placeholder="Masukkan Nama Menu" name="name"
                            class="w-full border px-4 py-2 rounded-md bg-transparent" value="{{ $data->name }}"
                            required />
                    </div>
                    <div class="mt-6 flex flex-col gap-2">
                        <label for="">Kategori</label>
                        <select name="category_id" id="" class="bg-transparent border px-4 py-[8px] rounded-md">
                            @foreach ($category as $item)
                                <option value="{{ $item->id }}"
                                    {{ $item->id === $data->category_id ? 'selected' : '' }}>{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-2">
                    <div class="mt-6 flex flex-col gap-2">
                        <label for="">Harga Menu</label>
                        <input type="number" placeholder="Masukkan Harga Menu" name="price"
                            class="w-full border px-4 py-2 rounded-md bg-transparent" value="{{ $data->price }}"
                            required />
                    </div>
                    <div class="mt-6 flex flex-col gap-2">
                        <label for="">Foto Menu <span class="text-red-500 text-xs">*Tidak perlu upload klaw tidak
                                ingin mengganti</span></label>
                        <input type="file" name="photo" class="w-full border px-4 py-[6px] rounded-md bg-transparent"
                            accept=".png, .jpg, .jpeg" />
                    </div>
                </div>
                <div class="mt-4 flex items-center justify-center w-full">
                    <img src="{{ Storage::url($data->photo) }}" alt="" class="h-[250px]">
                </div>
                <input type="hidden" name="cafe_id" value="{{ $data->cafe_id }}"
                    class="w-full border px-4 py-[6px] rounded-md bg-transparent" required />
                <button type="submit" class="w-full rounded-md bg-secondary mt-4 text-white py-2 text-lg">Update
                    Menu</button>
            </form>
        </div>
    </div>
@endsection
