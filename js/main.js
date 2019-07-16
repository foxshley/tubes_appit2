document.addEventListener('DOMContentLoaded', function() {
    console.log("DOM ready!");

    // Navbar setup
    var navbar        = document.querySelector('.navbar');
    var navbarToggler = document.querySelector('.navbar-toggler');
    var togglerTarget = document.querySelector(navbarToggler.dataset.target);

    navbarToggler.addEventListener('click', function(e) {
        togglerTarget.classList.toggle('collapse');
    });

    var product       = document.querySelector('#product');
    
    window.addEventListener("scroll", function(e) {
        // Navbar transparent to opaque
        if (this.scrollY > 200) {
            navbar.classList.add('scrolled');
        }
        else {
            navbar.classList.remove('scrolled');
        }

        // Reveal products
        if (this.scrollY > product.scrollTop + 430) {
            product.classList.add('scrolled');
        }
    });
});


//-----------------------------------------------------------
//              Kumpulan Fungsi Animasi
//-----------------------------------------------------------

function scrollDown() {
    var elem = document.querySelector('scroll-down');
}


//-----------------------------------------------------------
//              Kumpulan Fungsi Validasi
//-----------------------------------------------------------

// Fungsi utama
function validasi() {
    var nama   = document.getElementById("nama").value;
    var email  = document.getElementById("email").value;
    var alamat = document.getElementById("alamat").value;
    var telp   = document.getElementById("telp").value;
    
    if((nama != "") && (email != "") && (alamat != "")) {
        if(!alphabet(nama, 'Nama harus huruf semua!!!') || !telepon(telp, 'Telepon harus angka semua!!!'))
            return false;

        return true;
    }
    else {
        alert('Anda harus mengisi data dengan lengkap!');
        return false;
    }
}

// Validasi huruf
function alphabet(nilai, pesan) {
    var alphaExp = /^[a-zA-Z]+[0-9]*$/;

    if(nilai.match(alphaExp)) {
        return true;
    }
    else {
        alert(pesan);
        return false;
    }
}

// Validasi nomor telepon
function telepon(nilai, pesan) {
    var phoneExp = /^[0-9]+$/;

    if(nilai.match(phoneExp)) {
        return true;
    }
    else {
        alert(pesan);
        return false;
    }
}