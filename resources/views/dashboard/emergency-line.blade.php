<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Emergency Line</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <style>
        .emergency-wrapper {
            max-width: 800px;
            margin: auto;
            padding: 20px;
        }

        .emergency-card {
            background: linear-gradient(135deg, #fff5f5 0%, #ffffff 100%);
            border-radius: 28px;
            padding: 50px 55px;
            box-shadow: 0 25px 60px rgba(220, 38, 38, 0.3);
            animation: emergencyAlert 0.8s ease-out;
            position: relative;
            overflow: hidden;
            border: 3px solid rgba(220, 38, 38, 0.4);
        }

        .emergency-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            height: 8px;
            width: 100%;
            background: linear-gradient(90deg, #dc2626, #ef4444, #f87171);
        }

        .emergency-card::after {
            content: '';
            position: absolute;
            top: -30%;
            right: -30%;
            width: 400px;
            height: 400px;
            background: radial-gradient(circle, rgba(220, 38, 38, 0.15) 0%, transparent 70%);
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
            background: linear-gradient(135deg, #dc2626, #b91c1c);
            color: white;
            width: 90px;
            height: 90px;
            border-radius: 22px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2.5rem;
            box-shadow: 0 12px 30px rgba(220, 38, 38, 0.5);
            animation: emergencyPulse 2s infinite;
        }

        .emergency-title {
            flex: 1;
        }

        .emergency-title h1 {
            font-size: 2.8rem;
            font-weight: 900;
            color: #991b1b;
            margin: 0;
            letter-spacing: -0.5px;
            text-shadow: 2px 2px 4px rgba(220, 38, 38, 0.1);
        }

        .emergency-title p {
            color: #b91c1c;
            font-size: 1.2rem;
            margin: 8px 0 0;
            font-weight: 600;
        }

        .warning-banner {
            background: linear-gradient(135deg, #fecaca, #fca5a5);
            padding: 25px 30px;
            border-radius: 18px;
            margin: 35px 0;
            border: 3px solid #f87171;
            position: relative;
            z-index: 1;
            animation: warningFlash 4s infinite;
        }

        .warning-content {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .warning-icon {
            font-size: 2.5rem;
            color: #dc2626;
            animation: spin 3s linear infinite;
        }

        .warning-text {
            flex: 1;
        }

        .warning-text h4 {
            font-size: 1.5rem;
            font-weight: 800;
            color: #991b1b;
            margin-bottom: 8px;
        }

        .warning-text p {
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

        .scenarios-title {
            font-size: 1.6rem;
            font-weight: 800;
            color: #991b1b;
            margin-bottom: 25px;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .scenarios-title i {
            color: #dc2626;
        }

        .scenario-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .scenario-item {
            display: flex;
            align-items: flex-start;
            gap: 15px;
            padding: 20px;
            background: white;
            border-radius: 14px;
            margin-bottom: 15px;
            border: 2px solid #fecaca;
            transition: all 0.3s ease;
        }

        .scenario-item:hover {
            border-color: #dc2626;
            box-shadow: 0 8px 25px rgba(220, 38, 38, 0.15);
        }

        .scenario-icon {
            width: 50px;
            height: 50px;
            border-radius: 12px;
            background: linear-gradient(135deg, #fee2e2, #fecaca);
            display: flex;
            align-items: center;
            justify-content: center;
            color: #dc2626;
            font-size: 1.3rem;
            flex-shrink: 0;
        }

        .scenario-content h4 {
            font-size: 1.2rem;
            font-weight: 700;
            color: #991b1b;
            margin-bottom: 8px;
        }

        .scenario-content p {
            color: #7f1d1d;
            font-size: 15.5px;
            line-height: 1.6;
            margin: 0;
        }

        .phone-number-display {
            background: white;
            border-radius: 20px;
            padding: 40px;
            text-align: center;
            margin: 40px 0;
            border: 3px solid #fecaca;
            position: relative;
            z-index: 1;
            box-shadow: 0 15px 35px rgba(220, 38, 38, 0.2);
        }

        .phone-label {
            font-size: 1.3rem;
            font-weight: 700;
            color: #991b1b;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .emergency-number {
            font-size: 3.5rem;
            font-weight: 900;
            color: #dc2626;
            letter-spacing: 2px;
            margin-bottom: 30px;
            text-shadow: 2px 2px 4px rgba(220, 38, 38, 0.2);
        }

        .phone-format {
            color: #991b1b;
            font-size: 1.1rem;
            margin-bottom: 30px;
            font-weight: 600;
        }

        .call-actions {
            display: flex;
            justify-content: center;
            gap: 20px;
            flex-wrap: wrap;
            margin: 30px 0;
            position: relative;
            z-index: 1;
        }

        .emergency-call-btn {
            display: inline-flex;
            align-items: center;
            gap: 15px;
            background: linear-gradient(135deg, #dc2626, #b91c1c);
            color: white;
            padding: 20px 45px;
            border-radius: 18px;
            text-decoration: none;
            font-weight: 800;
            font-size: 1.4rem;
            transition: all 0.3s ease;
            box-shadow: 0 15px 35px rgba(220, 38, 38, 0.5);
            min-width: 300px;
            justify-content: center;
        }

        .emergency-call-btn:hover {
            transform: translateY(-8px) scale(1.05);
            box-shadow: 0 25px 50px rgba(220, 38, 38, 0.7);
            color: white;
        }

        .emergency-call-btn i {
            animation: ringEmergency 1.5s infinite;
        }

        .copy-btn {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            background: rgba(220, 38, 38, 0.1);
            color: #dc2626;
            padding: 15px 35px;
            border-radius: 14px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
            border: 2px solid rgba(220, 38, 38, 0.3);
            cursor: pointer;
        }

        .copy-btn:hover {
            background: rgba(220, 38, 38, 0.2);
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(220, 38, 38, 0.2);
        }

        .copy-btn.copied {
            background: #10b981;
            color: white;
            border-color: #10b981;
        }

        .response-info {
            background: linear-gradient(135deg, #fee2e2, #fecaca);
            border-radius: 18px;
            padding: 25px 30px;
            margin: 40px 0;
            border: 2px solid #f87171;
            position: relative;
            z-index: 1;
            text-align: center;
        }

        .response-time {
            display: inline-flex;
            align-items: center;
            gap: 15px;
            background: #dc2626;
            color: white;
            padding: 12px 30px;
            border-radius: 50px;
            font-weight: 800;
            font-size: 1.5rem;
            margin-bottom: 15px;
            box-shadow: 0 8px 20px rgba(220, 38, 38, 0.4);
        }

        .response-info p {
            color: #7f1d1d;
            font-size: 16px;
            margin: 0;
        }

        .non-emergency {
            background: #f8fafc;
            border-radius: 16px;
            padding: 25px 30px;
            margin: 40px 0;
            border: 2px solid #e5e7eb;
            position: relative;
            z-index: 1;
        }

        .non-emergency h4 {
            font-size: 1.4rem;
            font-weight: 700;
            color: #1f2937;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .non-emergency h4 i {
            color: #2563eb;
        }

        .non-emergency p {
            color: #4b5563;
            font-size: 15.5px;
            line-height: 1.6;
            margin-bottom: 20px;
        }

        .regular-support-link {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            color: #2563eb;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .regular-support-link:hover {
            color: #1d4ed8;
            transform: translateX(5px);
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

        @keyframes emergencyAlert {
            from {
                opacity: 0;
                transform: translateY(30px) scale(0.95);
            }
            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        @keyframes emergencyPulse {
            0% {
                box-shadow: 0 0 0 0 rgba(220, 38, 38, 0.6);
            }
            70% {
                box-shadow: 0 0 0 20px rgba(220, 38, 38, 0);
            }
            100% {
                box-shadow: 0 0 0 0 rgba(220, 38, 38, 0);
            }
        }

        @keyframes warningFlash {
            0%, 100% {
                border-color: #f87171;
            }
            50% {
                border-color: #dc2626;
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

        @keyframes ringEmergency {
            0%, 100% {
                transform: rotate(0deg);
            }
            10%, 30% {
                transform: rotate(20deg);
            }
            20% {
                transform: rotate(-20deg);
            }
            40% {
                transform: rotate(0deg);
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
            
            .warning-content {
                flex-direction: column;
                text-align: center;
                gap: 15px;
            }
            
            .emergency-number {
                font-size: 2.5rem;
                letter-spacing: 1px;
            }
            
            .call-actions {
                flex-direction: column;
                align-items: stretch;
            }
            
            .emergency-call-btn, .copy-btn {
                width: 100%;
                justify-content: center;
                min-width: auto;
            }
        }

        .misuse-warning {
            background: linear-gradient(135deg, #fef3c7, #fde68a);
            border-radius: 16px;
            padding: 20px;
            margin-top: 30px;
            border: 2px solid #f59e0b;
            position: relative;
            z-index: 1;
        }

        .misuse-warning p {
            margin: 0;
            color: #92400e;
            font-size: 15px;
            display: flex;
            align-items: center;
            gap: 10px;
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
                        <h1>EMERGENCY LINE</h1>
                        <p>Critical System Failures • Immediate Response</p>
                    </div>
                </div>

                <div class="warning-banner">
                    <div class="warning-content">
                        <div class="warning-icon">
                            <i class="fas fa-radiation"></i>
                        </div>
                        <div class="warning-text">
                            <h4>⚠️ CRITICAL USE ONLY ⚠️</h4>
                            <p>This emergency line is strictly reserved for system-critical failures requiring immediate attention. Misuse may result in service charges.</p>
                        </div>
                    </div>
                </div>

                <p class="emergency-text">
                    The emergency support line is exclusively for <strong>critical system failures, security breaches, 
                    or complete service outages</strong> that could result in significant business impact, data loss, 
                    or security vulnerabilities. Our specialized emergency team is on standby 24/7 for immediate response.
                </p>

                <div class="emergency-scenarios">
                    <h3 class="scenarios-title">
                        <i class="fas fa-list-check"></i>
                        Emergency Scenarios
                    </h3>
                    
                    <ul class="scenario-list">
                        <li class="scenario-item">
                            <div class="scenario-icon">
                                <i class="fas fa-server"></i>
                            </div>
                            <div class="scenario-content">
                                <h4>Complete System Downtime</h4>
                                <p>When the entire platform or critical functions are completely inaccessible to all users.</p>
                            </div>
                        </li>
                        
                        <li class="scenario-item">
                            <div class="scenario-icon">
                                <i class="fas fa-shield-alt"></i>
                            </div>
                            <div class="scenario-content">
                                <h4>Security Breach or Attack</h4>
                                <p>Active security incidents, unauthorized access, data exfiltration, or malware attacks.</p>
                            </div>
                        </li>
                        
                        <li class="scenario-item">
                            <div class="scenario-icon">
                                <i class="fas fa-database"></i>
                            </div>
                            <div class="scenario-content">
                                <h4>Critical Data Loss/Corruption</h4>
                                <p>Significant data loss, corruption, or integrity issues affecting business operations.</p>
                            </div>
                        </li>
                        
                        <li class="scenario-item">
                            <div class="scenario-icon">
                                <i class="fas fa-credit-card"></i>
                            </div>
                            <div class="scenario-content">
                                <h4>Payment Processing Failures</h4>
                                <p>Complete failure of payment systems affecting financial transactions and revenue.</p>
                            </div>
                        </li>
                    </ul>
                </div>

                <div class="response-info">
                    <div class="response-time">
                        <i class="fas fa-bolt"></i>
                        IMMEDIATE RESPONSE GUARANTEED
                    </div>
                    <p>Our specialized emergency team responds within <strong>5 minutes</strong> of receiving your call</p>
                </div>

                <div class="phone-number-display">
                    <div class="phone-label">
                        <i class="fas fa-phone-alt"></i>
                        EMERGENCY CONTACT NUMBER
                    </div>
                    <div class="emergency-number" id="emergencyNumber">+1 (800) 363-7443</div>
                    <div class="phone-format">
                        International: +1 (555) 987-6543 • 24/7 Availability
                    </div>
                    <div class="call-actions">
                        <a href="tel:+18003637443" class="emergency-call-btn" onclick="confirmEmergencyCall(event)">
                            <i class="fas fa-phone-alt"></i> CALL EMERGENCY LINE
                        </a>
                        <button class="copy-btn" onclick="copyEmergencyNumber()">
                            <i class="fas fa-copy"></i> Copy Number
                        </button>
                    </div>
                </div>

                <div class="misuse-warning">
                    <p>
                        <i class="fas fa-exclamation-circle"></i>
                        <strong>Warning:</strong> This emergency line is monitored 24/7. Misuse for non-emergency issues 
                        may result in additional service charges of up to $500 per incident.
                    </p>
                </div>

                <div class="non-emergency">
                    <h4>
                        <i class="fas fa-info-circle"></i>
                        Not an Emergency?
                    </h4>
                    <p>
                        For non-emergency technical issues, account questions, or general assistance, 
                        please use our regular support channels to avoid overwhelming emergency services.
                    </p>
                    <a href="{{ route('dashboard.general-support') }}" class="regular-support-link">
                        <i class="fas fa-headset"></i> Go to General Support
                    </a>
                </div>

                <div class="text-center mt-5" style="position: relative; z-index: 1;">
                    <a href="{{ route('dashboard.phone-support') }}" class="btn btn-outline-secondary back-btn">
                        <i class="fas fa-arrow-left"></i> Return to Support Options
                    </a>
                </div>
            </div>
        </div>
    </div>

    <script>
        function confirmEmergencyCall(event) {
            event.preventDefault();
            
            const emergencyNumber = '+1-800-363-7443';
            const confirmMessage = `⚠️ EMERGENCY LINE CONFIRMATION ⚠️\n\n` +
                `Are you experiencing a CRITICAL system failure?\n\n` +
                `Emergency support is reserved ONLY for:\n` +
                `• Complete system downtime affecting all users\n` +
                `• Active security breaches or attacks\n` +
                `• Critical data loss or corruption\n` +
                `• Complete payment processing failures\n\n` +
                `Call ${emergencyNumber} now?\n\n` +
                `Misuse for non-emergencies may result in service charges.`;
            
            if (confirm(confirmMessage)) {
               
                trackEmergencyCall();
                
                
                window.location.href = `tel:${emergencyNumber}`;
            } else {
                alert('Emergency call cancelled. Please use regular support channels for non-critical issues.');
            }
        }

        function copyEmergencyNumber() {
            const emergencyNumber = document.getElementById('emergencyNumber').textContent;
            navigator.clipboard.writeText(emergencyNumber.replace(/\s+/g, '')).then(() => {
                const button = event.target.closest('.copy-btn');
                const originalText = button.innerHTML;
                const originalClass = button.className;
                
                button.innerHTML = '<i class="fas fa-check"></i> Copied!';
                button.className = 'copy-btn copied';
                
                setTimeout(() => {
                    button.innerHTML = originalText;
                    button.className = originalClass;
                }, 2000);
                
                showNotification('Emergency number copied to clipboard!', 'success');
            }).catch(err => {
                console.error('Failed to copy: ', err);
                showNotification('Failed to copy emergency number', 'error');
            });
        }

        function trackEmergencyCall() {
            
            console.log('Emergency call initiated - tracking for response team');
            
           
        }

        function showNotification(message, type) {
            
            const notification = document.createElement('div');
            notification.style.cssText = `
                position: fixed;
                top: 20px;
                right: 20px;
                padding: 15px 25px;
                border-radius: 10px;
                color: white;
                font-weight: 600;
                z-index: 10000;
                box-shadow: 0 10px 25px rgba(0,0,0,0.2);
                transform: translateX(120%);
                transition: transform 0.3s ease;
            `;
            
            notification.style.background = type === 'success' ? '#10b981' : '#ef4444';
            notification.textContent = message;
            
            document.body.appendChild(notification);
            
            
            setTimeout(() => {
                notification.style.transform = 'translateX(0)';
            }, 10);
            
           
            setTimeout(() => {
                notification.style.transform = 'translateX(120%)';
                setTimeout(() => {
                    document.body.removeChild(notification);
                }, 300);
            }, 3000);
        }

        
        function playEmergencySound() {
            
        }

       
        const emergencyBtn = document.querySelector('.emergency-call-btn');
        if (emergencyBtn) {
            setInterval(() => {
                emergencyBtn.style.boxShadow = emergencyBtn.style.boxShadow.includes('60px') 
                    ? '0 15px 35px rgba(220, 38, 38, 0.5)'
                    : '0 15px 60px rgba(220, 38, 38, 0.7)';
            }, 1000);
        }

        
        document.querySelectorAll('.scenario-item').forEach(item => {
            item.addEventListener('mouseenter', function() {
                this.style.transform = 'translateX(10px)';
            });
            
            item.addEventListener('mouseleave', function() {
                this.style.transform = 'translateX(0)';
            });
        });

        
        function updateResponseTime() {
            const hours = new Date().getHours();
            const isPeakHours = hours >= 9 && hours <= 17;
            const responseTime = document.querySelector('.response-time');
            
            if (isPeakHours && responseTime) {
                responseTime.innerHTML = '<i class="fas fa-clock"></i> PEAK HOURS: 7 MIN RESPONSE';
                responseTime.style.background = '#f59e0b';
            } else if (responseTime) {
                responseTime.innerHTML = '<i class="fas fa-bolt"></i> IMMEDIATE RESPONSE GUARANTEED';
                responseTime.style.background = '#dc2626';
            }
        }

        
        updateResponseTime();
        setInterval(updateResponseTime, 60000); 
    </script>
    @endsection
</body>
</html>