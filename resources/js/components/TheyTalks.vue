<template>
    <div class="d-flex flex-column">
        <div class="newspapers py-2 w-100">
            <h2 class="text-center my-5">Hanno parlato di noi:</h2>
            <ul class="list_journals my-5 d-flex justify-content-center align-items-center list-unstyled flex-wrap">
                
                <li class="journals" v-for="item in news">
                    <img width="100" :src="'/img/'+item">
                </li>
                    
            </ul>
        </div>


    </div>
</template>

<script>
    export default {

        data() {
            
            return {
                news: [
                'il_sole_24_ore_2.png',
                'le-iene.png',
                'toms_hardware_2.png',
                'forbes.png',
                'la-stampa.png',
                'politecnico-milano.png',
                'milano-finanza.png',
                're_quadro_2.png',
                'ted-x.png',
                'avvenire_2.png'

            ]
            }
            

        }
    
    }
  

    
</script>

<style lang="scss" scoped>

h2 {
    color: #55a4e5;
    font-weight: bold;
    font-size: 32px;
}

.list_journals {
    gap: 1.5rem;
}

.journals {
    filter: invert(80%);
}



</style>