<template>
    <div class="carousel">
        <template v-if="activeSponsors.length">
            <carousel-3d
                :loop="true"
                :height="210"
                :border="0"
                :display="7"
                :width="400"
            >
                <slide
                    class="slide"
                    v-for="(slide, i) in activeSponsors"
                    :index="i"
                    :key="i"
                >
                    <DoctorCard
                        :style-modifier="'carousel__doctor'"
                        :doctor="slide"
                        :src="`/storage/${slide.photo}`"
                    ></DoctorCard>
                </slide>
            </carousel-3d>
        </template>
    </div>
</template>

<script>
const dayjs = require("dayjs");

dayjs().format();

import { Carousel3d, Slide } from "vue-carousel-3d";
import DoctorCard from "./DoctorCard.vue";

export default {
    components: {
        DoctorCard,
        Carousel3d,
        Slide,
    },
    data() {
        return {
            doctors: [],
        };
    },
    computed: {
        activeSponsors() {
            return this.doctors.filter((doc) => {
                return doc.active === true;
            });
        },
    },

    methods: {
        fetchDoctors() {
            axios.get("http://localhost:8000/api/doctors", {}).then((res) => {
                this.doctors = res.data.result;

                this.doctors.forEach((doctor) => {
                    doctor.active = false;

                    doctor.plans.forEach((plan) => {
                        let today = dayjs().format("YYYY-MM-DD HH:mm:ss");

                        if (plan.pivot.expiration_date > today) {
                            doctor.active = true;
                        }
                    });
                });
            });
        },
    },
    beforeMount() {
        this.fetchDoctors();
    },
};
</script>

<style lang="scss" scoped>

.carousel-3d-container {
    overflow: visible;
}

.slide {
    box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;
    background-color: transparent;
    margin: 10px 0;
}
</style>
