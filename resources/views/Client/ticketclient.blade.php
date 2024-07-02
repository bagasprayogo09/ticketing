<x-clientapp-layout>
    <h2 class="font-semibold text-xl text-center text-blue-600 dark:text-blue-400 leading-tight">
        {{ __('Status Tiket Anda') }}
    </h2>
        @if ($tickets->isEmpty())
            <p class="text-gray-600">No tickets available.</p>
        @else
            <table class="min-w-full bg-gray dark:bg-gray-800">
                <thead>
                    <tr>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left leading-4 text-gray-600 dark:text-gray-200 tracking-wider">ID Ticket</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left leading-4 text-gray-600 dark:text-gray-200 tracking-wider">Nama Klien</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left leading-4 text-gray-600 dark:text-gray-200 tracking-wider">Kecamatan/Kelurahan</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left leading-4 text-gray-600 dark:text-gray-200 tracking-wider">Department</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left leading-4 text-gray-600 dark:text-gray-200 tracking-wider">Divisi</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left leading-4 text-gray-600 dark:text-gray-200 tracking-wider">Description</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left leading-4 text-gray-600 dark:text-gray-200 tracking-wider">Catatan Perbaikan</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left leading-4 text-gray-600 dark:text-gray-200 tracking-wider">Status</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left leading-4 text-gray-600 dark:text-gray-200 tracking-wider">Date Time</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left leading-4 text-gray-600 dark:text-gray-200 tracking-wider">Photo</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left leading-4 text-gray-600 dark:text-gray-200 tracking-wider">Closed photo</th>


                </thead>
                <tbody class="bg-gray dark:bg-gray-800">
                    @foreach ($tickets as $ticket)
                        <tr>
                            <td class="px-6 py-4 border-b border-gray-300 text-gray-700 dark:text-gray-200" data-label="ID Ticket">{{ $ticket->id }}</td>
                            <td class="px-6 py-4 border-b border-gray-300 text-gray-700 dark:text-gray-200" data-label="Nama Klien">{{ $ticket->nama }}</td>
                            <td class="px-6 py-4 border-b border-gray-300 text-gray-700 dark:text-gray-200" data-label="Kecamatan/Kelurahan">{{ $ticket->kecamatan }}</td>
                            <td class="px-6 py-4 border-b border-gray-300 text-gray-700 dark:text-gray-200" data-label="Department">{{ $ticket->departemen }}</td>
                            <td class="px-6 py-4 border-b border-gray-300 text-gray-700 dark:text-gray-200" data-label="Divisi">{{ $ticket->divisi }}</td>
                            <td class="px-6 py-4 border-b border-gray-300 text-gray-700 dark:text-gray-200" data-label="Description">{{ $ticket->description }}</td>
                            <td class="px-6 py-4 border-b border-gray-300 text-gray-700 dark:text-gray-200" data-label="Catatan Perbaikan">{{ $ticket->catatan }}</td>
                            <td class="px-6 py-4 border-b border-gray-300 text-gray-700 dark:text-gray-200" data-label="Status">{{ $ticket->status }}</td>
                            <td class="px-6 py-4 border-b border-gray-300 text-gray-700 dark:text-gray-200" data-label="Tanggal dan Jam">{{ $ticket->created_at }}</td>
                            <td class="px-4 py-2 border-b border-gray-200 dark:border-gray-700">
                                                                 @if($ticket->photo_
                                                                 url)
                                                                        <img src="{{ $ticket->photo_url}}" alt="Ticket Photo" style="width: 100px; height: auto;">
                                                                    @else
                                                                        No photo
                                                                    @endif
                                                                </td>
                            <td class="px-4 py-2 border-b border-gray-200 dark:border-gray-700">
                                   @if($ticket->photo_closed_url)
                                        <img src="{{ $ticket->photo_closed_url}}" alt="Closed Photo" style="width: 100px; height: auto;">
                                    @else
                                        No photo
                                    @endif
                                </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</x-clientapp-layout>

<style>
    /* General styling */
    body {
        background-color: #f0f4f8;
        color: #333;
        font-family: 'Arial', sans-serif;
    }

    /* Table styling */
    table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 1rem;
        background-color: #fff;
        box-shadow: 0 2px 3px rgba(0,0,0,0.1);
    }

    thead {
        background-color: #007bff;
        color: #fff;
    }

    thead th {
        padding: 1rem;
        text-transform: uppercase;
        font-weight: bold;
    }

    tbody tr {
        border-bottom: 1px solid #e0e0e0;
        transition: background-color 0.2s;
    }

    tbody tr:hover {
        background-color: #f1f1f1;
    }

    tbody td {
        padding: 1rem;
        color: #333;
    }

    @media (max-width: 768px) {
        thead {
            display: none;
        }
        tbody tr {
            display: block;
            margin-bottom: 0.625rem;
        }
        tbody td {
            display: block;
            text-align: right;
            border-bottom: 1px solid #e0e0e0;
            position: relative;
            padding-left: 50%;
        }
        tbody td::before {
            content: attr(data-label);
            position: absolute;
            left: 0;
            width: 50%;
            padding-left: 1rem;
            font-weight: bold;
            text-align: left;
            color: #007bff;
        }
    }
</style>
