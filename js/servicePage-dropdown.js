/**
 * Created by Deeps on 11-01-2017.
 */

var dateDataObject = null;
var subcategoryData = null;
var globalSelectedSubcategoriesIndex = [];

$(function () {

    //Notify user of non activity
    //Call For Button disabled for Booking
    $(".book-service-button").prop('disabled', true);

    //Notify Waiting in Placeholder
    $("#multiple-selection").attr("placeholder","Please wait....");
    //Change Notify once Data is loaded
    getDataForSubCategories(selectedVariableName);
    //Called to Load the Subcategory List Based on First Variable Name

    $("#variableGroupSelection").on('change', function () {
        var groupName = ($('#variableGroupSelection').val());
        getDataForVariables(groupName);
        //calculateServicePriceandDisplay(subcategoryIndex,variableIndex,frequencySelection);
        $('select').niceSelect('update');
    });

    $("#variableNameSelection").on('change', function () {
        alert("changed");
        var variableName = ($('#variableNameSelection').val());
        getDataForSubCategories(variableName);
        //calculateServicePriceandDisplay(subcategoryIndex,variableIndex,frequencySelection);
        $('select').niceSelect('update');
    });
});

function calculateVariableSumFromArray(arrayFromCall) {
    globalSelectedSubcategoriesIndex = arrayFromCall;
    var sumOfAllVariables = 0;
    for (var x = 0; x < arrayFromCall.length; x++) {
        sumOfAllVariables = parseInt(sumOfAllVariables) + parseInt(subcategoryData.data.subcategories[arrayFromCall[x]].variablePayNowCost);
    }
    if(sumOfAllVariables<1){
        $(".book-service-button").prop('disabled', true);
    }else{
        $(".book-service-button").prop('disabled', false);
    }
    $(".service-total").html(sumOfAllVariables);

}

function getDataForVariables(header) {
    $("#dropdown-subcategories").html("");
    //Change Notify once Data is loaded
    $("#multiple-selection").attr("placeholder","Please wait....");
    $("#variableNameSelection").html('<option value="0">Please wait....</option>');
    var variableresponse = null;
    dataFactoryCall("services/flows/dropdownvariables", "GET", "header=" + header, function (returndata) {
        variableresponse = returndata;
        if (variableresponse.status) {
            parseVariableDataAndLoad(variableresponse, "ajax");
        } else {
            alert("Something went wrong! Please try again later");
        }
    });
}
function parseVariableDataAndLoad(data, caller) {
    variabledata = data;
    var htmlforvariables = '';
    $.each(variabledata.data, function (index, value) {
        if (index == 0) {
            $("#dropdown-subcategories").html("");
            //Change Notify once Data is loaded
            $("#multiple-selection").attr("placeholder","Please wait....");
            $("#variableNameSelection").html('<option value="0">Please wait....</option>');
            getDataForSubCategories(value.variableName);
        }
        htmlforvariables += '<option value="' + value.variableName + '">' + value.variableName + '</option>';
    });
    $("#variableNameSelection").html(htmlforvariables);
    $('select').niceSelect('update');
}

function getDataForSubCategories(variablename) {
    var variableresponse = null;
    dataFactoryCall("services/flows/dropdownsubcats", "GET", "variable=" + encodeURIComponent(variablename), function (returndata) {
        variableresponse = returndata;
        if (variableresponse.status) {
            parseSubcategoryDataAndLoad(variableresponse, "ajax");
        } else {
            alert("Something went wrong! Please try again later");
        }
    });
}
function parseSubcategoryDataAndLoad(data, caller) {
    subcategoryData = data;
    var htmlforsubcategories = '';
    $.each(subcategoryData.data.subcategories, function (index, value) {
        htmlforsubcategories += '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-side-padding service-checkbox-main">' +
            '<div class="checkbox">' +
            '<label class="full-width">' +
            '<input class="service-checkbox" type="checkbox" data-index="' + index + '" value="' + value.variableID + '">' +
            '<span class="label-text"> ' + value.subcategoryName + ' <span class="text-float-right text-grey">₹ ' + value.variablePayNowCost + ' </span></span>' +
            '</label>' +
            '</div>' +
            '</div>';
    });
    $("#dropdown-subcategories").html(htmlforsubcategories);
    //Change Notify once Data is loaded
    $("#multiple-selection").attr("placeholder","Add Services");
    $('select').niceSelect('update');

    var getSelectedSubCategoryIndex = 0;
    var getSelectedVariableIndexes = [];
    $(".service-checkbox").click(function () {
        var selectedIndexFromList = $(this).attr( "data-index" );//parseInt($(this).val());
        if ($.inArray(selectedIndexFromList, getSelectedVariableIndexes) != -1) {
            var getIndexToPop = getSelectedVariableIndexes.indexOf(selectedIndexFromList);
            if (getIndexToPop > -1) {
                getSelectedVariableIndexes.splice(getIndexToPop, 1);
            }
            calculateVariableSumFromArray(getSelectedVariableIndexes);
        } else {
            getSelectedVariableIndexes.push(selectedIndexFromList);
            calculateVariableSumFromArray(getSelectedVariableIndexes);
        }
    });


}

