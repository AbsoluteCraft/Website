var Chart = require('chart.js');
var moment = require('moment');

module.exports = {
    load: function() {
        var format = {
            day: 'h:mm A',
            week: 'ddd',
            month: 'MMM D'
        };

        var playersOnlineWidget = $('#widget-players-online');
        var playersOnline = JSON.parse(playersOnlineWidget.find('.data').text());

        new Chart(playersOnlineWidget.find('.chart'), {
            type: 'line',
            data: {
                labels: Object.keys(playersOnline.data).map(function(date) {return moment(date).format(format[playersOnline.scale])}),
                datasets: [{
                    data: Object.keys(playersOnline.data).map(function(date) {return playersOnline.data[date]}),
                    backgroundColor: 'rgba(13, 219, 228, 0.4)',
                    borderColor: 'transparent',
                    pointRadius: 0,
                    lineTension: 0
                }]
            },
            options: {
                legend: false,
                scales: {
                    yAxes: [{
                        ticks: {
                            stepSize: 1,
                            fixedStepSize: 1,
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    }
};