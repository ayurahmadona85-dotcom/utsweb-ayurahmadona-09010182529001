@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="page-header">
        <div>
            <h1><i class="bi bi-speedometer2 text-primary me-2"></i> Dashboard</h1>
            <p class="subtitle mb-0">Ringkasan data perpustakaan</p>
        </div>
        <a href="{{ route('books.create') }}" class="btn btn-primary-modern btn-modern">
            <i class="bi bi-plus-circle"></i> Tambah Buku
        </a>
    </div>

    <div class="row g-4 mb-4">
        <div class="col-md-4">
            <div class="stat-card primary">
                <i class="bi bi-journal-bookmark-fill stat-icon"></i>
                <div class="stat-label">Total Buku</div>
                <p class="stat-value">{{ $totalBooks }}</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="stat-card success">
                <i class="bi bi-tags-fill stat-icon"></i>
                <div class="stat-label">Total Kategori</div>
                <p class="stat-value">{{ $totalCategories }}</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="stat-card warning">
                <i class="bi bi-boxes stat-icon"></i>
                <div class="stat-label">Total Stok</div>
                <p class="stat-value">{{ $totalStock }}</p>
            </div>
        </div>
    </div>

    <div class="row g-4">
        <div class="col-lg-8">
            <div class="card-modern p-4">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h5 class="mb-0 fw-bold">
                        <i class="bi bi-clock-history text-primary me-2"></i> Buku Terbaru
                    </h5>
                    <a href="{{ route('books.index') }}" class="text-decoration-none small fw-semibold">
                        Lihat Semua <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
                <hr class="mt-0">
                <div class="table-responsive">
                    <table class="table table-borderless align-middle mb-0">
                        <thead>
                            <tr class="text-muted small text-uppercase">
                                <th>Judul</th>
                                <th>Penulis</th>
                                <th class="text-center">Stok</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse(\App\Models\Book::with('category')->latest()->take(5)->get() as $book)
                                <tr>
                                    <td>
                                        <div class="fw-semibold">{{ $book->title }}</div>
                                        <small class="text-muted">{{ $book->category->name ?? '-' }}</small>
                                    </td>
                                    <td class="text-muted">{{ $book->author }}</td>
                                    <td class="text-center">
                                        <span class="badge-stock">{{ $book->stock }}</span>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="text-center text-muted py-4">
                                        Belum ada data buku.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card-modern p-4 h-100">
                <h5 class="mb-3 fw-bold">
                    <i class="bi bi-lightning-charge-fill text-warning me-2"></i> Aksi Cepat
                </h5>
                <hr class="mt-0">
                <div class="d-grid gap-2">
                    <a href="{{ route('books.create') }}" class="btn btn-primary-modern btn-modern text-start">
                        <i class="bi bi-plus-circle me-2"></i> Tambah Buku Baru
                    </a>
                    <a href="{{ route('books.index') }}" class="btn btn-soft-info btn-modern text-start">
                        <i class="bi bi-list-ul me-2"></i> Kelola Semua Buku
                    </a>
                    <a href="{{ route('books.index') }}?category_id=1" class="btn btn-soft-warning btn-modern text-start">
                        <i class="bi bi-funnel-fill me-2"></i> Filter per Kategori
                    </a>
                </div>

                <hr class="my-4">

                <h6 class="fw-bold mb-3">
                    <i class="bi bi-info-circle-fill text-info me-2"></i> Informasi
                </h6>
                <div class="small text-muted">
                    <div class="d-flex justify-content-between mb-2">
                        <span>Login sebagai</span>
                        <strong class="text-dark">{{ auth()->user()->name }}</strong>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                        <span>Tanggal</span>
                        <strong class="text-dark">{{ date('d M Y') }}</strong>
                    </div>
                    <div class="d-flex justify-content-between">
                        <span>Total Buku</span>
                        <strong class="text-dark">{{ $totalBooks }} buku</strong>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection