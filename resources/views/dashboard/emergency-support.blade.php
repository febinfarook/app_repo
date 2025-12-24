<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Emergency Support | Critical Response</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <style>
        .emergency-wrapper {
            max-width: 1100px;
            margin: auto;
            padding: 20px;
        }

        .emergency-card {
            background: linear-gradient(135deg, #fff5f5 0%, #ffffff 100%);
            border-radius: 28px;
            padding: 55px 60px;
            box-shadow: 0 25px 60px rgba(239, 68, 68, 0.25);
            animation: emergencyPulse 2s infinite alternate;
            position: relative;
            overflow: hidden;
            border: 3px solid rgba(239, 68, 68, 0.3);
        }

        .emergency-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 8px;
            background: linear-gradient(90deg, #ef4444, #dc2626, #b91c1c);
        }

        .emergency-card::after {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 400px;
            height: 400px;
            background: radial-gradient(circle, rgba(239, 68, 68, 0.15) 0%, transparent 70%);
            z-index: 0;
        }

        .emergency-header {
            display: flex;
            align-items: center;
            gap: 20px;
            margin-bottom: 30px;
            position: relative;
            z-index: 1;
        }

        .emergency-icon {
            background: linear-gradient(135deg, #ef4444, #dc2626);
            color: white;
            width: 90px;
            height: 90px;
            border-radius: 22px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2.5rem;
            box-shadow: 0 12px 30px rgba(239, 68, 68, 0.4);
            animation: flash 1s infinite alternate;
        }

        .emergency-title {
            flex: 1;
        }

        .emergency-title h1 {
            font-size: 2.8rem;
            font-weight: 900;
            color: #dc2626;
            margin: 0;
            letter-spacing: -0.5px;
        }

        .emergency-title p {
            color: #991b1b;
            font-size: 1.2rem;
            margin: 8px 0 0;
            font-weight: 500;
        }

        .alert-banner {
            background: linear-gradient(135deg, #fecaca, #fca5a5);
            border-left: 6px solid #ef4444;
            padding: 25px 30px;
            border-radius: 16px;
            margin: 35px 0;
            position: relative;
            z-index: 1;
            animation: alertShake 4s infinite;
        }

        .alert-content {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .alert-icon {
            font-size: 2.2rem;
            color: #dc2626;
            animation: spin 3s linear infinite;
        }

        .alert-text {
            flex: 1;
        }

        .alert-text h4 {
            font-size: 1.5rem;
            font-weight: 800;
            color: #991b1b;
            margin-bottom: 8px;
        }

        .alert-text p {
            color: #7f1d1d;
            font-size: 16px;
            line-height: 1.6;
            margin: 0;
        }

        .emergency-text {
            font-size: 17px;
            color: #7f1d1d;
            line-height: 1.9;
            margin-bottom: 35px;
            position: relative;
            z-index: 1;
            font-weight: 500;
            padding-left: 25px;
            border-left: 4px solid #fca5a5;
        }

        .emergency-scenarios {
            position: relative;
            z-index: 1;
            margin: 40px 0;
        }

        .scenario-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 25px;
            margin-top: 25px;
        }

        .scenario-card {
            background: white;
            border-radius: 16px;
            padding: 25px;
            border: 2px solid #fecaca;
            transition: all 0.3s ease;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.05);
        }

        .scenario-card:hover {
            transform: translateY(-8px);
            border-color: #ef4444;
            box-shadow: 0 15px 35px rgba(239, 68, 68, 0.15);
        }

        .scenario-icon {
            width: 60px;
            height: 60px;
            border-radius: 14px;
            background: linear-gradient(135deg, #fee2e2, #fecaca);
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 20px;
            color: #dc2626;
            font-size: 1.6rem;
        }

        .scenario-card h4 {
            font-size: 1.25rem;
            font-weight: 700;
            color: #991b1b;
            margin-bottom: 12px;
        }

        .scenario-card p {
            color: #7f1d1d;
            font-size: 15px;
            line-height: 1.6;
            margin: 0;
        }

        .response-time {
            background: white;
            border-radius: 16px;
            padding: 25px;
            margin: 40px 0;
            border: 2px solid #fecaca;
            position: relative;
            z-index: 1;
            text-align: center;
        }

        .time-badge {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            background: linear-gradient(135deg, #ef4444, #dc2626);
            color: white;
            padding: 12px 30px;
            border-radius: 50px;
            font-weight: 800;
            font-size: 1.5rem;
            margin-bottom: 15px;
            box-shadow: 0 8px 20px rgba(239, 68, 68, 0.4);
        }

        .response-time p {
            color: #7f1d1d;
            font-size: 16px;
            margin: 0;
        }

        .emergency-actions {
            display: flex;
            justify-content: center;
            gap: 25px;
            flex-wrap: wrap;
            margin: 50px 0 30px;
            position: relative;
            z-index: 1;
        }

        .call-btn {
            display: inline-flex;
            align-items: center;
            gap: 15px;
            background: linear-gradient(135deg, #ef4444, #dc2626);
            color: white;
            padding: 20px 45px;
            border-radius: 18px;
            text-decoration: none;
            font-weight: 800;
            font-size: 1.4rem;
            transition: all 0.3s ease;
            box-shadow: 0 15px 35px rgba(239, 68, 68, 0.4);
            min-width: 300px;
            justify-content: center;
            text-align: center;
        }

        .call-btn:hover {
            transform: translateY(-8px) scale(1.05);
            box-shadow: 0 25px 50px rgba(239, 68, 68, 0.6);
            color: white;
        }

        .call-btn i {
            animation: ring 1.5s infinite;
        }

        .secondary-actions {
            display: flex;
            gap: 15px;
            flex-wrap: wrap;
            justify-content: center;
            margin-top: 20px;
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

        .chat-btn {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 15px 35px;
            border-radius: 14px;
            font-weight: 600;
            background: linear-gradient(135deg, #3b82f6, #2563eb);
            border: none;
            color: white;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .chat-btn:hover {
            transform: translateY(-4px);
            box-shadow: 0 15px 30px rgba(37, 99, 235, 0.4);
            color: white;
        }

        .emergency-footer {
            margin-top: 50px;
            padding-top: 25px;
            border-top: 2px solid #fecaca;
            position: relative;
            z-index: 1;
            text-align: center;
        }

        .emergency-footer p {
            color: #7f1d1d;
            font-size: 15px;
            margin-bottom: 10px;
        }

        .non-emergency {
            color: #4b5563;
            font-size: 14.5px;
            margin-top: 25px;
            padding: 20px;
            background: #f9fafb;
            border-radius: 12px;
            border: 1px solid #e5e7eb;
        }

        @keyframes emergencyPulse {
            0% {
                box-shadow: 0 25px 60px rgba(239, 68, 68, 0.25);
            }
            100% {
                box-shadow: 0 25px 60px rgba(239, 68, 68, 0.35);
            }
        }

        @keyframes flash {
            0% {
                box-shadow: 0 12px 30px rgba(239, 68, 68, 0.4);
            }
            100% {
                box-shadow: 0 12px 40px rgba(239, 68, 68, 0.8);
            }
        }

        @keyframes alertShake {
            0%, 100% {
                transform: translateX(0);
            }
            1%, 99% {
                transform: translateX(-1px);
            }
            2%, 98% {
                transform: translateX(1px);
            }
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }
            100% {
                transform: rotate(360deg);
            }
        }

        @keyframes ring {
            0%, 100% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.2);
            }
        }

        @media (max-width: 768px) {
            .emergency-card {
                padding: 35px 25px;
            }
            
            .emergency-header {
                flex-direction: column;
                text-align: center;
                gap: 15px;
            }
            
            .emergency-icon {
                width: 70px;
                height: 70px;
                font-size: 2rem;
            }
            
            .emergency-title h1 {
                font-size: 2.2rem;
            }
            
            .alert-content {
                flex-direction: column;
                text-align: center;
                gap: 15px;
            }
            
            .scenario-grid {
                grid-template-columns: 1fr;
            }
            
            .emergency-actions {
                flex-direction: column;
                align-items: stretch;
            }
            
            .call-btn, .back-btn, .chat-btn {
                width: 100%;
                justify-content: center;
                min-width: auto;
            }
            
            .secondary-actions {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
    @extends('dashboard.adminrole')
    @section('content')
    <div class="container py-5">
        <div class="emergency-wrapper">
            <div class="emergency-card">
                <div class="emergency-header">
                    <div class="emergency-icon">
                        <i class="fas fa-exclamation-triangle"></i>
                    </div>
                    <div class="emergency-title">
                        <h1>EMERGENCY SUPPORT</h1>
                        <p>Critical Response Team • Immediate Assistance</p>
                    </div>
                </div>

                <div class="alert-banner">
                    <div class="alert-content">
                        <div class="alert-icon">
                            <i class="fas fa-bell"></i>
                        </div>
                        <div class="alert-text">
                            <h4>⚠️ URGENT ATTENTION REQUIRED</h4>
                            <p>This page is for <strong>CRITICAL SYSTEM FAILURES ONLY</strong>. For non-urgent issues, please use regular support channels to avoid overwhelming emergency services.</p>
                        </div>
                    </div>
                </div>

                <p class="emergency-text">
                    Emergency support is reserved exclusively for <strong>critical system failures, security breaches, 
                    or service outages</strong> that require immediate attention and could result in significant 
                    business impact, data loss, or security vulnerabilities. Our emergency team is on standby 24/7.
                </p>

                <div class="emergency-scenarios">
                    <h3 style="color: #991b1b; font-weight: 800; font-size: 1.8rem; margin-bottom: 25px;">
                        <i class="fas fa-list-check me-2"></i>
                        Emergency Scenarios
                    </h3>
                    
                    <div class="scenario-grid">
                        <div class="scenario-card">
                            <div class="scenario-icon">
                                <i class="fas fa-server"></i>
                            </div>
                            <h4>System Downtime</h4>
                            <p>Complete or partial system unavailability affecting all users or critical functions.</p>
                        </div>
                        
                        <div class="scenario-card">
                            <div class="scenario-icon">
                                <i class="fas fa-shield-alt"></i>
                            </div>
                            <h4>Security Incidents</h4>
                            <p>Suspected breaches, unauthorized access, or data exfiltration attempts.</p>
                        </div>
                        
                        <div class="scenario-card">
                            <div class="scenario-icon">
                                <i class="fas fa-database"></i>
                            </div>
                            <h4>Data Loss/Corruption</h4>
                            <p>Critical data loss, corruption, or integrity issues affecting business operations.</p>
                        </div>
                        
                        <div class="scenario-card">
                            <div class="scenario-icon">
                                <i class="fas fa-credit-card"></i>
                            </div>
                            <h4>Payment Failures</h4>
                            <p>Transaction failures, payment processing issues, or financial data discrepancies.</p>
                        </div>
                    </div>
                </div>

                <div class="response-time">
                    <div class="time-badge">
                        <i class="fas fa-clock"></i>
                        IMMEDIATE RESPONSE
                    </div>
                    <p>Our emergency team is trained to respond within <strong>5 minutes</strong> of receiving your call</p>
                </div>

                <div class="emergency-actions">
                    <a href="tel:+1-800-EMERGENCY" class="call-btn" onclick="confirmEmergencyCall()">
                        <i class="fas fa-phone-alt"></i>
                        📞 CALL EMERGENCY LINE: +1-800-EMERGENCY
                    </a>
                </div>

                <div class="secondary-actions">
                    <a href="{{ url()->previous() }}" class="btn btn-outline-secondary back-btn">
                        <i class="fas fa-arrow-left"></i> Return to Dashboard
                    </a>
                    <a href="#" class="chat-btn" onclick="startEmergencyChat()">
                        <i class="fas fa-comment-medical"></i> Emergency Chat Support
                    </a>
                </div>

                <div class="emergency-footer">
                    <p><strong>Emergency Support Hours:</strong> 24 hours a day, 7 days a week, including holidays</p>
                    <p><strong>Average Response Time:</strong> Under 5 minutes for critical issues</p>
                    
                    <div class="non-emergency">
                        <i class="fas fa-info-circle me-2" style="color: #6b7280;"></i>
                        For non-emergency issues, please contact our regular support team at 
                        <strong>support@adminportal.com</strong> or call <strong>+1-800-SUPPORT</strong>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function confirmEmergencyCall() {
            const emergencyNumber = '+1-800-EMERGENCY';
            const confirmMessage = `⚠️ EMERGENCY CONFIRMATION ⚠️\n\n` +
                `Are you experiencing a CRITICAL system failure?\n\n` +
                `Emergency support is reserved for:\n` +
                `• Complete system downtime\n` +
                `• Security breaches\n` +
                `• Critical data loss\n` +
                `• Payment processing failures\n\n` +
                `Call ${emergencyNumber} now?`;
            
            if (confirm(confirmMessage)) {
                
                trackEmergencyCall();
                
                
                window.location.href = `tel:${emergencyNumber}`;
            } else {
                alert('Emergency call cancelled. Please use regular support channels for non-critical issues.');
            }
        }

        function trackEmergencyCall() {
            
            console.log('Emergency call initiated - tracking for response team');
            
           
        }

        function startEmergencyChat() {
            const confirmChat = confirm('Start emergency chat support? A specialist will join immediately.');
            
            if (confirmChat) {
               
                alert('Connecting you with an emergency support specialist...');
                
                
                setTimeout(() => {
                    alert('Emergency support specialist has joined the chat.');
                }, 1000);
            }
        }

       
        const emergencyIcon = document.querySelector('.emergency-icon');
        setInterval(() => {
            emergencyIcon.style.transform = emergencyIcon.style.transform === 'scale(1.1)' ? 'scale(1)' : 'scale(1.1)';
        }, 1000);
    </script>
    @endsection
</body>
</html>