<x-ID-layout>
    <h2 class="font-semibold text-xl text-center text-blue-600 dark:text-blue-400 leading-tight">
        {{ __('Detail Tiket') }}
    </h2>
    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <table class="p-6 min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                <thead class="bg-blue-100 dark:bg-blue-700">
                    <tr>
                        <th class="px-4 py-2 border-b-2 border-gray-200 text-left">ID Ticket</th>
                        <th class="px-4 py-2 border-b-2 border-gray-200 text-left">Nama</th>
                        <th class="px-4 py-2 border-b-2 border-gray-200 text-left">Email</th>
                        <th class="px-4 py-2 border-b-2 border-gray-200 text-left">Departemen</th>
                        <th class="px-4 py-2 border-b-2 border-gray-200 text-left">Divisi</th>
                        <th class="px-4 py-2 border-b-2 border-gray-200 text-left">Kecamatan</th>
                        <th class="px-4 py-2 border-b-2 border-gray-200 text-left">Description</th>
                        <th class="px-4 py-2 border-b-2 border-gray-200 text-left">Status</th>
                        <th class="px-4 py-2 border-b-2 border-gray-200 text-left">Photo</th>
                        <th class="px-4 py-2 border-b-2 border-gray-200 text-left">Kategori</th>
                    </tr>
                </thead>
                <tbody class="bg-white dark:bg-gray-800">
                    <tr class="bg-green-50 dark:bg-green-900 even:bg-green-100 even:dark:bg-green-800">
                        <td class="px-4 py-2 border-b border-gray-200">{{ $ticket->id }}</td>
                        <td class="px-4 py-2 border-b border-gray-200">{{ $ticket->nama }}</td>
                        <td class="px-4 py-2 border-b border-gray-200">{{ $ticket->email }}</td>
                        <td class="px-4 py-2 border-b border-gray-200">{{ $ticket->departemen }}</td>
                        <td class="px-4 py-2 border-b border-gray-200">{{ $ticket->divisi }}</td>
                        <td class="px-4 py-2 border-b border-gray-200">{{ $ticket->kecamatan }}</td>
                        <td class="px-4 py-2 border-b border-gray-200">{{ $ticket->description }}</td>
                        <td class="px-4 py-2 border-b border-gray-200">{{ $ticket->status }}</td>
                        <td class="px-4 py-2 border-b border-gray-200">
                            @if($ticket->photo_url)
                                <img src="{{ $ticket->photo_url }}" alt="Photo" style="width: 100px; height: auto;">
                            @else
                                No photo
                            @endif
                        </td>
                        <td class="px-4 py-2 border-b border-gray-200">{{ $ticket->kategori }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <style>
        .bg-blue-100 {
            background-color: #ebf8ff;
        }
        .dark .bg-blue-700 {
            background-color: #2c5282;
        }
        .bg-green-50 {
            background-color: #f0fff4;
        }
        .dark .bg-green-900 {
            background-color: #22543d;
        }
        .even\:bg-green-100:nth-child(even) {
            background-color: #c6f6d5;
        }
        .dark .even\:bg-green-800:nth-child(even) {
            background-color: #2f855a;
        }
    </style>
</x--laIDyout>
