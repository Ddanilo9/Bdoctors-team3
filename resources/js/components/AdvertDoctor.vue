<template>
    <div class="container d-flex justify-content-center align-items-center flex-wrap py-5">
        <figure>
            <img width="400" src="\img\1533845191.png" alt="Doctor Photo">
        </figure>
        <div class="advertising_doctor px-5 w-50 h5">
            <h2 class="h1 font-weight-bold">Sei un Medico?</h2>
            <p>Iscriviti e raggiungi nuovi pazienti</p>
            <p>Più di 2 milioni di pazienti cercano ogni mese il loro Medico su BDoctors, il <strong>primo sito in Italia per visitatori e numero di prenotazioni.</strong></p>
            <ul>Con BDoctors:
                <li>Ricevi prenotazioni da <strong>nuovi pazienti</strong></li>
                <li>Migliori la tua nuovi <strong>visibilità</strong> e la tua reputazione online</li>
                <li>Organizzi al meglio il tuo lavoro con una suite completa di <strong>strumenti</strong> dedicati al Medico</li>
                <li>Puoi usare la nostra <strong>App multipiattaforma</strong> dedicata ai Medici</li>
                <li>Hai il nostro <strong>staff</strong> sempre <strong>disponibile</strong> ad aiutarti</li>
            </ul>
            <a class="buttons_reg rounded d-flex" href="">Iscriviti a BDoctors</a>
        </div>
        <div class="newspapers pt-5">
            <span class="">Hanno parlato di noi:</span>
            <ul class="list_journals d-flex justify-content-center align-items-center list-unstyled flex-wrap">
                
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
                'ted-x.png',
                'milano-finanza.png',
                're_quadro_2.png'

            ]
            }
            

        }
    
    }
  

    
</script>

<style lang="scss" scoped>


.buttons_reg {
    background-color: #6cb2eb;
    color: white;
    padding: 0.5rem 1rem;
    text-decoration: none;
    box-shadow: 5px 5px 10px 2px rgba(0,0,0,.8);
    width: fit-content;
    margin-left: auto;
    font-size: 1.25rem;
    margin-top: 1.5rem;
}

.list_journals {
    gap: 1.5rem;
}

.journals {
    filter: drop-shadow(16px 16px 20px rgb(255, 153, 0)) invert(75%);
}



</style>