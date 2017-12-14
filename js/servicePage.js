/**
 * Created by Deeps on 11-01-2017.
 */

var variableIndex = 0;
function checkSelection(element){
    var selectElement = $(element);
    var selectElementValue = $(element).val();

    if (selectElementValue != 'null') {
        $(element).css('color','black');
        alert(selectElementValue);
    } else {

    }
}

//Service Page Specific Rules
$(function(){

    var getSelectedSubCategoryIndex = 0;
    var getSelectedVariableIndexes = [];
    $(".service-checkbox").click(function () {
        var selectedIndexFromList = parseInt($(this).val());
        if($.inArray(selectedIndexFromList, getSelectedVariableIndexes)!= -1){
            var getIndexToPop = getSelectedVariableIndexes.indexOf(selectedIndexFromList);
            if (getIndexToPop > -1) {
                getSelectedVariableIndexes.splice(getIndexToPop, 1);
            }
            calculateVariableSumFromArray(getSelectedVariableIndexes);
        }else{
            getSelectedVariableIndexes.push(selectedIndexFromList);
            calculateVariableSumFromArray(getSelectedVariableIndexes);
        }
    });

    function calculateVariableSumFromArray(arrayFromCall) {
        var sumOfAllVariables = 0;
        for(var x=0;x<arrayFromCall.length;x++){
            sumOfAllVariables = parseInt(sumOfAllVariables) + parseInt(dataForServicePage.data.subcat[getSelectedSubCategoryIndex].variables[arrayFromCall[x]].variablePayNowCost);
        }
        $(".service-total").html(sumOfAllVariables);
    }

});


// slim scrollbar for compare services
    $("#compare-services .compare-service-result-wrapper").slimScroll({
        height: 350
    });

// carousel for service portfolio

$('.owl-carousel').owlCarousel({
    autoplay: true,
    items:5,
    merge:true,
    loop:true,
    margin:10,
    video:true,
    lazyLoad:true,
    stagePadding: 50,
    center:true,
    navigation:true,
    nav: true,
    navText: [
        '<i class="fa fa-angle-left" style="font-size: 4rem;"></i>',
        '<i class="fa fa-angle-right" style="font-size: 4rem;"></i>'
    ],
    responsive:{
        480:{
            items:2
        },
        600:{
            items:4
        },
        960:{
          items: 3
        }
    }
});
function selectServices() {
    if($(".service-checkbox:checked").length > 1){
        $("#multiple-selection").attr("value",$(".service-checkbox:checked").length+" Services Selected");
        $("#multiple-selection.form-control").css("color","#f7cf4c");
    }
    else if($(".service-checkbox:checked").length == 1){
        $("#multiple-selection").attr("value",$(".service-checkbox:checked").val());
        $("#multiple-selection.form-control").css("color","#f7cf4c");
    }
    else{
        $("#multiple-selection").attr("value","");
        $("#multiple-selection.form-control").css("color","#f7cf4c");
    }
}

