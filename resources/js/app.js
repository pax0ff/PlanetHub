import './bootstrap';

import 'particles.js/particles';
const particlesJS = window.particlesJS;

// JSON file is located in the directory of 'public/js/particlejs-config.json'
particlesJS.load('particles-js', 'js/particles.json', function() {
    console.log('callback - particles-js config loaded');
});
