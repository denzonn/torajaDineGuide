@extends('layouts.app')

@section('title')
    Kategori
@endsection

@section('content')
    <div class="bg-white p-8 rounded-md text-gray-500">
        <div class="flex flex-row gap-2 items-center">
            <div>
                <a href="{{ route('cafe.index') }}" class="bg-third py-2 px-4 rounded-md"><i class="fa-solid fa-arrow-left text-white"></i></a>
            </div>
            <div class="text-2xl font-semibold text-black">{{ $data->name }}</div>
        </div>
        <div class="mt-6">
            <a href="{{ route('menu-create', $data->id) }}" class="px-6 py-3 bg-secondary rounded-md text-white ">
                Tambah Menu
            </a>
        </div>
        <div class="pt-4">
            <table id="menuTable" class="w-full">
                <thead class="text-left">
                    <tr>
                        <th scope="col"
                            class="px-6 py-3 bg-gray-50 text-center text-xs font-medium text-gray-500 uppercase tracking-wider w-1/12">
                            No</th>
                        <th scope="col"
                            class="px-6 py-3 bg-gray-50 text-center text-xs font-medium text-gray-500 uppercase tracking-wider w-2/12">
                            Foto</th>
                        <th scope="col"
                            class="px-6 py-3 bg-gray-50 text-center text-xs font-medium text-gray-500 uppercase tracking-wider w-4/12">
                            Nama Menu</th>
                        <th scope="col"
                            class="px-6 py-3 bg-gray-50 text-center text-xs font-medium text-gray-500 uppercase tracking-wider w-2/12">
                            Kategori</th>
                        <th scope="col"
                            class="px-6 py-3 bg-gray-50 text-center text-xs font-medium text-gray-500 uppercase tracking-wider w-2/12">
                            Harga</th>
                        <th scope="col"
                            class="px-6 py-3 bg-gray-50 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Action
                        </th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection

@push('addon-script')
    <script>
        $(document).ready(function() {
            $('#menuTable').DataTable({
                processing: true,
                ajax: "{{ route('menuData', ['cafe_id' => $data->id]) }}",
                columns: [{
                        data: null,
                        render: function(data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        }
                    },
                    {
                        data: 'photo',
                        name: 'photo',
                        render: function(data, type, row, meta) {
                            return '<img src="{{ url("storage") }}/' + data + '" alt="Product Image" class="w-full object-cover">';
                        }
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'category.name',
                        name: 'category.name'
                    },
                    {
                        data: 'price',
                        name: 'price',
                        render: function(data, type, row) {
                            var formattedPrice = 'Rp. ' + data.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
                            return formattedPrice;
                        }
                    },
                    {
                        data: 'id',
                        render: function(data, type, row) {
                            let editUrl = '{{ route('menu-edit', ':id') }}';
                            let deleteUrl = '{{ route('menu-destroy', ':id') }}';
                            editUrl = editUrl.replace(':id', data);
                            deleteUrl = deleteUrl.replace(':id', data);
                            return '<div class="flex">' +
                                '<a href="' + editUrl +
                                '" class="bg-yellow-500 px-3 text-sm py-1 rounded-md text-white mr-2" data-id="' +
                                data + '">Edit</a>' +
                                '<form action="' + deleteUrl +
                                '" method="POST" class="d-inline delete-form">' +
                                '@csrf' +
                                '@method('DELETE')' +
                                '<button class="bg-red-500 text-white px-3 text-sm py-1 rounded-md delete-button" type="button">Delete</button>' +
                                '</form>' +
                                '</div>';
                        }
                    },

                ]
            });

            // SweetAlert2 delete confirmation
            $(document).on('click', '.delete-button', function(e) {
                e.preventDefault();
                let form = $(this).closest('form');

                Swal.fire({
                    title: 'Are you sure?',
                    text: "Apakah kamu ingin menghapus Menu?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });
    </script>
@endpush
