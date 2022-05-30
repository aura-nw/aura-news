$(document).ready(function(){
    hoverMenu();
    slickInit();
});

function hoverMenu() {
    if (window.innerWidth > 992) {
        document.querySelectorAll('.navbar .nav-item').forEach(function(everyitem){

            everyitem.addEventListener('mouseover', function(e){
                let el_link = this.querySelector('button[data-bs-toggle]');
                if(el_link != null){
                    let nextEl = el_link.nextElementSibling;
                    el_link.classList.add('show');
                    nextEl.classList.add('show');
                }

            });
            everyitem.addEventListener('mouseleave', function(e){
                let el_link = this.querySelector('button[data-bs-toggle]');
                if(el_link != null){
                    let nextEl = el_link.nextElementSibling;
                    el_link.classList.remove('show');
                    nextEl.classList.remove('show');
                }


            })
        });

    }
}

function slickInit() {
    const newestCarouselFor = $("#newest-carousel-slider-for");
    const newestCarouselNav = $("#newest-carousel-slider-nav");
    if (newestCarouselFor !== undefined && newestCarouselNav !== undefined) {
        newestCarouselFor.slick({
            speed: 500,
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: true,
            dots: true,
            asNavFor: '#newest-carousel-slider-nav',
            responsive: [
                {
                    breakpoint: 993,
                    settings: {
                        arrows: false,
                    },
                },
            ],
        });
        newestCarouselNav.slick({
            slidesToShow: 6,
            slidesToScroll: 1,
            asNavFor: '#newest-carousel-slider-for',
            focusOnSelect: true,
            responsive: [
                {
                    breakpoint: 993,
                    settings: {
                        arrows: false,
                    },
                },
            ],
        });
    }
}