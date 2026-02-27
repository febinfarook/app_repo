<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Supplier</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary: #2563eb;
            --primary-dark: #1d4ed8;
            --secondary: #6b7280;
            --success: #10b981;
            --warning: #f59e0b;
            --danger: #ef4444;
            --light: #f8fafc;
            --dark: #1e293b;
        }

        body {
            background: linear-gradient(135deg, #f1f5f9 0%, #e2e8f0 100%);
            min-height: 100vh;
            font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
        }

        .container-fluid {
            max-width: 1200px;
        }

        
        .page-header {
            margin-bottom: 30px;
            padding-bottom: 15px;
            border-bottom: 1px solid #e2e8f0;
        }

        .page-title {
            font-size: 2rem;
            font-weight: 800;
            color: var(--dark);
            display: flex;
            align-items: center;
            gap: 12px;
            margin: 0;
        }

        .page-subtitle {
            color: var(--secondary);
            font-size: 0.95rem;
            margin-top: 5px;
        }

        
        .form-container {
            background: white;
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 15px 50px rgba(0, 0, 0, 0.1);
            border: 1px solid #e2e8f0;
            position: relative;
            overflow: hidden;
        }

        .form-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 5px;
            background: linear-gradient(90deg, var(--primary), #3b82f6, #60a5fa);
        }

        
        .two-column-layout {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 40px;
            margin-bottom: 40px;
        }

        @media (max-width: 992px) {
            .two-column-layout {
                grid-template-columns: 1fr;
                gap: 30px;
            }
        }

        .form-section {
            margin-bottom: 30px;
        }

        .section-header {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 25px;
            padding-bottom: 12px;
            border-bottom: 2px solid #f1f5f9;
        }

        .section-icon {
            width: 50px;
            height: 50px;
            border-radius: 12px;
            background: linear-gradient(135deg, #dbeafe, #bfdbfe);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary);
            font-size: 1.3rem;
        }

        .section-title {
            font-size: 1.4rem;
            font-weight: 700;
            color: var(--dark);
            margin: 0;
        }

        .section-subtitle {
            color: var(--secondary);
            font-size: 0.9rem;
            margin: 5px 0 0;
        }

       
        .form-group {
            margin-bottom: 24px;
            position: relative;
        }

        .form-label {
            font-weight: 600;
            color: var(--dark);
            margin-bottom: 8px;
            font-size: 0.95rem;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .required::after {
            content: '*';
            color: var(--danger);
            margin-left: 4px;
        }

        .form-control, .form-select {
            border-radius: 12px;
            padding: 14px 16px;
            border: 2px solid #e2e8f0;
            font-size: 15px;
            transition: all 0.3s ease;
            background: white;
        }

        .form-control:focus, .form-select:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 4px rgba(37, 99, 235, 0.1);
            outline: none;
        }

        .form-control.is-invalid, .form-select.is-invalid {
            border-color: var(--danger);
            background-image: none;
        }

        .form-control.is-invalid:focus {
            box-shadow: 0 0 0 4px rgba(239, 68, 68, 0.1);
        }

        .input-with-icon {
            position: relative;
        }

        .input-with-icon i {
            position: absolute;
            left: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: #94a3b8;
            font-size: 1.1rem;
        }

        .input-with-icon .form-control, .input-with-icon .form-select {
            padding-left: 45px;
        }

        
        .invalid-feedback {
            display: flex;
            align-items: center;
            gap: 6px;
            font-size: 0.85rem;
            margin-top: 6px;
            color: var(--danger);
            font-weight: 500;
        }

       
        .alert-success {
            border-radius: 12px;
            border: 2px solid #a7f3d0;
            background: #ecfdf5;
            color: #065f46;
            font-weight: 500;
            padding: 16px 20px;
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 30px;
            animation: slideDown 0.5s ease;
        }

        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        
        .action-buttons {
            display: flex;
            gap: 15px;
            margin-top: 40px;
            padding-top: 30px;
            border-top: 1px solid #f1f5f9;
            flex-wrap: wrap;
        }

        .btn-primary {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            border: none;
            border-radius: 12px;
            padding: 14px 32px;
            font-weight: 600;
            font-size: 1rem;
            transition: all 0.3s ease;
            box-shadow: 0 8px 25px rgba(37, 99, 235, 0.3);
        }

        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 35px rgba(37, 99, 235, 0.4);
            background: linear-gradient(135deg, var(--primary-dark), #1e40af);
        }

        .btn-outline-secondary {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            border-radius: 12px;
            padding: 14px 28px;
            font-weight: 500;
            transition: all 0.3s ease;
            background: white;
            border: 2px solid #e2e8f0;
            color: var(--secondary);
        }

        .btn-outline-secondary:hover {
            background: #f8fafc;
            border-color: #cbd5e1;
            color: var(--dark);
            transform: translateX(-3px);
        }

        
        .form-hint {
            font-size: 0.85rem;
            color: var(--secondary);
            margin-top: 6px;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        
        .additional-info {
            background: #f8fafc;
            border-radius: 12px;
            padding: 25px;
            margin-top: 30px;
            border: 2px solid #e2e8f0;
        }

        .info-title {
            font-size: 1rem;
            font-weight: 600;
            color: var(--dark);
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .info-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .info-list li {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            margin-bottom: 12px;
            font-size: 0.9rem;
            color: var(--secondary);
        }

        .info-list li:last-child {
            margin-bottom: 0;
        }

        .info-list i {
            color: var(--primary);
            margin-top: 2px;
        }

       
        .loading-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(255, 255, 255, 0.9);
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 20px;
            z-index: 1000;
            display: none;
        }

        .loading-spinner {
            width: 50px;
            height: 50px;
            border: 3px solid #f1f5f9;
            border-top-color: var(--primary);
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }

        
        @media (max-width: 768px) {
            .form-container {
                padding: 25px;
            }
            
            .section-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }
            
            .section-icon {
                width: 45px;
                height: 45px;
                font-size: 1.2rem;
            }
            
            .action-buttons {
                flex-direction: column;
            }
            
            .btn-primary, .btn-outline-secondary {
                width: 100%;
                justify-content: center;
            }
            
            .page-title {
                font-size: 1.7rem;
            }
        }

        
        .status-badge {
            background: rgba(37, 99, 235, 0.1);
            color: var(--primary);
            padding: 8px 16px;
            border-radius: 50px;
            font-size: 0.875rem;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }
    </style>
</head>

<body>
@extends('dashboard.adminrole')

@section('content')
<div class="container-fluid py-4">
   
    <div class="page-header">
        <div class="d-flex align-items-center justify-content-between">
            <div>
                <h1 class="page-title">
                    <i class="fas fa-truck-loading" style="color: var(--primary);"></i>
                    Add New Supplier
                </h1>
                <p class="page-subtitle">
                    Fill in the supplier details below. All fields marked with <span class="text-danger">*</span> are required.
                </p>
            </div>
            <div class="status-badge">
                <i class="fas fa-id-card"></i> New Supplier Form
            </div>
        </div>
    </div>

   
    @if(session('success'))
        <div class="alert alert-success">
            <i class="fas fa-check-circle"></i>
            {{ session('success') }}
        </div>
    @endif

   
    <div class="form-container">
        <div class="loading-overlay" id="loadingOverlay">
            <div class="loading-spinner"></div>
        </div>

        <form action="{{ route('supplier.store') }}" method="POST" id="supplierForm" class="needs-validation" novalidate>
            @csrf

           
            <div class="two-column-layout">
               
                <div class="form-section">
                    <div class="section-header">
                        <div class="section-icon">
                            <i class="fas fa-user-tie"></i>
                        </div>
                        <div>
                            <h3 class="section-title">Supplier Details</h3>
                            <p class="section-subtitle">Basic contact and company information</p>
                        </div>
                    </div>

                    
                    <div class="form-group">
                        <label class="form-label required">
                            <i class="fas fa-user-circle"></i>
                            Supplier Name
                        </label>
                        <div class="input-with-icon">
                            <i class="fas fa-user"></i>
                            <input type="text" name="name"
                                   class="form-control @error('name') is-invalid @enderror"
                                   value="{{ old('name') }}"
                                   placeholder="Enter full supplier name"
                                   required>
                        </div>
                        @error('name')
                            <div class="invalid-feedback">
                                <i class="fas fa-exclamation-circle"></i> {{ $message }}
                            </div>
                        @enderror
                        <div class="form-hint">
                            <i class="fas fa-info-circle"></i> Full legal name of the supplier
                        </div>
                    </div>

                    
                    <div class="form-group">
                        <label class="form-label required">
                            <i class="fas fa-envelope"></i>
                            Email Address
                        </label>
                        <div class="input-with-icon">
                            <i class="fas fa-at"></i>
                            <input type="email" name="email"
                                   class="form-control @error('email') is-invalid @enderror"
                                   value="{{ old('email') }}"
                                   placeholder="supplier@example.com"
                                   required>
                        </div>
                        @error('email')
                            <div class="invalid-feedback">
                                <i class="fas fa-exclamation-circle"></i> {{ $message }}
                            </div>
                        @enderror
                        <div class="form-hint">
                            <i class="fas fa-info-circle"></i> Primary contact email
                        </div>
                    </div>

                    
                    <div class="form-group">
                        <label class="form-label">
                            <i class="fas fa-phone"></i>
                            Phone Number
                        </label>
                        <div class="input-with-icon">
                            <i class="fas fa-phone-alt"></i>
                            <input type="text" name="phone"
                                   class="form-control @error('phone') is-invalid @enderror"
                                   value="{{ old('phone') }}"
                                   placeholder="+1 (555) 123-4567">
                        </div>
                        @error('phone')
                            <div class="invalid-feedback">
                                <i class="fas fa-exclamation-circle"></i> {{ $message }}
                            </div>
                        @enderror
                        <div class="form-hint">
                            <i class="fas fa-info-circle"></i> Include country code if international
                        </div>
                    </div>

                   
                    <div class="form-group">
                        <label class="form-label">
                            <i class="fas fa-building"></i>
                            Company Name
                        </label>
                        <div class="input-with-icon">
                            <i class="fas fa-briefcase"></i>
                            <input type="text" name="company"
                                   class="form-control @error('company') is-invalid @enderror"
                                   value="{{ old('company') }}"
                                   placeholder="Enter company/organization name">
                        </div>
                        @error('company')
                            <div class="invalid-feedback">
                                <i class="fas fa-exclamation-circle"></i> {{ $message }}
                            </div>
                        @enderror
                        <div class="form-hint">
                            <i class="fas fa-info-circle"></i> Legal business entity name
                        </div>
                    </div>

                   
                    <div class="form-group">
                        <label class="form-label">
                            <i class="fas fa-tags"></i>
                            Supplier Category
                        </label>
                        <div class="input-with-icon">
                            <i class="fas fa-tag"></i>
                            <select name="category" class="form-select @error('category') is-invalid @enderror">
                                <option value="">Select category</option>
                                <option value="wholesale" {{ old('category') == 'wholesale' ? 'selected' : '' }}>Wholesale</option>
                                <option value="manufacturer" {{ old('category') == 'manufacturer' ? 'selected' : '' }}>Manufacturer</option>
                                <option value="distributor" {{ old('category') == 'distributor' ? 'selected' : '' }}>Distributor</option>
                                <option value="retail" {{ old('category') == 'retail' ? 'selected' : '' }}>Retail</option>
                                <option value="service" {{ old('category') == 'service' ? 'selected' : '' }}>Service Provider</option>
                                <option value="other" {{ old('category') == 'other' ? 'selected' : '' }}>Other</option>
                            </select>
                        </div>
                        @error('category')
                            <div class="invalid-feedback">
                                <i class="fas fa-exclamation-circle"></i> {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

               
                <div class="form-section">
                    <div class="section-header">
                        <div class="section-icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div>
                            <h3 class="section-title">Address Details</h3>
                            <p class="section-subtitle">Complete location information</p>
                        </div>
                    </div>

                    
                    <div class="form-group">
                        <label class="form-label">
                            <i class="fas fa-home"></i>
                            House / Building
                        </label>
                        <div class="input-with-icon">
                            <i class="fas fa-building"></i>
                            <input type="text" name="house"
                                   class="form-control @error('house') is-invalid @enderror"
                                   value="{{ old('house') }}"
                                   placeholder="House no / Building name / Unit">
                        </div>
                        @error('house')
                            <div class="invalid-feedback">
                                <i class="fas fa-exclamation-circle"></i> {{ $message }}
                            </div>
                        @enderror
                    </div>

                    
                    <div class="form-group">
                        <label class="form-label">
                            <i class="fas fa-road"></i>
                            Street
                        </label>
                        <div class="input-with-icon">
                            <i class="fas fa-street-view"></i>
                            <input type="text" name="street"
                                   class="form-control @error('street') is-invalid @enderror"
                                   value="{{ old('street') }}"
                                   placeholder="Street name / Road">
                        </div>
                        @error('street')
                            <div class="invalid-feedback">
                                <i class="fas fa-exclamation-circle"></i> {{ $message }}
                            </div>
                        @enderror
                    </div>

                   
                    <div class="form-group">
                        <label class="form-label">
                            <i class="fas fa-city"></i>
                            City
                        </label>
                        <div class="input-with-icon">
                            <i class="fas fa-city"></i>
                            <input type="text" name="city"
                                   class="form-control @error('city') is-invalid @enderror"
                                   value="{{ old('city') }}"
                                   placeholder="City / Town">
                        </div>
                        @error('city')
                            <div class="invalid-feedback">
                                <i class="fas fa-exclamation-circle"></i> {{ $message }}
                            </div>
                        @enderror
                    </div>

                   
                    <div class="form-group">
                        <label class="form-label">
                            <i class="fas fa-map"></i>
                            Province / State
                        </label>
                        <div class="input-with-icon">
                            <i class="fas fa-landmark"></i>
                            <input type="text" name="province"
                                   class="form-control @error('province') is-invalid @enderror"
                                   value="{{ old('province') }}"
                                   placeholder="Province / State / Region">
                        </div>
                        @error('province')
                            <div class="invalid-feedback">
                                <i class="fas fa-exclamation-circle"></i> {{ $message }}
                            </div>
                        @enderror
                    </div>

                   
                    <div class="form-group">
                        <label class="form-label">
                            <i class="fas fa-flag"></i>
                            Country
                        </label>
                        <div class="input-with-icon">
                            <i class="fas fa-globe"></i>
                            <select name="country" class="form-select @error('country') is-invalid @enderror">
                                <option value="">Select country</option>
                                <option value="US" {{ old('country') == 'US' ? 'selected' : '' }}>United States</option>
                                <option value="CA" {{ old('country') == 'CA' ? 'selected' : '' }}>Canada</option>
                                <option value="GB" {{ old('country') == 'GB' ? 'selected' : '' }}>United Kingdom</option>
                                <option value="AU" {{ old('country') == 'AU' ? 'selected' : '' }}>Australia</option>
                                <option value="DE" {{ old('country') == 'DE' ? 'selected' : '' }}>Germany</option>
                                <option value="FR" {{ old('country') == 'FR' ? 'selected' : '' }}>France</option>
                                <option value="JP" {{ old('country') == 'JP' ? 'selected' : '' }}>Japan</option>
                                <option value="CN" {{ old('country') == 'CN' ? 'selected' : '' }}>China</option>
                                <option value="IN" {{ old('country') == 'IN' ? 'selected' : '' }}>India</option>
                                <option value="other" {{ old('country') == 'other' ? 'selected' : '' }}>Other</option>
                            </select>
                        </div>
                        @error('country')
                            <div class="invalid-feedback">
                                <i class="fas fa-exclamation-circle"></i> {{ $message }}
                            </div>
                        @enderror
                    </div>

                   
                    <div class="form-group">
                        <label class="form-label">
                            <i class="fas fa-mail-bulk"></i>
                            Postal Code
                        </label>
                        <div class="input-with-icon">
                            <i class="fas fa-envelope"></i>
                            <input type="text" name="postal_code"
                                   class="form-control @error('postal_code') is-invalid @enderror"
                                   value="{{ old('postal_code') }}"
                                   placeholder="ZIP / Postal Code">
                        </div>
                        @error('postal_code')
                            <div class="invalid-feedback">
                                <i class="fas fa-exclamation-circle"></i> {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
            </div>

          
            <div class="additional-info">
                <h5 class="info-title">
                    <i class="fas fa-lightbulb"></i>
                    Important Notes
                </h5>
                <div class="row">
                    <div class="col-md-8">
                        <ul class="info-list">
                            <li>
                                <i class="fas fa-check-circle"></i>
                                <span>All required fields are marked with <span class="text-danger">*</span></span>
                            </li>
                            <li>
                                <i class="fas fa-check-circle"></i>
                                <span>Suppliers will be automatically added to your supplier directory</span>
                            </li>
                            <li>
                                <i class="fas fa-check-circle"></i>
                                <span>You can edit supplier details later from the supplier management page</span>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-4 text-md-end">
                        <div class="text-muted small">
                            <i class="fas fa-history me-1"></i>
                            Form ID: {{ strtoupper(uniqid()) }}
                        </div>
                    </div>
                </div>
            </div>

            
            <div class="action-buttons">
                <button type="submit" class="btn btn-primary" id="submitBtn">
                    <i class="fas fa-plus-circle"></i> Add Supplier
                </button>
                <button type="reset" class="btn btn-outline-secondary" onclick="clearForm()">
                    <i class="fas fa-redo"></i> Reset Form
                </button>
                <button type="button" class="btn btn-outline-primary" onclick="saveDraft()">
                    <i class="fas fa-save"></i> Save as Draft
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    
    (function() {
        'use strict';
        const forms = document.querySelectorAll('.needs-validation');
        
        Array.prototype.slice.call(forms).forEach(function(form) {
            form.addEventListener('submit', function(event) {
                if (!form.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();
                    
                   
                    const invalidFields = form.querySelectorAll(':invalid');
                    invalidFields.forEach(field => {
                        field.classList.add('animate__animated', 'animate__shakeX');
                        setTimeout(() => {
                            field.classList.remove('animate__animated', 'animate__shakeX');
                        }, 1000);
                    });
                }
                
                form.classList.add('was-validated');
                
               
                if (form.checkValidity()) {
                    document.getElementById('loadingOverlay').style.display = 'flex';
                    document.getElementById('submitBtn').innerHTML = '<i class="fas fa-spinner fa-spin"></i> Processing...';
                    document.getElementById('submitBtn').disabled = true;
                }
            }, false);
        });
    })();

    
    function clearForm() {
        if (confirm('Are you sure you want to clear all form fields?')) {
            document.getElementById('supplierForm').reset();
            
           
            const form = document.getElementById('supplierForm');
            form.classList.remove('was-validated');
            
            
            const invalidFields = form.querySelectorAll('.is-invalid');
            invalidFields.forEach(field => {
                field.classList.remove('is-invalid');
            });
            
           
            showToast('Form cleared successfully!', 'success');
        }
    }

    
    function saveDraft() {
       
        const formData = new FormData(document.getElementById('supplierForm'));
        
        
        const name = formData.get('name');
        const email = formData.get('email');
        
        if (!name || !email) {
            showToast('Please fill in at least name and email to save as draft', 'warning');
            return;
        }
        
       
        const draft = {
            name: name,
            email: email,
            phone: formData.get('phone'),
            company: formData.get('company'),
            category: formData.get('category'),
            house: formData.get('house'),
            street: formData.get('street'),
            city: formData.get('city'),
            province: formData.get('province'),
            country: formData.get('country'),
            postal_code: formData.get('postal_code'),
            timestamp: new Date().toISOString()
        };
        
        localStorage.setItem('supplierDraft', JSON.stringify(draft));
        showToast('Draft saved successfully!', 'success');
    }

    
    document.addEventListener('DOMContentLoaded', function() {
        const savedDraft = localStorage.getItem('supplierDraft');
        if (savedDraft) {
            const draft = JSON.parse(savedDraft);
            const confirmLoad = confirm('You have a saved draft from ' + new Date(draft.timestamp).toLocaleString() + 
                                       '\n\nDo you want to load it?');
            
            if (confirmLoad) {
               
                document.querySelector('input[name="name"]').value = draft.name || '';
                document.querySelector('input[name="email"]').value = draft.email || '';
                document.querySelector('input[name="phone"]').value = draft.phone || '';
                document.querySelector('input[name="company"]').value = draft.company || '';
                document.querySelector('select[name="category"]').value = draft.category || '';
                document.querySelector('input[name="house"]').value = draft.house || '';
                document.querySelector('input[name="street"]').value = draft.street || '';
                document.querySelector('input[name="city"]').value = draft.city || '';
                document.querySelector('input[name="province"]').value = draft.province || '';
                document.querySelector('select[name="country"]').value = draft.country || '';
                document.querySelector('input[name="postal_code"]').value = draft.postal_code || '';
                
                showToast('Draft loaded successfully!', 'success');
            }
        }
    });

   
    function showToast(message, type = 'info') {
        
        const existingToast = document.querySelector('.custom-toast');
        if (existingToast) {
            existingToast.remove();
        }
        
       
        const toast = document.createElement('div');
        toast.className = `custom-toast alert alert-${type} fixed-top m-3`;
        toast.style.cssText = `
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 9999;
            padding: 15px 20px;
            border-radius: 10px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.15);
            animation: slideInRight 0.3s ease;
            max-width: 400px;
        `;
        
        
        let icon = 'info-circle';
        if (type === 'success') icon = 'check-circle';
        if (type === 'warning') icon = 'exclamation-triangle';
        if (type === 'danger') icon = 'times-circle';
        
        toast.innerHTML = `
            <i class="fas fa-${icon} me-2"></i>
            ${message}
            <button type="button" class="btn-close btn-close-white ms-3" onclick="this.parentElement.remove()"></button>
        `;
        
        document.body.appendChild(toast);
        
        
        setTimeout(() => {
            if (toast.parentElement) {
                toast.style.animation = 'slideOutRight 0.3s ease';
                setTimeout(() => toast.remove(), 300);
            }
        }, 5000);
    }

    
    const style = document.createElement('style');
    style.textContent = `
        @keyframes slideInRight {
            from { transform: translateX(100%); opacity: 0; }
            to { transform: translateX(0); opacity: 1; }
        }
        
        @keyframes slideOutRight {
            from { transform: translateX(0); opacity: 1; }
            to { transform: translateX(100%); opacity: 0; }
        }
        
        .custom-toast {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: white;
            border: none;
        }
        
        .custom-toast.alert-success {
            background: linear-gradient(135deg, #10b981, #059669);
        }
        
        .custom-toast.alert-warning {
            background: linear-gradient(135deg, #f59e0b, #d97706);
        }
        
        .custom-toast.alert-danger {
            background: linear-gradient(135deg, #ef4444, #dc2626);
        }
    `;
    document.head.appendChild(style);

    
    document.querySelector('input[name="phone"]').addEventListener('input', function(e) {
        let value = e.target.value.replace(/\D/g, '');
        if (value.length > 0) {
            value = value.match(new RegExp('.{1,4}', 'g')).join(' ');
        }
        e.target.value = value;
    });
</script>
@endsection
</body>
</html>