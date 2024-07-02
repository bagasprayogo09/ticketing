<x-ID-layout>
    <div align="center" class="container mx-auto px-4 py-8">
        <h2 class="font-semibold text-xl text-center text-blue-600 dark:text-blue-400 leading-tight">
            {{ __('Open Ticket') }}
        </h2>

        @if (session('Open Ticket'))
            <div class="mb-4 text-green-500">
                {{ session('Open TIcket') }}
            </div>
        @endif
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700 bg-gray-100 dark:bg-gray-800 text-gray-800 dark:text-gray-200">
                <thead class="table-header dark:table-header-dark">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 dark:text-gray-300 uppercase tracking-wider">ID Ticket</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 dark:text-gray-300 uppercase tracking-wider">Nama</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 dark:text-gray-300 uppercase tracking-wider">Email</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 dark:text-gray-300 uppercase tracking-wider">Departemen</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 dark:text-gray-300 uppercase tracking-wider">Divisi</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 dark:text-gray-300 uppercase tracking-wider">Kategori</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 dark:text-gray-300 uppercase tracking-wider">Kecamatan Kelurahan</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 dark:text-gray-300 uppercase tracking-wider">Description</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 dark:text-gray-300 uppercase tracking-wider">Status</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 dark:text-gray-300 uppercase tracking-wider">Photo</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 dark:text-gray-300 uppercase tracking-wider">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                            @foreach ($tickets as $ticket)
                            <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                                <td class="px-6 py-4 whitespace-no-wrap">{{ $ticket->id}}</td>
                                <td class="px-6 py-4 whitespace-no-wrap">{{ $ticket->nama }}</td>
                                <td class="px-6 py-4 whitespace-no-wrap">{{ $ticket->email }}</td>
                                <td class="px-6 py-4 whitespace-no-wrap">{{ $ticket->departemen }}</td>
                                <td class="px-6 py-4 whitespace-no-wrap">{{ $ticket->divisi }}</td>
                                <td class="px-6 py-4 whitespace-no-wrap">{{ $ticket->kategori }}</td>
                                <td class="px-6 py-4 whitespace-no-wrap">{{ $ticket->kecamatan }}</td>
                                <td class="px-6 py-4 whitespace-no-wrap">{{ $ticket->description }}</td>
                                <td class="px-6 py-4 whitespace-no-wrap">{{ $ticket->status }}</td>
                                <td class="px-6 py-4 whitespace-no-wrap">
                                    @if($ticket->photo_url)
                                        <img src="{{ $ticket->photo_url }}" alt="Ticket Photo" width="50" height="50">
                                    @else
                                        No Photo
                                    @endif
                                </td>
                                <td class="px-6 py-4 text-gray-700 dark:text-gray-200">
                                    <a href="{{ route('ID.ticket_show', $ticket->id) }}" class="text-red-600 dark:text-red-400 hover:underline">View Details</a>
                                    <form action="{{ route('ID.ticket_proses.proses', $ticket->id) }}" method="POST" class="inline-block">
                                        @csrf
                                        <button type="submit" class="text-green-600 dark:text-green-400 hover:underline ml-4">Proses</button>
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
</x-ID-layout>