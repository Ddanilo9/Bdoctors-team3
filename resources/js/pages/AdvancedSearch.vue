<!-- <template>
    <div class="container mx-auto my-4">

       <h1 class="text-center font-bold text-4xl">advanced search</h1>

     </div>

</template>


<script>


export default {
    name: "AdvancedSearch",
    props: {
        specialization: String
    },
    data() {
        return {
            speDoctors: [],
            specializations: [],
        }
    },
    created() {
        axios.get('/api/search/specialization')
                .then(res => {
                    if (res.data.success) {
                        this.specializations = res.data.result;
                    }
                });
                console.log(this.specialization)
                
        // this.searchDoctor(1);
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
}
</script>

<style lang="scss" scoped>

</style> -->


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
                <a :href="`/show/${doctor.slug}`">
                    <DoctorCard :doctor="doctor" />
                </a>
            </div>
        </div>
    </div>
</template>

<script>
import axios from "axios";
import DoctorCard from "../components/DoctorCard.vue";

export default {
    components: {
        DoctorCard,
    },
    props: {
        specialization: String
    },
    data() {
        return {
            doctors: [],
            specDoctors: [],
            starsSelected: "",
            totalReviews: "",
        };
    },

    computed: {
        // specialization() {
        //     let params = new URL(document.location).searchParams;
        //     let spec = params.get("specialization");

        //     return spec;
        // },

        filteredDoctor() {
            if (this.starsSelected !== "" && this.totalReviews !== "") {
                return this.specDoctors.filter((doc) => {
                    return (
                        Math.round(doc.avgRate) ===
                            parseInt(this.starsSelected) &&
                        parseInt(this.totalReviews) <=
                            parseInt(doc.totalReviews)
                    );
                });
            }

            if (this.starsSelected !== "") {
                return this.specDoctors.filter((doc) => {
                    return (
                        Math.round(doc.avgRate) === parseInt(this.starsSelected)
                    );
                });
            }

            if (this.totalReviews !== "") {
                return this.specDoctors.filter((doc) => {
                    return (
                        parseInt(this.totalReviews) <=
                        parseInt(doc.totalReviews)
                    );
                });
            }

            if (this.starsSelected === "" && this.totalReviews === "") {
                return this.specDoctors;
            }
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
            this.totalReviews = "";
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

    a {
        color: currentColor;
        text-decoration: none;
    }
}
</style>