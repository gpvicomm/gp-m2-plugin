/*browser:true*/
/*global define*/
define(
    [
        'Magento_Checkout/js/view/payment/default',
        'Magento_Checkout/js/action/redirect-on-success',
        'mage/url',
        'mage/translate'
    ],
    function (Component, redirectOnSuccessAction, url, $t) {
        'use strict';

        return Component.extend({
            defaults: {
                template: 'ViComm_PaymentGateway/payment/vicomm_ltp'
            },
            afterPlaceOrder: function () {
                redirectOnSuccessAction.redirectUrl = url.build("redirectlinktopayvicomm/placeorder/placeorder");
                this.redirectAfterPlaceOrder = true;
                redirectOnSuccessAction.execute();
            }
        });
    }
);
