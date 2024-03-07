let infos = document.querySelector("#news");

function chargeArticles() {
  // On instancie XMLHttpRequest
  let xmlhttp = new XMLHttpRequest();

  // On gère la réponse
  xmlhttp.onreadystatechange = function () {
    if (this.readyState == 4) {
      if (this.status == 200) {
        // On a une réponse
        // On convertit la réponse en objet JS
        let articles = JSON.parse(this.response);
        articles = articles.sort(function (a, b) {
          if (a.id < b.id) {
            return 1;
          }
          if (a.id > b.id) {
            return -1;
          }
          return 0;
        });
        for (let article of articles) {
          // On transforme la date du message en JS
          let dateArticle = new Date(article.created_at);
          // On ajoute le contenu *
          infos.innerHTML += `<div class="one-news">
          <p class="article-date"> ${dateArticle.toLocaleString()} </p>
          <h3 class="article-title">${article.title} </h3>
          <p class="article-txt">${article.para} </p>`;
        }
      } else {
        // On gère les erreurs
        let erreur = JSON.parse(this.response);
        alert(erreur.message);
      }
    }
  };

  // On ouvre la requête
  xmlhttp.open("GET", "ajax/chargeArticles.php");

  // On envoie
  xmlhttp.send();
}
chargeArticles();
