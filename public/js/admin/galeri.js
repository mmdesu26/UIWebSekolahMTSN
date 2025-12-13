// ==================== FILE UPLOAD HANDLING ====================
const fileInput = document.getElementById('fileInput');
const fileUploadBox = document.querySelector('.file-upload-box');
const fileName = document.getElementById('fileName');

// Drag and drop
if (fileUploadBox) {
    fileUploadBox.addEventListener('dragover', (e) => {
        e.preventDefault();
        fileUploadBox.style.borderColor = 'var(--primary-color)';
        fileUploadBox.style.background = 'linear-gradient(135deg, rgba(102, 126, 234, 0.1), rgba(118, 75, 162, 0.1))';
    });

    fileUploadBox.addEventListener('dragleave', () => {
        fileUploadBox.style.borderColor = 'var(--border-color)';
        fileUploadBox.style.background = 'linear-gradient(135deg, rgba(102, 126, 234, 0.02), rgba(118, 75, 162, 0.02))';
    });

    fileUploadBox.addEventListener('drop', (e) => {
        e.preventDefault();
        fileUploadBox.style.borderColor = 'var(--border-color)';
        fileUploadBox.style.background = 'linear-gradient(135deg, rgba(102, 126, 234, 0.02), rgba(118, 75, 162, 0.02))';
        
        const files = e.dataTransfer.files;
        if (files.length > 0) {
            fileInput.files = files;
            handleFileUpload({ target: fileInput });
        }
    });
}

function handleFileUpload(event) {
    const file = event.target.files[0];
    if (!file) return;

    // Show file name
    if (fileName) {
        fileName.innerHTML = `✓ File: ${file.name} (${(file.size / 1024 / 1024).toFixed(2)} MB)`;
        fileName.classList.add('show');
    }

    // Preview
    const previewContainer = document.getElementById('uploadPreviewContainer');
    if (!previewContainer) return;
    
    previewContainer.innerHTML = '';
    
    const reader = new FileReader();
    reader.onload = function(e) {
        if (file.type.startsWith('image/')) {
            const img = document.createElement('img');
            img.src = e.target.result;
            img.className = 'img-preview show';
            previewContainer.appendChild(img);
        } else if (file.type.startsWith('video/')) {
            const video = document.createElement('video');
            video.src = e.target.result;
            video.className = 'video-preview show';
            video.controls = true;
            previewContainer.appendChild(video);
        }
        previewContainer.classList.add('show');
    };
    reader.readAsDataURL(file);
}

// ==================== MEDIA PREVIEW FROM LINK ====================
function previewMediaFromLink(inputId, containerId) {
    const input = document.getElementById(inputId);
    const container = document.getElementById(containerId);
    
    if (!input || !container) return;
    
    const url = input.value.trim();
    container.innerHTML = '';

    if (!url) {
        container.classList.remove('show');
        return;
    }

    // YouTube/Youtu.be
    if (url.includes('youtube.com') || url.includes('youtu.be')) {
        const videoId = extractYoutubeId(url);
        if (videoId) {
            container.innerHTML = `
                <iframe 
                    class="video-preview show"
                    src="https://www.youtube.com/embed/${videoId}"
                    allowfullscreen
                    loading="lazy"
                    style="width: 100%; height: 220px; border-radius: 10px; border: 2px solid var(--border-color);">
                </iframe>
            `;
            container.classList.add('show');
            return;
        }
    }

    // TikTok
    if (url.includes('tiktok.com')) {
        container.innerHTML = `
            <div style="text-align: center; padding: 20px; background: var(--light-bg); border-radius: 10px;">
                <i class="fab fa-tiktok" style="font-size: 32px; color: #000; margin-bottom: 10px; display: block;"></i>
                <p style="color: var(--text-muted); margin: 0;">Preview TikTok akan ditampilkan setelah disimpan</p>
            </div>
        `;
        container.classList.add('show');
        return;
    }

    // Instagram
    if (url.includes('instagram.com')) {
        container.innerHTML = `
            <div style="text-align: center; padding: 20px; background: var(--light-bg); border-radius: 10px;">
                <i class="fab fa-instagram" style="font-size: 32px; color: #E4405F; margin-bottom: 10px; display: block;"></i>
                <p style="color: var(--text-muted); margin: 0;">Preview Instagram akan ditampilkan setelah disimpan</p>
            </div>
        `;
        container.classList.add('show');
        return;
    }

    // Direct image URL
    if (isImageUrl(url)) {
        const img = document.createElement('img');
        img.src = url;
        img.className = 'img-preview show';
        img.style.maxHeight = '220px';
        img.style.objectFit = 'contain';
        img.onerror = function() {
            this.style.display = 'none';
            container.innerHTML = '<p style="color: var(--danger-color); text-align: center; padding: 20px;">❌ Gambar tidak dapat dimuat</p>';
        };
        container.appendChild(img);
        container.classList.add('show');
        return;
    }

    // Direct video URL
    if (isVideoUrl(url)) {
        const video = document.createElement('video');
        video.src = url;
        video.className = 'video-preview show';
        video.controls = true;
        video.style.maxHeight = '220px';
        video.onerror = function() {
            container.innerHTML = '<p style="color: var(--danger-color); text-align: center; padding: 20px;">❌ Video tidak dapat dimuat</p>';
        };
        container.appendChild(video);
        container.classList.add('show');
        return;
    }

    container.innerHTML = '<p style="color: var(--warning-color); text-align: center; padding: 20px;">⚠️ Format media tidak dikenali</p>';
    container.classList.add('show');
}

