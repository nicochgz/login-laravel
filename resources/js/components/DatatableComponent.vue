<template>
    <div>
        <!--<bootstrap-4-datatable :columns="columns" :data="rows" :filter="filter" :per-page="perPage"></bootstrap-4-datatable>
        <bootstrap-4-datatable-pager v-model="page" type="abbreviated"></bootstrap-4-datatable-pager>-->
        <!--<EasyDatatable :headers="columns" :items="rows"/>
        <EasyDataTable :headers="columns" :items="rows"/>-->
        <DataTable :columns="columns" :data="rows" class="display table table-hover table-striped">
            <thead>
                <tr>
                    <th>id</th>
                    <th>nombre</th>
                    <th>poblacion</th>
                    <th>code</th>
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
        /*data() {
            return {
                columns:[{
                    label: 'id',
                    field: 'ID'
                },
                {
                    label: 'nombre',
                    field: 'NOMBRE'
                },
                {
                    label: 'poblacion',
                    field: 'POBLACION'
                },
                {
                    label: 'code',
                    field: 'codigo_estado'
                }
                ],
                rows:[],
                page:1,
                filter:'',
                perPage:10
            }
        },*/
        data() {
            return {
                columns:[{
                    data: 'ID'
                },
                {
                    data: 'NOMBRE'
                },
                {
                    data: 'POBLACION'
                },
                {
                    data: 'codigo_estado'
                }
                ],
                rows:[],
                page:1,
                filter:'',
                perPage:10
            }
        },
        methods: {
            showEstados: function() {
                axios.get('/estados/getEstados').then(function(res){
                    this.rows = res.data;
                }.bind(this));
            }
        },
        created: function() {
            this.showEstados();
        }
    }
</script>