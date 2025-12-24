<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>24/7 Support | Admin Portal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <style>
        .support-wrapper {
            max-width: 1100px;
            margin: auto;
            padding: 20px;
        }

        .support-card {
            background: linear-gradient(135deg, #ffffff 0%, #f0f7ff 100%);
            border-radius: 24px;
            padding: 50px 55px;
            box-shadow: 0 18px 40px rgba(37, 99, 235, 0.12);
            animation: fadeSlide 0.8s ease-out;
            position: relative;
            overflow: hidden;
            border: 1px solid rgba(37, 99, 235, 0.15);
        }

        .support-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            height: 6px;
            width: 100%;
            background: linear-gradient(90deg, #2563eb, #3b82f6, #60a5fa);
        }

        .support-card::after {
            content: '';
            position: absolute;
            top: -30%;
            right: -30%;
            width: 400px;
            height: 400px;
            background: radial-gradient(circle, rgba(37, 99, 235, 0.08) 0%, transparent 70%);
            z-index: 0;
        }

        .support-title {
            font-size: 2.8rem;
            font-weight: 800;
            color: #1f2937;
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            gap: 15px;
            position: relative;
            z-index: 1;
        }

        .support-title i {
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
            animation: pulse 2s infinite;
        }

        .support-subtitle {
            font-size: 1.3rem;
            color: #6b7280;
            margin-bottom: 40px;
            font-weight: 500;
            position: relative;
            z-index: 1;
            line-height: 1.6;
            padding-left: 85px;
        }

        .support-text {
            font-size: 16.5px;
            color: #4b5563;
            line-height: 1.85;
            margin-bottom: 30px;
            position: relative;
            z-index: 1;
        }

        .support-stats {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            gap: 25px;
            margin: 50px 0;
            position: relative;
            z-index: 1;
        }

        .stat-card {
            background: white;
            border-radius: 16px;
            padding: 25px;
            text-align: center;
            min-width: 180px;
            border: 1px solid rgba(37, 99, 235, 0.1);
            transition: all 0.3s ease;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.05);
        }

        .stat-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 30px rgba(37, 99, 235, 0.15);
            border-color: #2563eb;
        }

        .stat-number {
            font-size: 2.8rem;
            font-weight: 800;
            color: #2563eb;
            margin-bottom: 8px;
            line-height: 1;
        }

        .stat-label {
            font-size: 1rem;
            color: #6b7280;
            font-weight: 600;
        }

        .channels-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 25px;
            margin: 40px 0;
            position: relative;
            z-index: 1;
        }

        .channel-card {
            background: white;
            border-radius: 16px;
            padding: 30px;
            border: 1px solid rgba(37, 99, 235, 0.2);
            transition: all 0.3s ease;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.05);
            text-align: center;
        }

        .channel-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 30px rgba(37, 99, 235, 0.15);
            border-color: #2563eb;
        }

        .channel-icon {
            width: 70px;
            height: 70px;
            border-radius: 16px;
            background: linear-gradient(135deg, #dbeafe, #bfdbfe);
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            color: #2563eb;
            font-size: 1.8rem;
        }

        .channel-title {
            font-size: 1.3rem;
            font-weight: 700;
            color: #1f2937;
            margin-bottom: 12px;
        }

        .channel-desc {
            font-size: 15px;
            color: #6b7280;
            line-height: 1.6;
            margin-bottom: 20px;
        }

        .channel-btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 10px 20px;
            border-radius: 10px;
            background: #2563eb;
            color: white;
            text-decoration: none;
            font-weight: 600;
            font-size: 14px;
            transition: all 0.3s ease;
        }

        .channel-btn:hover {
            background: #1d4ed8;
            color: white;
            transform: translateY(-2px);
        }

        .faq-section {
            position: relative;
            z-index: 1;
            margin: 50px 0;
        }

        .faq-title {
            font-size: 1.8rem;
            font-weight: 700;
            color: #1f2937;
            margin-bottom: 30px;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .faq-title i {
            color: #2563eb;
        }

        .faq-item {
            background: white;
            border-radius: 12px;
            padding: 25px;
            margin-bottom: 15px;
            border: 1px solid rgba(37, 99, 235, 0.1);
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .faq-item:hover {
            border-color: #2563eb;
            box-shadow: 0 5px 15px rgba(37, 99, 235, 0.1);
        }

        .faq-question {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-weight: 600;
            color: #1f2937;
            font-size: 1.1rem;
        }

        .faq-answer {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease;
            color: #6b7280;
            line-height: 1.6;
            margin-top: 0;
        }

        .faq-item.active .faq-answer {
            max-height: 300px;
            margin-top: 15px;
        }

        .faq-toggle {
            color: #2563eb;
            transition: transform 0.3s ease;
        }

        .faq-item.active .faq-toggle {
            transform: rotate(180deg);
        }

        .availability-banner {
            background: linear-gradient(135deg, #2563eb, #3b82f6);
            color: white;
            padding: 20px 30px;
            border-radius: 16px;
            margin: 40px 0;
            position: relative;
            z-index: 1;
            display: flex;
            align-items: center;
            gap: 20px;
            box-shadow: 0 10px 25px rgba(37, 99, 235, 0.3);
        }

        .availability-icon {
            font-size: 2.5rem;
        }

        .availability-text {
            flex: 1;
        }

        .availability-text h4 {
            font-size: 1.4rem;
            margin-bottom: 5px;
            font-weight: 700;
        }

        .support-divider {
            height: 1px;
            background: linear-gradient(90deg, transparent, #93c5fd, transparent);
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

        .support-back-btn {
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

        .support-back-btn:hover {
            transform: translateX(-4px);
            background: #f3f4f6;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.08);
            color: #1f2937;
        }

        .emergency-btn {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            font-weight: 600;
            padding: 14px 32px;
            border-radius: 14px;
            background: linear-gradient(135deg, #ef4444, #dc2626);
            border: none;
            color: white;
            transition: all 0.3s ease;
            text-decoration: none;
        }

        .emergency-btn:hover {
            transform: translateY(-4px);
            box-shadow: 0 15px 30px rgba(239, 68, 68, 0.4);
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

        @keyframes pulse {
            0% {
                box-shadow: 0 0 0 0 rgba(37, 99, 235, 0.4);
            }
            70% {
                box-shadow: 0 0 0 15px rgba(37, 99, 235, 0);
            }
            100% {
                box-shadow: 0 0 0 0 rgba(37, 99, 235, 0);
            }
        }

        @media (max-width: 768px) {
            .support-card {
                padding: 35px 25px;
            }
            
            .support-title {
                font-size: 2.2rem;
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }
            
            .support-title i {
                width: 60px;
                height: 60px;
                font-size: 1.8rem;
            }
            
            .support-subtitle {
                padding-left: 0;
                font-size: 1.1rem;
            }
            
            .channels-grid {
                grid-template-columns: 1fr;
            }
            
            .support-stats {
                flex-direction: column;
                align-items: center;
                gap: 15px;
            }
            
            .stat-card {
                min-width: 100%;
            }
            
            .availability-banner {
                flex-direction: column;
                text-align: center;
                gap: 15px;
            }
            
            .action-buttons {
                flex-direction: column;
                align-items: stretch;
            }
            
            .support-back-btn, .emergency-btn {
                width: 100%;
                justify-content: center;
            }
        }
    </style>
</head>
<body>
    @extends('dashboard.adminrole')
    @section('content')
    <div class="container py-5">
        <div class="support-wrapper">
            <div class="support-card">

                <h2 class="support-title">
                    <i class="fas fa-headset"></i>
                    <span>24/7 Support Center</span>
                </h2>

                <p class="support-subtitle">
                    Round-the-clock assistance with expert technicians ready to resolve your issues 
                    anytime, anywhere. Average response time under 2 minutes.
                </p>

                <div class="support-stats">
                    <div class="stat-card">
                        <div class="stat-number">24/7</div>
                        <div class="stat-label">Availability</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-number">< 2min</div>
                        <div class="stat-label">Avg. Response Time</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-number">98%</div>
                        <div class="stat-label">Satisfaction Rate</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-number">50+</div>
                        <div class="stat-label">Expert Technicians</div>
                    </div>
                </div>

                <div class="availability-banner">
                    <div class="availability-icon">
                        <i class="fas fa-clock"></i>
                    </div>
                    <div class="availability-text">
                        <h4>Always Available, Never Offline</h4>
                        <p>Our support team operates 24 hours a day, 7 days a week, including holidays and weekends. 
                        No issue is too big or too small for our dedicated support specialists.</p>
                    </div>
                </div>

                <h3 class="mb-4" style="color: #1f2937; font-weight: 700; font-size: 1.8rem; position: relative; z-index: 1;">
                    <i class="fas fa-comments me-2" style="color: #2563eb;"></i>
                    Support Channels
                </h3>

                <div class="channels-grid">
                    <div class="channel-card">
                        <div class="channel-icon">
                            <i class="fas fa-comment-dots"></i>
                        </div>
                        <h4 class="channel-title">Live Chat Support</h4>
                        <p class="channel-desc">Instant messaging with our support agents. Get real-time solutions to your technical issues.</p>
                        <a href="{{ route('dashboard.live-chat') }}" class="channel-btn" onclick="startLiveChat()">
                            <i class="fas fa-comment"></i> Start Chat
                        </a>
                    </div>
                    
                    <div class="channel-card">
                        <div class="channel-icon">
                            <i class="fas fa-phone-alt"></i>
                        </div>
                        <h4 class="channel-title">Phone Support</h4>
                        <p class="channel-desc">Direct line to our technical experts. Available for urgent issues requiring immediate attention.</p>
                        <a href="{{ route('dashboard.phone-support') }}" class="channel-btn">
                            <i class="fas fa-phone"></i> Call Now
                        </a>
                    </div>
                    
                    <div class="channel-card">
                        <div class="channel-icon">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <h4 class="channel-title">Email Assistance</h4>
                        <p class="channel-desc">Detailed technical support via email. Perfect for complex issues requiring thorough investigation.</p>
                        <a href="{{ route('dashboard.email-support') }}" class="channel-btn">
                            <i class="fas fa-paper-plane"></i> Send Email
                        </a>
                    </div>
                </div>

                <div class="faq-section">
                    <h3 class="faq-title">
                        <i class="fas fa-question-circle"></i>
                        Frequently Asked Questions
                    </h3>
                    
                    <div class="faq-item" onclick="toggleFAQ(this)">
                        <div class="faq-question">
                            What are your support hours?
                            <span class="faq-toggle"><i class="fas fa-chevron-down"></i></span>
                        </div>
                        <div class="faq-answer">
                            Our support team is available 24 hours a day, 7 days a week, including all holidays. 
                            We never close, ensuring you get assistance whenever you need it.
                        </div>
                    </div>
                    
                    <div class="faq-item" onclick="toggleFAQ(this)">
                        <div class="faq-question">
                            How quickly can I expect a response?
                            <span class="faq-toggle"><i class="fas fa-chevron-down"></i></span>
                        </div>
                        <div class="faq-answer">
                            Live chat responses typically within 2 minutes, phone calls are answered within 30 seconds, 
                            and email responses are sent within 2 hours for standard inquiries.
                        </div>
                    </div>
                    
                    <div class="faq-item" onclick="toggleFAQ(this)">
                        <div class="faq-question">
                            Do you provide emergency after-hours support?
                            <span class="faq-toggle"><i class="fas fa-chevron-down"></i></span>
                        </div>
                        <div class="faq-answer">
                            Yes, we have a dedicated emergency support team available 24/7 for critical system 
                            failures or security incidents. Use the red emergency button for immediate assistance.
                        </div>
                    </div>
                    
                    <div class="faq-item" onclick="toggleFAQ(this)">
                        <div class="faq-question">
                            What information should I have ready when contacting support?
                            <span class="faq-toggle"><i class="fas fa-chevron-down"></i></span>
                        </div>
                        <div class="faq-answer">
                            Please have your account ID, a description of the issue, error messages (if any), 
                            and steps you've already tried. This helps us resolve your issue faster.
                        </div>
                    </div>
                </div>

                <p class="support-text">
                    Our multi-tier support system ensures that your issues are routed to the right specialists. 
                    Level 1 handles general inquiries, Level 2 deals with technical issues, and Level 3 consists 
                    of senior engineers for complex system problems. Every interaction is tracked and monitored 
                    for quality assurance.
                </p>

                <div class="support-divider"></div>

                <div class="action-buttons">
                    <a href="{{ url()->previous() }}" class="btn btn-outline-secondary support-back-btn">
                        <i class="fas fa-arrow-left"></i> Go Back to Dashboard
                    </a>
                    <a href="{{ route('dashboard.emergency-support') }}" class="emergency-btn">
                        <i class="fas fa-exclamation-triangle"></i> Emergency Support
                  </a>
                </div>
            </div>
        </div>
    </div>

    <script>
        function toggleFAQ(item) {
            item.classList.toggle('active');
        }

        function startLiveChat() {
            alert('In a real application, this would open a live chat window with our support team.');
            
        }

        function showEmergencySupport() {
            const emergencyNumber = '+1-800-EMERGENCY';
            const confirmEmergency = confirm(`Emergency support is for critical system failures only. Call ${emergencyNumber} immediately?`);
            
            if (confirmEmergency) {
                window.location.href = `tel:${emergencyNumber}`;
            }
        }

        
        document.querySelector('.faq-item').classList.add('active');

        
        document.querySelectorAll('.channel-card').forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-8px)';
            });
            
            card.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0)';
            });
        });
    </script>
    @endsection
</body>
</html>