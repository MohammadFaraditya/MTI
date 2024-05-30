const urlTugas = document.getElementById('urlTugas');
const logoTugas = document.getElementById('logoTugas');

const urlPendapatan = document.getElementById('urlPendapatan');
const logoPendapatan = document.getElementById('logoPendapatan');

let url = window.location.href;

if (url.includes("/sopir/tambah-tugas")) {
    urlTugas.classList.add('bg-white', 'font-semibold', 'text-slate-700', 'shadow-soft-xl');
    logoTugas.classList.remove('bg-white');
    logoTugas.classList.add('bg-black');
} else if (url.includes("/sopir/pendapatan")) {
    urlPendapatan.classList.add('bg-white', 'font-semibold', 'text-slate-700', 'shadow-soft-xl');
    logoPendapatan.classList.remove('bg-white');
    logoPendapatan.classList.add('bg-black');
}