import Chart from 'chart.js/auto';

window.renderDashboardCharts = function (nivelesData, etiquetasPorGrado, datosPorGrado, registrosLabels, registrosData, egresadosLabels,
    egresadosData) {

    const ctxNiveles = document.getElementById('nivelesChart').getContext('2d');

    new Chart(ctxNiveles, {
        type: 'pie',
        data: {
            labels: ['Preescolar', 'Primaria', 'Secundaria'],
            datasets: [{
                label: 'Formularios por Nivel',
                data: nivelesData,
                backgroundColor: ['#10b981', '#3b82f6', '#f59e0b'],
                hoverOffset: 10,
                borderWidth: 2,
                borderColor: '#fff'
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'bottom',
                    labels: { color: '#374151', font: { size: 14 } }
                },
                title: {
                    display: true,
                    text: 'Distribución por Nivel Educativo',
                    color: '#1f2937',
                    font: { size: 18, weight: 'bold' }
                }
            },
            animation: {
                animateRotate: true,
                animateScale: true
            }
        }
    });

    const ctxGrados = document.getElementById('graficaPorGrado').getContext('2d');

    //pie
    //     new Chart(ctxGrados, {
    //     type: 'pie', // 👈 CAMBIADO de 'bar' a 'pie'
    //     data: {
    //         labels: etiquetasPorGrado,
    //         datasets: [{
    //             label: 'Estudiantes por grado',
    //             data: datosPorGrado,
    //             backgroundColor: [
    //                 '#60A5FA', '#FCD34D', '#F87171', '#34D399', '#A78BFA',
    //                 '#F472B6', '#FDBA74', '#2DD4BF', '#818CF8', '#FBBF24',
    //                 '#4ADE80', '#E879F9', '#FCA5A5', '#86EFAC', '#C084FC'
    //             ],
    //             borderColor: '#fff',
    //             borderWidth: 1
    //         }]
    //     },
    //     options: {
    //         responsive: true,
    //         maintainAspectRatio: false,
    //         plugins: {
    //             legend: {
    //                 display: true, // 👈 Ahora sí es útil para identificar sectores
    //                 position: 'right' // Puedes cambiar a 'top', 'left', 'bottom'
    //             },
    //             title: {
    //                 display: true,
    //                 text: 'Distribución de Estudiantes por Grado',
    //                 font: {
    //                     size: 18,
    //                     weight: 'bold'
    //                 },
    //                 color: '#1f2937'
    //             }
    //         }
    //     }
    // });

    //barra
    new Chart(ctxGrados, {
        type: 'bar', // <-- CAMBIAMOS el tipo de gráfico
        data: {
            labels: etiquetasPorGrado,
            datasets: [{
                label: 'Estudiantes por grado',
                data: datosPorGrado,
                backgroundColor: [
                    '#60A5FA', '#FCD34D', '#F87171', '#34D399', '#A78BFA',
                    '#F472B6', '#FDBA74', '#2DD4BF', '#818CF8', '#FBBF24',
                    '#4ADE80', '#E879F9', '#FCA5A5', '#86EFAC', '#C084FC'
                ],
                borderColor: '#fff',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false // no necesitamos leyenda para una sola barra por grado
                },
                title: {
                    display: true,
                    text: 'Distribución de Estudiantes por Grado',
                    font: {
                        size: 18,
                        weight: 'bold'
                    },
                    color: '#1f2937'
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 1 // 👈 Esto fuerza que el incremento sea de 1 en 1
                    },
                    title: {
                        display: true,
                        text: 'Cantidad de estudiantes'
                    }
                },
                x: {
                    title: {
                        display: true,
                        text: 'Grado escolar'
                    }
                }
            }
        }
    });

    ////

    const ctxRegistros = document.getElementById('registrosChart').getContext('2d');

    new Chart(ctxRegistros, {
        type: 'bar',
        data: {
            labels: registrosLabels,
            datasets: [{
                label: 'Registros por mes',
                data: registrosData,
                backgroundColor: [
                    '#60A5FA', '#FCD34D', '#F87171', '#34D399', '#A78BFA',
                    '#F472B6', '#FDBA74', '#2DD4BF', '#818CF8', '#FBBF24',
                    '#4ADE80', '#E879F9'
                ],
                borderColor: '#fff',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false // Sin leyenda, como en tu ejemplo
                },
                title: {
                    display: true,
                    text: 'Registros creados por mes',
                    font: {
                        size: 18,
                        weight: 'bold'
                    },
                    color: '#1f2937'
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 1,
                        precision: 0
                    },
                    title: {
                        display: true,
                        text: 'Cantidad de registros'
                    }
                },
                x: {
                    title: {
                        display: true,
                        text: 'Mes'
                    }
                }
            }
        }
    });



    //egresados
    const ctx = document.getElementById('egresadosUnificadosChart').getContext('2d');
    // Generamos colores automáticos
    const colores = egresadosLabels.map((_, i) => `hsl(${i * 45 % 360}, 70%, 50%)`);

    new Chart(ctx, {
        type: 'bar', // Cambiar a 'pie' si prefieres circular
        data: {
            labels: egresadosLabels,
            datasets: [{
                label: 'Número de egresados',
                data: egresadosData,
                backgroundColor: colores,
                borderColor: '#fff',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: { display: false },
                title: {
                    display: true,
                    text: 'Padres egresados por Colegio',
                    font: { size: 18, weight: 'bold' },
                    color: '#1f2937'
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: { stepSize: 1, precision: 0 },
                    title: { display: true, text: 'Cantidad de egresados' }
                },
                x: {
                    title: { display: true, text: 'Colegio' }
                }
            }
        }
    });

}
