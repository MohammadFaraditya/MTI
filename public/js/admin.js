// Ambil elemen tombol admin dan dropdown admin
let adminButton = document.getElementById("adminButton");
let adminDropdown = document.getElementById("adminDropdown");


// Inisialisasi status tersembunyi
let isHidden = true;

// Tambahkan event listener ke tombol admin
adminButton.addEventListener("click", function () {
    // Periksa status tersembunyi
    if (isHidden) {
        // Jika tersembunyi, tampilkan dengan efek seperti air terjun
        adminDropdown.style.display = "block";
        anime({
            targets: adminDropdown,
            translateY: [-50, 0], // Geser elemen dari atas ke bawah
            opacity: [0, 1], // Ubah opacity dari 0 (sembunyi) menjadi 1 (tampil)
            duration: 500, // Durasi animasi dalam milidetik
            easing: 'easeOutExpo' // Efek animasi
        });
    } else {
        // Jika sudah terlihat, sembunyikan dengan efek sebaliknya
        anime({
            targets: adminDropdown,
            translateY: [0, -50], // Geser elemen dari bawah ke atas
            opacity: [1, 0], // Ubah opacity dari 1 (tampil) menjadi 0 (sembunyi)
            duration: 500, // Durasi animasi dalam milidetik
            easing: 'easeOutExpo', // Efek animasi
            complete: function (anim) {
                adminDropdown.style.display = "none"; // Setelah animasi selesai, sembunyikan elemen
            }
        });
    }

    // Ubah status tersembunyi
    isHidden = !isHidden;


});

