// Admin Kelas Program Form JavaScript

// Add Fitur Function
function addFitur() {
    const container = document.getElementById('fitur-container');
    const fiturItem = document.createElement('div');
    fiturItem.className = 'fitur-item';
    
    fiturItem.innerHTML = `
        <input type="text" name="fitur[]" class="form-control" placeholder="Masukkan fitur program">
        <button type="button" class="btn-remove-fitur" onclick="removeFitur(this)">
            <i class="fas fa-times"></i>
        </button>
    `;
    
    container.appendChild(fiturItem);
    
    // Update visibility of remove buttons
    updateRemoveButtons();
}

// Remove Fitur Function
function removeFitur(button) {
    const fiturItem = button.closest('.fitur-item');
    fiturItem.remove();
    
    // Update visibility of remove buttons
    updateRemoveButtons();
}

// Update Remove Buttons Visibility
function updateRemoveButtons() {
    const container = document.getElementById('fitur-container');
    const fiturItems = container.querySelectorAll('.fitur-item');
    
    fiturItems.forEach((item, index) => {
        const removeBtn = item.querySelector('.btn-remove-fitur');
        if (fiturItems.length === 1) {
            removeBtn.style.display = 'none';
        } else {
            removeBtn.style.display = 'flex';
        }
    });
}

// Initialize on page load
document.addEventListener('DOMContentLoaded', function() {
    updateRemoveButtons();
    
    // Form validation
    const form = document.querySelector('.program-form');
    if (form) {
        form.addEventListener('submit', function(e) {
            const nama = document.getElementById('nama').value.trim();
            const deskripsi = document.getElementById('deskripsi').value.trim();
            const iconClass = document.querySelector('input[name="icon_class"]:checked');
            const warna = document.querySelector('input[name="warna"]:checked');
            const kategori = document.getElementById('kategori').value;
            
            if (!nama || !deskripsi || !iconClass || !warna || !kategori) {
                e.preventDefault();
                
                Swal.fire({
                    icon: 'error',
                    title: 'Form Tidak Lengkap',
                    text: 'Mohon lengkapi semua field yang wajib diisi!',
                    confirmButtonColor: '#3498db'
                });
                
                return false;
            }
        });
    }
    
    // Preview icon and color selection
    const iconInputs = document.querySelectorAll('input[name="icon_class"]');
    const colorInputs = document.querySelectorAll('input[name="warna"]');
    
    iconInputs.forEach(input => {
        input.addEventListener('change', function() {
            console.log('Icon selected:', this.value);
        });
    });
    
    colorInputs.forEach(input => {
        input.addEventListener('change', function() {
            console.log('Color selected:', this.value);
        });
    });
});