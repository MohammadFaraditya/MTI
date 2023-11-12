// Cari elemen dengan id "urlid" dan "logo"

// Mendapatkan elemen dengan ID "urlAdmin" dan "logoAdmin"
const urlAdmin = document.getElementById('urlAdmin');
const logoAdmin = document.getElementById('logoAdmin');

const urlJadwalPerjalanan = document.getElementById('urlJadwalPerjalanan');
const logoJadwalPerjalanan = document.getElementById('logoJadwalPerjalanan');

const urlDataPerjalanan = document.getElementById('urlDataPerjalanan');
const logoDataPerjalanan = document.getElementById('logoDataPerjalanan');

const urlLaporanOperasional = document.getElementById('urlLaporanOperasional');
const logoLaporanOperasional = document.getElementById('logoLaporanOperasional');

const urlDataTugas = document.getElementById('urlDataTugas');
const logoDataTugas = document.getElementById('logoDataTugas');

const urlBus = document.getElementById('urlBus');
const logoBus = document.getElementById('logoBus');

const urlSopir = document.getElementById('urlSopir');
const logoSopir = document.getElementById('logoSopir');

const urlKernet = document.getElementById('urlKernet');
const logoKernet = document.getElementById('logoKernet');

const urlAgen = document.getElementById('urlAgen');
const logoAgen = document.getElementById('logoAgen');

const urlGaji = document.getElementById('urlGaji');
const logoGaji = document.getElementById('logoGaji');

const urlKomisiAgen = document.getElementById('urlKomisiAgen');
const logoKomisiAgen = document.getElementById('logoKomisiAgen');

let url = window.location.href;


if (url.includes("/admin/jadwal-perjalanan")) {
    urlJadwalPerjalanan.classList.add('bg-white', 'font-semibold', 'text-slate-700', 'shadow-soft-xl');
    logoJadwalPerjalanan.classList.remove('bg-white');
    logoJadwalPerjalanan.classList.add('bg-black');

} else if (url.includes("/admin/data-perjalanan")) {
    urlDataPerjalanan.classList.add('bg-white', 'font-semibold', 'text-slate-700', 'shadow-soft-xl');
    logoDataPerjalanan.classList.remove('bg-white');
    logoDataPerjalanan.classList.add('bg-black');

} else if (url.includes("/admin/laporan-operasional")) {
    urlLaporanOperasional.classList.add('bg-white', 'font-semibold', 'text-slate-700', 'shadow-soft-xl');
    logoLaporanOperasional.classList.remove('bg-white');
    logoLaporanOperasional.classList.add('bg-black');

} else if (url.includes("/admin/data-tugas")) {
    urlDataTugas.classList.add('bg-white', 'font-semibold', 'text-slate-700', 'shadow-soft-xl');
    logoDataTugas.classList.remove('bg-white');
    logoDataTugas.classList.add('bg-black');

} else if (url.includes("/admin/bus")) {
    urlBus.classList.add('bg-white', 'font-semibold', 'text-slate-700', 'shadow-soft-xl');
    logoBus.classList.remove('bg-white');
    logoBus.classList.add('bg-black');

} else if (url.includes("/admin/sopir")) {
    urlSopir.classList.add('bg-white', 'font-semibold', 'text-slate-700', 'shadow-soft-xl');
    logoSopir.classList.remove('bg-white');
    logoSopir.classList.add('bg-black');

} else if (url.includes("/admin/kernet")) {
    urlKernet.classList.add('bg-white', 'font-semibold', 'text-slate-700', 'shadow-soft-xl');
    logoKernet.classList.remove('bg-white');
    logoKernet.classList.add('bg-black');

} else if (url.includes("/admin/agen")) {
    urlAgen.classList.add('bg-white', 'font-semibold', 'text-slate-700', 'shadow-soft-xl');
    logoAgen.classList.remove('bg-white');
    logoAgen.classList.add('bg-black');

} else if (url.includes("/admin/gaji")) {
    urlGaji.classList.add('bg-white', 'font-semibold', 'text-slate-700', 'shadow-soft-xl');
    logoGaji.classList.remove('bg-white');
    logoGaji.classList.add('bg-black');

} else if (url.includes("/admin/komisi-agen")) {
    urlKomisiAgen.classList.add('bg-white', 'font-semibold', 'text-slate-700', 'shadow-soft-xl');
    logoKomisiAgen.classList.remove('bg-white');
    logoKomisiAgen.classList.add('bg-black');

} else if (url.includes("/admin")) {
    urlAdmin.classList.add('bg-white', 'font-semibold', 'text-slate-700', 'shadow-soft-xl');
    logoAdmin.classList.remove('bg-white');
    logoAdmin.classList.add('bg-black');
}



// buttonAdmin.addEventListener('click', function () {
//     urlAdmin.classList.add('bg-white', 'font-semibold', 'text-slate-700', 'shadow-soft-xl');
//     logoAdmin.classList.remove('bg-white');
//     logoAdmin.classList.add('bg-black');
// });

// buttonJadwalPerjalanan.addEventListener('click', function () {
//     urlJadwalPerjalanan.classList.add('bg-white', 'font-semibold', 'text-slate-700', 'shadow-soft-xl');
//     logoJadwalPerjalanan.classList.remove('bg-white');
//     logoJadwalPerjalanan.classList.add('bg-black');
// });

