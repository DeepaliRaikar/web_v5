<?php
/**
 * Created by PhpStorm.
 */
?>
<div class="modal fade" id="raise-new-ticket" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog" role="document">
        <!--Content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4>Raise A Ticket</h4>
            </div>
            <div class="modal-body container-fluid block-section">
                <div class="container-fluid no-side-padding">
                    <form id="raise-new-ticket-form">

                        <!--ticket title-->
                        <div class="form-group label-static">
                            <label class="control-label font-weight-bold" for="customerAddress">Ticket Title</label>
                            <input class="form-control" type="text" id="ticket-title"/>
                        </div>
                        <!--ticket title-->

                        <!--Ticket category -->
                        <div class="form-group label-static">
                            <label class="control-label font-weight-bold" for="ticket-category">Ticket Category</label>
                            <select class="form-control wide" id="ticket-category">
                                <option value="">Choose a category</option>
                                <option value="1">Service Partners</option>
                                <option value="2">Order Related</option>
                                <option value="3">App / Website</option>
                                <option value="4">Customer Care / Operations</option>
                                <option value="5">Billing</option>
                            </select>
                        </div>
                        <!--ticket category -->

                        <!--full address-->
                        <div class="form-group label-static">
                            <label class="control-label font-weight-bold" for="customerAddress">Ticket Description</label>
                            <textarea id="customerAddress" rows="3" class="form-control"></textarea>
                        </div>
                        <!--full address end-->


                        <div class="form-group">
                            <button type="button" class="btn btn-raised btn-tsz btn-tszYellow" id="btn-edit-address">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
