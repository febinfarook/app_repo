<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Customer</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-blue: #0d6efd;
            --secondary-blue: #1d4ed8;
            --success-green: #10b981;
            --light-bg: #f8fafc;
            --card-shadow: 0 10px 40px rgba(0, 0, 0, 0.08);
            --gradient-blue: linear-gradient(135deg, #0d6efd, #4dabff);
            --gradient-green: linear-gradient(135deg, #10b981, #34d399);
        }

        body {
            background: linear-gradient(135deg, #f0f5ff 0%, #e6f0ff 100%);
            min-height: 100vh;
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            padding-bottom: 40px;
        }

        .page-header {
            text-align: center;
            margin-bottom: 40px;
            padding-top: 20px;
        }

        .page-title {
            font-size: 2.5rem;
            font-weight: 800;
            background: linear-gradient(135deg, var(--primary-blue), #1e40af);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            position: relative;
            display: inline-block;
            margin-bottom: 10px;
        }

        .page-title::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 100px;
            height: 4px;
            background: linear-gradient(90deg, var(--primary-blue), #4dabff);
            border-radius: 2px;
        }

        .page-subtitle {
            color: #6b7280;
            font-size: 1.1rem;
            font-weight: 500;
        }

       
        .form-container {
            max-width: 1000px;
            margin: 0 auto;
            position: relative;
        }

        .form-card {
            background: white;
            border-radius: 24px;
            box-shadow: var(--card-shadow);
            overflow: hidden;
            position: relative;
            z-index: 1;
        }

        .form-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 6px;
            background: linear-gradient(90deg, var(--primary-blue), #4dabff, var(--primary-blue));
            z-index: 2;
        }

        
        .form-header {
            padding: 40px 40px 20px;
            text-align: center;
        }

        .icon-wrapper {
            position: relative;
            width: 100px;
            height: 100px;
            margin: 0 auto 25px;
        }

        .icon-circle {
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, var(--primary-blue), #4dabff);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 42px;
            box-shadow: 0 10px 25px rgba(13, 110, 253, 0.3);
            position: relative;
            z-index: 1;
            animation: float 3s ease-in-out infinite;
        }

        .icon-ring {
            position: absolute;
            top: -10px;
            left: -10px;
            right: -10px;
            bottom: -10px;
            border: 2px dashed rgba(13, 110, 253, 0.2);
            border-radius: 50%;
            animation: spin 20s linear infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        .form-title {
            font-size: 1.75rem;
            font-weight: 700;
            color: #1f2937;
            margin-bottom: 8px;
        }

        .form-description {
            color: #6b7280;
            font-size: 1rem;
            max-width: 500px;
            margin: 0 auto;
            line-height: 1.5;
        }

        
        .form-body {
            padding: 0 40px 40px;
        }

        
        .form-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 25px;
        }

        @media (max-width: 768px) {
            .form-grid {
                grid-template-columns: 1fr;
            }
        }

        
        .form-group {
            margin-bottom: 25px;
        }

        .form-label {
            display: flex;
            align-items: center;
            gap: 8px;
            font-weight: 600;
            color: #374151;
            margin-bottom: 10px;
            font-size: 0.95rem;
        }

        .form-label i {
            color: var(--primary-blue);
            font-size: 16px;
        }

        .required::after {
            content: '*';
            color: #ef4444;
            margin-left: 4px;
        }

        
        .input-wrapper {
            position: relative;
        }

        .form-control-modern {
            width: 100%;
            height: 52px;
            padding: 12px 16px 12px 45px;
            font-size: 15px;
            font-weight: 500;
            color: #1f2937;
            background: #f9fafb;
            border: 2px solid #e5e7eb;
            border-radius: 12px;
            transition: all 0.3s ease;
        }

        .form-control-modern:focus {
            background: white;
            border-color: var(--primary-blue);
            box-shadow: 0 0 0 4px rgba(13, 110, 253, 0.1);
            outline: none;
        }

        .input-icon {
            position: absolute;
            left: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: #9ca3af;
            font-size: 18px;
            transition: color 0.3s ease;
        }

        .form-control-modern:focus + .input-icon {
            color: var(--primary-blue);
        }

        
        .password-strength {
            margin-top: 8px;
            display: none;
        }

        .strength-bar {
            height: 4px;
            background: #e5e7eb;
            border-radius: 2px;
            overflow: hidden;
            margin-bottom: 4px;
        }

        .strength-fill {
            height: 100%;
            width: 0%;
            background: #ef4444;
            transition: width 0.3s ease, background-color 0.3s ease;
        }

        .strength-text {
            font-size: 12px;
            color: #9ca3af;
        }

        
        .success-message {
            background: linear-gradient(135deg, #d1fae5, #a7f3d0);
            border: none;
            border-radius: 12px;
            padding: 16px 20px;
            margin-bottom: 25px;
            display: flex;
            align-items: center;
            gap: 12px;
            animation: slideIn 0.5s ease;
        }

        @keyframes slideIn {
            from { transform: translateY(-20px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }

        .success-icon {
            width: 40px;
            height: 40px;
            background: var(--success-green);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 20px;
            flex-shrink: 0;
        }

       
        .error-text {
            color: #ef4444;
            font-size: 13px;
            font-weight: 500;
            margin-top: 6px;
            display: flex;
            align-items: center;
            gap: 6px;
            animation: fadeIn 0.3s ease;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-5px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .error-icon {
            font-size: 14px;
        }

        .error-highlight {
            border-color: #ef4444 !important;
        }

        .error-highlight:focus {
            border-color: #ef4444 !important;
            box-shadow: 0 0 0 4px rgba(239, 68, 68, 0.1) !important;
        }

        
        .submit-section {
            margin-top: 40px;
            text-align: center;
            padding-top: 25px;
            border-top: 1px solid #e5e7eb;
        }

        .btn-submit {
            background: linear-gradient(135deg, var(--primary-blue), var(--secondary-blue));
            color: white;
            border: none;
            border-radius: 12px;
            padding: 16px 40px;
            font-size: 17px;
            font-weight: 600;
            letter-spacing: 0.5px;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            transition: all 0.3s ease;
            box-shadow: 0 6px 20px rgba(13, 110, 253, 0.25);
            position: relative;
            overflow: hidden;
        }

        .btn-submit::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.7s;
        }

        .btn-submit:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(13, 110, 253, 0.35);
        }

        .btn-submit:hover::before {
            left: 100%;
        }

        .btn-submit:active {
            transform: translateY(-1px);
        }

        
        .form-features {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 20px;
            padding: 0 40px 40px;
        }
        .feature-item {
            display: flex;
            align-items: center;
            gap: 10px;
            color: #6b7280;
            font-size: 14px;
        }

        .feature-icon {
            width: 32px;
            height: 32px;
            background: #f3f4f6;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary-blue);
        }
        .feature-btn {
          display: flex;
          align-items: center;
          gap: 10px;
         padding: 14px 22px;
         background: #ffffff;
         border-radius: 14px;
         font-size: 14px;
         font-weight: 600;
         color: #495057;
         text-decoration: none;
         box-shadow: 0 6px 18px rgba(0, 0, 0, 0.08);
         transition: all 0.3s ease;
        }

        .feature-btn i {
            font-size: 18px;
            color: #0d6efd;
        }

        .feature-btn:hover {
            transform: translateY(-5px);
            background: #0d6efd;
            color: #ffffff;
            box-shadow: 0 12px 30px rgba(13,110,253,0.35);
        }
        
        .feature-btn:hover i {
            color: #ffffff;
        }
        .form-steps {
            display: flex;
            justify-content: center;
            gap: 30px;
            margin-bottom: 40px;
            position: relative;
        }

        .form-steps::before {
            content: '';
            position: absolute;
            top: 15px;
            left: 100px;
            right: 100px;
            height: 2px;
            background: #e5e7eb;
            z-index: 0;
        }

        .step {
            position: relative;
            z-index: 1;
            text-align: center;
        }

        .step-circle {
            width: 32px;
            height: 32px;
            background: #e5e7eb;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #9ca3af;
            font-weight: 600;
            margin: 0 auto 8px;
            transition: all 0.3s ease;
        }

        .step.active .step-circle {
            background: var(--primary-blue);
            color: white;
            box-shadow: 0 4px 12px rgba(13, 110, 253, 0.3);
        }

        .step-label {
            font-size: 13px;
            color: #9ca3af;
            font-weight: 500;
        }

        .step.active .step-label {
            color: var(--primary-blue);
            font-weight: 600;
        }

       
        @media (max-width: 768px) {
            .form-body {
                padding: 0 20px 30px;
            }
            
            .form-header {
                padding: 30px 20px 20px;
            }
            
            .form-features {
              display: flex;
              justify-content: center;
              gap: 20px;
              margin-top: 35px;
              flex-wrap: wrap;
            }
            
            .page-title {
                font-size: 2rem;
            }
            
            .icon-wrapper {
                width: 80px;
                height: 80px;
            }
            
            .icon-circle {
                font-size: 34px;
            }
        }

        
        .floating-elements {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            overflow: hidden;
            pointer-events: none;
            z-index: 0;
        }

        .floating-element {
            position: absolute;
            border-radius: 50%;
            background: linear-gradient(135deg, rgba(13, 110, 253, 0.1), rgba(77, 171, 255, 0.05));
            animation: floatAround 20s infinite linear;
        }

        .element-1 {
            width: 100px;
            height: 100px;
            top: 10%;
            left: 5%;
            animation-duration: 25s;
        }

        .element-2 {
            width: 150px;
            height: 150px;
            bottom: 20%;
            right: 5%;
            animation-duration: 30s;
            animation-direction: reverse;
        }

        .element-3 {
            width: 80px;
            height: 80px;
            top: 50%;
            left: 10%;
            animation-duration: 20s;
        }

        @keyframes floatAround {
            0%, 100% { transform: translate(0, 0) rotate(0deg); }
            25% { transform: translate(30px, 30px) rotate(90deg); }
            50% { transform: translate(0, 60px) rotate(180deg); }
            75% { transform: translate(-30px, 30px) rotate(270deg); }
        }
    </style>
</head>
<body>
@extends('dashboard.adminrole')

@section('content')


<div class="floating-elements">
    <div class="floating-element element-1"></div>
    <div class="floating-element element-2"></div>
    <div class="floating-element element-3"></div>
</div>

<div class="container-fluid py-4">
   
    <div class="page-header">
        <h1 class="page-title">Add New Customer</h1>
        <p class="page-subtitle">Create a new customer account with detailed information</p>
    </div>

    
    <div class="form-steps">
        <div class="step active">
            <div class="step-circle">1</div>
            <div class="step-label">Basic Info</div>
        </div>
        
    </div>

    
    <div class="form-container">
        <div class="form-card">
            <div class="form-header">
                <div class="icon-wrapper">
                    <div class="icon-ring"></div>
                    <div class="icon-circle">
                        <i class="fas fa-user-plus"></i>
                    </div>
                </div>
                <h3 class="form-title">Customer Information</h3>
                <p class="form-description">Please fill in all required fields marked with (*) to create a new customer account</p>
            </div>

           
            @if(session('success'))
            <div class="success-message mx-4">
                <div class="success-icon">
                    <i class="fas fa-check"></i>
                </div>
                <div>
                    <h6 class="mb-1" style="color: #065f46;">Customer Added Successfully!</h6>
                    <p class="mb-0" style="color: #047857; font-size: 14px;">
                        {{ session('success') }}
                    </p>
                </div>
            </div>
            @endif

           
            <div class="form-body">
                <form action="{{ route('customer.insert') }}" method="post" id="customerForm" autocomplete="off">
                    @csrf
                    <input type="text" name="fake_username" autocomplete="username" style="display:none">
                    <input type="password" name="fake_password" autocomplete="current-password" style="display:none">

                    <div class="form-grid">
                        <div class="left-column">
                            
                            <div class="form-group">
                                <label class="form-label required">
                                    <i class="fas fa-user"></i> Full Name
                                </label>
                                <div class="input-wrapper">
                                    <input type="text" 
                                           name="name" 
                                           class="form-control-modern @error('name') error-highlight @enderror" 
                                           placeholder="Enter customer's full name"
                                           value="{{ old('name') }}">
                                    <span class="input-icon">
                                        <i class="fas fa-user"></i>
                                    </span>
                                </div>
                                @error('name')
                                <div class="error-text">
                                    <i class="fas fa-exclamation-circle error-icon"></i>
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            
                            <div class="form-group">
                                <label class="form-label required">
                                    <i class="fas fa-envelope"></i> Email Address
                                </label>
                                <div class="input-wrapper">
                                    <input type="email" 
                                           name="email" 
                                           class="form-control-modern @error('email') error-highlight @enderror" 
                                           autocomplete="new-email"
                                           inputmode="email"
                                           placeholder="customer@example.com"
                                           value="{{ old('email') }}">
                                    <span class="input-icon">
                                        <i class="fas fa-envelope"></i>
                                    </span>
                                </div>
                                @error('email')
                                <div class="error-text">
                                    <i class="fas fa-exclamation-circle error-icon"></i>
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            
                            <div class="form-group">
                                <label class="form-label required">
                                    <i class="fas fa-lock"></i> Password
                                </label>
                                <div class="input-wrapper">
                                    <input type="password" 
                                           name="password" 
                                           id="password"
                                           class="form-control-modern @error('password') error-highlight @enderror" 
                                           autocomplete="new-password"
                                           placeholder="Create a strong password">
                                    <span class="input-icon">
                                        <i class="fas fa-lock"></i>
                                    </span>
                                </div>
                                
                                <div class="password-strength" id="passwordStrength">
                                    <div class="strength-bar">
                                        <div class="strength-fill" id="strengthFill"></div>
                                    </div>
                                    <div class="strength-text" id="strengthText">Password strength: Weak</div>
                                </div>
                                @error('password')
                                <div class="error-text">
                                    <i class="fas fa-exclamation-circle error-icon"></i>
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                        
                        <div class="right-column">
                            
                            <div class="form-group">
                                <label class="form-label required">
                                    <i class="fas fa-home"></i> House / Building
                                </label>
                                <div class="input-wrapper">
                                    <input type="text" 
                                           name="house" 
                                           class="form-control-modern @error('house') error-highlight @enderror" 
                                           placeholder="House no. or building name"
                                           value="{{ old('house') }}">
                                    <span class="input-icon">
                                        <i class="fas fa-home"></i>
                                    </span>
                                </div>
                                @error('house')
                                <div class="error-text">
                                    <i class="fas fa-exclamation-circle error-icon"></i>
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            
                            <div class="form-group">
                                <label class="form-label required">
                                    <i class="fas fa-road"></i> Street
                                </label>
                                <div class="input-wrapper">
                                    <input type="text" 
                                           name="street" 
                                           class="form-control-modern @error('street') error-highlight @enderror" 
                                           placeholder="Street name"
                                           value="{{ old('street') }}">
                                    <span class="input-icon">
                                        <i class="fas fa-road"></i>
                                    </span>
                                </div>
                                @error('street')
                                <div class="error-text">
                                    <i class="fas fa-exclamation-circle error-icon"></i>
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            
                            <div class="form-group">
                                <label class="form-label required">
                                    <i class="fas fa-city"></i> City
                                </label>
                                <div class="input-wrapper">
                                    <input type="text" 
                                           name="city" 
                                           class="form-control-modern @error('city') error-highlight @enderror" 
                                           placeholder="City name"
                                           value="{{ old('city') }}">
                                    <span class="input-icon">
                                        <i class="fas fa-city"></i>
                                    </span>
                                </div>
                                @error('city')
                                <div class="error-text">
                                    <i class="fas fa-exclamation-circle error-icon"></i>
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            
                            <div class="form-group">
                                <label class="form-label required">
                                    <i class="fas fa-map-marker-alt"></i> Province
                                </label>
                                <div class="input-wrapper">
                                    <input type="text" 
                                           name="province" 
                                           class="form-control-modern @error('province') error-highlight @enderror" 
                                           placeholder="Province/State"
                                           value="{{ old('province') }}">
                                    <span class="input-icon">
                                        <i class="fas fa-map-marker-alt"></i>
                                    </span>
                                </div>
                                @error('province')
                                <div class="error-text">
                                    <i class="fas fa-exclamation-circle error-icon"></i>
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>

                   
                    <div class="submit-section">
                        <button type="submit" class="btn-submit">
                            <i class="fas fa-user-plus"></i> Create Customer Account
                        </button>
                        <p class="text-muted mt-3 mb-0" style="font-size: 14px;">
                                 By creating an account, you agree to our
                        <a href="{{ route('dashboard.terms') }}" class="text-primary">
                                 Terms of Service
                        </a>
                       </p>
                    </div>
                </form>
            </div>

           
           <div class="form-features">
    <a href="{{ route('dashboard.terms') }}" class="feature-btn">
        <i class="fas fa-shield-alt"></i>
        <span>Secure & Encrypted</span>
    </a>

    <a href="{{ route('dashboard.quick-processing') }}" class="feature-btn">
         <i class="fas fa-bolt"></i>
    <span>Quick Processing</span>
   </a>

    <a href="{{ route('dashboard.support') }}" class="feature-btn">
    <i class="fas fa-headset"></i>
    <span>24/7 Support</span>
</a>
</div>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        
        const passwordInput = document.getElementById('password');
        const strengthFill = document.getElementById('strengthFill');
        const strengthText = document.getElementById('strengthText');
        const passwordStrength = document.getElementById('passwordStrength');
        
        passwordInput.addEventListener('input', function() {
            const password = this.value;
            let strength = 0;
            
            
            passwordStrength.style.display = 'block';
            
            
            if (password.length >= 8) strength++;
            if (/[A-Z]/.test(password)) strength++;
            if (/[0-9]/.test(password)) strength++;
            if (/[^A-Za-z0-9]/.test(password)) strength++;
            
            
            let color, text, width;
            switch(strength) {
                case 0:
                    color = '#ef4444';
                    text = 'Very Weak';
                    width = '25%';
                    break;
                case 1:
                    color = '#f97316';
                    text = 'Weak';
                    width = '40%';
                    break;
                case 2:
                    color = '#f59e0b';
                    text = 'Fair';
                    width = '60%';
                    break;
                case 3:
                    color = '#10b981';
                    text = 'Good';
                    width = '80%';
                    break;
                case 4:
                    color = '#059669';
                    text = 'Strong';
                    width = '100%';
                    break;
            }
            
            strengthFill.style.backgroundColor = color;
            strengthFill.style.width = width;
            strengthText.textContent = `Password strength: ${text}`;
            strengthText.style.color = color;
        });
        
       
        const errorInputs = document.querySelectorAll('.error-highlight');
        errorInputs.forEach(input => {
            input.parentElement.classList.add('has-error');
        });
        
        
        const form = document.getElementById('customerForm');
        form.addEventListener('submit', function(e) {
            let isValid = true;
            const requiredFields = form.querySelectorAll('[required]');
            
            requiredFields.forEach(field => {
                if (!field.value.trim()) {
                    isValid = false;
                    field.classList.add('error-highlight');
                    
                   
                    if (!field.parentElement.nextElementSibling?.classList.contains('error-text')) {
                        const errorDiv = document.createElement('div');
                        errorDiv.className = 'error-text';
                        errorDiv.innerHTML = `<i class="fas fa-exclamation-circle error-icon"></i> This field is required`;
                        field.parentElement.parentElement.appendChild(errorDiv);
                    }
                }
            });
            
            if (!isValid) {
                e.preventDefault();
                
                const firstError = form.querySelector('.error-highlight');
                if (firstError) {
                    firstError.scrollIntoView({ behavior: 'smooth', block: 'center' });
                }
            }
        });
        
        
        const allInputs = form.querySelectorAll('input');
        allInputs.forEach(input => {
            input.addEventListener('input', function() {
                this.classList.remove('error-highlight');
                const errorMsg = this.parentElement.parentElement.querySelector('.error-text');
                if (errorMsg && !this.hasAttribute('data-server-error')) {
                    errorMsg.remove();
                }
            });
        });
        
       
        document.querySelectorAll('.error-text').forEach(error => {
            error.previousElementSibling.querySelector('input').setAttribute('data-server-error', 'true');
        });
    });
</script>
@endsection
</body>
</html>