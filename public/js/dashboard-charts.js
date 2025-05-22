window.renderDashboardCharts = function (nivelesData, etiquetasPorGrado, datosPorGrado) {

    const ctxNiveles = document.getElementById('nivelesChart').getContext('2d');

    new Chart(ctxNiveles, {
        type: 'pie',
        data: {
            labels: ['Preescolar', 'Primaria', 'Secundaria'],
            datasets: [{
                label: 'Formularios por Nivel',
                data: nivelesData,
                backgroundColor: ['#f59e0b', '#3b82f6', '#10b981'],
                hoverOffset: 10,
                borderWidth: 2,
                borderColor: '#fff'
            }]
        },
        options: {
            responsive: true,
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
}
