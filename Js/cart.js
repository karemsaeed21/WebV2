// Assuming you have a cart object
let cart = [];

// Get all 'Add to Cart' buttons
let addToCartButtons = document.querySelectorAll('.add-to-cart');

// Add an event listener to each button
addToCartButtons.forEach(button => {
    button.addEventListener('click', function(event) {
        // Get the product card this button belongs to
        let productCard = event.target.parentElement;

        // Get the product name and price
        let productName = productCard.querySelector('h3').innerText;
        let productPrice = productCard.querySelector('p').innerText;

        // Add the product to the cart
        cart.push({
            name: productName,
            price: productPrice
        });

        // Log the updated cart
        console.log(cart);
    });
});