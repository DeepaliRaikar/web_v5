<?php
/**
 * Created by PhpStorm.
 */
//$createArrayForBrands =
$variableNameFirst = "";

?>
<div class="col-md-5 col-sm-5 col-xs-12 bookingDetails">
    <div class="col-md-12 col-sm-12 col-xs-12 card-elevation">
        <div class="serviceDetailsContainer row">

            <div class="col-md-12 col-sm-12 col-xs-12 selectionFields">
                <div class="form-group">
                    <label for="variableGroupSelection">Select a Brand</label>
                    <select id="variableGroupSelection" class="form-control wide">
                        <?php foreach ($TSZgetInitArrayForService["data"]["brands"] as $brands) {
                            ?>
                            <option
                                value='<?php echo($brands["variableGroupName"]); ?>'><?php echo($brands["variableGroupName"]); ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>

            <div class="col-md-12 col-sm-12 col-xs-12 selectionFields">
                <div class="form-group">
                    <label
                        for="variableNameSelection"><?php echo($TSZgetInitArrayForService["data"]["categoryName"]); ?></label>
                    <select id="variableNameSelection" class="form-control wide">
                        <?php
                        $variableNameLooper = 0;
                        foreach ($TSZgetInitArrayForService["data"]["models"] as $varlooper) {
                            if($variableNameLooper==0){
                                $variableNameFirst = $varlooper["variableName"];
                            }
                            ?>
                            <option value="<?php echo($varlooper["variableName"]); ?>"><?php echo($varlooper["variableName"]); ?></option>
                        <?php
                            $variableNameLooper++;
                        } ?>
                    </select>
                </div>
            </div>

            <div class="col-md-12 col-sm-12 col-xs-12 selectionFields ">
                <div class="form-group relative-container">
                    <label for="subcategorySelection">Select <?php echo($TSZgetInitArrayForService["data"]["categoryName"]); ?>Services</label>
                    <input type="text" class="form-control multiple-selection" id="multiple-selection" placeholder="Add Services" data-toggle="modal" data-target="#select-services"/>
                    <i class="material-icons text-yellow input-support-icon">add_circle</i>
                </div>
            </div>


            <div class="col-md-12 col-sm-12 col-xs-12 no-side-padding selectionFields">
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="form-group label-static">
                        <label for="serviceDate">Select Date</label>
                        <select id="serviceDate" class="form-control">

                        </select>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                        <label for="serviceTime">Select Time</label>
                        <select id="serviceTime" class="form-control">

                        </select>
                    </div>
                </div>
            </div>

            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="form-group label-static">
                    <label
                        for="additionalComments"><?php echo($TSZgetInitArrayForService["data"]["additionalInputLabelName"]); ?></label>
                    <input class="form-control" id="additionalComments" placeholder="Enter your comments here"
                           type="text">
                </div>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12 no-side-padding">
                <div class="col-md-6 col-sm-6 col-xs-12"><label class="text-blue serviceTotalLabel">Service
                        Total</label></div>
                <div class="col-md-6 col-sm-6 col-xs-12"><span class="serviceTotalLabel">&#8377;</span>
                    <span class="serviceTotal service-total">
                        0
                    </span>
                </div>
            </div>
        </div>
        <div class="serviceFooter">
            <button class="btn btn-tsz btn-tszBlue full-width book-service-button">BOOK SERVICE</button>
        </div>
    </div>
</div>


<!--select multiple services-->
<div class="modal fade" id="select-services" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <form id="add-services-form relative-container">
        <div class="modal-dialog" role="document">
            <!--Content-->
            <div class="modal-content">
                <div class="modal-body container-fluid block-section">
                    <div class="container-fluid no-side-padding">
                        <!--service-->
                        <div id="dropdown-subcategories">
                            <div class="container-fluid card-elevation saved-address-card text-center">
                                <img src="img/placeholder.gif" width="100%"/>
                            </div>
                        </div>


                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-side-padding">
                            <div class="text-yellow font-weight-bold font-16">Service Total<span
                                    class="text-float-right">&#8377; <span class="service-total"
                                                                           class="font-28">0</span> </span></div>
                        </div>
                        <!--service-->

                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="col-lg-12 col-ms-12 col-sm-12 col-xs-12 no-side-padding btn-footer">
                    <button class="btn btn-raised btn-tsz btn-tszBlue full-width no-margin font-18" id="add-services"
                            data-dismiss="modal" aria-label="Close" onclick="javascript: selectServices();">Select
                        Services
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>
<script type="application/javascript">
    var selectedVariableName = '<?php echo($variableNameFirst);?>';
</script>