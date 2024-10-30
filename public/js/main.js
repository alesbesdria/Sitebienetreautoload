
// Menu Burger

const navshow = document.getElementById("navcolor");
const nav = document.getElementById("mininav");
nav.addEventListener('click', show);

function show(){
    navshow.classList.toggle("navcolorshow");
}

// Ajouter du CSS sur un bouton au passage de la souris.

$(".grayscale").on("mouseover", function() {
    $(this).css("transform", "scale(1.06)");
    $(this).css("filter", "grayscale(1)");
});

$(".grayscale").on("mouseleave", function() {
    $(this).css("transform", "scale(1)");
    $(this).css("filter", "grayscale(0)");
});

/////////////////////

$(".textcontact").on("mouseover", function() {
    $(this).css("transform", "scale(1.06)");
    $(this).css("filter", "grayscale(1)");
});

$(".textcontact").on("mouseleave", function() {
    $(this).css("transform", "scale(1)");
    $(this).css("filter", "grayscale(0)");
});

/////////////////////

$(".entretientitre").on("mouseover", function() {
    $(this).css("transform", "scale(1.03)");
    $(this).css("color", "#494949");
});

$(".entretientitre").on("mouseleave", function() {
    $(this).css("transform", "scale(1)");
    $(this).css("color", "black");
});

/////////////////////

// CAROUSEL
