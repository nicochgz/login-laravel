<template>
    <div class="hello" ref="chartdiv">

    </div>
</template>

<script>
    import * as am4core from "@amcharts/amcharts4/core";
    import * as am4charts from "@amcharts/amcharts4/charts";
    import am4themes_animated from "@amcharts/amcharts4/themes/animated";
    import axios from "axios";
    am4core.useTheme(am4themes_animated);

    export default {
        data() {
            return {
                datosConfirmados: [],
                datosNegativos: [],
                datosSospechosos: [],
                datosDefunciones: [],
            };
        },
        mounted() {
            this.obtenerDatos('confirmados', 'datosConfirmados');
            this.obtenerDatos('defunciones', 'datosDefunciones');
            this.obtenerDatos('negativos', 'datosNegativos');
            this.obtenerDatos('sospechosos', 'datosSospechosos');
            
            /*axios.get('/confirmados/getconfirmados') 
            .then(response => { 
                response.data 
                console.log(response.data);
                chart.data.push(response.data);
            })*/

            /*let url = 'http://localhost:8000/confirmados/getconfirmados'
            fetch(url)
                .then(response => response.json())
                .then( datos => mostrar(datos))
                .catch( e => console.log(e))
            
            const mostrar = (confirmados) => {
                chart.data = confirmados
                console.log(chart.data);
            } */


            let chart = am4core.create(this.$refs.chartdiv, am4charts.XYChart);

            chart.paddingRight = 20;

            let data = [];
            let visits = 10;
            for (let i = 1; i < 366; i++) {
            visits += Math.round((Math.random() < 0.5 ? 1 : -1) * Math.random() * 10);
            data.push({ date: new Date(2018, 0, i), name: "name" + i, value: visits });
            }

            chart.data = data;

            let dateAxis = chart.xAxes.push(new am4charts.DateAxis());
            dateAxis.renderer.grid.template.location = 0;

            let valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
            valueAxis.tooltip.disabled = true;
            valueAxis.renderer.minWidth = 35;

            let series = chart.series.push(new am4charts.LineSeries());
            series.dataFields.dateX = "date";
            series.dataFields.valueY = "value";

            series.tooltipText = "{valueY.value}";
            chart.cursor = new am4charts.XYCursor();

            let scrollbarX = new am4charts.XYChartScrollbar();
            scrollbarX.series.push(series);
            chart.scrollbarX = scrollbarX;

            this.chart = chart;
        },
        methods: {
            obtenerDatos(controlador, variable) {
            axios.get(`/${controlador}/get${controlador}`)
                .then(response => {
                this[variable] = response.data;
                console.log(`Datos ${controlador}:`, this[variable]);
                })
                .catch(error => {
                console.error(error);
                });
            }
            
        },
        beforeDestroy() {
            if (this.chart) {
            this.chart.dispose();
            }
        }
    }
</script>