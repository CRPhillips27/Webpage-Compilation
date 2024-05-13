var box;            			
var row = '300px'; 			
var column = '300px'; 			

window.onload = function(){
	var puzzlebox = document.getElementById('puzzlearea');
	box = puzzlebox.getElementsByTagName('div');          

	for (var i = 0; i < box.length; i++) {
		box[i].className = 'puzzlebox';                    
		box[i].style.left = (i % 4 * 100) + 'px';          
		box[i].style.top = (parseInt(i / 4) * 100) + 'px'; 
		box[i].style.backgroundPosition = '-' + box[i].style.left + ' ' + '-' + box[i].style.top; 

		box[i].onmouseover = function() {
			if (movable(parseInt(this.innerHTML - 1))) {   
				$(this).addClass('hover');                 	
			}
	    };

	    box[i].onmouseout = function() {                
			$(this).removeClass('hover');                  
    	};

    	box[i].onclick = function() {
      		if(movable(parseInt(this.innerHTML - 1))) {    
        		move(this.innerHTML - 1);                  	
				return;
			}
		};

	}

	$('#shufflebutton').click(shuffleButton);
};

function move(index) {
	var selected = box[index].style.left;
	box[index].style.left = row;          
	row = selected;                         

	selected = box[index].style.top;        
	box[index].style.top = column;		   
	column = selected;                          
}

function movable(index) {
	if(box[index].style.left == row){   
		if(parseInt(box[index].style.top) == parseInt(column) - 100 || parseInt(box[index].style.top) == parseInt(column) + 100){
			return true;
		}
	}
	else if(box[index].style.top == column){ 
		if(parseInt(box[index].style.left) == parseInt(row) - 100 || parseInt(box[index].style.left) == parseInt(row) + 100){
			return true;
		}
	}
	else{
		return false;
	}
}

function shuffleButton(){ 
	var random = parseInt(Math.random() * (500 - 100)) + 100; 		

	for(var i = 0; i < random; i++){
		for(var traverse = 0; traverse < box.length; traverse++){       
			if(movable(traverse)){                             			
				let rand = parseInt(Math.random() * 2); 					
				if(rand % 2 == 0){                      					
					move(traverse);                           				
				}			
			}
		}
	}
}