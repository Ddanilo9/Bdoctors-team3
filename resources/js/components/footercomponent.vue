<template>
    <footer>
        <div class="container">
            <ul class="linkfooter">
                <li v-for="link in listMenu" :key="link">
                    <a href="#">{{ link }}</a> 
                </li>
            </ul>
            <div class="certifications d-flex justify-content-between align-items-center">
                <div class="standard d-flex">
                    <img src="images/cod.gif" alt="Hon Cod">
                    <div class="hon_cod d-flex flex-column">
                        <span>Aderiamo allo standard HONcode per l'affidabilità dell'informazione medica.</span>
                        <a href="#">Verifica qui</a>
                    </div>
                </div>
                <a href="#" class="rec_form d-flex ">
                    <img class="rec_doctor" src="images/contatti_dottori.png" alt="Doctors">
                    <div class="d-flex flex-column justify-content-center">
                        <div>Sei un medico?</div>
                        <div class="font-weight-bold">Iscriviti ora!</div>
                    </div> 
                </a>  
            </div>
            <div class="socials_credits d-flex flex-column justify-content-center align-items-center">
                <span class="credits">Created by : Alberto Dore | Alessio Petrullo | Danilo Annunziata | Mirco Sansone | Michele Porcaro</span>
                <span class="update">Ultimo aggiornamento: 25/11/2022</span>
                <ul class="d-flex list-unstyled justify-content-center align-items-center">
                    <li class="icons d-flex justify-content-center align-items-center" v-for="social in listSocials" :key="social">
                        <img :src="social" alt="Photo's Social"> 
                    </li>
                </ul>
            </div>
        </div>

    </footer>
</template>

<script>
    export default {
        data() {
            return {
                listMenu: 
                [
                    'Chi siamo',
                    'Dicono di noi',
                    'Condizioni d\'uso',
                    'Privacy',
                    'Cookie Policy',
                    'Contatti',
                    'Blog'
                ],

                listSocials: 
                [
                    'images/facebook.jpg',
                    'images/instagram.jpg',
                    'images/twitter.jpg',
                    'images/youtube.png'

                ]
            };
        },
        
    }
</script>

<style lang="scss" scoped>

</style>