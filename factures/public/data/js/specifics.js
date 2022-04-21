// Modal Box
var modal = document.getElementById("modalBox");
var btn = document.getElementById("delete");
var close = document.getElementsByClassName("close")[0];
var no = document.getElementById("no");

btn.onclick = function() {
    modal.style.display = "block";
}

close.onclick = function() {
    modal.style.display = "none";
}

no.onclick = function() {
    modal.style.display = "none";
}

window.onclick = function(event) {
    if (event.target == modal) {
      modal.style.display = "none";
    }
} 

// Options (show)
var options = document.getElementById("options");
var actions = document.getElementById("actions");

options.onclick = function(event) {
    options.classList.toggle("active");
    actions.classList.toggle("active");
}