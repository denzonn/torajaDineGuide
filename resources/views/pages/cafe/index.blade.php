@extends('layouts.app')

@section('title')
    Kuliner
@endsection

@section('content')
    <div class="bg-white p-8 rounded-md text-gray-500">
        <a href="{{ route('cafe.create') }}" class="px-6 py-3 bg-secondary rounded-md text-white">
            Tambah Kuliner
        </a>
        <div class="pt-4">
            <table id="cafeTable" class="w-full">
                <thead class="text-left">
                    <tr>
                        <th scope="col"
                            class="px-6 py-3 bg-gray-50 text-center text-xs font-medium text-gray-500 uppercase tracking-wider w-1/12">
                            No</th>
                        <th scope="col"
                            class="px-6 py-3 bg-gray-50 text-center text-xs font-medium text-gray-500 uppercase tracking-wider w-6/12">
                            Nama Kuliner</th>
                        <th scope="col"
                            class="px-6 py-3 bg-gray-50 text-center text-xs font-medium text-gray-500 uppercase tracking-wider w-6/12">
                            Jenis Kuliner</th>
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
            $('#cafeTable').DataTable({
                processing: true,
                ajax: "{{ route('cafeData') }}",
                columns: [{
                        data: null,
                        render: function(data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        }
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'kuliner_type',
                        name: 'kuliner_type'
                    },
                    {
                        data: 'id',
                        render: function(data) {
                            let editUrl = '{{ route('cafe.edit', ':id') }}';
                            let deleteUrl = '{{ route('cafe.destroy', ':id') }}';
                            let menuUrl = '{{ route('menu-index', ':id') }}';
                            editUrl = editUrl.replace(':id', data);
                            deleteUrl = deleteUrl.replace(':id', data);
                            menuUrl = menuUrl.replace(':id', data);
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
                                '<a href="' + menuUrl +
                                '" class="bg-secondary px-3 text-sm py-1 rounded-md text-white ml-2" data-id="' +
                                data + '">Menu</a>' +
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
                    text: "Apakah kamu ingin menghapus Cafe?",
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
