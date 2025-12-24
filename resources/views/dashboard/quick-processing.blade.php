<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quick Processing | Admin Portal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <style>
        .qp-wrapper {
            max-width: 1100px;
            margin: auto;
            padding: 20px;
        }

        .qp-card {
            background: linear-gradient(135deg, #ffffff 0%, #fff9ed 100%);
            border-radius: 24px;
            padding: 50px 55px;
            box-shadow: 0 18px 40px rgba(245, 158, 11, 0.12);
            animation: fadeSlide 0.8s ease-out;
            position: relative;
            overflow: hidden;
            border: 1px solid rgba(245, 158, 11, 0.15);
        }

        .qp-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            height: 6px;
            width: 100%;
            background: linear-gradient(90deg, #f59e0b, #fbbf24, #fde68a);
        }

        .qp-card::after {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 300px;
            height: 300px;
            background: radial-gradient(circle, rgba(245, 158, 11, 0.08) 0%, transparent 70%);
            z-index: 0;
        }

        .qp-title {
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

        .qp-title i {
            color: #f59e0b;
            font-size: 2.8rem;
            background: rgba(245, 158, 11, 0.1);
            width: 70px;
            height: 70px;
            border-radius: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 8px 20px rgba(245, 158, 11, 0.2);
        }

        .qp-subtitle {
            font-size: 1.3rem;
            color: #6b7280;
            margin-bottom: 40px;
            font-weight: 500;
            position: relative;
            z-index: 1;
            line-height: 1.6;
            padding-left: 85px;
        }

        .qp-text {
            font-size: 16.5px;
            color: #4b5563;
            line-height: 1.85;
            margin-bottom: 30px;
            position: relative;
            z-index: 1;
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 25px;
            margin: 40px 0;
            position: relative;
            z-index: 1;
        }

        .feature-card {
            background: white;
            border-radius: 16px;
            padding: 28px;
            border: 1px solid rgba(245, 158, 11, 0.2);
            transition: all 0.3s ease;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.05);
        }

        .feature-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 30px rgba(245, 158, 11, 0.15);
            border-color: #f59e0b;
        }

        .feature-icon {
            width: 60px;
            height: 60px;
            border-radius: 14px;
            background: linear-gradient(135deg, #fef3c7, #fde68a);
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 20px;
            color: #d97706;
            font-size: 1.6rem;
        }

        .feature-title {
            font-size: 1.25rem;
            font-weight: 700;
            color: #1f2937;
            margin-bottom: 12px;
        }

        .feature-desc {
            font-size: 15px;
            color: #6b7280;
            line-height: 1.6;
        }

        .stats-container {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            gap: 25px;
            margin: 50px 0;
            position: relative;
            z-index: 1;
        }

        .stat-item {
            text-align: center;
            padding: 25px;
            min-width: 180px;
        }

        .stat-number {
            font-size: 3.2rem;
            font-weight: 800;
            color: #f59e0b;
            margin-bottom: 5px;
            line-height: 1;
        }

        .stat-label {
            font-size: 1rem;
            color: #6b7280;
            font-weight: 600;
        }

        .process-steps {
            position: relative;
            z-index: 1;
            margin: 50px 0;
        }

        .step-item {
            display: flex;
            align-items: flex-start;
            gap: 20px;
            margin-bottom: 35px;
            padding: 25px;
            border-radius: 16px;
            background: rgba(255, 255, 255, 0.8);
            transition: all 0.3s ease;
        }

        .step-item:hover {
            background: white;
            box-shadow: 0 10px 25px rgba(245, 158, 11, 0.1);
        }

        .step-number {
            width: 50px;
            height: 50px;
            border-radius: 12px;
            background: linear-gradient(135deg, #f59e0b, #fbbf24);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 800;
            font-size: 1.3rem;
            flex-shrink: 0;
        }

        .step-content h4 {
            font-size: 1.3rem;
            font-weight: 700;
            color: #1f2937;
            margin-bottom: 10px;
        }

        .step-content p {
            color: #6b7280;
            font-size: 15.5px;
            line-height: 1.7;
            margin: 0;
        }

        .qp-divider {
            height: 1px;
            background: linear-gradient(90deg, transparent, #fbbf24, transparent);
            margin: 50px 0;
            position: relative;
            z-index: 1;
        }

        .action-buttons {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 20px;
            margin-top: 40px;
            position: relative;
            z-index: 1;
        }

        .qp-back-btn {
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
        }

        .qp-back-btn:hover {
            transform: translateY(-4px);
            background: #f3f4f6;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.08);
            color: #1f2937;
        }

        .learn-more-btn {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            font-weight: 600;
            padding: 14px 32px;
            border-radius: 14px;
            background: linear-gradient(135deg, #f59e0b, #fbbf24);
            border: none;
            color: white;
            transition: all 0.3s ease;
            text-decoration: none;
        }

        .learn-more-btn:hover {
            transform: translateY(-4px);
            box-shadow: 0 15px 30px rgba(245, 158, 11, 0.4);
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
            .qp-card {
                padding: 35px 25px;
            }
            
            .qp-title {
                font-size: 2.2rem;
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }
            
            .qp-title i {
                width: 60px;
                height: 60px;
                font-size: 1.8rem;
            }
            
            .qp-subtitle {
                padding-left: 0;
                font-size: 1.1rem;
            }
            
            .features-grid {
                grid-template-columns: 1fr;
            }
            
            .stats-container {
                flex-direction: column;
                align-items: center;
                gap: 15px;
            }
            
            .stat-item {
                min-width: 100%;
            }
            
            .action-buttons {
                flex-direction: column;
                align-items: stretch;
            }
            
            .qp-back-btn, .learn-more-btn {
                width: 100%;
                justify-content: center;
            }
        }

        .pulse-animation {
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0% {
                box-shadow: 0 0 0 0 rgba(245, 158, 11, 0.4);
            }
            70% {
                box-shadow: 0 0 0 15px rgba(245, 158, 11, 0);
            }
            100% {
                box-shadow: 0 0 0 0 rgba(245, 158, 11, 0);
            }
        }
    </style>
</head>
<body>
    @extends('dashboard.adminrole')
    @section('content')
    <div class="container py-5">
        <div class="qp-wrapper">
            <div class="qp-card">

               <h2 class="qp-title">
                   <i class="fas fa-bolt pulse-animation"></i>
                   <span>Ultra-Fast Processing System</span>
               </h2>

               <p class="qp-subtitle">
                   Powered by intelligent automation and optimized workflows to deliver 
                   unprecedented processing speeds while maintaining accuracy and reliability.
               </p>

               <div class="stats-container">
                   <div class="stat-item">
                       <div class="stat-number">99.7%</div>
                       <div class="stat-label">Request Success Rate</div>
                   </div>
                   <div class="stat-item">
                       <div class="stat-number">< 2min</div>
                       <div class="stat-label">Average Processing Time</div>
                   </div>
                   <div class="stat-item">
                       <div class="stat-number">24/7</div>
                       <div class="stat-label">Automated Operation</div>
                   </div>
                   <div class="stat-item">
                       <div class="stat-number">0</div>
                       <div class="stat-label">Manual Interventions Needed</div>
                   </div>
               </div>

               <div class="features-grid">
                   <div class="feature-card">
                       <div class="feature-icon">
                           <i class="fas fa-rocket"></i>
                       </div>
                       <h4 class="feature-title">Lightning-Fast Approvals</h4>
                       <p class="feature-desc">AI-powered decision making reduces approval times from hours to seconds with 99.9% accuracy.</p>
                   </div>
                   
                   <div class="feature-card">
                       <div class="feature-icon">
                           <i class="fas fa-robot"></i>
                       </div>
                       <h4 class="feature-title">Smart Automation</h4>
                       <p class="feature-desc">Intelligent workflows automatically handle routine tasks, freeing staff for complex decisions.</p>
                   </div>
                   
                   <div class="feature-card">
                       <div class="feature-icon">
                           <i class="fas fa-clock"></i>
                       </div>
                       <h4 class="feature-title">Zero Waiting Time</h4>
                       <p class="feature-desc">Real-time processing eliminates queues with parallel processing capabilities.</p>
                   </div>
               </div>

               <div class="process-steps">
                   <h3 class="mb-4" style="color: #1f2937; font-weight: 700; font-size: 1.8rem;">
                       <i class="fas fa-cogs me-2" style="color: #f59e0b;"></i>
                       How Our Processing Works
                   </h3>
                   
                   <div class="step-item">
                       <div class="step-number">1</div>
                       <div class="step-content">
                           <h4>Intelligent Submission Analysis</h4>
                           <p>Our AI instantly analyzes incoming requests, categorizes them by priority, and routes them to appropriate channels.</p>
                       </div>
                   </div>
                   
                   <div class="step-item">
                       <div class="step-number">2</div>
                       <div class="step-content">
                           <h4>Automated Validation & Verification</h4>
                           <p>Multi-layered validation checks ensure data integrity while cross-referencing with existing databases in real-time.</p>
                       </div>
                   </div>
                   
                   <div class="step-item">
                       <div class="step-number">3</div>
                       <div class="step-content">
                           <h4>Parallel Processing Engine</h4>
                           <p>Multiple requests are processed simultaneously through our distributed system architecture.</p>
                       </div>
                   </div>
                   
                   <div class="step-item">
                       <div class="step-number">4</div>
                       <div class="step-content">
                           <h4>Instant Notification & Delivery</h4>
                           <p>Results are delivered immediately with automated notifications to all stakeholders.</p>
                       </div>
                   </div>
               </div>

               <p class="qp-text">
                   Our Quick Processing system is built on a microservices architecture that ensures 
                   scalability and reliability. By leveraging machine learning algorithms and real-time 
                   data processing, we've reduced average handling time by 87% compared to traditional methods.
               </p>

               <div class="qp-divider"></div>

               <div class="action-buttons">
                   <a href="{{ url()->previous() }}" class="btn btn-outline-secondary qp-back-btn">
                       <i class="fas fa-arrow-left"></i> Go Back to Dashboard
                   </a>
                   <a href="{{ route('dashboard.perfomance-analytics') }}" class="learn-more-btn" onclick="showAdvancedFeatures()">
                       <i class="fas fa-chart-line"></i> View Performance Analytics
                   </a>
               </div>
            </div>
        </div>
    </div>

    <script>
        function showAdvancedFeatures() {
            alert('Performance analytics would show real-time processing metrics, efficiency reports, and optimization suggestions.');
           
        }

      
        document.querySelectorAll('.feature-card').forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-8px)';
            });
            
            card.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0)';
            });
        });

       
        const observerOptions = {
            threshold: 0.5
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animated');
                }
            });
        }, observerOptions);

        document.querySelectorAll('.stat-number').forEach(stat => {
            observer.observe(stat);
        });
    </script>
    @endsection
</body>
</html>