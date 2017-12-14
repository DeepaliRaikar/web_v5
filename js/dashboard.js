/**
 * Created by anuragshukla on 31/01/17.
 */

$(function () {
    //Declare Object For Addresses
    var dashboardAddressObject = null;
    var dashboardAddressIndex = null;
    $(".empty-card-items").hide();
    $("#no-addresses").hide();
    $("#profile-detail-loading").show();
    $("#profile-detail-loaded").hide();

    $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
        if($("#sidebar").height() < $("#dashboard-right-content").outerHeight())
        $("#sidebar").css('height',$("#dashboard-right-content").outerHeight());
    });

    //Ajax Call for Dashboard
    function getDataForDashboardProfile() {
        var response = null;
        dataFactoryCall("services/user/fetch", "GET", "userID=" + selectedUserID, function (returndata) {
            response = returndata;
            if (response.status) {
                parseDashboardProfileDataAndLoad(response, "ajax");
            } else {
                $("#profile-detail-loading").hide();
                $("#profile-detail-loaded").fadeIn();
            }
        });
    }

    function parseDashboardProfileDataAndLoad(response, type) {
        var profiledata = response.data;
        $("#dashboard-user-name").html(profiledata.userFullName);
        $(".dashboard-user-referralcode").html(profiledata.userReferralData.userReferralCode);
        $(".dashboard-user-minutes").html(profiledata.userMinutes);
        $(".user-profile-image").html('<img src="' + profiledata.userAvatar + '" class="img-circle"/>');
        $("#customerFullName").val(profiledata.userFullName);
        $("#customerEmail").val(profiledata.userEmailAddress);
        $("#customerMobileNumber").val(profiledata.userMobileNumber);
        if (profiledata.userDOB == "0000-00-00") {
            $('#date-of-birth').val('');
        } else {
            $('#date-of-birth').val(profiledata.userDOB);
            $('#date-of-birth').attr("disabled", true);
            $("#dashboard-blank-birthday").html("");
        }
        if (profiledata.userDOA == "0000-00-00") {
            $('#date-of-anniversary').val('');
        } else {
            $('#date-of-anniversary').val(profiledata.userDOA);
            $('#date-of-anniversary').attr("disabled", true);
            $("#dashboard-blank-anniversay").html("");
        }
        var genderData = '';
        if (!profiledata.userGender) {
            genderData = '<option value="">Please select gender</option>' +
                '<option value="male">Male</option>' +
                '<option value="female">Female</option>';
            $("#customerGender").html(genderData);
        } else {
            if (profiledata.userGender == "male") {
                genderData = '<option value="">Please select gender</option>' +
                    '<option value="male" selected>Male</option>' +
                    '<option value="female">Female</option>';
            } else {
                genderData = '<option value="">Please select gender</option>' +
                    '<option value="male">Male</option>' +
                    '<option value="female" selected>Female</option>';
            }
            $("#customerGender").html(genderData);
        }
        parseReferralDataAndLoad(profiledata.userReferralData);
        $("#profile-detail-loading").hide();
        $("#profile-detail-loaded").fadeIn();
    }


    function parseReferralDataAndLoad(referraldata) {
        var htmldataforrefferal = '';
        var refNote = referraldata.referralNoteBody.replace("OFF*", "OFF^");
        var referallBodyTextSplit = refNote.split("* ");
        var framebodytext = '<p class="text-blue">' + referallBodyTextSplit[0] + '</p>';
        framebodytext += '<p class="text-grey no-margin">' + referallBodyTextSplit[1] + '</p>';
        framebodytext += '<p class="text-grey">' + referallBodyTextSplit[2] + '</p>';

        htmldataforrefferal = '<p class="text-blue text-center font-weight-bold" id="referral-header">' + referraldata.referralNoteHeader + '</p>' + framebodytext +
            '<p class="text-blue text-center font-weight-bold" id="referral-header">' +
            'Friends Reffered: <span id="friendsReferred">' + referraldata.friendsReferred + '</span>' +
            '</p>';
        $(".referral-text").html(htmldataforrefferal);
    }

    function getDataForDashboardAddress() {
        Pace.start();
        var response = null;
        dataFactoryCall("services/addresses/fetch", "GET", "userID=" + selectedUserID + "&cityID="+selectedCityID, function (returndata) {
            response = returndata;
            if (response.status) {
                parseDashboardAddressDataAndLoad(response, "ajax");
            } else {
                $("#no-addresses").show();
            }
        });
    }

    function parseDashboardAddressDataAndLoad(response, type) {
        if (response.data.length > 0) {
            dashboardAddressIndex = null;
            dashboardAddressObject = response.data;
            var htmldataforaddresses = '';
            $.each(response.data, function (index, value) {
                htmldataforaddresses += '<div class="container-fluid card-elevation saved-address-card text-center" id="addresscard-' + index + '">' +
                    '<span class="edit-address font-12">' +
                    '<a href="#" class="text-yellow" data-toggle="modal" data-target="#edit-address">' +
                    '<i class="material-icons">edit</i></a></span>' +
                    '<div class="font-weight-bold font-15">' + value.areaName + ' (' + value.areaPinCode + ')</div>' +
                    '<p class="font-weight-regular saved-address font-15">' + value.userAddress + '</p>' +
                    '<p class="font-weight-regular font-15"><span class="saved-mobile-number">' + value.cityName + '</span></p>' +
                    '</div>';
            });
            $("#has-addresses").html(htmldataforaddresses);
        } else {

            $("#has-addresses").hide();
            $("#no-addresses").show();
        }
        $(".saved-address-card").click(function () {
            var addressIndex = $(this).attr('id');
            var getIndexAfterSplit = addressIndex.split("-");
            dashboardAddressIndex = getIndexAfterSplit[1];
            $("#customerAddress").val("");
            $("#addressArea").html('<option value="">Loading....</option>');
            $("#customerAddress").val(dashboardAddressObject[dashboardAddressIndex].userAddress);
            getDataForDashboardAddressAreas(dashboardAddressObject[dashboardAddressIndex].userAreaID);
            $("#btn-edit-address").prop('disabled', true);
        });
    }

    function updateDataForDashboardProfile(updateFields) {
        var response = null;
        dataFactoryCall("services/user/update", "PUT", updateFields, function (returndata) {
            response = returndata;
            if (response.status) {
                alert(response.data);
            } else {
                alert("Something went wrong! Please try again");
            }
        });
    }

    function updateDataForDashboardAddress(address, areaID, addressID) {
        var response = null;
        dataFactoryCall("services/addresses/update", "PUT", "address=" + address + "&areaID=" + areaID + "&addressID=" + addressID, function (returndata) {
            response = returndata;
            if (response.status) {
                $("#edit-address").modal('toggle');
                getDataForDashboardAddress();
            } else {
                alert("Something went wrong! Please try again");
            }
        });
    }


    $("#btn-edit-address").click(function () {
        var address = $("#customerAddress").val();
        var areaID = $("#addressArea").val();
        var addressID = dashboardAddressObject[dashboardAddressIndex].addressID;
        updateDataForDashboardAddress(address, areaID, addressID);
    });

    function getDataForDashboardAddressAreas(areaID) {
        var response = null;
        dataFactoryCall("services/addresses/areas", "GET", "userID=" + selectedUserID + "&cityID="+selectedCityID, function (returndata) {
            response = returndata;
            if (response.status) {
                parseDashboardAddressAreasDataAndLoad(response, areaID);
                $("#btn-edit-address").prop('disabled', false);
            } else {
                alert("Something went wrong! Please try again");
            }
        });
    }

    function parseDashboardAddressAreasDataAndLoad(response, areaID) {
        if (response.data.length > 0) {
            var htmldataforaddressesareas = '';
            $.each(response.data, function (index, value) {
                if (value.areaID == areaID) {
                    htmldataforaddressesareas += '<option value="' + value.areaID + '" selected>' + value.areaName + ' - ' + value.areaPinCode + '</option>';
                } else {
                    htmldataforaddressesareas += '<option value="' + value.areaID + '">' + value.areaName + ' - ' + value.areaPinCode + '</option>';
                }

            });
            $("#addressArea").html(htmldataforaddressesareas);
        } else {
            alert("Something went wrong! Please try again");
        }
    }


    function getDataForDashboardMinutesTimeline() {
        var response = null;
        dataFactoryCall("services/minutes/details", "GET", "userID=" + selectedUserID, function (returndata) {
            response = returndata;
            if (response.status) {
                parseDashboardMinutesTimelineDataAndLoad(response, "ajax");
            } else {
                $("#no-minutes").show();
            }
        });
    }

    function parseDashboardMinutesTimelineDataAndLoad(response, type) {
        if (response.data.minutesTimeline.length > 0) {
            var htmldataforminutestimeline = '';
            $.each(response.data.minutesTimeline, function (index, value) {
                htmldataforminutestimeline += '<div class="timeline-item col-md-12 col-sm-12 col-xs-12">' +
                    '<div class="minutes-image text-center col-md-2 col-sm-2 col-xs-4 no-side-padding">' +
                    '<img src="' + value.icon + '"/>' +
                    '<div class="vertical-connector"></div>' +
                    '</div>' +
                    '<div class="earned-minutes-reason col-md-5 col-sm-5 col-xs-5 no-side-padding">' +
                    '<div>' +
                    '<div class="earned-minutes-reason-text font-weight-regular font-16" data-toggle="tooltip" data-placement="left">' + value.eventName + '</div>' +
                    '<div class="earned-minutes-date font-weight-regular text-grey font-16">' + value.earnedAt + '</div>' +
                    '</div>' +
                    '</div>' +
                    '<div class="earned-minutes col-md-3 col-md-offset-1 col-sm-3 col-sm-offset-1 col-xs-3 no-side-padding">' +
                    '<div>' +
                    '<div class="minutes-amount text-center font-weight-regular">' +
                    '<span class="font-22">' + value.minutes + '</span> <span class="font-13">Minutes</span>' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '</div>';
            });
            $("#has-minutes").html(htmldataforminutestimeline);
        } else {
            console.log("Here");
            $("#no-minutes").show();
        }

        if (response.data.howToEarnMinutes.length > 0) {
            var htmldataforminuteshowto = '';
            var classchecked = "";
            var limittext = ""
            var minutetextclass = "";
            $.each(response.data.howToEarnMinutes, function (index, value) {
                if (value.recurringLimit > 0) {
                    limittext = 'Your Score: ' + value.totalActions + '/' + value.recurringLimit;
                } else {
                    limittext = 'Your Score: ' + value.totalActions;
                }
                if (value.totalActions > 0) {
                    classchecked = "checked";
                } else {
                    limittext = "Your Score: 0";
                    classchecked = "";
                }
                if (value.minutes > 0) {
                    minutetextclass = "minutes-green";
                } else {
                    minutetextclass = "minutes-red";
                }
                htmldataforminuteshowto += '<div class="list-group-item">' +
                    '<div class="row-picture">' +
                    '<div class="minutes-earn-status ' + classchecked + ' text-center">' +
                    '<span class="material-icons status-checked">done</span>' +
                    '</div>' +
                    '</div>' +
                    '<div class="row-content">' +
                    '<div class="action-secondary"><span class="font-22 ' + minutetextclass + '">' + value.minutes + '</span>' +
                    '<span class="font-13"> Minutes</span></div>' +
                    '<p class="font-16 no-margin">' + value.eventName + '</p>' +
                    '<p class="no-margin font-14 text-grey font-weight-regular">' + limittext + '</p>' +
                    '</div>' +
                    '</div>' +
                    '<div class="list-group-separator"></div>';
            });
            $("#how-to-earn-minutes").html(htmldataforminuteshowto);
        }
    }


    function getDataForDashboardStatus() {
        var response = null;
        //39668 //49114
        dataFactoryCall("services/dashboard/status", "GET", "userID=" + selectedUserID, function (returndata) {
            response = returndata;
            if (response.status) {
                parseDashboardStatusDataAndLoad(response, "ajax");
            } else {
                $(".available-card-items").hide();
                $(".empty-card-items").show();
            }
        });
    }

    function parseDashboardStatusDataAndLoad(response, type) {
        if (response.data.progress.length > 0) {
            parseScheduledDataAndLoad(response.data.progress);
            $("#scheduled-no-bookings").hide();
            $("#scheduled-has-bookings").show();
        } else {
            $("#scheduled-has-bookings").hide();
            $("#scheduled-no-bookings").show();
        }
        if (response.data.completed.length > 0) {
            parseCompletedDataAndLoad(response.data.completed);
            $("#completed-has-bookings").show();
            $("#completed-no-bookings").hide();
        } else {
            $("#completed-has-bookings").hide();
            $("#completed-no-bookings").show();
        }
        if (response.data.cancelled.length > 0) {
            parseCancelledDataAndLoad(response.data.cancelled);
            $("#cancelled-has-bookings").show();
            $("#cancelled-no-bookings").hide();
        } else {
            $("#cancelled-has-bookings").hide();
            $("#cancelled-no-bookings").show();
        }
    }

    function parseScheduledDataAndLoad(response) {
        var htmldataforscheduledjobs = "";
        $.each(response, function (index, value) {
            htmldataforscheduledjobs += '<div class="container-fluid box-elevation order-details-card equalHeightContainer">' +
                '<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">' +
                '<div class="list-group">' +
                '<div class="list-group-item serviceDetailsCard">' +
                '<div class="row-picture serviceCardIcon">' +
                '<img class="transparent-background" src="//cdn-timesaverz.s3.amazonaws.com/documents/assets/icons/v5/' + value.iconID + '.png" alt="icon">' +
                '</div>' +
                '<div class="row-content bookedServiceDetails">' +
                '<label class="text-blue">' + value.categoryName + ' : ' + value.supercategoryName + '</label>' +
                '<p class="list-group-item-text bookedServiceSchedule">' + value.jobTimeHours + '</p>' +
                '</div>' +
                '</div>' +
                '</div>' +
                '</div>' +
                '<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 order-details border-left equalHeightItem">' +
                '<div class="container-fluid font-15">' +
                '<span class="text-grey">Order ID: </span> <span class="font-weight-bold orderID">' + value.jobID + '</span>' +
                '</div>' +
                '<div class="container-fluid font-15">' +
                '<span class="text-grey">Status: </span> <span class="font-weight-bold orderStatus">' + value.jobStatus + '</span>' +
                '</div>' +
                '<div class="container-fluid font-15">' +
                '<span class="text-grey">Agent: </span> <span class="font-weight-bold agentAssigned">' + value.workerName + '</span>' +
                '</div>' +
                '<div class="container-fluid font-14">' +
                '<span class="text-grey visibility-hidden">Rating: </span>' +
                '<span class="starRating">' +
                '<i class="fa fa-star ratedStar"></i>' +
                '<i class="fa fa-star ratedStar"></i>' +
                '<i class="fa fa-star ratedStar"></i>' +
                '<i class="fa fa-star ratedStar"></i>' +
                '<i class="fa fa-star"></i>' +
                '</span>' +
                '</div>' +
                '</div>' +
                '<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 equalHeightItem">' +
                '<div class="container-fluid equalHeightInnerContainer">' +
                '<span class="text-to-bottom"><span class="text-grey">Order Total: </span>' +
                '<span class="text-yellow font-weight-bold">&#8377; <span class="font-20 orderTotal">' + value.totalCost + '</span></span></span>' +
                '</div>' +
                '</div>' +
                '</div>';
        });
        $("#scheduled-has-bookings").html(htmldataforscheduledjobs);
    }

    function parseCompletedDataAndLoad(response) {
        var htmldataforcompletedjobs = "";
        $.each(response, function (index, value) {
            htmldataforcompletedjobs += '<div class="container-fluid box-elevation order-details-card equalHeightContainer">' +
                '<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">' +
                '<div class="list-group">' +
                '<div class="list-group-item serviceDetailsCard">' +
                '<div class="row-picture serviceCardIcon">' +
                '<img class="transparent-background" src="//cdn-timesaverz.s3.amazonaws.com/documents/assets/icons/v5/' + value.iconID + '.png" alt="icon">' +
                '</div>' +
                '<div class="row-content bookedServiceDetails">' +
                '<label class="text-blue">' + value.categoryName + ' : ' + value.supercategoryName + '</label>' +
                '<p class="list-group-item-text bookedServiceSchedule">' + value.jobTimeHours + '</p>' +
                '</div>' +
                '</div>' +
                '</div>' +
                '</div>' +
                '<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 order-details border-left equalHeightItem">' +
                '<div class="container-fluid font-15">' +
                '<span class="text-grey">Order ID: </span> ' +
                '<span class="font-weight-bold orderID">' + value.jobID + '</span>' +
                '</div>' +
                '<div class="container-fluid font-15">' +
                '<span class="text-grey">Agent: </span> <span class="font-weight-bold agentAssigned">' + value.workerName + '</span>' +
                '</div>' +
                '<div class="container-fluid font-14">' +
                '<span class="text-grey visibility-hidden">Rating: </span>' +
                '<span class="starRating">' +
                '<i class="fa fa-star ratedStar"></i>' +
                '<i class="fa fa-star ratedStar"></i>' +
                '<i class="fa fa-star ratedStar"></i>' +
                '<i class="fa fa-star ratedStar"></i>' +
                '<i class="fa fa-star"></i>' +
                '</span>' +
                '</div>' +
                '</div>' +
                '<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 equalHeightItem">' +
                '<div class="container-fluid equalHeightInnerContainer">' +
                '<span class="text-to-bottom"><span class="text-grey">Order Total: </span>' +
                '<span class="text-yellow font-weight-bold">&#8377; <span class="font-20 orderTotal">' + value.totalCost + '</span></span></span>' +
                '</div>' +
                '</div>' +
                '</div>';
        });
        $("#completed-has-bookings").html(htmldataforcompletedjobs);
    }

    function parseCancelledDataAndLoad(response) {
        var htmldataforcancelledjobs = "";
        $.each(response, function (index, value) {
            htmldataforcancelledjobs += '<div class="container-fluid box-elevation order-details-card equalHeightContainer">' +
                '<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">' +
                '<div class="list-group">' +
                '<div class="list-group-item serviceDetailsCard">' +
                '<div class="row-picture serviceCardIcon">' +
                '<img class="transparent-background" src="//cdn-timesaverz.s3.amazonaws.com/documents/assets/icons/v5/' + value.iconID + '.png" alt="icon">' +
                '</div>' +
                '<div class="row-content bookedServiceDetails">' +
                '<label class="text-blue">' + value.categoryName + ' : ' + value.supercategoryName + '</label>' +
                '<p class="list-group-item-text bookedServiceSchedule">' + value.jobAddress + '</p>' +
                '</div>' +
                '</div>' +
                '</div>' +
                '</div>' +
                '<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 order-details border-left equalHeightItem">' +
                '<div class="container-fluid font-15 equalHeightInnerContainer">' +
                '<span class="text-to-bottom"><span class="text-grey">Order ID: </span> <span class="font-weight-bold orderID">' + value.jobID + '</span></span>' +
                '</div>' +
                '</div>' +
                '<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 equalHeightItem">' +
                '<div class="container-fluid equalHeightInnerContainer">' +
                '<span class="text-to-bottom"><span class="text-grey">Order Total: </span>' +
                '<span class="text-yellow font-weight-bold">&#8377; <span class="orderTotal font-20">' + value.totalCost + '</span></span></span>' +
                '</div>' +
                '</div>' +
                '</div>';
        });
        $("#cancelled-has-bookings").html(htmldataforcancelledjobs);
    }

    getDataForDashboardProfile();
    getDataForDashboardStatus();
    getDataForDashboardAddress();
    getDataForDashboardMinutesTimeline();

    $("#updateProfileButton").click(function () {
        var userFullName = $("#customerFullName").val();
        var userEmailAddress = $("#customerEmail").val();
        var userMobileNumber = $("#customerMobileNumber").val();
        var userGender = $("#customerGender").val();
        var userDOB = $("#date-of-birth").val();
        var userDOA = $("#date-of-anniversary").val();
        var fullKeyForUpdate = "userID=" + selectedUserID + "&userFullName=" + userFullName + "&userEmailAddress=" + userEmailAddress + "&userMobileNumber=" + userMobileNumber +
            "&userGender=" + userGender + "&userDOB=" + userDOB + "&userDOA=" + userDOA;
        updateDataForDashboardProfile(fullKeyForUpdate);
    });

    $('.date').bootstrapMaterialDatePicker
    ({
        time: false,
        clearButton: false
    });

    //scroll to screen top on click of sidebar-option to the left on dashboard
    $("#dashboard #sidebar-options li a").click(function(){
        $("html, body").animate({ // catch the `html, body`
            scrollTop: $("#dashboard-right-content").offset().top - 50 // make their `scrollTop` property 0, to go at the top
        }, 1000); // in 1000 ms (1 second)
    })

});

// toggle sidebar for servicepage and others
function toggleDashboardSidebar(){
    // $("#sidebar").toggleClass('sidebar-options-hidden sidebar-options-visible');
}


