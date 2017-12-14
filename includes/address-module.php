<?php
/**
 * Created by PhpStorm.
 * User: Deeps
 * Date: 02-02-2017
 * Time: 16:48
 */
?>
<div id="addressDetails" class="col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1 col-sm-12 col-xs-12">
    <div class="container-fluid no-side-padding" id="saved-address">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 card-elevation saved-address" id="saved-address-1" onclick="javascript: addAddressToCheckout(this);">
            <div class="container-fluid card-elevation saved-address-card text-center">
                <img src="img/placeholder.gif" width="100%"/>
            </div>
        </div>

        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 card-elevation saved-address" id="saved-address-2" onclick="javascript: addAddressToCheckout(this);">
            <div class="container-fluid card-elevation saved-address-card text-center">
                <img src="img/placeholder.gif" width="100%"/>
            </div>
        </div>
    </div>

    <div class="text-center">
        <span class="btn-add-new-address text-yellow text-center" onclick="javascript: addNewAddress(this);">+ Add new Address</span>
    </div>

    <form id="add-address-form">
        <!--full address-->
        <div class="form-group label-floating">
            <label class="control-label" for="customerAddress">Add Full Address</label>
            <textarea id="customerAddress" rows="3" class="form-control"></textarea>
        </div>
        <!--full address end-->

        <!--area -->
        <div class="form-group label-static">
            <select class="form-control" id="addressArea" >
                <option value="">Select Area</option>
                <option value="dadar">Dadar</option>
            </select>
        </div>
        <!--area end -->

        <div class="pull-right">
            <button type="button" class="btn btn-raised btn-tsz btn-tszYellow" id="btn-add-address" onclick="javascript: addAddress();">Add Address</button>
            <button type="reset" class="btn btn-raised btn-tsz btn-tszGrey" id="btn-cancel-add-address" onclick="javascript: cancelAddAddress();">Cancel</button>
        </div>

    </form>
</div>
