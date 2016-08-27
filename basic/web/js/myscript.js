
 $( "#target" ).click(function() {
  $.ajax({
	url: 'http://localhost/basic/web/index.php?r=site/ajax',
	success: function(data) {
		
				var obj = jQuery.parseJSON(data);
		
					if (obj.userScore >= 21){
						$( "#target" ).off('click');	
					}
				
				$('#container').empty().append('<h1 class="score">' + obj.userScore + '</h1>');
				$('#card').empty().append('<h1 class="type">' + obj.cardType + '</h1>');
				$('#vict').empty().append('<h1 id = "victory">' + obj.vict + '</h1>');
				$('#loss').empty().append('<h1 id = "losst">' + obj.loss + '</h1>');
				
					
					if (obj.redirect !== ''){
						window.location = obj.redirect;
					}
				
		}
	})
});

$( "#next" ).click(function() {
  window.location = 'http://localhost/basic/web/index.php?r=site/result';
});

$( "#showres" ).click(function() {
  window.location = 'http://localhost/basic/web/index.php?r=site/over';
  
});

$( "#again" ).click(function() {
  window.location = 'http://localhost/basic/web/index.php?r=site/game';
   
});

$( "#gohome" ).click(function() {
  window.location = 'http://localhost/basic/web/index.php?r=site/form';
   
});

$( "#start" ).click(function() {
  window.location = 'http://localhost/basic/web/index.php?r=site/form';
   
});
$( "#exit" ).click(function() {
  window.location = 'http://localhost/basic/web/index.php';
   
});