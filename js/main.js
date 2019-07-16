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
    var testimoni     = document.querySelector('#testimoni');
    
    window.addEventListener("scroll", function(e) {
        // Navbar transparent to opaque
        if (this.scrollY > 200) {
            navbar.classList.add('scrolled');
        }
        else {
            navbar.classList.remove('scrolled');
        }

        // Reveal products
        if (this.scrollY > product.offsetTop - 350) {
            product.classList.add('scrolled');
        }

        // Reveal testimonies
        if (this.scrollY > testimoni.offsetTop - 400) {
            testimoni.classList.add('scrolled');
        }
    });
});


//-----------------------------------------------------------
//              Kumpulan Fungsi Animasi
//-----------------------------------------------------------

function scrollDown() {
    var elem = document.querySelector('scroll-down');
}

function kirimData(e) {
    e.preventDefault();
    if (validasiNama() && validasiEmail() && validasiSubjek() && validasiPesan())
        document.forms['contact'].submit();
}


//-----------------------------------------------------------
//              Kumpulan Fungsi Validasi
//-----------------------------------------------------------

function validasiHuruf(nilai) {
    var alphaExp = /^[a-zA-Z]+$/;

    if(alphaExp.test(nilai)) {
        return true;
    }

    return false;
}

function validasiNama() {
    let element  = document.querySelector('#nama');
    let errorMsg = document.querySelector('#namaError');

    if (element.value == "") {
        errorMsg.textContent   = 'Nama harus diisi!';
        errorMsg.style.display = 'block';

        return false;
    }
    else if (!validasiHuruf(element.value)) {
        errorMsg.textContent   = 'Nama harus berupa huruf!';
        errorMsg.style.display = 'block';

        return false;
    }

    errorMsg.textContent   = '';
    errorMsg.style.display = 'none';

    return true;
}

function validasiEmail() {
    let element  = document.querySelector('#email');
    let errorMsg = document.querySelector('#emailError');
    var regex    = /^[a-zA-z0-9_.]+@[a-zA-z0-9-]+\.[a-zA-Z0-9-.]+$/;

    if (element.value == "") {
        errorMsg.textContent   = 'Email harus diisi!';
        errorMsg.style.display = 'block';

        return false;
    }
    else if (!regex.test(element.value)) {
        errorMsg.textContent   = 'Email tidak valid!';
        errorMsg.style.display = 'block';

        return false;
    }
    
    errorMsg.textContent   = '';
    errorMsg.style.display = 'none';
    
    return true;
}

function validasiSubjek() {
    let element  = document.querySelector('#subjek');
    let errorMsg = document.querySelector('#subjekError');

    if (element.value == "") {
        errorMsg.textContent   = 'Subjek harus diisi!';
        errorMsg.style.display = 'block';

        return false;
    }
    
    errorMsg.textContent   = '';
    errorMsg.style.display = 'none';

    return true;
}

function validasiPesan() {
    let element  = document.querySelector('#pesan');
    let errorMsg = document.querySelector('#pesanError');

    if (element.value == "") {
        errorMsg.textContent   = 'Pesan harus diisi!';
        errorMsg.style.display = 'block';

        return false;
    }
    
    errorMsg.textContent   = '';
    errorMsg.style.display = 'none';

    return true;
}