const swiper = new Swiper ("#swiper-1",{
    speed: 2000,
    effect:'fade',
    autoplay:{
        delay: 2000,
        disableOnInteraction: false,
        waitForTransition: true  
    },
})
const swiper2 = new Swiper('#swiper-2',{ 
    direction:'horizontal',
    effect: 'coverflow',
    mousewheel: {
        invert: true,
    },
    coverflowEffect: {
    rotate: 50,
    slideShadows: true,
    },
    autoplay:{
    delay: 2000,
    disableOnInteraction: false,
    pauseOnMouseEnter: true,
    waitForTransition: true  
    },
    pagination:{
    el: ".swiper-pagination",
    clickable: true,
    }
});
const swiper3 = new Swiper('#swiper-3',{
    effect: 'cards',
    cardsEffect: {
        perSlideRotate: 1,
        rotate: true,
        slideShadows: true
    },
    autoplay:{
        delay:2000,
        disableOnInteraction: false,
        waitForTransition: true,
        pauseOnMouseEnter: true,
    },
    direction: 'horizontal',
    pagination:{
        el: '.swiper-pagination',
        clickable:true
    },
    mousewheel:{
        invert:true,
    }
})
const swiper4 = new Swiper('#swiper-4',{
    slidesPerView: 3,
    spaceBetween: 10,
    enabled: true,
    autoplay:{
        delay:3000,
        stopOnLastSlide: false,
        pauseOnMouseEnter:true
    }
})
const swiper5 = new Swiper('#swiper-5',{
    direction:'vertical',
    effect:'flip',
    flipEffect:{
        slideShadows: true
    },
    spaceBetween:10,
    pagination:{
        el: '.swiper-pagination'
    },
    autoplay:{
        delay:4000,
        pauseOnMouseEnter:true
    },
    mousewheel:{
        invert:true,
    }
})