@extends('layout.master')

@section('title', 'List Buku')

@push('css_after')
    <style>
        td {
            max-width: 0;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }
    </style>
@endpush

@section('content')

    @if (session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{ session()->get('success') }}
        </div>
    @endif

    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h2>List Buku</h2>
                    </div>
                    <div class="col-sm-6">
                        <a href="{{ route('buku.create') }}" class="btn btn-success">
                            <i class="fa fa-plus fa-fw" aria-hidden="true"></i>
                            <span>Tambah Buku Baru</span>
                        </a>
                    </div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>id</th>
                        <th>Judul</th>
                        <th>Halaman</th>
                        <th>Kategori</th>
                        <th>Penerbit</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($buku as $buku)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td style="width: 15%">
                                <a href="{{ route('buku.show', $buku->id) }}">
                                    {{ $buku->id }}
                                </a>
                            </td>
                            <td>{{ $buku->judul }}</td>
                            <td>{{ $buku->halaman }}</td>
                            <td>{{ $buku->kategori }}</td>
                            <td>{{ $buku->penerbit }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td align="center" colspan="6">No data yet.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
