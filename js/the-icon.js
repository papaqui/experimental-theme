// $(document).ready(function () {
//   $('#nav-icon3').click(function () {
//     $(this).toggleClass('open');
//     $('.sidenav').fadeToggle();
//     $('.toggle-switch').toggleClass('change-background'); // change menu color
//   });
// });

// Vanilla JS
const iconBox = document.querySelector('.the-icon');
const theIcon = document.getElementById('nav-icon3');
const navBar = document.querySelector('.main-navigation');
const title = document.querySelector('.responsive-title');

function openIcon() {
  theIcon.classList.toggle('open');
  navBar.classList.toggle('show-left');
  title.classList.add('show');
}

iconBox.addEventListener('click', openIcon);
