<x-guest-layout>
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <form class="row g-3 custom-form bg-light-red p-4 rounded shadow" method="POST" action="{{ route('tickets') }}" enctype="multipart/form-data">
        <header class="custom-font-color text-center mb-4">SILAHKAN ISI DETAIL TICKET ANDA!</header>
        @csrf

        <div class="col-md-6">
            <x-input-label for="kecamatan" class="custom-font-color">Kecamatan Kelurahan Anda</x-input-label>
            <x-text-input id="kecamatan" class="form-control" name="kecamatan" rows="100" required>{{ old("kecamatan") }}</x-text-input>
            <x-input-error :messages="$errors->get("kecamatan")" class="mt-2"/>
        </div>

        <div class="col-md-6">
            <x-input-label for="departemen" class="custom-font-color">Department Anda</x-input-label>
            <x-text-input id="departemen" class="form-control" name="departemen" rows="100" required>{{ old('departemen') }}</x-text-input>
            <x-input-error :messages="$errors->get('departemen')" class="mt-2"/>
        </div>

        <div class="col-md-16">
            <x-input-label for="nama" class="custom-font-color">Nama Lengkap Anda</x-input-label>
            <x-text-input id="nama" class="form-control" name="nama" required>{{ old('nama') }}</x-text-input>
            <x-input-error :messages="$errors->get('nama')" class="mt-2"/>
        </div>

        <div class="col-md-16">
            <x-input-label for="email" class="custom-font-color">Alamat Email Anda</x-input-label>
            <x-text-input id="email" class="form-control" name="email" required>{{ old('email') }}</x-text-input>
            <x-input-error :messages="$errors->get('email')" class="mt-2"/>
        </div>

        <div class="col-md-6">
            <x-input-label for="divisi" class="custom-font-color">Divisi yang Dibutuhkan</x-input-label>
            <select id="divisi" class="form-control" name="divisi" required>
                <option value="" disabled selected>Pilih Divisi</option>
                <option value="Aplikasi & Statistik">Aplikasi & Statistik</option>
                <option value="Infrastruktur Digital">Infrastruktur Digital</option>
                <option value="Komunikasi Informasi Publik">Komunikasi Informasi Publik</option>

            </select>
            <x-input-error :messages="$errors->get('divisi')" class="mt-2"/>
        </div>

        <div class="col-md-6">
            <x-input-label for="kategori" class="custom-font-color">Kategori yang Dibutuhkan</x-input-label>
            <select id="kategori" class="form-control" name="kategori" required>
                <option value="" disabled selected>Pilih Kategori</option>
                <option value="Antivirus">Antivirus</option>
                <option value="Zoom">Zoom</option>
                <option value="Software">Software</option>
                <option value="Hardware">Hardware</option>
                <option value="Network">Internet Network</option>
                <option value="Publikasi">Publikasi</option>
                <option value="Dokumentasi">Dokumentasi</option>

            </select>
            <x-input-error :messages="$errors->get('kategori')" class="mt-2"/>
        </div>

        <div class="col-md-12">
            <x-input-label for="description" class="custom-font-color">Deskripsi Masalah</x-input-label>
            <x-text-area id="description" class="form-control" name="description" placeholder="Enter your problem description here" rows="5" required>{{ old('description') }}</x-text-area>
            <x-input-error :messages="$errors->get('description')" class="mt-2"/>
        </div>

        <div class="col-md-6">
            <x-input-label for="photo" class="custom-font-color"></x-input-label>
            <input type="file" id="photo" class="form-control" name="photo" accept="image/jpeg,image/png,image/jpg" required>
            <x-input-error :messages="$errors->get('photo')" class="mt-2"/>
        </div>

        <div class="col-12 d-flex justify-content-left">
            <x-primary-button class="btn custom-button-color">
                {{ __('Kirim Ticket') }}
            </x-primary-button>
            <button type="reset" class="btn btn-secondary ml-3">Reset</button>
        </div>
    </form>
</x-guest-layout>

<!-- Footer -->
<footer class="mt-10 p-10 bg-blue-900 text-white text-center">
    <p>&copy; 2024 | Kantor Walikota Administrasi Jakarta Utara</p>
</footer>

<style>
    .custom-form {
        background-color: #f0f8ff; /* Warna latar belakang form */
    }

    .custom-font-color {
        color: #333; /* Warna teks custom */
    }

    .custom-button-color {
        background-color: #4caf50; /* Warna latar belakang tombol */
        color: white; /* Warna teks tombol */
    }

    .bg-blue-900 {
        background-color: #1e3a8a; /* Tailwind CSS kelas warna biru gelap */
    }
</style>

