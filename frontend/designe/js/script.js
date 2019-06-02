const mobileMenuButton = document.querySelectorAll('.btn-mobile-menu');
const mobileMenu = document.querySelector('.mobile-menu');
const mainMenuLink = document.querySelectorAll('.main-menu-link');
const main = document.querySelector('.main');

mobileMenuButton.forEach(function (item) {
    item.addEventListener('click', function () {
        if (mobileMenu.style.display === 'block') {
            mobileMenu.style.display = 'none';
            document.querySelector('body').style.overflowY = 'auto'
        } else {
            mobileMenu.style.display = 'block';
            document.querySelector('body').style.overflowY = 'hidden'
        }
    });
});

if (main) {
    document.querySelectorAll('.not-main-page').forEach(function (item) {
        item.classList.remove('not-main-page');
        item.classList.add('main-page')
    })
}

mainMenuLink.forEach(function (item) {
    if (`http://foji.adigezalov.ru/${item.getAttribute('href')}` === window.location.href) {
        item.classList.add('active')
    }
});

document.querySelector('.btn-mobile-menu-close').addEventListener('click', function () {
    mobileMenu.style.display = 'none';
    document.querySelector('body').style.overflowY = 'auto'
});

if (main) {
    window.onscroll = function () {
        let scrolled = window.pageYOffset || document.documentElement.scrollTop;
        if (scrolled > document.querySelector('.slider').offsetHeight - document.querySelector('.header').offsetHeight) {
            document.querySelectorAll('.main-page').forEach(function (item) {
                item.classList.remove('main-page');
                item.classList.add('not-main-page')
            })
        } else {
            document.querySelectorAll('.not-main-page').forEach(function (item) {
                item.classList.remove('not-main-page');
                item.classList.add('main-page')
            })
        }
    };

    document.querySelectorAll('.btn-filter-projects').forEach(function (item) {
        item.addEventListener('click', function () {
            if (document.querySelector('.filter-form').style.display === 'block') {
                document.querySelector('.filter-form').style.display = 'none';
            } else {
                document.querySelector('.filter-form').style.display = 'block'
            }
        });
    });

    document.querySelector('.btn-filter-projects-close').addEventListener('click', function () {
        document.querySelector('.filter-form').style.display = 'none';
    });
}

// document.querySelector('.sign-in').addEventListener('click', function () {
//     document.querySelector('.modal-sign-in').style.display = 'block';
//     document.querySelector('.modal-sign-in').style.top = window.pageYOffset + 'px';
//     document.querySelector('body').style.overflowY = 'hidden';
//     document.querySelector('body').classList.add('modal-open')
// });
//
// document.querySelector('.btn-modal-close').addEventListener('click', function () {
//     document.querySelector('.modal-sign-in').style.display = 'none';
//     document.querySelector('.modal-sign-in').style.top = '0';
//     document.querySelector('body').style.overflowY = 'auto';
//     document.querySelector('body').classList.remove('modal-open')
// });

//Tabs on the project page
if (document.querySelector('.project')) {
    const tabLinks = document.querySelectorAll(".tabs p");
    const tabPanels = document.querySelectorAll(".tabs-panel");

    for(let el of tabLinks) {
        el.addEventListener("click", e => {
            e.preventDefault();

            document.querySelector('.tabs li.active').classList.remove("active");
            document.querySelector('.tabs-panel.active').classList.remove("active");

            const parentListItem = el.parentElement;
            parentListItem.classList.add("active");
            const index = [...parentListItem.parentElement.children].indexOf(parentListItem);

            const panel = [...tabPanels].filter(el => el.getAttribute("data-index") == index);
            panel[0].classList.add("active");
        });
    }
}

//Slider
const slides = [
    './images/project/lovestory.jpg',
    './images/project/pair.png',
    './images/project/lovestory.jpg',
    './images/project/pair.png',

];
//
let prevPage = 0;
let current;

// function showNext(slides, points) {
//     page = (page + 1) % slides.length;
//     prevPage = page;
//     rerenderSlides(slides, points);
// }
//
// function showPrevious(slides, points) {
//     page = (page) ? (page - 1) : slides.length - 1;
//     prevPage = page;
//     rerenderSlides(slides, points);
// }
//
// function rerenderSlides(slides, points) {
//     for (let i in slides) {
//         if (slides[i].classList) {
//             slides[i].classList.remove('slider__panel_current');
//             points[i].classList.remove('slider__nav-point_current');
//
//         }
//         if (slides[i].style) {
//             slides[i].style.zIndex = '0';
//         }
//         if (i == page) {
//             slides[i].classList.add('slider__panel_current');
//             points[i].classList.add('slider__nav-point_current');
//             slides[i].style.zIndex = '-1';
//         }
//     }
// }
//
// let timerSlider;
//
document.addEventListener("DOMContentLoaded", () => {
    const previewsBlock = document.getElementsByClassName('project-preview-block')[0];
    const mainImages = document.getElementsByClassName('project-main-slide');
    console.log(mainImages);
    mainImages[0].src=slides[0];
    mainImages[1].src=slides[0];
    const previews = [];
    slides.forEach((src, index)=>{
        const preview = document.createElement('img');
        preview.src = src;
        preview.className = 'preview';
        if (index === 0) preview.classList.add('preview-current') ;
        previewsBlock.appendChild(preview);
        previews.push(preview);
        preview.addEventListener('click',()=>{
            prevPage=current? current: 0;
            current=index;
            previews[prevPage].classList.remove('preview-current');
            preview.classList.add('preview-current');
            if (current>1){
                previewsBlock.style.transform= 'translateX(-'+ 115*(current-1) +'px)';
            }else{
                previewsBlock.style.transform= 'translateX(0)';
            }
            const slide1 = document.getElementsByClassName('project-slide-prev')[0];
            const slide2 = document.getElementsByClassName('project-slide-current')[0]?
                document.getElementsByClassName('project-slide-current')[0] :
                document.getElementsByClassName('project-slide-prev')[1];
            slide1.classList.remove('project-slide-prev');
            slide2.classList.remove('project-slide-current');
            slide2.classList.add('project-slide-prev');
            slide1.classList.add('project-slide-current');
            slide1.src= slides[index];

        })

    })




//     const slides = document.getElementsByClassName('slider__panel');
//     const points = document.getElementsByClassName('slider__nav-point');
//
//     if (!timerSlider) {
//         timerSlider = setInterval(() => showNext(slides, points), 5000);
//     }
//     let next=document.getElementById('next');
//     next.onclick = () => {
//         clearInterval(timerSlider);
//         showNext(slides, points);
//         timerSlider = setInterval(() => showNext(slides, points), 5000);
//     };
//     let prev=document.getElementById('prev');
//     prev.onclick= () => {
//         clearInterval(timerSlider);
//         showPrevious(slides, points);
//         timerSlider = setInterval(() => showNext(slides, points), 5000);
//     };
});
//
// var ranged = new Datepicker('#datepicker', {
//     inline: true,
//     multiple: true,
//     weekStart: 1,
// });
