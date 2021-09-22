const navbar = document.querySelector('.navbar')
window.addEventListener('scroll', function() {
  navbar.classList.toggle('sticky', window.scrollY > 0);
});


var typed3 = new Typed('#typed', {
  strings: ['Web Programming', 'Web Design', 'Mobile App'],
  typeSpeed: 50,
  backSpeed: 50,
  smartBackspace: true, // this is a default
  loop: true
});
// glider
window.addEventListener('load', function () {
  window.glides = new Glider(document.getElementById('blog-series'), {
    slidesToShow: 3,
    slidesToScroll: 5,
    draggable: true,
    dots: '#dots2',
    arrows: {
      prev: '#glider-prev-2',
      next: '#glider-next-2'
    }
  })
});

var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
  return new bootstrap.Tooltip(tooltipTriggerEl)
})
console.log(tooltipTriggerList)