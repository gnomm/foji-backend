//Slider
const slides = [
    './images/project/lovestory.jpg',
    './images/project/pair.png',
    './images/project/lovestory.jpg',
    './images/project/pair.png',

];

let prevPage = 0;
let current;
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
});

