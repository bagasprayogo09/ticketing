<x-app-layout>
    <div class="container mx-auto px-4 py-8 bg-cyan-100 rounded-lg shadow-lg">
        <h2 class="font-semibold text-xl text-center text-blue-600 dark:text-blue-400 leading-tight">
            {{ __('Tambahkan Data Pengguna Anda !') }}
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
        <form id="myForm" action="{{ route('datapengguna.store') }}" method="POST">
            @csrf
            <div class="mb-2 ">
                <label for="name" class="block text-gray-700 font-medium mb-2">Name</label>
                <input type="text" id="name" name="name" class="text-black w-full px-4 py-2 border border-cyan-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500" value="{{ old('name') }}" required>
            </div>

            <div class="mb-2">
                <label for="email" class="block text-gray-700 font-medium mb-2">Email</label>
                <input type="email" id="email" name="email" class="text-black w-full px-4 py-2 border border-cyan-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500" value="{{ old('email') }}" required>
            </div>

            <div class="mb-2">
                <label for="password" class="block text-gray-700 font-medium mb-2">Password</label>
                <input type="password" id="password" name="password" class="text-black w-full px-4 py-2 border border-cyan-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500" required>
            </div>

            <div class="mb-2">
                <label for="usertype" class="block text-gray-700 font-medium mb-2">User Type</label>
                <select id="usertype" name="usertype" class="text-black w-full px-4 py-2 border border-cyan-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500" required>
                    <option value="" disabled selected>Select user type</option>
                    <option value="admin">Admin</option>
                    <option value="petugas">Petugas</option>
                    <option value="koordinator">Koordinator</option>
                </select>
            </div>
            <div class="mb-2">
                <label for="division_id" class="block text-gray-700 font-medium mb-2">Divisi</label>
                <select id="division_id" name="division_id" class="text-black w-full px-4 py-2 border border-cyan-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500" required>
                    <option value="" disabled selected>Select Divisi</option>
                    <option value="1">Aplikasi & Statistik</option>
                    <option value="2">Infrastruktur Digital</option>
                    <option value="3">Komunikasi Informasi Publik</option>
                </select>
            </div>

            <div class="mt-4 flex justify-center">
                <button type="submit" id="submitButton" class="btn-custom">
                    {{ __('Tambahkan') }}
                </button>
            </div>
        </form>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const button = document.getElementById("submitButton");

            button.addEventListener("click", function() {
                button.style.backgroundColor = "cyan"; // Ubah warna latar belakang tombol menjadi merah saat diklik
            });
        });
    </script>

    <style>
        .bg-custom {
            background: linear-gradient(135deg, #6EE7B7 0%, #3B82F6 100%);
            max-width: 40%;
            max-height: 60%; /* Atur maksimal tinggi */
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
