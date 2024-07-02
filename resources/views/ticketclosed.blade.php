<x-app-layout>
        <div align="center" class="container mx-auto px-4 py-8">
            <h2 class="font-semibold text-xl text-center text-blue-600 dark:text-blue-400 leading-tight">
                {{ __('Ticket Closed') }}
            </h2>

                @if (session('success'))
                    <div class="mb-4 text-green-500">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700 bg-gray-100 dark:bg-gray-800 text-gray-800 dark:text-gray-200">
                        <thead class="table-header dark:table-header-dark">
                            <tr>
                                <th class="px-4 py-2 border-b-2 border-gray-200 dark:border-gray-700 text-left">ID Ticket</th>
                                <th class="px-4 py-2 border-b-2 border-gray-200 dark:border-gray-700 text-left">Nama</th>
                                <th class="px-4 py-2 border-b-2 border-gray-200 dark:border-gray-700 text-left">Email</th>
                                <th class="px-4 py-2 border-b-2 border-gray-200 dark:border-gray-700 text-left">Departemen</th>
                                <th class="px-4 py-2 border-b-2 border-gray-200 dark:border-gray-700 text-left">Divisi</th>
                                <th class="px-4 py-2 border-b-2 border-gray-200 dark:border-gray-700 text-left">Kategori</th>
                                <th class="px-4 py-2 border-b-2 border-gray-200 dark:border-gray-700 text-left">Kecamatan</th>
                                <th class="px-4 py-2 border-b-2 border-gray-200 dark:border-gray-700 text-left">Deskripsi Masalah</th>
                                <th class="px-4 py-2 border-b-2 border-gray-200 dark:border-gray-700 text-left">Catatan Dari Petugas</th>
                                <th class="px-4 py-2 border-b-2 border-gray-200 dark:border-gray-700 text-left">Status</th>
                                <th class="px-4 py-2 border-b-2 border-gray-200 dark:border-gray-700 text-left">Photo</th>
                                <th class="px-4 py-2 border-b-2 border-gray-200 dark:border-gray-700 text-left">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tickets as $ticket)
                            <tr class="bg-white dark:bg-gray-800 hover:bg-gray-100 dark:hover:bg-gray-700">
                                <td class="px-4 py-2 border-b border-gray-200 dark:border-gray-700">{{ $ticket->id }}</td>
                                <td class="px-4 py-2 border-b border-gray-200 dark:border-gray-700">{{ $ticket->nama }}</td>
                                <td class="px-4 py-2 border-b border-gray-200 dark:border-gray-700">{{ $ticket->email }}</td>
                                <td class="px-4 py-2 border-b border-gray-200 dark:border-gray-700">{{ $ticket->departemen }}</td>
                                <td class="px-4 py-2 border-b border-gray-200 dark:border-gray-700">{{ $ticket->divisi }}</td>
                                <td class="px-4 py-2 border-b border-gray-200 dark:border-gray-700">{{ $ticket->kategori }}</td>
                                <td class="px-4 py-2 border-b border-gray-200 dark:border-gray-700">{{ $ticket->kecamatan }}</td>
                                <td class="px-4 py-2 border-b border-gray-200 dark:border-gray-700">{{ $ticket->description }}</td>
                                <td class="px-4 py-2 border-b border-gray-200 dark:border-gray-700">{{ $ticket->catatan }}</td>
                                <td class="px-4 py-2 border-b border-gray-200 dark:border-gray-700">{{ $ticket->status }}</td>
                                <td class="px-4 py-2 border-b border-gray-200 dark:border-gray-700">
                                    @if($ticket->photo_closed_url)
                                        <img src="{{ $ticket->photo_closed_url }}" alt="Photo" style="width: 100px; height: auto;">
                                    @else
                                        No photo
                                    @endif
                                </td>
                                <td class="px-4 py-2 border-b border-gray-200 dark:border-gray-700">
                                    <a href="{{ route('ticketshow', $ticket->id) }}"  class="text-green-500 dark:text-green-400 hover:underline">View Details</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

    <style>
        .table-header {
            background-color: #4299e1; /* bg-gray-300 */
            color: whitesmoke; /* text-gray-800 */
        }
        .table-header-dark {
            background-color: #4299e1; /* bg-gray-900 */
            color: #D1D5DB; /* text-gray-200 */
        }
        .table-row {
            background-color: #FFFFFF; /* bg-white */
            color: #1F2937; /* text-gray-800 */
        }
        .table-row-dark {
            background-color: #374151; /* bg-gray-700 */
            color: #D1D5DB; /* text-gray-200 */
        }
        .table-row-hover:hover {
            background-color: #E5E7EB; /* hover:bg-gray-200 */
        }
        .table-row-dark-hover:hover {
            background-color: #4B5563; /* dark:hover:bg-gray-600 */
        }
    </style>
</x-app-layout>
