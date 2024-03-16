window.addEventListener('DOMContentLoaded', function () {
    initSliders();
    initValidators();
    initLibs();
    initOther();
});

function initLibs() {

}

function initSliders() {

    const indexSlider = new Swiper(
        ".index-banner__swiper",
        {
            spaceBetween: 20,
            rewind: true,
            autoplay: {
                delay: 5000,
            },
            pagination: {
                el: ".index-banner__pag",
                clickable: true
            },
            navigation: {
                nextEl: ".index-banner__next",
                prevEl: ".index-banner__prev"
            },
            on: {
                autoplayTimeLeft(swiper, timeLeft, percentage) {
                    let paginationItem = swiper.pagination.bullets[swiper.activeIndex];
                    paginationItem.style.setProperty('--progress', (1 - percentage) * 100 + '%');
                },
                slideChange(swiper) {
                    for (let i = swiper.activeIndex - 1; i > -1; i--) {
                        swiper.pagination.bullets[i].style.setProperty('--progress', '100%');
                    }

                    for (let i = swiper.activeIndex + 1; i < swiper.pagination.bullets.length; i++) {
                        swiper.pagination.bullets[i].style.setProperty('--progress', '0%');
                    }

                }
            },

        });
}

function initValidators() {

}

function initOther(){
    const tabsRoot = document.querySelector('[data-tabs="root"]');
    if (tabsRoot){
        const btns = tabsRoot.querySelectorAll('[data-tabs="btn"]');
        const tabs = tabsRoot.querySelectorAll('[data-tabs="tab"]');

        btns.forEach(btn=>{
            btn.addEventListener('click', (e)=>{

                btns.forEach(btn=>{
                    btn.classList.remove('active');
                })
                e.target.classList.add('active');

                tabs.forEach(tab=>{
                    tab.classList.remove('active');
                });
                tabs[Array.from(btns).indexOf(e.target)].classList.add('active');
            })
        })
    }
}

class Events {
    constructor() {

        this.events = new Set();

        document.addEventListener("DOMContentLoaded", () => {
            document.querySelectorAll(`[data-event]`).forEach(i => {
                i.dataset.event.split(',').forEach((event) => {
                    let [eventType, eventName] = event.split('.');

                    if (!this[eventName]) return;

                    this.events.add(eventType);
                });
            });
            this.init();
        });
    }

    init() {

        const body = document.querySelector("body");

        this.events.forEach((type) => {

            body.addEventListener(type, (e) => {
                const target = e.target.closest(`[data-event]`);
                if (!target) return;

                target.dataset.event.split(',').forEach((event) => {
                    let [eventType, eventName] = event.split('.');

                    if (type !== eventType || !this[eventName]) return;

                    this[eventName].call(this, e, target);
                });
            });
        });

    }

    sample(e, elem) {
        e.preventDefault();

        console.log(e);
        console.log(elem);
    }

    sendForm(e, elem) {
        e.preventDefault();

        fetch(elem.action, {
            method: 'POST',
            body: new FormData(elem)
        }).then(response => response.json()).then(function (data) {

            if (data.status) {
                elem.reset();
                toastr["success"]("Мы скоро свяжемся с вами.", "Спасибо!");
            } else {
                toastr["error"](data.error);
            }

        }).catch(function (err) {
            alert('Fetch Error :-S', err);
        });
    }

}

new Events();

