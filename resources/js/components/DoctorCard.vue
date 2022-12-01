<template>
  <div class="box-card">
    <div class="card-1" :class="styleModifier">
      <div class="card-1-header">
        <h4 class="text-center py-2">{{ doctor.name }} {{ doctor.surname }}</h4>
        <figure>
          <img :src="`/storage/${doctor.photo}`" alt="doctor avatar" />
        </figure>
      </div>
      <div class="card-1-body ">
        <div class="mb-1" v-for="spec in doctor.specializations" :key="spec.id">
          <span class="tag tag-teal">{{ spec.spec_name }}</span>
        </div>
        <div class="stars mt-1 mb-1">
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
        </div>

        <div class="only-show">
          <p>
            n° di reviews:
            <span>({{ doctor.reviews.length }})</span>
          </p>
          <div class="user">
            <div class="user-info d-flex align-items-center">
              <img :src="require('../../images/maps.png')" />
              <h5>{{ doctor.address }}</h5>
            </div>
          </div>
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
  border-radius: 10px;
  box-shadow: 0 2px 20px rgba(0, 0, 0, 0.2);
  overflow: hidden;
  width: 300px;
  margin-bottom: 80px;
  h4{
    font-size: 30px;
  }
}
.card-1-header img {
  width: 100%;
  object-fit: cover;
}
.card-1-body {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: flex-start;
  padding: 20px;
  min-height: 250px;
}

.tag {
  background: #cccccc;
  border-radius: 50px;
  font-size: 14px;
  margin: 0;
  color: #fff;
  padding: 2px 10px;
  text-transform: uppercase;
  cursor: pointer;
}
.tag-teal {
  background-color: #47bcd4;
}
.tag-purple {
  background-color: #5e76bf;
}
.tag-pink {
  background-color: #cd5b9f;
}

.card-1-body p {
  font-size: 14px;
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
  padding: 1px;

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
