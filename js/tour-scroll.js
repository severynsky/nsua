(function(){
	window.addEventListener('load', function(){setTimeout(function(){sartAnima();},500); });

function sartAnima(){
	var scrollController = new ScrollMagic.Controller();
		jQuery('.arthide').each(function(){
		var myScene = new ScrollMagic.Scene({
					triggerElement:this,
					triggerHook: .75,
					reverse:false,
			})
			.setClassToggle(this,'arthide_show')
			// .addIndicators()
			.addTo(scrollController);
		});	
}	

})();
