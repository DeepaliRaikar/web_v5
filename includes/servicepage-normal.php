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
                    <input id="subcategorySelection" type="hidden"
                           data-name="<?php echo($TSZgetInitArrayForService["data"]["subcat"][$subCategoryIndex]["subcategoryName"]); ?>"
                           name="subcategorySelection"
                           value="<?php echo($TSZgetInitArrayForService["data"]["subcat"][$subCategoryIndex]["subcategoryID"]); ?>">
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
                                    <option data-name="<?php echo($subcatlooper["subcategoryName"]); ?>"
                                            value="<?php echo($subcatlooper["subcategoryID"]); ?>"
                                            selected><?php echo($subcatlooper["subcategoryName"]); ?></option>
                                <?php } else { ?>
                                    <option
                                        data-name="<?php echo($subcatlooper["subcategoryName"]); ?>"
                                        value="<?php echo($subcatlooper["subcategoryID"]); ?>"><?php echo($subcatlooper["subcategoryName"]); ?></option>
                                <?php }
                                $subcategoryindexlooper++;
                            } ?>
                        </select>
                    </div>
                <?php } ?>


                <?php if (count($TSZgetInitArrayForService["data"]["subcat"][$subCategoryIndex]["variables"]) == 1 && $TSZgetInitArrayForService["data"]["subcat"][$subCategoryIndex]["variables"][0]["variableName"] == 'dummy'){
                    ?>
                    <input id="variableSelection" type="hidden" name="variableSelection"
                           data-index="0"
                           data-name="<?php echo($TSZgetInitArrayForService["data"]["subcat"][$subCategoryIndex]["variables"][0]["variableName"]); ?>"
                           value="<?php echo($TSZgetInitArrayForService["data"]["subcat"][$subCategoryIndex]["variables"][0]["variableID"]); ?>">
                    <?php
                } else{ ?>
                <div class="form-group">
                    <label for="variableSelection">Select Type</label>
                    <select id="variableSelection" class="form-control wide">
                        <?php
                        $variableIndexLooper = 0;
                        foreach ($TSZgetInitArrayForService["data"]["subcat"][$subCategoryIndex]["variables"] as $subcatvarlooper) { ?>
                            <option data-name="<?php echo($subcatvarlooper["variableName"]); ?>"
                                    data-index="<?php echo($variableIndexLooper); ?>"
                                    value="<?php echo($subcatvarlooper["variableID"]); ?>"><?php echo($subcatvarlooper["variableName"]); ?></option>
                            <?php
                            $variableIndexLooper++;
                        }
                        } ?>
                    </select>
                </div>
            </div>

            <?php if (isset($TSZgetInitArrayForService["data"]["subcat"][$subCategoryIndex]["frequency"]) && count($TSZgetInitArrayForService["data"]["subcat"][$subCategoryIndex]["frequency"])) {
                if (count($TSZgetInitArrayForService["data"]["subcat"][$subCategoryIndex]["frequency"])==1) {?>
                    <input data-mf="1" id="frequencySelection" type="hidden" name="frequencySelection" value="1"/>
                <?php } else {
                    ?>
                    <div class="col-md-12 col-sm-12 col-xs-12 selectionFields">
                        <div class="form-group">
                            <label for="frequencySelection">Frequency</label>
                            <select id="frequencySelection" class="form-control wide">
                                <?php foreach ($TSZgetInitArrayForService["data"]["subcat"][$subCategoryIndex]["frequency"] as $catfreqlooper) { ?>
                                    <option
                                        data-mf="<?php echo($catfreqlooper["frequencyMultiplyingFactor"]); ?>" value="<?php echo($catfreqlooper["frequencyNumberOfServices"]); ?>"><?php echo($catfreqlooper["frequencyCaption"]); ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                <?php }
            } ?>


            <?php
            $freqLooperMin = $TSZgetInitArrayForService["data"]["subcat"][$subCategoryIndex]["minQuantity"];
            $freqLooperMax = $TSZgetInitArrayForService["data"]["subcat"][$subCategoryIndex]["maxQuantity"];
            if ($freqLooperMax - $freqLooperMin > 0) {
                ?>
                <div class="col-md-12 col-sm-12 col-xs-12 selectionFields">
                    <div class="form-group">
                        <label for="noOfServices">Quantity</label>
                        <select id="noOfServices" class="form-control">
                            <option value="1" selected>Select no. of services</option>
                            <?php
                            for ($x = $freqLooperMin; $x <= $freqLooperMax; $x++) {
                                ?>
                                <option value="<?php echo($x); ?>"><?php echo($x); ?></option>
                            <?php }
                            ?>
                        </select>
                    </div>
                </div>
                <?php
            } else {
                ?>
                <input id="noOfServices" type="hidden" name="noOfServices" value="1">
            <?php } ?>


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
                    <span class="serviceTotal">
                        <?php echo($TSZgetInitArrayForService["data"]["subcat"][$subCategoryIndex]["variables"][0]["variablePayNowCost"]); ?>
                    </span>
                </div>
            </div>
        </div>
        <div class="serviceFooter">
            <button class="btn btn-tsz btn-tszBlue full-width book-service-button">BOOK SERVICE</button>
        </div>
    </div>
</div>
<script type="application/javascript">
    var subcategoryIndex = <?php echo($subCategoryIndex);?>;
</script>
