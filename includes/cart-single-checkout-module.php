<?php
/**
 * Created by PhpStorm.
 * User: Deeps
 * Date: 02-02-2017
 * Time: 17:05
 */
$cartToggleAttribute = "";
if($TSZuserID>0){
    $cartToggleAttribute= 'data-toggle="collapse"';
}

?>
<div class="container-fluid no-side-padding" id="cart-checkout-steps">
    <div class="panel-group accordion" id="cartPaymentAccordion" role="tablist" aria-multiselectable="true">
        <div class="panel panel-default" id="login-step">
            <?php if($TSZuserID>0){?>
                <div class="panel-heading" role="tab" id="LogInDetailsHeader">
                    <h4 class="panel-title">
                        <a role="button" <?php echo($cartToggleAttribute);?> data-parent="#cartPaymentAccordion" href="#logInDetailsModule" aria-expanded="false" aria-controls="logInDetailsModule">
                            Log In
                            <span class="step-options">
                            <i class="material-icons text-yellow stepComplete" aria-hidden="true">check_circle</i>
                            <i class="fa fa-chevron-down"></i>
                        </span>
                        </a>
                    </h4>
                </div>
            <?php }else{ ?>
                <div class="panel-heading" role="tab" id="LogInDetailsHeader">
                    <h4 class="panel-title">
                        <a role="button" <?php echo($cartToggleAttribute);?> data-parent="#cartPaymentAccordion" href="#logInDetailsModule" aria-expanded="false" aria-controls="logInDetailsModule">
                            Log In
                            <span class="step-options">
                            <i class="material-icons text-yellow stepComplete tsz-hidden" aria-hidden="true">check_circle</i>
                            <i class="fa fa-chevron-down"></i>
                        </span>
                        </a>
                    </h4>
                </div>
                <div id="logInDetailsModule" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="LogInDetailsHeader">
                    <div class="panel-body">
                        <?php
                        require_once("includes/login-module.php");
                        ?>
                    </div>
                </div>
            <?php } ?>


        </div>
        <div class="panel panel-default" id="add-address-step">
            <div class="panel-heading" role="tab" id="addressDetailsHeader">
                <h4 class="panel-title">
                    <a class="collapsed" role="button" <?php echo($cartToggleAttribute);?> data-parent="#cartPaymentAccordion" href="#addressDetailsModule" aria-expanded="false" aria-controls="addressDetailsModule">
                        Address
                        <span class="step-options">
                            <i class="material-icons text-yellow stepComplete tsz-hidden" aria-hidden="true">check_circle</i>
                            <i class="fa fa-chevron-down"></i>
                        </span>
                    </a>
                </h4>
            </div>
            <div id="addressDetailsModule" class="panel-collapse collapse" role="tabpanel" aria-labelledby="addressDetailsHeader">
                <div class="panel-body">
                    <?php
                    require_once("includes/address-module.php");
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
