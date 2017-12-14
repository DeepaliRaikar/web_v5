/**
 * Created by Deeps on 18-02-2017.
 */
$(document).ready(function()
{
    customStyles();
    $('.header').addClass("headerFixed");
    $(".couponCode").click(function(){
        $("#copyCouponCode").children("span").attr("id", "coupon"+$(this).children().attr("id"));
        $("#copyCouponCode").children("span").html($(this).children().html());
        $("#copyCouponCode").attr("data-clipboard-target", "#coupon"+$(this).children().attr("id"));
        (function(){
            new Clipboard('#couponCodeCopy');
            alert("The coupon code "+$("#copyCouponCode").children("span").html()+" has been copied");
        })();

        var couponName = $("#copyCouponCode").children("span").html();
        setCookie("timesaverzCouponCode", couponName, 90);
        $("#couponCode").val(couponName);
        $("#couponCode").closest(".form-group").removeClass("is-empty").addClass("label-floating");
    })
});

$(".filter").on("click", function()
{
    //Set filter value
    var filterType = $(this).attr("data-filter");
    var element = $(this);
    var numOfCoupons = 0;

    //Remove active class from all filters
    $(".filter").each(function(){
        $(this).removeClass("active");
    });

    $(element).addClass("active");

    $(".portfolio").each(function()
    {
        if(filterType != "all")
        {
            if(!$(this).hasClass(filterType))
            {
                $(this).hide();
            }
            else
            {
                $(this).show();
                numOfCoupons = $("."+filterType).size();
            }
        }
        else
        {
            $(this).show();
            numOfCoupons = $(".portfolio").size();
        }
    });
    if(numOfCoupons == 0){
        $(".noCouponText").show();
    }
    else
    {
        $(".noCouponText").hide();
    }
    $('html, body').animate({
        scrollTop: ($('.deals').offset().top - ($(".filters-container").height() + 100))
    },1000);
});

$(window).resize(function(){
    customStyles();
})

function customStyles(){
    $(".deals").css({
        // 'margin-top': $(".filters-container").height()
    })
}