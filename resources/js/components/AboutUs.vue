<template>
    <div class="about-us">
        <div class="container-about">
            <div class="container">
                <h1 class="text-center">Dicono di Noi</h1>
            </div>
            <p>Oltre il 99% di pazienti soddisfatti</p>
            <p>
                BDoctors è il primo sito in Italia di
                <strong>prenotazioni</strong> di
                <strong>visite mediche</strong> ed esami diagnostici, online
                <strong>dal 2022</strong>.
            </p>
            <p>
                Crediamo nell'importanza dell'<strong>informazione</strong> e
                della <strong>trasparenza</strong> per aiutare i pazienti a
                <strong>scegliere</strong> il <strong>medico giusto</strong> tra
                gli oltre 9.000 presenti su BDoctors.
            </p>
            <p>
                Per questo su BDoctors, solo i pazienti che hanno prenotato
                attraverso il sito e svolto la prestazione possono rilasciare un
                feedback sul medico: una
                <strong>garanzia d'affidabilità</strong> è data dalle
                <strong>oltre 100.000 recensioni</strong> che leggi.
            </p>
        </div>
    </div>
</template>

<script>
export default {};
</script>

<style lang="scss" scoped>
h1 {
    color: #95bbdf;
    font-size: 35px;
    padding-top: 3rem;
    margin-bottom: 3rem;
}
.about-us {
    background-image: url(../../../public/img/aa.png);
    background-color: white;
    background-position: top;
    background-repeat: no-repeat;
    background-size: cover;
    border-top: 2px solid #95bbdf;
    height: 500px;
    display: flex;
    align-items: center;
    flex-direction: column;
    justify-content: center;
    width: 100%;
    
}
.container-about {
    width: 100%;
    height: 100%;
    margin: 0 auto;
    // color: #0a0f1c;
    background-color:trasparent;
    // filter: drop-shadow(7px 3px 9px #7697de);
    // border-radius: 20px;
    text-align: center;
    padding-top: 30px;
   
}
.container-about>p{
    font-size: 18px;
    line-height: 2rem;
}

@media (min-width: 425px) {
    .container-about {
        padding: 20px 25px;
    }
}
@media (min-width: 768px) {
    // .container-about{

    // }
}
@media (min-width: 1200px) {
    .container-about {
        // max-width: 750px;
    }
}
</style>
