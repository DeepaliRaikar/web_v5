<?php
/**
 * Created by PhpStorm.
 */
?>
<div class="col-md-5 col-sm-5 col-xs-12 bookingDetails">
    <div class="col-md-12 col-sm-12 col-xs-12 card-elevation">
        <div class="serviceDetailsContainer row">
            <div class="col-md-12 col-sm-12 col-xs-12 selectionFields">
                 <?php
                    if (count($TSZgetInitArrayForService["data"]["subcat"]) <= 1 || $TSZgetInitArrayForService["data"]["subcat"][$subCategoryIndex]["subcategoryName"] == 'dummy') {
                        ?>
                        <input id="subcategorySelection" type="hidden" name="subcategorySelection"
                               data-name="<?php echo($TSZgetInitArrayForService["data"]["subcat"][$subCategoryIndex]["subcategoryName"]); ?>" value="<?php echo($TSZgetInitArrayForService["data"]["subcat"][$subCategoryIndex]["subcategoryID"]); ?>">
                        <?php
                    } else { ?>
                <div class="form-group">
                        <label for="subcategorySelection">Select Service</label>
                        <select id="subcategorySelection" class="form-control wide">
                            <?php
                            $subcategoryindexlooper = 0;
                            foreach ($TSZgetInitArrayForService["data"]["subcat"] as $subcatlooper) {
                                if ($subcatlooper["subcategoryID"] == $TSZsubCategoryID) {
                                    $subCategoryIndex = $subcategoryindexlooper;
                                    ?>
                                    <option data-index="<?php echo($subcategoryindexlooper);?>" value="<?php echo($subcatlooper["subcategoryID"]); ?>" data-name="<?php echo($subcatlooper["subcategoryName"]); ?>" selected><?php echo($subcatlooper["subcategoryName"]); ?></option>
                                <?php } else { ?>
                                    <option data-index="<?php echo($subcategoryindexlooper);?>"
                                        value="<?php echo($subcatlooper["subcategoryID"]); ?>" data-name="<?php echo($subcatlooper["subcategoryName"]); ?>"><?php echo($subcatlooper["subcategoryName"]); ?></option>
                                <?php }
                                $subcategoryindexlooper++;
                            } ?>
                        </select>
                </div>
                    <?php } ?>



            <div class="col-md-12 col-sm-12 col-xs-12 selectionFields">
                <div class="form-group relative-container">
                    <label for="variableSelection">Select <?php echo($TSZgetInitArrayForService["data"]["categoryName"]);?> Services</label>
                    <input type="text" class="form-control multiple-selection" id="multiple-selection" placeholder="Add Services" data-toggle="modal" data-target="#select-services"/>
                    <i class="material-icons text-yellow input-support-icon">add_circle</i>
                </div>
            </div>

            <div class="col-md-12 col-sm-12 col-xs-12 no-side-padding selectionFields">
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="form-group label-static">
                        <label for="serviceDate">Select Date</label>
                        <select id="serviceDate" class="form-control wide">

                        </select>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                        <label for="serviceTime">Select Time</label>
                        <select id="serviceTime" class="form-control wide">

                        </select>
                    </div>
                </div>
            </div>

            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="form-group label-static">
                    <label for="additionalComments"><?php echo($TSZgetInitArrayForService["data"]["additionalInputLabelName"]);?></label>
                    <input class="form-control" id="additionalComments" placeholder="Enter your comments here" type="text">
                </div>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12 no-side-padding">
                <div class="col-md-6 col-sm-6 col-xs-12"><label class="text-blue serviceTotalLabel">Service Total</label></div>
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
<div class="modal fade" id="select-services" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <form id="add-services-form relative-container">
        <div class="modal-dialog" role="document">
            <!--Content-->
            <div class="modal-content">
                <div class="modal-body container-fluid block-section">
                    <div class="container-fluid no-side-padding">
                        <!--service-->
                        <?php
                            $innerVariableLooper=0;
                            foreach($TSZgetInitArrayForService["data"]["subcat"][0]["variables"] as $vars){?>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-side-padding">
                                <div class="checkbox">
                                    <label class="full-width">
                                        <input type="checkbox" data-name="<?php echo($vars["variableName"]);?> " data-index="<?php echo($innerVariableLooper);?>" value="<?php echo($innerVariableLooper); ?>" class="service-checkbox"><span class="label-text"><?php echo($vars["variableName"]);?> <span class="text-float-right text-grey">₹ <?php echo($vars["variablePayNowCost"]);?> </span></span>
                                    </label>
                                </div>
                            </div>
                            <?php $innerVariableLooper++; }?>





                        <!--<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-side-padding">
                            <div class="checkbox">
                                <label class="full-width">
                                    <input type="checkbox" value="checkbox" class="service-checkbox"><span class="label-text">Checkbox <span class="text-float-right text-grey">₹ 499 </span></span>
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-side-padding">
                            <div class="checkbox">
                                <label class="full-width">
                                    <input type="checkbox" value="checkbox" class="service-checkbox"><span class="label-text">Checkbox <span class="text-float-right text-grey">₹ 499 </span></span>
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-side-padding">
                            <div class="checkbox">
                                <label class="full-width">
                                    <input type="checkbox" value="checkbox" class="service-checkbox"><span class="label-text">Checkbox <span class="text-float-right text-grey">₹ 499 </span></span>
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-side-padding">
                            <div class="checkbox">
                                <label class="full-width">
                                    <input type="checkbox" value="checkbox" class="service-checkbox"><span class="label-text">Checkbox <span class="text-float-right text-grey">₹ 499 </span></span>
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-side-padding">
                            <div class="checkbox">
                                <label class="full-width">
                                    <input type="checkbox" value="checkbox" class="service-checkbox"><span class="label-text">Checkbox <span class="text-float-right text-grey">₹ 499 </span></span>
                                </label>
                            </div>
                        </div>-->

                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-side-padding">
                            <div class="text-yellow font-weight-bold font-16">Service Total<span class="text-float-right">&#8377; <span class="service-total" class="font-28">0</span> </span></div>
                        </div>
                        <!--service-->

                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="col-lg-12 col-ms-12 col-sm-12 col-xs-12 no-side-padding btn-footer">
                    <button class="btn btn-raised btn-tsz btn-tszBlue full-width no-margin font-18" id="add-services"  data-dismiss="modal" aria-label="Close" onclick="javascript: selectServices();">Select Services</button>
                </div>
            </div>
        </div>
    </form>
</div>
    <script type="application/javascript">
        var subcategoryIndex = <?php echo($subCategoryIndex);?>;
    </script>
