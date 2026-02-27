<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Supplier</title>
    
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        :root {
            --primary-color: #4361ee;
            --primary-light: #eef2ff;
            --secondary-color: #6c757d;
            --danger-color: #dc3545;
            --success-color: #28a745;
            --card-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            --border-radius: 8px;
        }
        
        body {
            background-color: #f5f7fb;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #333;
            line-height: 1.5;
        }
        
        .admin-wrapper {
            padding: 20px;
            max-width: 1400px;
            margin: 0 auto;
        }
        
        
        .page-header {
            background: white;
            padding: 20px 30px;
            border-radius: var(--border-radius);
            margin-bottom: 25px;
            box-shadow: var(--card-shadow);
            border-left: 4px solid var(--primary-color);
        }
        
        .page-title {
            color: #2c3e50;
            font-weight: 600;
            margin-bottom: 8px;
            display: flex;
            align-items: center;
        }
        
        .page-title i {
            background: var(--primary-light);
            color: var(--primary-color);
            width: 40px;
            height: 40px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 12px;
        }
        
        .page-subtitle {
            color: #6c757d;
            font-size: 0.95rem;
            margin-bottom: 0;
        }
        
        .required-star {
            color: var(--danger-color);
        }
        
        
        .form-container {
            background: white;
            border-radius: var(--border-radius);
            padding: 0;
            box-shadow: var(--card-shadow);
            overflow: hidden;
        }
        
        .form-header {
            padding: 25px 30px;
            border-bottom: 1px solid #eaeaea;
            background: #f8f9fa;
        }
        
        .form-title {
            color: #2c3e50;
            font-weight: 600;
            font-size: 1.25rem;
            margin: 0;
        }
        
        .form-description {
            color: #6c757d;
            font-size: 0.9rem;
            margin: 5px 0 0 0;
        }
        
        .form-body {
            padding: 30px;
        }
        
        .two-column-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 40px;
        }
        
        .form-section {
            margin-bottom: 0;
        }
        
        .section-header {
            margin-bottom: 25px;
        }
        
        .section-title {
            color: #2c3e50;
            font-weight: 600;
            font-size: 1.1rem;
            margin-bottom: 8px;
            display: flex;
            align-items: center;
        }
        
        .section-title i {
            background: var(--primary-light);
            color: var(--primary-color);
            width: 32px;
            height: 32px;
            border-radius: 6px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 10px;
            font-size: 0.9rem;
        }
        
        .section-description {
            color: #6c757d;
            font-size: 0.85rem;
            margin: 0;
        }
        
        
        .form-group {
            margin-bottom: 25px;
        }
        
        .form-label {
            font-weight: 500;
            color: #495057;
            margin-bottom: 8px;
            display: block;
            font-size: 0.95rem;
        }
        
        .form-control {
            border: 1px solid #dee2e6;
            border-radius: 6px;
            padding: 12px 16px;
            font-size: 0.95rem;
            transition: all 0.3s;
            height: 46px;
        }
        
        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.25rem rgba(67, 97, 238, 0.15);
        }
        
        .is-invalid {
            border-color: var(--danger-color);
        }
        
        .invalid-feedback {
            font-size: 0.85rem;
            margin-top: 5px;
        }
        
        .form-control::placeholder {
            color: #adb5bd;
            font-size: 0.9rem;
        }
        
        .form-hint {
            color: #6c757d;
            font-size: 0.8rem;
            margin-top: 5px;
            display: block;
        }
        
        
        .form-footer {
            padding: 25px 30px;
            background: #f8f9fa;
            border-top: 1px solid #eaeaea;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 15px;
        }
        
        .supplier-meta {
            display: flex;
            gap: 30px;
            flex-wrap: wrap;
        }
        
        .meta-item {
            display: flex;
            flex-direction: column;
        }
        
        .meta-label {
            font-size: 0.8rem;
            color: #6c757d;
            margin-bottom: 3px;
        }
        
        .meta-value {
            font-weight: 600;
            color: #2c3e50;
            font-size: 1rem;
        }
        
        .form-actions {
            display: flex;
            gap: 12px;
        }
        
        .btn {
            padding: 10px 24px;
            border-radius: 6px;
            font-weight: 500;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            transition: all 0.3s;
            font-size: 0.95rem;
        }
        
        .btn-primary {
            background: var(--primary-color);
            border: 1px solid var(--primary-color);
        }
        
        .btn-primary:hover {
            background: #3a56d4;
            border-color: #3a56d4;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(67, 97, 238, 0.2);
        }
        
        .btn-secondary {
            background: white;
            border: 1px solid #dee2e6;
            color: #495057;
        }
        
        .btn-secondary:hover {
            background: #f8f9fa;
            border-color: #adb5bd;
        }
        
        
        .alert-success {
            background-color: #f0fff4;
            border: 1px solid #d4edda;
            border-left: 4px solid var(--success-color);
            color: #155724;
            border-radius: 6px;
            padding: 15px 20px;
            margin-bottom: 25px;
            display: flex;
            align-items: center;
        }
        
        .alert-success i {
            margin-right: 10px;
            font-size: 1.1rem;
        }
        
       
        @media (max-width: 992px) {
            .two-column-grid {
                grid-template-columns: 1fr;
                gap: 30px;
            }
            
            .form-header,
            .form-body,
            .form-footer {
                padding: 20px;
            }
        }
        
        @media (max-width: 768px) {
            .admin-wrapper {
                padding: 15px;
            }
            
            .page-header {
                padding: 20px;
            }
            
            .supplier-meta {
                flex-direction: column;
                gap: 15px;
            }
            
            .form-actions {
                width: 100%;
                justify-content: flex-start;
            }
        }
        
        
        .helper-text {
            color: #6c757d;
            font-size: 0.85rem;
            margin-top: 5px;
            line-height: 1.4;
        }
        
        
        .input-group-phone {
            display: flex;
            gap: 10px;
        }
        
        .country-code {
            flex: 0 0 120px;
        }
        
        .phone-number {
            flex: 1;
        }
    </style>
