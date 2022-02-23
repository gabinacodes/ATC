linkSets = document.querySelectorAll("footer .links span");
linkSets.forEach((linkSet) => {
  linkSet.addEventListener("click", () => {
    linkSet.querySelector('svg').classList.toggle('rotate')
      linkSet.closest('div').querySelectorAll("a").forEach((a) => {
      a.classList.toggle("none_m");
    });
    linkSet.scrollIntoViewIfNeeded()
  });
});