$(document).ready(function(){
	$('#addfeature').submit(function(event){

		event.preventDefault();

		$('#addfeaturebutton').html('Adding your feature...');

		$.post( "addFeature.php", { text: $('#text').val(), user_id: $('#userid').val() })
	  	.done(function( data ) {
	  		var id = data;
	    	$('#newestFeatures').prepend('<a id="newlyAdded"></a><div class="head col-lg-12"><table class="table"><tr style="background-color:#B3FFBF"><td width="40%">'+$('#text').val()+'</td><td width="20%">'+$('#name').val()+'</td> <!-- MOET NAME UIT tabel USER--><td width="20%">0</td><td><a href="?vote=yes&userid='+$('#userid').val()+'&fid='+id+'">Yes</a> / <a href="?vote=no&userid='+$('#userid').val()+'&fid='+id+'">No</a></td><!-- Delete feature --><td></td></tr></table></div>');
	 		$('#text').val('');
	 		$(document.body).animate({
    			'scrollTop':   $('#newlyAdded').offset().top
			}, 2000);
			$('#addfeaturebutton').html('Add');
	 	});
	 });

	$('#login-username').on('change', function(){
		$.get('checkEmail.php', {email:$('#login-username').val()})
			.done(function(data){
				data = data.replace(/(\r\n|\n|\r)/gm,"")
				if(data == "FALSE"){
					$('#login-username').attr('style', 'background:red');
				} else {
					$('#login-username').attr('style', 'background:green;color:white');
				}
			});
	});
 });