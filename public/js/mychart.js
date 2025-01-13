import Chart from 'chart.js/auto';
const labels = [
    'January',
    'February',
    'March',
    'April',
    'May',
    'June',
];

const data = {
    labels: labels,
    datasets: [{
        label: 'My First dataset',
        backgroundColor: 'rgb(14 165 233)',
        borderColor: 'rgb(14 165 233)',
        data: [0, 10, 5, 2, 20, 30, 45],
    }]
};

const config = {
    type: 'line',
    data: data,
    options: {
        aspectRatio: 2
    }
};


const myChart = new Chart(
    document.getElementById('chart'),
    config
);
