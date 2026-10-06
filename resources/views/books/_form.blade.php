<div class="row">
    <div class="col-md-6 mb-3">
        <label class="form-label"><i class="bi bi-book text-primary"></i> Judul Buku</label>
        <input type="text" name="title" value="{{ old('title', $book->title ?? '') }}"
               class="form-control @error('title') is-invalid @enderror" placeholder="Contoh: Laskar Pelangi">
        @error('title') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-6 mb-3">
        <label class="form-label"><i class="bi bi-person text-primary"></i> Penulis</label>
        <input type="text" name="author" value="{{ old('author', $book->author ?? '') }}"
               class="form-control @error('author') is-invalid @enderror" placeholder="Contoh: Andrea Hirata">
        @error('author') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
</div>

<div class="mb-3">
    <label class="form-label"><i class="bi bi-building text-primary"></i> Penerbit</label>
    <input type="text" name="publisher" value="{{ old('publisher', $book->publisher ?? '') }}"
           class="form-control @error('publisher') is-invalid @enderror" placeholder="Contoh: Bentang Pustaka">
    @error('publisher') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

<div class="row">
    <div class="col-md-6 mb-3">
        <label class="form-label"><i class="bi bi-calendar-event text-primary"></i> Tahun Terbit</label>
        <input type="number" name="year" value="{{ old('year', $book->year ?? date('Y')) }}"
               class="form-control @error('year') is-invalid @enderror" placeholder="2024">
        @error('year') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-6 mb-3">
        <label class="form-label"><i class="bi bi-boxes text-primary"></i> Stok</label>
        <input type="number" name="stock" value="{{ old('stock', $book->stock ?? 0) }}"
               class="form-control @error('stock') is-invalid @enderror" placeholder="0">
        @error('stock') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
</div>

<div class="mb-3">
    <label class="form-label"><i class="bi bi-tags text-primary"></i> Kategori</label>
    <select name="category_id" class="form-select @error('category_id') is-invalid @enderror">
        <option value="">-- Pilih Kategori --</option>
        @foreach($categories as $category)
            <option value="{{ $category->id }}"
                @selected(old('category_id', $book->category_id ?? '') == $category->id)>
                {{ $category->name }}
            </option>
        @endforeach
    </select>
    @error('category_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>