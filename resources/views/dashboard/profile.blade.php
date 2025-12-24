<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-blue: #0d6efd;
            --secondary-blue: #1d4ed8;
            --light-blue: #e3f2fd;
            --success-green: #10b981;
            --warning-orange: #f59e0b;
            --danger-red: #ef4444;
            --dark-gray: #1f2937;
            --light-gray: #f9fafb;
            --border-color: #e5e7eb;
            --card-shadow: 0 10px 40px rgba(0, 0, 0, 0.08);
            --gradient-primary: linear-gradient(135deg, #0d6efd, #4dabff);
            --gradient-secondary: linear-gradient(135deg, #667eea, #764ba2);
        }

        body {
            background: linear-gradient(135deg, #f0f5ff 0%, #f8fafc 100%);
            min-height: 100vh;
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            padding-bottom: 40px;
        }

        
        .profile-container {
            max-width: 1000px;
            margin: 0 auto;
            padding: 20px;
        }

        
        .profile-card {
            background: white;
            border-radius: 24px;
            box-shadow: var(--card-shadow);
            overflow: hidden;
            position: relative;
            animation: fadeInUp 0.6s ease;
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

       
        .profile-header {
            background: linear-gradient(135deg, var(--primary-blue), var(--secondary-blue));
            padding: 40px;
            color: white;
            position: relative;
            overflow: hidden;
        }

        .profile-header::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 300px;
            height: 300px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
        }

        .profile-header::after {
            content: '';
            position: absolute;
            bottom: -30%;
            right: 10%;
            width: 200px;
            height: 200px;
            background: rgba(255, 255, 255, 0.05);
            border-radius: 50%;
        }

      
        .profile-avatar {
            position: relative;
            z-index: 2;
            text-align: center;
            margin-bottom: 20px;
        }

        .avatar-circle {
            width: 140px;
            height: 140px;
            background: linear-gradient(135deg, white, #f8fafc);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto;
            position: relative;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
            border: 6px solid white;
        }

        .avatar-circle i {
            font-size: 60px;
            background: linear-gradient(135deg, var(--primary-blue), var(--secondary-blue));
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        .avatar-ring {
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

        .customer-id {
            background: rgba(255, 255, 255, 0.2);
            padding: 6px 20px;
            border-radius: 20px;
            font-size: 14px;
            font-weight: 600;
            display: inline-block;
            margin-top: 15px;
            backdrop-filter: blur(10px);
        }

        
        .profile-info {
            padding: 40px;
            position: relative;
            z-index: 1;
        }

       
        .info-section {
            margin-bottom: 40px;
        }

        .section-header {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 25px;
            padding-bottom: 12px;
            border-bottom: 2px solid var(--border-color);
        }

        .section-icon {
            width: 50px;
            height: 50px;
            background: linear-gradient(135deg, var(--primary-blue), var(--secondary-blue));
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 22px;
        }

        .section-title {
            font-size: 24px;
            font-weight: 700;
            color: var(--dark-gray);
            margin: 0;
        }

       
        .info-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 25px;
        }

        .info-item {
            background: var(--light-gray);
            border-radius: 16px;
            padding: 20px;
            border: 1px solid var(--border-color);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .info-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
            border-color: var(--primary-blue);
        }

        .info-item::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 6px;
            height: 100%;
            background: linear-gradient(180deg, var(--primary-blue), #4dabff);
            border-radius: 6px 0 0 6px;
        }

        .info-label {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 14px;
            font-weight: 600;
            color: #6b7280;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 8px;
        }

        .info-label i {
            color: var(--primary-blue);
            font-size: 16px;
        }

        .info-value {
            font-size: 18px;
            font-weight: 600;
            color: var(--dark-gray);
            line-height: 1.4;
            word-break: break-word;
        }

        .info-value.email {
            color: var(--primary-blue);
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .info-value.email:hover {
            color: var(--secondary-blue);
        }

        
        .address-card {
            background: linear-gradient(135deg, #f8fafc, #f1f5f9);
            border-radius: 16px;
            padding: 25px;
            border: 2px dashed var(--border-color);
            margin-top: 10px;
        }

        .address-icon {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, #f59e0b, #d97706);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 24px;
            margin-bottom: 20px;
        }

        .address-lines {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .address-line {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 16px;
            color: var(--dark-gray);
            font-weight: 500;
        }

        .address-line i {
            color: var(--warning-orange);
            width: 20px;
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
            text-align: center;
        }

        .btn-primary-modern {
            background: linear-gradient(135deg, var(--primary-blue), var(--secondary-blue));
            color: white;
            box-shadow: 0 6px 20px rgba(13, 110, 253, 0.25);
        }

        .btn-primary-modern:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(13, 110, 253, 0.35);
            color: white;
        }

        .btn-secondary-modern {
            background: white;
            color: var(--primary-blue);
            border: 2px solid var(--border-color);
        }

        .btn-secondary-modern:hover {
            background: var(--light-blue);
            border-color: var(--primary-blue);
            transform: translateY(-3px);
            color: var(--primary-blue);
        }

        .btn-danger-modern {
            background: linear-gradient(135deg, var(--danger-red), #dc2626);
            color: white;
            box-shadow: 0 6px 20px rgba(239, 68, 68, 0.25);
        }

        .btn-danger-modern:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(239, 68, 68, 0.35);
            color: white;
        }

        
        .stats-section {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-bottom: 40px;
        }

         .stat-card {
            background: #1f2937 !important;   
            border-radius: 16px;
            padding: 25px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
            text-align: center;
            transition: all 0.3s ease;
            border: 1px solid var(--border-color);
            height: 160px;
            position: relative;
            z-index: 2;
         }

 
        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
        }

        .stat-icon {
            width: 60px;
            height: 60px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            color: white;
            margin: 0 auto 15px;
            margin-bottom: 12px;
            
        }

        .stat-number {
            font-size: 20px;
            font-weight: 600;
            color: var(--dark-gray);
            line-height: 1;
            margin-bottom: 6px;
            position: relative;
            z-index: 2;
        }

        .stat-label {
            color: #6b7280;
            font-size: 14px;
            font-weight: 600;
            position: relative;
            z-index: 2;
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
            background: var(--light-blue);
            border-color: var(--primary-blue);
            transform: translateX(-5px);
            color: var(--primary-blue);
        }

       
        @media (max-width: 768px) {
            .profile-container {
                padding: 10px;
            }
            
            .profile-header {
                padding: 30px 20px;
            }
            
            .profile-info {
                padding: 20px;
            }
            
            .info-grid {
                grid-template-columns: 1fr;
            }
            
            .action-buttons {
                flex-direction: column;
                gap: 10px;
            }
            
            .btn-modern {
                width: 100%;
                justify-content: center;
            }
            
            .stats-section {
                grid-template-columns: 1fr;
            }
            
            .avatar-circle {
                width: 120px;
                height: 120px;
            }
            
            .avatar-circle i {
                font-size: 50px;
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

       
        .loading-skeleton {
            animation: pulse 1.5s ease-in-out infinite;
        }

        @keyframes pulse {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.5; }
        }

       
        .status-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 6px 16px;
            border-radius: 20px;
            font-size: 13px;
            font-weight: 600;
            margin-left: 15px;
        }

        .status-active {
            background: rgba(16, 185, 129, 0.1);
            color: var(--success-green);
        }

        .status-inactive {
            background: rgba(239, 68, 68, 0.1);
            color: var(--danger-red);
        }

        
        @media print {
            .action-buttons,
            .back-button {
                display: none;
            }
            
            .profile-card {
                box-shadow: none;
                border: 1px solid #ddd;
            }
        }
    </style>
</head>
<body>
@extends('dashboard.adminrole')

@section('content')

<div class="profile-container">
   
   

    
    <div class="profile-card">
       
        <div class="profile-header">
            <div class="profile-avatar">
                <div class="avatar-circle">
                    <i class="fas fa-user"></i>
                    <div class="avatar-ring"></div>
                </div>
                <div class="customer-id">
                    ID: {{ $customer->id }}
                </div>
            </div>
            <h1 class="text-center" style="font-size: 32px; font-weight: 800; color: white; margin-bottom: 10px;">
                {{ $customer->name }}
                <span class="status-badge status-active">
                    <i class="fas fa-circle" style="font-size: 8px;"></i> Active
                </span>
            </h1>
            <p class="text-center mb-0" style="opacity: 0.9; font-size: 16px;">
                <i class="fas fa-user-tag me-2"></i>Customer Account
            </p>
        </div>

       
        <div class="profile-info">
           
            <div class="stats-section">
    <div class="stat-card">
        <div class="stat-icon" style="background: linear-gradient(135deg, #3b82f6, #1d4ed8);">
            <i class="fas fa-calendar-day"></i>
        </div>
        <div class="stat-label">Days Active</div>
        <div class="stat-number">--</div>
    </div>

    <div class="stat-card">
        <div class="stat-icon" style="background: linear-gradient(135deg, #10b981, #059669);">
            <i class="fas fa-file-alt"></i>
        </div>
        <div class="stat-label">Documents</div>
        <div class="stat-number">

        </div>
    </div>

    <div class="stat-card">
        <div class="stat-icon" style="background: linear-gradient(135deg, #f59e0b, #d97706);">
            <i class="fas fa-clock"></i>
        </div>
        <div class="stat-label">Joined Date</div>
        <div class="stat-number">
            {{ $customer->created_at->format('M','d', 'Y') }}
        </div>
    </div>

    <div class="stat-card">
        <div class="stat-icon" style="background: linear-gradient(135deg, #8b5cf6, #7c3aed);">
            <i class="fas fa-map-marker-alt"></i>
        </div>
        <div class="stat-label">Location</div>
        <div class="stat-number">{{ $customer->city }}</div>
    </div>
</div>


            
            <div class="info-section">
                <div class="section-header">
                    <div class="section-icon">
                        <i class="fas fa-user-circle"></i>
                    </div>
                    <h2 class="section-title">Basic Information</h2>
                </div>
                
                <div class="info-grid">
                    <div class="info-item">
                        <div class="info-label">
                            <i class="fas fa-user"></i> Full Name
                        </div>
                        <div class="info-value">{{ $customer->name }}</div>
                    </div>
                    
                    <div class="info-item">
                        <div class="info-label">
                            <i class="fas fa-envelope"></i> Email Address
                        </div>
                        <a href="mailto:{{ $customer->email }}" class="info-value email">
                            {{ $customer->email }}
                        </a>
                    </div>
                    
                    <div class="info-item">
                        <div class="info-label">
                            <i class="fas fa-key"></i> Account Type
                        </div>
                        <div class="info-value">Standard Customer</div>
                    </div>
                    
                    <div class="info-item">
                        <div class="info-label">
                            <i class="fas fa-calendar-plus"></i> Member Since
                        </div>
                        <div class="info-value">{{ $customer->created_at->format('F j, Y') }}</div>
                    </div>
                </div>
            </div>

           
            <div class="info-section">
                <div class="section-header">
                    <div class="section-icon">
                        <i class="fas fa-map-marked-alt"></i>
                    </div>
                    <h2 class="section-title">Address Information</h2>
                </div>
                
                <div class="address-card">
                    <div class="address-icon">
                        <i class="fas fa-home"></i>
                    </div>
                    <div class="address-lines">
                        <div class="address-line">
                            <i class="fas fa-building"></i>
                            <span>{{ $customer->house }}</span>
                        </div>
                        <div class="address-line">
                            <i class="fas fa-road"></i>
                            <span>{{ $customer->street }}</span>
                        </div>
                        <div class="address-line">
                            <i class="fas fa-city"></i>
                            <span>{{ $customer->city }}</span>
                        </div>
                        <div class="address-line">
                            <i class="fas fa-map"></i>
                            <span>{{ $customer->province }}</span>
                        </div>
                    </div>
                </div>
            </div>

           
            <div class="info-section">
                <div class="section-header">
                    <div class="section-icon">
                        <i class="fas fa-info-circle"></i>
                    </div>
                    <h2 class="section-title">Additional Information</h2>
                </div>
                
                <div class="info-grid">
                    <div class="info-item">
                        <div class="info-label">
                            <i class="fas fa-database"></i> Account Status
                        </div>
                        <div class="info-value">
                            <span class="status-badge status-active">Active</span>
                        </div>
                    </div>
                    
                    <div class="info-item">
                        <div class="info-label">
                            <i class="fas fa-clock"></i> Last Updated
                        </div>
                        <div class="info-value">{{ $customer->updated_at->format('M d, Y \a\t h:i A') }}</div>
                    </div>
                    
                    <div class="info-item">
                        <div class="info-label">
                            <i class="fas fa-id-card"></i> Customer ID
                        </div>
                        <div class="info-value">CUST-{{ str_pad($customer->id, 6, '0', STR_PAD_LEFT) }}</div>
                    </div>
                    
                    <div class="info-item">
                        <div class="info-label">
                            <i class="fas fa-shield-alt"></i> Verification Status
                        </div>
                        <div class="info-value">
                            <span class="status-badge" style="background: rgba(59, 130, 246, 0.1); color: #3b82f6;">
                                <i class="fas fa-check-circle"></i> Verified
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            
            <div class="action-buttons">

    
    <a href="{{ route('dashboard.index') }}" class="btn-modern btn-secondary-modern">
        <i class="fas fa-arrow-left"></i> Back to Customers
    </a>

   

    
    <a href="{{ route('dashboard.edit', $customer->id) }}" class="btn-modern btn-primary-modern">
        <i class="fas fa-edit"></i> Edit Profile
    </a>

   
   

    
    <a href="#" class="btn-modern btn-danger-modern"
        onclick="return confirm('Are you sure you want to delete this customer?')">
        <i class="fas fa-trash-alt"></i> Delete Account
    </a>

</div>

        </div>
    </div>
</div>




<script>
    
    function copyCustomerId() {
        const customerId = 'CUST-{{ str_pad($customer->id, 6, "0", STR_PAD_LEFT) }}';
        navigator.clipboard.writeText(customerId).then(() => {
            alert('Customer ID copied to clipboard!');
        });
    }

   
  
       
        const infoItems = document.querySelectorAll('.info-item');
        infoItems.forEach(item => {
            item.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-5px)';
            });
            
            item.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0)';
            });
        });

        
        const createdDate = new Date('{{ $customer->created_at }}');
        const updatedDate = new Date('{{ $customer->updated_at }}');
        
        
        const today = new Date();
        const diffTime = Math.abs(today - createdDate);
        const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
        
       
        const daysActive = document.querySelectorAll('.stat-number')[0];
        if (daysActive && daysActive.textContent === '--') {
            daysActive.textContent = diffDays;
        }
    });

    
    function printProfile() {
        window.print();
    }
</script>
@endsection
</body>
</html>