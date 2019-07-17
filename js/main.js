document.addEventListener('DOMContentLoaded', function() {
    console.log("DOM ready!");

    // Navbar setup
    var navbar        = document.querySelector('.navbar');
    var navbarToggler = document.querySelector('.navbar-toggler');
    var togglerTarget = document.querySelector(navbarToggler.dataset.target);

    navbarToggler.addEventListener('click', function(e) {
        togglerTarget.classList.toggle('collapse');
    });

    // Modal setup
    // var modals        = document.querySelectorAll('*[data-toggle="modal"]');
    // console.log(modals);
    // Array.prototype.forEach.call(modals, function(modal) {
    //    modal.addEventListener('click', function(e) {
    //        var targetElement = document.querySelector(e.target.dataset.target);
    //        targetElement.classList.add('show');
    //        targetElement.removeAttribute('aria-hidden');
    //        targetElement.setAttribute('aria-modal', true);
    //        targetElement.style.display = 'block';
    //    });
    // });
    // var modalsDismiss = document.querySelectorAll('.modal-dialog [data-dismiss="modal"]');
    // Array.prototype.forEach.call(modalsDismiss, function(modal) {
    //     modal.addEventListener('click', function(e) {
    //         var targetElement = document.querySelector('*[aria-modal="true"]');
    //         targetElement.classList.remove('show');
    //         targetElement.style.display = 'none';
    //         targetElement.removeAttribute('aria-modal');
    //         targetElement.setAttribute('aria-hidden', true);
    //     });
    //  });

    

    // Scroll animation setup
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
        if(product) {
            if (this.scrollY > product.offsetTop - 350) {
                product.classList.add('scrolled');
            }
        }

        // Reveal testimonies
        if(testimoni) {
            if (this.scrollY > testimoni.offsetTop - 400) {
                testimoni.classList.add('scrolled');
            }
        }
    });
});

//-----------------------------------------------------------
//              Fungsi Modal
//-----------------------------------------------------------

function showModal(e) {
    var elem   = document.querySelector('#modalKonfirmasi');
    var target = document.querySelector(elem.dataset.target);
    target.classList.add('show');
    target.removeAttribute('aria-hidden');
    target.setAttribute('aria-modal', true);
    target.style.display = 'block';
}

function closeModal(e) {
    var targetElement = document.querySelector('[aria-modal="true"]');
    targetElement.classList.remove('show');
    targetElement.style.display = 'none';
    targetElement.removeAttribute('aria-modal');
    targetElement.setAttribute('aria-hidden', true);
}


//-----------------------------------------------------------
//              Kumpulan Fungsi Submit
//-----------------------------------------------------------

function kirimData(e) {
    e.preventDefault();
    if (validasiNama() && validasiEmail() && validasiSubjek() && validasiPesan())
        document.forms['contact'].submit();
}

function konfirmasiPembayaran(e) {
    if (validasiDetailWeb() && validasiBuktiPembayaran())
        showModal();
}

//-----------------------------------------------------------
//              Fungsi HTML Sanitizer
//-----------------------------------------------------------

var tagBody = '(?:[^"\'>]|"[^"]*"|\'[^\']*\')*';

var tagOrComment = new RegExp(
    '<(?:'
    + '!--(?:(?:-*[^->])*--+|-?)'
    + '|script\\b' + tagBody + '>[\\s\\S]*?</script\\s*'
    + '|style\\b' + tagBody + '>[\\s\\S]*?</style\\s*'
    + '|/?[a-z]'
    + tagBody
    + ')>',
    'gi');

function removeTags(html) {
  var oldHtml;
  do {
    oldHtml = html;
    html = html.replace(tagOrComment, '');
  } while (html !== oldHtml);
  return html.replace(/</g, '&lt;');
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
    element.value = removeTags(element.value);

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
    element.value = removeTags(element.value);

    if (element.value == "") {
        errorMsg.textContent   = 'Pesan harus diisi!';
        errorMsg.style.display = 'block';

        return false;
    }
    
    errorMsg.textContent   = '';
    errorMsg.style.display = 'none';

    return true;
}

function validasiDetailWeb() {
    let element  = document.querySelector('#detailWeb');
    let errorMsg = document.querySelector('#detailWebError');
    element.value = removeTags(element.value);

    if (!element) return true;

    if (element.value == "") {
        errorMsg.textContent   = 'Pesan harus diisi!';
        errorMsg.style.display = 'block';

        return false;
    }
    
    errorMsg.textContent   = '';
    errorMsg.style.display = 'none';

    return true;
}

function validasiBuktiPembayaran() {
    let element  = document.querySelector('#buktiPembayaran');
    let errorMsg = document.querySelector('#buktiPembayaranError');

    if (element.value == "") {
        errorMsg.textContent   = 'Bukti pembayaran harus diisi!';
        errorMsg.style.display = 'block';

        return false;
    }
    
    errorMsg.textContent   = '';
    errorMsg.style.display = 'none';

    return true;
}