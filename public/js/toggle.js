// sidenav transition-burger

let sidebar = document.getElementById('menuAside');
let buttonburger = document.getElementById('buttonBurger')
let buttonClose = document.getElementById('buttonClose')

buttonburger.addEventListener('click', function () {
    sidebar.classList.remove('-translate-x-full', 'bg-transparent');
    sidebar.classList.add('translate-x-0', 'bg-white')
});

buttonClose.addEventListener('click', function () {
    sidebar.classList.remove('translate-x-0', 'bg-white')
    sidebar.classList.add('-translate-x-full', 'bg-transparent');
})

