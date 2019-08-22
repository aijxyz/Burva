Highcharts.chart('container', {

    title: {
        text: 'Statistique de la Gestion de Burval'
    },

    subtitle: {
        text: 'Source: Burval'
    },

    yAxis: {
        title: {
            text: 'Benefices realisés'
        }
    },
    legend: {
        layout: 'vertical',
        align: 'right',
        verticalAlign: 'middle'
    },

    plotOptions: {
        series: {
            label: {
                connectorAllowed: false
            },
            pointStart: 2010
        }
    },

    series: [{
        name: 'Benefices realisés',
        data: [43934, 52503, 57177, 69658, 97031, 119931, 137133, 154175]
    }, {
        name: 'Depenses effectuéss',
        data: [24916, 24064, 29742, 29851, 32490, 30282, 38121, 40434]
    }, /*{
        name: 'Sales & Distribution',
        data: [11744, 17722, 16005, 19771, 20185, 24377, 32147, 39387]
    }, {
        name: 'Project Development',
        data: [null, null, 7988, 12169, 15112, 22452, 34400, 34227]
    }, {
        name: 'Other',
        data: [12908, 5948, 8105, 11248, 8989, 11816, 18274, 18111]
    }*/],

    responsive: {
        rules: [{
            condition: {
                maxWidth: 500
            },
            chartOptions: {
                legend: {
                    layout: 'horizontal',
                    align: 'center',
                    verticalAlign: 'bottom'
                }
            }
        }]
    }

});



// Build the chart
/*Highcharts.chart('container2', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'Browser market shares in January, 2018'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: false
            },
            showInLegend: true
        }
    },
    series: [{
        name: 'Brands',
        colorByPoint: true,
        data: [{
            name: 'Chrome',
            y: 61.41,
            sliced: true,
            selected: true
        }, {
            name: 'Internet Explorer',
            y: 11.84
        }, {
            name: 'Firefox',
            y: 10.85
        }, {
            name: 'Edge',
            y: 4.67
        }, {
            name: 'Safari',
            y: 4.18
        }, {
            name: 'Other',
            y: 7.05
        }]
    }]
});*/


Highcharts.chart('container2', {
    chart: {
        type: 'pie',
        options3d: {
            enabled: true,
            alpha: 45,
            beta: 0
        }
    },
    title: {
        text: 'Dynamisme des sites, 2018'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            depth: 35,
            dataLabels: {
                enabled: true,
                format: '{point.name}'
            }
        }
    },
    series: [{
        type: 'pie',
        name: 'Dynamisme du site',
        data: [
            ['Ouaga', 45.0],
            ['Bobo', 26.8],
            {
                name: 'Koudougou',
                y: 12.8,
                sliced: true,
                selected: true
            },
            ['Dori', 8.5],
            ['Banfora', 6.2],
            ['Autres', 0.7]
        ]
    }]
});


Highcharts.chart('container1', {
    title: {
        text: 'Statistique combinnées'
    },
    xAxis: {
        categories: ['Bordereaux', 'Securit Packs', 'Bons', 'Approvisionements', 'Tickets']
    },
    labels: {
        items: [{
            html: 'Total fornitures',
            style: {
                left: '50px',
                top: '18px',
                color: (Highcharts.theme && Highcharts.theme.textColor) || 'black'
            }
        }]
    },
    series: [{
        type: 'column',
        name: 'Fournisseur1',
        data: [3, 2, 1, 3, 4]
    }, {
        type: 'column',
        name: 'Fournisseur2',
        data: [2, 3, 5, 7, 6]
    }, {
        type: 'column',
        name: 'Fournisseur3',
        data: [4, 3, 3, 9, 0]
    }, {
        type: 'spline',
        name: 'Moyenne',
        data: [3, 2.67, 3, 6.33, 3.33],
        marker: {
            lineWidth: 2,
            lineColor: Highcharts.getOptions().colors[3],
            fillColor: 'white'
        }
    }, {
        type: 'pie',
        name: 'Total fornitures',
        data: [{
            name: 'Fournisseur1',
            y: 13,
            color: Highcharts.getOptions().colors[0] // Jane's color
        }, {
            name: 'Fournisseur2',
            y: 23,
            color: Highcharts.getOptions().colors[1] // John's color
        }, {
            name: 'Fournisseur3',
            y: 19,
            color: Highcharts.getOptions().colors[2] // Joe's color
        }],
        center: [175, 15,],
        size:100,
        showInLegend: false,
        dataLabels: {
            enabled: false
        }
    }]
});


Highcharts.chart('container3', {
    chart: {
        type: 'cylinder',
        options3d: {
            enabled: true,
            alpha: 15,
            beta: 15,
            depth: 50,
            viewDistance: 25
        }
    },
    title: {
        text: 'Highcharts Cylinder Chart'
    },
    plotOptions: {
        series: {
            depth: 25,
            colorByPoint: true
        }
    },
    series: [{
        data: [29.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4],
        name: 'Cylinders',
        showInLegend: false
    }]
});