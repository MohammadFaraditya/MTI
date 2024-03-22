// Ambil elemen tombol "Ubah Komisi Agen" dan form untuk mengubah komisi
let buttonKomisi = document.getElementById("ButtonKomisi");
let formKomisi = document.getElementById("FormKomisi");
let cancel = document.getElementById('cancelForm'); // Pastikan ID ini ada di HTML

// Inisialisasi status tersembunyi
let isHidden = true;

// Tambahkan event listener ke tombol "Ubah Komisi Agen"
buttonKomisi.addEventListener("click", function () {
    if (isHidden) {
        formKomisi.style.display = "block";
        formKomisi.style.zIndex = "100";
        anime({
            targets: formKomisi,
            translateY: [-50, 0],
            opacity: [0, 1],
            duration: 500,
            easing: 'easeOutExpo'
        });
    }
    isHidden = false;
});

// Tambahkan event listener ke tombol "Cancel"
cancel.addEventListener("click", function (event) {
    event.preventDefault();
    anime({
        targets: formKomisi,
        translateY: [0, -50],
        opacity: [1, 0],
        duration: 500,
        easing: 'easeOutExpo',
        complete: function (anim) {
            formKomisi.style.display = "none";
        }
    });
    isHidden = true;
});
