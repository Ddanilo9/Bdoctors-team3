<template>
    <div class="container d-flex flex-column">
        <div class="d-flex justify-content-center align-items-center flex-wrap">
            <figure class="col-lg-6 text-center">
                <img class="animated pulse infinite" width="300" src="\img\jobs.svg" alt="Doctor Photo">
            </figure>
            <div class="advertising_doctor col-lg-6">
                <h2 class="h1 font-weight-bold">Sei un Medico?</h2>
                <p>Iscriviti e raggiungi nuovi pazienti</p>
                <p>Più di 2 milioni di pazienti cercano ogni mese il loro Medico su BDoctors, il <b>primo sito in Italia per visitatori e numero di prenotazioni.</b></p>
                <ul>
                    <h2>Con BDoctors:</h2>
                    <li>
                        <p>Ricevi prenotazioni da <b>nuovi pazienti</b></p>
                    </li>
                    <li>
                        <p>Migliori la tua nuovi <b>visibilità</b> e la tua reputazione online</p>
                    </li>
                    <li>
                        <p>Organizzi al meglio il tuo lavoro con una suite completa di <b>strumenti</b> dedicati al Medico</p>
                    </li>
                    <li>
                        <p>Puoi usare la nostra <b>App multipiattaforma</b> dedicata ai Medici</p>
                    </li>
                    <li>
                        <p>Hai il nostro <b>staff</b> sempre <b>disponibile</b> ad aiutarti</p>
                    </li>
                </ul>
                <a class="buttons_reg rounded d-flex" href="/register">Iscriviti a BDoctors</a>
            </div>
        </div>
        
        <div class="newspapers py-2 my-5 w-100">
            <span class="speaks">Hanno parlato di noi:</span>
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

h2 {
    color: #cabb1e;
    
}

p {
    font-size: 1rem;

}

.buttons_reg {
    background-color: #7697de;
    color: white;
    padding: 0.5rem 1rem;
    text-decoration: none;
    box-shadow: 5px 5px 10px 2px rgba(0,0,0,.8);
    width: fit-content;
    margin-left: auto;
    font-size: 1.25rem;
    margin-top: 1.5rem;
}

.advertising_doctor {
    width: 500px;
}

.newspapers {
    border-top: 1px double grey;
    border-bottom: 1px double grey;
}

.speaks {
    color: #7697de;
    font-weight: bold;
    font-size: 1rem;
}

.list_journals {
    gap: 1.5rem;
}

.journals {
    filter: drop-shadow(16px 16px 20px rgb(255, 153, 0)) invert(75%);
}



</style>