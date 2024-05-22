function toggleNav() {
  var navWidth = document.getElementById("mySidenav").style.width;
  if (navWidth === "0px" || navWidth === "") {
    document.getElementById("mySidenav").style.width = "250px";
  } else {
    document.getElementById("mySidenav").style.width = "0";
  }
}
function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}
  document.getElementsByClassName("main-btn")[0].addEventListener("mouseover", function () {
      this.innerHTML = "Click on me";
    });
  document.getElementsByClassName("main-btn")[0].addEventListener("mouseout", function () {
      this.innerHTML = "Who We Are";
    });
