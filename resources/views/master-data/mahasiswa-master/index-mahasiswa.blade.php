<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Daftar Mahasiswa') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <!-- Tombol Export -->
                    <a href="{{ route('export-mahasiswa') }}" class="inline-flex justify-center items-center px-4 py-2 text-sm font-medium text-white bg-blue-600 border border-transparent rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        <i class="fas fa-print mr-2"></i> Export Data Mahasiswa
                    </a>


                    <h2 class="mb-5 text-2xl font-bold">Daftar Mahasiswa</h2>

                    <!-- Tabel Daftar Mahasiswa -->
                    <table class="min-w-full table-auto">
                        <thead>
                            <tr>
                                <th class="px-4 py-2 text-left">NPM</th>
                                <th class="px-4 py-2 text-left">Nama</th>
                                <th class="px-4 py-2 text-left">Program Studi</th>
                                <th class="px-4 py-2 text-left">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($mahasiswas as $mahasiswa)
                                <tr>
                                    <td class="border px-4 py-2">{{ $mahasiswa->npm }}</td>
                                    <td class="border px-4 py-2">{{ $mahasiswa->nama }}</td>
                                    <td class="border px-4 py-2">{{ $mahasiswa->prodi }}</td>
                                    <td class="border px-4 py-2">
                                        <!-- Tombol Edit -->
                                        <a href="{{ route('edit-mahasiswa', $mahasiswa->npm) }}" class="text-blue-500 hover:text-blue-700">
                                            Edit
                                        </a>
                                        <!-- Tombol Hapus -->
                                        <form action="{{ route('destroy-mahasiswa', $mahasiswa->npm) }}" method="POST" class="inline" onsubmit="return confirmDelete()">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 hover:text-red-700 ml-4">
                                                Hapus
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script>
        function confirmDelete() {
        return confirm("Apakah Anda yakin ingin menghapus data mahasiswa dengan NPM: {{ $mahasiswa->npm }}?");
        }
        </script>
</x-app-layout>