function getDataForDates() {
    var response = null;
    dataFactoryCall("services/booking/dates", "GET", "categoryID=" + categoryID + "&cityID=" + selectedCityID, function (returndata) {
        response = returndata;
        if (response.status) {
            parseDateDataAndLoad(response, "ajax");
        }
    });
}
function parseDateDataAndLoad(data, caller) {
    dateDataObject = data; //Just for global init
    response = data;
    var htmldataforslots = "";
    var htmldatafordates = "";
    $.each(response.data.dates, function (index, value) {
        //alert( index + ": " + value );
        htmldatafordates += '<option value="' + value.actualDate + '">' + value.websiteDate + '</option>';

    });
    $.each(response.data.dates[0].slots, function (index, value) {
        //alert( index + ": " + value );
        htmldataforslots += '<option data-fixedslot="' + value.actualFixedTime + '" value="' + value.actualSlot + '">' + value.formattedSlot + '</option>';
    });
    $("#serviceDate").html(htmldatafordates);
    $("#serviceTime").html(htmldataforslots);
    $('select').niceSelect('update');
}
getDataForDates();

$('#serviceDate').on('change', function () {
    $("#serviceTime").html("");
    var dateIndex = ($('#serviceDate').prop('selectedIndex'));
    var htmldataforslots = "";
    $.each(dateDataObject.data.dates[dateIndex].slots, function (index, value) {
        htmldataforslots += '<option value="' + value.actualSlot + '">' + value.formattedSlot + '</option>';
    });
    $("#serviceTime").html(htmldataforslots);
    $('select').niceSelect('update');
});


function selectServices() {
    if ($(".service-checkbox:checked").length > 1) {
        $("#multiple-selection").attr("value", $(".service-checkbox:checked").length + " Services Selected");
        $("#multiple-selection.form-control").css("color", "#f7cf4c");
    }
    else if ($(".service-checkbox:checked").length == 1) {
        $("#multiple-selection").attr("value", $(".service-checkbox:checked").val());
        $("#multiple-selection.form-control").css("color", "#f7cf4c");
    }
    else {
        $("#multiple-selection").attr("value", "");
        $("#multiple-selection.form-control").css("color", "#f7cf4c");
    }
}

var variableIndex = 0;
function checkSelection(element) {
    var selectElement = $(element);
    var selectElementValue = $(element).val();

    if (selectElementValue != 'null') {
        $(element).css('color', 'black');
        alert(selectElementValue);
    } else {

    }
}

// slim scrollbar for compare services
$("#compare-services .compare-service-result-wrapper").slimScroll({
    height: 350
});

// carousel for service portfolio

$('.owl-carousel').owlCarousel({
    autoplay: true,
    items: 5,
    merge: true,
    loop: true,
    margin: 10,
    video: true,
    lazyLoad: true,
    stagePadding: 50,
    center: true,
    navigation: true,
    nav: true,
    navText: [
        '<i class="fa fa-angle-left" style="font-size: 4rem;"></i>',
        '<i class="fa fa-angle-right" style="font-size: 4rem;"></i>'
    ],
    responsive: {
        480: {
            items: 2
        },
        600: {
            items: 4
        },
        960: {
            items: 3
        }
    }
});


