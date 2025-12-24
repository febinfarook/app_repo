<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Performance Analytics | Admin Portal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        .analytics-wrapper {
            max-width: 1400px;
            margin: auto;
            padding: 20px;
        }

        .analytics-card {
            background: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%);
            border-radius: 24px;
            padding: 50px 55px;
            box-shadow: 0 20px 50px rgba(37, 99, 235, 0.12);
            animation: fadeSlide 0.8s ease-out;
            position: relative;
            overflow: hidden;
            border: 1px solid rgba(37, 99, 235, 0.15);
        }

        .analytics-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            height: 6px;
            width: 100%;
            background: linear-gradient(90deg, #2563eb, #3b82f6, #60a5fa);
        }

        .analytics-title {
            font-size: 2.8rem;
            font-weight: 800;
            color: #1f2937;
            margin-bottom: 25px;
            display: flex;
            align-items: center;
            gap: 15px;
            position: relative;
            z-index: 1;
        }

        .analytics-title i {
            color: #2563eb;
            font-size: 2.8rem;
            background: rgba(37, 99, 235, 0.1);
            width: 70px;
            height: 70px;
            border-radius: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 8px 20px rgba(37, 99, 235, 0.2);
        }

        .analytics-subtitle {
            font-size: 1.3rem;
            color: #6b7280;
            margin-bottom: 40px;
            font-weight: 500;
            position: relative;
            z-index: 1;
            line-height: 1.6;
        }

        .analytics-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 25px;
            margin: 40px 0;
            position: relative;
            z-index: 1;
        }

        .metric-card {
            background: linear-gradient(135deg, #ffffff, #eff6ff);
            border-radius: 18px;
            padding: 30px;
            text-align: center;
            border: 1px solid #dbeafe;
            transition: all 0.4s ease;
            position: relative;
            overflow: hidden;
        }

        .metric-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: linear-gradient(90deg, #2563eb, #3b82f6);
        }

        .metric-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 35px rgba(37, 99, 235, 0.15);
            border-color: #2563eb;
        }

        .metric-value {
            font-size: 3.2rem;
            font-weight: 800;
            color: #2563eb;
            margin-bottom: 5px;
            line-height: 1;
        }

        .metric-label {
            color: #6b7280;
            font-weight: 600;
            font-size: 1.1rem;
            margin-bottom: 15px;
        }

        .metric-change {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 14px;
            font-weight: 600;
            margin-top: 10px;
        }

        .change-positive {
            background: rgba(34, 197, 94, 0.1);
            color: #16a34a;
        }

        .change-negative {
            background: rgba(239, 68, 68, 0.1);
            color: #dc2626;
        }

        .chart-container {
            background: white;
            border-radius: 18px;
            padding: 30px;
            margin: 40px 0;
            border: 1px solid #e5e7eb;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
        }

        .chart-title {
            font-size: 1.5rem;
            font-weight: 700;
            color: #1f2937;
            margin-bottom: 25px;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .chart-title i {
            color: #2563eb;
        }

        .detailed-metrics {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
            gap: 25px;
            margin: 40px 0;
        }

        .detail-card {
            background: white;
            border-radius: 16px;
            padding: 25px;
            border: 1px solid #e5e7eb;
        }

        .detail-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .detail-title {
            font-size: 1.2rem;
            font-weight: 700;
            color: #1f2937;
        }

        .detail-value {
            font-size: 1.8rem;
            font-weight: 800;
            color: #2563eb;
        }

        .progress-container {
            margin-top: 15px;
        }

        .progress-bar {
            height: 10px;
            border-radius: 5px;
            background: #e5e7eb;
            overflow: hidden;
        }

        .progress-fill {
            height: 100%;
            background: linear-gradient(90deg, #2563eb, #3b82f6);
            border-radius: 5px;
            transition: width 1.5s ease;
        }

        .progress-labels {
            display: flex;
            justify-content: space-between;
            margin-top: 8px;
            font-size: 14px;
            color: #6b7280;
        }

        .time-period-selector {
            display: flex;
            gap: 10px;
            margin-bottom: 30px;
            flex-wrap: wrap;
        }

        .period-btn {
            padding: 10px 20px;
            border-radius: 12px;
            background: #f3f4f6;
            border: 1px solid #e5e7eb;
            color: #6b7280;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .period-btn.active {
            background: #2563eb;
            color: white;
            border-color: #2563eb;
        }

        .period-btn:hover:not(.active) {
            background: #e5e7eb;
        }

        .insights-section {
            background: linear-gradient(135deg, #eff6ff, #f0f9ff);
            border-radius: 18px;
            padding: 30px;
            margin: 40px 0;
            border: 1px solid #bae6fd;
        }

        .insights-title {
            font-size: 1.5rem;
            font-weight: 700;
            color: #1f2937;
            margin-bottom: 25px;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .insights-title i {
            color: #2563eb;
        }

        .insight-item {
            display: flex;
            align-items: flex-start;
            gap: 15px;
            padding: 15px 0;
            border-bottom: 1px solid rgba(37, 99, 235, 0.1);
        }

        .insight-item:last-child {
            border-bottom: none;
        }

        .insight-icon {
            width: 40px;
            height: 40px;
            border-radius: 10px;
            background: rgba(37, 99, 235, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            color: #2563eb;
            flex-shrink: 0;
        }

        .insight-text {
            color: #4b5563;
            font-size: 15.5px;
            line-height: 1.6;
        }

        .analytics-back {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            font-weight: 600;
            padding: 14px 28px;
            border-radius: 14px;
            transition: all 0.3s ease;
            background: #f8f9fa;
            border: 1px solid #e5e7eb;
            color: #4b5563;
            text-decoration: none;
            margin-top: 40px;
        }

        .analytics-back:hover {
            transform: translateX(-4px);
            background: #f3f4f6;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.08);
            color: #1f2937;
        }

        .export-btn {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            font-weight: 600;
            padding: 14px 28px;
            border-radius: 14px;
            background: linear-gradient(135deg, #10b981, #34d399);
            border: none;
            color: white;
            transition: all 0.3s ease;
            text-decoration: none;
            margin-left: 15px;
        }

        .export-btn:hover {
            transform: translateY(-4px);
            box-shadow: 0 15px 30px rgba(16, 185, 129, 0.4);
            color: white;
        }

        @keyframes fadeSlide {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @media (max-width: 768px) {
            .analytics-card {
                padding: 35px 25px;
            }
            
            .analytics-title {
                font-size: 2.2rem;
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }
            
            .analytics-title i {
                width: 60px;
                height: 60px;
                font-size: 1.8rem;
            }
            
            .analytics-grid {
                grid-template-columns: 1fr;
            }
            
            .detailed-metrics {
                grid-template-columns: 1fr;
            }
            
            .time-period-selector {
                justify-content: center;
            }
        }

        .comparison-badge {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            margin-left: 10px;
        }
    </style>
</head>
<body>
    @extends('dashboard.adminrole')
    @section('content')
    <div class="container py-5">
        <div class="analytics-wrapper">
            <div class="analytics-card">
                <h2 class="analytics-title">
                    <i class="fas fa-chart-line"></i>
                    Performance Analytics Dashboard
                </h2>
                
                <p class="analytics-subtitle">
                    Real-time insights and performance metrics across all system operations. 
                    Monitor efficiency, accuracy, and uptime with detailed analytics.
                </p>

                <div class="time-period-selector">
                    <button class="period-btn active" onclick="changePeriod('today')">Today</button>
                    <button class="period-btn" onclick="changePeriod('week')">Last 7 Days</button>
                    <button class="period-btn" onclick="changePeriod('month')">This Month</button>
                    <button class="period-btn" onclick="changePeriod('quarter')">Quarter</button>
                    <button class="period-btn" onclick="changePeriod('year')">Year to Date</button>
                </div>

                <div class="analytics-grid">
                    <div class="metric-card">
                        <div class="metric-value">99.7%</div>
                        <div class="metric-label">System Accuracy</div>
                        <div class="metric-change change-positive">
                            <i class="fas fa-arrow-up"></i> 0.3% from last month
                        </div>
                    </div>

                    <div class="metric-card">
                        <div class="metric-value">1.8 min</div>
                        <div class="metric-label">Avg Processing Time</div>
                        <div class="metric-change change-positive">
                            <i class="fas fa-arrow-down"></i> 12% faster
                        </div>
                    </div>

                    <div class="metric-card">
                        <div class="metric-value">87%</div>
                        <div class="metric-label">Efficiency Improvement</div>
                        <div class="metric-change change-positive">
                            <i class="fas fa-arrow-up"></i> 5% from last quarter
                        </div>
                    </div>

                    <div class="metric-card">
                        <div class="metric-value">24/7</div>
                        <div class="metric-label">Uptime <span class="comparison-badge change-positive">99.95%</span></div>
                        <div class="metric-change change-positive">
                            <i class="fas fa-check-circle"></i> 45 days no downtime
                        </div>
                    </div>
                </div>

                <div class="chart-container">
                    <h3 class="chart-title">
                        <i class="fas fa-chart-bar"></i>
                        Performance Trends
                    </h3>
                    <canvas id="performanceChart"></canvas>
                </div>

                <div class="detailed-metrics">
                    <div class="detail-card">
                        <div class="detail-header">
                            <h4 class="detail-title">Request Success Rate</h4>
                            <div class="detail-value">98.5%</div>
                        </div>
                        <div class="progress-container">
                            <div class="progress-bar">
                                <div class="progress-fill" style="width: 98.5%"></div>
                            </div>
                            <div class="progress-labels">
                                <span>0%</span>
                                <span>Target: 97%</span>
                                <span>100%</span>
                            </div>
                        </div>
                    </div>

                    <div class="detail-card">
                        <div class="detail-header">
                            <h4 class="detail-title">User Satisfaction</h4>
                            <div class="detail-value">4.8/5</div>
                        </div>
                        <div class="progress-container">
                            <div class="progress-bar">
                                <div class="progress-fill" style="width: 96%"></div>
                            </div>
                            <div class="progress-labels">
                                <span>1</span>
                                <span>Target: 4.5</span>
                                <span>5</span>
                            </div>
                        </div>
                    </div>

                    <div class="detail-card">
                        <div class="detail-header">
                            <h4 class="detail-title">Automation Rate</h4>
                            <div class="detail-value">92%</div>
                        </div>
                        <div class="progress-container">
                            <div class="progress-bar">
                                <div class="progress-fill" style="width: 92%"></div>
                            </div>
                            <div class="progress-labels">
                                <span>0%</span>
                                <span>Target: 90%</span>
                                <span>100%</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="insights-section">
                    <h3 class="insights-title">
                        <i class="fas fa-lightbulb"></i>
                        Performance Insights
                    </h3>
                    
                    <div class="insight-item">
                        <div class="insight-icon">
                            <i class="fas fa-rocket"></i>
                        </div>
                        <div class="insight-text">
                            <strong>Processing speed improved by 12%</strong> this month due to optimized algorithms and increased server capacity.
                        </div>
                    </div>
                    
                    <div class="insight-item">
                        <div class="insight-icon">
                            <i class="fas fa-shield-alt"></i>
                        </div>
                        <div class="insight-text">
                            <strong>System accuracy remains at 99.7%</strong> with zero critical errors reported in the last 30 days.
                        </div>
                    </div>
                    
                    <div class="insight-item">
                        <div class="insight-icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <div class="insight-text">
                            <strong>User satisfaction increased to 4.8/5</strong> following the implementation of new features requested by users.
                        </div>
                    </div>
                    
                    <div class="insight-item">
                        <div class="insight-icon">
                            <i class="fas fa-bolt"></i>
                        </div>
                        <div class="insight-text">
                            <strong>Peak load performance improved</strong> by 15% during high-traffic periods after recent infrastructure upgrades.
                        </div>
                    </div>
                </div>

                <div>
                    <a href="{{ url()->previous() }}" class="btn btn-outline-secondary analytics-back">
                        <i class="fas fa-arrow-left"></i> Back to Dashboard
                    </a>
                    <button class="btn export-btn" onclick="exportAnalytics()">
                        <i class="fas fa-download"></i> Export Report
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        
        const ctx = document.getElementById('performanceChart').getContext('2d');
        const performanceChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                datasets: [{
                    label: 'System Accuracy (%)',
                    data: [99.1, 99.3, 99.4, 99.5, 99.6, 99.6, 99.7, 99.7, 99.7, 99.7, 99.7, 99.7],
                    borderColor: '#2563eb',
                    backgroundColor: 'rgba(37, 99, 235, 0.1)',
                    borderWidth: 3,
                    fill: true,
                    tension: 0.4
                }, {
                    label: 'Processing Time (min)',
                    data: [3.2, 2.8, 2.5, 2.3, 2.1, 2.0, 1.9, 1.8, 1.8, 1.8, 1.8, 1.8],
                    borderColor: '#10b981',
                    backgroundColor: 'rgba(16, 185, 129, 0.1)',
                    borderWidth: 3,
                    fill: true,
                    tension: 0.4
                }, {
                    label: 'Efficiency (%)',
                    data: [72, 75, 78, 80, 82, 84, 85, 86, 86, 87, 87, 87],
                    borderColor: '#f59e0b',
                    backgroundColor: 'rgba(245, 158, 11, 0.1)',
                    borderWidth: 3,
                    fill: true,
                    tension: 0.4
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                height: 400,
                plugins: {
                    legend: {
                        position: 'top',
                        labels: {
                            font: {
                                size: 14
                            }
                        }
                    },
                    tooltip: {
                        mode: 'index',
                        intersect: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: false,
                        min: 50,
                        grid: {
                            color: 'rgba(0, 0, 0, 0.05)'
                        },
                        ticks: {
                            font: {
                                size: 12
                            }
                        }
                    },
                    x: {
                        grid: {
                            color: 'rgba(0, 0, 0, 0.05)'
                        },
                        ticks: {
                            font: {
                                size: 12
                            }
                        }
                    }
                }
            }
        });

        
        function changePeriod(period) {
            
            document.querySelectorAll('.period-btn').forEach(btn => {
                btn.classList.remove('active');
            });
            
            
            event.target.classList.add('active');
            
           
            console.log(`Changed period to: ${period}`);
            
            
            
            updateChartData(period);
        }

        function updateChartData(period) {
            
            alert(`Loading data for ${period}. In a real application, this would update the charts with new data.`);
        }

        function exportAnalytics() {
            
            alert('Exporting analytics report... This would download a comprehensive PDF report in a real application.');
            
            
            
            setTimeout(() => {
                alert('Report exported successfully!');
            }, 1000);
        }

        
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const progressFill = entry.target.querySelector('.progress-fill');
                    const currentWidth = progressFill.style.width;
                    progressFill.style.width = '0%';
                    
                    setTimeout(() => {
                        progressFill.style.width = currentWidth;
                    }, 300);
                }
            });
        }, { threshold: 0.5 });

        document.querySelectorAll('.detail-card').forEach(card => {
            observer.observe(card);
        });

        
        document.querySelectorAll('.metric-card').forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-10px)';
            });
            
            card.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0)';
            });
        });
    </script>
    @endsection
</body>
</html>