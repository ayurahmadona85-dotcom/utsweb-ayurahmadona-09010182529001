@extends('layouts.app')

@section('title', 'Tambah Buku')

@section('content')
    <div class="page-header">
        <div>
            <h1><i class="bi bi-plus-circle-fill text-primary me-2"></i> Tambah Buku</h1>
            <p class="subtitle mb-0">Masukkan data buku baru ke koleksi</p>
        </div>
        <a href="{{ route('books.index') }}" class="btn btn-soft-secondary btn-modern">
            <i class="bi bi-arrow-left"></i> Kembali
        </a>
    </div>

    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card-modern p-4">
                <form action="{{ route('books.store') }}" method="POST">
                    @csrf
                    @include('books._form', ['book' => null, 'categories' => $categories])

                    <div class="d-flex gap-2 mt-4 pt-3 border-top">
                        <button type="submit" class="btn btn-primary-modern btn-modern">
                            <i class="bi bi-check-circle-fill"></i> Simpan Buku
                        </button>
                        <a href="{{ route('books.index') }}" class="btn btn-soft-secondary btn-modern">
                            <i class="bi bi-x-circle"></i> Batal
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection