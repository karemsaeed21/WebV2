// import { setTimeout } from 'timers';
// function openNav() {
//   document.getElementById("mySidenav").style.width = "250px";
// function closeNav() {
//   document.getElementById("mySidenav").style.width = "0";
// }
// let navBtnTog = false;
// function toggleNavBtn(){
//   if(navBtnTog){
//     openNav();
//   }else{
//     closeNav();
//   }
//   navBtnTog = !navBtnTog;
// }
// document.getElementsByClassName("btt")[0].addEventListener("click" , toggleNavBtn())

// let delay = 1000; // Delay in milliseconds
// let images = ["images/IMG_9119.JPG", "images/florian-olivo-4hbJ-eymZ1o-unsplash.jpg", "images/fotis-fotopoulos-DuHKoV44prg-unsplash.jpg"];
// let currentIndex = 0;
// let background = document.querySelector(".main");

// function changeBackground() {
//   background.style.backgroundImage = `url(${images[currentIndex]})`;
//   currentIndex = (currentIndex + 1) % images.length;
//   setTimeout(changeBackground, delay);
// }

// changeBackground(); // Call the function immediately to start the cycle
window.onload = function() {
  function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
  }

  function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
  }

  let navBtnTog = false;

  function toggleNavBtn(){
    if(navBtnTog){
      openNav();
    }else{
      closeNav();
    }
    navBtnTog = !navBtnTog;
  }

  document.getElementsByClassName("btt")[0].addEventListener("click" , toggleNavBtn)

  let delay = 1000; // Delay in milliseconds
  let images = ["images/IMG_9119.JPG", "images/florian-olivo-4hbJ-eymZ1o-unsplash.jpg", "images/fotis-fotopoulos-DuHKoV44prg-unsplash.jpg"];
  let currentIndex = 0;
  let background = document.querySelector(".main");

  function changeBackground() {
    background.style.backgroundImage = `url(${images[currentIndex]})`;
    currentIndex = (currentIndex + 1) % images.length;
    setTimeout(changeBackground, delay);
  }

  changeBackground(); // Call the function immediately to start the cycle
}