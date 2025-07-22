@extends('layouts.dashboard')

@section('title', 'Daftar SPPD')
@section('header', 'Daftar SPPD')
@section('subtitle', 'Data seluruh perjalanan dinas')

@section('main-content')
<div class="bg-white shadow rounded-lg p-6">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-xl font-semibold text-gray-800">Daftar SPPD</h2>
        <a href="{{ route('sppd.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg">
            <i class="fas fa-plus mr-2"></i>Tambah SPPD
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No. SPPD</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Pegawai</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tujuan</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach($sppds as $sppd)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $sppd->nomor_sppd }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $sppd->user->name }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $sppd->tujuan }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        {{ $sppd->tanggal_berangkat->format('d M Y') }} - 
                        {{ $sppd->tanggal_kembali->format('d M Y') }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-left">
                        {{-- Dropdown ubah status --}}
                        <form action="{{ route('sppd.updateStatus', $sppd->id) }}" method="POST" class="inline">
                            @csrf
                            @method('PATCH')
                            <select name="status" onchange="this.form.submit()"
                                class="text-sm border-gray-300 rounded px-2 py-1
                                    @if ($sppd->status === 'pending') bg-yellow-100 text-yellow-800
                                    @elseif ($sppd->status === 'approved') bg-green-100 text-green-800
                                    @elseif ($sppd->status === 'rejected') bg-red-100 text-red-800
                                    @endif">
                                <option value="pending" {{ $sppd->status === 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="approved" {{ $sppd->status === 'approved' ? 'selected' : '' }}>Approved</option>
                                <option value="rejected" {{ $sppd->status === 'rejected' ? 'selected' : '' }}>Rejected</option>
                            </select>
                        </form>
                    </td>

                    <td class="px-6 py-4 whitespace-nowrap text-left text-sm font-medium">
                        <a href="{{ route('sppd.show' , $sppd->id)}}" class="text-green-600 hover:text-green-900 mr-3">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="{{ route('sppd.edit', $sppd->id) }}" class="text-blue-600 hover:text-blue-900 mr-3">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('sppd.destroy', $sppd->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('Apakah Anda yakin ingin menghapus?')">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $sppds->links() }}
    </div>
</div>
@endsection