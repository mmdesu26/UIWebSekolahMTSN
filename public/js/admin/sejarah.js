// ==================== TEXTAREA STATISTICS ==================== 
document.addEventListener('DOMContentLoaded', function() {
    const textarea = document.querySelector('.sejarah-textarea');
    const charCount = document.querySelector('.char-count');
    const wordCount = document.querySelector('.word-count');
    const paragraphCount = document.querySelector('.paragraph-count');
    const readTime = document.querySelector('.read-time');

    function updateStats() {
        const text = textarea.value;
        
        // Character count
        const chars = text.length;
        charCount.textContent = chars.toLocaleString();

        // Word count
        const words = text.trim() ? text.trim().split(/\s+/).length : 0;
        wordCount.textContent = words.toLocaleString();

        // Paragraph count
        const paragraphs = text.trim() ? text.trim().split(/\n\n+/).length : 0;
        paragraphCount.textContent = paragraphs;

        // Reading time (avg 200 words per minute)
        const minutes = Math.ceil(words / 200);
        readTime.textContent = minutes + ' min';
    }

    // Initial stats
    updateStats();

    // Update on input
    textarea.addEventListener('input', function() {
        updateStats();
    });
});

// ==================== IMAGE PREVIEW ==================== 
document.getElementById('imageInput').addEventListener('change', function(e) {
    const file = e.target.files[0];
    
    if (file) {
        // Validate file type
        if (!file.type.match('image.*')) {
            alert('Hanya file gambar yang diperbolehkan!');
            this.value = '';
            return;
        }

        // Validate file size (2MB)
        if (file.size > 2 * 1024 * 1024) {
            alert('Ukuran file maksimal 2MB!');
            this.value = '';
            return;
        }

        const reader = new FileReader();
        
        reader.onload = function(e) {
            const previewWrapper = document.querySelector('.image-preview-wrapper');
            const noImagePlaceholder = document.getElementById('noImagePlaceholder');
            
            // Remove no image placeholder
            if (noImagePlaceholder) {
                noImagePlaceholder.remove();
            }

            // Remove existing image
            const existingImage = previewWrapper.querySelector('.current-image');
            if (existingImage) {
                existingImage.remove();
            }

            // Create new image preview
            const imageContainer = document.createElement('div');
            imageContainer.className = 'current-image';
            imageContainer.innerHTML = `
                <img src="${e.target.result}" alt="Preview Image" id="imagePreview">
                <button type="button" class="btn-delete-image" onclick="clearImageInput()" title="Hapus Preview">
                    <i class="fas fa-times"></i>
                </button>
            `;
            
            previewWrapper.appendChild(imageContainer);
        };
        
        reader.readAsDataURL(file);
    }
});

// ==================== CLEAR IMAGE INPUT ==================== 
function clearImageInput() {
    const input = document.getElementById('imageInput');
    const previewWrapper = document.querySelector('.image-preview-wrapper');
    const currentImage = previewWrapper.querySelector('.current-image');
    
    if (confirm('Hapus preview gambar?')) {
        input.value = '';
        
        if (currentImage) {
            currentImage.remove();
        }

        // Show no image placeholder
        const noImagePlaceholder = document.createElement('div');
        noImagePlaceholder.className = 'no-image';
        noImagePlaceholder.id = 'noImagePlaceholder';
        noImagePlaceholder.innerHTML = `
            <i class="fas fa-image"></i>
            <p>Belum ada gambar</p>
        `;
        
        previewWrapper.appendChild(noImagePlaceholder);
    }
}

// ==================== DELETE EXISTING IMAGE ==================== 
function deleteImage() {
    if (!confirm('Yakin ingin menghapus gambar ini?')) {
        return;
    }

    // ⭐ PERBAIKAN: Ubah route dari '/admin/sejarah/delete-image' menjadi route yang benar
    fetch('/admin/sejarah/delete-image', {
        method: 'DELETE',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || ''
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            const previewWrapper = document.querySelector('.image-preview-wrapper');
            const currentImage = previewWrapper.querySelector('.current-image');
            
            if (currentImage) {
                currentImage.remove();
            }

            // Show no image placeholder
            const noImagePlaceholder = document.createElement('div');
            noImagePlaceholder.className = 'no-image';
            noImagePlaceholder.id = 'noImagePlaceholder';
            noImagePlaceholder.innerHTML = `
                <i class="fas fa-image"></i>
                <p>Belum ada gambar</p>
            `;
            
            previewWrapper.appendChild(noImagePlaceholder);

            // Clear input
            document.getElementById('imageInput').value = '';

            // Show success message
            alert('Gambar berhasil dihapus!');
        } else {
            alert('Gagal menghapus gambar!');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Terjadi kesalahan!');
    });
}

// ==================== MARKDOWN INSERTION ==================== 
function insertMarkdown(before, after) {
    const textarea = document.querySelector('.sejarah-textarea');
    const start = textarea.selectionStart;
    const end = textarea.selectionEnd;
    const text = textarea.value;
    const selectedText = text.substring(start, end);

    const newText = text.substring(0, start) + before + selectedText + after + text.substring(end);
    textarea.value = newText;
    
    // Update cursor position
    textarea.selectionStart = start + before.length;
    textarea.selectionEnd = start + before.length + selectedText.length;
    textarea.focus();

    // Trigger input event for stats update
    textarea.dispatchEvent(new Event('input'));
}

