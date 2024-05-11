//Function Lintasan Keberangkatan
let jumlahIDKeberangkatanDiv = document.querySelectorAll('[id^="jumlahIDKeberangkatan"]');
let lintasanKeberangkatanCounter = jumlahIDKeberangkatanDiv.length;


function addLintasanKeberangkatan() {
    const lintasanForm = document.getElementById('lintasankeberangkatan-form');
    const input = document.createElement('div');
    lintasanKeberangkatanCounter++;
    input.innerHTML = `
        <div class="mb-3 flex">
        <label for="Lintasan Tambahan" class="text-sm text-gray-700 block mb-1 font-medium">Lintasan Tambahan</label>
            <input type="text" name="keberangkatan[${lintasanKeberangkatanCounter - 1}]"
                class="form-control bg-gray-100 border border-gray-200 rounded ml-4"
                placeholder="Masukkan Lintasan Tambahan">
            <button type="button"
                class="bg-red-500 hover:bg-red-600 text-white text-sm font-bold py-1 px-2 border-b-4 border-red-500 hover:border-red-500 rounded"
                onclick="removeLintasanKeberangkatan(this)">Hapus</button>
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
    if (parentDiv) {
        parentDiv.parentNode.removeChild(parentDiv);
        updateLintasanKeberangkatanCounter();
    }
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
let lintasanTujuanCounter = document.getElementsByName('lintasantujuan[]').length;


function addLintasanTujuan() {
    const lintasanForm = document.getElementById('lintasantujuan-form');
    const input = document.createElement('div');
    input.innerHTML = `
        <div class="mb-3">
            <input type="text" name="lintasantujuan[${lintasanTujuanCounter}]"
                class="form-control bg-gray-100 border border-gray-200 rounded"
                placeholder="Masukkan Lintasan ${lintasanTujuanCounter + 1}">
            <button type="button"
                class="bg-red-500 hover:bg-red-600 text-white text-sm font-bold py-1 px-2 border-b-4 border-red-500 hover:border-red-500 rounded"
                onclick="removeLintasanTujuan(this)">Hapus</button>
        </div>
    `;
    lintasanForm.appendChild(input);

    lintasanTujuanCounter++;

    updateLintasanTujuanCounter();
}

function removeLintasanTujuan(element) {
    const parentDiv = element.parentElement;
    parentDiv.remove();

    updateLintasanTujuanCounter();
}

function updateLintasanTujuanCounter() {
    const lintasanInputs = document.getElementsByName('lintasantujuan[]');
    lintasanInputs.forEach((input, index) => {
        input.placeholder = `Masukkan Lintasan ${index + 1}`;
    });
}

