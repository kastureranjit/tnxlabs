<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script>
var getUrl  = $('#urlid');
	getUrl.keyup(function(){
		 var match_url = /\b(https?):\/\/([\-A-Z0-9.]+)(\/[\-A-Z0-9+&@#\/%=~_|!:,.;]*)?(\?[A-Z0-9+&@#\/%=~_|!:,.;]*)?/i;

		 if (match_url.test(getUrl.val())) 
		 {
		 	var extracted_url = getUrl.val().match(match_url)[0];
                    $("#results").hide();
			        $.post('home/url',{'url': extracted_url}, function(data){         
                    extracted_images = data.images;
                    total_images = parseInt(data.images.length-1);
                    img_arr_pos = total_images;
                    
                    if(total_images>0){
                        inc_image = '<div class="extracted_thumb" id="extracted_thumb"><img src="'+data.images[img_arr_pos]+'" width="100" height="100"></div>';
                    }else{
                        inc_image ='I ma here';
                    }
                    //content to be loaded in #results element
                    var content = '<div class="extracted_url">'+ inc_image +'<div class="extracted_content"><h4><a href="'+extracted_url+'" target="_blank">'+data.title+'</a></h4><p>'+data.content+'</p><div class="thumb_sel"><span class="prev_thumb" id="thumb_prev">&nbsp;</span><span class="next_thumb" id="thumb_next">&nbsp;</span> </div></div></div>';
                    
                    
                    $("#results").html(content); 
                    $("#results").slideDown(); 
                },'json');
			}
});
    

	
</script>
</body>
</html>