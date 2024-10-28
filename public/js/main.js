

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



// Carousel
// const slidesContainer = document.getElementById("slides-container");
// const slide = document.querySelector(".slide");
// const prevButton = document.getElementById("slide-arrow-prev");
// const nextButton = document.getElementById("slide-arrow-next");

// nextButton.addEventListener("click", () => {
//   const slideWidth = slide.clientWidth;
//   slidesContainer.scrollLeft += slideWidth;
// });

// prevButton.addEventListener("click", () => {
//   const slideWidth = slide.clientWidth;
//   slidesContainer.scrollLeft -= slideWidth;
// });
const slidesContainer = document.getElementById("slides-container");
const prevButton = document.getElementById("slide-arrow-prev");
const nextButton = document.getElementById("slide-arrow-next");

// Tableau des noms d'images à charger
const imageFiles = [
  'image1.jpg',
  'image2.jpg',
  'image3.jpg',
  'image4.jpg'
];

// Fonction pour charger les images
function loadImages() {
//   slidesContainer.innerHTML = ''; // Effacer les slides actuelles

  imageFiles.forEach((image) => {
    const slide = document.createElement('li');
    slide.classList.add('slide');

    const img = document.createElement('img');
    img.src = `admin/assets/imagesgalerie/${image}`;
    img.alt = `Image ${image}`;
    
    slide.appendChild(img);
    slidesContainer.appendChild(slide);
    console.log(`Image ${index + 1} ajoutée au DOM.`);
  });
}

// Appeler la fonction pour charger les images
loadImages();

// Navigation entre les slides
nextButton.addEventListener("click", () => {
  const slideWidth = slidesContainer.querySelector(".slide").clientWidth;
  slidesContainer.scrollLeft += slideWidth;
});

prevButton.addEventListener("click", () => {
  const slideWidth = slidesContainer.querySelector(".slide").clientWidth;
  slidesContainer.scrollLeft -= slideWidth;
});