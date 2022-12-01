<template>
    <div class="container-wrap home bg- #F9F9F9">
        <div class="container w-100%">
            <div class="row cose-block width-100%">
                <div class="col-sm-12">
                    <h2 class="text-center mb-5 pt-5 h1 font-weight-bold">Come funziona BDoctors?</h2>
                </div>
                <div class="col-sm-4 text-center">
                    <img src="/img/medicotitolo.svg" data-src="/img/images.jpg medico.jpg"
                        class="imghome img-responsive lazyload" alt="Scegli il Medico" title="Scegli il Medico" />
                    <h3>Scegli il Medico</h3>
                    <p>Fai la <b>scelta migliore</b> secondo le tue esigenze: valuta <b>curriculum</b>, <b>prezzo</b>
                        delle prestazioni, <b>patologie</b> trattate e <b>recensioni</b> degli altri pazienti.</p>
                    <hr class="visible-xs" />
                </div>
                <div class="col-sm-4 text-center">
                    <img src="/img/Purpole_titolo.png" data-src="/img/prenota.png"
                        class="img-home img-responsive lazyload" alt="Prenota la visita"
                        title="Prenota la visita" />
                    <h3>Prenota la visita</h3>
                    <p>Ti bastano <b>pochi secondi</b>: è facile e veloce, non serve telefonare e non è richiesta la
                        carta di credito: <b>pagherai</b> direttamente <b>al medico</b>.</p>
                    <hr class="visible-xs" />
                </div>
                <div class="col-sm-4 text-center">
                    <img src="/img/visitab_1.svg" data-src="/img/consiglidelmedico.jpg"
                        class="img-home img-responsive lazyload" alt="Vai all'appuntamento"
                        title="Vai all'appuntamento" />
                    <h3>Vai all'appuntamento</h3>
                    <p>Vai dal Medico scelto, nel giorno e nell'ora selezionati. Dopo la visita potrai <b>lasciare</b>
                        una tua <b>recensione</b> che sarà utile per gli altri pazienti.</p>
                    <hr class="visible-xs" />
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {

}
</script>

<style lang="scss" scoped>

h2 {
    color: #cabb1e;
}

h3 {
    color: #041e48;
    font-weight: bold;
    
}

p{
    font-size: 0.95rem;

}

img {
    transition: 0.5s ease;

}

img:hover {
    transform : scale(1.5);
}

.cose-block {
    min-height: 600px;
    width: 100%;
    img {
        height: 200px;
        width: 200px;
    }

}

// .home{
//     background-color: rgba(148, 201, 223, 0.808);
// }
</style>