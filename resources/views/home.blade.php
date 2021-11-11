<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/testi.css">
    {{-- <link rel="stylesheet" href="/css/glider.css"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/glider-js/1.6.6/glider.min.css" integrity="sha512-YM6sLXVMZqkCspZoZeIPGXrhD9wxlxEF7MzniuvegURqrTGV2xTfqq1v9FJnczH+5OGFl5V78RgHZGaK34ylVg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
      
      .next::after {
    background-image: url(../image/icon-next.svg);
}

.prev::after {
    background-image: url(../image/icon-prev.svg);
}
    </style>

    
    <title>Hello, world!</title>
  </head>
  <body>
    <main id="app">
      <router-view></router-view>
      <footer-component></footer-component>
    </main>

    <script src="https://kit.fontawesome.com/bfdfedea1a.js" crossorigin="anonymous"></script>
    <script src="/js/app.js"></script>
    {{-- <script src="/js/glider.min.js"></script> --}}
{{-- 
    
    <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>
    <script>
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


      var typed3 = new Typed("#typed", {
          strings: ["Web Programming", "Web Design", "Mobile App"],
          typeSpeed: 50,
          backSpeed: 50,
          smartBackspace: true, // this is a default
          loop: true,
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
    </script> --}}
  </body>
</html>
