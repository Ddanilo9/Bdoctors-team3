<template>
    <section class="how-works">
        <div class="container-wrap">
            <div class="container w-100%">
                <div class="row cose-block width-100%">
                    <div class="col-sm-12">
                        <h2 class="text-center mb-3 pt-5 h1 font-weight-bold">
                            Come funziona BDoctors?
                        </h2>
                    </div>
                    <div class="col-sm-4 text-center">
                        <figure class="how-works__img-box">
                            <img
                                src="/img/logomedico.png"
                                data-src="img/logomedico.png"
                                class="imghome img-responsive lazyload how-works__img"
                                alt="Scegli il Medico"
                                title="Scegli il Medico"
                            />
                        </figure>
                        <h3>Scegli il Medico</h3>
                        <p>
                            Fai la <b>scelta migliore</b> secondo le tue
                            esigenze: valuta <b>curriculum</b>,
                            <b>prezzo</b> delle prestazioni,
                            <b>patologie</b> trattate e <b>recensioni</b> degli
                            altri pazienti.
                        </p>
                    </div>
                    <div class="col-sm-4 text-center">
                        <figure class="how-works__img-box">
                            <img
                                src="/img/logotel.png"
                                data-src="/img/logotel.png"
                                class="img-home img-responsive lazyload phone how-works__img"
                                alt="Prenota la visita"
                                title="Prenota la visita"
                            />
                        </figure>
                        <h3>Prenota la visita</h3>
                        <p>
                            Ti bastano <b>pochi secondi</b>: è facile e veloce,
                            non serve telefonare e non è richiesta la carta di
                            credito: <b>pagherai</b> direttamente
                            <b>al medico</b>.
                        </p>
                    </div>
                    <div class="col-sm-4 text-center mb-5">
                        <figure class="how-works__img-box">
                            <img
                                src="/img/logovisit.png"
                                data-src="/img/logovisit.png"
                                class="img-home img-responsive lazyload how-works__img"
                                alt="Vai all'appuntamento"
                                title="Vai all'appuntamento"
                            />
                        </figure>
                        <h3>Vai all'appuntamento</h3>
                        <p>
                            Vai dal Medico scelto, nel giorno e nell'ora
                            selezionati. Dopo la visita potrai
                            <b>lasciare</b> una tua <b>recensione</b> che sarà
                            utile per gli altri pazienti.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
export default {};
</script>

<style lang="scss" scoped>
@import "../../sass/variables.scss";

h2 {
    color: $bd-black;
    font-size: 50px;
}

h3 {
    color: $bd-black;
    font-weight: bold;
}

p {
    font-size: 18px;
    color: $bd-black;
}

b {
    color: $bd-black;
}

.container-wrap {
    background-color: $bd-primary;
}

.cose-block {
    min-height: 600px;
    width: 100%;
    img {
        height: 300px;
        width: 300px;
    }
}

.how-works__img-box {
    margin: 0 auto;
    width: 200px;
    height: 200px;
    .how-works__img {
        width: 100%;
        height: 100%;
        fill: aquamarine;
    }
}
</style>
