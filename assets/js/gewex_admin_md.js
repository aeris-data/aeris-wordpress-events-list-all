(function($){
	
$(document).ready(function(){
	
	var converter = new showdown.Converter();
	converter.setOption('literalMidWordUnderscores', true);
	
	
	
	if(typeof $('.content')[0] !== "undefined") {
		 var text      = $('.content')[0].innerHTML;
		
		 var html      = converter.makeHtml(text);
		
		 $('.content').html(html);
		
	}
   
});

})(jQuery);
