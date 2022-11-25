<template>
  <div class="about-us">
    
    <div class="container">
      <h1 class="text-center">About us</h1>
    </div>
    <div class="container-about">
      Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint laborum
      dolorum dolore inventore eos beatae voluptates itaque ea dignissimos
      maiores et veniam non quis explicabo nobis doloremque recusandae unde,
      alias fuga magni ipsam deserunt sequi. Eos ea cum nam, quam deleniti alias
      accusamus iure expedita reiciendis qui magnam dolor reprehenderit.
    </div>
    
  </div>
</template>

<script>
export default {};
</script>


<style lang="scss" scoped>
h1{
    color: #0a0f1c;
    font-size: 50px;
}
.about-us{
    background-image: url(../../../public/img/aa.png);
    background-position: top;
    background-repeat: no-repeat;
    background-size: cover;
    // filter: opacity(0.5);
    height: 350px;
    display: flex;
    align-items: center;
    flex-direction: column;
    justify-content: center;
    width: 100%;
}
.container-about{
    max-width: 85%;
    padding: 15px;
    margin: 0 auto;
    color: #0a0f1c;
    background-color: #e8e8e8;
    filter: drop-shadow(7px 3px 9px #7697de);
    border-radius: 20px;
    text-align: center;
}

@media (min-width: 425px) {
        .container-about{
            padding: 20px 25px;
        }
    }
@media (min-width: 768px) {
        // .container-about{
            
        // }
    }
@media (min-width: 1200px) {
    .container-about{
        max-width: 750px;
        }
}
</style>