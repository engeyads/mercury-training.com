<?php
function autoChange($viewName, $name,$row,$type){
	global $id;
	if($type == ''){ $type = 'input'; }
	$val =htmlspecialchars($row["{$name}"]);
	
	?><div class="inputcontainer"><?php
    if($type == 'input'){
        ?><input type="text" mainIdValue="<?php echo $id; ?>" title="<?php echo $viewName; ?>" name="<?php echo $name; ?>" value="<?php echo $val; ?>"/><?php
    }elseif($type == 'textarea'){
        ?><textarea mainIdValue="<?php echo $id; ?>" title="<?php echo $viewName; ?>" name="<?php echo $name; ?>"><?php echo $val ; ?></textarea><?php
    };
	?></div><?php
}
?><script>
var nn=0;
myfunction = function(){
	var thisInput = $(this),
	thisInputName =thisInput.attr("name"),
	thisInputMainIdValue =thisInput.attr("mainIdValue"),
	thisInputTitle =thisInput.attr("title"),
	thisInputValue =thisInput.val();
	thisInput.parent().children(".icon-container").children(".loaderI").addClass( "loader" );
	$.post( "cities/update.php" ,{ thisInputMainIdValue: thisInputMainIdValue, InputTitle: thisInputTitle, inputName: thisInputName, inputValue: thisInputValue}, function( v ) {
		
		var jsonString = v;
		var point = JSON.parse(jsonString);
		//alert(point.val);
		
		thisInput.val(point.val);
		thisInput.parent().children(".icon-container").children(".loaderI").removeClass( "loader" );
		
		thisInput.blur();
		//console. log(thisInput);
		
		thisInput.addClass('changedInput1');
		thisInput.addClass('changedInput');
		setTimeout(function(){ thisInput.removeClass('changedInput');thisInput.removeClass('changedInput1'); }, 6000);
		//thisInput.removeClass('changedInput',5000,'');
		
		nn++;
		//$( "#consoleView" ).prepend( '<div id="consoleAlert'+nn+'" class="consoleAlert">'+point.tableAlias+' / '+point.name+':  '+point.inputName+' has been changed from '+point.oldValue+' To: '+point.val+' </div>');
		
		
		$( "#consoleView" ).prepend( '<div class="alert alert-primary addShadow" role="alert" id="consoleAlert'+nn+'">'
		+point.name+':  '+point.InputTitle+' has been changed from '+point.oldValue+' To: <strong>'+point.val+'</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
		
		var consoleAlertid = '#consoleAlert'+nn;
		setTimeout(function(){ $(consoleAlertid).fadeOut(2000); }, 10000);

	});
};

$( document ).ready(function() {
	$( "body" ).append( '<div id="consoleView"></div>');

	$( ".inputcontainer" ).append( '<div class="icon-container"><i class="loaderI"></i></div>');
	
	
	
	$(".inputcontainer input").change(myfunction);
	$(".inputcontainer input").dblclick(function(event){
		$(this).focus();
		$(this).addClass('focus');
	});
	$(".inputcontainer input").focus(function(event){
		$(this).addClass('focus');
	});
	$(".inputcontainer input").blur(function(event){
		$(this).removeClass('focus');
	});
	$(".inputcontainer input").keypress(function(event){
		var thisInput = $(this);
		var keycode = (event.keyCode ? event.keyCode : event.which);
		if(keycode == '13'){
			thisInput.blur();
		}
	});
	$(".inputcontainer textarea").change(myfunction);
	$(".inputcontainer textarea").dblclick(function(event){
		$(this).focus();
		$(this).addClass('focus');
	});
	$(".inputcontainer textarea").focus(function(event){
		$(this).addClass('focus');
		
	});
	$(".inputcontainer textarea").blur(function(event){
		$(this).removeClass('focus');
	});
	$(".inputcontainer textarea").keypress(function(event){
		var thisInput = $(this);
		var keycode = (event.keyCode ? event.keyCode : event.which);
		if(keycode == '13'){
			thisInput.blur();
		}
	});

});
</script>


<style>
.inputcontainer input,.inputcontainer textarea {border-width:1px;border-color:rgba(111,111,111,0) transparent transparent;;width: 100%;box-sizing: border-box;padding:5px;background: transparent;height:100%;resize: none;overflow: auto;}
.inputcontainer .focus{border-color:#333;resize: both;}
.inputcontainer .icon-container {position: absolute;}
.inputcontainer .loader {position: relative;height: 20px;width: 20px;display: inline-block;animation: around 5.4s infinite;}
@keyframes around {
	0% {transform: rotate(0deg)}
	100% {transform: rotate(360deg)}
}
.inputcontainer .loader::after, .inputcontainer .loader::before {content: "";background: none;position: absolute;display: inline-block;width: 100%;height: 100%;border-width: 2px;border-color: #333 #333 transparent transparent;border-style: solid;border-radius: 20px;box-sizing: border-box;top: 0;left: 0;animation: around 0.7s ease-in-out infinite;opacity: 100;}
.inputcontainer .loader::after {animation: around 0.7s ease-in-out 0.1s infinite;background: transparent;}
.inputcontainer .changedInput1{border: 1px solid #f00;}
.inputcontainer .changedInput{border-width:0px;
transition-property: border-width;
transition-duration: 5s;
}
#consoleView{z-index:1000;top:0;position:fixed;width:100%;}


.addShadow{-webkit-box-shadow: 0px 0px 22px -10px rgba(0,0,0,0.75);
-moz-box-shadow: 0px 0px 22px -10px rgba(0,0,0,0.75);
box-shadow: 0px 0px 22px -10px rgba(0,0,0,0.75);}
</style>
