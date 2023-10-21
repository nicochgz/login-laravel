<template>
    <div>
        <DataTable :columns="columns" :data="rows" class="display table table-hover table-striped">
            <thead>
                <tr>
                    <th>id</th>
                    <th>nombre</th>
                    <th>confirmados</th>
                    <th>defunciones</th>
                    <th>negativos</th>
                    <th>sospechosos</th>
                </tr>
            </thead>
        </DataTable>
    </div>
</template>

<style>
@import 'bootstrap';
@import 'datatables.net-bs5';
</style>

<script>
    export default {
        data() {
            return {
                columns:[{
                    data: 'id_estado'
                },
                {
                    data: 'estado_nombre'
                },
                {
                    data: 'confirmados'
                },
                {
                    data: 'defunciones'
                },
                {
                    data: 'negativos'
                },
                {
                    data: 'sospechosos'
                }
                ],
                rows:[],
                page:1,
                filter:'',
                perPage:10
            }
        },
        methods: {
            showCasos: function () {
                // Realiza múltiples solicitudes Axios para obtener los datos que necesitas.
                axios
                .all([
                    axios.get('/confirmados/getconfirmados'),
                    axios.get('/defunciones/getdefunciones'),
                    axios.get('/negativos/getnegativos'),
                    axios.get('/sospechosos/getsospechosos'),
                ])
                .then(
                    axios.spread((res1, res2, res3, res4) => {
                        this.rows = this.combinaDatos(res1.data, res2.data, res3.data, res4.data);
                    })
                )
                .catch((error) => {
                    console.error(error);
                });
            },
            combinaDatos(data1, data2, data3, data4) {
                const datosCombinados = [];

                for (let i = 0; i < data1.length; i++) {
                const filaCombinada = {
                    id_estado: data1[i].id_estado,
                    estado_nombre: data1[i].estado_nombre,
                    confirmados: data1[i].confirmados,
                    defunciones: data2[i].defunciones,
                    negativos: data3[i].negativos,
                    sospechosos: data4[i].sospechosos,
                };

                datosCombinados.push(filaCombinada);
                }

                return datosCombinados;
            },
        },
        created: function() {
            this.showCasos();
        }
    }
</script>