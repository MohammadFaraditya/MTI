let buttonGajiSopir = document.getElementById("ButtonSopir");
let formGajiSopir = document.getElementById("FormGajiSopir");

let buttonGajiKernet = document.getElementById("ButtonKernet");
let formGajiKernet = document.getElementById("FormGajiKernet");

let cancelSopir = document.getElementById('cancelFormSopir');
let cancelKernet = document.getElementById('cancelFormKernet');
let isHiddenSopir = true;
let isHiddenKernet = true; // Perbaikan: isHiddenKernet dengan huruf besar 'K'

buttonGajiSopir.addEventListener("click", function () {
    if (isHiddenSopir) {
        formGajiSopir.style.display = "block";
        formGajiSopir.style.zIndex = "100";
        anime({
            targets: formGajiSopir,
            translateY: [-50, 0],
            opacity: [0, 1],
            duration: 500,
            easing: 'easeOutExpo'
        });
    }
    isHiddenSopir = false;
})

buttonGajiKernet.addEventListener("click", function () {
    if (isHiddenKernet) { // Perbaikan: isHiddenKernet dengan huruf besar 'K'
        formGajiKernet.style.display = "block";
        formGajiKernet.style.zIndex = "100";
        anime({
            targets: formGajiKernet,
            translateY: [-50, 0],
            opacity: [0, 1],
            duration: 500,
            easing: 'easeOutExpo'
        });
    }
    isHiddenKernet = false; // Perbaikan: isHiddenKernet dengan huruf besar 'K'
})

cancelSopir.addEventListener("click", function (event) {
    event.preventDefault();
    anime({
        targets: formGajiSopir,
        translateY: [0, -50],
        opacity: [1, 0],
        duration: 500,
        easing: 'easeOutExpo',
        complete: function (anim) {
            formGajiSopir.style.display = "none";
        }
    });
    isHiddenSopir = true;
});

cancelKernet.addEventListener("click", function (event) {
    event.preventDefault();
    anime({
        targets: formGajiKernet,
        translateY: [0, -50],
        opacity: [1, 0],
        duration: 500,
        easing: 'easeOutExpo',
        complete: function (anim) {
            formGajiKernet.style.display = "none";
        }
    });
    isHiddenKernet = true; // Perbaikan: isHiddenKernet dengan huruf besar 'K'
});
