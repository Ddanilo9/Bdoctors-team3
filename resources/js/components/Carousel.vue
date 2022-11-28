<template>
    <div>
        <!-- <p v-for="doc in sponsorizedDoc" :key="doc.id">
            {{ doc.name }}
        </p> -->
        <slider animation="fade">
            <slider-item
                v-for="(i, index) in list"
                :key="index"
                :style="i"
                @click="hello"
            >
                <DoctorCard></DoctorCard>
            </slider-item>
        </slider>
    </div>
</template>

<script>
const dayjs = require("dayjs");
//import dayjs from 'dayjs' // ES 2015
dayjs().format();
import { Slider, SliderItem } from "vue-easy-slider";
import DoctorCard from "./DoctorCard.vue";
export default {
    components: {
        DoctorCard,
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

        fetchDoctors() {
            return axios.get("http://localhost:8000/api/doctors", {});
        },

        // fetchDoctor() {
        //     axios.get("http://localhost:8000/api/doctors", {}).then((res) => {
        //         this.doctors = res.data.result;
        //         this.doctors.forEach((doctor) => {
        //             doctor.active = false;
        //             doctor.plans.forEach((plan) => {
        //                 let today = dayjs().format("YYYY-MM-DD HH:mm:ss");

        //                 if (plan.pivot.expiration_date > today) {
        //                     doctor.active = true;
        //                     this.sponsorizedDoc.push(doctor);
        //                 }
        //             });
        //         });
        //     });
        //     return this.sponsorizedDoc;
        // },

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
};
</script>

<style lang="scss" scoped></style>
