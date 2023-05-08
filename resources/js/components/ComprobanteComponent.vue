<template>
    <div>
        
        <div class="card" v-if="vistalist == 1">
            <div class="card-header">
                <div class="row">
                    <div class="col-9">
                        <h4>Elaboración de Comprobantes </h4>
                    </div>
                    <div class="col-3">
                        <button class="btn btn btn-primary" @click="cambiaraform()">
                            Crear Comprobante
                        </button>
                    </div>
                </div>
            </div>

            <div class="card-body table-responsive">
                <table class="table table-sm" id="datatable-fact">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nro</th>
                            <th>Total</th>
                            <th>Fecha</th>
                            <th>Vencimiento</th>
                            <th>Cliente</th>
                            <th>Estado</th>
                            <th>Opc</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(venta, index) in listarventas">
                            <td>{{ index + 1 }}</td>
                            <td>INV-000{{ venta.nrocomprobante }}</td>
                            <td>{{ venta.total }}</td>
                            <td>{{ venta.fecha }}</td>
                            <td>{{ venta.vencimiento }}</td>
                            <td>{{ venta.localplan.locale.titulo }}</td>
                            <td>
                                <span class="badge bg-gradient-success" v-if="venta.estado == 1"><i class="fa-solid fa-circle-check"></i></span>
                                <span class="badge bg-gradient-secondary" v-if="venta.estado == 0" v-on:click="cancelarfactura(venta)"><i class="fa-solid fa-ellipsis"></i></span>
                            </td>
                            <td>
                                <!-- <button class="btn btn-outline-success btn-sm">Cancelado</button> -->
                                <button v-on:click="enviarfactwsp(venta)" class="btn-success btn-sm"><i class="fa-solid fa-paper-plane"></i></button>
                                <button v-on:click="imprimirfact(venta)" class="btn-info btn-sm"><i class="fa-solid fa-print"></i></button>
                                <button v-on:click="eliminarfact(venta)" class="btn-danger btn-sm"><i class="fa-solid fa-trash-can"></i>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div>
            <section class="content" v-if="vistaform == 1">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <!-- <div class="callout callout-info">
                        <h5><i class="fas fa-info"></i> Note:</h5>
                        This page has been enhanced for printing. Click the print button at the bottom of the invoice to test.
                        </div> -->

                            <!-- Main content -->
                            <div class="invoice p-3 mb-3">
                                <!-- title row -->
                                <div class="row">
                                    <div class="col-12">
                                        <h4>
                                            <i class="fas fa-globe"></i> Cliente
                                            VIP.
                                            <!-- <small class="float-right">Date: 2/10/2014</small> -->
                                        </h4>
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- info row -->
                                <div class="row invoice-info">
                                    <div class="col-sm-4 invoice-col">
                                        <div class="callout callout-info">
                                            Plataforma de fidelización de
                                            clientes.
                                        </div>
                                        <address>
                                            Email: negocios@clientevip.pe <br />
                                            Celular: 952633245<br />
                                            Tacna<br />
                                        </address>
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-sm-4 invoice-col">
                                        CLIENTE
                                        <address>
                                            <select name="" v-model="localplan" @change="changelocalplan()" class="form-control">
                                                <option v-for="item in listaclientes" :value="item">
                                                    {{ item.locale.titulo }}
                                                </option>
                                            </select>
                                            {{ localplan.locale.direccion }}<br />
                                            {{ localplan.locale.user.email }} <br />
                                            {{ localplan.locale.celularprop }}
                                        </address>
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-sm-4 invoice-col">
                                        <b
                                            >Invoice
                                            <input
                                                class="form-control"
                                                type="text"
                                                v-model="form.nrocomprobante"
                                            /> </b>
                                        
                                        <b>Fecha:</b>
                                        <input
                                            class="form-control"
                                            type="date"
                                            v-model="form.fecha"
                                            @change="actualizafechaven()"/>
                                        <b>Vencimiento:</b>
                                        <input
                                            class="form-control"
                                            type="date"
                                            v-model="form.vencimiento"/>
                                        <b>Estado:</b>
                                        <span>
                                            <select v-model="form.estado" class="form-control">
                                                <option value="0">
                                                    Pendiente
                                                </option>
                                                <option value="1">
                                                    Cancelado
                                                </option>
                                            </select>
                                        </span>
                                        <b>Saldo a pagar:</b>
                                        <span >S/ {{ form.detalles.subtotal }}</span>
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- /.row -->

                                <!-- Table row -->
                                <div class="row">
                                    <div class="col-12 table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Description</th>
                                                    <th>Precio Uni</th>
                                                    <th>Cant.</th>
                                                    <th>Subtotal</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <!-- <select v-model="selectplan" @change="changeselectplan()">
                                                            <option v-for="tarifa in listaplanes" :value="tarifa">
                                                                {{
                                                                    tarifa.plan
                                                                }}
                                                            </option>
                                                        </select> -->
                                                        <!-- <input type="text" v-model="form.detalles.descripcion"/> -->
                                                        <textarea name="" id="" cols="30" rows="2" v-model="form.detalles.descripcion" class="form-control">
                                                        </textarea>
                                                    </td>
                                                    <td>
                                                        <input
                                                            class="form-control"
                                                            type="text"
                                                            v-model="
                                                                form.detalles
                                                                    .precio
                                                            "
                                                        />
                                                    </td>
                                                    <td>
                                                        <input
                                                            class="form-control"
                                                            type="text"
                                                            v-model="
                                                                form.detalles
                                                                    .cantidad
                                                            "
                                                        />
                                                    </td>
                                                    <td>
                                                        <input
                                                            class="form-control"
                                                            type="text"
                                                            v-model="
                                                                form.detalles
                                                                    .subtotal
                                                            "
                                                        />
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- /.row -->

                                <div class="row">
                                    <!-- accepted payments column -->
                                    <div class="col-6">
                                        <!-- <p class="lead">Metodos de pago:</p> -->
                                        <!-- <img src="../../dist/img/credit/visa.png" alt="Visa">
                            <img src="../../dist/img/credit/mastercard.png" alt="Mastercard">
                            <img src="../../dist/img/credit/american-express.png" alt="American Express">
                            <img src="../../dist/img/credit/paypal2.png" alt="Paypal"> -->

                                        <!-- <p class="text-muted well well-sm shadow-none" style="margin-top: 10px">
                                            ...
                                        </p> -->
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-6">
                                        <!-- <p class="lead">Amount Due 2/22/2014</p> -->
                                        <div class="table-responsive">
                                            <table class="table">
                                                <tr>
                                                    <th style="width: 50%">
                                                        Total
                                                    </th>
                                                    <td>
                                                        S/
                                                        {{
                                                            form.detalles
                                                                .subtotal
                                                        }}
                                                    </td>
                                                </tr>
                                                <hr />
                                                <!-- <tr>
                                                    <th>Shipping:</th>
                                                    <td>$5.80</td>
                                                </tr> -->
                                                <tr>
                                                    <th>Saldo a Pagar:</th>
                                                    <td>
                                                        S/
                                                        {{
                                                            form.detalles
                                                                .subtotal
                                                        }}
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- /.row -->

                                <!-- this row will not appear when printing -->
                                <div class="row no-print">
                                    <div class="col-12">
                                        <!-- <a
                                            href="invoice-print.html"
                                            rel="noopener"
                                            target="_blank"
                                            class="btn btn-default"
                                            ><i class="fas fa-print"></i>
                                            Imprimir</a
                                        > -->
                                        <button
                                            type="button"
                                            class="btn btn-success float-right"
                                            @click="registrarventa()"
                                            :disabled="form.idlocalplan =='' "
                                        >
                                            <i class="far fa-credit-card"></i>
                                            Registrar
                                        </button>
                                        <!-- <button
                                            type="button"
                                            class="btn btn-primary float-right"
                                            style="margin-right: 5px"
                                        >
                                            <i class="fas fa-download"></i>
                                            Generate PDF
                                        </button> -->
                                        <button
                                            type="button"
                                            class="btn btn-warning float-right"
                                            style="margin-right: 5px"
                                            @click="cambiaralista()"
                                        >
                                            <i class="fas fa-close"></i> Cerrar
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <!-- /.invoice -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </section>
        </div>
        
    </div>
