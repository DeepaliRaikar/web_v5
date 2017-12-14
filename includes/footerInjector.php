<script type="text/javascript" src="node_modules/bootstrap-material-design/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script type="text/javascript" src="node_modules/bootstrap-material-design/dist/js/material.min.js"></script>
<script type="text/javascript" src="js/values.js?ver=<?php echo($TSZversioncode); ?>"></script>
<!--<script type="text/javascript" src="node_modules/bootstrap-material-design/dist/js/ripples.min.js"></script>-->
<script type="text/javascript" src="node_modules/jquery-nice-select/js/jquery.nice-select.min.js"></script>
<script type="text/javascript" src="node_modules/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script type="text/javascript" src="js/moment-with-locales.min.js"></script>
<script type="text/javascript" src="js/bootstrap-material-datetimepicker.js"></script>
<script type="text/javascript" src="js/snackbar.js"></script>
<script type="text/javascript" src="node_modules/easy-autocomplete/dist/jquery.easy-autocomplete.min.js"></script>

<!--marquee js file-->
<script type="text/javascript" src="js/marquee.js"></script>
<!--marquee js file end-->
<script type="text/javascript" src="js/httpfactory.js"></script>

<script type="text/javascript">
    $(function() {
        /** Preselect the CityName **/
//        $(".searchSelectedCity").html(selectedCityName);
        /** Preselect the CityName Ends **/
//        initialie material effect
        $.material.radio();
        $.material.checkbox();

//        initialize area marquee

        $('.area-marquee-container').SimpleMarquee();


        //caches a jQuery object containing the header element

        $("#searchServices .searchServices input").focus(function() {
            $('#searchOverlay').modal('show');
            setTimeout(function() { $('#aa-search-input').focus() }, 1000);
        });
        $("#header .searchServices input").focus(function() {
            $('#searchOverlay').modal('show');
            setTimeout(function() { $('#aa-search-input').focus() }, 1000);
        });
        $("#closeSearch").click(function(){
            $("#searchOverlay").hide();
            $("body").removeClass("searchOverlay");
        })

        $(".searchCitiesDropdown li").each(function(dropdownItems){
          $(this).click(function(){
              selectedCityID = $('a', this).attr('href').replace("#", "");
              var  selectedCityNameWithHTML = $(this).children("a").html();
              var selectedCityNameBreakHTML = selectedCityNameWithHTML.split("<");
              selectedCityName = selectedCityNameBreakHTML[0];
              $(".searchSelectedCity").html(selectedCityName);
              createCookie("selectedCityName",selectedCityName,90);
              createCookie("selectedCityID",selectedCityID,90);
              console.log(selectedCityName);
              console.log(selectedCityID);
              var arr = []; // Array to hold the keys
            // Iterate over localStorage and insert the keys that meet the condition into arr
              for (var i = 0; i < localStorage.length; i++){
                  if (localStorage.key(i).substring(0,3) == 'tsz') {
                      arr.push(localStorage.key(i));
                  }
              }
            // Iterate over arr and remove the items by key
              for (var i = 0; i < arr.length; i++) {
                  localStorage.removeItem(arr[i]);
              }
              location.reload();
          });
        });
        $(".searchSelectedCity").html(selectedCityName);

//        servicepage heading

//        var totalWidth = 0;
//
//        $('.timesaverzCategoryHeading .timesaverzHeadingText').each(function(index) {
//            totalWidth += parseInt($(this).outerWidth(), 10);
//        });
//
//        $('.timesaverzCategoryHeading .heading-line').width(totalWidth);
//
//        console.log("totalWidth = "+totalWidth);

        $('select').niceSelect();

//        to update dropdown with nice select
//        $('select').niceSelect('update');
    });

    function showSnackbar(message){
        $("#snackbar-container").html("");

        var options =  {
            content: message, // text of the snackbar
            style: "toast", // add a custom class to your snackbar
            timeout: 5000 // time in milliseconds after the snackbar autohides, 0 is disabled
        };
        $.snackbar(options);
    }

</script>
