/**
 * Created by anuragshukla on 09/02/17.
 */
$(function () {
    $("#listingHeadText").html("Top Services in "+superCategoryName);
    //Hide Others at first and load later
    //:$("#more-services").hide();
    //Ajax Call for Category Listing Page
    //Via Values.js Get Parameter value of anything anywhere
    function getDataForCategoryListing() {
        var response = null;
        dataFactoryCall("services/home/categorydetails", "GET", "superCategoryID="+superCategoryID+"&cityID=" + selectedCityID, function (returndata) {
            response = returndata;
            if (response.status) {
                parseCategoryListingDataAndLoad(response, "ajax");
            }else{
                //$("#category-listing").hide();
            }
        });
    }

    function sanitizethename(word) {
        var lowercaseword = word.toLowerCase();
        return lowercaseword;
    }

    function parseCategoryListingDataAndLoad(data, caller) {
        categoryDataObject = data; //Just for global init
        response = data;
        var htmldataforcards = "";
        var htmldataforlist = "";
        var looper = 0;
        console.log(data);
        $.each(response.data.categories, function (index, value) {
            if (looper < 3) {
                htmldataforcards += '<a href="'+sanitizethename(selectedCityName)+'/'+sanitizethename(superCategoryName)+'/'+sanitizethename(value.categoryName)+'">' +
                    '<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">' +
                    '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 serviceCard box-elevation">' +
                    '<div class="col-lg-3 col-md-3 col-sm-12 col-xs-3 serviceCardIcon">' +
                    '<img src="http://cdn-timesaverz.s3.amazonaws.com/documents/assets/icons/v5/'+value.categoryIcon+'.png" />' +
                    '</div>' +
                    '<div class="col-lg-9 col-md-9 col-sm-12 col-xs-9">' +
                    '<div class="serviceCardName">'+value.categoryName+'</div>' +
                    '<p class="serviceCardDesc">'+value.subcats+'</p>' +
                    '<div class="serviceCardPrice text-yellow">&#8377; '+value.rate+'</div>' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '</a>';
            } else {
                htmldataforlist+= '<a href="'+sanitizethename(selectedCityName)+'/'+sanitizethename(superCategoryName)+'/'+sanitizethename(value.categoryName)+'">' +
                    '<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 serviceCategory">'+
                    '<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 serviceCategoryIcon">'+
                    '<img src="http://cdn-timesaverz.s3.amazonaws.com/documents/assets/icons/v5/'+value.categoryIcon+'.png" />'+
                    '</div>'+
                    '<div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 serviceCategoryDesc">'+
                    '<div class="categoryName">'+value.categoryName+'</div>'+
                '<p class="categoryDesc">'+value.subcats+'</p>'+
                '</div>'+
                '</div>'+
                '</a>';
            }
            looper++;
        });
        if(looper > 2){
            $("#more-services").fadeIn();
            $("#otherServices").html(htmldataforlist);
        }

        $("#topServices").html(htmldataforcards);

    }
    //getDataForCategoryListing();
});