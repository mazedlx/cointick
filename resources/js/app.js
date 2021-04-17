require('./bootstrap');

let canvas = document.getElementById('doge-chart');
let dogeChart = new Chart(canvas, {
    type: 'line',
    data: {
        datasets: [{
            label: 'Doge',
            data: []
        }]
    },
    options: {
        parsing: {
            xAxisKey: 'timestamp',
            yAxisKey: 'value'
        },
        scales: {
            y: {
                min: 0.20,
                max: 0.30,
            }
        },
        tension: 0,
        fill: false,
        borderColor: 'rgb(255, 255, 255)',
    }
});
window.dogeChart = dogeChart;

window.livewire.on('update-chart', (doge, min, max) => {
    window.dogeChart.data.datasets[0].data.push(doge);

    window.dogeChart.options.scales.y = {
        min: min,
        max: max,
    };

    window.dogeChart.update();
});
