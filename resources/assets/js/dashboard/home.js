var Chart = require('chart.js');
var moment = require('moment');
var qwest = require('qwest');

module.exports = {
    load: function() {
        var format = {
            hour: 'h:mm A',
            day: 'ddd'
        };

        var playersOnlineWidget = $('#widget-players-online');
        var playersOnline = JSON.parse(playersOnlineWidget.find('.data').text());

        new Chart(playersOnlineWidget.find('.chart'), {
            type: 'line',
            data: {
                labels: Object.keys(playersOnline.data).map(date => moment(date).format(format[playersOnline.scale])),
                datasets: [{
                    data: Object.keys(playersOnline.data).map((date) => playersOnline.data[date]),
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

        window.setInterval(function() {
            qwest.get($('#resources-url').text())
                .then(function(xhr, resp) {
                    $('#cpu-bar').attr('aria-valuenow', resp.average.cpu);
                    $('#cpu-bar').css('width', resp.average.cpu + '%');
                    $('#cpu-bar').text(resp.average.cpu + '%');

                    $('#memory-bar').attr('aria-valuenow', resp.average.memory);
                    $('#memory-bar').css('width', resp.average.memory + '%');
                    $('#memory-bar').text(resp.average.memory + '%');
                })
                .catch(function(err) {
                    console.error(err);
                });
        }, 10000); // 10 seconds
    }
};