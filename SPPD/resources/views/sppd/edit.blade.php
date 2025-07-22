@extends('layouts.dashboard')

@section('title', 'Edit SPPD')
@section('header', 'Edit SPPD: ' . $sppd->nomor_sppd)

@section('main-content')
<form action="{{ route('sppd.update', $sppd->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div class="col-span-1">
            <div class="form-group">
                <label for="nomor_sppd" class="block text-sm font-medium text-gray-700">Nomor SPPD</label>
                <input type="text" name="nomor_sppd" id="nomor_sppd" required
                       class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                       value="{{ old('nomor_sppd', $sppd->nomor_sppd) }}">
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
                        <option value="{{ $user->id }}" {{ old('user_id', $sppd->user_id) == $user->id ? 'selected' : '' }}>
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
                       value="{{ old('tujuan', $sppd->tujuan) }}">
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
                       value="{{ old('tanggal_berangkat', $sppd->tanggal_berangkat->format('Y-m-d')) }}">
                @error('tanggal_berangkat')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group mt-4">
                <label for="tanggal_kembali" class="block text-sm font-medium text-gray-700">Tanggal Kembali</label>
                <input type="date" name="tanggal_kembali" id="tanggal_kembali" required
                       class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                       value="{{ old('tanggal_kembali', $sppd->tanggal_kembali->format('Y-m-d')) }}">
                @error('tanggal_kembali')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group mt-4">
                <label for="kendaraan" class="block text-sm font-medium text-gray-700">Kendaraan</label>
                <select name="kendaraan" id="kendaraan" required
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                    <option value="">Pilih Kendaraan</option>
                    <option value="kendaraan_dinas" {{ old('kendaraan', $sppd->kendaraan) == 'kendaraan_dinas' ? 'selected' : '' }}>Kendaraan Dinas</option>
                    <option value="kendaraan_pribadi" {{ old('kendaraan', $sppd->kendaraan) == 'kendaraan_pribadi' ? 'selected' : '' }}>Kendaraan Pribadi</option>
                    <option value="pesawat" {{ old('kendaraan', $sppd->kendaraan) == 'pesawat' ? 'selected' : '' }}>Pesawat</option>
                    <option value="kereta_api" {{ old('kendaraan', $sppd->kendaraan) == 'kereta_api' ? 'selected' : '' }}>Kereta Api</option>
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
                          class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500">{{ old('keterangan', $sppd->keterangan) }}</textarea>
                @error('keterangan')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            @can('approve-sppd')
            <div class="form-group mt-4">
                <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                <select name="status" id="status" required
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                    <option value="draft" {{ old('status', $sppd->status) == 'draft' ? 'selected' : '' }}>Draft</option>
                    <option value="approved" {{ old('status', $sppd->status) == 'approved' ? 'selected' : '' }}>Approved</option>
                    <option value="rejected" {{ old('status', $sppd->status) == 'rejected' ? 'selected' : '' }}>Rejected</option>
                </select>
                @error('status')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            @endcan
        </div>
    </div>

    <div class="mt-6 flex justify-end">
        <a href="{{ route('sppd.index') }}" class="btn btn-secondary mr-3">
            <i class="fas fa-times mr-2"></i> Batal
        </a>
        <button type="submit" class="btn btn-primary">
            <i class="fas fa-save mr-2"></i> Update SPPD
        </button>
    </div>
</form>
@endsection