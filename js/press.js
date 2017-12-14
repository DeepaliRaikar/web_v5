/**
 * Created by Deeps on 20-02-2017.
 */
$(document).ready(function(){
    $('#press-releases > div').each(function(i,e){
        if (((i+1) % 3) == 0)
            $(this).after('<div class="clearfix"></div>');
    });
});