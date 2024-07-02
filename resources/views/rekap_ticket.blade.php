<x-app-layout>
    <div class="container mx-auto px-4 py-8">
        <h2 class="font-semibold text-xl text-center text-blue-600 dark:text-blue-400 leading-tight">
            {{ __('Rekap Tiket') }}
        </h2>

        <form method="GET" action="{{ route('rekap_ticket') }}" class="mb-6">
            <div class="flex items-center">
                <div class="mr-4">
                    <label for="start_date" class="block text-sm font-medium text-gray-700">Start Date</label>
                    <input type="date" id="start_date" name="start_date" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm bg-blue-100 text-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                </div>
                <div class="px-2 mr-4">
                    <label for="end_date" class="block text-sm font-medium text-gray-700">End Date</label>
                    <input type="date" id="end_date" name="end_date" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm bg-blue-100 text-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                </div>
                <div class="mt-6">
                    <button type="submit" class="btn custom-button-color bg-gradient-to-r from-blue-500 to-blue-700 hover:from-blue-700 hover:to-blue-900 text-black font-bold py-2 px-4 rounded-full shadow-lg transition duration-300 transform hover:scale-105 active:bg-blue-900">
                        Filter
                    </button>
                </div>
            </div>
        </form>

        <a href="{{ route('tickets.export', ['start_date' => request('start_date'), 'end_date' => request('end_date')]) }}" class="btn custom-button-color bg-gradient-to-r from-blue-500 to-blue-700 hover:from-blue-700 hover:to-blue-900 text-black font-bold py-4 px-6 rounded-full shadow-lg transition duration-300 transform hover:scale-105 mb-6">
            Export to Excel
        </a>
    </div>
<style>
        .custom-form {
            background-color: #f0f8ff; /* Warna latar belakang form */
        }

        .custom-font-color {
            color: #333; /* Warna teks custom */
        }

        .custom-button-color {
            background-color: blue; /* Warna latar belakang tombol */
            color: white; /* Warna teks tombol */
        }
</style>
</x-app-layout>
