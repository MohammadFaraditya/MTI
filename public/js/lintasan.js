//Function Lintasan Keberangkatan
let lintasanKeberangkatanCounter = 1;

function addLintasanKeberangkatan() {
    const lintasanForm = document.getElementById('lintasankeberangkatan-form');
    const input = document.createElement('div');
    input.innerHTML = `
        <div class="mb-3">
            <input type="text" name="lintasankeberangkatan[${lintasanKeberangkatanCounter}]"
                class="form-control bg-gray-100 border border-gray-200 rounded"
                placeholder="Masukkan Lintasan ${lintasanKeberangkatanCounter + 1}">
            <button type="button"
                class="bg-red-500 hover:bg-red-600 text-white text-sm font-bold py-1 px-2 border-b-4 border-red-500 hover:border-red-500 rounded"
                onclick="removeLintasanKeberangkatan(this)">Hapus</button>
        </div>
    `;
    lintasanForm.appendChild(input);

    lintasanKeberangkatanCounter++;

    updateLintasanKeberangkatanCounter();
}

function removeLintasanKeberangkatan(element) {
    const parentDiv = element.parentElement;
    parentDiv.remove();

    updateLintasanKeberangkatanCounter();
}

function updateLintasanKeberangkatanCounter() {
    const lintasanInputs = document.getElementsByName('lintasankeberangkatan[]');
    lintasanInputs.forEach((input, index) => {
        input.placeholder = `Masukkan Lintasan ${index + 1}`;
    });
}


//Function Lintasan Tujuan
let lintasanTujuanCounter = 1;

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

