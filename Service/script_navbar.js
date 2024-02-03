window.addEventListener("scroll", function(){
    const navbar = document.querySelector('.menu');
    navbar.classList.toggle('menu_scroll' ,window.scrollY > 175)
})