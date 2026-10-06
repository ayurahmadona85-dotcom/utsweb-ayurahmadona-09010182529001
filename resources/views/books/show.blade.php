@extends('layouts.app')

@section('title', 'Detail Buku')

@section('content')
    <div class="page-header">
        <div>
            <h1><i class="bi bi-eye-fill text-info me-2"></i> Detail Buku</h1>
            <p class="subtitle mb-0">Informasi lengkap buku</p>
        </div>
        <a href="{{ route('books.index') }}" class="btn btn-soft-secondary btn-modern">
            <i class="bi bi-arrow-left"></i> Kembali
        </a>
    </div>

    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card-modern">
                <div style="background: linear-gradient(135deg, #6366f1, #8b5cf6); padding: 32px; color: #fff;">
                    <div class="d-flex align-items-center">
                        <div style="width: 70px; height: 70px; background: rgba(255,255,255,0.2);
                                    border-radius: 18px; display: flex; align-items: center; justify-content: center;">
                            <i class="bi bi-book-half fs-2"></i>
                        </div>
                        <div class="ms-3">
                            <h3 class="mb-1 fw-bold">{{ $book->title }}</h3>
                            <span class="badge-category" style="background: rgba(255,255,255,0.25); color: #fff;">
                                {{ $book->category->name ?? '-' }}
                            </span>
                        </div>
                    </div>
                </div>

                <div class="p-4">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="p-3" style="background: #f8fafc; border-radius: 12px;">
                                <small class="text-muted d-block mb-1"><i class="bi bi-person-fill"></i> Penulis</small>
                                <div class="fw-bold">{{ $book->author }}</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="p-3" style="background: #f8fafc; border-radius: 12px;">
                                <small class="text-muted d-block mb-1"><i class="bi bi-building"></i> Penerbit</small>
                                <div class="fw-bold">{{ $book->publisher }}</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="p-3" style="background: #f8fafc; border-radius: 12px;">
                                <small class="text-muted d-block mb-1"><i class="bi bi-calendar-event"></i> Tahun Terbit</small>
                                <div class="fw-bold">{{ $book->year }}</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="p-3" style="background: #f8fafc; border-radius: 12px;">
                                <small class="text-muted d-block mb-1"><i class="bi bi-boxes"></i> Stok Tersedia</small>
                                <div class="fw-bold text-success">{{ $book->stock }} buku</div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="p-3" style="background: #f8fafc; border-radius: 12px;">
                                <small class="text-muted d-block mb-1"><i class="bi bi-info-circle"></i> Deskripsi Kategori</small>
                                <div>{{ $book->category->description ?? 'Tidak ada deskripsi.' }}</div>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex gap-2 mt-4 pt-3 border-top">
                        <a href="{{ route('books.edit', $book) }}" class="btn btn-primary-modern btn-modern">
                            <i class="bi bi-pencil-fill"></i> Edit Buku
                        </a>
                        <a href="{{ route('books.index') }}" class="btn btn-soft-secondary btn-modern">
                            <i class="bi bi-arrow-left"></i> Kembali
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection