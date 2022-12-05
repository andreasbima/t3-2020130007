@extends('layout.master')

@section('judul', $buku->judul)

@section('content')
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-8">
                <h2>{{ $buku->judul }}</h2>
            </div>
            <div class="col-md-4">
                <div class="float-right">
                    <div class="btn-group" role="group">
                        <a href="{{ route('buku.edit', $buku->id) }}" class="btn btn-primary ml-3">Edit</a>

                        <form action="{{ route('buku.destroy', $buku->id) }}" method="POST">
                            <button type="submit" class="btn btn-danger ml-3">Delete</button>
                            @method('DELETE')
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <h5>
            <span class="badge badge-primary">
                <i class="fa fa-star fa-fw"></i>
                {{ $buku->kategori }}
            </span>
        </h5>
        <p>

        <ul class="list-inline">
            <li class="list-inline-item">
                <i class="fa fa-th-large fa-fw"></i>
                <em>{{ $buku->penerbit }}</em>
            </li>
            <li class="list-inline-item">
                <i class="fa fa-calendar fa-fw"></i>
                {{ $buku->halaman }}
            </li>
        </ul>
        </p>
        <hr>
        <p class="lead">Buku dengan id {{ $buku->id }}</p>
    </div>
@endsection
