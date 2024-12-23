

var swiperCategories = new Swiper(".categories__container", {
    spaceBetween: 15,
    loop: true,
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },

    breakpoints: {
        640: {
            slidesPerView: 2,
            spaceBetween: 20,
        },
        768: {
            slidesPerView: 4,
            spaceBetween: 40,
        },
        1100: {
            slidesPerView: 6,
            spaceBetween: 24,
        },
    },
});


function sendImage() {
    var input = document.getElementById('productImage');
    var file = input.files[0];

    if (file) {
        var reader = new FileReader();
        reader.onload = function(e) {
            // Save the image data to sessionStorage
            sessionStorage.setItem('imageData', e.target.result);

            // Navigate to the receiving page
            window.location.href = 'cart.html';
        };

        reader.readAsDataURL(file);
    } else {
        alert('Please select an image.');
    }
}


