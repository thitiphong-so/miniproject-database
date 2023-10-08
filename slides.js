let slideIndex = 0;
showSlides();

function showSlides() {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}
  slides[slideIndex-1].style.display = "block";
  setTimeout(showSlides, 5000); // Change image every 2 seconds
}

// let slideIndex = 1;
// showSlides(slideIndex);

// // Next/previous controls
// function plusSlides(n) {
//   showSlides(slideIndex += n);
// }

// // Thumbnail image controls
// function currentSlide(n) {
//   showSlides(slideIndex = n);
// }

// function showSlides(n) {
//   let i;
//   let slides = document.getElementsByClassName("mySlides");
//   let dots = document.getElementsByClassName("dot");
//   if (n > slides.length) {slideIndex = 1}
//   if (n < 1) {slideIndex = slides.length}
//   for (i = 0; i < slides.length; i++) {
//     slides[i].style.display = "none";
//   }
//   for (i = 0; i < dots.length; i++) {
//     dots[i].className = dots[i].className.replace(" active", "");
//   }
//   slides[slideIndex-1].style.display = "block";
//   dots[slideIndex-1].className += " active";
// }

//----------------------------------------//
// var timeOut = 2000;
// var slideIndex = 0;
// var autoOn = true;

// autoSlides();

// function autoSlides() {
//     timeOut = timeOut - 20;
//     if (autoOn == true && timeOut < 0) {
//         currentSlide();
//     }
//     setTimeout(autoSlides, 20);
// }

// function plusSlides() {

//     timeOut = 2000;

//     var slides = document.getElementsByClassName("mySlides");
//     var dots = document.getElementsByClassName("dot");

//     for (i = 0; i < slides.length; i++) {
//         slides[i].style.display = "none";
//         dots[i].className = dots[i].className.replace(" active", "");
//     }
//     slideIndex--;

//     if (slideIndex > slides.length) {
//         slideIndex = 1
//     }
//     if (slideIndex == 0) {
//         slideIndex = 5
//     }
//     slides[slideIndex - 1].style.display = "block";
//     dots[slideIndex - 1].className += " active";
// }

// function currentSlide() {

//     timeOut = 2000;

//     var slides = document.getElementsByClassName("mySlides");
//     var dots = document.getElementsByClassName("dot");
//     for (i = 0; i < slides.length; i++) {
//         slides[i].style.display = "none";
//         dots[i].className = dots[i].className.replace(" active", "");
//     }
//     slideIndex++;
    
//     if (slideIndex > slides.length) {
//         slideIndex = 1
//     }
//     slides[slideIndex - 1].style.display = "block";
//     dots[slideIndex - 1].className += " active";
// }