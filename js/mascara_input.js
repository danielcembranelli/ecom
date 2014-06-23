(function($){
    $(function(){
		$('input:text').setMask();
        $('celular') 
.mask("(99) 99999999?9") 
.live('focusout', function (event) { 
var target, phone, element; 
target = (event.currentTarget) ? event.currentTarget : event.srcElement; 
phone = target.value.replace(/\D/g, ''); 
element = $(target); 
element.unmask(); 
if(phone.length > 10) { 
element.mask("(99) 99999-999?9"); 
} else { 
element.mask("(99) 9999-9999?9"); 
} 
}); 

    });
})(jQuery);