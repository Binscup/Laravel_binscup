<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Pasien') }}
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

                    <div class="flex flex-col sm:flex-row sm:justify-between  mb-4 gap-4">
                        <a href="{{ route('patients.create') }}" class="text-blue-500 hover:underline">
                            + Tambah Pasien
                        </a>
                        <select id="hospital-filter" class="form-select rounded border-gray-300 dark:bg-gray-700 dark:text-white">
                            <option value="">Semua Rumah Sakit</option>
                            @foreach($hospitals as $hospital)
                                <option value="{{ $hospital->id }}" {{ request('hospital_id') == $hospital->id ? 'selected' : '' }}>
                                    {{ $hospital->nama }}
                                </option>
                            @endforeach
                        </select>

                    </div>

                    <div class="overflow-auto">

                        <table id="patientsTable" class="display stripe hover w-full">

                            <thead>

                                <tr>
                                    <th>Nama</th>
                                    <th>Alamat</th>
                                    <th>Telepon</th>
                                    <th>Rumah Sakit</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($patients as $patient)
                                    <tr id="row-{{ $patient->id }}">
                                        <td>{{ $patient->nama }}</td>
                                        <td>{{ $patient->alamat }}</td>
                                        <td>{{ $patient->telepon }}</td>
                                        <td>{{ $patient->hospital->nama }}</td>
                                        <td>
                                            <a href="{{ route('patients.edit', $patient) }}" class="text-indigo-500 hover:underline">Edit</a>
                                            <form action="{{ route('patients.destroy', $patient->id) }}" method="POST" style="display:inline">
                                                @csrf
                                                @method('DELETE')
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
                            $('#patientsTable').DataTable({
                                responsive: true,
                                language: {
                                    url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/id.json'
                                }
                            });

                            $('#hospital-filter').on('change', function () {
                                const id = $(this).val();
                                const url = "{{ route('patients.filter') }}";
                                window.location.href = url + (id ? '?hospital_id=' + id : '');
                            });
                        });
                    </script>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
