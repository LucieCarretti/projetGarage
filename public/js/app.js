// Page produit : galerie d'images

const yield = document.querySelector('.img-container > .product-img');
const imgGallery = document.querySelectorAll('.img-gallery');

console.log(yield)

const pushImage = (image) => {

  imgGallery.forEach(img => {
    img.classList.add("inactive");
  });

  image.classList.remove("inactive");

  yield.src = image.src;
}

// Fin Page produit : galerie d'images
