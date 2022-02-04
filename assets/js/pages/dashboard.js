$(document).ready(function() {
    
    "use strict";
    $('#themes-info').on('hidden.bs.modal', function (e) {
        
    setTimeout(function() {
        toastr.options = {
            progressBar: true,
            showMethod: 'fadeIn',
            hideMethod: 'fadeOut',
            timeOut: 5000
        };
        toastr.success('Try searching something!');
    }, 1000);
    });

    var ctx = document.getElementById('visitorsChart');
    if (ctx) {
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Visitors', 'Visitors', 'Visitors', 'Visitors', 'Visitors', 'Visitors', 'Visitors', 'Visitors', 'Visitors', 'Visitors', 'Visitors'],
                datasets: [{
                    
                    label: 'Total',
                    data: [3, 6, 4, 5, 6, 5, 3, 5, 6, 5, 4],
                    backgroundColor: '#5780F7'
                }, {
                    label: 'Unique',
                    data: [2, 4, 2, 4, 2, 4, 2, 4, 2, 4, 2],
                    backgroundColor: '#F4F4F5'
                }]
            },
            options: {
                responsive: true,
                legend: {
                    display: 0 // place legend on the right side of chart
                },
                scales: {
                    yAxes: [{
                        display: 0,
                        stacked: true,
                        ticks: {
                            display: 0
                        },
                        gridLines: {
                            color: "rgba(255,255,255,0)"
                        }
                    }],
                    xAxes: [{
                        display: 0,
                        stacked: true,
                        ticks: {
                            display: 0
                        },
                        gridLines: {
                            color: "rgba(255,255,255,0)"
                        }
                    }]
                }
            }
        });
    }
    
    var ctx_apex = document.querySelector("#apex1");

    if (ctx_apex) {

        var options = {
            chart: {
                height: 350,
                type: 'bar',
                toolbar: {
                    show: false
                }
            },
            plotOptions: {
                bar: {
                    horizontal: false,
                    columnWidth: '55%',
                    endingShape: 'rounded'	
                },
            },
            
            colors:['#FFCD36', '#5780F7', '#06BA54'],
    
            dataLabels: {
                enabled: false
            },
            stroke: {
                show: true,
                width: 2,
                colors: ['transparent']
            },
            series: [{
                name: 'Space',
                data: [44, 55, 57, 56, 61, 58, 63, 60, 66, 63, 60]
            }, {
                name: 'Modern',
                data: [76, 85, 101, 98, 87, 105, 91, 114, 94, 89, 95]
            }, {
                name: 'Alpha',
                data: [35, 41, 36, 26, 45, 48, 52, 53, 41, 39, 46]
            }],
            xaxis: {
                categories: ['Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec', 'Jan'],
            },
            fill: {
                opacity: 1
    
            },
            tooltip: {
                y: {
                    formatter: function (val) {
                        return "$ " + val + " thousands"
                    }
                }
            }
        };
        var chart = new ApexCharts(
            ctx_apex,
            options
        );
        chart.render();
    }

    var ctx_products = document.getElementById("productsChart");
    if (ctx_products) {
        new Chart(ctx_products,{
            "type": "doughnut",
            "data": {
                "labels": ["Alpha","Space","Modern"],
                "datasets": [{
                    "label": "My First Dataset",
                    "data": [327,82,145],
                    "backgroundColor": ["#06BA54","#FFCD36","#E6E6E6"]
                }]
            },
            options: {
                legend: {
                    display: false
                }
            }
        });
    }

    $(window).on('load', function() {
        setTimeout(function() {
            $('#themes-info').modal('show');
        }, 1600)
    });
    
});