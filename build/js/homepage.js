class Homepage{


	constructor(){
		const parentClass = this;
		this.init();
	}
	init(){
		this.particles();
		this.introStart();
		this.checkSound();
		this.panelChanges();
		this.createSmallMenu();
		this.menuAnimation();
		this.initTilt();
		this.projectScripts();
	}
	projectScripts(){
		$(".show-all-projects .single-project .logo").click(function(){
			var parent = $(this).parent();
			if(!parent.hasClass('project-active')){
				parent.addClass("project-active");
			}
			else{
				parent.removeClass("project-active");
			}
		});
	}
	panelChanges(){
		TweenMax.set($(".holo-ui"),{opacity:1,scaleY:0});
		var panelChangesThis = this;

		//animate camera
		function cameraAnimate(delay){
			TweenMax.to(particles.rotation,7,{x:particles.rotation.x + 1,y:particles.rotation.y + 1,ease:Power4.easeOut,delay:delay});
		}
		//animate current one out
		function animateCurrent(delay,thisParams){

		    var hideUI = new TimelineMax({paused:false});
		    hideUI.to($(".active-panel"),1,{opacity:0,scaleY:0,ease:Power4.easeOut});
		    //$(".active-panel").removeClass("active-panel");
		}
		//animate next one in
		function animateNext(delay,thisParams){
		    var toChangeName = '#' + $(thisParams).data("change-to")+'Change';
		    var toChange = $(toChangeName);
		    console.log(toChange);
		    var showUI = new TimelineMax({paused:false,delay:delay});
		    showUI.to(toChange,1,{opacity:1,scaleY:1,ease:Power4.easeOut});
		    toChange.addClass("active-panel");
		}

		$(".change-state").click(function(){
		    if($(".active-panel")[0] === undefined){
		 		animateNext(3,this);
		 		panelChangesThis.playPanelSound(3000);
		 		window.smallMenuTimeline.play();
		    }

		    else{
		    	animateCurrent(0,this);
		    	cameraAnimate(0.7);
		    	animateNext(3,this);

		    }
		});
	}
	menuAnimation(action){
		window.smallMenuTimeline = new TimelineMax({paused:true});
		smallMenuTimeline.from($(".small-menu-container"),1,{y:100,opacity:0,scale:1.3,ease:Power4.easeOut});
		smallMenuTimeline.staggerFrom($(".small-menu-container .menu-word .word"),0.5,{x:100,opacity:0,ease:Power4.easeOut},0.05);
	}
	initTilt(){
		// $(".holo-ui").tilt({
		// maxTilt:3
		// });
	}
	playPanelSound(delay = 0){
		setTimeout(function(){
			document.querySelector("#panelSound").play();
		},delay);	
	}
	playWhoosh(delay = 0){
		setTimeout(function(){
			document.querySelector("#whooshSound").play();
		},delay);
	}
	bindHoverAndClickSounds(){
		$(".hover-sound").mouseover(function(){
			var hoverSound = document.querySelector('#hoverButtonSound');
			if(!hoverSound.paused){
				hoverSound.pause();
				hoverSound.currentTime = 0;
				hoverSound.play();
			}
			hoverSound.play();
		});
		$(".click-sound").click(function(){
			var clickSound = document.querySelector('#buttonClickSound');
			if(!clickSound.paused){
				clickSound.pause();
				clickSound.currentTime = 0;
				clickSound.play();
			}
			clickSound.play();
		});
	}
	checkSound(){
		//intro animation
		var checkSoundParent = this;
		let introTimeline = new TimelineMax({paused:true})
		introTimeline.from(particles.rotation,5,{y:10,x:1,ease:Power2.easeOut});
		introTimeline.from(particles.position,2,{z:-400,ease:Power2.easeOut},0);
		introTimeline.from($("#introPlay"),1,{y:100,opacity:0,ease:Power4.easeOut},2);
		var promise = document.querySelector('#ambientSound').play();
		if (promise !== undefined) {
		     promise.then(_ => {
		     // Autoplay started!
		     	introTimeline.play()
				document.querySelector('#ambientSound').play();
				checkSoundParent.bindHoverAndClickSounds();
				document.querySelector('#whooshSound').play();
				$("#audioRequest").remove();
		 }).catch(error => {
		    // Autoplay was prevented.
		    // Show a "Play" button so that user can start playback.
		    this.createAudioRequest('request');
		    var parentThis = this;
			$("#sendAudioRequest").click(function(){
				parentThis.createAudioRequest('accepted');
				document.querySelector('#ambientSound').play();
				document.querySelector('#buttonClickSound').play();
				introTimeline.play();
				checkSoundParent.bindHoverAndClickSounds();
				document.querySelector('#whooshSound').play();
			});
		  });
		}
	}
	introStart(){
		//enter button click
		$("#introPlay").click(function(){
			TweenMax.to($("#introPlay"),1,{
				y:100,
				opacity:0,
				ease:Power4.easeOut,
				onComplete:function(){
					intro = false;
					document.querySelector('#whooshSound').play();
					$("#introPlay").remove();
				}
			});
		});
	}
	createAudioRequest(req){
		TweenMax.set($("#audioRequest"),{opacity:1})
		var audioRequestTimeline = new TimelineMax({paused:true,delay:1})
		audioRequestTimeline.from($("#audioRequest"),1,{yPercent:100,opacity:0,ease:Power4.easeOut});
		if(req === 'request'){
			audioRequestTimeline.play();
		}
		else{
			TweenMax.to($("#audioRequest"),1,{
				opacity:0,
				y:200,
				ease:Power4.easeIn,
				onComplete:function(){
					$("#audioRequest").remove();
				}
			});
		}
	}
	createSmallMenu(){
		var smallMenu = document.getElementById( "smallMenu" );
		var scenesmallMenu = new THREE.Scene();
		var camerasmallMenu = new THREE.PerspectiveCamera( 45, 1, 0.1, 1000 );

		var renderersmallMenu = new THREE.WebGLRenderer( { alpha: true, canvas: smallMenu } );
		renderersmallMenu.setSize( 200, 200 );


		// create a wireframe material
		var materialsmallMenu = new THREE.MeshBasicMaterial( {
		  color: 0x36ddf7,
		  wireframe: true
		} );

		// create a sphere and assign the material
		var meshsmallMenu = new THREE.Mesh(
		  new THREE.IcosahedronGeometry( 5, 1 ),
		  materialsmallMenu
		);

		scenesmallMenu.add( meshsmallMenu );

		//the geometry of our mesh
		var geosmallMenu = meshsmallMenu.geometry;
		var original_verticessmallMenu = geosmallMenu.vertices;


		camerasmallMenu.position.z = 15;

		var rendersmallMenu = function () {

		  meshsmallMenu.rotation.x += 0.002;
		  meshsmallMenu.rotation.y += 0.002;
		  requestAnimationFrame( rendersmallMenu );
		  renderersmallMenu.render( scenesmallMenu, camerasmallMenu );

		};

		rendersmallMenu();

	}
	particles(){
		(function(){var script=document.createElement('script');script.onload=function(){var stats=new Stats();document.body.appendChild(stats.dom);requestAnimationFrame(function loop(){stats.update();requestAnimationFrame(loop)});};script.src='//mrdoob.github.io/stats.js/build/stats.min.js';document.head.appendChild(script);})()
		var canvas = document.querySelector("#canvas");
		var camera, tick = 0,
			scene, renderer, clock = new THREE.Clock(),
			controls, container,
			options, spawnerOptions, particleSystem;
		var stats;

		init();
		animate();
		function init() {

			container = document.getElementById( 'container' );

			camera = new THREE.PerspectiveCamera( 28, window.innerWidth / window.innerHeight, 1, 10000 );
			camera.position.z = 100;

			scene = new THREE.Scene();

			// The GPU Particle system extends THREE.Object3D, and so you can use it
			// as you would any other scene graph component.	Particle positions will be
			// relative to the position of the particle system, but you will probably only need one
			// system for your whole scene

			particleSystem = new THREE.GPUParticleSystem( {
				maxParticles: 350000
			} );

			scene.add(particleSystem);
			window.particles = particleSystem

			// options passed during each spawned

			options = {
				position: new THREE.Vector3(),
				positionRandomness: 15,
				velocity: new THREE.Vector3(),
				velocityRandomness: 0.5,
				color: 0x145463,
				colorRandomness: .2,
				turbulence: 0,
				lifetime: 5,
				size: 5,
				sizeRandomness: 1
			};

			spawnerOptions = {
				spawnRate: 20000,
				horizontalSpeed: 1.5,
				verticalSpeed: 1.33,
				timeScale: 1
			};

			renderer = new THREE.WebGLRenderer({canvas:canvas,alpha:true});
			renderer.setClearColor( 0x000000, 0 ); // the default
			renderer.setPixelRatio( window.devicePixelRatio );
			renderer.setSize( window.innerWidth, window.innerHeight );

			controls = new THREE.TrackballControls( camera, renderer.domElement );
			controls.rotateSpeed = 5.0;
			controls.zoomSpeed = 2.2;
			controls.panSpeed = 1;
			controls.dynamicDampingFactor = 0.3;
			controls.maxDistance = 800
			controls.minDistance = 80
			window.controls = controls

			window.addEventListener( 'resize', onWindowResize, false );
		}

		function onWindowResize() {
			camera.aspect = window.innerWidth / window.innerHeight;
			camera.updateProjectionMatrix();
			renderer.setSize( window.innerWidth, window.innerHeight );

		}
		window.intro = true;
		window.xyz = [0,0,0]
		function animate() {
			requestAnimationFrame( animate );
			controls.update();
			var delta = clock.getDelta() * spawnerOptions.timeScale;
			tick += delta;

			if ( tick < 0 ) tick = 0;

			if ( delta > 0 ) {

				if(intro){

					options.position.x = Math.sin( tick * spawnerOptions.horizontalSpeed ) * 0;
					options.position.y = Math.sin( tick * spawnerOptions.verticalSpeed ) * 0;
					options.position.z = Math.sin( tick * spawnerOptions.horizontalSpeed + spawnerOptions.verticalSpeed ) * 0;
					spawnerOptions.timeScale = 3
					for ( var x = 0; x < spawnerOptions.spawnRate * delta; x ++ ) {

						// Yep, that's really it.	Spawning particles is super cheap, and once you spawn them, the rest of
						// their lifecycle is handled entirely on the GPU, driven by a time uniform updated below

						particleSystem.spawnParticle( options );

					}
				}
				if(!intro){
						options.turbulence = 2.5;
						options.lifetime = 200;
						setTimeout(function(){
							afterIntroSettings()
						},2000)

					for ( var x = 0; x < spawnerOptions.spawnRate * delta; x ++ ) {

						// Yep, that's really it.	Spawning particles is super cheap, and once you spawn them, the rest of
						// their lifecycle is handled entirely on the GPU, driven by a time uniform updated below

						particleSystem.spawnParticle( options );

					}
				}

			}
			particleSystem.update( tick );
			render();
		}
		function render() {
			renderer.render( scene, camera );
		}
		var counter = 1;
		var xPos = 0;
		var yPos = 0;
		var zPos = 0;
		var upDown = 'up';
		var times = 0;
		var maxY = 25;
		var maxX = 40;
		var minY = 10;
		var minX = 10;
		function afterIntroSettings(){
					//make sure the particle does not go over or under their max values when increasing or decreasing distances
					if(upDown == 'up'){
						if(counter < 20){
						counter++;
						}
						else{
							counter = 0;
							 xPos += 1;
							 yPos += 1;
							 zPos += 1;
							 times+=1;
						}
						if(times == 40){
							upDown = 'down';
						}

					}
					if(upDown == 'down'){
						if(counter < 20){
						counter++;
						}
						else{
							counter = 0;
							 xPos  -= 1;
							 yPos  -= 1;
							 zPos  -= 1;
							 times -=1;
						}
						if(times == 10){
							upDown = 'up';
						}
					}
					if(yPos > maxY && upDown == 'up'){
						yPos = maxY;
					}
					if(xPos > maxX && upDown == 'up'){
						xPos = maxX;
					}

					if(yPos < minY && upDown == 'down'){
						yPos = minY;
					}
					if(xPos < minX && upDown == 'down'){
						xPos = minX;
					}
					options.position.x = Math.sin( tick * spawnerOptions.horizontalSpeed )   * xPos;
					options.position.y = Math.sin( tick * spawnerOptions.verticalSpeed )   *  yPos;
					options.position.z = Math.sin( tick * spawnerOptions.horizontalSpeed + spawnerOptions.verticalSpeed )   * zPos ;
					options.lifetime = 400;
					options.turbulence = 2.5;
					 options.size = 4;
					 spawnerOptions.timeScale = 1.5;
					 options.positionRandomness = 1;
		}

		window.camera = camera
		
	}
}
new Homepage();

