/*browser:true*/
/*global define*/
define(
    [
        'uiComponent',
        'Magento_Checkout/js/model/payment/renderer-list',
        'https://code.jquery.com/jquery-1.11.3.min.js',
    ],
    function (
        Component,
        rendererList
    ) {
        'use strict';

        const config = window.checkoutConfig.payment;

        if (config.vicomm_card.is_active) {
            rendererList.push(
                {
                    type: 'vicomm_card',
                    component: 'ViComm_PaymentGateway/js/view/payment/method-renderer/vicomm_card'
                }
            );
        }
        if (config.vicomm_ltp.is_active) {
            rendererList.push(
                {
                    type: 'vicomm_ltp',
                    component: 'ViComm_PaymentGateway/js/view/payment/method-renderer/vicomm_ltp'
                }
            );
        }
        /** Add view logic here if needed */
        return Component.extend({});
    }
);