$(function(){
/*    var categoryID = getParameterByName('categoryid');
    //Via Values.js Get Parameter value of anything anywhere*/
    $("#compareServices").addClass("tsz-hidden");

    var dateDataObject = null;
    $('#serviceDetails').slimScroll({
        height: $(".bookingDetails .serviceDetailsContainer").height() + 30
    });


    //Get Default Service Description Post Data Load
    $("#serviceDetails").html(dataForServicePage.data.subcat[subcategoryIndex].subcategoryDescription);
    //Ajax Call for Dates
    function getDataForDates () {
        var response = null;
        dataFactoryCall("services/booking/dates","GET","categoryID="+categoryID+"&cityID="+selectedCityID,function(returndata){
            response = returndata;
            if(response.status){
                parseDateDataAndLoad(response,"ajax");
            }
        });
    }
    function parseDateDataAndLoad(data,caller) {
        dateDataObject = data; //Just for global init
        response = data;
        var htmldataforslots = "";
        var htmldatafordates = "";
        $.each(response.data.dates, function (index, value) {
            //alert( index + ": " + value );
            htmldatafordates += '<option value="'+value.actualDate+'">'+value.websiteDate+'</option>';

        });
        $.each(response.data.dates[0].slots, function (index, value) {
            //alert( index + ": " + value );
            htmldataforslots += '<option data-fixedslot="'+value.actualFixedTime+'" value="'+value.actualSlot+'">'+value.formattedSlot+'</option>';

        });
        $("#serviceDate").html(htmldatafordates);
        $("#serviceTime").html(htmldataforslots);
        $('select').niceSelect('update');
    }
    getDataForDates();

    /** Now check for change actions on the Date Selections **/
    //dateDataObject
    function calculateServicePriceandDisplay(subcategoryIndex,variableIndex,frequency) {
        var jobQuantity = $("#noOfServices").val();
        var jobFrequency = $("#frequencySelection").val();
        var jobFrequencyMF = $("#frequencySelection option:selected").attr("data-mf");
        var discountRcvd = dataForServicePage.data.subcat[subcategoryIndex].variables[variableIndex].discountReceived;
        var variablePayNowCost = dataForServicePage.data.subcat[subcategoryIndex].variables[variableIndex].variablePayNowCost;
        var surgeFactor = 1;
        if(jobFrequencyMF==undefined || jobFrequencyMF=="" ||jobFrequencyMF==null){
            jobFrequencyMF=1;
        }

        var actualCost = Math.round((parseFloat(variablePayNowCost)+parseFloat(discountRcvd))*parseFloat(jobQuantity)*parseFloat(jobFrequencyMF));
        var totalCost = Math.round(parseFloat(variablePayNowCost)*parseFloat(jobQuantity)*parseFloat(jobFrequencyMF)*parseFloat(surgeFactor));
        var discountrcvdfinal = Math.round(parseFloat(totalCost))-(parseFloat(actualCost));
        console.log(jobQuantity);
        console.log(jobFrequency);
        console.log(jobFrequencyMF);
        console.log(discountRcvd);
        console.log(variablePayNowCost);
        console.log(surgeFactor);
        console.log(actualCost);
        console.log(totalCost);
        console.log(discountrcvdfinal);

        $(".serviceTotal").html(totalCost);

    }

    $('#serviceDate').on('change', function () {
        $("#serviceTime").html("");
        var dateIndex = ($('#serviceDate').prop('selectedIndex'));
        var htmldataforslots = "";
        $.each(dateDataObject.data.dates[dateIndex].slots, function (index, value) {
            htmldataforslots += '<option value="'+value.actualSlot+'">'+value.formattedSlot+'</option>';
        });
        $("#serviceTime").html(htmldataforslots);
        $('select').niceSelect('update');
    });

    //Change Handler for Service Boxes
    $('#subcategorySelection').on('change', function () {
        subcategoryIndex = ($('#subcategorySelection').prop('selectedIndex'));
        $("#serviceDetails").html(dataForServicePage.data.subcat[subcategoryIndex].subcategoryDescription);
        var htmldataforvars = "";
        var htmldataforfreq = "";
        var htmldatafornumberofservices ='<option value="1" selected>Select no. of services</option>';
        $.each(dataForServicePage.data.subcat[subcategoryIndex].variables, function (index, value) {
            htmldataforvars += '<option  data-index="'+index+'" value="'+value.variableID+'">'+value.variableName+'</option>';
        });
        $.each(dataForServicePage.data.subcat[subcategoryIndex].frequency, function (index, value) {
            htmldataforfreq += '<option  data-mf="'+value.frequencyMultiplyingFactor+'" value="'+value.frequencyNumberOfServices+'">'+value.frequencyCaption+'</option>';
        });

        var minQuantity = dataForServicePage.data.subcat[subcategoryIndex].minQuantity;
        var maxQuantity = dataForServicePage.data.subcat[subcategoryIndex].maxQuantity;
        for(var x=minQuantity;x<=maxQuantity;x++){
            htmldatafornumberofservices+='<option value="'+x+'">'+x+'</option>';
        }

        $("#variableSelection").html(htmldataforvars);
        $("#frequencySelection").html(htmldataforfreq);
        $("#noOfServices").html(htmldatafornumberofservices);
        calculateServicePriceandDisplay(subcategoryIndex,0,1);
        $('select').niceSelect('update');

    });

    $("#variableSelection").on('change',function () {

        console.log(dataForServicePage);
        variableIndex = $("#variableSelection option:selected").attr("data-index");
        /*alert(variableIndex);
        variableIndex = ($('#variableSelection').prop('selectedIndex'));
        variableIndex = ($('#variableSelection').prop('selectedIndex'));*/

        calculateServicePriceandDisplay(subcategoryIndex,variableIndex,1);
        $('select').niceSelect('update');
    });


    $("#frequencySelection").on('change',function () {
        var frequencySelection = ($('#frequencySelection').val());
        var freqMF = 1;
        calculateServicePriceandDisplay(subcategoryIndex,variableIndex,frequencySelection);
        $('select').niceSelect('update');
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

        var getSubcategoryID = $("#subcategorySelection").val();
        var getSubcategoryName = $("#subcategorySelection").attr("data-name");
        if(getSubcategoryName==null||getSubcategoryName==""|| undefined != getSubcategoryName){
            getSubcategoryName = $("#subcategorySelection option:selected").attr("data-name");
        }
        var variableID = $("#variableSelection").val();
        var getVariableName = $("#variableSelection").attr("data-name");
        var getVariableIndex = 0;
        if(getVariableName==null||getVariableName==""|| undefined != getVariableName){
            getVariableName = $("#variableSelection option:selected").attr("data-name");
            getVariableIndex = $("#variableSelection option:selected").attr("data-index");
        }
        var jobDate = $("#serviceDate").val();
        var jobTime = $("#serviceTime").val();
        var jobFixedTime = $("#serviceTime option:selected").attr("data-fixedslot");
        var jobHumanizedDate = $("#serviceDate option:selected").text();
        var jobbHumanizedTime =  $("#serviceTime option:selected").text();
        var jobQuantity = $("#noOfServices").val();
        var jobFrequency = $("#frequencySelection").val();
        var jobFrequencyMF = $("#frequencySelection option:selected").attr("data-mf");
        var discountRcvd = dataForServicePage.data.subcat[subcategoryIndex].variables[getVariableIndex].discountReceived;
        var variablePayNowCost = dataForServicePage.data.subcat[subcategoryIndex].variables[getVariableIndex].variablePayNowCost;
        var jobIsAMC = 0;
        var jobIsCombo = dataForServicePage.data.subcat[subcategoryIndex].variables[getVariableIndex].jobIsCombo;
        var comments = $("#additionalComments").val();
        if(jobFrequency>0){
            jobIsAMC = 1;
        }
        if(jobFrequencyMF==undefined || jobFrequencyMF=="" ||jobFrequencyMF==null){
            jobFrequencyMF=1;
        }

        var surgeFactor = 1;
        var actualCost = Math.round((parseFloat(variablePayNowCost)+parseFloat(discountRcvd))*parseFloat(jobQuantity)*parseFloat(jobFrequencyMF));
        var totalCost = Math.round(parseFloat(variablePayNowCost)*parseFloat(jobQuantity)*parseFloat(jobFrequencyMF)*parseFloat(surgeFactor));
        var discountrcvdfinal = parseFloat(actualCost)-parseFloat(totalCost);
        var customisationDataCreateArray = [];




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
        /*console.log(jsonObjectForCartItem);*/
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

