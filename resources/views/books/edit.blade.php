@extends('layouts.app')

@section('title', 'Edit Buku')

@section('content')
    <div class="page-header">
        <div>
            <h1><i class="bi bi-pencil-square text-warning me-2"></i> Edit Buku</h1>
            <p class="subtitle mb-0">Perbarui informasi buku</p>
        </div>
        <a href="{{ route('books.index') }}" class="btn btn-soft-secondary btn-modern">
            <i class="bi bi-arrow-left"></i> Kembali
        </a>
    </div>

    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card-modern p-4">
                <form action="{{ route('books.update', $book) }}" method="POST">
                    @csrf
                    @method('PUT')
                    @include('books._form', ['book' => $book, 'categories' => $categories])

                    <div class="d-flex gap-2 mt-4 pt-3 border-top">
                        <button type="submit" class="btn btn-primary-modern btn-modern">
                            <i class="bi bi-check-circle-fill"></i> Update Buku
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