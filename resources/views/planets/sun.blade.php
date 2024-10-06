<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js"></script>


    <script>


        // import {OrbitControls} from "three/examples/jsm/controls/OrbitControls";

        window.onload = function() {

            // Declarația pentru variabilele globale
            let line; // Variabila pentru linia dintre planetă și Soare
            const infoBox = document.getElementById('infoBox');
            const planetName = document.getElementById('planetName');
            const planetInfo = document.getElementById('planetInfo');
            // Funcție pentru a adăuga un click event pe planete
            function addPlanetClickListener(planet, name, info) {
                planet.userData = { name, info }; // Salvăm numele și informația în userData

                planet.onClick = function() {
                    // Afișăm informațiile în box
                    planetName.innerText = name;
                    planetInfo.innerText = info;
                    infoBox.style.display = 'block';

                    // Desenăm linia
                    drawLineBetweenSunAndPlanet(planet);
                };
            }

            // Funcția pentru desenarea liniei
            function drawLineBetweenSunAndPlanet(planet) {
                // Dacă există o linie anterioară, o ștergem
                if (line) {
                    scene.remove(line);
                }

                // Creăm geometria liniei
                const points = [];
                points.push(new THREE.Vector3(0, 0, 0)); // Soarele
                points.push(planet.position.clone()); // Poziția planetei

                const geometry = new THREE.BufferGeometry().setFromPoints(points);
                const material = new THREE.LineBasicMaterial({ color: 0xffffff }); // Culoarea liniei
                line = new THREE.Line(geometry, material);

                scene.add(line); // Adăugăm linia în scenă
            }

            // Setup scene, camera, and renderer
            const scene = new THREE.Scene();
            const camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 0.1, 1000);
            const renderer = new THREE.WebGLRenderer();
            renderer.setSize(window.innerWidth, window.innerHeight);
            document.getElementById('solar-system').appendChild(renderer.domElement);

            // Add lighting for realistic material rendering
            const ambientLight = new THREE.AmbientLight(0xffffff, 0.5); // Ambient light
            scene.add(ambientLight);

            const pointLight = new THREE.PointLight(0xffffff, 1.5); // Light from the Sun
            pointLight.position.set(0, 0, 0);
            scene.add(pointLight);

            // Load textures using TextureLoader
            const textureLoader = new THREE.TextureLoader();

            // Create Sun (basic material)
            const sunGeometry = new THREE.SphereGeometry(4, 128, 128);
            const sunTexture = textureLoader.load('sun8k.jpg');
            const sunMaterial = new THREE.MeshBasicMaterial({ map: sunTexture });
            const sun = new THREE.Mesh(sunGeometry, sunMaterial);
            sun.position.set(1, 0, 0); // Orbit radius from Sun
            scene.add(sun);

            // Mercury

            const mercuryGeometry = new THREE.SphereGeometry(2, 64, 64); // Start with 64 segments for testing
            const mercuryTexture = textureLoader.load('mercurymap.jpg'); // Path to Earth texture
            const mercuryMaterial = new THREE.MeshStandardMaterial({
                map: mercuryTexture, // Assign the texture to the material
                roughness: 1,  // To simulate a rough surface like Earth
                metalness: 0   // Earth isn't metallic
            });
            const mercury = new THREE.Mesh(mercuryGeometry, mercuryMaterial);

            mercury.position.set(10, 0, 0); // Orbit radius from Sun
            scene.add(mercury);

            // Venus

            const venusGeometry = new THREE.SphereGeometry(2, 64, 64); // Start with 64 segments for testing
            const venusTexture = textureLoader.load('venusmap.jpg'); // Path to Earth texture
            const venusMaterial = new THREE.MeshStandardMaterial({
                map: venusTexture, // Assign the texture to the material
                roughness: 1,  // To simulate a rough surface like Earth
                metalness: 0   // Earth isn't metallic
            });
            const venus = new THREE.Mesh(venusGeometry, venusMaterial);

            venus.position.set(15, 0, 0); // Orbit radius from Sun
            scene.add(venus);


            // Create Earth (example) with a texture
            const earthGeometry = new THREE.SphereGeometry(2, 128, 128); // Start with 64 segments for testing
            const earthTexture = textureLoader.load('earthmap10k.jpg'); // Path to Earth texture
            const earthMaterial = new THREE.MeshStandardMaterial({
                map: earthTexture, // Assign the texture to the material
                roughness: 1,  // To simulate a rough surface like Earth
                metalness: 0   // Earth isn't metallic
            });
            const earth = new THREE.Mesh(earthGeometry, earthMaterial);

            earth.position.set(20, 0, 0); // Orbit radius from Sun
            scene.add(earth);

            // Mars

            const marsGeometry = new THREE.SphereGeometry(2, 128, 128); // Start with 64 segments for testing
            const marsTexture = textureLoader.load('marsmap.jpg'); // Path to Earth texture
            const marsMaterial = new THREE.MeshStandardMaterial({
                map: marsTexture, // Assign the texture to the material
                roughness: 1,  // To simulate a rough surface like Earth
                metalness: 0   // Earth isn't metallic
            });
            const mars = new THREE.Mesh(marsGeometry, marsMaterial);

            mars.position.set(20, 0, 0); // Orbit radius from Sun
            scene.add(mars);

            // Jupiter

            const jupiterGeometry = new THREE.SphereGeometry(2, 128, 128); // Start with 64 segments for testing
            const jupiterTexture = textureLoader.load('jupitermap.jpg'); // Path to Earth texture
            const jupiterMaterial = new THREE.MeshStandardMaterial({
                map: jupiterTexture, // Assign the texture to the material
                roughness: 1,  // To simulate a rough surface like Earth
                metalness: 0   // Earth isn't metallic
            });
            const jupiter = new THREE.Mesh(jupiterGeometry, jupiterMaterial);

            jupiter.position.set(20, 0, 0); // Orbit radius from Sun
            scene.add(jupiter);

            // Saturn

            const saturnGeometry = new THREE.SphereGeometry(2, 128, 128); // Start with 64 segments for testing
            const saturnTexture = textureLoader.load('saturnmap.jpg'); // Path to Earth texture
            const saturnMaterial = new THREE.MeshStandardMaterial({
                map: saturnTexture, // Assign the texture to the material
                roughness: 1,  // To simulate a rough surface like Earth
                metalness: 0   // Earth isn't metallic
            });
            const saturn = new THREE.Mesh(saturnGeometry, saturnMaterial);

            saturn.position.set(20, 0, 0); // Orbit radius from Sun
            scene.add(saturn);

            // Uranus

            const uranusGeometry = new THREE.SphereGeometry(2, 128, 128); // Start with 64 segments for testing
            const uranusTexture = textureLoader.load('uranusmap.jpg'); // Path to Earth texture
            const uranusMaterial = new THREE.MeshStandardMaterial({
                map: uranusTexture, // Assign the texture to the material
                roughness: 1,  // To simulate a rough surface like Earth
                metalness: 0   // Earth isn't metallic
            });
            const uranus = new THREE.Mesh(uranusGeometry, uranusMaterial);

            uranus.position.set(20, 0, 0); // Orbit radius from Sun
            scene.add(uranus);

            // Neptune

            const neptuneGeometry = new THREE.SphereGeometry(2, 128, 128); // Start with 64 segments for testing
            const neptuneTexture = textureLoader.load('neptunemap.jpg'); // Path to Earth texture
            const neptuneMaterial = new THREE.MeshStandardMaterial({
                map: neptuneTexture, // Assign the texture to the material
                roughness: 1,  // To simulate a rough surface like Earth
                metalness: 0   // Earth isn't metallic
            });
            const neptune = new THREE.Mesh(neptuneGeometry, neptuneMaterial);

            neptune.position.set(20, 0, 0); // Orbit radius from Sun
            scene.add(neptune);



            // Initial camera position
            camera.position.z = 20;

            // Raycaster for interactivity
            const raycaster = new THREE.Raycaster();
            const mouse = new THREE.Vector2();

            // Mouse wheel scroll event for zoom
            function onScroll(event) {
                //event.preventDefault();
                const delta = event.deltaY * 0.05;  // Adjust sensitivity
                camera.position.z += delta;         // Move camera closer or farther
            }
            // Add scroll listener
            window.addEventListener('wheel', onScroll);

            // Track objects for interactivity
            const planets = [
                { name: 'Earth', mesh: earth, position: earth.position },
                { name: 'Sun', mesh: sun, position: sun.position },
                { name: 'Mercury', mesh: mercury, position: mercury.position },
                { name: 'Venus', mesh: venus, position: venus.position },
                { name: 'Mars', mesh: mars, position: mars.position },
                { name: 'Jupiter', mesh: jupiter, position: jupiter.position },
                { name: 'Saturn', mesh: saturn, position: saturn.position },
                { name: 'Uranus', mesh: uranus, position: uranus.position }
                // Add more planets with textures here
            ];

            // Set camera position
            camera.position.z = 15;


            function onMouseClick(event) {
                // Calculate mouse position in normalized device coordinates (-1 to +1)
                mouse.x = (event.clientX / window.innerWidth) * 2 - 1;
                mouse.y = -(event.clientY / window.innerHeight) * 2 + 1;

                // Update the picking ray with the camera and mouse position
                raycaster.setFromCamera(mouse, camera);

                // Calculate objects intersecting the ray
                const intersects = raycaster.intersectObjects(planets.map(p => p.mesh));
                addPlanetClickListener(earth, 'Pământ', 'Informații despre Pământ: ...');
                addPlanetClickListener(mars, 'Marte', 'Informații despre Marte: ...');
                if (intersects.length > 0) {
                    const clickedPlanet = intersects[0].object;
                    const planetData = planets.find(p => p.mesh === clickedPlanet);

                    // Call the Laravel API with the planet's name
                    fetch(`/getPlanets/${planetData.name}`)
                        .then(response => response.json())

                        .then(data => {
                            console.log(data[0].name);
                            // addPlanetClickListener(earth, 'Pământ', 'Informații despre Pământ: ...');
                            // addPlanetClickListener(mars, 'Marte', 'Informații despre Marte: ...');
                            // Display planet data in the "planet-info" div
                            document.getElementById('planetInfo').innerHTML = `
                            <strong>${data[0].name}</strong><br>
                            Distance from sun: ${data[0].distance_light_year}<br>
                            Diameter: ${data[0].radius}<br>
                            Temperature: ${data[0].temperature}
                        `;
                        })
                        .catch(err => console.error('Error fetching planet data:', err));
                }
            }

            // Add event listener for mouse click
            window.addEventListener('click', onMouseClick, false);

            function updatePlanetOrbit(planet, distanceFromSun, speed, time) {
                // Calculul poziției planetei folosind funcțiile sin și cos
                const x = distanceFromSun * Math.cos(time * speed);
                const z = distanceFromSun * Math.sin(time * speed);
                planet.position.set(x, 0, z);  // Așezăm planeta pe planul XZ
            }

            function rotateCameraAroundSun(camera, radius, speed, time) {
                const x = radius * Math.cos(time * speed);
                const z = radius * Math.sin(time * speed);
                camera.position.set(x, camera.position.y, z);  // Păstrăm înălțimea camerei constantă
                camera.lookAt(-10, 0, -10);  // Camera să fie îndreptată către Soare
            }

            // Animation loop
            function animate() {
                requestAnimationFrame(animate);

                const time = Date.now() * 0.001; // Timp pentru a anima mișcarea
                //rotateCameraAroundSun(camera, 20, 0.05, time);  // Camera orbitând la un "radius" de 20
                // Actualizăm orbitele pentru fiecare planetă

                updatePlanetOrbit(mercury, 10, 0.01, time); // Marte, la 12 unități distanță
                updatePlanetOrbit(venus, 12, 0.02, time); // Marte, la 12 unități distanță
                updatePlanetOrbit(earth, 16, 0.03, time);  // Pământul, de exemplu, la 8 unități distanță
                updatePlanetOrbit(mars, 24, 0.05, time);
                updatePlanetOrbit(jupiter, 28, 0.06, time);
                updatePlanetOrbit(saturn, 32, 0.07, time);
                updatePlanetOrbit(uranus, 40, 0.08, time);
                updatePlanetOrbit(neptune, 50, 0.1, time);
                // Adaugă și alte planete
                // controls.update();
                renderer.render(scene, camera);
            }

            animate();
        }
    </script>
    <title>Document</title>
</head>
<body>
<div id="solar-system"></div>
<div id="infoBox" style="position: absolute; top: 10px; left: 10px; background: rgba(255, 255, 255, 0.8); padding: 10px; border-radius: 5px; display: none;">
    <h3 id="planetName"></h3>
    <p id="planetInfo"></p>
</div>
</body>
</html>



