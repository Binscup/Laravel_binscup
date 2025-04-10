<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ isset($hospital) ? 'Edit' : 'Tambah' }} Data Rumah Sakit
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form method="POST" action="{{ isset($hospital) ? route('hospitals.update', $hospital) : route('hospitals.store') }}" class="space-y-4">
                    @csrf
                    @if(isset($hospital)) @method('PUT') @endif

                    <div>
                        <label for="nama" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Nama Rumah Sakit</label>
                        <input type="text" id="nama" name="nama" value="{{ old('nama', $hospital->nama ?? '') }}" required
                               class="w-full mt-1 rounded border-gray-300 dark:bg-gray-700 dark:text-white">
                    </div>

                    <div>
                        <label for="alamat" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Alamat</label>
                        <textarea id="alamat" name="alamat" required
                                  class="w-full mt-1 rounded border-gray-300 dark:bg-gray-700 dark:text-white">{{ old('alamat', $hospital->alamat ?? '') }}</textarea>
                    </div>

                    <div>
                        <label for="email" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Email</label>
                        <input type="email" id="email" name="email" value="{{ old('email', $hospital->email ?? '') }}"
                               class="w-full mt-1 rounded border-gray-300 dark:bg-gray-700 dark:text-white">
                    </div>

                    <div>
                        <label for="telepon" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Telepon</label>
                        <input type="text" id="telepon" name="telepon" value="{{ old('telepon', $hospital->telepon ?? '') }}"
                               class="w-full mt-1 rounded border-gray-300 dark:bg-gray-700 dark:text-white">
                    </div>

                    <div class="flex justify-between items-center">
                        <a href="{{ route('hospitals.index') }}" class="text-sm text-gray-600 hover:underline">← Kembali</a>
                        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
                            {{ isset($hospital) ? 'Update' : 'Simpan' }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
