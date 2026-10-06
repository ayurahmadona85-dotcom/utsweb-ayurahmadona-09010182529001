@extends('layouts.app')

@section('title', 'Daftar Buku')

@section('content')
    <div class="page-header">
        <div>
            <h1><i class="bi bi-journal-bookmark text-primary me-2"></i> Daftar Buku</h1>
            <p class="subtitle mb-0">Kelola koleksi buku perpustakaan</p>
        </div>
        <a href="{{ route('books.create') }}" class="btn btn-primary-modern btn-modern">
            <i class="bi bi-plus-circle"></i> Tambah Buku
        </a>
    </div>

    <div class="filter-bar">
        <form method="GET" action="{{ route('books.index') }}" class="row g-2 align-items-center">
            <div class="col-md-5">
                <div class="position-relative">
                    <i class="bi bi-search position-absolute" style="left: 14px; top: 50%; transform: translateY(-50%); color: #94a3b8;"></i>
                    <input type="text" name="search" value="{{ $search }}" class="form-control ps-5"
                              placeholder="Cari berdasarkan judul buku..." aria-label="Cari berdasarkan judul buku">
                </div>
            </div>
            <div class="col-md-4">
                <select name="category_id" class="form-select">
                    <option value="">📚 Semua Kategori</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" @selected($categoryId == $category->id)>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3 d-flex gap-2">
                <button type="submit" class="btn btn-primary-modern btn-modern flex-grow-1">
                    <i class="bi bi-funnel-fill"></i> Filter
                </button>
                <a href="{{ route('books.index') }}" class="btn btn-soft-secondary btn-modern">
                    <i class="bi bi-arrow-clockwise"></i>
                </a>
            </div>
        </form>
    </div>

    <div class="table-responsive table-modern">
        <table class="table table-modern mb-0">
            <thead>
                <tr>
                    <th width="60">No</th>
                    <th>Judul</th>
                    <th>Penulis</th>
                    <th>Kategori</th>
                    <th width="80">Tahun</th>
                    <th width="90">Stok</th>
                    <th width="240" class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($books as $book)
                    <tr>
                        <td><span class="badge-category">{{ $loop->iteration + ($books->currentPage() - 1) * $books->perPage() }}</span></td>
                        <td>
                            <div class="fw-bold text-dark">{{ $book->title }}</div>
                        </td>
                        <td><i class="bi bi-person text-muted"></i> {{ $book->author }}</td>
                        <td><span class="badge-category">{{ $book->category->name ?? '-' }}</span></td>
                        <td><i class="bi bi-calendar text-muted"></i> {{ $book->year }}</td>
                        <td><span class="badge-stock">{{ $book->stock }}</span></td>
                        <td class="text-center">
                            <div class="d-flex gap-1 justify-content-center">
                                <a href="{{ route('books.show', $book) }}" class="btn btn-sm btn-soft-info btn-modern"
                                   title="Detail" aria-label="Lihat detail buku {{ $book->title }}">
                                    <i class="bi bi-eye-fill"></i>
                                </a>
                                <a href="{{ route('books.edit', $book) }}" class="btn btn-sm btn-soft-warning btn-modern"
                                   title="Edit" aria-label="Edit buku {{ $book->title }}">
                                    <i class="bi bi-pencil-fill"></i>
                                </a>
                                <form action="{{ route('books.destroy', $book) }}" method="POST" class="d-inline"
                                      onsubmit="return confirm('Yakin ingin menghapus buku ini?')">
                                    @csrf @method('DELETE')
                                                                        <button type="submit" class="btn btn-sm btn-soft-danger btn-modern"
                                                                                        title="Hapus" aria-label="Hapus buku {{ $book->title }}">
                                        <i class="bi bi-trash-fill"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center py-5">
                            <i class="bi bi-inbox fs-1 text-muted d-block mb-3"></i>
                            <p class="text-muted mb-0">Belum ada data buku.</p>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4 d-flex justify-content-center">
        {{ $books->links() }}
    </div>
@endsection