// ==================== CLEAR FORMAT ==================== 
function clearFormat() {
    const textarea = document.querySelector('.sejarah-textarea');
    const start = textarea.selectionStart;
    const end = textarea.selectionEnd;
    const text = textarea.value;
    const selectedText = text.substring(start, end);

    // Remove markdown formatting
    const cleaned = selectedText
        .replace(/\*\*(.*?)\*\*/g, '$1')
        .replace(/\*(.*?)\*/g, '$1')
        .replace(/__(.*?)__/g, '$1')
        .replace(/`(.*?)`/g, '$1')
        .replace(/~~(.*?)~~/g, '$1');

    const newText = text.substring(0, start) + cleaned + text.substring(end);
    textarea.value = newText;
    textarea.selectionStart = start;
    textarea.selectionEnd = start + cleaned.length;
    textarea.focus();

    textarea.dispatchEvent(new Event('input'));
}

// ==================== FORM SUBMISSION ==================== 
document.addEventListener('DOMContentLoaded', function() {
    const form = document.querySelector('.sejarah-form');
    if (form) {
        form.addEventListener('submit', function(e) {
            const submitBtn = form.querySelector('button[type="submit"]');
            const originalContent = submitBtn.innerHTML;
            
            submitBtn.innerHTML = '<div class="btn-content"><i class="fas fa-spinner fa-spin"></i><span>Menyimpan...</span></div>';
            submitBtn.disabled = true;
        });
    }
});

// ==================== RESET FORM ==================== 
function resetForm() {
    if (confirm('Yakin ingin mereset konten? Perubahan yang belum disimpan akan hilang.')) {
        location.reload();
    }
}

// ==================== INPUT FOCUS EFFECT ==================== 
document.querySelectorAll('.form-control').forEach(textarea => {
    textarea.addEventListener('focus', function() {
        this.style.transform = 'scale(1.01)';
    });
    
    textarea.addEventListener('blur', function() {
        this.style.transform = 'scale(1)';
    });
});

// ==================== TOOLBAR BUTTON FEEDBACK ==================== 
document.querySelectorAll('.toolbar-btn').forEach(btn => {
    btn.addEventListener('click', function(e) {
        e.preventDefault();
        this.style.transform = 'scale(0.95)';
        setTimeout(() => {
            this.style.transform = 'scale(1)';
        }, 100);
    });
});

// ==================== KEYBOARD SHORTCUTS ==================== 
document.addEventListener('keydown', function(e) {
    const textarea = document.querySelector('.sejarah-textarea');
    
    if (document.activeElement === textarea) {
        // Ctrl/Cmd + B for Bold
        if ((e.ctrlKey || e.metaKey) && e.key === 'b') {
            e.preventDefault();
            insertMarkdown('**', '**');
        }
        
        // Ctrl/Cmd + I for Italic
        if ((e.ctrlKey || e.metaKey) && e.key === 'i') {
            e.preventDefault();
            insertMarkdown('*', '*');
        }
        
        // Ctrl/Cmd + U for Underline
        if ((e.ctrlKey || e.metaKey) && e.key === 'u') {
            e.preventDefault();
            insertMarkdown('__', '__');
        }
    }

    // Ctrl/Cmd + S untuk submit
    if ((e.ctrlKey || e.metaKey) && e.key === 's') {
        e.preventDefault();
        document.querySelector('.sejarah-form').submit();
    }
});

// ==================== AUTO-SAVE DRAFT ==================== 
let autoSaveTimeout;
document.querySelector('.sejarah-textarea').addEventListener('input', function() {
    clearTimeout(autoSaveTimeout);
    
    autoSaveTimeout = setTimeout(() => {
        localStorage.setItem('sejarah_draft', this.value);
        console.log('Draft tersimpan otomatis');
    }, 3000);
});

// ==================== PREVENT ACCIDENTAL UNLOAD ==================== 
let hasChanges = false;
const textarea = document.querySelector('.sejarah-textarea');
const originalContent = textarea.value;

textarea.addEventListener('input', function() {
    hasChanges = this.value !== originalContent;
});

window.addEventListener('beforeunload', function(e) {
    if (hasChanges) {
        e.preventDefault();
        e.returnValue = 'Ada perubahan yang belum disimpan. Yakin ingin meninggalkan halaman?';
    }
});

// ==================== NOTIFICATION HELPER ==================== 
function showNotification(message, type = 'success') {
    const alertClass = type === 'success' ? 'alert-success' : 'alert-danger';
    const iconClass = type === 'success' ? 'fa-check-circle' : 'fa-exclamation-circle';
    
    const alert = document.createElement('div');
    alert.className = `alert ${alertClass} alert-dismissible fade show`;
    alert.setAttribute('role', 'alert');
    alert.innerHTML = `
        <i class="fas ${iconClass}"></i>
        <div>
            <strong>${type === 'success' ? 'Berhasil!' : 'Gagal!'}</strong> ${message}
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    `;
    
    const container = document.querySelector('.sejarah-container');
    container.insertBefore(alert, container.firstChild);
    
    // Auto dismiss after 5 seconds
    setTimeout(() => {
        const bsAlert = new bootstrap.Alert(alert);
        bsAlert.close();
    }, 5000);
}

// ==================== DRAG AND DROP SUPPORT ==================== 
const imagePreviewWrapper = document.querySelector('.image-preview-wrapper');

imagePreviewWrapper.addEventListener('dragover', function(e) {
    e.preventDefault();
    this.style.borderColor = '#667eea';
    this.style.background = 'rgba(102, 126, 234, 0.05)';
});

imagePreviewWrapper.addEventListener('dragleave', function(e) {
    e.preventDefault();
    this.style.borderColor = '';
    this.style.background = '';
});

imagePreviewWrapper.addEventListener('drop', function(e) {
    e.preventDefault();
    this.style.borderColor = '';
    this.style.background = '';
    
    const files = e.dataTransfer.files;
    if (files.length > 0) {
        const input = document.getElementById('imageInput');
        input.files = files;
        
        // Trigger change event
        const event = new Event('change', { bubbles: true });
        input.dispatchEvent(event);
    }
});