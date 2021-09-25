//const tooltipTriggerList = [].slice.call//(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
//const tooltipList = tooltipTriggerList.map//(function (tooltipTriggerEl) {
////})
//console.log(tooltipTriggerList)

const navbar = document.querySelector('.navbar')
window.addEventListener('scroll', function() {
  navbar.classList.toggle('sticky', window.scrollY > 0);
});

const next = document.querySelector('.next');
const prev = document.querySelector('.prev');
const slides = document.querySelectorAll('.slide');

let index = 0;
display(index);
function display (index) {
  slides.forEach((slide) => {
    slide.style.display = 'none';
  });
  slides[index].style.display = 'flex';
}

function nextSlide () {
  index++;
  if (index > slides.length - 1) {
    index = 0;
  }
  display(index);
}
function prevSlide () {
  index--;
  if (index < 0) {
    index = slides.length - 1;
  }
  display(index);
}

next.addEventListener('click', nextSlide);
prev.addEventListener('click', prevSlide);


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