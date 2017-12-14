/**
 * Created by Deeps on 08-02-2017.
 */

//margin top as the height of header
    var headerHeight = "";
    manageContainerTopMargin();

    $("#header").addClass("darkHeader");

    $(window).resize(function(){
        manageContainerTopMargin();
    })

//margin top as the height of header
function manageContainerTopMargin() {
    headerHeight = $("#header").height();
    $("#header").next(".container-fluid").css({
        'margin-top': headerHeight
    })
}
