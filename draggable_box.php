<html>
<head>
    <title>Draggable Box</title>
    
    <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/themes/smoothness/jquery-ui.css" rel="stylesheet" type="text/css"/>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
    <script>
		var element_pos = 0;    // POSITION OF THE NEWLY CREATED ELEMENTS.
		var iCnt = 0;
		$(document).ready(function() {
	
			$(function() { $('#divContainer').draggable(); });
			$(function() { $("#divResize").draggable().resizable(); });
	
			// CREATE MORE DIV, WITH 'ABSOLUTE' POSITIONING.
			$('#btClickMe').click(function() {
	
				var dynamic_div = $(document.createElement('div')).css({
					border: '1px dashed', position: 'absolute', left: element_pos, 
					top: $('#divContainer').height() + 20,
					width: '120', height: '120', padding: '3', margin: '0'
				});
	
				element_pos = element_pos + $('#divContainer').width() + 20;
	
				$(dynamic_div).append('You can drag me too');
				
				// APPEND THE NEWLY CREATED DIV TO "divContainer".
				$(dynamic_div).appendTo('#divContainer').draggable();
	
				iCnt = iCnt + 1;
			});
		});
	</script>
</html>
    <style>
        #divContainer, #divResize { 
            border:dashed 1px #CCC; 
            width:120px; 
            height:120px; 
            padding:5px; 
            margin:5px; 
            font:13px Arial; 
            cursor:move; 
            float:left 
        } 
    </style>
</head>
<body>
    <div>
        <div id="divContainer"> 
            I am Draggable 
        </div>

        <input type="button" style="float:left" id="btClickMe" value="Create more draggable DIV's" />

        
    </div>
</body>