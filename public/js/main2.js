// Ajouter du CSS sur une photo au passage de la souris.

var cadre = document.getElementById('photo');
var prenom = document.getElementById('prenom');

cadre.addEventListener("mouseover", changePhotover);
cadre.addEventListener("mouseleave", changePhotoleave);

function changePhotover(){
    cadre.style.filter = "grayscale(0)";
    cadre.style.transform = "scale(1.1)";
    prenom.style.color = "#ac7d77";
}

function changePhotoleave(){
    cadre.style.filter = "grayscale(1)";
    cadre.style.transform = "scale(1)";
    prenom.style.color = "white";
}