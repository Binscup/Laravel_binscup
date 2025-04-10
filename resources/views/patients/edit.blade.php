<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Edit Data Pasien
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form method="POST" action="{{ route('patients.update', $patient) }}" class="space-y-4">
                    @csrf
                    @method('PUT')

                    <div>
                        <label for="nama" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Nama Pasien</label>
                        <input type="text" id="nama" name="nama" value="{{ old('nama', $patient->nama) }}" required
                               class="w-full mt-1 rounded border-gray-300 dark:bg-gray-700 dark:text-white">
                    </div>

                    <div>
                        <label for="alamat" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Alamat</label>
                        <input type="text" id="alamat" name="alamat" value="{{ old('alamat', $patient->alamat) }}" required
                               class="w-full mt-1 rounded border-gray-300 dark:bg-gray-700 dark:text-white">
                    </div>

                    <div>
                        <label for="telepon" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Telepon</label>
                        <input type="text" id="telepon" name="telepon" value="{{ old('telepon', $patient->telepon) }}" required
                               class="w-full mt-1 rounded border-gray-300 dark:bg-gray-700 dark:text-white">
                    </div>

                    <div>
                        <label for="hospital_id" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Rumah Sakit</label>
                        <select id="hospital_id" name="hospital_id" required
                                class="w-full mt-1 rounded border-gray-300 dark:bg-gray-700 dark:text-white">
                            <option value="">Pilih Rumah Sakit</option>
                            @foreach($hospitals as $hospital)
                                <option value="{{ $hospital->id }}" {{ $patient->hospital_id == $hospital->id ? 'selected' : '' }}>
                                    {{ $hospital->nama }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="flex justify-between items-center">
                        <a href="{{ route('patients.index') }}" class="text-sm text-gray-600 hover:underline">← Kembali</a>
                        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
                            Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