</head>
<body>
    @extends('dashboard.adminrole')

    @section('content')
    <div class="admin-wrapper">
        
        
        <div class="page-header">
            <div class="d-flex justify-content-between align-items-center flex-wrap">
                <div>
                    <h1 class="page-title">
                        <i class="fas fa-user-edit"></i>
                        Edit Supplier
                    </h1>
                    <p class="page-subtitle">Update supplier information. Fields marked with <span class="required-star">*</span> are required.</p>
                </div>
            </div>
        </div>
        
        
        @if(session('success'))
            <div class="alert-success">
                <i class="fas fa-check-circle"></i>
                {{ session('success') }}
            </div>
        @endif
        
       
        <form action="{{ route('supplier.updatesuppliers', $supplier->id) }}" method="POST" class="form-container">
            @csrf
            @method('PUT')
            
            
            <div class="form-header">
                <h2 class="form-title">Edit Supplier</h2>
                <p class="form-description">Update the supplier details below. All fields marked with <span class="required-star">*</span> are required.</p>
            </div>
            
            
            <div class="form-body">
                <div class="two-column-grid">
                    
                
                    <div class="form-section">
                        <div class="section-header">
                            <h3 class="section-title">
                                <i class="fas fa-id-card"></i>
                                Supplier Details
                            </h3>
                            <p class="section-description">Basic contact and company information</p>
                        </div>
                        
                        
                        <div class="form-group">
                            <label for="name" class="form-label">
                                Supplier Name <span class="required-star">*</span>
                            </label>
                            <input type="text" 
                                   name="name" 
                                   id="name"
                                   class="form-control @error('name') is-invalid @enderror"
                                   value="{{ old('name', $supplier->name) }}"
                                   placeholder="Enter full supplier name"
                                   required>
                            <span class="helper-text">Full legal name of the supplier</span>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        
                        <div class="form-group">
                            <label for="email" class="form-label">
                                Email Address <span class="required-star">*</span>
                            </label>
                            <input type="email" 
                                   name="email" 
                                   id="email"
                                   class="form-control @error('email') is-invalid @enderror"
                                   value="{{ old('email', $supplier->email) }}"
                                   placeholder="supplier@example.com"
                                   required>
                            <span class="helper-text">Primary contact email</span>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        
                        <div class="form-group">
                            <label for="phone" class="form-label">Phone Number</label>
                            <div class="input-group-phone">
                                <select class="form-control country-code" name="country_code" id="country_code">
                                    <option value="+1">+1 (USA)</option>
                                    <option value="+44">+44 (UK)</option>
                                    <option value="+91">+91 (India)</option>
                                    <option value="+971">+971 (UAE)</option>
                                    <option value="+966">+966 (KSA)</option>
                                </select>
                                <input type="text" 
                                       name="phone" 
                                       id="phone"
                                       class="form-control phone-number @error('phone') is-invalid @enderror"
                                       value="{{ old('phone', $supplier->phone) }}"
                                       placeholder="(555) 123-4567">
                            </div>
                            <span class="helper-text">Include country code if international</span>
                            @error('phone')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        
                        <div class="form-group">
                            <label for="company" class="form-label">Company</label>
                            <input type="text" 
                                   name="company" 
                                   id="company"
                                   class="form-control @error('company') is-invalid @enderror"
                                   value="{{ old('company', $supplier->company) }}"
                                   placeholder="Enter company name">
                            <span class="helper-text">Company or business name (if applicable)</span>
                            @error('company')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    
                    <div class="form-section">
                        <div class="section-header">
                            <h3 class="section-title">
                                <i class="fas fa-map-marker-alt"></i>
                                Address Details
                            </h3>
                            <p class="section-description">Complete location information</p>
                        </div>
                        
                        
                        <div class="form-group">
                            <label for="house" class="form-label">House / Building</label>
                            <input type="text" 
                                   name="house" 
                                   id="house"
                                   class="form-control @error('house') is-invalid @enderror"
                                   value="{{ old('house', $supplier->house) }}"
                                   placeholder="House no / Building name / Unit">
                            <span class="helper-text">House number, building name, or unit number</span>
                            @error('house')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        
                        <div class="form-group">
                            <label for="street" class="form-label">Street</label>
                            <input type="text" 
                                   name="street" 
                                   id="street"
                                   class="form-control @error('street') is-invalid @enderror"
                                   value="{{ old('street', $supplier->street) }}"
                                   placeholder="Street name / Road">
                            <span class="helper-text">Street name, road, or avenue</span>
                            @error('street')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        
                        <div class="form-group">
                            <label for="city" class="form-label">City</label>
                            <input type="text" 
                                   name="city" 
                                   id="city"
                                   class="form-control @error('city') is-invalid @enderror"
                                   value="{{ old('city', $supplier->city) }}"
                                   placeholder="City / Town">
                            <span class="helper-text">City or town name</span>
                            @error('city')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        
                        <div class="form-group">
                            <label for="province" class="form-label">Province / State</label>
                            <input type="text" 
                                   name="province" 
                                   id="province"
                                   class="form-control @error('province') is-invalid @enderror"
                                   value="{{ old('province', $supplier->province) }}"
                                   placeholder="Province / State / Region">
                            <span class="helper-text">Province, state, or region</span>
                            @error('province')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            
           
            <div class="form-footer">
                <div class="supplier-meta">
                    <div class="meta-item">
                        <span class="meta-label">SUPPLIER ID</span>
                        <span class="meta-value">SUP-{{ str_pad($supplier->id, 5, '0', STR_PAD_LEFT) }}</span>
                    </div>
                    <div class="meta-item">
                        <span class="meta-label">LAST UPDATED</span>
                        <span class="meta-value">{{ date('M d, Y', strtotime($supplier->updated_at)) }}</span>
                    </div>
                </div>
                
                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i>
                        Update Supplier
                    </button>
                     <div class="mt-2 mt-md-0">
                    <a href="{{ route('dashboard.supplierslist') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left me-2"></i> Back to Suppliers
                    </a>
                     <button type="reset" class="btn btn-secondary">
                        <i class="fas fa-redo"></i>
                        Reset
                    </button>
                </div>
                </div>
            </div>
        </form>
    </div>
    
   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            
            const phoneInput = document.getElementById('phone');
            if (phoneInput) {
                phoneInput.addEventListener('input', function(e) {
                    let value = e.target.value.replace(/\D/g, '');
                    if (value.length > 0) {
                        if (value.length <= 3) {
                            e.target.value = value;
                        } else if (value.length <= 6) {
                            e.target.value = '(' + value.substring(0, 3) + ') ' + value.substring(3);
                        } else {
                            e.target.value = '(' + value.substring(0, 3) + ') ' + value.substring(3, 6) + '-' + value.substring(6, 10);
                        }
                    }
                });
            }
            
            
            const form = document.querySelector('form');
            const nameInput = document.getElementById('name');
            const emailInput = document.getElementById('email');
            
            if (form) {
                form.addEventListener('submit', function(e) {
                    let hasError = false;
                    
                    
                    if (nameInput.value.trim() === '') {
                        nameInput.classList.add('is-invalid');
                        if (!nameInput.nextElementSibling.nextElementSibling.classList.contains('invalid-feedback')) {
                            const errorDiv = document.createElement('div');
                            errorDiv.className = 'invalid-feedback';
                            errorDiv.textContent = 'Supplier name is required.';
                            nameInput.parentNode.appendChild(errorDiv);
                        }
                        hasError = true;
                    }
                    
                   
                    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                    if (emailInput.value.trim() === '' || !emailRegex.test(emailInput.value)) {
                        emailInput.classList.add('is-invalid');
                        if (!emailInput.nextElementSibling.nextElementSibling.classList.contains('invalid-feedback')) {
                            const errorDiv = document.createElement('div');
                            errorDiv.className = 'invalid-feedback';
                            errorDiv.textContent = 'Valid email address is required.';
                            emailInput.parentNode.appendChild(errorDiv);
                        }
                        hasError = true;
                    }
                    
                    if (hasError) {
                        e.preventDefault();
                
                        const firstError = document.querySelector('.is-invalid');
                        if (firstError) {
                            firstError.scrollIntoView({ behavior: 'smooth', block: 'center' });
                        }
                    }
                });
                
                
                nameInput.addEventListener('input', function() {
                    if (this.value.trim() !== '') {
                        this.classList.remove('is-invalid');
                        const errorDiv = this.parentNode.querySelector('.invalid-feedback');
                        if (errorDiv) {
                            errorDiv.remove();
                        }
                    }
                });
                
                emailInput.addEventListener('input', function() {
                    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                    if (this.value.trim() !== '' && emailRegex.test(this.value)) {
                        this.classList.remove('is-invalid');
                        const errorDiv = this.parentNode.querySelector('.invalid-feedback');
                        if (errorDiv) {
                            errorDiv.remove();
                        }
                    }
                });
            }
            
            
            const countryCodeSelect = document.getElementById('country_code');
            const currentPhone = phoneInput ? phoneInput.value : '';
            
            if (currentPhone) {
                
                if (currentPhone.startsWith('+1')) {
                    countryCodeSelect.value = '+1';
                } else if (currentPhone.startsWith('+44')) {
                    countryCodeSelect.value = '+44';
                } else if (currentPhone.startsWith('+91')) {
                    countryCodeSelect.value = '+91';
                }
            }
            
           
            if (countryCodeSelect && phoneInput) {
                countryCodeSelect.addEventListener('change', function() {
                    const code = this.value;
                    if (code === '+1') {
                        phoneInput.placeholder = '(555) 123-4567';
                    } else if (code === '+44') {
                        phoneInput.placeholder = '20 7946 0958';
                    } else if (code === '+91') {
                        phoneInput.placeholder = '98765 43210';
                    } else {
                        phoneInput.placeholder = 'Phone number';
                    }
                });
            }
        });
    </script>
    @endsection
</body>
</html>