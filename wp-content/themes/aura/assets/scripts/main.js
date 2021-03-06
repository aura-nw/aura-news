$(document).ready(function(){
    hoverMenu();
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

// function slickInit() {
//     const newsRelatedList = $("#news-related-list");
//     if (newsRelatedList !== undefined) {
//         newsRelatedList.slick({
//             infinite: false,
//             slidesToShow: 1,
//             mobileFirst: true,
//             slidesToScroll: 1,
//             responsive: [
//                 {
//                     breakpoint: 767,
//                     settings: {
//                         slidesToShow: 2,
//                         slidesToScroll: 1,
//                     },
//                 }
//             ],
//         });
//     }
// }