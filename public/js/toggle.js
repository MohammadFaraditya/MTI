// sidenav transition-burger

let sidebar = document.getElementById('menuAside');
let buttonburger = document.getElementById('buttonBurger')
let buttonClose = document.getElementById('buttonClose')

buttonburger.addEventListener('click', function () {
    sidebar.classList.remove('translate-x-96', 'bg-transparent');
    sidebar.classList.add('translate-x-28', 'bg-white')
});

buttonClose.addEventListener('click', function () {
    sidebar.classList.remove('translate-x-28', 'bg-white')
    sidebar.classList.add('translate-x-96', 'bg-transparent');
})


let profileButton = document.getElementById("profileButton");
let profileDropdown = document.getElementById("profileDropdown");

// Inisialisasi status tersembunyi
let isHidden = true;

// Tambahkan event listener ke tombol profile
profileButton.addEventListener("click", function () {
    // Periksa status tersembunyi
    if (isHidden) {
        // Jika tersembunyi, tampilkan dengan efek seperti air terjun
        profileDropdown.style.display = "block";
        anime({
            targets: profileDropdown,
            translateY: [-50, 0], // Geser elemen dari atas ke bawah
            opacity: [0, 1], // Ubah opacity dari 0 (sembunyi) menjadi 1 (tampil)
            duration: 500, // Durasi animasi dalam milidetik
            easing: 'easeOutExpo' // Efek animasi
        });
    } else {
        // Jika sudah terlihat, sembunyikan dengan efek sebaliknya
        anime({
            targets: profileDropdown,
            translateY: [0, -50], // Geser elemen dari bawah ke atas
            opacity: [1, 0], // Ubah opacity dari 1 (tampil) menjadi 0 (sembunyi)
            duration: 500, // Durasi animasi dalam milidetik
            easing: 'easeOutExpo', // Efek animasi
            complete: function (anim) {
                profileDropdown.style.display = "none"; // Setelah animasi selesai, sembunyikan elemen
            }
        });
    }

    // Ubah status tersembunyi
    isHidden = !isHidden;
});





