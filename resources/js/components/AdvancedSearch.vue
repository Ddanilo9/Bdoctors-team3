<template>
    <div class="bg-main">
        <select v-model="starsSelected">
            <option disabled value="">Seleziona il numero di stelle</option>
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
            <option>5</option>
        </select>

        <input
            type="text"
            placeholder="Cerca Dottore per recensioni"
            v-model="totalReviews"
        />

        <button @click="resetFilters()">Reset</button>

        <div class="container">
            <div v-for="doctor in filteredDoctor" :key="doctor.id">
                <DoctorCard :doctor="doctor" />
            </div>
        </div>
    </div>
</template>

<script>
import axios from "axios";
import DoctorCard from "./DoctorCard.vue";

export default {
    components: {
        DoctorCard,
    },

    data() {
        return {
            doctors: [],
            specDoctors: [],
            starsSelected: "",
            totalReviews: 0,
        };
    },

    computed: {
        specialization() {
            let params = new URL(document.location).searchParams;
            let spec = params.get("specialization");

            return spec;
        },

        filteredDoctor() {
            return this.specDoctors.filter((doc) => {
                if (
                    parseInt(this.totalReviews) ===
                        parseInt(doc.totalReviews) &&
                    Math.round(doc.avgRate) === parseInt(this.starsSelected)
                )
                    return doc;
                if (
                    parseInt(this.totalReviews) === parseInt(doc.totalReviews)
                ) {
                    return doc;
                }
                if (Math.round(doc.avgRate) === parseInt(this.starsSelected)) {
                    return doc;
                }

                if (this.starsSelected === "" && this.totalReviews === 0) {
                    return doc;
                }
            });
        },
    },

    methods: {
        fetchDoctors() {
            return axios.get("http://localhost:8000/api/doctors", {});
        },

        filterDoctorsSpec() {
            let starsSum = 0;

            this.doctors.forEach((doctor) => {
                const specializations = doctor.specializations;
                const filteredSpecs = specializations.map((spec) => {
                    return spec.spec_name === this.specialization;
                });

                if (doctor.reviews.length)
                    doctor.totalReviews = doctor.reviews.length;

                if (filteredSpecs.includes(true)) {
                    doctor.stars.forEach((star) => {
                        starsSum = starsSum + parseInt(star.number);
                    });

                    doctor.avgRate = starsSum / doctor.stars.length;

                    starsSum = 0;
                    this.specDoctors.push(doctor);
                }
            });

            return this.specDoctors;
        },

        resetFilters() {
            this.starsSelected = "";
            this.totalReviews = 0;
        },
    },

    mounted() {
        this.fetchDoctors().then((res) => {
            this.doctors = res.data.result;
            this.filterDoctorsSpec();
        });
    },
};
</script>

<style lang="scss" scoped>
@import "../../sass/variables.scss";

.bg-main {
    background-color: $bd-grey;
    padding: 24px 0;
    .container {
        max-width: 1200px;
        margin: 0 auto;
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 16px;
    }
}
</style>
