function text(a) {
  let element = document.getElementsByClassName('full');
  let f = a.id;
  console.log(f);
  if (f < 6) {
    f= f - 1;
    console.log(f);
  }
  if (f > 5 && f < 11) {
    f= f - 6;
    console.log(f);
  }
  if (f > 10) {
    f= f - 11;
    console.log(f);
  }
  element[f].style.display = "block";
  event.target.style.display = "none";

}

function open() {
  let item = document.getElementById('public');
  item.style.display = "block";
  console.log("work");
}

function close() {
  let item = document.getElementById('public');
  item.style.display = "none";
  console.log("work");
}
