<x-app-layout>
    <div class="container mx-auto px-4 py-8">
        <h2 class="font-semibold text-xl text-center text-blue-600 dark:text-blue-400 leading-tight">
            {{ __('Tambahkan Data Kecamatan dan Kelurahan Anda !') }}
        </h2>
        @if ($errors->any())
        <div class="mb-4">
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Oops! Ada kesalahan:</strong>
                <span class="block sm:inline">
                    <ul class="mt-2 ml-4 list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </span>
            </div>
        </div>
    @endif

        <div class="max-w-lg mx-auto bg-custom text-white p-6 rounded-lg shadow-lg mt-8">
            <form id="myForm" action="{{ route('kecamatan.store') }}" method="POST">
                @csrf
                <div class="form-group mb-4">
                    <label for="nama_kecamatan" class="block text-black font-bold mb-2">Nama Kecamatan dan Kelurahan</label>
                    <input type="text" name="nama_kecamatan" class="text-black form-control w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>
                </div>
                <div class="mt-4 flex justify-center  w-full max-w-sm bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-lg">
                    <button type="submit" id="submitButton" class="btn-custom">
                        Tambahkan
                    </button>
                </div>
            </form>
        </div>
    </div>

    <style>
        .bg-custom {
            background: linear-gradient(135deg, #6EE7B7 0%, #3B82F6 100%);
            max-width: 40%;
            max-height: 80%; /* Atur maksimal tinggi */
        }
        .btn-custom {
            background: linear-gradient(to right, #56ab2f, rgb(112, 148, 68)); /* Warna gradasi hijau */
            color: white; /* Warna teks putih */
            padding: 10px 20px;
            border: none;
            border-radius: 25px; /* Membuat tombol berbentuk oval */
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.3s ease, transform 0.3s ease;
        }
        .btn-custom:hover {
            background: linear-gradient(to right, rgb(112, 148, 68), #56ab2f); /* Gradasi hijau terbalik untuk efek hover */
            transform: scale(1.05); /* Efek pembesaran sedikit saat hover */
        }

        .btn-custom:active {
            transform: scale(0.95); /* Efek pengecilan saat tombol ditekan */
        }
    </style>
</x-app-layout>
