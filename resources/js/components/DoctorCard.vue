<template>
    <div class="doctor__card">
        <h3>{{ doctor.name }} {{ doctor.surname }}</h3>

        {{ doctor.avgRate }}

        <figure>
            <img :src="`/storage/${doctor.photo}`" alt="doctor avatar" />
        </figure>
        <div class="doctor__specs">
            <div v-for="spec in doctor.specializations" :key="spec.id">
                <p>{{ spec.spec_name }}</p>
            </div>
        </div>

        <template v-for="i in 5">
            <template v-if="i <= doctor.avgRate">
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
</template>

<script>
export default {
    props: {
        doctor: Object,
    },
};
</script>

<style lang="scss" scoped>
@import "../../sass/variables.scss";
.doctor__card {
    padding: 12px;
    border: 1px solid $bd-black;
    border-radius: 4px;
    height: 100%;
    background-color: $bd-white;

    h3 {
    }

    figure {
        width: 60%;
        margin: 32px auto;
        aspect-ratio: 1/1;
        border-radius: 50%;
        overflow: hidden;
        border: 1px solid $bd-black;

        img {
            width: 100%;
            object-fit: cover;
            object-position: center;
        }
    }
    .doctor__specs {
        display: flex;
        gap: 4px;
        p {
            font-size: 12px;
            padding: 4px;
            background-color: $secondary;
            border: 1px solid $main;
            color: $bd-white;
            border-radius: 4px;
        }
    }

    .full-star {
        color: $bd-yellow;
    }
}
</style>
