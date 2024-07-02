    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Ticket Open') }}
            </h2>
        </x-slot>
        <div class="container mx-auto px-4">
            <h1 class="text-2xl font-bold mb-4">Tickets</h1>

            @if ($tickets->isEmpty())
                <p class="text-gray-600">No tickets available.</p>
            @else
                <table class="min-w-full bg-white dark:bg-gray-800">
                    <thead>
                        <tr>
                            <th class="px-6 py-3 border-b-2 border-gray-300 text-left leading-4 text-gray-600 dark:text-gray-200 tracking-wider">No Ticket</th>
                            <th class="px-6 py-3 border-b-2 border-gray-300 text-left leading-4 text-gray-600 dark:text-gray-200 tracking-wider">Nama Klien</th>
                            <th class="px-6 py-3 border-b-2 border-gray-300 text-left leading-4 text-gray-600 dark:text-gray-200 tracking-wider">Kecamatan/Kelurahan</th>
                            <th class="px-6 py-3 border-b-2 border-gray-300 text-left leading-4 text-gray-600 dark:text-gray-200 tracking-wider">Department</th>
                            <th class="px-6 py-3 border-b-2 border-gray-300 text-left leading-4 text-gray-600 dark:text-gray-200 tracking-wider">Divisi</th>
                            <th class="px-6 py-3 border-b-2 border-gray-300 text-left leading-4 text-gray-600 dark:text-gray-200 tracking-wider">Description</th>
                            <th class="px-6 py-3 border-b-2 border-gray-300 text-left leading-4 text-gray-600 dark:text-gray-200 tracking-wider">Status</th>
                            <th class="px-6 py-3 border-b-2 border-gray-300 text-left leading-4 text-gray-600 dark:text-gray-200 tracking-wider">Tanggal dan Jam</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white dark:bg-gray-800">
                        @foreach ($tickets as $ticket)
                            <td class="px-6 py-4 border-b border-gray-300 text-gray-700 dark:text-gray-200">{{ $ticket->id }}</td>
                            <td class="px-6 py-4 border-b border-gray-300 text-gray-700 dark:text-gray-200">{{ $ticket->nama }}</td>
                            <td class="px-6 py-4 border-b border-gray-300 text-gray-700 dark:text-gray-200">{{ $ticket->kecamatan }}</td>
                            <td class="px-6 py-4 border-b border-gray-300 text-gray-700 dark:text-gray-200">{{ $ticket->departemen }}</td>
                            <td class="px-6 py-4 border-b border-gray-300 text-gray-700 dark:text-gray-200">{{ $ticket->divisi }}</td>
                            <td class="px-6 py-4 border-b border-gray-300 text-gray-700 dark:text-gray-200">{{ $ticket->description }}</td>
                            <td class="px-6 py-4 border-b border-gray-300 text-gray-700 dark:text-gray-200">{{ $ticket->status }}</td>
                            <td class="px-6 py-4 border-b border-gray-300 text-gray-700 dark:text-gray-200">{{ $ticket->created_at }}</td>
                                <td class="px-6 py-4 border-b border-gray-300 text-gray-700 dark:text-gray-200">
                                    <a href="{{ route('ticketsshow', $ticket->id) }}" class="text-blue-600 dark:text-blue-400 hover:underline">View Details</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </x-app-layout>
