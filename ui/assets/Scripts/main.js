var x = document.getElementsByClassName("side");
for (var i = 0; i < x.length; i++) {
  x[i].addEventListener("mouseover", iconFa);
  x[i].addEventListener("mouseout", iconFa1);
}

function iconFa() {
  var el = this.querySelector(".sidebar .side span .one");
  el.style.color = "white";
}

function iconFa1() {
  var el = this.querySelector(".sidebar .side span .one");
  el.style.color = "rgb(44, 74, 99)";
}

sideFunction = () => {
  let y = document.getElementById("menuBtn");
  y.classList.toggle("menuRotate");
  let x = document.getElementById("sidebarBtn");
  x.classList.toggle("sidebarSlideIn");
  let z = document.getElementById("strok");
  z.classList.toggle("stroke2");
  let zz = document.getElementById("strok2");
  zz.classList.toggle("stroke3");
};
