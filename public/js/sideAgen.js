const urlJadwal = document.getElementById('urlJadwal');
const logoJadwal = document.getElementById('logoJadwal');

const urlPesanan = document.getElementById('urlPesanan');
const logoPesanan = document.getElementById('logoPesanan');

const urlStatus = document.getElementById('urlStatus');
const logoStatus = document.getElementById('logoStatus');


const urlPendapatan = document.getElementById('urlPendapatan');
const logoPendapatan = document.getElementById('logoPendapatan');

let url = window.location.href;

if (url.includes("/agen/pesanan-tiket")) {
    urlPesanan.classList.add('bg-white', 'font-semibold', 'text-slate-700', 'shadow-soft-xl');
    logoPesanan.classList.remove('bg-white');
    logoPesanan.classList.add('bg-black');

} else if (url.includes("/agen/status-bus")) {
    urlStatus.classList.add('bg-white', 'font-semibold', 'text-slate-700', 'shadow-soft-xl');
    logoStatus.classList.remove('bg-white');
    logoStatus.classList.add('bg-black');

} else if (url.includes("/agen/pendapatan")) {
    urlPendapatan.classList.add('bg-white', 'font-semibold', 'text-slate-700', 'shadow-soft-xl');
    logoPendapatan.classList.remove('bg-white');
    logoPendapatan.classList.add('bg-black');

} else if (url.includes("/agen")) {
    urlJadwal.classList.add('bg-white', 'font-semibold', 'text-slate-700', 'shadow-soft-xl');
    logoJadwal.classList.remove('bg-white');
    logoJadwal.classList.add('bg-black');
}