<?php
/**
 * Created by PhpStorm.
 */
?>

<?php
/**
 * Created by PhpStorm.
 */
?>
<div class="modal fade" id="service-ratecard" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog" role="document">
        <!--Content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="font-weight-bold">Rate Card</h4>
            </div>
            <div class="modal-body container-fluid block-section">
                <div class="container-fluid no-side-padding ratecard-wrapper">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs text-center" role="tablist">
                        <li role="presentation" class="active"><a href="#ratecard-service1" aria-controls="ratecard-service1" role="tab" data-toggle="tab">Scheduled Orders</a></li>
                        <li role="presentation"><a href="#ratecard-service2" aria-controls="ratecard-service2" role="tab" data-toggle="tab">Completed Orders</a></li>
                        <li role="presentation"><a href="#ratecard-service3" aria-controls="ratecard-service3" role="tab" data-toggle="tab" class="text-blue">Cancelled Orders</a></li>
                    </ul>
                    <br/>
                    <br/>
                    <!-- Tab panes -->
                    <div class="tab-content box-elevation">
                        <div role="tabpanel" class="tab-pane active" id="ratecard-service1">
                            <table class="table table-striped table-bordered ">
                                <thead>
                                    <tr class="font-weight-bold">
                                        <th class="text-left">Item Name</th>
                                        <th class="text-center">Price</th>
                                    </tr>
                                </thead>
                                <tbody id="ratecard-results">
                                    <tr class=" font-weight-regular">
                                        <td class="text-left"><i class="material-icons">close</i></td>
                                        <td class="text-center"><i class="material-icons check">check</i></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="ratecard-service2">
                            <table class="table table-striped table-bordered ">
                                <thead>
                                    <tr class="font-weight-bold">
                                        <th class="text-left">Item Name</th>
                                        <th class="text-center">Price</th>
                                    </tr>
                                </thead>
                                <tbody id="ratecard-results">
                                    <tr class=" font-weight-regular">
                                        <td class="text-left"><i class="material-icons">close</i></td>
                                        <td class="text-center"><i class="material-icons check">check</i></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="ratecard-service3">
                            <table class="table table-striped table-bordered ">
                                <thead>
                                    <tr class="font-weight-bold">
                                        <th class="text-left">Item Name</th>
                                        <th class="text-center">Price</th>
                                    </tr>
                                </thead>
                                <tbody id="ratecard-results">
                                    <tr class=" font-weight-regular">
                                        <td class="text-left"><i class="material-icons">close</i></td>
                                        <td class="text-center"><i class="material-icons check">check</i></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer container-fluid">
                <p class="container-fluid text-left text-red font-weight-bold">Please note: </p>
                <p class="container-fluid text-left font-weight-regular" id="service-ratecard-note">All rates are inclusive of service tax </p>
            </div>
        </div>
    </div>
</div>

