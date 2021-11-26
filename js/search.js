const searchTarget = document.querySelector('.search-target');
const searchBox = document.querySelector('.search-box');

function showSearchBox() {
  searchBox.classList.toggle('show');
}

searchTarget.addEventListener('click', showSearchBox);
