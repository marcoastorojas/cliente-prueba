<template>
    <div>
        <div class="card-header">
            <div style="display: flex; justify-content: space-between; align-items: center;">
                <div class="float-left">
                    Año - Mes
                    <!-- <input type="date" v-model="fechafin"> -->
                    <select name="" id="" v-model="aniomes">
                        <option value=""></option>
                    </select>
                    <button v-on:click="reporteactividades()">Procesar</button>
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
                            Negocio
                        </th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            Total clientes
                        </th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            Cantidad Recurrentes
                        </th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            {{fechaini}} - {{fechafin}}
                        </th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            Enviar Reporte
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <!-- @foreach ($locales as $row) -->
                    <tr v-for="(item, index) in data">
                        <td>
                            {{ index + 1 }}
                        </td>
                        <td>
                            <div class="d-flex px-2 py-1">
                                <div>
                                    <!-- @if ($item['localcli']['logo'])
                                    <img
                                        src="{{ asset('img/' . $item['localcli']['logo']) }}"
                                        class="avatar avatar-sm me-3"
                                        alt="user1"
                                    />
                                    @else -->
                                    <i
                                        class="avatar avatar-sm me-3 fas fa-landmark opacity-10"
                                    ></i>
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
                            {{ item.cant_cli }}
                        </td>
                        <td>
                            {{ item.recurrentes }}
                        </td>
                        <td>
                            {{ item.totaloperaciones }}
                        </td>
                        <td>
                            <!-- <a href="{{ route('userxdianegocio',$item['localcli']['id']) }}" class="btn">
                                <i class="fa-solid fa-chart-simple"></i>
                            </a>-->
                            <!-- <a href="{{ route('enviarrepo', $item['localcli']['id']) }}" class="btn">
                                <i class="fa-solid fa-paper-plane"></i>
                            </a> -->
                            <button class="btn" v-on:click="enviarxwsp(item)">Enviar por WSP</button>
                        </td>
    
                        <!-- @endforeach -->
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
export default {
    data() {
    return {
        data: "",
        fechaini:'',
        fechafin:'',
        aniomes:'',
    };
    },
    mounted() {
        console.log("Component mounted.");
        
    },
    methods:{
        reporteactividades() {
            console.log(this.fechaini, this.fechafin)
            
            this.validandocupon = "Validando...";
            axios.get("/reporte-activdad-negocio?fechaini="+this.fechaini+"&fechafin="+this.fechafin).then((response) => {
                this.data = response.data.activiades;
                console.log(response.data);
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

        enviarxwsp(val){
            console.log(val)

            var text = 'Hola *'+val.titulo+'*, te saluda el equipo de de *ClienteVIP*, %0D%0A- hasta la fecha tienes *' + val.cant_cli + '* clientes en tu programa de lealtad. %0D%0A- Desde el día ' + this.fechaini + ' hasta '+this.fechafin+' se realizaron *' +val.totaloperaciones+'* operación(es) de acumulación o canje de puntos.';

            var url = 'https://wa.me/51'+val.celularprop+'?text='+text;

            // window.location.href = url;
            window.open(url,'_blank');
        }
    }
}
</script>
