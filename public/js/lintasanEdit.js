//Function Lintasan Keberangkatan
let jumlahIDKeberangkatanDiv = document.querySelectorAll('[id^="jumlahIDKeberangkatan"]');
let lintasanKeberangkatanCounter = jumlahIDKeberangkatanDiv.length;


function addLintasanKeberangkatan() {
    const lintasanForm = document.getElementById('lintasankeberangkatan-form');
    const input = document.createElement('div');
    lintasanKeberangkatanCounter++;
    input.innerHTML = `
        <div class="mb-3 flex" id="tambahan${lintasanKeberangkatanCounter}">
        <label for="Lintasan Tambahan">Lintasan Tambahan ${lintasanKeberangkatanCounter}</label>
            <input type="text" name="keberangkatan[${lintasanKeberangkatanCounter}]"
                class="form-control bg-gray-100 border border-gray-200 rounded ml-4"
                id="keberangkatan${lintasanKeberangkatanCounter}"
                placeholder="Masukkan Lintasan Tambahan">
            <input type="time" name="jamkeberangkatan${lintasanKeberangkatanCounter}"
                class="form-control bg-gray-100 border border-gray-200 rounded ml-4"
                id="jamkeberangkatan${lintasanKeberangkatanCounter}"
                placeholder="Masukkan Jam Keberangkatan Tambahan">
            <button type="button"
                class="bg-red-500 hover:bg-red-600 text-white text-sm font-bold py-1 px-2 border-b-4 border-red-500 hover:border-red-500 rounded ml-2"
                onclick="removeLintasanTambahan(${lintasanKeberangkatanCounter})">Hapus</button>
        </div>
    `;
    lintasanForm.appendChild(input);
}

function removeLintasanKeberangkatan(uniqueId) {
    // Hapus nilai input
    document.getElementById('keberangkatan' + uniqueId).value = null;
    document.getElementById('jamkeberangkatan' + uniqueId).value = null;

    // Hapus tampilan div
    const parentDiv = document.getElementById('jumlahIDKeberangkatan' + uniqueId);
    console.log(parentDiv);
    if (parentDiv) {
        parentDiv.style.display = 'none';
        updateLintasanKeberangkatanCounter();
    }
}

function removeLintasanTambahan(uniqueId) {
    let divtambahan = document.getElementById('tambahan' + uniqueId);
    divtambahan.remove();
}




function updateLintasanKeberangkatanCounter() {
    const lintasanInputs = document.getElementsByName('lintasankeberangkatan[]');
    lintasanKeberangkatanCounter = lintasanInputs.length; // Update counter to the number of remaining elements

    lintasanInputs.forEach((input, index) => {
        input.placeholder = `Masukkan Lintasan ${index + 1}`;
        input.name = `lintasankeberangkatan[${index}]`; // Update name attribute
    });
}




//Function Lintasan Tujuan
let jumlahIDTujuanDiv = document.querySelectorAll('[id^="jumlahIDTujuan"]');
let lintasanTujuanCounter = jumlahIDTujuanDiv.length + 1;

function addLintasanTujuan() {
    const lintasanForm = document.getElementById('lintasantujuan-form');
    const input = document.createElement('div');
    input.innerHTML = `
        <div class="mb-3 flex" id="tambahantujuan${lintasanTujuanCounter}">
        <label for="Lintasan Tambahan" >Lintasan Tambahan ${lintasanTujuanCounter}</label>
            <input type="text" name="tujuan[${lintasanTujuanCounter}]"
                class="form-control bg-gray-100 border border-gray-200 rounded ml-4"
                id="tujuan${lintasanTujuanCounter}"
                placeholder="Masukkan Lintasan Tambahan">
            <input type="time" name="jamkedatangan${lintasanTujuanCounter}"
                class="form-control bg-gray-100 border border-gray-200 rounded ml-4"
                id="jamkedatangan${lintasanTujuanCounter}"
                placeholder="Masukkan Jam Kedatangan Tambahan">
            <button type="button"
                class="bg-red-500 hover:bg-red-600 text-white text-sm font-bold py-1 px-2 border-b-4 border-red-500 hover:border-red-500 rounded ml-1"
                onclick="removeLintasanTujuanTambahan(${lintasanTujuanCounter})">Hapus</button>
        </div>
    `;
    lintasanForm.appendChild(input);

    lintasanTujuanCounter++;

    updateLintasanTujuanCounter();
}

function removeLintasanTujuan(uniqueId) {
    // Hapus nilai input
    document.getElementById('tujuan' + uniqueId).value = null;
    document.getElementById('jamkedatangan' + uniqueId).value = null;

    // Hapus tampilan div
    const parentDiv = document.getElementById('jumlahIDTujuan' + uniqueId);
    console.log(parentDiv);
    if (parentDiv) {
        parentDiv.style.display = 'none';
        updateLintasanTujuanCounter();
    }
}

function removeLintasanTujuanTambahan(uniqueId) {
    let divtambahan = document.getElementById('tambahantujuan' + uniqueId);
    divtambahan.remove();
}

function updateLintasanTujuanCounter() {
    const lintasanInputs = document.getElementsByName('lintasantujuan[]');
    lintasanInputs.forEach((input, index) => {
        input.placeholder = `Masukkan Lintasan ${index + 1}`;
    });
}