function extractYoutubeId(url) {
    const regExp = /^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|\&v=)([^#\&\?]*).*/;
    const match = url.match(regExp);
    return match && match[2].length === 11 ? match[2] : null;
}

function isImageUrl(url) {
    return /\.(jpg|jpeg|png|gif|webp|svg)$/i.test(url);
}

function isVideoUrl(url) {
    return /\.(mp4|webm|ogg|mov)$/i.test(url);
}

// ==================== MODAL FUNCTIONS ====================
function openAddModal() {
    const modal = document.getElementById('addModal');
    if (!modal) return;
    
    modal.classList.add('active');
    document.body.style.overflow = 'hidden';
    
    // Reset form
    const form = document.getElementById('addForm');
    if (form) form.reset();
    
    // Clear previews
    const uploadPreview = document.getElementById('uploadPreviewContainer');
    const embedPreview = document.getElementById('addEmbedPreview');
    
    if (uploadPreview) {
        uploadPreview.innerHTML = '';
        uploadPreview.classList.remove('show');
    }
    
    if (embedPreview) {
        embedPreview.innerHTML = '';
        embedPreview.classList.remove('show');
    }
    
    if (fileName) fileName.classList.remove('show');
}

function openEditModal(item) {
    const modal = document.getElementById('editModal');
    if (!modal) return;
    
    // Set values
    const judulInput = document.getElementById('editJudul');
    const gambarInput = document.getElementById('editGambar');
    const embedInput = document.getElementById('editEmbedLink');
    const form = document.getElementById('editForm');
    
    if (judulInput) judulInput.value = item.judul || '';
    if (gambarInput) gambarInput.value = item.gambar || '';
    if (embedInput) embedInput.value = item.embed_link || '';
    
    // Set form action
    if (form) {
        form.action = `/admin/galeri/update/${item.id}`;
    }
    
    // Preview gambar jika ada
    if (item.gambar && gambarInput) {
        previewMediaFromLink('editGambar', 'editPreviewContainer');
    }
    
    // Preview embed link jika ada
    if (item.embed_link && embedInput) {
        previewEmbedLink('editEmbedLink', 'editEmbedPreview');
    }
    
    modal.classList.add('active');
    document.body.style.overflow = 'hidden';
}

function closeModal(modalId) {
    const modal = document.getElementById(modalId);
    if (!modal) return;
    
    modal.style.animation = 'fadeInBg 0.3s ease reverse';
    setTimeout(() => {
        modal.classList.remove('active');
        document.body.style.overflow = 'auto';
        modal.style.animation = '';
    }, 300);
}

// ==================== EMBED LINK PREVIEW ====================
function previewEmbedLink(inputId, containerId) {
    const input = document.getElementById(inputId);
    const container = document.getElementById(containerId);
    
    if (!input || !container) return;
    
    const url = input.value.trim();
    container.innerHTML = '';

    if (!url) {
        container.classList.remove('show');
        return;
    }

    // YouTube
    if (url.includes('youtube.com') || url.includes('youtu.be')) {
        const videoId = extractYoutubeId(url);
        if (videoId) {
            container.innerHTML = `
                <iframe 
                    class="video-preview show"
                    src="https://www.youtube.com/embed/${videoId}"
                    allowfullscreen
                    loading="lazy"
                    style="width: 100%; height: 220px; border-radius: 10px; border: 2px solid var(--border-color);">
                </iframe>
            `;
            container.classList.add('show');
            return;
        }
    }

    // TikTok
    if (url.includes('tiktok.com')) {
        container.innerHTML = `
            <div style="text-align: center; padding: 20px; background: var(--light-bg); border-radius: 10px;">
                <i class="fab fa-tiktok" style="font-size: 32px; color: #000; margin-bottom: 10px; display: block;"></i>
                <p style="color: var(--text-muted); margin: 0;">Embed TikTok akan ditampilkan di halaman utama</p>
            </div>
        `;
        container.classList.add('show');
        return;
    }

    // Instagram
    if (url.includes('instagram.com')) {
        container.innerHTML = `
            <div style="text-align: center; padding: 20px; background: var(--light-bg); border-radius: 10px;">
                <i class="fab fa-instagram" style="font-size: 32px; color: #E4405F; margin-bottom: 10px; display: block;"></i>
                <p style="color: var(--text-muted); margin: 0;">Embed Instagram akan ditampilkan di halaman utama</p>
            </div>
        `;
        container.classList.add('show');
        return;
    }

    container.innerHTML = `
        <div style="text-align: center; padding: 20px; background: var(--light-bg); border-radius: 10px;">
            <i class="fas fa-link" style="font-size: 32px; color: var(--primary-color); margin-bottom: 10px; display: block;"></i>
            <p style="color: var(--text-muted); margin: 0;">Link embed akan ditampilkan di halaman utama</p>
        </div>
    `;
    container.classList.add('show');
}

// ==================== DELETE FUNCTION ====================
function confirmDelete(id) {
    if (confirm('Apakah Anda yakin ingin menghapus media ini? Tindakan ini tidak dapat dibatalkan.')) {
        const form = document.getElementById('deleteForm');
        if (form) {
            form.action = `/admin/galeri/delete/${id}`;
            form.submit();
        }
    }
}

// ==================== MODAL EVENTS ====================
document.addEventListener('DOMContentLoaded', function() {
    // Close modal when clicking outside
    window.addEventListener('click', function(event) {
        if (event.target.classList.contains('modal')) {
            closeModal(event.target.id);
        }
    });

    // Close modal with Escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            const modals = document.querySelectorAll('.modal.active');
            modals.forEach(modal => closeModal(modal.id));
        }
    });

    // Form submission animations
    document.querySelectorAll('form').forEach(form => {
        form.addEventListener('submit', function(e) {
            const submitBtn = form.querySelector('.btn-submit');
            if (submitBtn && !submitBtn.disabled) {
                submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> <span>Memproses...</span>';
                submitBtn.disabled = true;
            }
        });
    });

    // Alert auto dismiss
    const alerts = document.querySelectorAll('.alert');
    alerts.forEach(alert => {
        setTimeout(() => {
            alert.style.animation = 'slideDown 0.4s ease-out reverse';
            setTimeout(() => alert.remove(), 400);
        }, 5000);
    });
});

// ==================== KEYBOARD SHORTCUTS ====================
document.addEventListener('keydown', function(e) {
    // Ctrl/Cmd + N = Open Add Modal
    if ((e.ctrlKey || e.metaKey) && e.key === 'n') {
        e.preventDefault();
        openAddModal();
    }
});