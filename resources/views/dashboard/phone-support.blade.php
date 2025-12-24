<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Phone Support | Direct Expert Assistance</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <style>
        .phone-wrapper {
            max-width: 1100px;
            margin: auto;
            padding: 20px;
        }

        .phone-card {
            background: linear-gradient(135deg, #ffffff 0%, #eff6ff 100%);
            border-radius: 28px;
            padding: 55px 60px;
            box-shadow: 0 22px 50px rgba(37, 99, 235, 0.2);
            animation: fadeSlide 0.8s ease-out;
            position: relative;
            overflow: hidden;
            border: 2px solid rgba(37, 99, 235, 0.25);
        }

        .phone-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            height: 8px;
            width: 100%;
            background: linear-gradient(90deg, #2563eb, #3b82f6, #60a5fa);
        }

        .phone-card::after {
            content: '';
            position: absolute;
            top: -30%;
            right: -30%;
            width: 400px;
            height: 400px;
            background: radial-gradient(circle, rgba(37, 99, 235, 0.12) 0%, transparent 70%);
            z-index: 0;
        }

        .phone-header {
            display: flex;
            align-items: center;
            gap: 20px;
            margin-bottom: 30px;
            position: relative;
            z-index: 1;
        }

        .phone-icon {
            background: linear-gradient(135deg, #2563eb, #1d4ed8);
            color: white;
            width: 90px;
            height: 90px;
            border-radius: 22px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2.5rem;
            box-shadow: 0 12px 30px rgba(37, 99, 235, 0.4);
            animation: phoneRing 2s infinite;
        }

        .phone-title {
            flex: 1;
        }

        .phone-title h1 {
            font-size: 2.8rem;
            font-weight: 900;
            color: #1e3a8a;
            margin: 0;
            letter-spacing: -0.5px;
        }

        .phone-title p {
            color: #1e40af;
            font-size: 1.2rem;
            margin: 8px 0 0;
            font-weight: 500;
        }

        .availability-banner {
            background: linear-gradient(135deg, #dbeafe, #bfdbfe);
            padding: 25px 30px;
            border-radius: 18px;
            margin: 35px 0;
            border: 2px solid #93c5fd;
            position: relative;
            z-index: 1;
            display: flex;
            align-items: center;
            gap: 20px;
            box-shadow: 0 10px 25px rgba(37, 99, 235, 0.15);
        }

        .availability-icon {
            font-size: 2.5rem;
            color: #2563eb;
            animation: bounce 2s infinite;
        }

        .availability-text {
            flex: 1;
        }

        .availability-text h4 {
            font-size: 1.5rem;
            font-weight: 800;
            color: #1e3a8a;
            margin-bottom: 8px;
        }

        .availability-text p {
            color: #1e40af;
            font-size: 16px;
            line-height: 1.6;
            margin: 0;
        }

        .phone-numbers-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 25px;
            margin: 40px 0;
            position: relative;
            z-index: 1;
        }

        .number-card {
            background: white;
            border-radius: 18px;
            padding: 30px;
            border: 2px solid #dbeafe;
            transition: all 0.4s ease;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.05);
            text-align: center;
        }

        .number-card:hover {
            transform: translateY(-10px);
            border-color: #2563eb;
            box-shadow: 0 15px 35px rgba(37, 99, 235, 0.15);
        }

        .number-icon {
            width: 70px;
            height: 70px;
            border-radius: 16px;
            background: linear-gradient(135deg, #eff6ff, #dbeafe);
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 25px;
            color: #2563eb;
            font-size: 1.8rem;
        }

        .number-title {
            font-size: 1.3rem;
            font-weight: 700;
            color: #1e3a8a;
            margin-bottom: 15px;
        }

        .phone-number {
            font-size: 1.8rem;
            font-weight: 800;
            color: #2563eb;
            margin-bottom: 20px;
            letter-spacing: 1px;
        }

        .number-desc {
            color: #4b5563;
            font-size: 15.5px;
            line-height: 1.6;
            margin: 0 0 25px;
        }

        .call-btn-small {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            background: #2563eb;
            color: white;
            padding: 12px 25px;
            border-radius: 12px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .call-btn-small:hover {
            background: #1d4ed8;
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(37, 99, 235, 0.3);
        }

        .hours-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 25px;
            margin: 50px 0;
            position: relative;
            z-index: 1;
        }

        .hours-card {
            background: white;
            border-radius: 16px;
            padding: 30px;
            border: 2px solid #dbeafe;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.05);
        }

        .hours-title {
            font-size: 1.4rem;
            font-weight: 700;
            color: #1e3a8a;
            margin-bottom: 25px;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .hours-title i {
            color: #2563eb;
        }

        .hours-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .hours-list li {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 0;
            border-bottom: 1px solid #e5e7eb;
        }

        .hours-list li:last-child {
            border-bottom: none;
        }

        .day {
            font-weight: 600;
            color: #1f2937;
        }

        .time {
            color: #2563eb;
            font-weight: 600;
        }

        .peak-hours {
            background: #eff6ff;
            padding: 20px;
            border-radius: 12px;
            margin-top: 20px;
            border-left: 4px solid #2563eb;
        }

        .peak-hours p {
            margin: 0;
            color: #4b5563;
            font-size: 15px;
        }

        .action-section {
            background: linear-gradient(135deg, #eff6ff, #dbeafe);
            border-radius: 20px;
            padding: 35px 40px;
            margin: 50px 0;
            position: relative;
            z-index: 1;
            border: 2px solid #93c5fd;
            text-align: center;
        }

        .action-title {
            font-size: 1.8rem;
            font-weight: 800;
            color: #1e3a8a;
            margin-bottom: 25px;
        }

        .call-btn-large {
            display: inline-flex;
            align-items: center;
            gap: 15px;
            background: linear-gradient(135deg, #2563eb, #1d4ed8);
            color: white;
            padding: 20px 45px;
            border-radius: 18px;
            text-decoration: none;
            font-weight: 800;
            font-size: 1.4rem;
            transition: all 0.3s ease;
            box-shadow: 0 15px 35px rgba(37, 99, 235, 0.4);
            min-width: 300px;
            justify-content: center;
        }

        .call-btn-large:hover {
            transform: translateY(-8px) scale(1.05);
            box-shadow: 0 25px 50px rgba(37, 99, 235, 0.6);
            color: white;
        }

        .call-btn-large i {
            animation: ring 1.5s infinite;
        }

        .preparation-tips {
            background: white;
            border-radius: 18px;
            padding: 30px;
            margin: 40px 0;
            border: 2px solid #dbeafe;
            position: relative;
            z-index: 1;
        }

        .tips-title {
            font-size: 1.6rem;
            font-weight: 700;
            color: #1e3a8a;
            margin-bottom: 25px;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .tips-title i {
            color: #2563eb;
        }

        .tips-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .tips-list li {
            display: flex;
            align-items: flex-start;
            gap: 15px;
            padding: 15px 0;
            border-bottom: 1px solid #e5e7eb;
        }

        .tips-list li:last-child {
            border-bottom: none;
        }

        .tip-icon {
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

        .tip-text {
            color: #4b5563;
            font-size: 15.5px;
            line-height: 1.6;
        }

        .back-btn {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 15px 35px;
            border-radius: 14px;
            font-weight: 600;
            background: #f8f9fa;
            border: 2px solid #e5e7eb;
            color: #4b5563;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .back-btn:hover {
            transform: translateX(-4px);
            background: #f3f4f6;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.08);
            color: #1f2937;
        }

        .emergency-note {
            background: #fef2f2;
            border-radius: 16px;
            padding: 20px;
            margin-top: 30px;
            border: 2px solid #fecaca;
            position: relative;
            z-index: 1;
        }

        .emergency-note p {
            margin: 0;
            color: #991b1b;
            font-size: 15px;
            display: flex;
            align-items: center;
            gap: 10px;
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

        @keyframes phoneRing {
            0% {
                box-shadow: 0 0 0 0 rgba(37, 99, 235, 0.4);
            }
            70% {
                box-shadow: 0 0 0 20px rgba(37, 99, 235, 0);
            }
            100% {
                box-shadow: 0 0 0 0 rgba(37, 99, 235, 0);
            }
        }

        @keyframes bounce {
            0%, 100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-10px);
            }
        }

        @keyframes ring {
            0%, 100% {
                transform: rotate(0deg);
            }
            10%, 30% {
                transform: rotate(15deg);
            }
            20% {
                transform: rotate(-15deg);
            }
            40% {
                transform: rotate(0deg);
            }
        }

        @media (max-width: 768px) {
            .phone-card {
                padding: 35px 25px;
            }
            
            .phone-header {
                flex-direction: column;
                text-align: center;
                gap: 15px;
            }
            
            .phone-icon {
                width: 70px;
                height: 70px;
                font-size: 2rem;
            }
            
            .phone-title h1 {
                font-size: 2.2rem;
            }
            
            .availability-banner {
                flex-direction: column;
                text-align: center;
                gap: 15px;
            }
            
            .phone-numbers-grid {
                grid-template-columns: 1fr;
            }
            
            .hours-grid {
                grid-template-columns: 1fr;
            }
            
            .call-btn-large {
                width: 100%;
                min-width: auto;
            }
            
            .action-buttons {
                flex-direction: column;
                align-items: stretch;
            }
        }

        .response-time {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: rgba(34, 197, 94, 0.1);
            color: #16a34a;
            padding: 8px 16px;
            border-radius: 20px;
            font-weight: 600;
            margin-left: 15px;
            font-size: 14px;
        }
    </style>
</head>
<body>
    @extends('dashboard.adminrole')
    @section('content')
    <div class="container py-5">
        <div class="phone-wrapper">
            <div class="phone-card">
                <div class="phone-header">
                    <div class="phone-icon">
                        <i class="fas fa-phone-alt"></i>
                    </div>
                    <div class="phone-title">
                        <h1>Phone Support</h1>
                        <p>Direct Expert Assistance • Voice Support • Immediate Response</p>
                    </div>
                </div>

                <div class="availability-banner">
                    <div class="availability-icon">
                        <i class="fas fa-clock"></i>
                    </div>
                    <div class="availability-text">
                        <h4>📞 24/7 Phone Support Available</h4>
                        <p>Our technical experts are available around the clock. Average wait time <strong>under 2 minutes</strong> for urgent issues.</p>
                    </div>
                </div>

                <div class="phone-numbers-grid">
                    <div class="number-card">
                        <div class="number-icon">
                            <i class="fas fa-headset"></i>
                        </div>
                        <h3 class="number-title">General Support</h3>
                        <div class="phone-number">+1 (800) 787-7678</div>
                        <p class="number-desc">For technical issues, account questions, and general assistance. Available 24/7 with tiered support levels.</p>
                        <a href="tel:+1-800-787-7678" class="call-btn-small" onclick="trackCall('general')">
                            <i class="fas fa-phone"></i> Call General Support
                        </a>
                    </div>
                    
                    <div class="number-card">
                        <div class="number-icon">
                            <i class="fas fa-exclamation-triangle"></i>
                        </div>
                        <h3 class="number-title">Emergency Line</h3>
                        <div class="phone-number">+1 (800) 363-7443</div>
                        <p class="number-desc">Critical system failures, security breaches, or complete service outages only. Immediate response guaranteed.</p>
                        <a href="tel:+1-800-363-7443" class="call-btn-small" onclick="confirmEmergencyCall()">
                            <i class="fas fa-phone"></i> Call Emergency Line
                        </a>
                    </div>
                    
                    <div class="number-card">
                        <div class="number-icon">
                            <i class="fas fa-credit-card"></i>
                        </div>
                        <h3 class="number-title">Billing Support</h3>
                        <div class="phone-number">+1 (800) 245-3663</div>
                        <p class="number-desc">Billing inquiries, payment issues, and account upgrades. Available Monday-Friday, 8 AM to 8 PM EST.</p>
                        <a href="tel:+1-800-245-3663" class="call-btn-small" onclick="trackCall('billing')">
                            <i class="fas fa-phone"></i> Call Billing Support
                        </a>
                    </div>
                </div>

                <div class="hours-grid">
                    <div class="hours-card">
                        <h3 class="hours-title">
                            <i class="fas fa-calendar-alt"></i>
                            Operating Hours
                        </h3>
                        <ul class="hours-list">
                            <li>
                                <span class="day">Monday - Friday</span>
                                <span class="time">24/7</span>
                            </li>
                            <li>
                                <span class="day">Saturday</span>
                                <span class="time">24/7</span>
                            </li>
                            <li>
                                <span class="day">Sunday</span>
                                <span class="time">24/7</span>
                            </li>
                            <li>
                                <span class="day">Holidays</span>
                                <span class="time">24/7</span>
                            </li>
                        </ul>
                        <div class="peak-hours">
                            <p><i class="fas fa-chart-line me-2"></i> <strong>Peak Hours:</strong> 9 AM - 5 PM EST (Higher call volumes)</p>
                        </div>
                    </div>
                    
                    <div class="hours-card">
                        <h3 class="hours-title">
                            <i class="fas fa-user-check"></i>
                            Support Tiers
                        </h3>
                        <ul class="hours-list">
                            <li>
                                <span class="day">Tier 1</span>
                                <span class="time">Basic Support</span>
                            </li>
                            <li>
                                <span class="day">Tier 2</span>
                                <span class="time">Technical Specialists</span>
                            </li>
                            <li>
                                <span class="day">Tier 3</span>
                                <span class="time">Senior Engineers</span>
                            </li>
                            <li>
                                <span class="day">Escalation</span>
                                <span class="time">Management Team</span>
                            </li>
                        </ul>
                        <div class="response-time">
                            <i class="fas fa-bolt"></i> Avg. wait: 2 min
                        </div>
                    </div>
                </div>

                <div class="preparation-tips">
                    <h3 class="tips-title">
                        <i class="fas fa-lightbulb"></i>
                        Before You Call
                    </h3>
                    <ul class="tips-list">
                        <li>
                            <div class="tip-icon">
                                <i class="fas fa-user"></i>
                            </div>
                            <div class="tip-text">
                                <strong>Have your account information ready</strong> - Account ID, username, or registered email address.
                            </div>
                        </li>
                        <li>
                            <div class="tip-icon">
                                <i class="fas fa-desktop"></i>
                            </div>
                            <div class="tip-text">
                                <strong>Note your system details</strong> - Browser, operating system, and any error messages you're seeing.
                            </div>
                        </li>
                        <li>
                            <div class="tip-icon">
                                <i class="fas fa-sticky-note"></i>
                            </div>
                            <div class="tip-text">
                                <strong>Describe the issue clearly</strong> - When it started, steps to reproduce, and what you've already tried.
                            </div>
                        </li>
                        <li>
                            <div class="tip-icon">
                                <i class="fas fa-history"></i>
                            </div>
                            <div class="tip-text">
                                <strong>Recent changes</strong> - Any recent updates, configuration changes, or new software installations.
                            </div>
                        </li>
                    </ul>
                </div>

                <div class="action-section">
                    <h2 class="action-title">Need Immediate Assistance?</h2>
                    <p class="mb-4" style="color: #4b5563; font-size: 16.5px;">Our experts are ready to help you right now.</p>
                    <a href="{{ route('dashboard.emergency-support') }}" class="call-btn-large" onclick="trackCall('main')">
                        <i class="fas fa-phone-alt"></i> CALL NOW: +1-800-787-7678
                    </a>
                </div>

                <div class="emergency-note">
                    <p>
                        <i class="fas fa-exclamation-circle"></i>
                        <strong>Emergency Note:</strong> The emergency line (+1-800-363-7443) is for critical system failures only. 
                        Misuse may result in service charges.
                    </p>
                </div>

                <div class="text-center mt-5" style="position: relative; z-index: 1;">
                    <a href="{{ url()->previous() }}" class="btn btn-outline-secondary back-btn">
                        <i class="fas fa-arrow-left"></i> Return to Dashboard
                    </a>
                </div>
            </div>
        </div>
    </div>

    <script>
        function confirmEmergencyCall() {
            const emergencyNumber = '+1-800-363-7443';
            const confirmMessage = `⚠️ EMERGENCY LINE CONFIRMATION ⚠️\n\n` +
                `This line is for CRITICAL issues only:\n` +
                `• Complete system downtime\n` +
                `• Security breaches\n` +
                `• Critical data loss\n` +
                `• Payment processing failures\n\n` +
                `Call ${emergencyNumber} now?`;
            
            if (confirm(confirmMessage)) {
                trackCall('emergency');
                window.location.href = `tel:${emergencyNumber}`;
            } else {
                alert('Emergency call cancelled. Please use the general support line for non-critical issues.');
            }
        }

        function trackCall(type) {
            // In a real application, this would send analytics data
            console.log(`Call tracked: ${type} support`);
            
            // Example: Send to analytics system
            // fetch('/api/support/call-tracked', {
            //     method: 'POST',
            //     headers: { 'Content-Type': 'application/json' },
            //     body: JSON.stringify({ callType: type, timestamp: new Date().toISOString() })
            // });
        }

        // Add click tracking to all call buttons
        document.querySelectorAll('a[href^="tel:"]').forEach(button => {
            button.addEventListener('click', function(e) {
                const phoneNumber = this.getAttribute('href').replace('tel:', '');
                console.log(`Calling: ${phoneNumber}`);
                
                // You could add more specific tracking here
                if (phoneNumber.includes('363-7443')) {
                    trackCall('emergency');
                } else if (phoneNumber.includes('245-3663')) {
                    trackCall('billing');
                } else {
                    trackCall('general');
                }
            });
        });

        // Add visual feedback to number cards
        document.querySelectorAll('.number-card').forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-10px)';
            });
            
            card.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0)';
            });
        });

        // Simulate call volume status
        function updateCallVolume() {
            const hours = new Date().getHours();
            const isPeakHours = hours >= 9 && hours <= 17;
            const responseTimeElement = document.querySelector('.response-time');
            
            if (isPeakHours) {
                responseTimeElement.innerHTML = '<i class="fas fa-users"></i> Peak hours: 3 min';
                responseTimeElement.style.background = 'rgba(245, 158, 11, 0.1)';
                responseTimeElement.style.color = '#d97706';
            } else {
                responseTimeElement.innerHTML = '<i class="fas fa-bolt"></i> Avg. wait: 2 min';
                responseTimeElement.style.background = 'rgba(34, 197, 94, 0.1)';
                responseTimeElement.style.color = '#16a34a';
            }
        }

        // Initialize call volume status
        updateCallVolume();
        setInterval(updateCallVolume, 60000); // Update every minute
    </script>
    @endsection
</body>
</html>