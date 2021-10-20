/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */
import '@popperjs/core'
import 'bootstrap';
import axios from 'axios'
import simpleParallax from 'simple-parallax-js';
import Vue from 'vue';
import App from './js/App.vue'



new Vue ({
    el: '#app',
    components: {App}
})

// any CSS you import will output into a single css file (app.css in this case)
import './css/app.scss';

// start the Stimulus application
import './bootstrap';


var image = document.getElementsByClassName('parallax-it');
new simpleParallax(image, {
    scale: 1.2,
    maxTransition: 100
});



// window.addEventListener('scroll', throttle(parallax, 14));
//
// function throttle(fn, wait) {
//     var time = Date.now();
//     return function() {
//         if ((time + wait - Date.now()) < 0) {
//             fn();
//             time = Date.now();
//         }
//     }
// };
//
// function parallax() {
//     var scrolled = window.pageYOffset;
//     var parallax = document.querySelector(".parallax");
//     // You can adjust the 0.4 to change the speed
//     var coords = (scrolled * 0.4) + 'px'
//     parallax.style.transform = 'translateY(' + coords + ')';
// };