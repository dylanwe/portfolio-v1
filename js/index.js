// Add smooth scrolling to all links
$("a").on('click', function(event) {

    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {
      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 800, function(){
   
        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    } // End if
});

$(".skills-slider").slick({
    dots: true,
    autoplay: true,
    vertical: true,
    autoplaySpeed: 2000,
    slidesToShow: 2,
    slidesToScroll: 1,
    draggable: false,
    arrows : false,
    pauseOnFocus: false,
    responsive: [
    {
        breakpoint: 790,
        settings: {
            vertical: false,
            slidesToShow: 1,
            slidesToScroll: 1,
            centerMode: false,
            infinite: true,
            autoplay: true,
            autoplaySpeed: 2000,
        }
    },]
});
$('#projects-slider').slick({
    infinite: false,
    slidesToShow: 3,
    slidesToScroll: 1,
    responsive: [
        {
        breakpoint: 992,
        settings: {
            slidesToShow: 2,
            slidesToScroll: 1,
            centerMode: false,
            infinite: true,
            autoplay: true,
            autoplaySpeed: 2000,
        }
    },
    {
        breakpoint: 790,
        settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
            centerMode: false,
            infinite: true,
            autoplay: true,
            autoplaySpeed: 2000,
        }
    }]
});