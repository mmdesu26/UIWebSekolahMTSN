// ==================== DOCUMENT READY ====================
document.addEventListener('DOMContentLoaded', function() {
    const form = document.querySelector('.ppdb-form');
    const timelineContainer = document.getElementById('timeline-items');
    let hasChanges = false;

    // ==================== TRACK FORM CHANGES ====================
    document.querySelectorAll('.form-control, textarea').forEach(input => {
        const originalValue = input.value;

        input.addEventListener('input', function() {
            hasChanges = true;

            // Auto-save draft
            const key = 'ppdb_draft_' + this.name;
            localStorage.setItem(key, this.value);
        });
    });

    // ==================== PREVENT ACCIDENTAL UNLOAD ====================
    window.addEventListener('beforeunload', function(e) {
        if (hasChanges) {
            e.preventDefault();
            e.returnValue = 'Ada perubahan yang belum disimpan. Yakin ingin meninggalkan halaman?';
        }
    });

    // ==================== SUBMIT FORM ====================
    if (form) {
        form.addEventListener('submit', function() {
            // Disable alert saat submit
            hasChanges = false;

            // Button loading effect
            const submitBtn = form.querySelector('button[type="submit"]');
            const originalContent = submitBtn.innerHTML;

            submitBtn.innerHTML = '<div class="btn-content"><i class="fas fa-spinner fa-spin"></i><span>Menyimpan...</span></div>';
            submitBtn.disabled = true;
        });
    }

    // ==================== INPUT FOCUS EFFECT ====================
    document.querySelectorAll('.form-control').forEach(input => {
        input.addEventListener('focus', function() {
            this.style.transform = 'scale(1.02)';
        });
        input.addEventListener('blur', function() {
            this.style.transform = 'scale(1)';
        });
    });

    // ==================== DATE INPUT FORMATTING ====================
    document.querySelectorAll('.dibuka-input, .ditutup-input').forEach(input => {
        input.addEventListener('keyup', function(e) {
            let value = this.value.replace(/\D/g, '');
            if (value.length >= 2) value = value.substring(0, 2) + '/' + value.substring(2);
            if (value.length >= 5) value = value.substring(0, 5) + '/' + value.substring(5, 9);
            this.value = value;
        });
    });

    // ==================== TEXTAREA COUNTER ====================
    document.querySelectorAll('.persyaratan-textarea, .konten-textarea').forEach(textarea => {
        textarea.addEventListener('input', function() {
            console.log(`${this.name}: ${this.value.length} characters`);
        });
    });

    // ==================== TIMELINE DYNAMIC ITEMS ====================
    document.getElementById('add-timeline-item').addEventListener('click', function () {
        const index = timelineContainer.children.length;
        const newItem = document.createElement('div');
        newItem.classList.add('timeline-item-input', 'mb-3', 'p-3', 'border', 'rounded');
        newItem.innerHTML = `
            <div class="form-group">
                <label>Tanggal</label>
                <input type="text" class="form-control" name="timeline[${index}][date]" placeholder="Contoh: Gelombang Pertama atau 10 Mei 2025" required>
            </div>
            <div class="form-group">
                <label>Judul</label>
                <input type="text" class="form-control" name="timeline[${index}][title]" placeholder="Contoh: Pendaftaran Online" required>
            </div>
            <div class="form-group">
                <label>Deskripsi</label>
                <textarea class="form-control" name="timeline[${index}][description]" placeholder="Deskripsi singkat" required></textarea>
            </div>
            <button type="button" class="btn btn-danger btn-sm remove-timeline-item">Hapus</button>
        `;
        timelineContainer.appendChild(newItem);
    });

    document.addEventListener('click', function (e) {
        if (e.target.classList.contains('remove-timeline-item')) {
            e.target.parentElement.remove();
        }
    });

    // ==================== CLEAR DRAFT ON SUCCESS ====================
    if (document.querySelector('.alert-success')) {
        ['judul', 'dibuka', 'ditutup', 'kuota', 'persyaratan', 'konten'].forEach(name => {
            localStorage.removeItem('ppdb_draft_' + name);
        });
    }

    // ==================== FORM VALIDATION ====================
    document.querySelectorAll('.form-control, textarea').forEach(input => {
        input.addEventListener('invalid', function(e) {
            e.preventDefault();
            this.style.borderColor = 'var(--danger-color)';
            this.style.boxShadow = '0 0 0 3px rgba(245, 101, 101, 0.1)';
        });

        input.addEventListener('input', function() {
            if (this.validity.valid) {
                this.style.borderColor = 'var(--border-color)';
                this.style.boxShadow = 'none';
            }
        });
    });

    // ==================== KEYBOARD SHORTCUT ====================
    document.addEventListener('keydown', function(e) {
        if ((e.ctrlKey || e.metaKey) && e.key === 's') {
            e.preventDefault();
            form.submit();
        }
    });
});
