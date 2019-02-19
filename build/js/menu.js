var menu = new Vue({
	el:"#menuButton",
	data:{
	},
	beforeMount(){
		this.init();
		
	},
	methods:{
		init(){
			console.log('menu Ready')
		},
		menuClick(){
			if(!$("body").hasClass("menu-active")){
				this.activateMenu();
			}
			else{
				this.deactivateMenu();
			}
		},
		activateMenu(){
			$("body").addClass("menu-active");
		},
		deactivateMenu(){
			$("body").removeClass("menu-active")

		}
	}

})