$(function () {

    //Via Values.js Get Parameter value of anything anywhere
    $("#compareServices").addClass("tsz-hidden");

    var dateDataObject = null;
    $('#serviceDetails').slimScroll({
        height: $(".bookingDetails .serviceDetailsContainer").height() + 30
    });


    function getDataForAllCompareFirst() {
        $("#compare-button").prop('disabled',true);
        var compareresponse = null;
        dataFactoryCall("services/related/prefill_first","GET","categoryID="+categoryID,function(returndata){
            compareresponse = returndata;
            if(compareresponse.status){
                parseFirstCompareDataAndLoad(compareresponse,"ajax");
                $("#compareServices").removeClass("tsz-hidden");

            }else{
                $("#compareServices").addClass("tsz-hidden");
            }
        });
    }

    var firstCompareSubcat = 0;
    var secondCompareSubcat = 0;
    var groupIDforCompare = 0;
    var secondCompareData = null;

    function parseFirstCompareDataAndLoad(data,caller) {
        var response = data;

        var htmldataforallservice = "";
        var htmlforcompareone = '';
        $.each(response.data, function (index, value) {
            if(index==0){
                firstCompareSubcat = value.subcategoryID;
                getDataForAllCompareSecond(firstCompareSubcat);
            }
            htmlforcompareone += '<option value="'+value.subcategoryID+'">'+value.subcategoryName+'</option>';
        });
        $("#compareServiceOne").html(htmlforcompareone);

    }
    getDataForAllCompareFirst();

    function getDataForAllCompareSecond(subcat) {
        var compareresponse = null;
        dataFactoryCall("services/related/prefill_second","GET","subcategoryID="+subcat,function(returndata){
            compareresponse = returndata;
            if(compareresponse.status){
                parseSecondCompareDataAndLoad(compareresponse,"ajax");
            }else{
                $("#compareServices").addClass("tsz-hidden");
            }
        });
    }
    function parseSecondCompareDataAndLoad(data,caller) {
        secondCompareData = data;
        var htmlforcomparetwo = '';
        $.each(secondCompareData.data, function (index, value) {
            if(index==0){
                secondCompareSubcat = value.subcategoryID;
                groupIDforCompare = value.groupID;
                getDataForAllCompareBox(firstCompareSubcat,secondCompareSubcat,groupIDforCompare);
            }
            htmlforcomparetwo += '<option value="'+value.subcategoryID+'">'+value.subcategoryName+'</option>';

        });
        $("#compareServiceTwo").html(htmlforcomparetwo);
        $("#compare-button").prop('disabled',false);
        $('select').niceSelect('update');

    }

    $("#compareServiceOne").on('change',function () {
        $("#compare-button").prop('disabled',true);
        var compareSubcat = ($('#compareServiceOne').val());
        firstCompareSubcat = compareSubcat;
        getDataForAllCompareSecond(firstCompareSubcat);
        $('select').niceSelect('update');
    });
    $("#compareServiceTwo").on('change',function () {
        $("#compare-button").prop('disabled',true);
        var compareSubcatTwo = ($('#compareServiceTwo').val());
        var compareGroupIndex = ($('#compareServiceTwo').prop('selectedIndex'));
        secondCompareSubcat = compareSubcatTwo;
        getDataForAllCompareBox(firstCompareSubcat,secondCompareSubcat,secondCompareData.data[compareGroupIndex].groupID);
        $('select').niceSelect('update');
    });



    function getDataForAllCompareBox(subcatone,subcattwo,groupid) {
        var compareresponse = null;
        dataFactoryCall("services/related/compare","GET","subcategoryIDOne="+subcatone+"&subcategoryIDTwo="+subcattwo+"&groupID="+groupid,function(returndata){
            compareresponse = returndata;
            if(compareresponse.status){
                parseBoxCompareDataAndLoad(compareresponse,"ajax");
            }else{
                $("#compareServices").addClass("tsz-hidden");
            }
        });
    }

    function parseBoxCompareDataAndLoad(data,caller) {
        var response = data;
        var htmlforcomparebox = '';

        $("#compare-service-first-header").html(response.data.subcategoryNameOne);
        $("#compare-service-second-header").html(response.data.subcategoryNameTwo);
        $.each(response.data.compareData, function (index, value) {
            if($.trim(value.valueOne) =="check" || $.trim(value.valueOne) =="cross"){
                var first_color_class = "text-green";
                var first_icon_class = " check";
                var first_text_icon = "check";
                var second_color_class = "text-green";
                var second_icon_class = " check";
                var second_text_icon = "check";
                if($.trim(value.valueOne) =="cross"){
                    first_color_class ="text-red";
                    first_icon_class = "";
                    first_text_icon = "close";
                }
                if($.trim(value.valueTwo) =="cross"){
                    var second_color_class = "text-red";
                    var second_icon_class = "";
                    var second_text_icon = "close";
                }
                htmlforcomparebox+='<tr><td>'+value.name+'</td>'+
                    '<td class="text-center '+first_color_class+'"><i class="material-icons'+first_icon_class+'">'+first_text_icon+'</i></td>'+
                    '<td class="text-center '+second_color_class+'"><i class="material-icons check'+second_icon_class+'">'+second_text_icon+'</i></td>'+
                    '</tr>';
            }else{
                htmlforcomparebox+='<tr>'+
                    '<td>'+value.name+'</td>'+
                    '<td class="text-center">'+value.valueOne+'</td>'+
                    '<td class="text-center">'+value.valueTwo+'</td>'+
                    '</tr>';
            }
            htmlforcomparebox += '<option value="'+value.subcategoryID+'">'+value.subcategoryName+'</option>';
        });
        $("#compare-service-results").html(htmlforcomparebox);
        $('select').niceSelect('update');
    }

    $(".book-service-button").click(function () {

        var getSubcategoryID = null;
        var getSubcategoryName = null;
        var variableID = null;
        var getVariableName = null;
        var jobQuantity = 1;
        var jobFrequency = 1;
        var jobFrequencyMF = 1;
        var jobIsAMC = 0;
        var jobIsCombo = 0;
        var surgeFactor = 1;

        var totalVariablePayNowCost = 0;
        var totaldiscountRcvd = 0;



        var customisationDataCreateArray = [];
        $.each(globalSelectedSubcategoriesIndex, function (index, value) {
            if(index==0){
                getSubcategoryID=subcategoryData.data.subcategories[value].subcategoryID;
                getSubcategoryName = subcategoryData.data.subcategories[value].subcategoryName;
                variableID = subcategoryData.data.subcategories[value].variableID;
                getVariableName = subcategoryData.data.subcategories[value].variableName;
            }
            var individualCustomization = {
                "customisationName": subcategoryData.data.subcategories[value].subcategoryName,
                "customisationPrice": subcategoryData.data.subcategories[value].variablePayNowCost,
                "customisationQuantity":1,
                "customisationType":'service',
                "customisationTypeID": subcategoryData.data.subcategories[value].variableID
            }
            customisationDataCreateArray.push(individualCustomization);
            totalVariablePayNowCost = totalVariablePayNowCost + subcategoryData.data.subcategories[value].variablePayNowCost;
            totaldiscountRcvd = totaldiscountRcvd + subcategoryData.data.subcategories[value].discountReceived;
        });
        var jobDate = $("#serviceDate").val();
        var jobTime = $("#serviceTime").val();
        var jobFixedTime = $("#serviceTime option:selected").attr("data-fixedslot");
        var jobHumanizedDate = $("#serviceDate option:selected").text();
        var jobbHumanizedTime =  $("#serviceTime option:selected").text();
        var comments = $("#additionalComments").val();



        var actualCost = Math.round((parseFloat(totalVariablePayNowCost)+parseFloat(totaldiscountRcvd))*parseFloat(jobQuantity)*parseFloat(jobFrequencyMF));
        var totalCost = Math.round(parseFloat(totalVariablePayNowCost)*parseFloat(jobQuantity)*parseFloat(jobFrequencyMF)*parseFloat(surgeFactor));
        var discountrcvdfinal = (parseFloat(actualCost))-(parseFloat(totalCost));




        var allCartItemsJSON = [];
        var jsonObjectForCartItem = {
            "categoryID":dataForServicePage.data.categoryID,
            "categoryName":dataForServicePage.data.categoryName,
            "supercategoryID":dataForServicePage.data.super.supercategoryID,
            "supercategoryName":dataForServicePage.data.super.supercategoryName,
            "categoryIcon":dataForServicePage.data.categoryIcon,
            "subcategoryID":getSubcategoryID,
            "subcategoryName":getSubcategoryName,
            "variableID":variableID,
            "variableName":getVariableName,
            "couponID":0,
            "discountReceived":discountrcvdfinal,
            "totalCost":totalCost,
            "actualCost":actualCost,
            "humanizedDateWithTime":jobHumanizedDate+" "+jobbHumanizedTime,
            "jobDate":jobDate,
            "jobTime":jobTime,
            "jobFixedTime":jobFixedTime,
            "jobQuantity":jobQuantity,
            "jobIsCombo":jobIsCombo,
            "numberOfServices":jobFrequency,
            "jobRemark":comments,
            "serviceName":dataForServicePage.data.categoryServiceName,
            "jobIsAMC":jobIsAMC,
            "minutesUsed":0,
            "customisationData":customisationDataCreateArray
        };
        if (typeof(Storage) !== "undefined") {
            var cartItemFromStorage = [];
            if (localStorage.getItem("cartItems") != null) {
                allCartItemsJSON.push(jsonObjectForCartItem);
                cartItemFromStorage = JSON.parse(localStorage.getItem("cartItems"));
                for(var x=0;x<cartItemFromStorage.length;x++){
                    if(cartItemFromStorage[x].categoryID!=jsonObjectForCartItem.categoryID){
                        allCartItemsJSON.push(cartItemFromStorage[x]);
                    }
                }
                localStorage.setItem("cartItems",JSON.stringify(allCartItemsJSON));
            }else{
                allCartItemsJSON.push(jsonObjectForCartItem);
                localStorage.setItem("cartItems",JSON.stringify((allCartItemsJSON)));
            }
        } else {
            console.log("No Local Storage available.");
            createCookie('cartItems',JSON.stringify(jsonObjectForCartItem));
        }
        window.location = 'booking-details';
    });

});
