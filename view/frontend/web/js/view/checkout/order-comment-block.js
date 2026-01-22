define(
    [
        'jquery',
        'uiComponent',
        'knockout'
    ],
    function ($, Component, ko) {
        'use strict';

        return Component.extend({
            defaults: {
                template: 'Magediary_DeliveryNote/checkout/order-comment-block'
            },
            initialize: function() {
                this._super();
            }
        });
    }
);
