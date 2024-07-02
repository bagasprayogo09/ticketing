<x-app-layout>
    <div class="container mx-auto px-4 py-8">
        <h2 class="font-semibold text-xl text-center text-blue-600 dark:text-blue-400 leading-tight">
            {{ __('Data Klien') }}
        </h2>
        <div class="table-container mx-auto overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-800 bg-gray-100 dark:bg-gray-800 text-gray-800 dark:text-gray-200">
                <thead class="table-header dark:table-header-dark">
                    <tr>
                        <th class="text-white px-6 py-2 border-b-2 border-gray-200 dark:border-gray-700 text-left">
                            ID User
                        </th>
                        <th class="text-white px-6 py-2 border-b-2 border-gray-200 dark:border-gray-700 text-left">
                            Nama
                        </th>
                        <th class="text-white px-6 py-2 border-b-2 border-gray-200 dark:border-gray-700 text-left">
                            Email
                        </th>
                        <th class="text-white px-6 py-2 border-b-2 border-gray-200 dark:border-gray-700 text-left">
                            Usertype
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-gray-50 dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                    @foreach ($allUsers as $user)
                        <tr class="table-row dark:table-row-dark table-row-hover dark:table-row-dark-hover">
                            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900 dark:text-gray-300">
                                {{ $user->id }}
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900 dark:text-gray-300">
                                {{ $user->name }}
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900 dark:text-gray-300">
                                {{ $user->email }}
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900 dark:text-gray-300">
                                {{ $user->usertype }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <style>
        .table-container {
            margin: 0 auto; /* Center the table */
            max-width: 1000px; /* Adjust this value as needed */
        }
        .table-header {
            background-color: rgb(221, 41, 41);
        }
        .table-header-dark {
            background-color: rgb(221, 41, 41);
        }
        .table-row {
            background-color: rgb(7, 7, 7);
        }
    </style>
</x-app-layout>
