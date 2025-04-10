<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    {{-- DataTables CDN --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <a href="{{ route('hospitals.create') }}" class="text-blue-500 hover:underline mb-4 inline-block">
                        + Tambah Rumah Sakit
                    </a>

                    <div class="overflow-auto">
                        <table id="hospitalsTable" class="display stripe hover w-full">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Alamat</th>
                                    <th>Email</th>
                                    <th>Telepon</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($hospitals as $hospital)
                                    <tr>
                                        <td>{{ $hospital->nama }}</td>
                                        <td>{{ $hospital->alamat }}</td>
                                        <td>{{ $hospital->email }}</td>
                                        <td>{{ $hospital->telepon }}</td>
                                        <td>
                                            <a href="{{ route('hospitals.edit', $hospital) }}" class="text-indigo-500 hover:underline">Edit</a>
                                            <form action="{{ route('hospitals.destroy', $hospital) }}" method="POST"
                                                style="display:inline">
                                                @csrf @method('DELETE')
                                                <button type="submit" class="text-red-500 hover:underline ml-2">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <script>
                        $(document).ready(function () {
                            $('#hospitalsTable').DataTable({
                                responsive: true,
                                language: {
                                    url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/id.json'
                                }
                            });
                        });
                    </script>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
