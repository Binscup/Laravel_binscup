<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Edit Rumah Sakit
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form action="{{ route('hospitals.update', $hospital->id) }}" method="POST" class="space-y-4">
                    @csrf
                    @method('PUT')

                    <div>
                        <label for="nama" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Nama Rumah Sakit</label>
                        <input type="text" name="nama" id="nama" value="{{ old('nama', $hospital->nama) }}" required
                               class="w-full mt-1 rounded border-gray-300 dark:bg-gray-700 dark:text-white">
                    </div>

                    <div>
                        <label for="alamat" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Alamat</label>
                        <textarea name="alamat" id="alamat" required
                                  class="w-full mt-1 rounded border-gray-300 dark:bg-gray-700 dark:text-white">{{ old('alamat', $hospital->alamat) }}</textarea>
                    </div>

                    <div>
                        <label for="email" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Email</label>
                        <input type="email" name="email" id="email" value="{{ old('email', $hospital->email) }}"
                               class="w-full mt-1 rounded border-gray-300 dark:bg-gray-700 dark:text-white">
                    </div>

                    <div>
                        <label for="telepon" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Telepon</label>
                        <input type="text" name="telepon" id="telepon" value="{{ old('telepon', $hospital->telepon) }}"
                               class="w-full mt-1 rounded border-gray-300 dark:bg-gray-700 dark:text-white">
                    </div>

                    <div class="flex justify-between items-center">
                        <a href="{{ route('hospitals.index') }}" class="text-sm text-gray-600 hover:underline">← Kembali</a>
                        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
                            Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
