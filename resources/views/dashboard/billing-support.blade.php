<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Billing Support | Payment & Account Assistance</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <style>
        .billing-wrapper {
            max-width: 1000px;
            margin: auto;
            padding: 20px;
        }

        .billing-card {
            background: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%);
            border-radius: 28px;
            padding: 50px 55px;
            box-shadow: 0 22px 50px rgba(37, 99, 235, 0.2);
            animation: fadeInUp 0.8s ease-out;
            position: relative;
            overflow: hidden;
            border: 2px solid rgba(37, 99, 235, 0.25);
        }

        .billing-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            height: 8px;
            width: 100%;
            background: linear-gradient(90deg, #2563eb, #3b82f6, #60a5fa);
        }

        .billing-card::after {
            content: '';
            position: absolute;
            top: -30%;
            right: -30%;
            width: 400px;
            height: 400px;
            background: radial-gradient(circle, rgba(37, 99, 235, 0.12) 0%, transparent 70%);
            z-index: 0;
        }

        .billing-header {
            display: flex;
            align-items: center;
            gap: 20px;
            margin-bottom: 30px;
            position: relative;
            z-index: 1;
        }

        .billing-icon {
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
            animation: bounce 2s infinite;
        }

        .billing-title {
            flex: 1;
        }

        .billing-title h1 {
            font-size: 2.8rem;
            font-weight: 900;
            color: #1e3a8a;
            margin: 0;
            letter-spacing: -0.5px;
        }

        .billing-title p {
            color: #1e40af;
            font-size: 1.2rem;
            margin: 8px 0 0;
            font-weight: 500;
        }

        .availability-banner {
            background: linear-gradient(135deg, #e0f2fe, #bae6fd);
            padding: 25px 30px;
            border-radius: 18px;
            margin: 35px 0;
            border: 2px solid #7dd3fc;
            position: relative;
            z-index: 1;
            display: flex;
            align-items: center;
            gap: 20px;
            box-shadow: 0 10px 25px rgba(37, 99, 235, 0.15);
        }

        .availability-icon {
            font-size: 2.5rem;
            color: #0284c7;
            animation: pulse 2s infinite;
        }

        .availability-text {
            flex: 1;
        }

        .availability-text h4 {
            font-size: 1.5rem;
            font-weight: 800;
            color: #0369a1;
            margin-bottom: 8px;
        }

        .availability-text p {
            color: #0c4a6e;
            font-size: 16px;
            line-height: 1.6;
            margin: 0;
        }

        .phone-number-display {
            background: white;
            border-radius: 20px;
            padding: 40px;
            text-align: center;
            margin: 40px 0;
            border: 2px solid #bae6fd;
            position: relative;
            z-index: 1;
            box-shadow: 0 15px 35px rgba(37, 99, 235, 0.1);
        }

        .phone-label {
            font-size: 1.3rem;
            font-weight: 700;
            color: #0369a1;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .billing-number {
            font-size: 3.5rem;
            font-weight: 900;
            color: #2563eb;
            letter-spacing: 2px;
            margin-bottom: 30px;
            text-shadow: 2px 2px 4px rgba(37, 99, 235, 0.2);
        }

        .phone-format {
            color: #6b7280;
            font-size: 1.1rem;
            margin-bottom: 30px;
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

        .billing-call-btn {
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

        .billing-call-btn:hover {
            transform: translateY(-8px) scale(1.05);
            box-shadow: 0 25px 50px rgba(37, 99, 235, 0.6);
            color: white;
        }

        .billing-call-btn i {
            animation: ring 1.5s infinite;
        }

        .copy-btn {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            background: rgba(37, 99, 235, 0.1);
            color: #2563eb;
            padding: 15px 35px;
            border-radius: 14px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
            border: 2px solid rgba(37, 99, 235, 0.3);
            cursor: pointer;
        }

        .copy-btn:hover {
            background: rgba(37, 99, 235, 0.2);
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(37, 99, 235, 0.2);
        }

        .copy-btn.copied {
            background: #10b981;
            color: white;
            border-color: #10b981;
        }

        .billing-areas {
            position: relative;
            z-index: 1;
            margin: 50px 0;
        }

        .areas-title {
            font-size: 1.8rem;
            font-weight: 800;
            color: #1e3a8a;
            margin-bottom: 30px;
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .areas-title i {
            color: #2563eb;
        }

        .areas-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 25px;
        }

        .area-card {
            background: white;
            border-radius: 16px;
            padding: 30px;
            border: 2px solid #dbeafe;
            transition: all 0.4s ease;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.05);
        }

        .area-card:hover {
            transform: translateY(-10px);
            border-color: #2563eb;
            box-shadow: 0 15px 35px rgba(37, 99, 235, 0.15);
        }

        .area-icon {
            width: 70px;
            height: 70px;
            border-radius: 16px;
            background: linear-gradient(135deg, #eff6ff, #dbeafe);
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 25px;
            color: #2563eb;
            font-size: 1.8rem;
        }

        .area-title {
            font-size: 1.3rem;
            font-weight: 700;
            color: #1e3a8a;
            margin-bottom: 15px;
        }

        .area-desc {
            color: #4b5563;
            font-size: 15.5px;
            line-height: 1.6;
            margin: 0;
        }

        .business-hours {
            background: linear-gradient(135deg, #f0f9ff, #e0f2fe);
            border-radius: 20px;
            padding: 35px 40px;
            margin: 50px 0;
            position: relative;
            z-index: 1;
            border: 2px solid #7dd3fc;
        }

        .hours-title {
            font-size: 1.8rem;
            font-weight: 800;
            color: #0369a1;
            margin-bottom: 25px;
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .hours-title i {
            color: #0284c7;
        }

        .hours-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 25px;
        }

        .hours-item {
            background: white;
            border-radius: 14px;
            padding: 25px;
            text-align: center;
            border: 1px solid #bae6fd;
            transition: all 0.3s ease;
        }

        .hours-item:hover {
            transform: translateY(-5px);
            border-color: #0284c7;
            box-shadow: 0 10px 25px rgba(2, 132, 199, 0.1);
        }

        .hours-day {
            font-size: 1.5rem;
            font-weight: 700;
            color: #0369a1;
            margin-bottom: 10px;
        }

        .hours-time {
            font-size: 1.8rem;
            font-weight: 800;
            color: #2563eb;
            margin-bottom: 10px;
        }

        .hours-note {
            font-size: 14px;
            color: #6b7280;
            margin: 0;
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

        .alternative-support {
            background: linear-gradient(135deg, #eff6ff, #dbeafe);
            border-radius: 20px;
            padding: 35px 40px;
            margin: 50px 0;
            position: relative;
            z-index: 1;
            border: 2px solid #93c5fd;
        }

        .alternative-title {
            font-size: 1.8rem;
            font-weight: 800;
            color: #1e3a8a;
            margin-bottom: 25px;
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .alternative-title i {
            color: #2563eb;
        }

        .alternative-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 25px;
        }

        .alt-option {
            display: flex;
            align-items: center;
            gap: 20px;
            padding: 20px;
            background: white;
            border-radius: 14px;
            transition: all 0.3s ease;
            border: 1px solid #dbeafe;
            text-decoration: none;
            color: inherit;
        }

        .alt-option:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(37, 99, 235, 0.15);
            border-color: #2563eb;
        }

        .alt-icon {
            width: 60px;
            height: 60px;
            border-radius: 12px;
            background: linear-gradient(135deg, #eff6ff, #dbeafe);
            display: flex;
            align-items: center;
            justify-content: center;
            color: #2563eb;
            font-size: 1.5rem;
            flex-shrink: 0;
        }

        .alt-text h4 {
            font-size: 1.2rem;
            font-weight: 700;
            color: #1e3a8a;
            margin-bottom: 5px;
        }

        .alt-text p {
            color: #6b7280;
            font-size: 14.5px;
            margin: 0;
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

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
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
            .billing-card {
                padding: 35px 25px;
            }
            
            .billing-header {
                flex-direction: column;
                text-align: center;
                gap: 15px;
            }
            
            .billing-icon {
                width: 70px;
                height: 70px;
                font-size: 2rem;
            }
            
            .billing-title h1 {
                font-size: 2.2rem;
            }
            
            .availability-banner {
                flex-direction: column;
                text-align: center;
                gap: 15px;
            }
            
            .billing-number {
                font-size: 2.5rem;
                letter-spacing: 1px;
            }
            
            .call-actions {
                flex-direction: column;
                align-items: stretch;
            }
            
            .billing-call-btn, .copy-btn {
                width: 100%;
                justify-content: center;
                min-width: auto;
            }
            
            .areas-grid, .hours-grid, .alternative-grid {
                grid-template-columns: 1fr;
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

        .holiday-notice {
            background: #fef3c7;
            border-radius: 16px;
            padding: 20px;
            margin-top: 30px;
            border: 2px solid #fbbf24;
            position: relative;
            z-index: 1;
        }

        .holiday-notice p {
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
        <div class="billing-wrapper">
            <div class="billing-card">
                <div class="billing-header">
                    <div class="billing-icon">
                        <i class="fas fa-credit-card"></i>
                    </div>
                    <div class="billing-title">
                        <h1>Billing Support</h1>
                        <p>Payment Assistance • Invoice Management • Account Billing</p>
                    </div>
                </div>

                <div class="availability-banner">
                    <div class="availability-icon">
                        <i class="fas fa-clock"></i>
                    </div>
                    <div class="availability-text">
                        <h4>📞 Dedicated Billing Support</h4>
                        <p>Our specialized billing team is available Monday through Friday, 8:00 AM to 8:00 PM EST to handle all payment and account billing matters.</p>
                    </div>
                </div>

                <div class="phone-number-display">
                    <div class="phone-label">
                        <i class="fas fa-phone-alt"></i>
                        Primary Billing Number
                    </div>
                    <div class="billing-number" id="billingNumber">+1 (800) 245-3663</div>
                    <div class="phone-format">
                        International: +1 (555) 789-0123 • Toll-Free within US & Canada
                    </div>
                    <div class="call-actions">
                        <a href="tel:+18002453663" class="billing-call-btn" onclick="trackCall('billing')">
                            <i class="fas fa-phone-alt"></i> CALL BILLING SUPPORT
                        </a>
                        <button class="copy-btn" onclick="copyBillingNumber()">
                            <i class="fas fa-copy"></i> Copy Number
                        </button>
                    </div>
                </div>

                <div class="business-hours">
                    <h3 class="hours-title">
                        <i class="fas fa-calendar-alt"></i>
                        Business Hours & Availability
                    </h3>
                    <div class="hours-grid">
                        <div class="hours-item">
                            <div class="hours-day">Monday - Friday</div>
                            <div class="hours-time">8:00 AM - 8:00 PM</div>
                            <p class="hours-note">Eastern Standard Time</p>
                        </div>
                        
                        <div class="hours-item">
                            <div class="hours-day">Saturday</div>
                            <div class="hours-time">9:00 AM - 5:00 PM</div>
                            <p class="hours-note">Limited Support</p>
                        </div>
                        
                        <div class="hours-item">
                            <div class="hours-day">Sunday</div>
                            <div class="hours-time">Closed</div>
                            <p class="hours-note">Emergency Only</p>
                        </div>
                        
                        <div class="hours-item">
                            <div class="hours-day">Holidays</div>
                            <div class="hours-time">Closed</div>
                            <p class="hours-note">See holiday schedule</p>
                        </div>
                    </div>
                    
                    <div class="holiday-notice">
                        <p>
                            <i class="fas fa-calendar-star"></i>
                            <strong>Holiday Notice:</strong> Our billing department will be closed on major US holidays. 
                            Emergency billing issues can be reported via email during these periods.
                        </p>
                    </div>
                </div>

                <div class="billing-areas">
                    <h3 class="areas-title">
                        <i class="fas fa-list-check"></i>
                        Areas We Can Help With
                    </h3>
                    <div class="areas-grid">
                        <div class="area-card">
                            <div class="area-icon">
                                <i class="fas fa-file-invoice-dollar"></i>
                            </div>
                            <h4 class="area-title">Invoice & Billing</h4>
                            <p class="area-desc">Invoice requests, billing statements, payment history, and billing discrepancies.</p>
                        </div>
                        
                        <div class="area-card">
                            <div class="area-icon">
                                <i class="fas fa-credit-card"></i>
                            </div>
                            <h4 class="area-title">Payment Processing</h4>
                            <p class="area-desc">Payment issues, declined transactions, refund requests, and payment methods.</p>
                        </div>
                        
                        <div class="area-card">
                            <div class="area-icon">
                                <i class="fas fa-chart-line"></i>
                            </div>
                            <h4 class="area-title">Subscription Management</h4>
                            <p class="area-desc">Plan upgrades/downgrades, subscription changes, and renewal questions.</p>
                        </div>
                        
                        <div class="area-card">
                            <div class="area-icon">
                                <i class="fas fa-user-tag"></i>
                            </div>
                            <h4 class="area-title">Account Credits & Discounts</h4>
                            <p class="area-desc">Promotional credits, discount applications, and special pricing inquiries.</p>
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
                                <i class="fas fa-receipt"></i>
                            </div>
                            <div class="tip-text">
                                <strong>Have your invoice number ready</strong> - This helps us quickly locate your account and payment details.
                            </div>
                        </li>
                        <li>
                            <div class="tip-icon">
                                <i class="fas fa-credit-card"></i>
                            </div>
                            <div class="tip-text">
                                <strong>Payment method details</strong> - Last 4 digits of your card, payment date, and amount if applicable.
                            </div>
                        </li>
                        <li>
                            <div class="tip-icon">
                                <i class="fas fa-user-circle"></i>
                            </div>
                            <div class="tip-text">
                                <strong>Account verification information</strong> - Account ID, registered email, and billing address.
                            </div>
                        </li>
                        <li>
                            <div class="tip-icon">
                                <i class="fas fa-envelope-open"></i>
                            </div>
                            <div class="tip-text">
                                <strong>Any relevant correspondence</strong> - Email confirmations, error messages, or reference numbers.
                            </div>
                        </li>
                    </ul>
                </div>

                <div class="alternative-support">
                    <h3 class="alternative-title">
                        <i class="fas fa-comments"></i>
                        Alternative Support Channels
                    </h3>
                    <div class="alternative-grid">
                        <a href="mailto:billing@adminportal.com" class="alt-option">
                            <div class="alt-icon">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div class="alt-text">
                                <h4>Email Billing Team</h4>
                                <p>billing@adminportal.com • Response within 4 business hours</p>
                            </div>
                        </a>
                        
                        <a href="{{ route('dashboard.live-chat') }}" class="alt-option">
                            <div class="alt-icon">
                                <i class="fas fa-comment-dots"></i>
                            </div>
                            <div class="alt-text">
                                <h4>Live Chat Support</h4>
                                <p>Available during business hours • Quick billing questions</p>
                            </div>
                        </a>
                        
                        <a href="{{ route('dashboard.general-support') }}" class="alt-option">
                            <div class="alt-icon">
                                <i class="fas fa-headset"></i>
                            </div>
                            <div class="alt-text">
                                <h4>General Support</h4>
                                <p>For non-billing technical issues • Available 24/7</p>
                            </div>
                        </a>
                        
                        <a href="#" class="alt-option" onclick="openClientPortal()">
                            <div class="alt-icon">
                                <i class="fas fa-user-lock"></i>
                            </div>
                            <div class="alt-text">
                                <h4>Client Billing Portal</h4>
                                <p>Self-service portal for invoices, payments, and account management</p>
                            </div>
                        </a>
                    </div>
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
        function copyBillingNumber() {
            const billingNumber = document.getElementById('billingNumber').textContent;
            navigator.clipboard.writeText(billingNumber.replace(/\s+/g, '')).then(() => {
                const button = event.target.closest('.copy-btn');
                const originalText = button.innerHTML;
                const originalClass = button.className;
                
                button.innerHTML = '<i class="fas fa-check"></i> Copied!';
                button.className = 'copy-btn copied';
                
                setTimeout(() => {
                    button.innerHTML = originalText;
                    button.className = originalClass;
                }, 2000);
                
                showNotification('Billing number copied to clipboard!', 'success');
            }).catch(err => {
                console.error('Failed to copy: ', err);
                showNotification('Failed to copy billing number', 'error');
            });
        }

        function trackCall(type) {
            
            const now = new Date();
            const hours = now.getHours();
            const day = now.getDay(); 
            
            
            const isBusinessHours = day >= 1 && day <= 5 && hours >= 8 && hours < 20;
            
            if (!isBusinessHours && type === 'billing') {
                const confirmCall = confirm('You are calling outside of regular business hours (Monday-Friday, 8 AM - 8 PM EST).\n\nWould you like to proceed with the call? You may reach voicemail or emergency on-call support.');
                
                if (!confirmCall) {
                    event.preventDefault();
                    alert('Call cancelled. Consider using email support at billing@adminportal.com for non-urgent matters.');
                    return;
                }
            }
            
            
            console.log(`Call tracked: ${type} support`);
            
            
        }

        function openClientPortal() {
            alert('Opening client billing portal... In a real application, this would redirect to the secure billing portal.');
            
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

        
        document.querySelectorAll('.area-card').forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-10px)';
            });
            
            card.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0)';
            });
        });

        
        document.querySelectorAll('.alt-option').forEach(option => {
            option.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-5px)';
            });
            
            option.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0)';
            });
        });

        
        document.querySelectorAll('.hours-item').forEach(item => {
            item.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-5px)';
            });
            
            item.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0)';
            });
        });

        
        function updateBusinessHoursStatus() {
            const now = new Date();
            const hours = now.getHours();
            const day = now.getDay();
            
            
            const isBusinessHours = day >= 1 && day <= 5 && hours >= 8 && hours < 20;
            const isSaturday = day === 6 && hours >= 9 && hours < 17;
            
            let statusText = '';
            let statusColor = '';
            
            if (isBusinessHours) {
                statusText = 'Open Now';
                statusColor = '#10b981';
            } else if (isSaturday) {
                statusText = 'Limited Support';
                statusColor = '#f59e0b';
            } else {
                statusText = 'Closed';
                statusColor = '#ef4444';
            }
            
            
            const availabilityText = document.querySelector('.availability-text p');
            if (availabilityText) {
                availabilityText.innerHTML = `Our specialized billing team is available Monday through Friday, 8:00 AM to 8:00 PM EST. <strong>Current Status: <span style="color: ${statusColor}">${statusText}</span></strong>`;
            }
        }

        
        updateBusinessHoursStatus();
        setInterval(updateBusinessHoursStatus, 60000); 
    </script>
    @endsection
</body>
</html>