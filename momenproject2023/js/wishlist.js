function addToWishlist() {
    // Get the product image source
    const productImageSrc = document.getElementById('productImage').src;

    // Save the product image source to sessionStorage
    sessionStorage.setItem('wishlistImage', productImageSrc);

    // Redirect to the wishlist page
    window.location.href = 'home_page.html';
}

// Check if there's a product image in sessionStorage to display on the wishlist page
const wishlistImageContainer = document.getElementById('wishlistImageContainer');
const wishlistImageSrc = sessionStorage.getItem('wishlistImage');

if (wishlistImageSrc) {
    // Display the product image in the wishlist
    wishlistImageContainer.innerHTML = `<img src="${wishlistImageSrc}" alt="Product in Wishlist">`;
}
