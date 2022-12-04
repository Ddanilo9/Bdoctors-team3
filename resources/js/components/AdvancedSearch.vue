<template>
    <div class="bg-main">
        <LoaderComponent></LoaderComponent>
        <!-- <h1 class="text-center">{{doctor.specializations.name}}</h1> -->
        <div class="header-search">
            <div class="box-research container py-3 d-flex">
                <select v-model="starsSelected" class="select">
                    <option disabled value="">Seleziona il n° di stelle</option>
                    <option v-for="i in 5" :key="i.id">{{ i }}</option>
                </select>

                <input
                    class="input"
                    type="text"
                    placeholder="Seleziona il n° di recensioni"
                    v-model="totalReviews"
                />

                <button @click="resetFilters()">Reset</button>
            </div>
        </div>

        <div class="container">
            <div class="as__grid">
                <div
                    class="as__card"
                    v-for="doctor in filteredDoctor"
                    :key="doctor.id"
                >
                    <a :href="`/show/${doctor.slug}`">
                        <DoctorCard :doctor="doctor" />
                    </a>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from "axios";
import DoctorCard from "./DoctorCard.vue";
import LoaderComponent from "./LoaderComponent.vue";

export default {
    components: {
        DoctorCard,
        LoaderComponent,
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
        specialization() {
            let params = new URL(document.location).searchParams;
            let spec = params.get("specialization");

            return spec;
        },

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
            window.emitter.emit("changeLoaderStatus", true);
            return axios.get("http://localhost:8000/api/doctors", {});
        },

        filterDoctorsSpec() {
            this.doctors.forEach((doctor) => {
                const specializations = doctor.specializations;
                const filteredSpecs = specializations.map((spec) => {
                    return spec.spec_name === this.specialization;
                });

                if (doctor.reviews.length)
                    doctor.totalReviews = doctor.reviews.length;

                if (filteredSpecs.includes(true)) {
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
            window.emitter.emit("changeLoaderStatus", false);
            this.filterDoctorsSpec();
        });
    },
};
</script>

<style lang="scss" scoped>
@import "../../sass/variables.scss";

.as__grid {
    display: grid;
    grid-template-columns: repeat(3, minmax(0, 1fr));
    gap: 16px;

    @media (min-width: 576px) {
        grid-template-columns: repeat(1, minmax(0, 1fr));
    }

    @media (min-width: 768px) {
        grid-template-columns: repeat(2, minmax(0, 1fr));
    }

    @media (min-width: 1200px) {
        grid-template-columns: repeat(3, minmax(0, 1fr));
    }
}

.header-search {
    background-color: $bd-primary;
    margin-bottom: 48px;
}
.bg-main {
    background-color: $bd-grey;
    min-height: 100vh;
    padding-bottom: 48px;
    .box-research {
        margin-bottom: 20px;
        gap: 8px;

        button {
            border: none;
            border-radius: 10px;
            background-color: $bd-secondary;
            color: $bd-white;
            height: 38px;
            padding: 4px 8px;
            font-size: 16px;
            font-weight: 400;
            margin-left: auto !important;
        }

        @media (min-width: 768px) {
            button {
                margin-left: 0 !important;
            }
        }
    }

    a {
        color: currentColor;
        text-decoration: none;
    }
    .select {
        border: none;
        border-radius: 10px;
        height: 40px;
        font-size: 16px;
        padding: 5px;
    }
    .input {
        border: none;
        border-radius: 10px;
        font-size: 16px;
        padding: 4px 8px;
        width: 210px;
        line-height: 1.2 !important;
    }
}
</style>
