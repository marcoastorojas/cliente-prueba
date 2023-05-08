<template>
  <div class="">
    <div class="card-body">
      <form role="form text-left" method="POST" @submit.prevent="register" @keydown="form.onKeydown($event)">
        <div class="form-group">
          <label for="">Tipo Documento</label>
          <select name="tipodoc" id="" class="form-control" @change="onTipoDoc($event)" v-model="form.tipodoc">

            <option v-for="ltd in listtipodoc" :value="ltd.tdoc"> {{ltd.titulo}}</option>
            <!-- <option value="RUT">RUT (Chile)</option>
            <option value="CPP">CPP (Perú)</option> -->
          </select>
        </div>
        <div v-if="form.tipodoc == 'DNI' " class="mb-3">
          <!-- <label for="">Nro DNI</label> -->
          <div class="input-group">
            <input
              type="text"
              autocomplete="off"
              class="form-control"
              placeholder="DNI"
              aria-label="Dni"
              name="dni"
              required
              minlength="8"
              maxlength="8"
              oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
              v-mask="'########'"
              v-model="form.dni"
              :class="{ 'is-invalid': form.errors.has('dni') }"
              @blur="consultarReniec(), contarCaracter()"
            />
            <div class="input-group-prepend" v-if="form.name">
              <div class="input-group-text">{{ form.name }}</div>
            </div>
            <div class="input-group-prepend" v-if="buscandodni">
              <div class="input-group-text"></div>
            </div>
          </div>
          <small class="text-secondary" style="font-size: 12px">
            Tu DNI será tu código único para acumular puntos.
          </small>
          <p>
            <small v-if="buscandodni">
            {{ buscandodni }}
          </small>
          <small
              class="text-primary"
              v-if="contcaractdni != '' "
              style="color: red"
            > {{contcaractdni}} </small>
          </p>
          <small
            class="text-primary"
            v-if="form.errors.has('dni')"
            v-html="form.errors.get('dni')"
            style="color: red"
          ></small>
        </div>
        <div v-if="form.tipodoc == 'RUT' " class="mb-3">
          <!-- <label for="">Nro RUT</label> -->
          <div class="input-group">
            <input
              type="text"
              class="form-control"
              placeholder="RUT (99999999-X)"
              aria-label="Dni"
              name="dni"
              required
              minlength="10"
              maxlength="10"
              v-mask="'########-X'"
              masked
              v-model="form.dni"
              :class="{ 'is-invalid': form.errors.has('dni') }"
              @blur="contarCaracter()"
            />
          </div>
          <small class="text-secondary" style="font-size: 12px">
            Tu RUT será tu código único para acumular puntos.
          </small>
          <p>
            <small
              class="text-primary"
              v-if="contcaractdni != '' "
              style="color: red"
            > {{contcaractdni}} </small>
          </p>
          <small
            class="text-primary"
            v-if="form.errors.has('dni')"
            v-html="form.errors.get('dni')"
            style="color: red"
          ></small>
        </div>
        <div v-if="form.tipodoc == 'CPP' " class="mb-3">
          
          <div class="input-group">
            <input
              type="text"
              autocomplete="off"
              class="form-control"
              placeholder="CE o CPP"
              name="dni"
              required
              autofocus
              minlength="9"
              maxlength="9"
              oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
              v-mask="'#########'"
              v-model="form.dni"
              :class="{ 'is-invalid': form.errors.has('dni') }"
              @blur="contarCaracter()"
            />
            <div class="input-group-prepend" v-if="form.name">
              <div class="input-group-text">{{ form.name }}</div>
            </div>
            <div class="input-group-prepend" v-if="buscandodni">
              <div class="input-group-text"></div>
            </div>
          </div>
          <small class="text-secondary" style="font-size: 12px">
            Tu CE o CPP será tu código único para acumular puntos.
          </small>
          <p>
            <small
              class="text-primary"
              v-if="contcaractdni != '' "
              style="color: red"
            > {{contcaractdni}} </small>
          </p>
          <small
            class="text-primary"
            v-if="form.errors.has('dni')"
            v-html="form.errors.get('dni')"
            style="color: red"
          ></small>
        </div>
        <div v-if="datareniec == 'no' || form.tipodoc == 'RUT' || form.tipodoc == 'CPP' ">
          <div class="mb-3">
            <input
              type="text"
              class="form-control"
              placeholder="Nombre"
              aria-label="Name"
              name="name"
              required
              autocomplete="name"
              autofocus
              v-model="form.name"
              :class="{ 'is-invalid': form.errors.has('name') }"
            />
            <small
              class="text-primary"
              v-if="form.errors.has('name')"
              v-html="form.errors.get('name')"
              style="color: red"
            ></small>
          </div>
          <div class="mb-3">
            <input
              type="text"
              class="form-control"
              placeholder="Apellidos"
              aria-label="apellidos"
              name="apellidos"
              required
              autocomplete="apellidos"
              autofocus
              v-model="form.apellidos"
              :class="{ 'is-invalid': form.errors.has('apellidos') }"
            />
            <small
              class="text-primary"
              v-if="form.errors.has('apellidos')"
              v-html="form.errors.get('apellidos')"
              style="color: red"
            ></small>
          </div>
        </div>
          <label for="">Ciudad</label>
          <div class="input-group mb-3">
            <select name="ciudad_id" id="" class="form-select" v-model="form.ciudad_id">
              <option v-for="ltciu in listciudad" :value="ltciu.id"> {{ltciu.ciudad}}</option>
            </select>
          </div>
        <div class="input-group mb-3">
          <!-- <vue-country-code
            @onSelect="onSelect"
            :onlyCountries="['pe', 'cl', 'bo']"
          >
          </vue-country-code> -->
          <span
            class="input-group-text"
            id="basic-addon1"
            style="background-color: #e8e8e8"
            >+{{ form.codpais }}</span
          >
          <!-- <input
            type="text"
            class="form-control"
            placeholder="Celular"
            aria-label="celular"
            name="celular"
            autocomplete="false"
            v-model="form.celular"
            mask="##.###.###-X"
            :class="{ 'is-invalid': form.errors.has('celular') }"
          /> -->
          
          <input
            type="text"
            class="form-control"
            placeholder="Nro Celular"
            aria-label="celular"
            name="celular"
            autocomplete="off"
            v-mask="'#########'"
            required
            v-model="form.celular"
            :class="{ 'is-invalid': form.errors.has('celular') }"
          />
        </div>

        <!-- <div class="mb-3">
          <div class="input-group">
            <input
              type="text"
              class="form-control"
              placeholder="Código promocional (opcional)"
              aria-label="Cupón"
              name="cupon"
              autocomplete="false"
              v-model="form.cupon"
              :class="{ 'is-invalid': form.errors.has('cupon') }"
              @blur="verificateCupon()"
            />
            <div class="input-group-prepend" v-if="validandocupon">
              <div class="input-group-text">{{ validandocupon }}</div>
            </div>
            <div class="input-group-prepend" v-if="cuponestado">
              <div class="input-group-text">{{ cuponestado }}</div>
            </div>
          </div>
        </div> -->
        <div>Para iniciar Sesion:</div>
        <div class="mb-3">
          <!-- <label for="">Email</label> -->
          <input
            type="email"
            class="form-control"
            placeholder="Email"
            aria-label="Email"
            aria-describedby="email-addon"
            name="email"
            required
            autocomplete="off"
            v-model="form.email"
            :class="{ 'is-invalid': form.errors.has('email') }"
          />
          <small
            class="text-primary"
            v-if="form.errors.has('email')"
            v-html="form.errors.get('email')"
            style="color: red"
          ></small>
        </div>
        <div class="mb-3">
          <!-- <label for="">Contraseña</label> -->
          <input
            type="password"
            class="form-control"
            placeholder="Nueva Contraseña para ClienteVip"
            aria-label="Password"
            name="password"
            minlength="6"
            required
            autocomplete="off"
            v-model="form.password"
            :class="{ 'is-invalid': form.errors.has('password') }"
          />
          <small class="text-secondary" style="font-size: 12px">
            Mínimo 6 caracteres. </small
          ><br />
          <small
            class="text-primary"
            v-if="form.errors.has('password')"
            v-html="form.errors.get('password')"
            style="color: red"
          ></small>
        </div>
        <div class="mb-3">
          <!-- <label for="">Repita la contraseña</label> -->
          <input
            id="password-confirm"
            type="password"
            class="form-control"
            placeholder="Repita la contraseña"
            name="password_confirmation"
            required
            autocomplete="new-password"
            v-model="form.password_confirmation"
          />
        </div>

        <!-- <div v-if="form.progress">Progress: {{ form.progress.percentage }}%</div> -->
        <div class="text-center">
          <button
            type="submit"
            class="btn w-100 my-4 mb-2"
            style="background-color: #faca0c !important; color: rgb(0, 0, 0)"
            :disabled="form.busy"
          >
            Registrarme
          </button>
          <h6 style="color: warning">{{ procesando }}</h6>
        </div>
      </form>
      <p class="text-sm mt-3 mb-0">
        ¿Ya tienes una cuenta?
        <a href="/login" class="text-dark font-weight-bolder">Ingresar</a>
      </p>
    </div>
  </div>
