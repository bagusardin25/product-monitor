@extends('layouts.app')

@section('content')
<div class="sm:flex sm:items-center">
    <div class="sm:flex-auto">
        <h1 class="text-xl font-semibold text-gray-900">Daftar Produk</h1>
        <p class="mt-2 text-sm text-gray-700">Daftar semua produk di akun Anda termasuk nama, harga, dan jumlah.</p>
    </div>
    <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
        <a href="{{ route('tambah') }}" class="inline-flex items-center justify-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto">
            Tambah Produk
        </a>
    </div>
</div>

<div class="mt-8 flex flex-col">
    <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
            <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                <table class="min-w-full divide-y divide-gray-300">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">ID</th>
                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Nama</th>
                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Jumlah</th>
                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Harga</th>
                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Deskripsi</th>
                            <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                                <span class="sr-only">Aksi</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 bg-white">
                        @foreach ($products as $product)
                        <tr>
                            <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">{{ $product->id }}</td>
                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $product->name }}</td>
                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $product->qty }}</td>
                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $product->price }}</td>
                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $product->description }}</td>
                            <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6 space-x-2">
                                <a href="{{ route('show', $product->id) }}" class="text-indigo-600 hover:text-indigo-900">Lihat</a>
                                <a href="{{ route('edit', ['product' => $product]) }}" class="text-amber-600 hover:text-amber-900">Ubah</a>
                                <form method="post" action="{{ route('destroy', ['product' => $product]) }}" class="inline-block" onsubmit="return confirm('Apakah Anda yakin?')">
                                    @csrf 
                                    @method('delete') 
                                    <button type="submit" class="text-red-600 hover:text-red-900">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
