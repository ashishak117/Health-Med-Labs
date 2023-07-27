document.addEventListener("DOMContentLoaded", function() {
    const slider = document.querySelector(".slider");
    const sliderWidth = slider.clientWidth;
    const totalImages = slider.childElementCount;
    let currentIndex = 0;
  
    function slideNext() {
      currentIndex = (currentIndex + 1) % totalImages;
      slider.style.transform = `translateX(-${currentIndex * sliderWidth}px)`;
    }
  
    // Auto slide images every 3 seconds
    setInterval(slideNext, 3000);
  });
  