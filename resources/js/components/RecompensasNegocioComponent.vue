<template>
    <div>
        <div class="card-header">
            <div style="display: flex; justify-content: space-between; align-items: center;">
                <div class="float-left">
                    Negocios
                    <select name="" v-model="idnegocio">
                        <option v-for="(item, index) in listnegocios" :value="item.id">{{item.titulo}}</option>
                    </select>
                    <button v-on:click="listaRecompensas()">Listar Recompensas</button>
                </div>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered align-items-center mb-0 table-sm">
                <thead class="thead">
                    <tr>
                        <td class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            #
                        </td>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            Titulo
                        </th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            Puntos
                        </th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            Creado
                        </th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            Modificar el
                        </th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            Opc
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <!-- @foreach ($locales as $row) -->
                    <tr v-for="(item, index) in listRecompensa">
                        <td>
                            {{ index + 1 }}
                        </td>
                        <td>
                            <div class="d-flex px-2 py-1">
                                <div>
                                    <!-- @if ($item['localcli']['logo']) -->
                                    <!-- <img
                                        :src="asset('img/'+item.foto)"
                                        class="avatar avatar-sm me-3"
                                        alt="user1"
                                    /> -->
                                    <!-- @else
                                    <i
                                        class="avatar avatar-sm me-3 fas fa-landmark opacity-10"
                                    ></i> -->
                                    <!-- @endif -->
                                </div>
                                <div class="d-flex flex-column justify-content-center">
                                    <h6 class="mb-0 text-sm">
                                        {{ item.titulo }}
                                    </h6>
                                </div>
                            </div>
                        </td>
                        <td>
                            {{ item.puntos }}
                        </td>
                        <td>
                            {{ item.created_at | momentfecha }}
                        </td>
                        <td>
                            {{ item.modificar | momentfecha }}
                        </td>
                        <td>
                            <!-- <a href="{{ route('userxdianegocio',$item['localcli']['id']) }}" class="btn">
                                <i class="fa-solid fa-chart-simple"></i>
                            </a>-->
                            <!-- <a href="{{ route('enviarrepo', $item['localcli']['id']) }}" class="btn">
                                <i class="fa-solid fa-paper-plane"></i>
                            </a> -->
                            <button class="btn" v-on:click="liberarfecha(item)">Liberar</button>
                        </td>
    
                        <!-- @endforeach -->
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
import moment from 'moment';
export default {
    data() {
    return {
        data: "",
        idnegocio:'',
        listnegocios:'',
        listRecompensa:'',
    };
    },
    mounted() {
        this.listselectnegocios();
    },
    filters: {
        momenthora: function (date) {
            return moment(date).format('h:mm a');
        },
        momentfecha: function (date) {
            if (date == null) {
                return null;
            }else{
                return moment(date).format('DD-MM-YYYY');
            }
        }
    },
    methods:{
        listselectnegocios(){
            axios.get("/listarNegocios").then((response) => {
                this.listnegocios = response.data.negocios;
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
        reporteactividades() {
            
            this.validandocupon = "Validando...";
            axios.get("/reporte-activdad-negocio?fechaini="+this.fechaini+"&fechafin="+this.fechafin).then((response) => {
                this.data = response.data.activiades;
                // console.log(response.data);
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
        listaRecompensas(){
            this.validandocupon = "Validando...";
            axios.get("/listarRecompensasAdmin?idnegocio="+this.idnegocio).then((response) => {
                this.listRecompensa = response.data.listRecompensas;
                // console.log(response.data);
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
        liberarfecha(val){
            // console.log(val.id);
            axios.get("/liberarFechaRecompensa?idrecompensa="+val.id).then((response) => {
                // this.listRecompensa = response.data.listRecompensas;
                // console.log(response.data);
                this.listaRecompensas();
                if (response.data["status"] == 1) {
                    alert(response.data["msg"])
                } else {
                    alert('plop..')
                }
                
                
            })
        }
    }
}
</script>
