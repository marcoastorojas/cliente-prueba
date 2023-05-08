<template>
  <div>
    <a href="#">
      <div class="position-relative">
        <img
          src="http://127.0.0.1:8000/img/cupon/codpro.png"
          alt="profile_image"
          class="w-100 border-radius-lg shadow-sm"
        />
      </div>
    </a>
    <br />
  </div>
</template>

<script>
export default {
  data() {
    return {
      validandocupon: "",
    };
  },
  methods: {
    verificateCupon() {
      console.lo
      // this.validandocupon = "Validando...";
      // axios.get("/listar-cpromocionales/").then((response) => {
        // let respuesta = response.data;
        // console.log(respuesta);
        //   if (respuesta["status"] == 1) {
        //     this.cuponestado = "Válido";
        //     this.validandocupon = "";
        //   } else {
        //     this.cuponestado = "Inválido";
        //     this.validandocupon = "";
        //   }
    //   });
    },
  },
  mounted() {
    this.verificateCupon();
    console.log("Component mounted.");
  },
};
</script>
