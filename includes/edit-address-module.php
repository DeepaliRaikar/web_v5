<?php
/**
 * Created by PhpStorm.
 */
?>
<div class="modal fade" id="edit-address" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog" role="document">
        <!--Content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4>Edit Address</h4>
            </div>
            <div class="modal-body container-fluid block-section">
                <div class="container-fluid no-side-padding">
                    <form id="edit-address-form">
                        <!--full address-->
                        <div class="form-group label-static">
                            <label class="control-label font-weight-bold" for="customerAddress">Add Full Address</label>
                            <textarea id="customerAddress" rows="3" class="form-control"></textarea>
                        </div>
                        <!--full address end-->

                        <!--area -->
                        <div class="form-group label-static">
                            <label class="control-label font-weight-bold" for="addressArea">Select Area</label>
                            <select class="form-control" id="addressArea" >

                            </select>
                        </div>
                        <!--area end -->

                        <div class="pull-right">
                            <button type="button" class="btn btn-raised btn-tsz btn-tszYellow" id="btn-edit-address">Update Address</button>
                            <button type="reset" class="btn btn-raised btn-tsz btn-tszGrey" id="btn-cancel-edit-address"  data-dismiss="modal" aria-label="Close">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
