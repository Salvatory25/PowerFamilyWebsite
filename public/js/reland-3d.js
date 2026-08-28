/**
 * RELAND CONSULT LTD - Premium 3D Interaction Engine
 * Features:
 * 1. Realistic Cadastral Land Parcel Visualizer (Pure Surveyed Plot, Topography, Stream, Trees, Stones)
 * 2. Real-time Survey Drone with spinning propellers and dynamic LiDAR scanning laser beam
 * 3. Official Ministry Beacons with Brass Datum Pins, Radar Pulses, and Survey Line String
 * 4. 3D Floating Dimension Measurement Labels & North Compass Arrow
 * 5. Interactive Simulation Mode ("Simulate Survey" cinematic step-by-step animation)
 * 6. GPU-Accelerated 3D Tilt Physics & Ambient GNSS Hero Constellation Particles
 */

(function () {
    'use strict';

    /* =========================================================================
       1. GPU-ACCELERATED 3D TILT PHYSICS ENGINE
       ========================================================================= */
    class RelandTilt {
        constructor(element, options = {}) {
            this.element = element;
            this.options = Object.assign({
                maxTilt: 12,
                perspective: 1000,
                easing: 'cubic-bezier(0.03, 0.98, 0.52, 0.99)',
                scale: 1.025,
                speed: 400,
                glare: true,
                maxGlare: 0.25,
                reverse: false
            }, options);

            this.width = null;
            this.height = null;
            this.left = null;
            this.top = null;
            this.transitionTimeout = null;
            this.updateCall = null;

            this.init();
        }

        init() {
            this.element.style.transformStyle = 'preserve-3d';
            this.element.style.willChange = 'transform';

            if (this.options.glare) {
                this.prepareGlare();
            }

            this.bindEvents();
        }

        prepareGlare() {
            let glareContainer = this.element.querySelector('.reland-tilt-glare');
            if (!glareContainer) {
                glareContainer = document.createElement('div');
                glareContainer.className = 'reland-tilt-glare absolute inset-0 overflow-hidden pointer-events-none rounded-inherit z-10';
                
                const glareInner = document.createElement('div');
                glareInner.className = 'reland-tilt-glare-inner absolute w-[200%] h-[200%] top-[-50%] left-[-50%] pointer-events-none opacity-0';
                glareInner.style.background = 'radial-gradient(circle at center, rgba(200, 154, 59, 0.35) 0%, rgba(255, 255, 255, 0.15) 30%, transparent 70%)';
                glareInner.style.transform = 'rotate(180deg) translate(-50%, -50%)';

                glareContainer.appendChild(glareInner);
                this.element.appendChild(glareContainer);
            }
            this.glareElement = this.element.querySelector('.reland-tilt-glare-inner');
        }

        bindEvents() {
            this.onMouseEnter = this.onMouseEnter.bind(this);
            this.onMouseMove = this.onMouseMove.bind(this);
            this.onMouseLeave = this.onMouseLeave.bind(this);

            this.element.addEventListener('mouseenter', this.onMouseEnter);
            this.element.addEventListener('mousemove', this.onMouseMove);
            this.element.addEventListener('mouseleave', this.onMouseLeave);
        }

        updateDimensions() {
            const rect = this.element.getBoundingClientRect();
            this.width = rect.width;
            this.height = rect.height;
            this.left = rect.left;
            this.top = rect.top;
        }

        onMouseEnter() {
            this.updateDimensions();
            this.setTransition();
        }

        onMouseMove(event) {
            if (this.updateCall !== null) {
                cancelAnimationFrame(this.updateCall);
            }
            this.event = event;
            this.updateCall = requestAnimationFrame(() => this.processMove());
        }

        processMove() {
            const mouseX = (this.event.clientX - this.left) / this.width;
            const mouseY = (this.event.clientY - this.top) / this.height;

            const percentageX = Math.min(Math.max(mouseX, 0), 1);
            const percentageY = Math.min(Math.max(mouseY, 0), 1);

            const reverseFactor = this.options.reverse ? -1 : 1;
            const tiltX = (reverseFactor * (this.options.maxTilt / 2 - percentageY * this.options.maxTilt)).toFixed(2);
            const tiltY = (reverseFactor * (percentageX * this.options.maxTilt - this.options.maxTilt / 2)).toFixed(2);

            this.element.style.transform = `perspective(${this.options.perspective}px) rotateX(${tiltX}deg) rotateY(${tiltY}deg) scale3d(${this.options.scale}, ${this.options.scale}, ${this.options.scale})`;

            if (this.glareElement) {
                const glareX = percentageX * 100;
                const glareY = percentageY * 100;
                this.glareElement.style.transform = `translate(${glareX - 50}%, ${glareY - 50}%) rotate(45deg)`;
                this.glareElement.style.opacity = `${this.options.maxGlare}`;
            }
        }

        onMouseLeave() {
            this.setTransition();
            this.element.style.transform = `perspective(${this.options.perspective}px) rotateX(0deg) rotateY(0deg) scale3d(1, 1, 1)`;

            if (this.glareElement) {
                this.glareElement.style.opacity = '0';
            }
        }

        setTransition() {
            clearTimeout(this.transitionTimeout);
            this.element.style.transition = `transform ${this.options.speed}ms ${this.options.easing}`;
            if (this.glareElement) {
                this.glareElement.style.transition = `opacity ${this.options.speed}ms ${this.options.easing}, transform ${this.options.speed}ms ${this.options.easing}`;
            }

            this.transitionTimeout = setTimeout(() => {
                this.element.style.transition = '';
                if (this.glareElement) this.glareElement.style.transition = '';
            }, this.options.speed);
        }

        destroy() {
            this.element.removeEventListener('mouseenter', this.onMouseEnter);
            this.element.removeEventListener('mousemove', this.onMouseMove);
            this.element.removeEventListener('mouseleave', this.onMouseLeave);
            this.element.style.transform = '';
        }
    }

    function initAllTiltCards() {
        const tiltCards = document.querySelectorAll('[data-tilt], .reland-tilt');
        tiltCards.forEach(card => {
            if (card._relandTilt) return;
            const maxTilt = parseFloat(card.getAttribute('data-tilt-max')) || 10;
            const glare = card.getAttribute('data-tilt-glare') !== 'false';
            card._relandTilt = new RelandTilt(card, { maxTilt, glare });
        });
    }


    /* =========================================================================
       2. HERO SURVEY CONSTELLATION 3D PARTICLE FIELD (HTML5 Canvas)
       ========================================================================= */
    class RelandHeroParticles {
        constructor(canvasId) {
            this.canvas = document.getElementById(canvasId);
            if (!this.canvas) return;

            this.ctx = this.canvas.getContext('2d');
            this.particles = [];
            this.numParticles = 55;
            this.mouse = { x: null, y: null, radius: 140 };
            this.animationFrame = null;

            this.init();
        }

        init() {
            this.resize();
            window.addEventListener('resize', () => this.resize());

            window.addEventListener('mousemove', (e) => {
                const rect = this.canvas.getBoundingClientRect();
                this.mouse.x = e.clientX - rect.left;
                this.mouse.y = e.clientY - rect.top;
            });

            window.addEventListener('mouseleave', () => {
                this.mouse.x = null;
                this.mouse.y = null;
            });

            this.createParticles();
            this.animate();
        }

        resize() {
            this.canvas.width = this.canvas.parentElement.clientWidth || window.innerWidth;
            this.canvas.height = this.canvas.parentElement.clientHeight || window.innerHeight;
        }

        createParticles() {
            this.particles = [];
            for (let i = 0; i < this.numParticles; i++) {
                this.particles.push({
                    x: Math.random() * this.canvas.width,
                    y: Math.random() * this.canvas.height,
                    size: Math.random() * 2.2 + 0.8,
                    speedX: (Math.random() - 0.5) * 0.45,
                    speedY: (Math.random() - 0.5) * 0.45,
                    isBeacon: Math.random() > 0.78,
                    pulse: Math.random() * Math.PI,
                    color: Math.random() > 0.5 ? 'rgba(200, 154, 59,' : 'rgba(56, 189, 248,'
                });
            }
        }

        animate() {
            this.ctx.clearRect(0, 0, this.canvas.width, this.canvas.height);

            for (let i = 0; i < this.particles.length; i++) {
                const p = this.particles[i];

                p.x += p.speedX;
                p.y += p.speedY;

                if (p.x < 0 || p.x > this.canvas.width) p.speedX *= -1;
                if (p.y < 0 || p.y > this.canvas.height) p.speedY *= -1;

                p.pulse += 0.03;
                const alpha = p.isBeacon ? 0.6 + Math.sin(p.pulse) * 0.35 : 0.35;

                this.ctx.beginPath();
                this.ctx.arc(p.x, p.y, p.isBeacon ? p.size * 1.5 : p.size, 0, Math.PI * 2);
                this.ctx.fillStyle = `${p.color} ${alpha})`;
                this.ctx.fill();

                if (p.isBeacon) {
                    this.ctx.beginPath();
                    this.ctx.arc(p.x, p.y, p.size * 3.5 + Math.sin(p.pulse) * 3, 0, Math.PI * 2);
                    this.ctx.strokeStyle = `rgba(200, 154, 59, ${Math.max(0, 0.3 - Math.sin(p.pulse) * 0.2)})`;
                    this.ctx.lineWidth = 1;
                    this.ctx.stroke();
                }

                for (let j = i + 1; j < this.particles.length; j++) {
                    const p2 = this.particles[j];
                    const dx = p.x - p2.x;
                    const dy = p.y - p2.y;
                    const dist = Math.sqrt(dx * dx + dy * dy);

                    if (dist < 130) {
                        this.ctx.beginPath();
                        this.ctx.moveTo(p.x, p.y);
                        this.ctx.lineTo(p2.x, p2.y);
                        const lineAlpha = (1 - dist / 130) * 0.22;
                        this.ctx.strokeStyle = `rgba(200, 154, 59, ${lineAlpha})`;
                        this.ctx.lineWidth = 0.8;
                        this.ctx.stroke();
                    }
                }
            }

            this.animationFrame = requestAnimationFrame(() => this.animate());
        }
    }


    /* =========================================================================
       3. REALISTIC 3D CADASTRAL PLOT & DRONE SURVEY ENGINE (Three.js)
       ========================================================================= */
    class Reland3DVisualizer {
        constructor(containerId, options = {}) {
            this.container = document.getElementById(containerId);
            if (!this.container || typeof THREE === 'undefined') return;

            this.options = Object.assign({
                autoRotate: true,
                showBeacons: true,
                showGrid: true,
                showDrone: true,
                showDimensions: true
            }, options);

            this.scene = null;
            this.camera = null;
            this.renderer = null;
            this.plotGroup = null;
            this.beaconMeshes = [];
            this.flags = [];
            this.droneGroup = null;
            this.dronePropellers = [];
            this.droneScannerCone = null;
            this.dimensionGroup = null;
            this.compassGroup = null;
            this.gridHelper = null;
            this.waterMesh = null;
            this.lights = {};
            this.clock = new THREE.Clock();

            // Simulation Mode State
            this.isSimulating = false;
            this.simulationTime = 0;

            // User Interaction State
            this.isDragging = false;
            this.prevMousePos = { x: 0, y: 0 };
            this.targetRotation = { x: 0.38, y: -0.65 };
            this.currentRotation = { x: 0.38, y: -0.65 };
            this.zoom = 1;

            this.init();
        }

        init() {
            const width = this.container.clientWidth || 500;
            const height = this.container.clientHeight || 440;

            // 1. Scene Setup
            this.scene = new THREE.Scene();

            // 2. Camera Setup with Mobile Adaptive Distance
            const isMobile = window.innerWidth < 640;
            const camDist = isMobile ? 26 : 19;
            this.camera = new THREE.PerspectiveCamera(isMobile ? 42 : 36, width / height, 0.1, 1000);
            this.camera.position.set(camDist, camDist * 0.78, camDist * 1.2);
            this.camera.lookAt(0, 1.2, 0);

            // 3. Renderer Setup
            this.renderer = new THREE.WebGLRenderer({
                antialias: true,
                alpha: true,
                powerPreference: 'high-performance'
            });
            this.renderer.setSize(width, height);
            this.renderer.setPixelRatio(Math.min(window.devicePixelRatio, 2));
            this.renderer.shadowMap.enabled = true;
            this.renderer.shadowMap.type = THREE.PCFSoftShadowMap;
            this.renderer.toneMapping = THREE.ACESFilmicToneMapping;
            this.renderer.toneMappingExposure = 1.15;

            this.container.innerHTML = '';
            this.container.appendChild(this.renderer.domElement);

            // 4. Lighting Setup
            this.setupLighting();

            // 5. Build Realistic Plot Architecture
            this.build3DPlotScene();

            // 6. Bind Controls
            this.bindControls();

            // 7. Window Resize
            window.addEventListener('resize', () => this.onResize());

            // 8. Start Loop
            this.animate();
        }

        setupLighting() {
            // Ambient Soft Base
            this.lights.ambient = new THREE.AmbientLight(0xffffff, 0.75);
            this.scene.add(this.lights.ambient);

            // Sunlight Directional (Golden Hour Warmth)
            this.lights.sun = new THREE.DirectionalLight(0xfff5db, 1.5);
            this.lights.sun.position.set(18, 28, 16);
            this.lights.sun.castShadow = true;
            this.lights.sun.shadow.mapSize.width = 1024;
            this.lights.sun.shadow.mapSize.height = 1024;
            this.lights.sun.shadow.camera.near = 0.5;
            this.lights.sun.shadow.camera.far = 70;
            this.lights.sun.shadow.camera.left = -16;
            this.lights.sun.shadow.camera.right = 16;
            this.lights.sun.shadow.camera.top = 16;
            this.lights.sun.shadow.camera.bottom = -16;
            this.lights.sun.shadow.bias = -0.0005;
            this.scene.add(this.lights.sun);

            // Gold Rim / Horizon Backlight
            this.lights.rim = new THREE.DirectionalLight(0xc89a3b, 0.8);
            this.lights.rim.position.set(-16, 12, -16);
            this.scene.add(this.lights.rim);

            // Sky Fill Light
            this.lights.sky = new THREE.HemisphereLight(0x38bdf8, 0x1e3a8a, 0.35);
            this.scene.add(this.lights.sky);
        }

        build3DPlotScene() {
            this.plotGroup = new THREE.Group();
            this.scene.add(this.plotGroup);

            const plotWidth = 16;
            const plotDepth = 16;
            const baseThickness = 1.3;

            // --- A. Master Pedestal Base (Deep Navy Engineered Slab) ---
            const baseGeo = new THREE.BoxGeometry(plotWidth, baseThickness, plotDepth);
            const baseMat = new THREE.MeshStandardMaterial({
                color: 0x0c1c34,
                roughness: 0.5,
                metalness: 0.25
            });
            const baseMesh = new THREE.Mesh(baseGeo, baseMat);
            baseMesh.position.y = -baseThickness / 2;
            baseMesh.receiveShadow = true;
            this.plotGroup.add(baseMesh);

            // --- B. Earthy Topsoil & Savanna Grass Surface ---
            const surfaceGeo = new THREE.BoxGeometry(plotWidth - 0.15, 0.16, plotDepth - 0.15);
            const surfaceMat = new THREE.MeshStandardMaterial({
                color: 0x275338, // Lush Savanna Grass
                roughness: 0.9,
                metalness: 0.05
            });
            const surfaceMesh = new THREE.Mesh(surfaceGeo, surfaceMat);
            surfaceMesh.position.y = 0.08;
            surfaceMesh.receiveShadow = true;
            this.plotGroup.add(surfaceMesh);

            // Elevated Topographical Terraces (+1420m, +1421m)
            const t1Geo = new THREE.BoxGeometry(11.5, 0.15, 11.5);
            const t1Mat = new THREE.MeshStandardMaterial({ color: 0x306240, roughness: 0.85 });
            const t1 = new THREE.Mesh(t1Geo, t1Mat);
            t1.position.set(-0.8, 0.22, -0.8);
            t1.receiveShadow = true;
            this.plotGroup.add(t1);

            const t2Geo = new THREE.BoxGeometry(7.8, 0.15, 7.8);
            const t2Mat = new THREE.MeshStandardMaterial({ color: 0x3a734c, roughness: 0.85 });
            const t2 = new THREE.Mesh(t2Geo, t2Mat);
            t2.position.set(-1.8, 0.35, -1.8);
            t2.receiveShadow = true;
            this.plotGroup.add(t2);

            // --- C. Town Planning Access Road Corridor (9m Reserve) ---
            const roadGeo = new THREE.BoxGeometry(plotWidth - 0.15, 0.17, 2.8);
            const roadMat = new THREE.MeshStandardMaterial({
                color: 0xb8956e, // Murram / Gravel Road
                roughness: 0.95
            });
            const roadMesh = new THREE.Mesh(roadGeo, roadMat);
            roadMesh.position.set(0, 0.09, 6.0);
            roadMesh.receiveShadow = true;
            this.plotGroup.add(roadMesh);

            // Road Alignment White Dashes
            for (let rx = -6.0; rx <= 6.0; rx += 2.4) {
                const dashGeo = new THREE.BoxGeometry(1.2, 0.02, 0.14);
                const dashMat = new THREE.MeshBasicMaterial({ color: 0xffffff });
                const dash = new THREE.Mesh(dashGeo, dashMat);
                dash.position.set(rx, 0.19, 6.0);
                this.plotGroup.add(dash);
            }

            // Road Reserve Drainage Ditch / Furrow
            const ditchGeo = new THREE.BoxGeometry(plotWidth - 0.15, 0.08, 0.4);
            const ditchMat = new THREE.MeshStandardMaterial({ color: 0x6b533d, roughness: 0.9 });
            const ditch = new THREE.Mesh(ditchGeo, ditchMat);
            ditch.position.set(0, 0.06, 4.4);
            this.plotGroup.add(ditch);

            // --- D. Natural Crystal Water Stream & River Pebbles ---
            const streamPoints = [
                new THREE.Vector3(-7.5, 0.16, -2.5),
                new THREE.Vector3(-4.8, 0.16, -1.0),
                new THREE.Vector3(-2.8, 0.16, 1.2),
                new THREE.Vector3(-3.8, 0.16, 4.0),
                new THREE.Vector3(-5.5, 0.16, 7.5)
            ];
            const streamCurve = new THREE.CatmullRomCurve3(streamPoints);
            const streamGeo = new THREE.TubeGeometry(streamCurve, 36, 0.8, 8, false);
            const streamMat = new THREE.MeshStandardMaterial({
                color: 0x0284c7, // Crystal Flowing Water
                roughness: 0.1,
                metalness: 0.7,
                transparent: true,
                opacity: 0.88
            });
            this.waterMesh = new THREE.Mesh(streamGeo, streamMat);
            this.waterMesh.scale.set(1, 0.22, 1);
            this.plotGroup.add(this.waterMesh);

            // Stream bank pebbles
            const stoneMat = new THREE.MeshStandardMaterial({ color: 0x78716c, roughness: 0.9 });
            const createStone = (x, y, z, sx = 1, sy = 0.7, sz = 1, rot = 0) => {
                const sGeo = new THREE.DodecahedronGeometry(0.3, 1);
                const stone = new THREE.Mesh(sGeo, stoneMat);
                stone.scale.set(sx, sy, sz);
                stone.position.set(x, y, z);
                stone.rotation.y = rot;
                stone.castShadow = true;
                stone.receiveShadow = true;
                this.plotGroup.add(stone);
            };
            createStone(-2.1, 0.24, 0.8, 1.4, 0.8, 1.2, 0.4);
            createStone(-2.5, 0.24, 1.9, 0.9, 0.6, 0.9, 1.2);
            createStone(-4.2, 0.24, 0.3, 1.5, 0.8, 1.3, 0.8);
            createStone(-1.5, 0.24, -0.4, 0.8, 0.5, 0.8, 0.9);

            // Granite Boulders (Mawe ya Asili)
            const boulderMat = new THREE.MeshStandardMaterial({ color: 0x57534e, roughness: 0.95 });
            const createBoulder = (x, z, s = 1) => {
                const bGeo = new THREE.DodecahedronGeometry(0.65 * s, 1);
                const boulder = new THREE.Mesh(bGeo, boulderMat);
                boulder.position.set(x, 0.35 * s, z);
                boulder.castShadow = true;
                boulder.receiveShadow = true;
                this.plotGroup.add(boulder);
            };
            createBoulder(4.0, -4.0, 1.3);
            createBoulder(5.0, -3.2, 0.9);
            createBoulder(-5.0, -4.8, 1.2);
            createBoulder(5.2, 2.4, 1.0);

            // --- E. Indigenous Acacia Trees & Foliage ---
            const createAcacia = (x, z, s = 1) => {
                const tree = new THREE.Group();
                tree.position.set(x, 0.15, z);
                tree.scale.set(s, s, s);

                // Trunk
                const trunkGeo = new THREE.CylinderGeometry(0.09, 0.15, 1.7, 8);
                const trunkMat = new THREE.MeshStandardMaterial({ color: 0x3e2716, roughness: 0.9 });
                const trunk = new THREE.Mesh(trunkGeo, trunkMat);
                trunk.position.y = 0.85;
                trunk.castShadow = true;
                tree.add(trunk);

                // Umbrella Canopies
                const leafMat = new THREE.MeshStandardMaterial({ color: 0x1e4a33, roughness: 0.8 });
                const c1 = new THREE.Mesh(new THREE.CylinderGeometry(1.2, 1.4, 0.22, 12), leafMat);
                c1.position.y = 1.7;
                c1.castShadow = true;
                tree.add(c1);

                const c2 = new THREE.Mesh(new THREE.CylinderGeometry(0.8, 1.0, 0.18, 10), leafMat);
                c2.position.set(0.2, 1.95, 0.1);
                c2.castShadow = true;
                tree.add(c2);

                this.plotGroup.add(tree);
            };
            createAcacia(4.4, -4.6, 1.25);
            createAcacia(-1.2, -5.0, 1.0);
            createAcacia(5.5, -0.6, 1.1);
            createAcacia(5.2, 3.6, 0.85);

            // --- F. High-Precision Survey Station: RTK GNSS Tripod ---
            const tripodGroup = new THREE.Group();
            tripodGroup.position.set(1.6, 0.28, -1.2);
            this.plotGroup.add(tripodGroup);

            const legMat = new THREE.MeshStandardMaterial({ color: 0xf59e0b, roughness: 0.4 });
            const createLeg = (rotY, tiltZ) => {
                const legGeo = new THREE.CylinderGeometry(0.03, 0.03, 1.25, 8);
                const leg = new THREE.Mesh(legGeo, legMat);
                leg.rotation.y = rotY;
                leg.rotation.z = tiltZ;
                leg.position.set(Math.sin(rotY) * 0.2, 0.58, Math.cos(rotY) * 0.2);
                leg.castShadow = true;
                tripodGroup.add(leg);
            };
            createLeg(0, 0.32);
            createLeg((2 * Math.PI) / 3, 0.32);
            createLeg((4 * Math.PI) / 3, 0.32);

            // Tribrach & Antenna
            const tribrach = new THREE.Mesh(new THREE.CylinderGeometry(0.12, 0.12, 0.08, 12), new THREE.MeshStandardMaterial({ color: 0x16325c, metalness: 0.8 }));
            tribrach.position.y = 1.2;
            tripodGroup.add(tribrach);

            const rtkDish = new THREE.Mesh(new THREE.CylinderGeometry(0.2, 0.16, 0.14, 16), new THREE.MeshStandardMaterial({ color: 0xffffff, roughness: 0.2 }));
            rtkDish.position.y = 1.34;
            tripodGroup.add(rtkDish);

            const collar = new THREE.Mesh(new THREE.CylinderGeometry(0.205, 0.205, 0.03, 16), new THREE.MeshStandardMaterial({ color: 0xc89a3b, metalness: 0.9 }));
            collar.position.y = 1.34;
            tripodGroup.add(collar);

            // Satellite Skyward Laser Ray
            const laserGeo = new THREE.CylinderGeometry(0.015, 0.015, 7.0, 8);
            const laserMat = new THREE.MeshBasicMaterial({ color: 0x38bdf8, transparent: true, opacity: 0.55 });
            const laser = new THREE.Mesh(laserGeo, laserMat);
            laser.position.y = 4.8;
            tripodGroup.add(laser);

            // --- G. Authentic Survey Boundaries & Tensioned String Line ---
            const bX1 = -5.5, bX2 = 5.5;
            const bZ1 = -5.5, bZ2 = 4.2;
            const bY = 0.38;

            // 1. Glowing Gold Cadastral Boundary Line
            const boundaryPoints = [
                new THREE.Vector3(bX1, bY, bZ1),
                new THREE.Vector3(bX2, bY, bZ1),
                new THREE.Vector3(bX2, bY, bZ2),
                new THREE.Vector3(bX1, bY, bZ2),
                new THREE.Vector3(bX1, bY, bZ1)
            ];
            const bGeo = new THREE.BufferGeometry().setFromPoints(boundaryPoints);
            const bMat = new THREE.LineDashedMaterial({
                color: 0xdfb256,
                linewidth: 3,
                scale: 1,
                dashSize: 0.8,
                gapSize: 0.35
            });
            const boundaryLine = new THREE.Line(bGeo, bMat);
            boundaryLine.computeLineDistances();
            this.plotGroup.add(boundaryLine);

            // 2. Fluorescent Orange Tensioned Survey String (Kamba ya Mipaka)
            const stringGeo = new THREE.BufferGeometry().setFromPoints(boundaryPoints);
            const stringMat = new THREE.LineBasicMaterial({ color: 0xf97316, linewidth: 2 });
            const stringLine = new THREE.Line(stringGeo, stringMat);
            this.plotGroup.add(stringLine);

            // 3. Subdivision Scheme Line (Ugawaji wa Viwanja)
            const subPoints = [new THREE.Vector3(0, bY, bZ1), new THREE.Vector3(0, bY, bZ2)];
            const subGeo = new THREE.BufferGeometry().setFromPoints(subPoints);
            const subMat = new THREE.LineDashedMaterial({ color: 0x38bdf8, dashSize: 0.5, gapSize: 0.3 });
            const subLine = new THREE.Line(subGeo, subMat);
            subLine.computeLineDistances();
            this.plotGroup.add(subLine);

            // --- H. 6 Ministry Concrete Beacons & Wooden Corner Flags ---
            const beaconSpecs = [
                { x: bX1, z: bZ1, code: 'B1 (SW)' },
                { x: 0.0, z: bZ1, code: 'B2 (Sub)' },
                { x: bX2, z: bZ1, code: 'B3 (SE)' },
                { x: bX2, z: bZ2, code: 'B4 (NE)' },
                { x: 0.0, z: bZ2, code: 'B5 (Sub)' },
                { x: bX1, z: bZ2, code: 'B6 (NW)' }
            ];

            beaconSpecs.forEach((spec, idx) => {
                const beaconGroup = new THREE.Group();
                beaconGroup.position.set(spec.x, 0.25, spec.z);

                // Concrete Pillar Body
                const pillar = new THREE.Mesh(
                    new THREE.CylinderGeometry(0.18, 0.24, 0.85, 12),
                    new THREE.MeshStandardMaterial({ color: 0xf1f5f9, roughness: 0.75 })
                );
                pillar.position.y = 0.42;
                pillar.castShadow = true;
                beaconGroup.add(pillar);

                // Ministry Red Cap
                const redCap = new THREE.Mesh(
                    new THREE.CylinderGeometry(0.182, 0.19, 0.2, 12),
                    new THREE.MeshStandardMaterial({ color: 0xdc2626, roughness: 0.6 })
                );
                redCap.position.y = 0.75;
                beaconGroup.add(redCap);

                // Brass Center Pin
                const pin = new THREE.Mesh(
                    new THREE.SphereGeometry(0.09, 16, 16),
                    new THREE.MeshStandardMaterial({ color: 0xdfb256, metalness: 0.95, roughness: 0.1 })
                );
                pin.position.y = 0.88;
                beaconGroup.add(pin);

                // Holographic Radar Ping Ring
                const ringGeo = new THREE.RingGeometry(0.3, 0.52, 32);
                ringGeo.rotateX(-Math.PI / 2);
                const ringMat = new THREE.MeshBasicMaterial({ color: 0xdfb256, side: THREE.DoubleSide, transparent: true, opacity: 0.8 });
                const ring = new THREE.Mesh(ringGeo, ringMat);
                ring.position.y = 0.08;
                beaconGroup.add(ring);

                // Vertical Coordinate Light Ray
                const rayGeo = new THREE.CylinderGeometry(0.016, 0.016, 2.8, 8);
                const rayMat = new THREE.MeshBasicMaterial({ color: 0xdfb256, transparent: true, opacity: 0.45 });
                const ray = new THREE.Mesh(rayGeo, rayMat);
                ray.position.y = 2.2;
                beaconGroup.add(ray);

                // Wooden Peg with Fluttering Red Ribbon Flag
                const peg = new THREE.Mesh(
                    new THREE.CylinderGeometry(0.02, 0.02, 1.1, 8),
                    new THREE.MeshStandardMaterial({ color: 0x854d0e, roughness: 0.9 })
                );
                peg.position.set(0.35, 0.55, 0.35);
                beaconGroup.add(peg);

                const flagGeo = new THREE.PlaneGeometry(0.28, 0.18);
                const flagMat = new THREE.MeshBasicMaterial({ color: 0xef4444, side: THREE.DoubleSide });
                const flag = new THREE.Mesh(flagGeo, flagMat);
                flag.position.set(0.5, 1.0, 0.35);
                beaconGroup.add(flag);
                this.flags.push(flag);

                this.beaconMeshes.push({ group: beaconGroup, ring: ring, ray: ray });
                this.plotGroup.add(beaconGroup);
            });

            // --- I. 3D Survey Drone (Quadcopter with LiDAR Scanning Beam) ---
            this.buildSurveyDrone();

            // --- J. 3D Cadastral North Compass Arrow ---
            this.buildNorthCompass();

            // --- K. Cadastral Spatial Coordinate Grid ---
            this.gridHelper = new THREE.GridHelper(20, 20, 0xc89a3b, 0x16325c);
            this.gridHelper.position.y = -baseThickness;
            this.plotGroup.add(this.gridHelper);
        }

        buildSurveyDrone() {
            this.droneGroup = new THREE.Group();
            this.droneGroup.position.set(-2.0, 4.2, 0);
            this.plotGroup.add(this.droneGroup);

            // Drone Body (Carbon White & Gold)
            const bodyGeo = new THREE.BoxGeometry(0.6, 0.16, 0.6);
            const bodyMat = new THREE.MeshStandardMaterial({ color: 0xffffff, roughness: 0.3 });
            const body = new THREE.Mesh(bodyGeo, bodyMat);
            body.castShadow = true;
            this.droneGroup.add(body);

            // Central GPS Dome (Gold)
            const domeGeo = new THREE.SphereGeometry(0.14, 16, 16);
            const domeMat = new THREE.MeshStandardMaterial({ color: 0xc89a3b, metalness: 0.9 });
            const dome = new THREE.Mesh(domeGeo, domeMat);
            dome.position.y = 0.12;
            this.droneGroup.add(dome);

            // 4 Quadcopter Arms & Motors
            const armMat = new THREE.MeshStandardMaterial({ color: 0x1e293b, metalness: 0.7 });
            const propMat = new THREE.MeshBasicMaterial({ color: 0x0f172a, transparent: true, opacity: 0.7 });
            const armCoords = [
                { x: 0.5, z: 0.5 },
                { x: -0.5, z: 0.5 },
                { x: 0.5, z: -0.5 },
                { x: -0.5, z: -0.5 }
            ];

            armCoords.forEach((coord) => {
                const arm = new THREE.Mesh(new THREE.CylinderGeometry(0.03, 0.03, 0.7, 8), armMat);
                arm.rotation.z = Math.PI / 2;
                arm.rotation.y = Math.atan2(coord.z, coord.x);
                arm.position.set(coord.x * 0.5, 0, coord.z * 0.5);
                this.droneGroup.add(arm);

                // Motor
                const motor = new THREE.Mesh(new THREE.CylinderGeometry(0.07, 0.07, 0.09, 12), armMat);
                motor.position.set(coord.x, 0.05, coord.z);
                this.droneGroup.add(motor);

                // Propeller
                const prop = new THREE.Mesh(new THREE.BoxGeometry(0.6, 0.01, 0.05), propMat);
                prop.position.set(coord.x, 0.1, coord.z);
                this.droneGroup.add(prop);
                this.dronePropellers.push(prop);
            });

            // Camera Gimbal
            const gimbal = new THREE.Mesh(new THREE.SphereGeometry(0.09, 12, 12), new THREE.MeshStandardMaterial({ color: 0x0284c7 }));
            gimbal.position.y = -0.12;
            this.droneGroup.add(gimbal);

            // Dynamic Green LiDAR Laser Scanning Cone
            const coneGeo = new THREE.ConeGeometry(2.4, 4.0, 24, 1, true);
            coneGeo.rotateX(Math.PI);
            const coneMat = new THREE.MeshBasicMaterial({
                color: 0x10b981, // Emerald Green LiDAR Laser
                transparent: true,
                opacity: 0.28,
                side: THREE.DoubleSide,
                depthWrite: false
            });
            this.droneScannerCone = new THREE.Mesh(coneGeo, coneMat);
            this.droneScannerCone.position.y = -2.0;
            this.droneGroup.add(this.droneScannerCone);
        }

        buildNorthCompass() {
            this.compassGroup = new THREE.Group();
            this.compassGroup.position.set(6.2, 0.6, -6.2);
            this.plotGroup.add(this.compassGroup);

            // Outer Brass Ring
            const ringGeo = new THREE.RingGeometry(0.45, 0.52, 32);
            ringGeo.rotateX(-Math.PI / 2);
            const ringMat = new THREE.MeshBasicMaterial({ color: 0xc89a3b, side: THREE.DoubleSide });
            const ring = new THREE.Mesh(ringGeo, ringMat);
            this.compassGroup.add(ring);

            // North Pointer (Red)
            const northGeo = new THREE.ConeGeometry(0.14, 0.45, 8);
            northGeo.rotateX(-Math.PI / 2);
            const northMat = new THREE.MeshBasicMaterial({ color: 0xef4444 });
            const north = new THREE.Mesh(northGeo, northMat);
            north.position.set(0, 0.02, -0.22);
            this.compassGroup.add(north);

            // South Pointer (White)
            const southGeo = new THREE.ConeGeometry(0.14, 0.45, 8);
            southGeo.rotateX(Math.PI / 2);
            const southMat = new THREE.MeshBasicMaterial({ color: 0xffffff });
            const south = new THREE.Mesh(southGeo, southMat);
            south.position.set(0, 0.02, 0.22);
            this.compassGroup.add(south);
        }

        bindControls() {
            const dom = this.renderer.domElement;

            const onPointerDown = (e) => {
                this.isDragging = true;
                this.prevMousePos = {
                    x: e.clientX || (e.touches && e.touches[0].clientX),
                    y: e.clientY || (e.touches && e.touches[0].clientY)
                };
            };

            const onPointerMove = (e) => {
                if (!this.isDragging) return;
                const clientX = e.clientX || (e.touches && e.touches[0].clientX);
                const clientY = e.clientY || (e.touches && e.touches[0].clientY);
                if (clientX === undefined) return;

                const deltaX = clientX - this.prevMousePos.x;
                const deltaY = clientY - this.prevMousePos.y;

                this.targetRotation.y += deltaX * 0.008;
                this.targetRotation.x = Math.max(0.15, Math.min(0.85, this.targetRotation.x + deltaY * 0.008));

                this.prevMousePos = { x: clientX, y: clientY };
            };

            const onPointerUp = () => {
                this.isDragging = false;
            };

            dom.style.touchAction = 'none';

            const onTouchMove = (e) => {
                if (!this.isDragging || !e.touches || !e.touches[0]) return;
                const clientX = e.touches[0].clientX;
                const clientY = e.touches[0].clientY;

                const deltaX = clientX - this.prevMousePos.x;
                const deltaY = clientY - this.prevMousePos.y;

                this.targetRotation.y += deltaX * 0.008;
                this.targetRotation.x = Math.max(0.15, Math.min(0.85, this.targetRotation.x + deltaY * 0.008));

                this.prevMousePos = { x: clientX, y: clientY };
            };

            dom.addEventListener('mousedown', onPointerDown);
            window.addEventListener('mousemove', onPointerMove);
            window.addEventListener('mouseup', onPointerUp);

            dom.addEventListener('touchstart', onPointerDown, { passive: true });
            dom.addEventListener('touchmove', onTouchMove, { passive: true });
            window.addEventListener('touchend', onPointerUp);

            dom.addEventListener('wheel', (e) => {
                e.preventDefault();
                const zoomFactor = e.deltaY * 0.001;
                this.zoom = Math.max(0.7, Math.min(1.4, this.zoom + zoomFactor));
                this.camera.position.set(19 * this.zoom, 15 * this.zoom, 23 * this.zoom);
                this.camera.lookAt(0, 1.5, 0);
            }, { passive: false });
        }

        toggleAutoRotate() {
            this.options.autoRotate = !this.options.autoRotate;
            return this.options.autoRotate;
        }

        toggleBeacons() {
            this.options.showBeacons = !this.options.showBeacons;
            this.beaconMeshes.forEach(b => {
                b.group.visible = this.options.showBeacons;
            });
            return this.options.showBeacons;
        }

        toggleGrid() {
            this.options.showGrid = !this.options.showGrid;
            if (this.gridHelper) {
                this.gridHelper.visible = this.options.showGrid;
            }
            return this.options.showGrid;
        }

        toggleDrone() {
            this.options.showDrone = !this.options.showDrone;
            if (this.droneGroup) {
                this.droneGroup.visible = this.options.showDrone;
            }
            return this.options.showDrone;
        }

        startSurveySimulation() {
            this.isSimulating = true;
            this.simulationTime = 0;
            this.options.autoRotate = false;
            this.targetRotation = { x: 0.45, y: -0.4 };
        }

        resetView() {
            this.isSimulating = false;
            this.targetRotation = { x: 0.38, y: -0.65 };
            this.zoom = 1;
            const isMobile = window.innerWidth < 640;
            const camDist = isMobile ? 26 : 19;
            this.camera.position.set(camDist, camDist * 0.78, camDist * 1.2);
            this.camera.lookAt(0, 1.2, 0);
        }

        onResize() {
            if (!this.container || !this.renderer || !this.camera) return;
            const width = this.container.clientWidth;
            const height = this.container.clientHeight;
            const isMobile = window.innerWidth < 640;
            this.camera.fov = isMobile ? 42 : 36;
            this.camera.aspect = width / height;
            this.camera.updateProjectionMatrix();
            this.renderer.setSize(width, height);
        }

        animate() {
            requestAnimationFrame(() => this.animate());

            const delta = this.clock.getDelta();
            const elapsed = this.clock.getElapsedTime();

            // Auto-Rotate
            if (this.options.autoRotate && !this.isDragging && !this.isSimulating) {
                this.targetRotation.y += 0.004;
            }

            // Smooth Interpolation
            this.currentRotation.x += (this.targetRotation.x - this.currentRotation.x) * 0.08;
            this.currentRotation.y += (this.targetRotation.y - this.currentRotation.y) * 0.08;

            if (this.plotGroup) {
                this.plotGroup.rotation.x = this.currentRotation.x;
                this.plotGroup.rotation.y = this.currentRotation.y;
            }

            // Animate Propellers
            if (this.dronePropellers.length > 0) {
                this.dronePropellers.forEach((p, i) => {
                    p.rotation.y += (i % 2 === 0 ? 0.4 : -0.4);
                });
            }

            // Animate Drone Flight Path
            if (this.droneGroup && this.options.showDrone) {
                const droneX = Math.sin(elapsed * 0.7) * 4.2;
                const droneZ = Math.cos(elapsed * 0.5) * 3.8;
                const droneY = 4.2 + Math.sin(elapsed * 1.8) * 0.25;
                this.droneGroup.position.set(droneX, droneY, droneZ);

                // Subtle bank tilt
                this.droneGroup.rotation.z = Math.cos(elapsed * 0.7) * -0.12;
                this.droneGroup.rotation.x = Math.sin(elapsed * 0.5) * 0.12;

                // Pulsing Green LiDAR scanner cone
                if (this.droneScannerCone) {
                    const scanScale = 1.0 + Math.sin(elapsed * 4) * 0.15;
                    this.droneScannerCone.scale.set(scanScale, 1.0, scanScale);
                    this.droneScannerCone.material.opacity = 0.25 + Math.sin(elapsed * 3) * 0.12;
                }
            }

            // Animate GPS Beacon Radar Waves & Beams
            if (this.options.showBeacons) {
                this.beaconMeshes.forEach((b, i) => {
                    const pulse = (elapsed * 2 + i * 1.1) % 2;
                    const scale = 1 + pulse * 1.5;
                    const opacity = Math.max(0, 0.85 - pulse * 0.45);
                    b.ring.scale.set(scale, scale, scale);
                    b.ring.material.opacity = opacity;
                    b.ray.material.opacity = 0.3 + Math.sin(elapsed * 3 + i) * 0.2;
                });
            }

            // Animate Fluttering Survey Flags
            if (this.flags.length > 0) {
                this.flags.forEach((flag, i) => {
                    flag.rotation.y = Math.sin(elapsed * 5 + i) * 0.3;
                });
            }

            // Animate Compass Rose floating bob
            if (this.compassGroup) {
                this.compassGroup.position.y = 0.6 + Math.sin(elapsed * 2) * 0.06;
            }

            this.renderer.render(this.scene, this.camera);
        }
    }


    /* =========================================================================
       5. HERO LUXURY WORD FLIPPER & GNSS TELEMETRY TICKER
       ========================================================================= */
    function initHeroWordFlipper() {
        const track = document.getElementById('hero-flipper-track');
        if (!track) return;

        const items = track.querySelectorAll('.word-flipper-item');
        if (items.length <= 1) return;

        let currentIndex = 0;
        const totalItems = items.length;

        setInterval(() => {
            currentIndex = (currentIndex + 1) % totalItems;
            track.style.transform = `translateY(-${currentIndex * 1.3}em)`;
        }, 3200);
    }

    function initHeroGNSSTelemetry() {
        const coordElem = document.getElementById('hero-live-coords');
        const satsElem = document.getElementById('hero-live-sats');
        if (!coordElem) return;

        // Base Arusha UTM / Geographic Datum Point
        let baseLat = 3.3718;
        let baseLon = 36.6847;

        setInterval(() => {
            const jitterLat = (Math.random() - 0.5) * 0.00008;
            const jitterLon = (Math.random() - 0.5) * 0.00008;
            const curLat = (baseLat + jitterLat).toFixed(5);
            const curLon = (baseLon + jitterLon).toFixed(5);

            coordElem.textContent = `LAT: 03°22'${(curLat.split('.')[1] / 1000).toFixed(1)}"S  LON: 36°41'${(curLon.split('.')[1] / 1000).toFixed(1)}"E`;
            
            if (satsElem) {
                const sats = 18 + Math.floor(Math.random() * 5);
                satsElem.textContent = `${sats}/24 Sats Locked`;
            }
        }, 2500);
    }

    /* =========================================================================
       6. INITIALIZE GLOBAL SUITE & HUD BUTTONS
       ========================================================================= */
    window.Reland3D = {
        Tilt: RelandTilt,
        HeroParticles: RelandHeroParticles,
        Visualizer: Reland3DVisualizer,
        instances: {}
    };

    document.addEventListener('DOMContentLoaded', () => {
        // Initialize 3D Tilt on cards
        initAllTiltCards();

        // Initialize Hero Word Flipper & GNSS Telemetry Ticker
        initHeroWordFlipper();
        initHeroGNSSTelemetry();

        // Initialize Hero particles
        if (document.getElementById('reland-hero-canvas')) {
            window.Reland3D.instances.heroParticles = new RelandHeroParticles('reland-hero-canvas');
        }

        // Initialize Interactive 3D WebGL Plot Visualizer
        if (document.getElementById('reland-3d-viewport')) {
            window.Reland3D.instances.visualizer = new Reland3DVisualizer('reland-3d-viewport');

            const btnRotate = document.getElementById('btn-3d-rotate');
            const btnBeacons = document.getElementById('btn-3d-beacons');
            const btnDrone = document.getElementById('btn-3d-drone');
            const btnGrid = document.getElementById('btn-3d-grid');
            const btnSimulate = document.getElementById('btn-3d-simulate');
            const btnReset = document.getElementById('btn-3d-reset');

            if (btnRotate) {
                btnRotate.addEventListener('click', () => {
                    const active = window.Reland3D.instances.visualizer.toggleAutoRotate();
                    btnRotate.classList.toggle('bg-[#c89a3b]', active);
                    btnRotate.classList.toggle('text-[#0c1c34]', active);
                    btnRotate.classList.toggle('text-white', !active);
                });
            }

            if (btnBeacons) {
                btnBeacons.addEventListener('click', () => {
                    const active = window.Reland3D.instances.visualizer.toggleBeacons();
                    btnBeacons.classList.toggle('bg-[#c89a3b]', active);
                    btnBeacons.classList.toggle('text-[#0c1c34]', active);
                    btnBeacons.classList.toggle('text-white', !active);
                });
            }

            if (btnDrone) {
                btnDrone.addEventListener('click', () => {
                    const active = window.Reland3D.instances.visualizer.toggleDrone();
                    btnDrone.classList.toggle('bg-[#c89a3b]', active);
                    btnDrone.classList.toggle('text-[#0c1c34]', active);
                    btnDrone.classList.toggle('text-white', !active);
                });
            }

            if (btnGrid) {
                btnGrid.addEventListener('click', () => {
                    const active = window.Reland3D.instances.visualizer.toggleGrid();
                    btnGrid.classList.toggle('bg-[#c89a3b]', active);
                    btnGrid.classList.toggle('text-[#0c1c34]', active);
                    btnGrid.classList.toggle('text-white', !active);
                });
            }

            if (btnSimulate) {
                btnSimulate.addEventListener('click', () => {
                    window.Reland3D.instances.visualizer.startSurveySimulation();
                    btnSimulate.classList.add('animate-pulse');
                    setTimeout(() => btnSimulate.classList.remove('animate-pulse'), 3000);
                });
            }

            if (btnReset) {
                btnReset.addEventListener('click', () => {
                    window.Reland3D.instances.visualizer.resetView();
                });
            }
        }
    });

})();
