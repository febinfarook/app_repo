<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supplier Details</title>
    
   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        :root {
            --primary-color: #4361ee;
            --primary-light: #eef2ff;
            --secondary-color: #6c757d;
            --success-color: #28a745;
            --danger-color: #dc3545;
            --danger-dark: #bd2130;
            --warning-color: #ffc107;
            --info-color: #17a2b8;
            --purple-color: #6f42c1;
            --card-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            --card-border-radius: 12px;
        }
        
        body {
            background-color: #f8fafc;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #333;
        }
        
        .admin-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 20px;
        }
        
        
        .profile-header {
            background: white;
            border-radius: var(--card-border-radius);
            padding: 2rem;
            margin-bottom: 1.5rem;
            box-shadow: var(--card-shadow);
            position: relative;
            overflow: hidden;
        }
        
        .profile-header:before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: linear-gradient(90deg, var(--primary-color), #5a6df0);
        }
        
        .profile-title {
            color: #2c3e50;
            font-weight: 700;
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
        }
        
        .profile-title i {
            background: var(--primary-color);
            color: white;
            width: 48px;
            height: 48px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
            font-size: 1.2rem;
        }
        
        
        .profile-card {
            background: white;
            border-radius: var(--card-border-radius);
            box-shadow: var(--card-shadow);
            overflow: hidden;
            margin-bottom: 1.5rem;
        }
        
        .profile-card-header {
            background: #f8f9fa;
            padding: 1.5rem;
            border-bottom: 1px solid #eee;
        }
        
        .profile-card-title {
            color: #2c3e50;
            font-weight: 600;
            font-size: 1.1rem;
            margin: 0;
            display: flex;
            align-items: center;
        }
        
        .profile-card-title i {
            margin-right: 10px;
            color: var(--primary-color);
        }
        
        .profile-card-body {
            padding: 1.5rem;
        }
        
    
        .supplier-info-header {
            display: flex;
            align-items: center;
            margin-bottom: 2rem;
        }
        
        .supplier-avatar {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--primary-color), #5a6df0);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 2rem;
            margin-right: 20px;
            border: 4px solid white;
            box-shadow: 0 4px 12px rgba(67, 97, 238, 0.2);
        }
        
        .supplier-info-text {
            flex: 1;
        }
        
        .supplier-name {
            font-size: 1.5rem;
            font-weight: 700;
            color: #2c3e50;
            margin-bottom: 0.25rem;
        }
        
        .supplier-id {
            color: #6c757d;
            font-size: 0.95rem;
            font-weight: 500;
        }
        
        .supplier-id i {
            color: var(--primary-color);
            margin-right: 5px;
        }
        
        
        .status-badge {
            display: inline-flex;
            align-items: center;
            padding: 0.4rem 0.8rem;
            border-radius: 50px;
            font-weight: 600;
            font-size: 0.85rem;
            text-decoration: none !important;
        }
        
        .status-active {
            background: rgba(40, 167, 69, 0.1);
            color: #28a745;
        }
        
        .status-inactive {
            background: rgba(220, 53, 69, 0.1);
            color: #dc3545;
        }
        
        .status-pending {
            background: rgba(255, 193, 7, 0.1);
            color: #ffc107;
        }
        
        .status-verified {
            background: rgba(111, 66, 193, 0.1);
            color: var(--purple-color);
        }
        
        
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 1rem;
            margin-bottom: 2rem;
        }
        
        .stat-card {
            background: white;
            border-radius: var(--card-border-radius);
            padding: 1.25rem;
            text-align: center;
            box-shadow: var(--card-shadow);
            transition: transform 0.3s ease;
            border-top: 3px solid var(--primary-color);
        }
        
        .stat-card:hover {
            transform: translateY(-3px);
        }
        
        .stat-icon {
            width: 40px;
            height: 40px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 0.75rem;
            font-size: 1.1rem;
            color: white;
        }
        
        .stat-icon.account {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        
        .stat-icon.days {
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
        }
        
        .stat-icon.date {
            background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
        }
        
        .stat-icon.location {
            background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);
        }
        
        .stat-value {
            font-size: 1.25rem;
            font-weight: 700;
            color: #2c3e50;
            margin-bottom: 0.25rem;
        }
        
        .stat-label {
            font-size: 0.85rem;
            color: #6c757d;
            font-weight: 500;
        }
        
        
        .info-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }
        
        .info-section {
            background: white;
            border-radius: var(--card-border-radius);
            padding: 1.5rem;
            box-shadow: var(--card-shadow);
        }
        
        .info-section-title {
            color: #2c3e50;
            font-weight: 600;
            font-size: 1rem;
            margin-bottom: 1.25rem;
            padding-bottom: 0.75rem;
            border-bottom: 1px solid #eee;
            display: flex;
            align-items: center;
        }
        
        .info-section-title i {
            margin-right: 10px;
            color: var(--primary-color);
        }
        
        .info-row {
            display: flex;
            margin-bottom: 1rem;
            align-items: flex-start;
        }
        
        .info-row:last-child {
            margin-bottom: 0;
        }
        
        .info-label {
            width: 140px;
            color: #6c757d;
            font-size: 0.9rem;
            font-weight: 500;
        }
        
        .info-value {
            flex: 1;
            color: #2c3e50;
            font-weight: 500;
        }
        
        .info-value a {
            color: var(--primary-color);
            text-decoration: none;
        }
        
        .info-value a:hover {
            text-decoration: underline;
        }
        
        
        .additional-info {
            background: white;
            border-radius: var(--card-border-radius);
            padding: 1.5rem;
            box-shadow: var(--card-shadow);
            margin-bottom: 2rem;
        }
        
        .additional-info-title {
            color: #2c3e50;
            font-weight: 600;
            font-size: 1rem;
            margin-bottom: 1.25rem;
            padding-bottom: 0.75rem;
            border-bottom: 1px solid #eee;
            display: flex;
            align-items: center;
        }
        
        .additional-info-title i {
            margin-right: 10px;
            color: var(--primary-color);
        }
        
        .additional-info-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1.5rem;
        }
        
        .info-box {
            padding: 1rem;
            border-radius: 8px;
            background: #f8f9fa;
        }
        
        .info-box-label {
            font-size: 0.85rem;
            color: #6c757d;
            margin-bottom: 0.5rem;
            font-weight: 500;
        }
        
        .info-box-value {
            font-size: 1.1rem;
            color: #2c3e50;
            font-weight: 600;
        }
        
        
        .action-buttons {
            display: flex;
            gap: 1rem;
            margin-top: 2rem;
        }
        
        .btn-action {
            padding: 0.75rem 1.5rem;
            border-radius: 8px;
            font-weight: 500;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.75rem;
            transition: all 0.3s ease;
            min-width: 140px;
            text-decoration: none !important;
            border: none;
            cursor: pointer;
            font-size: 1rem;
            font-family: inherit;
            text-align: center;
        }
        
        .btn-action:focus,
        .btn-action:hover,
        .btn-action:active,
        .btn-action:visited {
            text-decoration: none !important;
            outline: none !important;
            box-shadow: none !important;
        }
        
        .btn-action i {
            font-size: 1rem;
        }
        
        .btn-edit {
            background: var(--primary-color);
            border: 1px solid var(--primary-color);
            color: white;
        }
        
        .btn-edit:hover {
            background: #3a56d4;
            border-color: #3a56d4;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(67, 97, 238, 0.3);
            color: white;
        }
        
        
        .btn-delete {
            background: var(--danger-color);
            border: 1px solid var(--danger-color);
            color: white;
        }
        
        .btn-delete:hover {
            background: var(--danger-dark);
            border-color: var(--danger-dark);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(220, 53, 69, 0.3);
            color: white;
        }
        
        .btn-delete:active {
            background: #a71d2a;
            border-color: #a71d2a;
        }
        
        
        .btn-action-link {
            text-decoration: none !important;
            color: inherit;
        }
        
        .btn-action-link:hover,
        .btn-action-link:focus,
        .btn-action-link:active {
            text-decoration: none !important;
            color: inherit;
        }
        
        
        .empty-state {
            color: #adb5bd;
            font-style: italic;
            font-size: 0.9rem;
        }
        
        
        @media (max-width: 768px) {
            .admin-container {
                padding: 15px;
            }
            
            .profile-header {
                padding: 1.5rem;
            }
            
            .supplier-info-header {
                flex-direction: column;
                text-align: center;
            }
            
            .supplier-avatar {
                margin-right: 0;
                margin-bottom: 15px;
            }
            
            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
            }
            
            .info-grid {
                grid-template-columns: 1fr;
            }
            
            .additional-info-grid {
                grid-template-columns: 1fr;
            }
            
            .action-buttons {
                flex-direction: column;
            }
            
            .btn-action {
                width: 100%;
                text-align: center;
            }
        }
        
        @media (max-width: 576px) {
            .stats-grid {
                grid-template-columns: 1fr;
            }
            
            .info-row {
                flex-direction: column;
            }
            
            .info-label {
                width: 100%;
                margin-bottom: 0.25rem;
            }
        }
        
        
        a.btn-action:hover,
        a.btn-action:focus,
        a.btn-action:active {
            text-decoration: none !important;
            color: inherit;
        }
        
        
        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            25% { transform: translateX(-2px); }
            75% { transform: translateX(2px); }
        }
        
        .btn-delete:hover {
            animation: shake 0.3s ease-in-out;
        }
    </style>
