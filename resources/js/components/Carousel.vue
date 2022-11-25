<template>
    <div>
        <slider animation="fade">
            <slider-item
                v-for="(i, index) in list"
                :key="index"
                :style="i"
                @click="hello"
            >
                <p
                    style="
                        line-height: 280px;
                        font-size: 5rem;
                        text-align: center;
                    "
                >
                    Page{{ index + 1 }}
                </p>
            </slider-item>
        </slider>
    </div>
</template>

<script>
import { Slider, SliderItem } from "vue-easy-slider";
export default {
    components: {
        Slider,
        SliderItem,
    },
    data() {
        return {
            list: [
                { backgroundColor: "#3f51b5", width: "100%", height: "100%" },
                { backgroundColor: "#eee", width: "100%", height: "100%" },
                { backgroundColor: "#f44336", width: "100%", height: "100%" },
            ],
        };
    },
    mounted() {
            axios.get('/api/doctors', {})
            .then((res) => {
                console.log(res.data);
            });
        },
    methods: {
        hello($event) {
            console.log(`hello index: ${$event}`);
        },
    },
};
</script>

<style lang="scss" scoped></style>
