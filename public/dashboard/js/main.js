// Add active class to the current button (highlight it)
var header = document.getElementById("lista");
var btns = header.getElementsByClassName("list-item");
var mrks = header.getElementsByClassName("list-mark");
for (var i = 0; i < btns.length; i++) {
  btns[i].addEventListener("click", function() {
    var current = document.getElementsByClassName("active-item");
    current[0].className = current[0].className.replace(" active-item", "");
    this.className += " active-item";
  });
}