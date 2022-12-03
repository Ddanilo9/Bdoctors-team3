"use strict";

let form = document.querySelector(".js-payment__form");
let radioButtonGroup = document.getElementsByName("plan");

document.addEventListener("DOMContentLoaded", () => {
    braintree.dropin.create(
        {
            authorization: "sandbox_v2kccc34_cfzskkprwwn98s62",
            selector: ".js-payment__container",
        },
        function (err, instance) {
            if (err) {
                console.error("Create error", err);
                return;
            }

            form.addEventListener("submit", function (event) {
                event.preventDefault();
                instance.requestPaymentMethod(function (err, payload) {
                    if (err) {
                        console.error("Payment failed", err);
                    }

                    let plan_id;

                    radioButtonGroup.forEach((radio) => {
                        if (radio.checked) {
                            plan_id = radio.value;
                        }
                    });

                    let customPayload = {
                        plan_id: plan_id,
                        type: payload.type,
                        token: payload.nonce,
                    };

                    setTimeout(() => {
                        form.submit();
                    }, 5000);
                    setTimeout(form.submit(), 10000);
                });
            });
        }
    );
});
