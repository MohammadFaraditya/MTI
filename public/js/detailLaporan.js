document.addEventListener('DOMContentLoaded', function () {
    console.log('DOM fully loaded and parsed');

    let halamanDetail = document.getElementById('detailLaporan');
    let buttonCloseDetail = document.getElementById('buttonDetailClose');

    document.querySelectorAll('.buttonDetail').forEach(button => {
        button.addEventListener('click', function () {
            console.log('Button clicked');
            let laporanId = this.getAttribute('data-id');
            let url = `/admin/laporan-operasional/rincian/${laporanId}`;
            console.log('Fetching data from URL:', url);
            fetch(url)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok: ' + response.statusText);
                    }
                    return response.json();
                })
                .then(data => {
                    console.log('Data received:', data);
                    document.getElementById('rincianIdLaporan').textContent = `: ${data.ID_Laporan_Operasional}`;
                    document.getElementById('rincianTanggal').textContent = `: ${data.Tanggal}`;
                    document.getElementById('rincianIdTugas').textContent = `: ${data.ID_Tugas}`;
                    document.getElementById('rincianJumlahPesanan').textContent = `: ${data.Jumlah_Pesanan}`;
                    document.getElementById('rincianJumlahTiket').textContent = `: ${data.Jumlah_Tiket}`;
                    document.getElementById('rincianPendapatanTiket').textContent = `: ${data.Jumlah_Pendapatan_Tiket}`;
                    document.getElementById('rincianBiayaPerjalanan').textContent = `: ${data.Biaya_Perjalanan}`;
                    document.getElementById('rincianBiayaGaji').textContent = `: ${data.Biaya_Gaji}`;
                    document.getElementById('rincianTotalPendapatan').textContent = `: ${data.Total_Pendapatan}`;
                    halamanDetail.classList.remove('hidden');
                    halamanDetail.classList.add('block');
                })

                .catch(error => {
                    console.error('Fetch error:', error);
                });
        });
    });

    buttonCloseDetail.addEventListener('click', function () {
        console.log('Closing detail view');
        halamanDetail.classList.remove('block');
        halamanDetail.classList.add('hidden');
    });
});
