 // Attacher un gestionnaire d'événement au bouton d'envoi
 /* document.getElementById('uploadButton').addEventListener('click', function() {
    var files = document.getElementById('fileUpload').files; // Récupérer les fichiers sélectionnés
    
    // Vérifier si des fichiers ont été sélectionnés
    if (files.length > 0) {
      // Parcourir les fichiers sélectionnés
      for (var i = 0; i < files.length; i++) {
        var file = files[i];
        var reader = new FileReader(); // Créer un objet FileReader
        
        // Fonction de rappel exécutée lorsque le fichier est lu
        reader.onload = function(e) {
          var img = document.createElement('img'); // Créer un élément <img>
          img.src = e.target.result; // Définir la source de l'image sur les données du fichier
          document.getElementById('gallery').appendChild(img); // Ajouter l'image à la galerie
        };
        
        // Lire le contenu du fichier en tant que URL de données
        reader.readAsDataURL(file);
      }
    }
  }); */
  

function chargerImage() {

};

  //récupérer les images affichées sur le DOM
  const img1 = document.getElementById('gallery1');
  const img2 = document.getElementById('gallery2');
  const img3 = document.getElementById('gallery3');

// Afficher ces images sur la page de l'amdin
