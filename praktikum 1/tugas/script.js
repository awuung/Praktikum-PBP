// Fungsi untuk menghasilkan captcha secara acak
function generateCaptcha() {
    let captcha = '';
    const characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
    for (let i = 0; i < 5; i++) {
        captcha += characters.charAt(Math.floor(Math.random() * characters.length));
    }
    // Menampilkan captcha di elemen dengan ID 'captchaText'
    document.getElementById('captchaText').innerText = captcha;
    return captcha;
}

// Menghasilkan captcha awal saat halaman dimuat
let generatedCaptcha = generateCaptcha(); 

// Menambahkan event listener untuk perubahan kategori
document.getElementById('category').addEventListener('change', function () {
    const subCategory = document.getElementById('subCategory');
    subCategory.innerHTML = ''; // Menghapus opsi subkategori yang ada
    let options = '';

    // Menentukan opsi subkategori berdasarkan kategori yang dipilih
    if (this.value === 'Baju') {
        options = `
            <option value="Baju Pria">Baju Pria</option>
            <option value="Baju Wanita">Baju Wanita</option>
            <option value="Baju Anak">Baju Anak</option>
        `;
    } else if (this.value === 'Elektronik') {
        options = `
            <option value="Mesin Cuci">Mesin Cuci</option>
            <option value="Kulkas">Kulkas</option>
            <option value="AC">AC</option>
        `;
    } else if (this.value === 'Alat Tulis') {
        options = `
            <option value="Kertas">Kertas</option>
            <option value="Map">Map</option>
            <option value="Pulpen">Pulpen</option>
        `;
    }

    subCategory.innerHTML = options; // Menambahkan opsi subkategori baru
});

// Fungsi untuk menampilkan pesan error
function displayError(elementId, message) {
    const errorElement = document.getElementById(elementId);
    errorElement.innerText = message;
    errorElement.style.display = 'block'; // Menampilkan pesan error
}

// Fungsi untuk membersihkan pesan error
function clearError(elementId) {
    const errorElement = document.getElementById(elementId);
    errorElement.style.display = 'none'; // Menyembunyikan pesan error
}

// Fungsi untuk menampilkan modal dengan detail produk
function showProductModal(productDetails) {
    const modal = document.getElementById('productModal');
    const modalContent = document.getElementById('productDetails');
    modalContent.innerHTML = productDetails;
    modal.style.display = 'block'; // Menampilkan modal

    // Menutup modal ketika tombol close diklik
    document.querySelector('.close').onclick = function() {
        modal.style.display = 'none';
    }

    // Menutup modal ketika klik di luar modal
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = 'none';
        }
    }
}

// Fungsi untuk mereset form
function resetForm() {
    document.getElementById('productForm').reset();
    generatedCaptcha = generateCaptcha(); // Menghasilkan captcha baru
}

// Fungsi untuk memvalidasi form sebelum submit
function validateForm() {
    let isValid = true;

    // Mengambil nilai dari input form
    const productName = document.getElementById('productName').value;
    const description = document.getElementById('description').value;
    const category = document.getElementById('category').value;
    const subCategory = document.getElementById('subCategory').value;
    const price = document.getElementById('price').value;
    const grosirYes = document.getElementById('grosirYes').checked;
    const grosirNo = document.getElementById('grosirNo').checked;
    const wholesalePrice = document.getElementById('wholesalePrice').value;
    const shippingOptions = document.querySelectorAll('input[name="shipping"]:checked');
    const captchaInput = document.getElementById('captcha').value;

    // Membersihkan pesan error sebelum validasi
    clearError('productNameError');
    clearError('descriptionError');
    clearError('categoryError');
    clearError('subCategoryError');
    clearError('priceError');
    clearError('grosirError');
    clearError('wholesalePriceError');
    clearError('shippingError');
    clearError('captchaError');

    // Validasi input form
    if (productName.length < 5 || productName.length > 30) {
        displayError('productNameError', 'Nama produk harus diisi dan antara 5 hingga 30 karakter.');
        isValid = false;
    }

    if (description.length < 5 || description.length > 100) {
        displayError('descriptionError', 'Deskripsi produk harus diisi dan antara 5 hingga 100 karakter.');
        isValid = false;
    }

    if (!category) {
        displayError('categoryError', 'Kategori harus diisi.');
        isValid = false;
    }
    if (!subCategory) {
        displayError('subCategoryError', 'Sub kategori harus diisi.');
        isValid = false;
    }

    if (!price || isNaN(price)) {
        displayError('priceError', 'Harga satuan harus diisi dan berupa nilai numerik.');
        isValid = false;
    }

    if (grosirYes && !wholesalePrice) {
        displayError('wholesalePriceError', 'Harga grosir harus diisi dan berupa nilai numerik jika Grosir dipilih.');
        isValid = false;
    }
    if (grosirNo && wholesalePrice) {
        displayError('wholesalePriceError', 'Harga grosir harus dikosongkan jika Grosir = Tidak.');
        isValid = false;
    }

    if (shippingOptions.length < 3) {
        displayError('shippingError', 'Minimal harus memilih 3 jasa kirim.');
        isValid = false;
    }

    if (captchaInput !== generatedCaptcha) {
        displayError('captchaError', 'Captcha tidak sesuai.');
        isValid = false;
    }

    // Jika semua validasi berhasil, tampilkan detail produk di modal dan reset form
    if (isValid) {
        const shippingSelected = Array.from(shippingOptions).map(opt => opt.value).join(', ');

        const productDetails = `
            <strong>Nama Produk:</strong> ${productName}<br>
            <strong>Deskripsi:</strong> ${description}<br>
            <strong>Kategori:</strong> ${category}<br>
            <strong>Sub Kategori:</strong> ${subCategory}<br>
            <strong>Harga Satuan:</strong> ${price}<br>
            <strong>Grosir:</strong> ${grosirYes ? 'Ya' : 'Tidak'}<br>
            <strong>Harga Grosir:</strong> ${wholesalePrice || '-'}<br>
            <strong>Jasa Kirim:</strong> ${shippingSelected}<br>
        `;
        
        showProductModal(productDetails);
        resetForm(); 
    }

    return false; // Mencegah form dari pengiriman default
}
