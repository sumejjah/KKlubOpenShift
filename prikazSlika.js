carousel = (function(){

  // citanje potrebnih elemenata
  var box = document.querySelector('.carouselbox');
  var next = box.querySelector('.sljedeca');
  var prev = box.querySelector('.prethodni');

  // definisanje globalnog brojaca
  var brojac = 0;
  var items = box.querySelectorAll('.sadrzaj li');
  var amount = items.length;
  var current = items[0];

  box.classList.add('active');

  // kretanje kroz carousel

  function navigate(direction) {

    // sakrij prethodnu sliku
    current.classList.remove('current');
    
    // izracunaj novu
    brojac = (brojac + direction) % amount;
    brojac = brojac < 0 ? amount - 1 : brojac;

    /* postavi novi element (sliku)*/
    current = items[brojac];
    current.classList.add('current');
  }

  // povezivanje button-a sa funkcionalnostima
  next.addEventListener('click', function(ev) {
    navigate(1);
  });
  prev.addEventListener('click', function(ev) {
    navigate(-1);
  });

  // prikazi  prvi element
  // (kada je direction 0. brojac brojac se ne mijenja)
  navigate(0);

})();