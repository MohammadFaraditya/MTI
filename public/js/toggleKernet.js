document.addEventListener('DOMContentLoaded', () => {
    const menuAside = document.getElementById('menuAside');
    const buttonBurger = document.getElementById('buttonBurger');
    const buttonClose = document.getElementById('buttonClose');
    const adminButton = document.getElementById('adminButton');
    const adminDropdown = document.getElementById('adminDropdown');

    console.log('Elements:', { menuAside, buttonBurger, buttonClose, adminButton, adminDropdown });

    buttonBurger?.addEventListener('click', () => {
        console.log('Burger button clicked');
        menuAside.classList.toggle('translate-x-28');
        menuAside.classList.toggle('translate-x-96');
    });

    buttonClose?.addEventListener('click', () => {
        console.log('Close button clicked');
        menuAside.classList.add('translate-x-96');
        menuAside.classList.remove('translate-x-28');
    });

    adminButton?.addEventListener('click', () => {
        console.log('Admin button clicked');
        adminDropdown.classList.toggle('hidden');
    });
});
