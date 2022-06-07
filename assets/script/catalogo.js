const searchbar = document.querySelector(".catalogo-title .search input");
searchBtn = document.querySelector(".catalogo-title .search button"),
  usersList = document.querySelector(".catalog-movies .wrapper");

searchBtn.onclick = () => {
  searchbar.classList.toggle("active");
  searchbar.focus();
  searchbar.value = "";
}

searchbar.onkeyup = () => {
  let searchTerm = searchbar.value;
  if (searchTerm != "") {
    searchbar.classList.add("active");
  } else {
    searchbar.classList.remove("active");
  }
  let xhr = new XMLHttpRequest(); //criando XML objeto
  xhr.open("POST", "php/search.php", true);
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        let data = xhr.response;
        usersList.innerHTML = data;
      }
    }
  }
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xhr.send("searchTerm=" + searchTerm);
}

setInterval(() => {
  // Vamos começar

  let xhr = new XMLHttpRequest(); //criando XML objeto
  xhr.open("GET", "php/movie.php", true);
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        let data = xhr.response;
        if (!searchbar.classList.contains('active')) { // se ativo ativo não contém na barra de pesquisa, em seguida, adicionar esses dados
          usersList.innerHTML = data;
        }
      }
    }
  }
  xhr.send();
}, 500); //esta função será executada com frequência após 500ms