</head>
<body>
    @extends('dashboard.adminrole')

    @section('content')
    <div class="admin-container">
        
        
        <div class="profile-header">
            <h1 class="profile-title">
                <i class="fas fa-truck"></i>
                Supplier Details
            </h1>
        </div>
        
       
        <div class="profile-card">
            <div class="profile-card-header">
                <h3 class="profile-card-title">
                    <i class="fas fa-user-tie"></i>
                    Supplier Account
                </h3>
            </div>
            <div class="profile-card-body">
                
                
                <div class="supplier-info-header">
                    <div class="supplier-avatar">
                        <i class="fas fa-building"></i>
                    </div>
                    <div class="supplier-info-text">
                        <div class="supplier-name">{{ $supplier->name }}</div>
                        <div class="supplier-id">
                            <i class="fas fa-id-card"></i>
                            ID: SUP-{{ str_pad($supplier->id, 5, '0', STR_PAD_LEFT) }}
                        </div>
                    </div>
                    <div class="ms-auto">
                        @php
                            $status = $supplier->status ?? 'active';
                            $statusClass = $status === 'active' ? 'status-active' : 
                                          ($status === 'inactive' ? 'status-inactive' : 'status-pending');
                        @endphp
                        <span class="status-badge {{ $statusClass }}">
                            <i class="fas fa-circle fa-xs me-2"></i>
                            {{ ucfirst($status) }}
                        </span>
                    </div>
                </div>
                
                
                <div class="stats-grid">
                    <div class="stat-card">
                        <div class="stat-icon account">
                            <i class="fas fa-user-check"></i>
                        </div>
                        <div class="stat-value">Active</div>
                        <div class="stat-label">Account Status</div>
                    </div>
                    
                    <div class="stat-card">
                        <div class="stat-icon days">
                            <i class="fas fa-calendar-day"></i>
                        </div>
                        <div class="stat-value">
                            @php
                                $createdDate = new DateTime($supplier->created_at);
                                $currentDate = new DateTime();
                                $interval = $currentDate->diff($createdDate);
                                echo $interval->days;
                            @endphp
                        </div>
                        <div class="stat-label">Days Active</div>
                    </div>
                    
                    <div class="stat-card">
                        <div class="stat-icon date">
                            <i class="fas fa-calendar-alt"></i>
                        </div>
                        <div class="stat-value">{{ date('M d, Y', strtotime($supplier->created_at)) }}</div>
                        <div class="stat-label">Joined Date</div>
                    </div>
                    
                    <div class="stat-card">
                        <div class="stat-icon location">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div class="stat-value">{{ $supplier->city ?? 'Unknown' }}</div>
                        <div class="stat-label">Location</div>
                    </div>
                </div>
                
               
                <div class="info-grid">
                    
                    <div class="info-section">
                        <h4 class="info-section-title">
                            <i class="fas fa-info-circle"></i>
                            Basic Information
                        </h4>
                        
                        <div class="info-row">
                            <div class="info-label">Supplier Name</div>
                            <div class="info-value">{{ $supplier->name }}</div>
                        </div>
                        
                        <div class="info-row">
                            <div class="info-label">Email Address</div>
                            <div class="info-value">
                                @if($supplier->email)
                                    <a href="mailto:{{ $supplier->email }}" class="text-decoration-none">{{ $supplier->email }}</a>
                                @else
                                    <span class="empty-state">Not provided</span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="info-row">
                            <div class="info-label">Phone Number</div>
                            <div class="info-value">
                                @if($supplier->phone)
                                    <a href="tel:{{ $supplier->phone }}" class="text-decoration-none">{{ $supplier->phone }}</a>
                                @else
                                    <span class="empty-state">Not provided</span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="info-row">
                            <div class="info-label">Company</div>
                            <div class="info-value">{{ $supplier->company ?? 'Not provided' }}</div>
                        </div>
                    </div>
                    
                    
                    <div class="info-section">
                        <h4 class="info-section-title">
                            <i class="fas fa-map-marked-alt"></i>
                            Address Information
                        </h4>
                        
                        <div class="info-row">
                            <div class="info-label">House / Building</div>
                            <div class="info-value">{{ $supplier->house ?? 'Not provided' }}</div>
                        </div>
                        
                        <div class="info-row">
                            <div class="info-label">Street</div>
                            <div class="info-value">{{ $supplier->street ?? 'Not provided' }}</div>
                        </div>
                        
                        <div class="info-row">
                            <div class="info-label">City</div>
                            <div class="info-value">{{ $supplier->city ?? 'Not provided' }}</div>
                        </div>
                        
                        <div class="info-row">
                            <div class="info-label">Province / State</div>
                            <div class="info-value">{{ $supplier->province ?? 'Not provided' }}</div>
                        </div>
                    </div>
                </div>
                
                
                <div class="additional-info">
                    <h4 class="additional-info-title">
                        <i class="fas fa-clipboard-list"></i>
                        Additional Information
                    </h4>
                    
                    <div class="additional-info-grid">
                        <div class="info-box">
                            <div class="info-box-label">ACCOUNT STATUS</div>
                            <div class="info-box-value">
                                @php
                                    $status = $supplier->status ?? 'active';
                                    $statusColor = $status === 'active' ? 'text-success' : 
                                                  ($status === 'inactive' ? 'text-danger' : 'text-warning');
                                @endphp
                                <span class="{{ $statusColor }} fw-bold">{{ ucfirst($status) }}</span>
                            </div>
                        </div>
                        
                        <div class="info-box">
                            <div class="info-box-label">LAST UPDATED</div>
                            <div class="info-box-value">{{ date('M d, Y \a\t h:i A', strtotime($supplier->updated_at)) }}</div>
                        </div>
                        
                        <div class="info-box">
                            <div class="info-box-label">SUPPLIER ID</div>
                            <div class="info-box-value">SUP-{{ str_pad($supplier->id, 5, '0', STR_PAD_LEFT) }}</div>
                        </div>
                        
                        <div class="info-box">
                            <div class="info-box-label">VERIFICATION STATUS</div>
                            <div class="info-box-value">
                                <span class="status-badge status-verified">
                                    <i class="fas fa-check-circle me-2"></i>
                                    Verified
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                
                
                <div class="action-buttons">
                    <a href="{{ route('dashboard.editsuppliers', $supplier->id) }}" 
                       class="btn-action btn-edit btn-action-link"
                       style="text-decoration: none !important;">
                        <i class="fas fa-edit"></i>
                        Edit Supplier
                    </a>
                    
                    <a href="{{ route('dashboard.deletesuppliers', $supplier->id) }}"
                       onclick="return confirm('⚠️ WARNING: This action cannot be undone!\n\nAre you sure you want to delete supplier: {{ $supplier->name }}?\n\nThis will permanently remove all supplier data and related records.')"
                       class="btn-action btn-delete btn-action-link"
                       style="text-decoration: none !important;">
                        <i class="fas fa-trash-alt"></i>
                        Delete Supplier
                    </a>
                     <a href="{{ route('dashboard.supplierslist') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left me-2"></i> Back to Suppliers
                    </a>
                </div>
            </div>
        </div>
    </div>
    
   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
           
            const statCards = document.querySelectorAll('.stat-card');
            statCards.forEach((card, index) => {
                setTimeout(() => {
                    card.style.opacity = '0';
                    card.style.transform = 'translateY(20px)';
                    card.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
                    
                    setTimeout(() => {
                        card.style.opacity = '1';
                        card.style.transform = 'translateY(0)';
                    }, 50);
                }, index * 100);
            });
            
            
            const infoSections = document.querySelectorAll('.info-section, .additional-info');
            infoSections.forEach((section, index) => {
                setTimeout(() => {
                    section.style.opacity = '0';
                    section.style.transform = 'translateY(20px)';
                    section.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
                    
                    setTimeout(() => {
                        section.style.opacity = '1';
                        section.style.transform = 'translateY(0)';
                    }, 50);
                }, 500 + (index * 100));
            });
            
            
            const buttonLinks = document.querySelectorAll('a.btn-action');
            buttonLinks.forEach(link => {
                link.style.textDecoration = 'none';
                
                
                link.addEventListener('mouseenter', function() {
                    this.style.textDecoration = 'none';
                });
                link.addEventListener('mouseleave', function() {
                    this.style.textDecoration = 'none';
                });
            });
            
            
            const deleteBtn = document.querySelector('.btn-delete');
            if (deleteBtn) {
                deleteBtn.addEventListener('click', function(e) {
                    const supplierName = "{{ $supplier->name }}";
                    const confirmationMessage = `⚠️ WARNING: This action cannot be undone!\n\nAre you sure you want to delete supplier: ${supplierName}?\n\nThis will permanently remove all supplier data and related records.`;
                    
                    if (!confirm(confirmationMessage)) {
                        e.preventDefault();
                       
                        this.style.animation = 'shake 0.5s ease-in-out';
                        setTimeout(() => {
                            this.style.animation = '';
                        }, 500);
                    }
                });
            }
            
           
            const deleteButton = document.querySelector('.btn-delete');
            if (deleteButton) {
                
                setInterval(() => {
                    deleteButton.style.boxShadow = '0 0 0 0 rgba(220, 53, 69, 0.7)';
                    setTimeout(() => {
                        deleteButton.style.boxShadow = '0 0 0 10px rgba(220, 53, 69, 0)';
                    }, 600);
                }, 2000);
            }
        });
    </script>
    @endsection
</body>
</html>