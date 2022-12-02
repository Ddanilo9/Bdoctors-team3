<template>
  <div class="bg-main">
    <!-- <h1 class="text-center">{{doctor.specializations.name}}</h1> -->
    <div class="container box-research d-flex align-items-center align-items-sm-baseline flex-sm-row">
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

    <div class="cont-se">
      <div class="row">
        <div
          class="d-items col-12 col-md-6 col-lg-6 col-xl-4"
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

export default {
    components: {
        DoctorCard,
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
            this.filterDoctorsSpec();
        });
    },
};
</script>

<style lang="scss" scoped>
@import "../../sass/variables.scss";

// .b-card{
//   @media (min-width: 1200px) {
//       max-width: 1300px !important;
//     }
  
// }
.cont-se{
  margin: 0 auto;
  max-width: 1400px;
}
.bg-main {
  background-color: $bd-grey;
  padding: 20px 0;
  .box-research {
    margin-bottom: 20px;
    gap: 5px;
    flex-wrap: wrap;
    @media (min-width: 576px) {
      gap: 20px;
    }
    @media (min-width: 768px) {
      gap: 20px;
      padding: 0px 30px;
    }
    @media (min-width: 992px) {
      gap: 20px;
      padding: 0px 10px;
    }
    @media (min-width: 1200px) {
      gap: 20px;
      padding: 0px 40px;
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
    height: 40px;
    font-size: 16px;
    padding: 5px;
    width: 210px;
  }
  button {
    border: none;
    border-radius: 10px;
    background-color:  #7697de;
    height: 38px;
    padding: 0 5px;
    font-size: 16px;
    font-weight: 400;
  }
}
</style>
