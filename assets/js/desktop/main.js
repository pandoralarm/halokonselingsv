const menuToggle = document.querySelector('.menu-toggle');
const sideMenu = document.querySelector('.side-menu');
const backButton = document.querySelector('.button-back')
menuToggle.addEventListener('click', e=>{
    sideMenu.classList.add('active');
    menuToggle.classList.add('active');
})

backButton.addEventListener('click', e=>{
    sideMenu.classList.remove('active')
    menuToggle.classList.remove('active');
})

window.onresize = function(event) {
    let vw = Math.max(document.documentElement.clientWidth || 0, window.innerWidth || 0);    
    if (vw < 720){
        location.reload();
    }
};