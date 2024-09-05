// Fungsi untuk validasi form
function validateForm() {
    let namaProduk = document.forms["productForm"]["nama_produk"].value;
    let deskripsi = document.forms["productForm"]["deskripsi_produk"].value;
    let kategori = document.forms["productForm"]["kategori"].value;
    let subKategori = document.forms["productForm"]["sub_kategori"].value;
    let hargaSatuan = document.forms["productForm"]["harga_satuan"].value;
    let grosir = document.forms["productForm"]["grosir"].value;
    let hargaGrosir = document.forms["productForm"]["harga_grosir"].value;
    let jasaKirim = document.querySelectorAll('input[name="jasa_kirim"]:checked');
    let captcha = document.forms["productForm"]["captcha"].value;

    // Validasi Nama Produk
    if (namaProduk == "" || namaProduk.length < 5 || namaProduk.length > 30) {
        alert("Nama produk harus diisi dan memiliki panjang antara 5 sampai 30 karakter.");
        return false;
    }

    // Validasi Deskripsi Produk
    if (deskripsi == "" || deskripsi.length < 5 || deskripsi.length > 100) {
        alert("Deskripsi produk harus diisi dan memiliki panjang antara 5 sampai 100 karakter.");
        return false;
    }

    // Validasi Kategori
    if (kategori == "") {
        alert("Kategori harus dipilih.");
        return false;
    }

    // Validasi Sub Kategori
    if (subKategori == "") {
        alert("Sub kategori harus dipilih.");
        return false;
    }

    // Validasi Harga Satuan
    if (hargaSatuan == "" || isNaN(hargaSatuan)) {
        alert("Harga satuan harus diisi dan berupa nilai numerik.");
        return false;
    }

    // Validasi Grosir dan Harga Grosir
    if (grosir == "Ya" && (hargaGrosir == "" || isNaN(hargaGrosir))) {
        alert("Harga grosir harus diisi jika Grosir adalah 'Ya' dan harus berupa nilai numerik.");
        return false;
    }

    // Validasi Jasa Kirim
    if (jasaKirim.length < 3) {
        alert("Minimal 3 jasa kirim harus dipilih.");
        return false;
    }

    // Validasi Captcha
    if (captcha == "" || captcha.length != 5) {
        alert("Captcha harus diisi dengan 5 karakter.");
        return false;
    }

    return true;
}

// Fungsi untuk mengatur sub kategori berdasarkan kategori
function setSubKategori() {
    let kategori = document.forms["productForm"]["kategori"].value;
    let subKategori = document.forms["productForm"]["sub_kategori"];

    // Reset sub kategori
    subKategori.innerHTML = '<option value="">--Pilih Sub Kategori--</option>';

    if (kategori == "Baju") {
        let options = ["Baju Pria", "Baju Wanita", "Baju Anak"];
        options.forEach(option => {
            let newOption = document.createElement("option");
            newOption.value = option;
            newOption.text = option;
            subKategori.appendChild(newOption);
        });
    } else if (kategori == "Elektronik") {
        let options = ["Mesin Cuci", "Kulkas", "AC"];
        options.forEach(option => {
            let newOption = document.createElement("option");
            newOption.value = option;
            newOption.text = option;
            subKategori.appendChild(newOption);
        });
    } else if (kategori == "Alat Tulis") {
        let options = ["Kertas", "Map", "Pulpen"];
        options.forEach(option => {
            let newOption = document.createElement("option");
            newOption.value = option;
            newOption.text = option;
            subKategori.appendChild(newOption);
        });
    }
}

// Fungsi untuk generate captcha
function generateCaptcha() {
    let captcha = "";
    for (let i = 0; i < 5; i++) {
        let randomAscii = Math.floor(Math.random() * 26) + 65; // A-Z
        captcha += String.fromCharCode(randomAscii);
    }
    document.getElementById("captchaDisplay").value = captcha;
}

window.onload = generateCaptcha;