</template>

<script>
import Form from "vform";
// import datatable from "datatables.net";
import $ from "jquery";
import DataTable from "datatables.net";
import moment from 'moment';
export default {
    data() {
        return {
            vistalist: 1,
            vistaform: 0,
            listaclientes: [],
            listaplanes: [],
            listarventas: [],
            selectplan: {
                id: "",
                plan: "",
                tarifa: "",
            },
            localplan: {
                locale:{
                    user:{}

                }
            },
            descripcionperiodo:"",

            form: new Form({
                nrocomprobante: "1",
                fecha: "",
                vencimiento: "",
                subtotal: "",
                total: "",
                estado: "0",
                descuento: "",
                idlocalplan:"",
                detalles: {
                    plan: "",
                    descripcion: " mes(es) ",
                    precio: "",
                    cantidad: "",
                    subtotal: "",
                    periodo: "",
                    fechaini:"",
                    fechafin:""
                },
            }),
        };
    },
    mounted() {
        this.listventas();
        // this.calcularperiodo();
    },
    methods: {
        changelocalplan() {
            
            this.form.idlocalplan = this.localplan.id;
            this.form.detalles.plan = this.localplan.plane.id;
            this.form.detalles.precio = this.localplan.tarifa;
            this.form.detalles.cantidad = "1";
            this.form.detalles.subtotal = this.localplan.tarifa;
            this.form.total = this.form.detalles.subtotal
            this.form.detalles.descripcion = this.convertirperiodo(this.localplan.fechapago, this.localplan.periodo.periodonum)
            this.form.detalles.periodo = this.localplan.periodo.id;
            
        },
        // descrip(){
        //     // var periodocalc = this.calcularperiodo(this.localplan.fechapago, this.localplan.periodo.periodonum);
        //     var periodocalc = this.convertirperiodo(this.localplan.fechapago, this.localplan.periodo.periodonum);
        //     return descr
        // },
        convertirperiodo(fecha, periodo){
            this.form.detalles.descripcion = "";
            this.form.detalles.fechaini = this.localplan.fechapago;
            axios.get("/convert-periodo?fecha="+fecha+"&periodo="+periodo).then((response) => {
                // this.data = response.data.activiades;
                this.form.detalles.fechafin = response.data.fechafin;
                this.descripcionperiodo = response.data.fechainiformato+" - "+response.data.fechafinformato;
                this.form.detalles.descripcion = this.localplan.plane.plan + " - "+ this.localplan.periodo.periodonum+" mes(es) ("+this.descripcionperiodo+")";
                this.form.vencimiento = response.data.vencimiento;
                // this.form.detalles.descripcion = this.localplan.plane.plan + " - 1 mes(es) ("+this.descripcionperiodo+")";
                // return response.data.fechafin
                // var respuesta = response.data;
                
                // if (respuesta["status"] == 1) {
                //     this.listaclientes = respuesta.locales;
                //     // this.listaplanes = respuesta.planes;
                //     this.form.nrocomprobante =
                //         parseInt(respuesta.nroinvoice) + parseInt(1);
                // } else {
                //     // this.cuponestado = "Inválido";
                //     // this.validandocupon = "";
                // }
            });

            
        },
        fechavenc(fecha){
            // axios.get("/fecha-vencimiento?vencimiento="+fecha).then((response) => {
            //     this.form.vencimiento = response.data.fechavencimiento;
            // });
        },
        // formatFecha(fecha){
        //     var f = new Date(fecha);
        //     f.setDate(f.getDate() + 1)
        //     var abc = f.getDate()+"/"+('0'+(f.getMonth() + 1)).slice(-2)+"/"+f.getFullYear();
        //     console.log(abc)
        //     return abc
        // },

        // calcularperiodo(fechapago, cantidaperiodo) {
        //     var fechaInicio = new Date(fechapago);
        //     // var fechaFin = new Date("2020-12-28");
        //     // console.log('-> '+fechaInicio.setMonth(fechaInicio.getMonth() + 1))
        //     // console.log('->-> '+fechaInicio)
        //     // var e = new Date("2022-01-15")
        //     fechaInicio.setMonth(fechaInicio.getMonth() + cantidaperiodo)
        //     fechaInicio.setDate(fechaInicio.getDate() + 1)
        //     // console.log("fecha: "+fechaInicio.getFullYear() +"-"+ (fechaInicio.getMonth()+1) +"-"+ fechaInicio.getDate())
        //     var calculado = fechaInicio.getFullYear() +"-"+ ('0'+(fechaInicio.getMonth() + 1)).slice(-2) +"-"+ fechaInicio.getDate();
        //     return calculado
        // },
        // Funcion para añadir y eliminar los detalles
        // https://jsfiddle.net/sajadweb/mjnyLm0q/11
        tabla(){
            this.$nextTick(()=>{
                $('#datatable-fact').DataTable();
            })

            // $(function () {
            //     $('#datatable-fact').DataTable();
            // });

        },

        listventas() {
            axios.get("/fact-ventas").then((response) => {
                // this.data = response.data.activiades;
                var respuesta = response.data;
                
                if (respuesta["status"] == 1) {
                    this.listarventas = respuesta.listventas;
                    this.tabla();
                } else {
                    // this.cuponestado = "Inválido";
                    // this.validandocupon = "";
                }
            });
        },
        listarcabecera() {
            axios.get("/fact-negocios").then((response) => {
                // this.data = response.data.activiades;
                var respuesta = response.data;
                
                if (respuesta["status"] == 1) {
                    this.listaclientes = respuesta.locales;
                    // this.listaplanes = respuesta.planes;
                    this.form.nrocomprobante =
                        parseInt(respuesta.nroinvoice) + parseInt(1);
                } else {
                    // this.cuponestado = "Inválido";
                    // this.validandocupon = "";
                }
            });
        },
        registrarventa() {
            // this.procesando = "Espere...";
            this.form
                .post("/fact-registrar")
                .then((response) => {
                    var data = response.data;
                    
                    if (data.status == 1) {
                        // this.procesando = "";
                        alert("Se registró con éxito!.");
                        this.cambiaralista();
                        // this.$swal({
                        // position: "top-center",
                        // icon: "success",
                        // title: "Se registró con éxito!.",
                        // text: "Ahora puedes iniciar sesión",
                        // showConfirmButton: false,
                        // timer: 3500,
                        // }).then((result) => {
                        // // if (result.isConfirmed) {
                        // // Swal.fire("Deleted!", "Your file has been deleted.", "success");
                        // // window.location.href = "/login";
                        // // }
                        // });
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
        imprimirfact(val) {
            
            var url2 = "/fact-imprimir?idventa=" + val.id;
            // window.location.href = url;
            window.open(url2, "_blank");

            // axios.get("/fact-imprimir?idventa"+val.id).then((response) => {
            //     // this.data = response.data.activiades;
            //     var respuesta = response.data;
            //     console.log(respuesta);
            //     var url = 'https://wa.me/51'+val.celularprop+'?text='+text;

            //     // if (respuesta["status"] == 1) {
            //     //     this.listaclientes = respuesta.locales;
            //     //     this.listaplanes = respuesta.tarifas;
            //     //     this.form.nrocomprobante =  parseInt(respuesta.nroinvoice) + parseInt(1);
            //     // } else {
            //     //     // this.cuponestado = "Inválido";
            //     //     // this.validandocupon = "";
            //     // }
            // })
        },
        eliminarfact(val){
            if (confirm("Estás seguro de Eliminar el comprobante?")) {
                axios.get("/eliminar-venta?idventa="+val.id).then((response) => {
                    if (response.data["status"] == 1) {
                        this.listventas();
                        alert(response.data.message)
                    }
                });
            }
        },
        cancelarfactura(val){
            if (confirm("Estás seguro de Cambiar el Estado?")) {
                axios.get("/actualizar-estado?idventa="+val.id).then((response) => {
                    if (response.data["status"] == 1) {
                        this.listventas();
                        alert(response.data.message)
                    }
                });
            }
        },
        enviarfactwsp(val){
            var vencimiento = moment(val.vencimiento).format('DD/MM/YYYY');
            var periodoini = moment(val.detalleventa.fechaini).format('DD/MM/YYYY');
            var periodofin = moment(val.detalleventa.fechafin).format('DD/MM/YYYY');

            var tipopagos = '*Medios de pago:* %0D%0A Cuenta BCP en S/: 540-71909216-0-94 %0D%0A Cuenta BBVA en S/: 0011-0814-0232313825 %0D%0A Cuenta Interbank en S/: 340-3121018670 %0D%0A Yape al 961102930 %0D%0A Plin al 961102930';

            var texto = 'Hola *'+val.localplan.locale.nombresprop+'*, se ha generado el recibo de pago para *'+val.localplan.locale.titulo+'*, del periodo *('+periodoini+' - '+periodofin+')*, por el monto de S/ *'+val.total+'*, el cual tiene fecha de vencimiento el *'+vencimiento+'* . Seguimos trabajando para fidelizar a tus clientes. %0D%0A El equipo de Cliente VIP %0D%0A %0D%0A'+tipopagos;
            var url = 'https://wa.me/51'+val.localplan.locale.celularprop+'?text='+texto;
            // window.location.href = url;
            window.open(url,'_blank');
        },

        
        
        // changeselectplan() {
        //     console.log(this.selectplan);
        // },
        cambiaraform() {
            this.listarcabecera();
            this.vistalist = 0;
            this.vistaform = 1;
            var fechahoy = new Date();
            this.form.fecha =  fechahoy.getFullYear()+"-"+('0'+(fechahoy.getMonth() + 1)).slice(-2)+"-"+fechahoy.getDate()
            // this.fechavenc(this.form.fecha);
        },
        actualizafechaven(){
            // this.fechavenc(this.form.fecha);
        },
        cambiaralista() {
            this.listventas();
            this.vistalist = 1;
            this.vistaform = 0;
        },
    },
};
</script>
