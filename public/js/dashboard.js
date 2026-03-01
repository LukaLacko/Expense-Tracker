(function () {
  'use strict'

  feather.replace({ 'aria-hidden': 'true' })

  // --- PRVI GRAFIKON: Line Chart ---
  var ctx = document.getElementById('myChart')
  if (ctx) { 
    var myChart = new Chart(ctx, {
      type: 'line',
      data: {
        labels: window.linechartLabels,
        datasets: [
          {
            label: 'Income',
            data: window.incomeData,
            lineTension: 0,
            backgroundColor: 'transparent',
            borderColor: '#007bff',
            borderWidth: 4,
            pointBackgroundColor: '#007bff'
          },
          {
            label: 'Expense',
            data: window.expenseData,
            lineTension: 0,
            backgroundColor: 'transparent',
            borderColor: '#dc3545',
            borderWidth: 4,
            pointBackgroundColor: '#dc3545'
          }
        ]
      },
      options: {
        scales: {
          yAxes: [{
            ticks: {
              beginAtZero: false
            }
          }]
        },
        legend: {
          display: true
        }
      }
    })
  }
  const palette = [
    '#4e73df', '#1cc88a', '#36b9cc', '#f6c23e', '#e74a3b', 
    '#4e00df', '#5a5c69', '#f6c2ff', '#17a673', '#2c9faf', 
    '#dddfeb', '#5a5c68', '#f4b30d', '#2e59d9', '#e74a66', '#858796'
  ];

  var ctxPie = document.getElementById('myPieChart')
  if (ctxPie) {
    var myPieChart = new Chart(ctxPie, {
      type: 'doughnut',
      data: {
        labels: window.piechartLabels,
        datasets: [{
          data: window.chartValues,
          backgroundColor: palette,
          borderWidth: 1
        }]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        legend: {
          display: true,
          position: window.innerWidth < 768 ? 'bottom' : 'right',
          labels: {
            // VELIČINA TEKSTA
            fontSize: 16,        
            fontStyle: 'bold',   
            fontColor: '#333',   
            
            boxWidth: 20,        
            padding: 15          
        }
        }
      }
    })
  }
})()