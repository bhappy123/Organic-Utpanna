const nextImg= '<img src="./img/left.svg" alt="">';
const prev='<i class="fa fa-arrow-left" aria-hidden="true"></i>';

$('.owl-carousel').owlCarousel({
    loop:true,
    nav:true,
    autoplay: 10,
    navText: ['<i class="fa fa-arrow-left nav-btn" aria-hidden="true"></i>','<i class="fa fa-arrow-right nav-btn" aria-hidden="true"></i>'],
    responsive:{
        0:{
            items:1
        }
    }
})


