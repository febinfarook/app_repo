<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Customer</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-blue: #0d6efd;
            --secondary-blue: #1d4ed8;
            --success-green: #10b981;
            --warning-orange: #f59e0b;
            --danger-red: #ef4444;
            --dark-gray: #1f2937;
            --light-gray: #f9fafb;
            --border-color: #e5e7eb;
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

        
        .edit-container {
            max-width: 1000px;
            margin: 0 auto;
            position: relative;
        }

        .edit-card {
            background: white;
            border-radius: 24px;
            box-shadow: var(--card-shadow);
            overflow: hidden;
            position: relative;
            animation: slideUp 0.6s ease;
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        
        .card-header-modern {
            background: linear-gradient(135deg, var(--primary-blue), var(--secondary-blue));
            padding: 30px 40px;
            color: white;
            position: relative;
            overflow: hidden;
        }

        .card-header-modern::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 200px;
            height: 200px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
        }

        .header-content {
            position: relative;
            z-index: 2;
            text-align: center;
        }

        .edit-icon-wrapper {
            position: relative;
            width: 80px;
            height: 80px;
            margin: 0 auto 20px;
        }

        .edit-icon {
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, white, #f8fafc);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            z-index: 1;
            border: 4px solid white;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
        }

        .edit-icon i {
            font-size: 36px;
            background: linear-gradient(135deg, var(--primary-blue), var(--secondary-blue));
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        .edit-icon-ring {
            position: absolute;
            top: -10px;
            left: -10px;
            right: -10px;
            bottom: -10px;
            border: 2px dashed rgba(255, 255, 255, 0.5);
            border-radius: 50%;
            animation: spin 20s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        .customer-badge {
            background: rgba(255, 255, 255, 0.2);
            padding: 6px 20px;
            border-radius: 20px;
            font-size: 14px;
            font-weight: 600;
            display: inline-block;
            margin-top: 10px;
            backdrop-filter: blur(10px);
        }

       
        .form-body {
            padding: 40px;
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

       
        .form-group-modern {
            margin-bottom: 25px;
        }

        .form-label-modern {
            display: flex;
            align-items: center;
            gap: 8px;
            font-weight: 600;
            color: #374151;
            margin-bottom: 10px;
            font-size: 0.95rem;
        }

        .form-label-modern i {
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

        
        .password-toggle {
            position: absolute;
            right: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: #9ca3af;
            cursor: pointer;
            transition: color 0.3s ease;
        }

        .password-toggle:hover {
            color: var(--primary-blue);
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
            display: none;
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

       
        .action-buttons {
            display: flex;
            gap: 15px;
            justify-content: center;
            margin-top: 40px;
            padding-top: 30px;
            border-top: 1px solid var(--border-color);
        }

        .btn-modern {
            padding: 14px 30px;
            border-radius: 12px;
            font-size: 16px;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            transition: all 0.3s ease;
            border: none;
            text-decoration: none;
            cursor: pointer;
        }

        .btn-primary-modern {
            background: linear-gradient(135deg, var(--primary-blue), var(--secondary-blue));
            color: white;
            box-shadow: 0 6px 20px rgba(13, 110, 253, 0.25);
        }

        .btn-primary-modern:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(13, 110, 253, 0.35);
        }

        .btn-secondary-modern {
            background: white;
            color: var(--primary-blue);
            border: 2px solid var(--border-color);
        }

        .btn-secondary-modern:hover {
            background: var(--light-gray);
            border-color: var(--primary-blue);
            transform: translateY(-3px);
        }

        .btn-danger-modern {
            background: linear-gradient(135deg, var(--danger-red), #dc2626);
            color: white;
            box-shadow: 0 6px 20px rgba(239, 68, 68, 0.25);
        }

        .btn-danger-modern:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(239, 68, 68, 0.35);
        }

        
        .back-button {
            position: fixed;
            top: 20px;
            left: 20px;
            z-index: 1000;
        }

        .btn-back {
            background: white;
            color: var(--primary-blue);
            border: 2px solid var(--border-color);
            border-radius: 12px;
            padding: 10px 20px;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 8px;
            text-decoration: none;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
        }

        .btn-back:hover {
            background: var(--light-gray);
            border-color: var(--primary-blue);
            transform: translateX(-5px);
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

        
        .form-tips {
            background: #f8fafc;
            border-radius: 12px;
            padding: 20px;
            margin-top: 30px;
            border-left: 4px solid var(--primary-blue);
        }

        .tips-title {
            font-weight: 600;
            color: var(--dark-gray);
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .tips-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .tips-list li {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            margin-bottom: 8px;
            font-size: 14px;
            color: #6b7280;
        }

        .tips-list li i {
            color: var(--success-green);
            font-size: 12px;
            margin-top: 4px;
            flex-shrink: 0;
        }

       
        @media (max-width: 768px) {
            .page-title {
                font-size: 2rem;
            }
            
            .form-body {
                padding: 20px;
            }
            
            .card-header-modern {
                padding: 20px;
            }
            
            .action-buttons {
                flex-direction: column;
                gap: 10px;
            }
            
            .btn-modern {
                width: 100%;
                justify-content: center;
            }
            
            .back-button {
                position: relative;
                top: 0;
                left: 0;
                margin-bottom: 20px;
            }
            
            .btn-back {
                width: 100%;
                justify-content: center;
            }
        }

        
        .loading-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(255, 255, 255, 0.8);
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 24px;
            z-index: 100;
            display: none;
        }

        .spinner {
            width: 50px;
            height: 50px;
            border: 4px solid #e5e7eb;
            border-top: 4px solid var(--primary-blue);
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }
    </style>
</head>
<body>
@extends('dashboard.adminrole')

@section('content')





@if(session('success'))
<div class="success-message" id="successMessage" style="display: flex; max-width: 1000px; margin: 20px auto;">
    <div class="success-icon">
        <i class="fas fa-check"></i>
    </div>
    <div>
        <h6 class="mb-1" style="color: #065f46;">Customer Updated Successfully!</h6>
        <p class="mb-0" style="color: #047857; font-size: 14px;">
            {{ session('success') }}
        </p>
    </div>
</div>
@endif

<div class="edit-container">
    <div class="edit-card">
        
        <div class="loading-overlay" id="loadingOverlay">
            <div class="spinner"></div>
        </div>

        
        <div class="card-header-modern">
            <div class="header-content">
                <div class="edit-icon-wrapper">
                    <div class="edit-icon">
                        <i class="fas fa-user-edit"></i>
                    </div>
                    <div class="edit-icon-ring"></div>
                </div>
                <h3 class="mb-2" style="font-size: 24px; font-weight: 700;">Edit Customer Profile</h3>
                <div class="customer-badge">
                    <i class="fas fa-id-card me-1"></i> ID: {{ $customer->id }}
                </div>
            </div>
        </div>

       
        <div class="form-body">
            <form action="{{ route('customer.update', $customer->id) }}" method="POST" id="editForm">
                @csrf
                @method('PUT')

                <div class="form-grid">
                    
                    <div class="left-column">
                        
                        <div class="form-group-modern">
                            <label class="form-label-modern required">
                                <i class="fas fa-user"></i> Full Name
                            </label>
                            <div class="input-wrapper">
                                <input type="text" 
                                       name="name" 
                                       class="form-control-modern @error('name') error-highlight @enderror" 
                                       value="{{ old('name', $customer->name) }}"
                                       placeholder="Enter customer's full name">
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

                       
                        <div class="form-group-modern">
                            <label class="form-label-modern required">
                                <i class="fas fa-envelope"></i> Email Address
                            </label>
                            <div class="input-wrapper">
                                <input type="email" 
                                       name="email" 
                                       class="form-control-modern @error('email') error-highlight @enderror" 
                                       value="{{ old('email', $customer->email) }}"
                                       placeholder="customer@example.com">
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

                      
                        <div class="form-group-modern">
                            <label class="form-label-modern">
                                <i class="fas fa-lock"></i> Password (Optional)
                            </label>
                            <div class="input-wrapper">
                                <input type="password" 
                                       name="password" 
                                       id="password"
                                       class="form-control-modern @error('password') error-highlight @enderror" 
                                       placeholder="Enter new password (leave blank to keep current)">
                                <span class="input-icon">
                                    <i class="fas fa-lock"></i>
                                </span>
                                <span class="password-toggle" id="passwordToggle">
                                    <i class="fas fa-eye"></i>
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
                        
                        <div class="form-group-modern">
                            <label class="form-label-modern required">
                                <i class="fas fa-home"></i> House / Building
                            </label>
                            <div class="input-wrapper">
                                <input type="text" 
                                       name="house" 
                                       class="form-control-modern @error('house') error-highlight @enderror" 
                                       value="{{ old('house', $customer->house) }}"
                                       placeholder="House no. or building name">
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

                       
                        <div class="form-group-modern">
                            <label class="form-label-modern required">
                                <i class="fas fa-road"></i> Street
                            </label>
                            <div class="input-wrapper">
                                <input type="text" 
                                       name="street" 
                                       class="form-control-modern @error('street') error-highlight @enderror" 
                                       value="{{ old('street', $customer->street) }}"
                                       placeholder="Street name">
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

                        
                        <div class="form-group-modern">
                            <label class="form-label-modern required">
                                <i class="fas fa-city"></i> City
                            </label>
                            <div class="input-wrapper">
                                <input type="text" 
                                       name="city" 
                                       class="form-control-modern @error('city') error-highlight @enderror" 
                                       value="{{ old('city', $customer->city) }}"
                                       placeholder="City name">
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

                       
                        <div class="form-group-modern">
                            <label class="form-label-modern required">
                                <i class="fas fa-map-marker-alt"></i> Province
                            </label>
                            <div class="input-wrapper">
                                <input type="text" 
                                       name="province" 
                                       class="form-control-modern @error('province') error-highlight @enderror" 
                                       value="{{ old('province', $customer->province) }}"
                                       placeholder="Province/State">
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

              
                <div class="form-tips">
                    <div class="tips-title">
                        <i class="fas fa-lightbulb"></i> Quick Tips
                    </div>
                    <ul class="tips-list">
                        <li>
                            <i class="fas fa-check-circle"></i>
                            <span>Leave password field blank if you don't want to change it</span>
                        </li>
                        <li>
                            <i class="fas fa-check-circle"></i>
                            <span>All fields marked with * are required</span>
                        </li>
                        <li>
                            <i class="fas fa-check-circle"></i>
                            <span>Use a strong password with letters, numbers, and symbols</span>
                        </li>
                    </ul>
                </div>

                
                <div class="action-buttons">
                   
                        <a href="{{ route('dashboard.profile', $customer->id) }}" class="btn-back">
                          <i class="fas fa-arrow-left"></i> Back to Profile 
                         </a>

                    <button type="submit" class="btn-modern btn-primary-modern" id="submitBtn">
                        <i class="fas fa-save"></i> Save Changes
                    </button>
                    <a href="{{ route('dashboard.profile', $customer->id) }}" class="btn-modern btn-secondary-modern">
                        <i class="fas fa-times"></i> Cancel
                    </a>
                    <a href="{{ route('dashboard.delete', $customer->id) }}" 
                       class="btn-modern btn-danger-modern"
                       onclick="return confirm('Are you sure you want to delete this customer? This action cannot be undone.')">
                        <i class="fas fa-trash-alt"></i> Delete Customer
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const passwordToggle = document.getElementById('passwordToggle');
        const passwordInput = document.getElementById('password');
        const strengthFill = document.getElementById('strengthFill');
        const strengthText = document.getElementById('strengthText');
        const passwordStrength = document.getElementById('passwordStrength');
        
        if (passwordToggle) {
            passwordToggle.addEventListener('click', function() {
                const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                passwordInput.setAttribute('type', type);
                this.innerHTML = type === 'password' ? '<i class="fas fa-eye"></i>' : '<i class="fas fa-eye-slash"></i>';
            });
        }

        
        if (passwordInput) {
            passwordInput.addEventListener('input', function() {
                const password = this.value;
                let strength = 0;
                
                
                if (password.length > 0) {
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
                } else {
                    passwordStrength.style.display = 'none';
                }
            });
        }

        
        const form = document.getElementById('editForm');
        const submitBtn = document.getElementById('submitBtn');
        const loadingOverlay = document.getElementById('loadingOverlay');
        
        if (form) {
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
                
                if (isValid) {
                   
                    if (loadingOverlay) {
                        loadingOverlay.style.display = 'flex';
                    }
                    
                    
                    if (submitBtn) {
                        submitBtn.disabled = true;
                        submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Saving...';
                    }
                    
                    
                    return true;
                } else {
                    e.preventDefault();
                   
                    const firstError = form.querySelector('.error-highlight');
                    if (firstError) {
                        firstError.scrollIntoView({ behavior: 'smooth', block: 'center' });
                        firstError.focus();
                    }
                }
            });
        }

       
        const allInputs = form.querySelectorAll('input');
        allInputs.forEach(input => {
            input.addEventListener('input', function() {
                this.classList.remove('error-highlight');
                const errorMsg = this.parentElement.parentElement.querySelector('.error-text:not([data-server-error])');
                if (errorMsg) {
                    errorMsg.remove();
                }
            });
        });

        
        document.querySelectorAll('.error-text').forEach(error => {
            const input = error.previousElementSibling?.querySelector('input');
            if (input) {
                input.setAttribute('data-server-error', 'true');
                error.setAttribute('data-server-error', 'true');
            }
        });

        
        const successMessage = document.getElementById('successMessage');
        if (successMessage) {
            setTimeout(() => {
                successMessage.style.transition = 'opacity 1s ease';
                successMessage.style.opacity = '0';
                setTimeout(() => {
                    successMessage.style.display = 'none';
                }, 1000);
            }, 5000);
        }

        
        const textFields = form.querySelectorAll('input[type="text"], input[type="email"]');
        textFields.forEach(field => {
            field.addEventListener('input', function() {
                const maxLength = this.getAttribute('maxlength');
                if (maxLength) {
                    const currentLength = this.value.length;
                    
                }
            });
        });

       
        let saveTimeout;
        form.addEventListener('input', function() {
            clearTimeout(saveTimeout);
            saveTimeout = setTimeout(() => {
                
                console.log('Auto-save triggered');
            }, 2000);
        });
    });
</script>
@endsection
</body>
</html>