window.addEventListener('scroll', function() {
  var additionalSection = document.querySelector('#cuadros');
  var infoBoxes = additionalSection.querySelectorAll('.slide-in');
  var windowHeight = window.innerHeight;
  var sectionTop = additionalSection.getBoundingClientRect().top;
  var infoLink = document.querySelector('#infoxd');

  if (sectionTop < windowHeight) {
    infoBoxes.forEach(function(box, index) {
      setTimeout(function() {
        box.classList.add('visible');
      }, index * 200);
    });

    // Mostrar el elemento #infoxd después de que todos los cuadros se hayan deslizado
    setTimeout(function() {
      infoLink.style.opacity = '1';
    }, infoBoxes.length * 200 + 500); // Retraso adicional de 500 ms
  }
});

document.addEventListener("DOMContentLoaded", function() {
  // Función para el enlace "Informes"
  var linkInformes = document.querySelector('nav ul li:nth-child(1) a');
  linkInformes.addEventListener("click", function(event) {
      event.preventDefault(); 

      var targetId = "#cuadros";
      var targetElement = document.querySelector(targetId);

      if (targetElement) {
          var targetPosition = targetElement.getBoundingClientRect().top; 
          var startPosition = window.pageYOffset; 
          var distance = targetPosition; 
          var duration = 800; 
          var start = null;

          function step(timestamp) {
              if (!start) start = timestamp;
              var progress = timestamp - start;
              window.scrollTo(0, easeInOutQuad(progress, startPosition, distance, duration));
              if (progress < duration) window.requestAnimationFrame(step);
          }

          function smoothScroll() {
              window.requestAnimationFrame(step);
          }

          smoothScroll();
      }
  });

  // Función para el enlace "Noticias"
  var linkNoticias = document.querySelector('nav ul li:nth-child(2) a');
  linkNoticias.addEventListener("click", function(event) {
      event.preventDefault(); 

      var targetId = ".section-2";
      var targetElement = document.querySelector(targetId);

      if (targetElement) {
          var targetPosition = targetElement.getBoundingClientRect().top; 
          var startPosition = window.pageYOffset; 
          var distance = targetPosition; 
          var duration = 800; 
          var start = null;

          function step(timestamp) {
              if (!start) start = timestamp;
              var progress = timestamp - start;
              window.scrollTo(0, easeInOutQuad(progress, startPosition, distance, duration));
              if (progress < duration) window.requestAnimationFrame(step);
          }

          function smoothScroll() {
              window.requestAnimationFrame(step);
          }

          smoothScroll();
      }
  });

  // Función para el enlace "Tips"
  var linkTips = document.querySelector('nav ul li:nth-child(3) a');
  linkTips.addEventListener("click", function(event) {
      event.preventDefault(); 

      var targetId = ".section-3";
      var targetElement = document.querySelector(targetId);

      if (targetElement) {
          var targetPosition = targetElement.getBoundingClientRect().top; 
          var startPosition = window.pageYOffset; 
          var distance = targetPosition; 
          var duration = 800; 
          var start = null;

          function step(timestamp) {
              if (!start) start = timestamp;
              var progress = timestamp - start;
              window.scrollTo(0, easeInOutQuad(progress, startPosition, distance, duration));
              if (progress < duration) window.requestAnimationFrame(step);
          }

          function smoothScroll() {
              window.requestAnimationFrame(step);
          }

          smoothScroll();
      }
  });

  // Función para el enlace "Novedades"
  var linkNovedades = document.querySelector('nav ul li:nth-child(4) a');
  linkNovedades.addEventListener("click", function(event) {
      event.preventDefault(); 

      var targetId = ".section-4";
      var targetElement = document.querySelector(targetId);

      if (targetElement) {
          var targetPosition = targetElement.getBoundingClientRect().top; 
          var startPosition = window.pageYOffset; 
          var distance = targetPosition; 
          var duration = 800; 
          var start = null;

          function step(timestamp) {
              if (!start) start = timestamp;
              var progress = timestamp - start;
              window.scrollTo(0, easeInOutQuad(progress, startPosition, distance, duration));
              if (progress < duration) window.requestAnimationFrame(step);
          }

          function smoothScroll() {
              window.requestAnimationFrame(step);
          }

          smoothScroll();
      }
  });
});

function easeInOutQuad(t, b, c, d) {
  t /= d / 2;
  if (t < 1) return c / 2 * t * t + b;
  t--;
  return -c / 2 * (t * (t - 2) - 1) + b;
}




document.addEventListener("DOMContentLoaded", function() {
  const boxes = document.querySelectorAll('.box');

  boxes.forEach(box => {
    box.addEventListener('click', function() {
      if (!this.classList.contains('expanded')) {
        boxes.forEach(otherBox => {
          if (otherBox !== this) {
            otherBox.style.display = 'none'; // Oculta los otros cuadros
          }
        });
        this.classList.add('expanded');
        this.querySelector('.box-text').style.display = 'block'; // Muestra el texto del cuadro
      } else {
        boxes.forEach(otherBox => {
          otherBox.style.display = 'block'; // Vuelve a mostrar los otros cuadros
        });
        this.classList.remove('expanded');
        this.querySelector('.box-text').style.display = 'none'; // Oculta el texto del cuadro
      }
    });
  });
});
