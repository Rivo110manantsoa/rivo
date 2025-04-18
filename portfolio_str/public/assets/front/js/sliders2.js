// sliders
document.addEventListener('DOMContentLoaded',() => {
    const sliders = document.querySelector('.sliders');
    const slideCount = document.querySelectorAll('.slide').length;
    let currentIndex = 0;
    let slideDirection = 1;

    const showSlide = (index) => {
        const offset = -index * 100;
        sliders.style.transform = `translateX(${offset}%)`;
    };

    const nextSlide = () => {
        currentIndex += 1;
        if (currentIndex >= slideCount) {
            currentIndex = 0;
        }

        showSlide(currentIndex);
    };

    const prevSlide = () => {
        currentIndex -= 1;
        if (currentIndex < 0) {
            currentIndex = slideCount - 1;
        }

        showSlide(currentIndex);
    };

    document.querySelector('.next').addEventListener('click', () => {
        slideDirection = 1;
        nextSlide();
    });

    document.querySelector('.prev').addEventListener('click', () => {
        slideDirection = -1;
        prevSlide();
    });

    setInterval(() => {
        if (slideDirection == 1) {
            nextSlide();
            if (currentIndex == 0) 
                slideDirection = -1;
        } else {
            prevSlide();
            if(currentIndex == slideCount - 1)
                slideDirection = 1;
        }
    }, 3000);

});

// projects slider
document.addEventListener('DOMContentLoaded',() =>{

});

let projectSliders = [...document.querySelectorAll('.sliders')];
let next = [...document.querySelectorAll('.next')];
let prev = [...document.querySelectorAll('.prev')];

projectSliders.forEach((item, i) => {
    let containerDimensions = item.getBoundingClientRect();
    let containerWidth = containerDimensions.width;


    function autoSlide() {
        item.scrollLeft += containerWidth;
        if (item.scrollLeft >= item.scrollWidth / 4) {
            item.scrollLeft = 0;
        }
    }

    let interval = setInterval(autoSlide, 3000); // Slide every 3 seconds

    next[i].addEventListener('click', () => {
        item.scrollLeft += containerWidth;
        if (item.scrollLeft >= item.scrollWidth / 4) {
            item.scrollLeft = 0;
        }
        clearInterval(interval);
        interval = setInterval(autoSlide, 3000);
    });

    prev[i].addEventListener('click', () => {
        item.scrollLeft -= containerWidth;
        if (item.scrollLeft <= 0) {
            item.scrollLeft = item.scrollWidth / 4;
        }
        clearInterval(interval);
        interval = setInterval(autoSlide, 3000);
    });

    item.addEventListener('mouseenter', () => {
        clearInterval(interval); // Stop auto sliding on hover
    });

    item.addEventListener('mouseleave', () => {
        interval = setInterval(autoSlide, 3000); // Resume auto sliding when hover ends
    });
});

// details sliders
const smallImages = document.querySelectorAll('.smallImage');
const largeImage = document.getElementById('largeImage');

let index = 0;

function showImage(index) {
    largeImage.src = smallImages[index].src;
    smallImages.forEach((img,i) =>{
        if (i == index) {
            img.classList.add('active');
        } else {
            img.classList.remove('active');
        }
    });

    index = index;
}

smallImages.forEach((img,index) =>{
    img.addEventListener('click', () =>{
        showImage(index);
    })
});

function diaporama() {
    index = (index + 1) % smallImages.length;
    showImage(index);
}

setInterval(diaporama, 3000);
// showImage(index);