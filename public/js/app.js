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

// Formulaire 

document.getElementById('toggleForm').addEventListener('click', function() {
  var formWrapper = document.getElementById('hiddenFormWrapper');
  if (formWrapper.style.display === 'none') {
    formWrapper.style.display = 'block';
    document.getElementById('toggleForm').textContent = 'Fermer le formulaire';
  } else {
    formWrapper.style.display = 'none';
    document.getElementById('toggleForm').textContent = 'Donnez votre Avis';
  }

});