</template>

<script>
import Form from "vform";
import axios from "axios";
// import MaskedInput from 'vue-masked-input';

import "sweetalert2/dist/sweetalert2.min.css";
import { TheMask } from "vue-the-mask";
// import { HasError } from 'vform/src/components/bootstrap5'

export default {
  //   data: () => ({
  //     form: new Form({
  //       username: "",
  //       password: "",
  //     }),
  //   }),
  //   components: { HasError },

  components: {
    TheMask,
  },

  data() {
    return {
      procesando: "",
      listciudad:[],
      listtipodoc:[
        {'tdoc': 'DNI', 'codpais':'51', 'titulo':'DNI (Perú)'},
        {'tdoc': 'RUT', 'codpais':'56', 'titulo':'RUT (Chile)'},
        {'tdoc': 'CPP', 'codpais':'51', 'titulo':'CE o CPP'},
      ],
      form: new Form({
        name: "",
        apellidos: "",
        dni: "",
        celular: "",
        email: "",
        password: "",
        password_confirmation: "",
        cupon: "",
        codpais: "51",
        tipodoc: "DNI",
        ciudad_id: "1",
        v_app: "v3.17",
      }),
      datareniec: "si",
      buscandodni: "",
      cuponestado: "",
      validandocupon: "",
      contcaractdni: "",
    };
  },
  //   methods: {
  //     async login() {
  //       const response = await this.form.post("/api/login");
  //       // ...
  //     },
  //   },
  methods: {
    onSelect({ name, iso2, dialCode }) {
      // console.log(name, iso2, dialCode);
      // this.form.codpais = dialCode;
      // console.log(this.form.codpais);
    },
    contarCaracter() {
      this.contcaractdni = "";
      if (this.form.tipodoc == "DNI" && this.form.dni.length != 8) {
        this.contcaractdni = "DNI Incorrecto";
        this.form.dni = "";
        this.form.name = "";
        this.form.apellidos = "";
        this.buscandodni = ''
        this.datareniec = "si"
      } else if (this.form.tipodoc == "RUT" && this.form.dni.length != 10) {
        this.contcaractdni = "RUT Incorrecto";
        this.form.dni = "";
        this.form.name = "";
        this.form.apellidos = "";
        this.buscandodni = ''
        this.datareniec = "si"
      } else if (this.form.tipodoc == "CPP" && this.form.dni.length != 9){
        this.contcaractdni = "CE o CPP Incorrecto";
        this.form.dni = "";
        this.form.name = "";
        this.form.apellidos = "";
        this.buscandodni = ''
        this.datareniec = "si"
      }
    },
    onTipoDoc(val) {
      this.form.dni = '';
      this.form.name = '';
      this.form.apellidos = '';
      this.form.tipodoc = val.target.value;
      this.datareniec = 'si'
      if (this.form.tipodoc == 'DNI') {
        this.form.codpais = '51';
      }else if((this.form.tipodoc == 'RUT')){
        this.form.codpais = '56';
      }else{
        this.form.codpais = '51';
      }
    },
    consultarReniec() {
      if (this.form.dni && this.form.dni.length == 8) {
        this.buscandodni = "Mientras validamos su DNI, Continúe...";
        this.form.name = "";
        this.form.apellidos = "";
        const dnidata = {dni: this.form.dni}
        axios.post("/api/get-dni-reniec-web", dnidata).then((response) => {
          let resp = response.data;
          if (resp.status == 1) {
            if (resp.data.success == true) {
              this.datareniec = "si";
              this.form.name = resp.data.nombres;
              this.form.apellidos =
                resp.data.apellido_paterno +
                " " +
                resp.data.apellido_materno;
              this.buscandodni = "";
            } else {
              this.datareniec = "no";
              this.form.name = "";
              this.form.apellidos = "";
              this.buscandodni = "No se encontró datos o Dni es incorrecto";
            }
          } else {
            this.datareniec = "no";
            this.cliente.name = "";
            this.cliente.apellidos = "";
            this.buscandodni = "No se encontró datos o Dni es incorrecto";
          }
        });
      }
    },

    verificateCupon() {
      if (this.form.cupon) {
        this.validandocupon = "Validando...";
        axios.get("/api/get-cupon/" + this.form.cupon).then((response) => {
          let respuesta = response.data;
          if (respuesta["status"] == 1) {
            this.cuponestado = "Válido";
            this.validandocupon = "";
          } else {
            this.cuponestado = "Inválido";
            this.validandocupon = "";
          }
        });
      } else {
        this.validandocupon = "";
        this.cuponestado = "";
      }
    },

    register() {
      // if (this.form.cupon.length > 0) {
      //   let respuesta = await this.verificateCupon();
      //   if (respuesta["status"] == 1) {
      //     console.log("ok");
      //   } else {
      //     console.log("Código promocional inválido");
      //     return;
      //   }
      // } else {
      //   console.log('nada');
      // }
      //   const response = this.form.post("/api/register");
      //   console.log(response);

      this.procesando = "Espere...";
      this.form
        .post("/api/register")
        .then((response) => {
          var data = response.data;
          if (data.success == true) {
            this.procesando = "";
            // alert("Se registró con éxito!.\rAhora puedes iniciar sesion.");
            this.$swal({
              position: "top-center",
              icon: "success",
              title: "Se registró con éxito!.",
              text: "Ahora puedes iniciar sesión",
              showConfirmButton: false,
              timer: 3500,
            }).then((result) => {
              // if (result.isConfirmed) {
              // Swal.fire("Deleted!", "Your file has been deleted.", "success");
              window.location.href = "/login";
              // }
            });
          }
          // var attr = document.getElementById("text");
          // attr.innerHTML = response.data.message;

          this.form.reset();
        })
        .catch((error) => {
          this.procesando = "";
          // console.log(error.errors)
        });
    },
    getciudad(){

      
      axios.get("/api/initplaces/").then((response) => {
          let respuesta = response.data;
          if (respuesta["status"] == 1) {
            this.listciudad = respuesta['ciudades']
          } else {
            this.listciudad = []
          }
        });
    }
  },
  mounted() {
    this.getciudad()
    // console.log("Component mounted.");
  },
};
</script>
