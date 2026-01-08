// Gallery data will be passed from blade
let galeriData = [];
let currentIndex = 0;

// Initialize gallery data
function initGaleriData(data) {
    galeriData = data;
}

function openLightbox(id) {
    currentIndex = galeriData.findIndex(item => item.id === id);
    showImage(currentIndex);
    document.getElementById('lightbox').classList.add('active');
    document.body.style.overflow = 'hidden';
}

function closeLightbox(event) {
    if (event.target.id === 'lightbox' || event.target.classList.contains('lightbox-close')) {
        document.getElementById('lightbox').classList.remove('active');
        document.body.style.overflow = 'auto';
    }
}

function changeImage(direction, event) {
    event.stopPropagation();
    currentIndex += direction;
    
    if (currentIndex >= galeriData.length) {
        currentIndex = 0;
    } else if (currentIndex < 0) {
        currentIndex = galeriData.length - 1;
    }
    
    showImage(currentIndex);
}

function showImage(index) {
    const item = galeriData[index];
    const contentDiv = document.getElementById('lightbox-content');
    
    // Clear previous content
    contentDiv.innerHTML = '';
    
    if (item.tipe === 'embed' && item.embed_link) {
        // Show embed content
        const embedDiv = document.createElement('div');
        embedDiv.className = 'lightbox-embed';
        embedDiv.innerHTML = getEmbedHTML(item.embed_link);
        contentDiv.appendChild(embedDiv);
    } else {
        // Show image
        const img = document.createElement('img');
        img.src = item.gambar;
        img.alt = item.judul;
        contentDiv.appendChild(img);
    }
}

function getEmbedHTML(url) {
    // YouTube
    if (url.includes('youtube.com') || url.includes('youtu.be')) {
        let videoId = '';
        if (url.includes('youtube.com/watch?v=')) {
            videoId = url.split('v=')[1].split('&')[0];
        } else if (url.includes('youtu.be/')) {
            videoId = url.split('youtu.be/')[1].split('?')[0];
        }
        return `<iframe src="https://www.youtube.com/embed/${videoId}" allowfullscreen></iframe>`;
    }
    
    // TikTok
    if (url.includes('tiktok.com')) {
        return `<iframe src="${url}" allowfullscreen></iframe>`;
    }
    
    // Instagram
    if (url.includes('instagram.com')) {
        return `<iframe src="${url}/embed" allowfullscreen></iframe>`;
    }
    
    // Default
    return `<iframe src="${url}" allowfullscreen></iframe>`;
}

// Keyboard navigation
document.addEventListener('keydown', function(e) {
    const lightbox = document.getElementById('lightbox');
    if (lightbox && lightbox.classList.contains('active')) {
        if (e.key === 'Escape') {
            lightbox.classList.remove('active');
            document.body.style.overflow = 'auto';
        } else if (e.key === 'ArrowLeft') {
            changeImage(-1, e);
        } else if (e.key === 'ArrowRight') {
            changeImage(1, e);
        }
    }
});

document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('.gallery-item').forEach((item, i) => {
        item.style.opacity = 0;
        item.style.transform = 'translateY(20px)';
        setTimeout(() => {
            item.style.transition = 'all 0.5s ease';
            item.style.opacity = 1;
            item.style.transform = 'translateY(0)';
        }, i * 100);
    });
});
