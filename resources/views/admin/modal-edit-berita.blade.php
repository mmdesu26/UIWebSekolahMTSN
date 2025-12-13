<div class="modal fade" id="editModal{{ $item->id }}" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="{{ route('admin.berita.update', $item->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title">Edit Berita</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <!-- Sama seperti form tambah, tapi value dari $item -->
                    <div class="mb-3">
                        <label class="form-label">Judul</label>
                        <input type="text" name="judul" class="form-control" value="{{ $item->title }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Tipe</label>
                        <select name="tipe" class="form-select" required>
                            <option value="berita" {{ $item->tipe == 'berita' ? 'selected' : '' }}>Berita</option>
                            <option value="pengumuman" {{ $item->tipe == 'pengumuman' ? 'selected' : '' }}>Pengumuman</option>
                        </select>
                    </div>

                    <div class="mb-3">
    <label class="form-label fw-bold">Gambar Berita</label>
    <input type="file" name="image_file" class="form-control mb-2" accept="image/*" id="imageInput">

    <input type="url" name="image_url" class="form-control" placeholder="Atau masukkan URL gambar (panjang bebas)" 
           value="{{ old('image_url', $item->image ?? '') }}">

    <!-- Preview untuk upload file -->
    <div class="mt-3" id="imagePreview" style="display: none;">
        <p class="small text-muted mb-1">Pratinjau upload:</p>
        <img id="previewImg" src="" class="img-fluid rounded shadow-sm" style="max-height: 200px;">
    </div>

    <!-- Gambar saat ini kalau edit -->
    @if(isset($item) && $item->image)
        <div class="mt-3">
            <p class="small text-muted mb-1">Gambar saat ini:</p>
            <img src="{{ $item->image }}" class="img-thumbnail" style="max-height: 120px;">
        </div>
    @endif
</div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label>Tanggal Berita</label>
                            <input type="date" name="news_date" class="form-control"
                                   value="{{ $item->news_date?->format('Y-m-d') }}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Sumber</label>
                            <input type="text" name="source" class="form-control" value="{{ $item->source }}">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label>Konten</label>
                        <textarea name="konten" class="form-control" rows="8" required>{{ $item->content }}</textarea>
                    </div>

                    <div class="form-check">
                        <input type="checkbox" name="is_published" value="1"
                               class="form-check-input" {{ $item->is_published ? 'checked' : '' }}>
                        <label class="form-check-label">Tampilkan di website</label>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</div>