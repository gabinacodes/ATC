let bgHeaderWhite = "#ffffff";
let bgHeaderTransparent = "#00000000";
let minHeight = "50";
let navLinks = document.querySelector(".navLinks");
window.onscroll = () => {
  let mobile = 'none_t'
  let svg2 = document.querySelector('.logo svg:last-child')  
  let scrolling =
    document.body.scrollTop > minHeight ||
    document.documentElement.scrollTop > minHeight;
  headerBg = document.getElementsByTagName("header")[0]
    if (!scrolling) { //@top
      headerBg.style.backgroundColor = bgHeaderTransparent    
      svg2.classList.contains(mobile) ? svg2.classList.remove(mobile): ""  
    } else {
      headerBg.style.backgroundColor = bgHeaderWhite      
      !svg2.classList.contains(mobile) ? svg2.classList.add(mobile): ""
    }
};
headerFunction = () => {
  navLinks.classList.toggle("none");
  navLinks.classList.toggle("bgMobileHeader");
  svgs[0].classList.toggle("none");
  svgs[1].classList.toggle("none");
  overlay.classList.toggle("none");

};
let svgs = document.querySelectorAll(".icon svg");
svgs.forEach((svg) => {
  svg.addEventListener("click", (e) => {
    headerFunction();
    e.stopPropagation();
  });
});
window.onclick = () => {
  !navLinks.classList.contains("none") ? headerFunction() : "";
};
