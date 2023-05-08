<template>
    <div>
        <div class="card-header">
            <div style="display: flex; justify-content: space-between; align-items: center;">
                <div class="float-left">
                    fecha inicio
                    <input type="date" v-model="fechaini">
                    fecha fin
                    <input type="date" v-model="fechafin">
                    <button v-on:click="reporteaacumcanjes()">Procesar</button>
                </div>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered align-items-center mb-0 table-sm">
                <thead class="thead">
                    <tr>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            Tipo
                        </th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            Total
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <!-- @foreach ($locales as $row) -->
                    <tr v-for="(item, index) in data">
                        <td>
                            <div class="d-flex px-2 py-1">
                                <div class="d-flex flex-column justify-content-center">
                                    <h6 class="mb-0 text-sm">
                                        <span v-if="item.tipopunto == 'A'">
                                            Acumulaciones
                                        </span>
                                        <span v-if="item.tipopunto == 'C'">
                                            Canjes
                                        </span>
                                    </h6>
                                </div>
                            </div>
                        </td>
                        <td>
                            {{ item.total }}
                        </td>
                        <!-- @endforeach -->
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>

                    </tr>
                </tbody>
            </table>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered align-items-center mb-0 table-sm">
                <thead class="thead">
                    <tr>
                        <td class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            #
                        </td>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            Fecha
                        </th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            Tipo
                        </th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            Total
                        </th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            Detalles
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <!-- @foreach ($locales as $row) -->
                    <tr v-for="(item, index) in dataxdia">
                        <td>
                            {{ index + 1 }}
                        </td>
                        <td>
                            {{ item.dia | momentfecha }}
                        </td>
                        <td>
                            <div class="d-flex px-2 py-1">
                                <div class="d-flex flex-column justify-content-center">
                                    <h6 class="mb-0 text-sm">
                                        <span v-if="item.tipopunto == 'A'">
                                            Acumulaciones
                                        </span>
                                        <span v-if="item.tipopunto == 'C'">
                                            Canjes
                                        </span>
                                    </h6>
                                </div>
                            </div>
                        </td>
                        <td>
                            {{ item.total }}
                        </td>
                        <td>
                            <button type="button" class="btn bg-success btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal"
                            v-on:click="consultardetalle(item.dia, item.tipopunto)">
                                Detalles
                            </button>
                        </td>
                        <!-- @endforeach -->
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>

                    </tr>
                </tbody>
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content" style="background-color: #fff !important">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Detalles: {{fechaactividad | momentfecha}} | {{tipoactividad}}</h5>
                            <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body table-responsive">
                            <table class="table table-sm">
                                <thead>
                                    <th class="text-left">Nombres y Apellidos</th>
                                    <th>Tipo Puntos</th>
                                    <th>Puntos</th>
                                    <th>Hora</th>
                                    <th>Nro Comprobante</th>
                                </thead>
                                <tbody>
                                    <tr v-for="(item, index) in detalles">
                                        <td class="text-left">{{ index + 1 }} | {{item.dni}} | {{item.nombres}} {{item.apellidos}}</td>
                                        <td class="text-center">{{item.tipopunto}}</td>
                                        <td class="text-center">{{item.puntos}}</td>
                                        <td class="text-center">{{item.created_at | momenthora}}</td>
                                        <td class="text-center">{{item.nrocomprobante}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Cerrar</button>
                        </div>
                        </div>
                    </div>
                </div>
            </table>
        </div>
    </div>
</template>

<script>
import moment from 'moment';
export default {
    data() {
    return {
        data: [],
        dataxdia: [],
        fechaini:'',
        fechafin:'',
        detalles:[],
        fechaactividad:'',
        tipoactividad:''
    };
    },
    mounted() {
        console.log("Component mounted.");
        
    },
    filters: {
        momenthora: function (date) {
            return moment(date).format('h:mm a');
        },
        momentfecha: function (date) {
            return moment(date).format('DD-MM-YYYY');
        }
    },
    methods:{
        reporteaacumcanjes() {            
            this.validandocupon = "Validando...";
            axios.get("/reporte-canjes-negocio?fechaini="+this.fechaini+"&fechafin="+this.fechafin).then((response) => {
                if (response.data["status"] == 1) {
                    this.data = response.data.acumul_canjes;
                    this.dataxdia = response.data.acumul_canjes_x_dia;
                }else{
                    this.data = []
                    this.dataxdia = []

                }
                // if (respuesta["status"] == 1) {
                    
                //     this.cuponestado = "Válido";
                //     this.validandocupon = "";
                // } else {
                //     this.cuponestado = "Inválido";
                //     this.validandocupon = "";
                // }
                // });
            })
        },
        consultardetalle(dia, tipopunto){
            this.fechaactividad = dia;
            if (tipopunto == 'A') {
                this.tipoactividad = 'Acumulaciones';
            }else if(tipopunto == 'C'){
                this.tipoactividad = 'Canjes';
            }

            this.detalles = []
            axios.get("/reporte-canjes-negocio-detalles?dia="+dia+"&tipopunto="+tipopunto).then((response) => {
                if (response.data["status"] == 1) {
                    this.detalles = response.data.detalles;
                }else{
                    this.detalles = []
                }
            })
        }
    }
}
</script>
