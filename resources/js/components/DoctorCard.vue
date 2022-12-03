<template>
    <div class="box-card">
        <div class="card-1" :class="styleModifier">
            <div class="card-1-header d-flex">
                <figure class="avatar-box">
                    <img
                        class="user-img"
                        :src="`/storage/${doctor.photo}`"
                        alt="doctor avatar"
                    />
                </figure>
                <div class="user-description">
                    <h4 class="py-2">{{ doctor.name }} {{ doctor.surname }}</h4>
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
                                <font-awesome-icon
                                    :key="'es' + i"
                                    icon="fa-regular fa-star"
                                />
                            </template>
                        </template>
                        <div class="only-show">
                            <span class="pl-2">
                                <span
                                    >({{
                                        doctor.reviews.length
                                    }}
                                    recensioni)</span
                                >
                            </span>
                        </div>
                    </div>
                    <div class="user">
                        <div class="user-info">
                            <figure class="pin-box">
                                <img
                                    class="pin"
                                    :src="require('../../../public/img/mp.jpg')"
                                />
                            </figure>

                            <p class="address">{{ doctor.address }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-1-body d-flex">
                <div
                    class="mb-1 d-flex"
                    v-for="spec in doctor.specializations"
                    :key="spec.id"
                >
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
    width: 100%;
    color: $bd-black;
}
.card-1 {
    background-color: #fff;
    border-radius: 8px;
    box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;
    overflow: hidden;
    width: 370px;
    @media (min-width: 768px) {
        width: 330px;
    }
    @media (min-width: 992px) {
        width: 430px;
    }
    @media (min-width: 1200px) {
        width: 100%;
    }
    h4 {
        font-size: 22px;
    }
}
.card-1-header {
    padding: 12px;
    gap: 8px;

    .avatar-box {
        margin: 5px auto;
        aspect-ratio: 1/1;
        overflow: hidden;
        flex-basis: calc(100% / 3);

        .user-img {
            height: 100%;
            object-fit: cover;
            object-position: center;
            border-radius: 8px;
        }
    }
    .user-description {
        flex-basis: calc((100% / 3) * 2);
    }
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
    border-radius: 50px;
    font-size: 10px;
    margin: 0;
    color: $bd-white;
    text-transform: uppercase;
    cursor: pointer;
    font-weight: 400;
    padding: 4px 8px;
    box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;
}
.tag-teal {
    background-color: $bd-secondary;
}

.card-1-body p {
    font-size: 12px;
    margin: 0 0 40px;
}
.user {
    .user-info {
        display: flex;
        align-items: center;
        margin: 12px 0;
        .pin-box {
            height: 32px;
            margin: 0;
            aspect-ratio: 1/1;
            .pin {
                height: 100%;
            }
        }
        .address {
            font-size: 14px;
            margin-bottom: 0;
            line-height: 1.2;
        }
    }
}

.full-star {
    color: yellow;
}
.user-info small {
    color: #545d7a;
}

.carousel__doctor {
    width: 100%;
    height: 100%;
    margin: 0;

    .card-1-body {
        min-height: 0;
    }

    .only-show {
        display: none;
    }
}
</style>
