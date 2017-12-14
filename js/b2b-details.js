/**
 * Created by Deeps on 28-02-2017.
 */
function changeNameLabel(element){
    var representingValue = $(element).val();
    $(element).siblings($(".dropdownjs")).children(".fakeinput").css("color","#273c4d");
    if(representingValue == ""){
        $(element).siblings($(".dropdownjs")).children(".fakeinput").css("color","#c7c7c7");
    }
    if(representingValue == "Brand"){
        $(".businessCompanyName").html('Brand Name');
        $("#representingValueType").val('Brand Name');
    }
    if(representingValue == "Corporate"){
        $(".businessCompanyName").html('Company Name');
        $("#representingValueType").val('Company Name');
    }
    else if(representingValue == "Residential Society"){
        $(".businessCompanyName").html('Society Name');
        $("#representingValueType").val('Society Name');
    }
    else if(representingValue == "Others"){
        $(".businessCompanyName").html('Business Name');
        $("#representingValueType").val('Business Name');
    }
}

$('#businessPhone').on('keydown', function(e){-1!==$.inArray(e.keyCode,[46,8,9,27,13,110,190])||/65|67|86|88/.test(e.keyCode)&&(!0===e.ctrlKey||!0===e.metaKey)||35<=e.keyCode&&40>=e.keyCode||(e.shiftKey||48>e.keyCode||57<e.keyCode)&&(96>e.keyCode||105<e.keyCode)&&e.preventDefault()});