<template>
  <div class="box-card">
    <div class="card-1" :class="styleModifier">
      <div class="card-1-header d-flex">
        <figure>
          <img :src="`/storage/${doctor.photo}`" alt="doctor avatar" />
        </figure>
        <div>
          <h4 class=" py-2">
            {{ doctor.name }} {{ doctor.surname }}
          </h4>
          <div class="stars mt-1 mb-1 d-flex align-items-center">
            <template v-for="i in 5">
              <template v-if="i <= Math.round(doctor.avgRate)">
                <font-awesome-icon
                  :key="'fs' + i"
                  icon="fa-solid fa-star"
                  class="full-star"
                />
              </template>
              <template v-else>
                <font-awesome-icon :key="'es' + i" icon="fa-regular fa-star" />
              </template>
            </template>
            <div class="only-show">
              <span class="pl-2">
                <span>({{ doctor.reviews.length }} recensioni)</span>
              </span>
          </div>
          </div>
            <div class="user">
              <div class="user-info pt-3 d-flex align-items-center">
                <img :src="require('../../../public/img/mp.jpg')" />
                <h5>{{ doctor.address }}</h5>
              </div>
            </div>
        </div>
      </div>
      <div class="card-1-body d-flex">
        <div class="mb-1 d-flex" v-for="spec in doctor.specializations" :key="spec.id">
          <span class="tag tag-teal">{{ spec.spec_name }}</span>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    doctor: Object,
    styleModifier: String,
  },

  methods: {
    getTotalStars() {
      let starsSum = 0;

      this.doctor.stars.forEach((star) => {
        starsSum = starsSum + parseInt(star.number);
      });
      this.doctor.avgRate = starsSum / this.doctor.stars.length;
    },
  },

  created() {
    this.getTotalStars();
  },
};
</script>

<style lang="scss" scoped>
@import "../../sass/variables.scss";

* {
  box-sizing: border-box;
}

.box-card {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  height: 100%;
}
.card-1 {

  background-color: #fff;
  border-radius: 8px;
  box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;
  overflow: hidden;
  width: 370px;
  margin-bottom: 80px;
  @media (min-width: 768px) {
      width: 330px;

   

    }
  @media (min-width: 992px) {
      width: 430px;
    }
  @media (min-width: 1200px) {
      width: 450px;
    }
  h4 {
    font-size: 22px;
  }
}
.card-1-header img {
  width: 100%;
  object-fit: cover;
  border-radius: 8px;
}
.card-1-body {
    display: flex; 
    align-items: flex-start;
    padding: 12px -51px;
    padding-left: 10px;   
    padding: 9px 11px;
    gap: 10px;
}

.tag {
    background: #cccccc;
    border-radius: 50px;
    font-size: 11px;
    margin: 0;
    color: #fff;
    padding: 2px 10px;
    text-transform: uppercase;
    cursor: pointer;
    font-weight: 400;
    padding: 4px;
    padding: 5px 10px;
}
.tag-teal {
  background-color: $bd-secondary;
}

.card-1-body p {
  font-size: 12px;
  margin: 0 0 40px;
}
.user {
  display: flex;
  margin-bottom: -16px;
}

.user img {
  border-radius: 50%;
  width: 40px;
  height: 40px;
  margin-right: 10px;
}
.user-info h5 {
  font-size: 14px;
  margin: 0;
}
.full-star {
  color: yellow;
}
.user-info small {
  color: #545d7a;
}
figure {
  margin: 5px auto;
  aspect-ratio: 1/1;
  overflow: hidden;
  padding: 10px;

  img {
    width: 100%;
    object-fit: cover;
    object-position: center;
  }
}

.carousel__doctor {
  width: 100%;
  margin: 0;
  padding: 32px 64px;
  background-color: $bd-polar;
  height: 100%;

  .card-1-body {
    min-height: 0;
  }

  .only-show {
    display: none;
  }
}
</style>
