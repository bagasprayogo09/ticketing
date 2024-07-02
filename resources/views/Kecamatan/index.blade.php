<x-app-layout>
    <div class="container mx-auto px-4 py-8">
        <h2 class="font-semibold text-xl text-center text-blue-600 dark:text-blue-400 leading-tight">
            {{ __('Data Kecamatan dan Kelurahan') }}
        </h2>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-6">
                <p class="mb-2 text-lg text-black-800 dark:text-gray-500">
                    Tambakan Data Kecamatan dan Kelurahan baru dengan mengklik tombol di bawah ini:
                </p>
                <a href="{{ route('kecamatan.create') }}" class="btn custom-button-color inline-block bg-blue-400 hover:bg-blue-600 text-white font-bold py-1 px-6 rounded">
                    Add New
                </a>
            </div>
            <div class="overflow-x-auto mt-6"> <!-- Added margin-top to create space between button and table -->
                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-800 bg-gray-100 dark:bg-gray-800 text-gray-800 dark:text-gray-200">
                    <thead class="table-header dark:table-header-dark">
                        <tr>
                            <th class="px-6 py-2 border-b-2 border-gray-200 dark:border-gray-700 text-left">ID Number</th>
                            <th class="px-6 py-2 border-b-2 border-gray-200 dark:border-gray-700 text-left">Kecamatan dan Kelurahan</th>
                            <th class="px-6 py-2 border-b-2 border-gray-200 dark:border-gray-700 text-left">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kecamatan as $kecamatan)
                            <tr class="table-row dark:table-row-dark table-row-hover dark:table-row-dark-hover">
                                <td class="px-6 py-4">{{ $kecamatan->id }}</td>
                                <td class="px-6 py-4">{{ $kecamatan->nama_kecamatan }}</td>
                                <td class="px-6 py-4">
                                    <a href="{{ route('kecamatan.edit', $kecamatan) }}" class="text-black hover:text-black">Edit</a>
                                    <form action="{{ route('kecamatan.destroy', $kecamatan) }}" method="post" style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 dark:text-green-900 hover:underline ml-4">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <style>
        .custom-button-color {
            background-color: #4caf50; /* Warna latar belakang tombol */
            color: white; /* Warna teks tombol */
        }
        .table-header {
            background-color: rgb(41, 221, 221); /* bg-gray-300 */
            color: whitesmoke; /* text-gray-800 */
        }
        .table-header-dark {
            background-color: rgb(41, 221, 221); /* bg-gray-900 */
            color: whitesmoke; /* text-gray-200 */
        }
        .table-row {
            background-color: rgb(98, 131, 32) /* bg-white */
        }
        .custom-table tbody td a {
            color: red; /* Warna link */
            font-weight: bold; /* Ketebalan font link */
        }
        .custom-table tbody td a:hover {
            color: red; /* Warna link saat hover */
        }
    </style>
</x-app-layout>
