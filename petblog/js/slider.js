//index slideu, nastavíme na 1
var idx = 1;
//časovač pre automatické posúvanie
var slideTimer;
//interval medzi slidemi v milisekundách (5 sekúnd)
var slideInterval = 5000;
//príznak, či je automatické posúvanie aktívne
var autoSlideActive = true;

//funkcia na zobrazenie slidu
function show(n) {
  //zastavíme automatické posúvanie počas manuálnej navigácie
  clearInterval(slideTimer);
  
  // prejdem dlzkou slideov
  var slides = document.getElementsByClassName("slide");
  //ak je n vacsie ako dlzka (som na konci, nastavim sa zas na prvy slide)
  if (n > slides.length){
    idx = 1;
  }
  //ak som za koncom, nastavim sa na posledny
  if (n < 1) {
    idx = slides.length;
  }
  // prechadzam slidemi, skryjem ich
  for (var i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  
  //zobrazíme aktuálny slide
  slides[idx-1].style.display = "block";
  
  //ak je automatické posúvanie aktívne, obnovíme časovač
  if (autoSlideActive) {
    startAutoSlide();
  }
}

//metoda na dalsi slide, v zavislosti od toho, ci klikame vpravo alebo vlavo (nasledujuci alebo predosly slide) do nej pojde pozitivne alebo negativne cislo
function nextSlide(n) {
  show(idx += n);
}

//funkcia na spustenie automatického posúvania
function startAutoSlide() {
  //vyčistíme existujúci časovač
  clearInterval(slideTimer);
  //nastavíme nový časovač
  slideTimer = setInterval(function() {
    idx++;
    show(idx);
  }, slideInterval);
}

//inicializácia po načítaní dokumentu
document.addEventListener("DOMContentLoaded", function() {
  //zobrazíme prvý slide
  show(idx);
  
  //spustíme automatické posúvanie
  startAutoSlide();
  
  //pridáme event listenery pre manuálnu navigáciu
  var prev = document.getElementById("prev");
  if (prev) {
    prev.addEventListener("click", function(){
      nextSlide(-1);
    });
  }
  
  var next = document.getElementById("next");
  if (next) {
    next.addEventListener("click", function(){
      nextSlide(1);
    });
  }
  
  //pozastavíme automatické posúvanie, keď je myš nad sliderom
  var sliderContainer = document.querySelector(".slides-container");
  if (sliderContainer) {
    sliderContainer.addEventListener("mouseenter", function() {
      autoSlideActive = false;
      clearInterval(slideTimer);
    });
    
    sliderContainer.addEventListener("mouseleave", function() {
      autoSlideActive = true;
      startAutoSlide();
    });
  }
});