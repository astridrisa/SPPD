@extends('layouts.dashboard')

@section('title', 'Buat SPPD Baru')
@section('header', 'Buat SPPD')

@section('actions')
<div class="flex space-x-3">
    <a href="{{ route('sppd.index') }}" 
       class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-3 rounded-xl font-semibold shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-200 flex items-center">
        <i class="fas fa-arrow-left mr-2"></i>
        Kembali
    </a>
</div>
@endsection

@section('main-content')
<form action="{{ route('sppd.store') }}" method="POST">
    @csrf
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div class="col-span-1">
            <div class="form-group">
                <label for="nomor_sppd" class="block text-sm font-medium text-gray-700">Nomor SPPD</label>
                <input type="text" name="nomor_sppd" id="nomor_sppd" required
                       class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                       value="{{ old('nomor_sppd') }}">
                @error('nomor_sppd')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group mt-4">
                <label for="user_id" class="block text-sm font-medium text-gray-700">Pegawai</label>
                <select name="user_id" id="user_id" required
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                    <option value="">Pilih Pegawai</option>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>
                            {{ $user->name }} ({{ $user->nip }})
                        </option>
                    @endforeach
                </select>
                @error('user_id')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group mt-4">
                <label for="tujuan" class="block text-sm font-medium text-gray-700">Tujuan Perjalanan</label>
                <input type="text" name="tujuan" id="tujuan" required
                       class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                       value="{{ old('tujuan') }}">
                @error('tujuan')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="col-span-1">
            <div class="form-group">
                <label for="tanggal_berangkat" class="block text-sm font-medium text-gray-700">Tanggal Berangkat</label>
                <input type="date" name="tanggal_berangkat" id="tanggal_berangkat" required
                       class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                       value="{{ old('tanggal_berangkat') }}">
                @error('tanggal_berangkat')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group mt-4">
                <label for="tanggal_kembali" class="block text-sm font-medium text-gray-700">Tanggal Kembali</label>
                <input type="date" name="tanggal_kembali" id="tanggal_kembali" required
                       class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                       value="{{ old('tanggal_kembali') }}">
                @error('tanggal_kembali')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group mt-4">
                <label for="kendaraan" class="block text-sm font-medium text-gray-700">Kendaraan</label>
                <select name="kendaraan" id="kendaraan" required
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                    <option value="">Pilih Kendaraan</option>
                    <option value="kendaraan_dinas" {{ old('kendaraan') == 'kendaraan_dinas' ? 'selected' : '' }}>Kendaraan Dinas</option>
                    <option value="kendaraan_pribadi" {{ old('kendaraan') == 'kendaraan_pribadi' ? 'selected' : '' }}>Kendaraan Pribadi</option>
                    <option value="pesawat" {{ old('kendaraan') == 'pesawat' ? 'selected' : '' }}>Pesawat</option>
                    <option value="kereta_api" {{ old('kendaraan') == 'kereta_api' ? 'selected' : '' }}>Kereta Api</option>
                </select>
                @error('kendaraan')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="col-span-1 md:col-span-2">
            <div class="form-group">
                <label for="keterangan" class="block text-sm font-medium text-gray-700">Keterangan</label>
                <textarea name="keterangan" id="keterangan" rows="3"
                          class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500">{{ old('keterangan') }}</textarea>
                @error('keterangan')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>
    </div>

    <div class="flex justify-end space-x-4 pt-6 border-t border-gray-200">
        <a href="{{ route('sppd.index') }}" 
           class="px-6 py-3 border border-gray-300 rounded-lg text-gray-700 font-medium hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors duration-200">
            Batal
        </a>
        <button type="submit" 
                class="px-6 py-3 bg-gradient-to-r from-blue-600 to-blue-700 text-white font-medium rounded-lg hover:from-blue-700 hover:to-blue-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transform hover:scale-105 transition-all duration-200 shadow-lg hover:shadow-xl">
            <i class="fas fa-save mr-2"></i>
            Simpan Data
        </button>
    </div>
</form>
@endsection