$(document).ready(function () {
    // Initialize Slick slider
    $('.slider').slick({
        slidesToShow: 1, // Number of slides visible at the same time
        slidesToScroll: 1, // Number of slides to scroll on navigation
        arrows: true, // Show navigation arrows
        dots: true, // Show pagination dots
        infinite: true, // Infinite loop
        draggable: true, // Enable dragging
        autoplay: false, // Set to true to enable autoplay
        autoplaySpeed: 2000, // Autoplay interval in milliseconds (if autoplay is true)
    });
});