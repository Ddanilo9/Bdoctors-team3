<template>
  <div class="bg-main">
    <!-- <h1 class="text-center">{{doctor.specializations.name}}</h1> -->
    <div class="container box-research">
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

    <div class="container">
      <div class="row">
        <div
          class="d-items col-12 col-md-6 col-lg-4"
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
      return this.specDoctors.filter((doc) => {
        if (
          parseInt(this.totalReviews) === parseInt(doc.totalReviews) &&
          Math.round(doc.avgRate) === parseInt(this.starsSelected)
        )
          return doc;
        if (parseInt(this.totalReviews) === parseInt(doc.totalReviews)) {
          return doc;
        }
        if (Math.round(doc.avgRate) === parseInt(this.starsSelected)) {
          return doc;
        }

        if (this.starsSelected === "" && this.totalReviews === "") {
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

        if (doctor.reviews.length) doctor.totalReviews = doctor.reviews.length;

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
  padding: 20px 0;
  .box-research {
    margin-bottom: 20px;
    display: flex;
    align-items: flex-end;
    gap: 5px;
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
  }

  a {
    color: currentColor;
    text-decoration: none;
  }
  .select {
    border: none;
    border-radius: 10px;
    height: 30px;
  }
  .input {
    border: none;
    border-radius: 10px;
    height: 30px;
  }
  button {
    border: none;
    border-radius: 10px;
    background-color: #7697de;
    margin-top: 5px;
    height: 30px;
  }
}
</style>
