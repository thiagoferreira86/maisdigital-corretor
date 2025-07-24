"use strict";

async function initChart(selector, dadosStr, categoriasStr, corTema) {
    const element = document.querySelector(selector);
    if (!element) return;

    const dados = typeof dadosStr === 'string' ? dadosStr.split(",").map(Number) : dadosStr.map(Number);
    const categories = typeof categoriasStr === 'string' ? categoriasStr.split(",") : categoriasStr;

    const settings = KTApp.getSettings();
    const fontColor = settings.colors.gray['gray-500'];
    const fontFamily = settings['font-family'];

    const options = {
        series: [{ name: 'Views', data: dados }],
        chart: { type: 'bar', height: 350, toolbar: { show: false } },
        plotOptions: {
            bar: { horizontal: false, columnWidth: ['30%'], endingShape: 'rounded' },
        },
        legend: { show: false },
        dataLabels: { enabled: false },
        stroke: { show: true, width: 2, colors: ['transparent'] },
        xaxis: {
            categories,
            labels: { style: { colors: fontColor, fontSize: '12px', fontFamily } }
        },
        yaxis: {
            labels: { style: { colors: fontColor, fontSize: '12px', fontFamily } }
        },
        fill: { opacity: 1 },
        states: {
            normal: { filter: { type: 'none', value: 0 } },
            hover: { filter: { type: 'none', value: 0 } },
            active: { allowMultipleDataPointsSelection: false, filter: { type: 'none', value: 0 } }
        },
        tooltip: {
            style: { fontSize: '12px', fontFamily },
            y: { formatter: val => `${val} views` }
        },
        colors: [corTema, settings.colors.gray['gray-300']],
        grid: {
            borderColor: settings.colors.gray['gray-200'],
            strokeDashArray: 4,
            yaxis: { lines: { show: true } }
        }
    };

    const chart = new ApexCharts(element, options);
    await chart.render();
}

async function fetchViewsData(url) {
    try {
        const response = await $.ajax({
            type: "POST",
            url,
            dataType: "json"
        });

        if (!response.sucesso) {
            swal("Erro!", "Houve um erro! Verifique os dados e tente novamente.", "error");
            return;
        }

        return response;
    } catch (e) {
        console.error("Erro na requisição:", e);
    }
}

async function inicializarGraficosSite() {
    const data = await fetchViewsData("actions/viewsSite.php"); 

    if (!data) return;
    console.log(data);
    const settings = KTApp.getSettings();
    await Promise.all([
        initChart("#kt_charts_widget_2_chart", data.dadosMensal, data.categoriasMensal, settings.colors.theme.base.warning),
        initChart("#kt_charts_widget_3_chart", data.dadosSemanal, data.categoriasSemanal, settings.colors.theme.base.success),
        initChart("#kt_charts_widget_4_chart", data.dadosDiario, data.categoriasDiario, settings.colors.theme.base.primary),
    ]);
}  
async function inicializarGraficosLanding() {
    const data = await fetchViewsData("actions/viewsLanding.php"); 

    if (!data) return;

    const settings = KTApp.getSettings();
    await Promise.all([
        initChart("#kt_charts_widget_22_chart", data.dadosMensal, data.categoriasMensal, settings.colors.theme.base.warning),
        initChart("#kt_charts_widget_23_chart", data.dadosSemanal, data.categoriasSemanal, settings.colors.theme.base.success),
        initChart("#kt_charts_widget_24_chart", data.dadosDiario, data.categoriasDiario, settings.colors.theme.base.primary),
    ]);
}  
$(document).ready(() => {
    inicializarGraficosSite();
    inicializarGraficosLanding();
});