var el = document.getElementById("wrapper");
var toggleButton = document.getElementById("menu-toggle");

toggleButton.onclick = function () {
    el.classList.toggle("toggled");
};

// Chart.js Implementations
document.addEventListener('DOMContentLoaded', function () {
    // Unique Visitor Chart (Line Chart)
    const visitorCtx = document.getElementById('uniqueVisitorChart');
    if (visitorCtx) {
        new Chart(visitorCtx, {
            type: 'line',
            data: {
                labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
                datasets: [{
                    label: 'Page Views',
                    data: [30, 40, 35, 50, 42, 105, 100],
                    borderColor: '#2196F3',
                    backgroundColor: 'rgba(33, 150, 243, 0.1)',
                    tension: 0.4,
                    fill: true
                }, {
                    label: 'Sessions',
                    data: [10, 30, 45, 30, 35, 50, 40],
                    borderColor: '#673AB7',
                    backgroundColor: 'rgba(103, 58, 183, 0.1)',
                    tension: 0.4,
                    fill: true
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            color: '#E0E0E0'
                        }
                    },
                    x: {
                        grid: {
                            display: false
                        }
                    }
                }
            }
        });
    }

    // Income Overview Chart (Bar Chart)
    const incomeCtx = document.getElementById('incomeOverviewChart');
    if (incomeCtx) {
        new Chart(incomeCtx, {
            type: 'bar',
            data: {
                labels: ['Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa', 'Su'],
                datasets: [{
                    label: 'Income',
                    data: [80, 95, 70, 40, 65, 50, 80],
                    backgroundColor: '#80DEEA',
                    borderRadius: 5,
                    barThickness: 20
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    y: {
                        display: false,
                        beginAtZero: true
                    },
                    x: {
                        grid: {
                            display: false
                        }
                    }
                }
            }
        });
    }
});
