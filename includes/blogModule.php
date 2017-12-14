<?php
/**
 * Created by PhpStorm.
 * User: Deeps
 * Date: 12-01-2017
 * Time: 16:35
 */
?>
<div class="blogArticlesFromService">
    <a href="#">
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 blogItem">
            <img src="img/placeholder.gif" width="100%" />
        </div>
    </a>
    <a href="#">
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 blogItem">
            <img src="img/placeholder.gif" width="100%" />
        </div>
    </a>
    <a href="#">
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 blogItem">
            <img src="img/placeholder.gif" width="100%" />
        </div>
    </a>
</div>
<script>
    $(document).ready(function(){
        function getDataForBlogs() {
            var response = null;
            dataFactoryCall("services/related/articles","GET","term=&count=3",function(returndata){
                response = returndata;
                if(response.status){
                    localStorage.setItem("tszjsonblog",JSON.stringify(response));
                    parseBlogDataAndLoad(response,"ajax");
                }
            });
        }

        function parseBlogDataAndLoad(data,caller) {
            response = data;
            var ifDeletedLocalData = false;
            var milliseconds = Math.round((new Date).getTime()/1000);
            if(caller=="localstorage"){
                response = JSON.parse(data);
                if(milliseconds-(response.timestamp)>removeLocalStorageDataTime){
                    localStorage.removeItem("tszjsonblog");
                    ifDeletedLocalData = true;
                }
            }
            if(ifDeletedLocalData){
                getDataForBlogs();
            }else{
                var htmnldataforblog = "";
                $.each(response.data, function( index, value ) {
                    htmnldataforblog +='<a href="'+value.link+'">' +
                        '<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 blogItem">' +
                        '<div class="blogImage">' +
                        '<img src="'+value.image+'" />' +
                        '<span class="wow slideInUp blogLabel transparentize-cleaning">'+value.title+'</span>' +
                        '</div>' +
                        '<div class="blogText">' +
                        '<p class="blogDesc">'+value.content+'</p>' +
                        '<p><span class="blogDate">'+value.date+'</span> | <span class="blogWriter">Timesaverz Blog</span></p>' +
                        '</div>' +
                        '</div>' +
                        '</a>';

                });
                $(".blogArticlesFromService").html(htmnldataforblog);
            }

        }

        if (typeof(Storage) !== "undefined") {
            if (localStorage.getItem("tszjsonblog") != null) {
                parseBlogDataAndLoad(localStorage.getItem("tszjsonblog"),"localstorage");
            }else{
                getDataForBlogs();
            }
        } else {
            console.log("No Local Storage available.");
            getDataForBlogs();
        }
    });
</script>