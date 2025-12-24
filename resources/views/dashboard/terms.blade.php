<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Terms of Service</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <style>
        .terms-wrapper {
            max-width: 1000px;
            margin: auto;
            padding: 20px;
        }

        .terms-card {
            background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);
            border-radius: 20px;
            padding: 45px 50px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.08);
            border: 1px solid rgba(13, 110, 253, 0.1);
            animation: fadeIn 0.8s ease-out;
            position: relative;
            overflow: hidden;
        }

        .terms-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 5px;
            background: linear-gradient(90deg, #0d6efd, #6f42c1, #d63384);
        }

        .terms-title {
            font-weight: 800;
            color: #1a1a1a;
            text-align: center;
            margin-bottom: 40px;
            letter-spacing: -0.5px;
            font-size: 2.8rem;
            position: relative;
            display: inline-block;
            width: 100%;
        }

        .terms-title::after {
            content: '';
            display: block;
            width: 80px;
            height: 4px;
            background: #0d6efd;
            margin: 15px auto 0;
            border-radius: 2px;
        }

        .title-icon {
            color: #0d6efd;
            margin-right: 15px;
            font-size: 2.5rem;
        }

        .last-updated {
            text-align: center;
            color: #6c757d;
            font-size: 0.95rem;
            margin-bottom: 40px;
            background: #f8f9fa;
            padding: 8px 20px;
            border-radius: 50px;
            display: inline-block;
            margin-left: 50%;
            transform: translateX(-50%);
        }

        .terms-section {
            margin-bottom: 35px;
            padding-bottom: 25px;
            border-bottom: 1px solid rgba(0,0,0,0.05);
        }

        .terms-section:last-of-type {
            border-bottom: none;
        }

        .section-title {
            color: #0d6efd;
            font-weight: 700;
            font-size: 1.4rem;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .section-icon {
            background: rgba(13, 110, 253, 0.1);
            width: 40px;
            height: 40px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #0d6efd;
        }

        .terms-card p {
            font-size: 16px;
            color: #495057;
            line-height: 1.7;
            margin-bottom: 15px;
            padding-left: 52px;
        }

        .terms-card ul {
            padding-left: 70px;
            margin-bottom: 20px;
        }

        .terms-card li {
            font-size: 15.5px;
            color: #495057;
            line-height: 1.6;
            margin-bottom: 8px;
            position: relative;
        }

        .terms-card li::before {
            content: "•";
            color: #0d6efd;
            font-weight: bold;
            display: inline-block;
            width: 1em;
            margin-left: -1em;
            font-size: 1.2rem;
        }

        .highlight-box {
            background: rgba(13, 110, 253, 0.05);
            border-left: 4px solid #0d6efd;
            padding: 20px 25px;
            border-radius: 8px;
            margin: 25px 0;
            font-style: italic;
            color: #1f2937;          
            font-size: 15px;
            line-height: 1.7;
        }

        .terms-divider {
            height: 1px;
            background: linear-gradient(90deg, transparent, #dee2e6, transparent);
            margin: 40px 0;
        }

        .action-buttons {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 15px;
            margin-top: 40px;
            padding-top: 25px;
            border-top: 1px solid #e9ecef;
        }

        .back-btn {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 12px 25px;
            border-radius: 12px;
            font-size: 15px;
            font-weight: 600;
            transition: all 0.3s ease;
            background: #f8f9fa;
            border: 1px solid #dee2e6;
            color: #495057;
        }

        .back-btn:hover {
            transform: translateX(-5px);
            background: #e9ecef;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        }

        .agree-btn {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 12px 30px;
            border-radius: 12px;
            font-size: 15px;
            font-weight: 600;
            background: #0d6efd;
            border: none;
            color: white;
            transition: all 0.3s ease;
        }

        .agree-btn:hover {
            background: #0b5ed7;
            transform: translateY(-2px);
            box-shadow: 0 7px 20px rgba(13, 110, 253, 0.3);
        }

        .scroll-indicator {
            position: fixed;
            bottom: 30px;
            right: 30px;
            background: #0d6efd;
            color: white;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            opacity: 0;
            transition: all 0.3s ease;
            z-index: 1000;
            box-shadow: 0 5px 15px rgba(13, 110, 253, 0.4);
        }

        .scroll-indicator.show {
            opacity: 1;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @media (max-width: 768px) {
            .terms-card {
                padding: 30px 25px;
            }
            
            .terms-title {
                font-size: 2.2rem;
            }
            
            .terms-card p, .terms-card ul {
                padding-left: 0;
            }
            
            .section-title {
                font-size: 1.2rem;
            }
            
            .action-buttons {
                flex-direction: column;
                align-items: stretch;
            }
            
            .back-btn, .agree-btn {
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
    <div class="terms-wrapper">
        <div class="terms-card">
            <h2 class="terms-title">
                <i class="fas fa-scale-balanced title-icon"></i>Terms of Service
            </h2>
            
            <div class="last-updated">
                <i class="fas fa-calendar-alt me-2"></i>Last Updated: December 22, 2025
            </div>
            
            <div class="terms-section">
                <h3 class="section-title">
                    <span class="section-icon"><i class="fas fa-file-contract"></i></span>
                    1. Introduction
                </h3>
                <p>
                    These Terms of Service govern your use of the Admin Portal application and services. 
                    By accessing or using our platform, you agree to be bound by these terms and our Privacy Policy.
                </p>
            </div>
            
            <div class="terms-section">
                <h3 class="section-title">
                    <span class="section-icon"><i class="fas fa-user-shield"></i></span>
                    2. Account Responsibilities
                </h3>
                <p>
                    You are responsible for maintaining the confidentiality of your account credentials and 
                    for all activities that occur under your account. This includes:
                </p>
                <ul>
                    <li>Keeping your password secure and confidential</li>
                    <li>Ensuring account access is limited to authorized personnel only</li>
                    <li>Immediately notifying us of any unauthorized use or security breach</li>
                    <li>Providing accurate and complete registration information</li>
                </ul>
            </div>
            
            <div class="terms-section">
                <h3 class="section-title">
                    <span class="section-icon"><i class="fas fa-ban"></i></span>
                    3. Acceptable Use Policy
                </h3>
                <p>
                    You agree not to use the service for any unlawful purpose or in any way that could 
                    damage, disable, overburden, or impair the platform.
                </p>
                <div class="highlight-box">
                    <i class="fas fa-exclamation-circle me-2"></i>
                    Prohibited activities include but are not limited to: data scraping, reverse engineering, 
                    spamming, distributing malware, or attempting to gain unauthorized access to other accounts.
                </div>
            </div>
            
            <div class="terms-section">
                <h3 class="section-title">
                    <span class="section-icon"><i class="fas fa-gavel"></i></span>
                    4. Termination & Suspension
                </h3>
                <p>
                    We reserve the right to suspend or terminate accounts if any misuse, fraud, 
                    or violation of these terms is detected. This includes:
                </p>
                <ul>
                    <li>Violation of platform rules or policies</li>
                    <li>Suspicious or fraudulent activities</li>
                    <li>Extended periods of account inactivity</li>
                    <li>Requests from law enforcement or regulatory authorities</li>
                </ul>
            </div>
            
            <div class="terms-section">
                <h3 class="section-title">
                    <span class="section-icon"><i class="fas fa-sync-alt"></i></span>
                    5. Service Modifications
                </h3>
                <p>
                    We may modify, suspend, or discontinue any aspect of the service at any time, 
                    with or without notice. We are not liable for any modification, suspension, 
                    or discontinuance of the service.
                </p>
            </div>
            
            <div class="terms-section">
                <h3 class="section-title">
                    <span class="section-icon"><i class="fas fa-shield-alt"></i></span>
                    6. Data Privacy & Security
                </h3>
                <p>
                    Your use of the service is also governed by our Privacy Policy. We implement 
                    industry-standard security measures but cannot guarantee absolute security.
                </p>
            </div>
            
            <div class="terms-section">
                <h3 class="section-title">
                    <span class="section-icon"><i class="fas fa-envelope"></i></span>
                    7. Contact & Support
                </h3>
                <p>
                    For questions about these Terms of Service, please contact our support team 
                    at <strong>support@admindashbaord.com</strong> or through the help desk within the application.
                </p>
            </div>
            
            <div class="terms-divider"></div>
            
            <div class="action-buttons">
                <a href="{{ url()->previous() }}" class="btn btn-outline-secondary back-btn">
                    <i class="fas fa-arrow-left"></i> Go Back
                </a>
                <button class="btn agree-btn" onclick="acceptTerms()">
                    <i class="fas fa-check-circle"></i> I Accept These Terms
                </button>
            </div>
        </div>
    </div>
</div>

<div class="scroll-indicator" id="scrollToTop">
    <i class="fas fa-chevron-up"></i>
</div>

<script>
    
    const scrollBtn = document.getElementById('scrollToTop');
    
    window.addEventListener('scroll', () => {
        if (window.pageYOffset > 300) {
            scrollBtn.classList.add('show');
        } else {
            scrollBtn.classList.remove('show');
        }
    });
    
    scrollBtn.addEventListener('click', () => {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });
    
    function acceptTerms() {
       
        alert('Thank you for accepting the Terms of Service.');
       
    }
    
    
    document.querySelectorAll('.section-title').forEach(title => {
        title.style.cursor = 'pointer';
        title.addEventListener('click', function() {
            this.scrollIntoView({ behavior: 'smooth', block: 'center' });
        });
    });
</script>
@endsection
</body>
</html>