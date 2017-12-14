function sanitizeSearchResults(searchItemValue) {
    if($.trim(searchItemValue) == '' || $.trim(searchItemValue) == null){
        return ' ';
    }else{
        return (','+searchItemValue);
    }
}
var client = algoliasearch("ZFOL4MKD1R", "9f8503f1b8bc70a3b620bba4b7a2dbb6");
var searchIndexName = 'prod_'+(selectedCityName.toLowerCase());
var index = client.initIndex(searchIndexName);
//initialize autocomplete on search input (ID selector must match)
$('#aa-search-input').autocomplete(
    {hint: true}, [
        {
            source: $.fn.autocomplete.sources.hits(index, { hitsPerPage: 10 }),
            //value to be displayed in input control after user's suggestion selection
            displayKey: 'serviceName',
            //hash of templates used when rendering dataset
            templates: {
                //'suggestion' templating function used to render a single suggestion
                header: '<div style="width:100%;margin:0px auto; height:30px;background:#62605E; text-align:center; padding:5px;border-bottom: 1px solid #9d9d9d;"><img height="20px" src="img/tsz_footer_logo.png" /></div>',

                suggestion: function(suggestion) {
                    //console.log(suggestion._highlightResult);
                        return '<span><img src="' +
                            suggestion._highlightResult.serviceIcon.value + '" class="searchListIcon"/></span>' +
                            '<span class="searchListPrimary"><span>' +
                            suggestion._highlightResult.serviceName.value + '</span><br /><span class="searchListTags">' +
                            suggestion._highlightResult.serviceCategory.value +
                            sanitizeSearchResults(suggestion._highlightResult.serviceSubcategory.value) +
                            sanitizeSearchResults(suggestion._highlightResult.serviceVariable.value) + '</span></span>' +
                            '<span class="searchSuperCategory">'+
                            suggestion._highlightResult.serviceSupercategory.value +'</span>';
                    }
                ,
                footer: '<div style="width:100%;height:30px;padding:5px;border-top: 1px solid #9d9d9d;">Powered by <img height="20px" src="https://www.algolia.com/assets/algolia128x40.png" /></div>'
            }
        }
    ]).on('autocomplete:selected', function(event, suggestion, dataset) {
    window.location = suggestion.serviceURL;
    console.log(suggestion.serviceURL);
});


$(document).ready(function(){
    function getDataForAllServices () {
        var response = null;
        dataFactoryCall("services/search/allservices","GET","cityID="+selectedCityID,function(returndata){
            response = returndata;
            if(response.status){
                localStorage.setItem("tszjsonsearchall",JSON.stringify(response));
                parseSearchDataAndLoad(response,"ajax");
            }
        });
    }

    function parseSearchDataAndLoad(data,caller) {
        response = data;
        var ifDeletedLocalData = false;
        var milliseconds = Math.round((new Date).getTime()/1000);
        if(caller=="localstorage"){
            response = JSON.parse(data);
            if(milliseconds-(response.timestamp)>removeLocalStorageDataTime){
                localStorage.removeItem("tszjsonsearchall");
                ifDeletedLocalData = true;
            }
        }
        if(ifDeletedLocalData){
            getDataForAllServices();
        }else {
            var htmldataforallservice = "";
            $.each(response.data.allservices, function (index, value) {
                //alert( index + ": " + value );
                htmldataforallservice += '<a href="'+value.redirectURL+'">' +
                    '<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 serviceCategory">' +
                    '<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 serviceCategoryIcon">' +
                    '<img src="' + value.supercategoryIcon + '" />' +
                    '</div>' +
                    '<div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 serviceCategoryDesc">' +
                    '<div class="categoryName">' + value.supercategoryName + '</div>' +
                    '<p class="categoryDesc">' + value.categories + '</p>' +
                    '</div>' +
                    '</div>' +
                    '</a>';

            });
            $("#searchAllServices").html(htmldataforallservice);

            var htmldataforhandpicked = "";
            $.each(response.data.handpicked, function (index, value) {
                htmldataforhandpicked += '<a href="'+value.redirectURL+'">' +
                    '<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">' +
                    '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 serviceCard box-elevation">' +
                    '<div class="col-lg-3 col-md-3 col-sm-12 col-xs-3 serviceCardIcon">' +
                    '<img src="' + value.categoryIcon + '" />' +
                    '</div>' +
                    '<div class="col-lg-9 col-md-9 col-sm-12 col-xs-9">' +
                    '<div class="serviceCardName">' + value.categoryServiceName + '<span class="serviceCardVariable">: ' + value.categoryName + '</span></div>' +
                    '<p class="serviceCardDesc">' + value.categoryShortNote + '</p>' +
                    '<div class="serviceCardPrice text-yellow">&#8377; ' + value.variablePayNowCost + '</div>' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '</a>';

            });
            $("#searchHandpickedServices").html(htmldataforhandpicked);
        }
    }

    if (typeof(Storage) !== "undefined") {
        if (localStorage.getItem("tszjsonsearchall") != null) {
            parseSearchDataAndLoad(localStorage.getItem("tszjsonsearchall"),"localstorage");
        }else{
            getDataForAllServices();
        }
    } else {
        console.log("No Local Storage available.");
        getDataForAllServices();
    }
});