<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Assistance</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <style>
        .email-wrapper {
            max-width: 1100px;
            margin: auto;
            padding: 20px;
        }

        .email-card {
            background: linear-gradient(135deg, #ffffff 0%, #f5f3ff 100%);
            border-radius: 28px;
            padding: 55px 60px;
            box-shadow: 0 22px 50px rgba(99, 102, 241, 0.2);
            animation: fadeSlide 0.8s ease-out;
            position: relative;
            overflow: hidden;
            border: 2px solid rgba(99, 102, 241, 0.25);
        }

        .email-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            height: 8px;
            width: 100%;
            background: linear-gradient(90deg, #6366f1, #818cf8, #a5b4fc);
        }

        .email-card::after {
            content: '';
            position: absolute;
            top: -30%;
            right: -30%;
            width: 400px;
            height: 400px;
            background: radial-gradient(circle, rgba(99, 102, 241, 0.12) 0%, transparent 70%);
            z-index: 0;
        }

        .email-header {
            display: flex;
            align-items: center;
            gap: 20px;
            margin-bottom: 30px;
            position: relative;
            z-index: 1;
        }

        .email-icon {
            background: linear-gradient(135deg, #6366f1, #4f46e5);
            color: white;
            width: 90px;
            height: 90px;
            border-radius: 22px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2.5rem;
            box-shadow: 0 12px 30px rgba(99, 102, 241, 0.4);
            animation: envelopeFloat 3s infinite ease-in-out;
        }

        .email-title {
            flex: 1;
        }

        .email-title h1 {
            font-size: 2.8rem;
            font-weight: 900;
            color: #312e81;
            margin: 0;
            letter-spacing: -0.5px;
        }

        .email-title p {
            color: #4f46e5;
            font-size: 1.2rem;
            margin: 8px 0 0;
            font-weight: 500;
        }

        .availability-banner {
            background: linear-gradient(135deg, #eef2ff, #e0e7ff);
            padding: 25px 30px;
            border-radius: 18px;
            margin: 35px 0;
            border: 2px solid #c7d2fe;
            position: relative;
            z-index: 1;
            display: flex;
            align-items: center;
            gap: 20px;
            box-shadow: 0 10px 25px rgba(99, 102, 241, 0.15);
        }

        .availability-icon {
            font-size: 2.5rem;
            color: #6366f1;
            animation: bounce 2s infinite;
        }

        .availability-text {
            flex: 1;
        }

        .availability-text h4 {
            font-size: 1.5rem;
            font-weight: 800;
            color: #312e81;
            margin-bottom: 8px;
        }

        .availability-text p {
            color: #4f46e5;
            font-size: 16px;
            line-height: 1.6;
            margin: 0;
        }

        .email-addresses-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
            gap: 25px;
            margin: 40px 0;
            position: relative;
            z-index: 1;
        }

        .address-card {
            background: white;
            border-radius: 18px;
            padding: 30px;
            border: 2px solid #e0e7ff;
            transition: all 0.4s ease;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.05);
        }

        .address-card:hover {
            transform: translateY(-10px);
            border-color: #6366f1;
            box-shadow: 0 15px 35px rgba(99, 102, 241, 0.15);
        }

        .address-icon {
            width: 70px;
            height: 70px;
            border-radius: 16px;
            background: linear-gradient(135deg, #eef2ff, #e0e7ff);
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 25px;
            color: #6366f1;
            font-size: 1.8rem;
        }

        .address-title {
            font-size: 1.3rem;
            font-weight: 700;
            color: #312e81;
            margin-bottom: 15px;
        }

        .email-address {
            font-size: 1.6rem;
            font-weight: 800;
            color: #6366f1;
            margin-bottom: 20px;
            word-break: break-all;
        }

        .address-desc {
            color: #4b5563;
            font-size: 15.5px;
            line-height: 1.6;
            margin: 0 0 25px;
        }

        .email-btn-small {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            background: #6366f1;
            color: white;
            padding: 12px 25px;
            border-radius: 12px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .email-btn-small:hover {
            background: #4f46e5;
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(99, 102, 241, 0.3);
        }

        .response-time-card {
            background: white;
            border-radius: 18px;
            padding: 30px;
            margin: 40px 0;
            border: 2px solid #e0e7ff;
            position: relative;
            z-index: 1;
        }

        .time-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 25px;
            margin-top: 25px;
        }

        .time-item {
            text-align: center;
            padding: 25px;
            border-radius: 14px;
            background: #f8fafc;
            border: 1px solid #e5e7eb;
        }

        .time-value {
            font-size: 2.2rem;
            font-weight: 800;
            color: #6366f1;
            margin-bottom: 8px;
            line-height: 1;
        }

        .time-label {
            color: #4b5563;
            font-weight: 600;
            font-size: 1.1rem;
        }

        .email-template {
            background: white;
            border-radius: 18px;
            padding: 30px;
            margin: 50px 0;
            border: 2px solid #e0e7ff;
            position: relative;
            z-index: 1;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.05);
        }

        .template-title {
            font-size: 1.6rem;
            font-weight: 700;
            color: #312e81;
            margin-bottom: 25px;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .template-title i {
            color: #6366f1;
        }

        .template-content {
            background: #f8fafc;
            border-radius: 12px;
            padding: 25px;
            border: 1px solid #e5e7eb;
            font-family: 'Courier New', monospace;
            font-size: 15px;
            line-height: 1.8;
            color: #374151;
            white-space: pre-wrap;
            margin-bottom: 25px;
        }

        .template-tip {
            background: #eef2ff;
            padding: 20px;
            border-radius: 12px;
            margin-top: 20px;
            border-left: 4px solid #6366f1;
            font-size: 15px;
            color: #4b5563;
        }

        .what-to-include {
            background: linear-gradient(135deg, #eef2ff, #e0e7ff);
            border-radius: 20px;
            padding: 35px 40px;
            margin: 50px 0;
            position: relative;
            z-index: 1;
            border: 2px solid #c7d2fe;
        }

        .include-title {
            font-size: 1.8rem;
            font-weight: 800;
            color: #312e81;
            margin-bottom: 25px;
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .include-title i {
            color: #6366f1;
        }

        .include-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 25px;
        }

        .include-item {
            background: white;
            border-radius: 14px;
            padding: 25px;
            text-align: center;
            border: 1px solid #e0e7ff;
            transition: all 0.3s ease;
        }

        .include-item:hover {
            transform: translateY(-5px);
            border-color: #6366f1;
            box-shadow: 0 10px 25px rgba(99, 102, 241, 0.1);
        }

        .include-icon {
            width: 60px;
            height: 60px;
            border-radius: 12px;
            background: linear-gradient(135deg, #eef2ff, #e0e7ff);
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            color: #6366f1;
            font-size: 1.5rem;
        }

        .include-text {
            font-size: 15.5px;
            color: #4b5563;
            line-height: 1.6;
            margin: 0;
        }

        .action-section {
            text-align: center;
            margin: 50px 0 30px;
            position: relative;
            z-index: 1;
        }

        .email-btn-large {
            display: inline-flex;
            align-items: center;
            gap: 15px;
            background: linear-gradient(135deg, #6366f1, #4f46e5);
            color: white;
            padding: 20px 45px;
            border-radius: 18px;
            text-decoration: none;
            font-weight: 800;
            font-size: 1.4rem;
            transition: all 0.3s ease;
            box-shadow: 0 15px 35px rgba(99, 102, 241, 0.4);
            min-width: 300px;
            justify-content: center;
        }

        .email-btn-large:hover {
            transform: translateY(-8px) scale(1.05);
            box-shadow: 0 25px 50px rgba(99, 102, 241, 0.6);
            color: white;
        }

        .email-btn-large i {
            animation: sendPulse 2s infinite;
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

        .urgent-note {
            background: #fef2f2;
            border-radius: 16px;
            padding: 20px;
            margin-top: 30px;
            border: 2px solid #fecaca;
            position: relative;
            z-index: 1;
        }

        .urgent-note p {
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

        @keyframes envelopeFloat {
            0%, 100% {
                transform: translateY(0) rotate(0deg);
            }
            50% {
                transform: translateY(-15px) rotate(5deg);
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

        @keyframes sendPulse {
            0% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.2);
            }
            100% {
                transform: scale(1);
            }
        }

        @media (max-width: 768px) {
            .email-card {
                padding: 35px 25px;
            }
            
            .email-header {
                flex-direction: column;
                text-align: center;
                gap: 15px;
            }
            
            .email-icon {
                width: 70px;
                height: 70px;
                font-size: 2rem;
            }
            
            .email-title h1 {
                font-size: 2.2rem;
            }
            
            .availability-banner {
                flex-direction: column;
                text-align: center;
                gap: 15px;
            }
            
            .email-addresses-grid {
                grid-template-columns: 1fr;
            }
            
            .time-grid {
                grid-template-columns: 1fr;
            }
            
            .include-grid {
                grid-template-columns: 1fr;
            }
            
            .email-btn-large {
                width: 100%;
                min-width: auto;
            }
            
            .action-buttons {
                flex-direction: column;
                align-items: stretch;
            }
        }

        .copy-btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: rgba(99, 102, 241, 0.1);
            color: #6366f1;
            padding: 8px 16px;
            border-radius: 8px;
            font-weight: 600;
            font-size: 14px;
            border: 1px solid rgba(99, 102, 241, 0.3);
            cursor: pointer;
            transition: all 0.3s ease;
            margin-left: 15px;
        }

        .copy-btn:hover {
            background: rgba(99, 102, 241, 0.2);
        }

        .copy-btn.copied {
            background: #10b981;
            color: white;
            border-color: #10b981;
        }
    </style>
</head>
<body>
    @extends('dashboard.adminrole')
    @section('content')
    <div class="container py-5">
        <div class="email-wrapper">
            <div class="email-card">
                <div class="email-header">
                    <div class="email-icon">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <div class="email-title">
                        <h1>Email Assistance</h1>
                        <p>Detailed Support • Attachments • Comprehensive Solutions</p>
                    </div>
                </div>

                <div class="availability-banner">
                    <div class="availability-icon">
                        <i class="fas fa-clock"></i>
                    </div>
                    <div class="availability-text">
                        <h4>📧 24/7 Email Monitoring</h4>
                        <p>Our support team monitors emails around the clock. Average response time <strong>within 2 hours</strong> for detailed, comprehensive solutions.</p>
                    </div>
                </div>

                <div class="email-addresses-grid">
                    <div class="address-card">
                        <div class="address-icon">
                            <i class="fas fa-headset"></i>
                        </div>
                        <h3 class="address-title">Technical Support</h3>
                        <div class="email-address">support@adminportal.com</div>
                        <button class="copy-btn" onclick="copyEmail('support@adminportal.com')">
                            <i class="fas fa-copy"></i> Copy
                        </button>
                        <p class="address-desc">For technical issues, system errors, account access problems, and general platform assistance.</p>
                        <a href="{{ route('dashbooard.compose-email') }}" class="email-btn-small">
                            <i class="fas fa-paper-plane"></i> Compose Email
                        </a>
                    </div>
                    
                    <div class="address-card">
                        <div class="address-icon">
                            <i class="fas fa-credit-card"></i>
                        </div>
                        <h3 class="address-title">Billing Department</h3>
                        <div class="email-address">billing@adminportal.com</div>
                        <button class="copy-btn" onclick="copyEmail('billing@adminportal.com')">
                            <i class="fas fa-copy"></i> Copy
                        </button>
                        <p class="address-desc">For billing inquiries, payment issues, subscription upgrades, and account payment-related questions.</p>
                        <a href="{{ route('dashbooard.compose-email') }}" class="email-btn-small">
                            <i class="fas fa-paper-plane"></i> Compose Email
                        </a>
                    </div>
                    
                    <div class="address-card">
                        <div class="address-icon">
                            <i class="fas fa-shield-alt"></i>
                        </div>
                        <h3 class="address-title">Security Team</h3>
                        <div class="email-address">security@adminportal.com</div>
                        <button class="copy-btn" onclick="copyEmail('security@adminportal.com')">
                            <i class="fas fa-copy"></i> Copy
                        </button>
                        <p class="address-desc">For security concerns, suspicious activities, data privacy inquiries, and vulnerability reports.</p>
                        <a href="{{ route('dashbooard.compose-email') }}" class="email-btn-small">
                            <i class="fas fa-paper-plane"></i> Compose Email
                        </a>
                    </div>
                </div>

                <div class="response-time-card">
                    <h3 style="color: #312e81; font-weight: 700; font-size: 1.6rem; margin-bottom: 25px;">
                        <i class="fas fa-business-time me-2"></i>
                        Response Time Guarantee
                    </h3>
                    <div class="time-grid">
                        <div class="time-item">
                            <div class="time-value">2 hrs</div>
                            <div class="time-label">Initial Response</div>
                        </div>
                        <div class="time-item">
                            <div class="time-value">8 hrs</div>
                            <div class="time-label">Solution Provided</div>
                        </div>
                        <div class="time-item">
                            <div class="time-value">24/7</div>
                            <div class="time-label">Monitoring</div>
                        </div>
                        <div class="time-item">
                            <div class="time-value">98%</div>
                            <div class="time-label">Satisfaction Rate</div>
                        </div>
                    </div>
                </div>

                <div class="what-to-include">
                    <h3 class="include-title">
                        <i class="fas fa-clipboard-list"></i>
                        What to Include in Your Email
                    </h3>
                    <div class="include-grid">
                        <div class="include-item">
                            <div class="include-icon">
                                <i class="fas fa-user"></i>
                            </div>
                            <p class="include-text">Account information and username</p>
                        </div>
                        <div class="include-item">
                            <div class="include-icon">
                                <i class="fas fa-desktop"></i>
                            </div>
                            <p class="include-text">Device and browser details</p>
                        </div>
                        <div class="include-item">
                            <div class="include-icon">
                                <i class="fas fa-exclamation-circle"></i>
                            </div>
                            <p class="include-text">Clear error messages</p>
                        </div>
                        <div class="include-item">
                            <div class="include-icon">
                                <i class="fas fa-history"></i>
                            </div>
                            <p class="include-text">When the issue started</p>
                        </div>
                        <div class="include-item">
                            <div class="include-icon">
                                <i class="fas fa-screenshot"></i>
                            </div>
                            <p class="include-text">Screenshots or screen recordings</p>
                        </div>
                        <div class="include-item">
                            <div class="include-icon">
                                <i class="fas fa-steps"></i>
                            </div>
                            <p class="include-text">Steps to reproduce the issue</p>
                        </div>
                    </div>
                </div>

                <div class="email-template">
                    <h3 class="template-title">
                        <i class="fas fa-file-alt"></i>
                        Email Template for Quick Response
                    </h3>
                    <div class="template-content">
Subject: [Brief Description of Issue] - [Your Account ID]

Dear Support Team,

I'm experiencing an issue with:

- **Account ID/Username:** [Your Account Information]
- **Issue Description:** [Clear description of what's happening]
- **When it started:** [Date and time]
- **Steps to reproduce:** 
  1. [Step one]
  2. [Step two]
  3. [Step three]

- **Error Messages:** [Copy any error messages exactly]
- **Device/Browser:** [e.g., Windows 10, Chrome 120]
- **Already Tried:** [List any troubleshooting steps you've taken]

I've attached relevant screenshots/screen recordings for reference.

Best regards,
[Your Name]
                    </div>
                    <div class="template-tip">
                        <i class="fas fa-lightbulb me-2" style="color: #f59e0b;"></i>
                        <strong>Pro Tip:</strong> Using this template structure helps our team resolve your issue up to 50% faster.
                    </div>
                </div>

                <div class="action-section">
                    <h2 style="color: #312e81; font-weight: 800; font-size: 1.8rem; margin-bottom: 20px;">
                        Ready to Send Your Request?
                    </h2>
                    <p style="color: #4b5563; font-size: 16.5px; margin-bottom: 30px;">
                        Click below to compose an email with our support team.
                    </p>
                    <a href="{{ route('dashbooard.compose-email') }}" class="email-btn-large">
                        <i class="fas fa-envelope-open-text"></i> COMPOSE SUPPORT EMAIL
                    </a>
                </div>

                <div class="urgent-note">
                    <p>
                        <i class="fas fa-exclamation-circle"></i>
                        <strong>Urgent Issues:</strong> For time-critical problems requiring immediate attention, please use our 
                        <a href="{{ route('dashboard.live-chat') }}" style="color: #dc2626; font-weight: 600;">Live Chat</a> or 
                        <a href="{{ route('dashboard.phone-support') }}" style="color: #dc2626; font-weight: 600;">Phone Support</a> instead.
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
        function copyEmail(email) {
            navigator.clipboard.writeText(email).then(() => {
                const button = event.target.closest('.copy-btn');
                const originalText = button.innerHTML;
                const originalClass = button.className;
                
                button.innerHTML = '<i class="fas fa-check"></i> Copied!';
                button.className = 'copy-btn copied';
                
                setTimeout(() => {
                    button.innerHTML = originalText;
                    button.className = originalClass;
                }, 2000);
                
                
                showNotification('Email address copied to clipboard!', 'success');
            }).catch(err => {
                console.error('Failed to copy: ', err);
                showNotification('Failed to copy email address', 'error');
            });
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

       
        document.querySelectorAll('a[href^="mailto:"]').forEach(link => {
            link.addEventListener('click', function(e) {
                const email = this.getAttribute('href').replace('mailto:', '').split('?')[0];
                console.log(`Email initiated to: ${email}`);
                
                
            });
        });

       
        document.querySelectorAll('.address-card').forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-10px)';
            });
            
            card.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0)';
            });
        });

        
        document.querySelectorAll('.include-item').forEach(item => {
            item.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-5px)';
            });
            
            item.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0)';
            });
        });

        
        const mainEmailBtn = document.querySelector('.email-btn-large');
        mainEmailBtn.addEventListener('click', function() {
           
            console.log('Email template used from main button');
        });
    </script>
    @endsection
</body>
</html>