"use strict";

import '../scss/app.scss';
import '../scss/vendors.scss';
import Swiper, {Navigation, Pagination, Lazy, Autoplay} from 'swiper';
import Dropdown from 'bootstrap/js/dist/dropdown';
import Offcanvas from 'bootstrap/js/dist/offcanvas';
import 'fslightbox';


import { createApp } from 'vue';

const app = createApp({
    mounted() {
        //слайдеры
        const swiper = new Swiper('.slider-bottom', {
            modules: [Navigation, Pagination, Lazy, Autoplay],
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            slidesPerView: 1,
            loop: true,
            autoplay: {
                delay: 3000,
                disableOnInteraction: false
            },
            preloadImages: false,
            lazy: true,
            watchSlidesProgress: true,
            watchSlidesVisibility: true,
        });
        const slider_bcg = new Swiper('.slider-bcg', {
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            pagination: {
                el: '.swiper-pagination' ,
                type: 'fraction',
                //кастомный вывод фракции
                renderFraction: function (currentClass, totalClass){
                    return '<div class="company-green">0<span class="' + currentClass + '"></span></div>' + '/0' + '<span class="' + totalClass + '"></span>';
                },
            },
            modules: [Navigation, Pagination, Lazy],
            slidesPerView: 1,
            loop: true,

            preloadImages: false,
            lazy: true,
            watchSlidesProgress: true,
            watchSlidesVisibility: true,
        });

        //использование cookie
        if (document.querySelector(".warning")) {
            if ( localStorage.getItem('cookie_message_accept') === null) {
                console.log(123);
                const container = document.querySelector(".warning");
                container.classList.add("warning--active");
                const apply = container.querySelector(".warning__apply");
                apply.addEventListener("click", () => {
                    container.classList.remove("warning--active");
                    localStorage.setItem('cookie_message_accept', 'true');
                    // document.cookie = "warning=true; max-age=2592000; path=/";
                    console.log(document.cookie);
                });
            };
        };

        refreshFsLightbox();
        this.$lozad();

        const elemHideScroll = document.getElementById('header-nav');
        const elemShowScroll = document.getElementById('header-nav-temporary');
        const headerHeight = document.getElementsByTagName('header')[0].clientHeight;
        const headerPadding = document.querySelector('.header-wrp');


        window.addEventListener('scroll', () => {
            const screenWidth = window.innerWidth;
            if (window.pageYOffset >= headerHeight && screenWidth >= 992) {
                elemHideScroll.classList.add('d-none');
                elemShowScroll.classList.add('d-block');
                headerPadding.classList.add('py-1');
            } else {
                elemHideScroll.classList.remove('d-none');
                elemShowScroll.classList.remove('d-block');
                headerPadding.classList.remove('py-1');
            }
        });
        window.addEventListener('resize', () => {
            const screenWidth = window.innerWidth;
            const burgerHide = document.querySelector('.header-burger-temporary');
            if (screenWidth <= 991 ) {
                burgerHide.classList.add('d-none');
            }
            else {
                burgerHide.classList.remove('d-none');
            }
        });
    }
});

import ServiceModal from './components/ServiceModal.vue';
app.component('ServiceModal', ServiceModal);

import MainForm from './components/MainForm.vue';
app.component('MainForm', MainForm);

import YandexMap from "./components/YandexMap.vue";
app.component('YandexMap', YandexMap);

import SvgIcon from "./components/SvgIcon.vue"
app.component('SvgIcon', SvgIcon);

import Maska from 'maska';
app.use(Maska);

import VeeValidate from './plugins/vee-validate';
app.use(VeeValidate);

import Lozad from "./plugins/lozad";
app.use(Lozad);

import Api from './plugins/api';
app.use(Api);

import Notifications from '@kyvg/vue3-notification';
app.use(Notifications);

import { notify } from "@kyvg/vue3-notification";
notify({
    title: "Title",
    text: "Message",
});

app.mount('#app');