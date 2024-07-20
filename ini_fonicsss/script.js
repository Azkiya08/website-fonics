let loginform = document.querySelector('.login-form');
let navbar = document.querySelector('.navbar');

// Menghapus transformasi teks pada elemen input
document.addEventListener("DOMContentLoaded", function() {
    var inputs = document.querySelectorAll('input[type="text"], input[type="email"], input[type="password"]');
    inputs.forEach(function(input) {
        input.addEventListener("input", function() {
            this.value = this.value.toLowerCase(); // Mengubah teks menjadi lowercase setiap kali pengguna mengetik
        });
    });
});


document.querySelector('#login-btn').onclick = () =>{
    loginform.classList.toggle('active');
    navbar.classList.remove('active');
}

document.querySelector('#menu').onclick = () =>{
    navbar.classList.toggle('active');
    loginform.classList.remove('active');
}

window.onscroll = () =>{
    navbar.classList.remove('active');
    loginform.classList.remove('active');
}

var swiper = new Swiper(".review-slider", {
    loop:true,
    spaceBetween: 20,
    grabCursor:true,
    centeredSlides: true,
    pagination: {
        el: '.swiper-pagination',
    },
    breakpoints: {
        0:{
            slidesPerView: 1,
        },
        768:{
            slidesPerView: 2,
        },
        991:{
            slidesPerView: 3,
        },
    },
});