<template>
    <div>
        <button class="js-payment__button">Purchase</button>

        <div class="js-payment__container"></div>
    </div>
</template>

<script>
export default {
    props: {
        plan: Object,
    },
    methods: {
        paymentOnSubmit() {
            let button = document.querySelector(".js-payment__button");

            braintree.dropin.create(
                {
                    authorization: "sandbox_v2kccc34_cfzskkprwwn98s62",
                    selector: ".js-payment__container",
                    amount: "122",
                },
                function (err, instance) {
                    if (err) {
                        console.error("Create error", err);
                        return;
                    }

                    button.addEventListener("click", () => {
                        instance.requestPaymentMethod(function (err, payload) {
                            if (err) {
                                console.error("Payment failed", err);
                            }

                            let customPayload = {
                                amount: 122,
                                type: payload.type,
                                token: payload.nonce,
                            };

                            console.log(customPayload);
                        });
                    });
                }
            );
        },
    },

    mounted() {
        this.paymentOnSubmit();
    },
};
</script>
