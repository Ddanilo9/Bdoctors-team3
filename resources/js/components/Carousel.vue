<template>
    <div>
        <p v-for="doc in sponsorizedDoc" :key="doc.id">
            {{ doc.name }}
        </p>
        <slider animation="fade">
            <slider-item
                v-for="(i, index) in list"
                :key="index"
                :style="i"
                @click="hello"
            >
                <p
                    style="
                        line-height: 280px;
                        font-size: 5rem;
                        text-align: center;
                    "
                >
                    Page{{ index + 1 }}
                </p>
            </slider-item>
        </slider>
    </div>
</template>

<script>
const dayjs = require("dayjs");
//import dayjs from 'dayjs' // ES 2015
dayjs().format();
import { Slider, SliderItem } from "vue-easy-slider";
export default {
    components: {
        Slider,
        SliderItem,
    },
    data() {
        return {
            list: [
                { backgroundColor: "#3f51b5", width: "100%", height: "100%" },
                { backgroundColor: "#eee", width: "100%", height: "100%" },
                { backgroundColor: "#f44336", width: "100%", height: "100%" },
            ],
            doctors: [],
            sponsorizedDoc: [],
        };
    },

    methods: {
        hello($event) {
            console.log(`hello index: ${$event}`);
        },

        fetchDoctor() {
            axios.get("http://localhost:8000/api/doctors", {}).then((res) => {
                this.doctors = res.data.result;
                this.doctors.forEach((doctor) => {
                    doctor.active = false;
                    // console.log(doctor)
                    doctor.plans.forEach((plan) => {
                        let today = dayjs().format("YYYY-MM-DD HH:mm:ss");

                        if (plan.pivot.expiration_date > today) {
                            doctor.active = true;
                            this.sponsorizedDoc.push(doctor);
                        }
                    });
                });
            });
            console.log(this.sponsorizedDoc);
            return this.sponsorizedDoc;
        },

        // activeSponsor() {
        //     this.doctors.forEach((doctor) => {
        //       doctor.active = false;
        //       console.log(doctor)
        //       doctor.plans.forEach((plan) => {
        //         let today = dayjs().format("YYYY-MM-DD HH:mm:ss");

        //         if (plan.pivot.expiration_date > today) {
        //           doctor.active = true;
        //           this.sponsorizedDoc.push(doctor);
        //         }
        //       });
        //     });
        //     return this.sponsorizedDoc;
        // }
    },
    beforeMount() {
        this.fetchDoctor();
    },
    mounted() {
        // this.fetchDoctor();
        // this.activeSponsor();
    },
};
</script>

<style lang="scss" scoped></style>
