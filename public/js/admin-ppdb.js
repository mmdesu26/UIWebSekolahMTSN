// ==================== FORM SUBMISSION ==================== 
document.addEventListener('DOMContentLoaded', function() {
    const form = document.querySelector('.ppdb-form');
    if (form) {
        form.addEventListener('submit', function(e) {
            const submitBtn = form.querySelector('button[type="submit"]');
            const originalContent = submitBtn.innerHTML;
            
            submitBtn.innerHTML = '<div class="btn-content"><i class="fas fa-spinner fa-spin"></i><span>Menyimpan...</span></div>';
            submitBtn.disabled = true;

            setTimeout(() => {
                submitBtn.innerHTML = originalContent;
                submitBtn.disabled = false;
            }, 1500);
        });
    }
});

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
        if (value.length >= 2) {
            value = value.substring(0, 2) + '/' + value.substring(2);
        }
        if (value.length >= 5) {
            value = value.substring(0, 5) + '/' + value.substring(5, 9);
        }
        this.value = value;
    });
});

// ==================== TEXTAREA COUNTER ==================== 
document.querySelectorAll('.persyaratan-textarea, .konten-textarea').forEach(textarea => {
    textarea.addEventListener('input', function() {
        // Update stats if needed
        console.log(`${this.name}: ${this.value.length} characters`);
    });
});

// ==================== INFO BOX UPDATE ==================== 
document.querySelector('input[name="kuota"]').addEventListener('input', function() {
    const infoBox = document.querySelector('.info-box:nth-child(2) .info-box-value');
    if (infoBox && this.value) {
        infoBox.textContent = this.value;
    }
});

// ==================== KEYBOARD SHORTCUTS ==================== 
document.addEventListener('keydown', function(e) {
    // Ctrl/Cmd + S untuk submit
    if ((e.ctrlKey || e.metaKey) && e.key === 's') {
        e.preventDefault();
        document.querySelector('.ppdb-form').submit();
    }
});

// ==================== AUTO-SAVE DRAFT ==================== 
let autoSaveTimeout;
document.querySelectorAll('.form-control, textarea').forEach(input => {
    input.addEventListener('input', function() {
        clearTimeout(autoSaveTimeout);
        
        autoSaveTimeout = setTimeout(() => {
            const key = 'ppdb_draft_' + this.name;
            localStorage.setItem(key, this.value);
        }, 2000);
    });
});

// ==================== CLEAR DRAFT ON SUCCESS ==================== 
if (document.querySelector('.alert-success')) {
    localStorage.removeItem('ppdb_draft_judul');
    localStorage.removeItem('ppdb_draft_dibuka');
    localStorage.removeItem('ppdb_draft_ditutup');
    localStorage.removeItem('ppdb_draft_kuota');
    localStorage.removeItem('ppdb_draft_persyaratan');
    localStorage.removeItem('ppdb_draft_konten');
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

// ==================== PREVENT ACCIDENTAL UNLOAD ==================== 
let hasChanges = false;

document.querySelectorAll('.form-control, textarea').forEach(input => {
    const originalValue = input.value;
    
    input.addEventListener('input', function() {
        hasChanges = this.value !== originalValue;
    });
});

window.addEventListener('beforeunload', function(e) {
    if (hasChanges) {
        e.preventDefault();
        e.returnValue = 'Ada perubahan yang belum disimpan. Yakin ingin meninggalkan halaman?';
    }
});

// ==================== SMOOTH SCROLL ==================== 
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function(e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
            target.scrollIntoView({ behavior: 'smooth', block: 'start' });
        }
    });
});

// ==================== INFO BOX ANIMATIONS ==================== 
document.querySelectorAll('.info-box').forEach((box, index) => {
    box.style.animation = `fadeInUp 0.6s ease-out backwards`;
    box.style.animationDelay = `${0.2 + (index * 0.1)}s`;
});

document.querySelector('.ppdb-form').addEventListener('submit', function(e) {
    if (!e.defaultPrevented) {
        this.style.opacity = '0.7'; // Animasi halus
    }
});

document.getElementById('add-timeline-item').addEventListener('click', function () {
    const timelineItems = document.getElementById('timeline-items');
    const index = timelineItems.children.length;
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
    timelineItems.appendChild(newItem);
});

document.addEventListener('click', function (e) {
    if (e.target.classList.contains('remove-timeline-item')) {
        e.target.parentElement.remove();
    }
});