<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-green: #10b981;
            --secondary-green: #059669;
            --light-green: #d1fae5;
            --dark-gray: #1f2937;
            --light-gray: #f9fafb;
            --border-color: #e5e7eb;
            --card-shadow: 0 10px 40px rgba(0, 0, 0, 0.08);
            --gradient-green: linear-gradient(135deg, #10b981, #34d399);
        }

        body {
            background: linear-gradient(135deg, #f0fdf4 0%, #ecfdf5 100%);
            min-height: 100vh;
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
        }

       
        .page-header {
            text-align: center;
            margin-bottom: 40px;
            padding-top: 20px;
        }

        .page-title {
            font-size: 2.5rem;
            font-weight: 800;
            background: linear-gradient(135deg, var(--primary-green), var(--secondary-green));
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
            background: linear-gradient(90deg, var(--primary-green), #34d399);
            border-radius: 2px;
        }

        .page-subtitle {
            color: #6b7280;
            font-size: 1.1rem;
            font-weight: 500;
        }

        
        .stats-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-bottom: 40px;
            max-width: 1100px;
            margin-left: auto;
            margin-right: auto;
        }

        .stat-card {
            background: white;
            border-radius: 16px;
            padding: 25px;
            box-shadow: var(--card-shadow);
            display: flex;
            align-items: center;
            gap: 15px;
            transition: all 0.3s ease;
            border: 1px solid var(--border-color);
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
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
            flex-shrink: 0;
        }

        .stat-content {
            flex: 1;
        }

        .stat-number {
            font-size: 28px;
            font-weight: 800;
            color: var(--dark-gray);
            line-height: 1;
            margin-bottom: 4px;
        }

        .stat-label {
            color: #6b7280;
            font-size: 14px;
            font-weight: 600;
        }

        
        .table-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .table-card {
            background: white;
            border-radius: 20px;
            box-shadow: var(--card-shadow);
            overflow: hidden;
            border: 1px solid var(--border-color);
            margin-top: 15px;
            margin-bottom: 40px;
        }

    
        .table-header {
            background: linear-gradient(135deg, var(--primary-green), var(--secondary-green));
            padding: 25px 30px;
            color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 20px;
        }

        .table-title {
            font-size: 20px;
            font-weight: 700;
            margin: 0;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .table-title i {
            background: rgba(255, 255, 255, 0.2);
            width: 40px;
            height: 40px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
        }

       
        .search-box {
            position: relative;
            max-width: 300px;
            flex: 1;
        }

        .search-box input {
            width: 100%;
            padding: 12px 20px 12px 45px;
            border-radius: 10px;
            border: none;
            background: rgba(255, 255, 255, 0.2);
            color: white;
            font-size: 14px;
            transition: all 0.3s ease;
        }

        .search-box input::placeholder {
            color: rgba(255, 255, 255, 0.7);
        }

        .search-box input:focus {
            outline: none;
            background: rgba(255, 255, 255, 0.3);
            box-shadow: 0 0 0 2px rgba(255, 255, 255, 0.2);
        }

        .search-box i {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: rgba(255, 255, 255, 0.8);
        }

       
        .table-modern {
            margin: 0;
            border-collapse: separate;
            border-spacing: 0;
        }

        .table-modern thead th {
            background: #f8fafc;
            color: #4b5563;
            font-weight: 700;
            font-size: 13px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            padding: 20px 16px;
            border-bottom: 2px solid var(--border-color);
            white-space: nowrap;
        }

        .table-modern tbody tr {
            border-bottom: 1px solid #f3f4f6;
            transition: all 0.2s ease;
        }

        .table-modern tbody tr:hover {
            background: #f8fafc;
            transform: scale(1.002);
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }

        .table-modern tbody td {
            padding: 20px 16px;
            vertical-align: middle;
            color: #374151;
            font-weight: 500;
            font-size: 14px;
        }

        
        .customer-cell {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .customer-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--primary-green), var(--secondary-green));
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 600;
            font-size: 16px;
            flex-shrink: 0;
        }

        .customer-info {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
        }

        .customer-name {
            font-weight: 600;
            color: var(--dark-gray);
            margin-bottom: 2px;
        }

        .customer-id {
            font-size: 12px;
            color: #9ca3af;
        }

      
        .email-cell {
            display: flex;
            align-items: center;
            gap: 8px;
            color: #3b82f6;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .email-cell:hover {
            color: #1d4ed8;
        }

        .email-cell i {
            font-size: 16px;
        }

       
        .address-cell {
            max-width: 200px;
            line-height: 1.4;
        }

        .address-line {
            display: flex;
            align-items: center;
            gap: 6px;
            font-size: 13px;
            color: #6b7280;
        }

        .address-line i {
            font-size: 12px;
            color: #9ca3af;
            width: 16px;
        }

        .action-cell {
            min-width: 200px;
        }

        .action-buttons {
           display: flex;
           flex-direction: row;
           justify-content: flex-start;
           align-items: center;
            gap: 10px;
           white-space: nowrap;
        }

        .btn-action {
            padding: 8px 16px;
            border-radius: 8px;
            font-size: 13px;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            transition: all 0.2s;
            border: none;
            text-decoration: none;
            cursor: pointer;
        }

        .btn-edit {
            background: linear-gradient(135deg, #3b82f6, #1d4ed8);
            color: white;
        }

        .btn-edit:hover {
            background: linear-gradient(135deg, #2563eb, #1e40af);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(59, 130, 246, 0.3);
        }

        .btn-view {
            background: linear-gradient(135deg, #10b981, #059669);
            color: white;
        }

        .btn-view:hover {
            background: linear-gradient(135deg, #059669, #047857);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(16, 185, 129, 0.3);
        }

        .btn-delete {
            background: linear-gradient(135deg, #ef4444, #dc2626);
            color: white;
        }

        .btn-delete:hover {
            background: linear-gradient(135deg, #dc2626, #b91c1c);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(239, 68, 68, 0.3);
        }

        
        .table-footer {
            padding: 20px 30px;
            background: #f8fafc;
            border-top: 1px solid var(--border-color);
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 15px;
        }

        .pagination-info {
            color: #6b7280;
            font-size: 14px;
        }

        .pagination {
            margin: 0;
        }

        .pagination .page-item.active .page-link {
            background: var(--primary-green);
            border-color: var(--primary-green);
            color: white;
        }

        .pagination .page-link {
            color: var(--primary-green);
            border: 1px solid var(--border-color);
            margin: 0 2px;
            border-radius: 8px;
            padding: 8px 16px;
            font-weight: 500;
        }

        .pagination .page-link:hover {
            background: var(--light-green);
            border-color: var(--primary-green);
        }

       
        .empty-state {
            text-align: center;
            padding: 60px 20px;
        }

        .empty-icon {
            font-size: 64px;
            color: #d1d5db;
            margin-bottom: 20px;
        }

        .empty-title {
            font-size: 20px;
            font-weight: 700;
            color: #4b5563;
            margin-bottom: 10px;
        }

        .empty-text {
            color: #9ca3af;
            font-size: 15px;
            max-width: 400px;
            margin: 0 auto 25px;
        }

        .btn-add-customer {
            background: linear-gradient(135deg, var(--primary-green), var(--secondary-green));
            color: white;
            border: none;
            border-radius: 10px;
            padding: 12px 24px;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .btn-add-customer:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(16, 185, 129, 0.3);
            color: white;
        }

        
        @media (max-width: 768px) {
            .table-header {
                flex-direction: column;
                align-items: stretch;
            }
            
            .search-box {
                max-width: 100%;
            }
            
            .action-buttons {
                flex-direction: column;
                width: 100%;
            }
            
            .btn-action {
                width: 100%;
                justify-content: center;
            }
            
            .table-footer {
                flex-direction: column;
                text-align: center;
            }
            
            .page-title {
                font-size: 2rem;
            }
            
            .stats-container {
                grid-template-columns: 1fr;
            }
            
            .table-container {
                padding: 0 10px;
            }
        }

        
        .table-responsive {
            max-height: 600px;
            overflow-y: auto;
        }

        .table-responsive::-webkit-scrollbar {
            width: 6px;
        }

        .table-responsive::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 3px;
        }

        .table-responsive::-webkit-scrollbar-thumb {
            background: var(--primary-green);
            border-radius: 3px;
        }

        .table-responsive::-webkit-scrollbar-thumb:hover {
            background: var(--secondary-green);
        }

        
        .quick-actions {
            display: flex;
            gap: 12px;
            margin-top: 20px;
            flex-wrap: wrap;
            justify-content: center;
        }

        .quick-action-btn {
            background: white;
            border: 2px solid var(--border-color);
            border-radius: 10px;
            padding: 10px 20px;
            font-size: 14px;
            font-weight: 600;
            color: #4b5563;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: all 0.3s ease;
        }

        .quick-action-btn:hover {
            background: var(--light-green);
            border-color: var(--primary-green);
            color: var(--primary-green);
            transform: translateY(-2px);
        }
    </style>
</head>
<body>
@extends('dashboard.customerrole')

@section('content')

<div class="container-fluid py-4">
   
    <div class="page-header">
        <h1 class="page-title">Customer Details</h1>
        <p class="page-subtitle">View and manage all customer information in one place</p>
    </div>

    
    <div class="stats-container">
        <div class="stat-card">
            <div class="stat-icon" style="background: linear-gradient(135deg, #3b82f6, #1d4ed8);">
                <i class="fas fa-users"></i>
            </div>
            <div class="stat-content">
                <div class="stat-number">{{ count($customers) }}</div>
                <div class="stat-label">Total Customers</div>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon" style="background: linear-gradient(135deg, #10b981, #059669);">
                <i class="fas fa-map-marker-alt"></i>
            </div>
            <div class="stat-content">
                <div class="stat-number">{{ $customers->unique('city')->count() }}</div>
                <div class="stat-label">Cities</div>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon" style="background: linear-gradient(135deg, #f59e0b, #d97706);">
                <i class="fas fa-building"></i>
            </div>
            <div class="stat-content">
                <div class="stat-number">{{ $customers->unique('province')->count() }}</div>
                <div class="stat-label">Provinces</div>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon" style="background: linear-gradient(135deg, #8b5cf6, #7c3aed);">
                <i class="fas fa-chart-line"></i>
            </div>
            <div class="stat-content">
                <div class="stat-number">{{ $customers->where('created_at', '>=', now()->subDays(30))->count() }}</div>
                <div class="stat-label">Last 30 Days</div>
            </div>
        </div>
    </div>

    
    <div class="quick-actions">
        <a href="#" class="quick-action-btn">
            <i class="fas fa-download"></i> Export CSV
        </a>
        <a href="#" class="quick-action-btn">
            <i class="fas fa-print"></i> Print List
        </a>
        <a href="#" class="quick-action-btn">
            <i class="fas fa-filter"></i> Filter by City
        </a>
        <a href="#" class="quick-action-btn">
            <i class="fas fa-sort"></i> Sort by Name
        </a>
    </div>

    
    <div class="table-container">
        <div class="table-card">
            
            <div class="table-header">
                <h3 class="table-title">
                    <i class="fas fa-list"></i> Customer List
                </h3>
                <div class="search-box">
                    <i class="fas fa-search"></i>
                    <input type="text" id="searchInput" placeholder="Search customers by name, email, or city...">
                </div>
            </div>

            
            <div class="table-responsive">
                <table class="table table-modern table-hover">
                    <thead>
                        <tr>
                            <th width="60">SI No</th>
                            <th>Customer</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th class="text-center" style="width: 260px;">ACTIONS</th>
                        </tr>
                    </thead>
                    <tbody id="customerTableBody">
                        @if(count($customers) > 0)
                            @foreach($customers as $customer)
                            <tr class="customer-row">
                                <td class="fw-bold text-primary">{{ $loop->iteration }}</td>
                                <td>
                                    <div class="customer-cell">
                                        <div class="customer-avatar">
                                            {{ strtoupper(substr($customer->name, 0, 1)) }}
                                        </div>
                                        <div class="customer-info">
                                            <span class="customer-name">{{ $customer->name }}</span>
                                            <span class="customer-id">ID: {{ $customer->id }}</span>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <a href="mailto:{{ $customer->email }}" class="email-cell">
                                        <i class="fas fa-envelope"></i> {{ $customer->email }}
                                    </a>
                                </td>
                                <td>
                                    <div class="address-cell">
                                        <div class="address-line">
                                            <i class="fas fa-home"></i> {{ $customer->house }}
                                        </div>
                                        <div class="address-line">
                                            <i class="fas fa-road"></i> {{ $customer->street }}
                                        </div>
                                        <div class="address-line">
                                            <i class="fas fa-city"></i> {{ $customer->city }}, {{ $customer->province }}
                                        </div>
                                    </div>
                                </td>
                                <td class="action-cell">
                                    <div class="action-buttons">
                                        <a href="{{ route('dashboard.editdetails', $customer->id) }}" class="btn-action btn-edit">
                                            <i class="fas fa-edit"></i> Edit
                                        </a>
                                        <a href="{{ route('dashboard.viewprofile', $customer->id) }}" class="btn-action btn-view">
                                            <i class="fas fa-eye"></i> View
                                        </a>
                                        <a href="{{ route('dashboard.deletedetails', $customer->id) }}" 
                                           class="btn-action btn-delete"
                                           onclick="return confirm('Are you sure you want to delete this customer? This action cannot be undone.')">
                                            <i class="fas fa-trash-alt"></i> Delete
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="5">
                                    <div class="empty-state">
                                        <div class="empty-icon">
                                            <i class="fas fa-users-slash"></i>
                                        </div>
                                        <h5 class="empty-title">No Customers Found</h5>
                                        <p class="empty-text">There are no customers in the database yet.</p>
                                        <a href="#" class="btn-add-customer">
                                            <i class="fas fa-user-plus"></i> Add First Customer
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>

           
            @if(count($customers) > 0)
            <div class="table-footer">
                <div class="pagination-info">
                    Showing {{ count($customers) }} of {{ count($customers) }} customers
                </div>
                <nav aria-label="Page navigation">
                    <ul class="pagination mb-0">
                        <div class="d-flex justify-content-center mt-3">
                    {{ $customers->links('pagination::bootstrap-5') }}
                 </div>
                    </ul>
                </nav>
            </div>
            @endif
        </div>
    </div>

   
    <div class="modal fade" id="exportModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Export Options</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="d-grid gap-2">
                        <button class="btn btn-outline-primary">
                            <i class="fas fa-file-csv me-2"></i> Export as CSV
                        </button>
                        <button class="btn btn-outline-success">
                            <i class="fas fa-file-excel me-2"></i> Export as Excel
                        </button>
                        <button class="btn btn-outline-danger">
                            <i class="fas fa-file-pdf me-2"></i> Export as PDF
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const searchInput = document.getElementById('searchInput');
        const customerRows = document.querySelectorAll('.customer-row');
        
        if (searchInput && customerRows.length > 0) {
            searchInput.addEventListener('keyup', function() {
                const searchTerm = this.value.toLowerCase().trim();
                
                customerRows.forEach(row => {
                    const text = row.textContent.toLowerCase();
                    if (text.includes(searchTerm)) {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                });
                
               
                const visibleRows = Array.from(customerRows).filter(row => row.style.display !== 'none');
                const emptyState = document.querySelector('.empty-state');
                if (visibleRows.length === 0 && emptyState) {
                    emptyState.style.display = 'block';
                } else if (emptyState) {
                    emptyState.style.display = 'none';
                }
            });
        }
        
        
        const actionButtons = document.querySelectorAll('.btn-action');
        actionButtons.forEach(button => {
            button.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-2px)';
            });
            
            button.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0)';
            });
        });
        
      
        const statCards = document.querySelectorAll('.stat-card');
        statCards.forEach(card => {
            card.addEventListener('click', function() {
                this.style.transform = 'translateY(-5px)';
                setTimeout(() => {
                    this.style.transform = 'translateY(0)';
                }, 300);
            });
        });
        
        
        const quickActionBtns = document.querySelectorAll('.quick-action-btn');
        quickActionBtns.forEach(btn => {
            btn.addEventListener('click', function(e) {
                e.preventDefault();
                const action = this.textContent.trim();
                
                switch(action) {
                    case 'Filter by City':
                        alert('City filter would open here');
                        break;
                    case 'Sort by Name':
                        sortTableByName();
                        break;
                    case 'Export CSV':
                        exportToCSV();
                        break;
                    case 'Print List':
                        window.print();
                        break;
                }
            });
        });
        
       
        function sortTableByName() {
            const rows = Array.from(document.querySelectorAll('.customer-row'));
            const tbody = document.getElementById('customerTableBody');
            
            rows.sort((a, b) => {
                const nameA = a.querySelector('.customer-name').textContent.toLowerCase();
                const nameB = b.querySelector('.customer-name').textContent.toLowerCase();
                return nameA.localeCompare(nameB);
            });
            
            
            rows.forEach(row => tbody.appendChild(row));
            
            
            showNotification('Table sorted by name');
        }
        
       
        function exportToCSV() {
            const rows = document.querySelectorAll('.customer-row');
            let csv = 'Name,Email,House,Street,City,Province\n';
            
            rows.forEach(row => {
                const name = row.querySelector('.customer-name').textContent;
                const email = row.querySelector('.email-cell').textContent.trim();
                const addressLines = row.querySelectorAll('.address-line');
                const house = addressLines[0].textContent.replace('🏠', '').trim();
                const street = addressLines[1].textContent.replace('🛣️', '').trim();
                const cityProvince = addressLines[2].textContent.split(',');
                const city = cityProvince[0].replace('🏙️', '').trim();
                const province = cityProvince[1] ? cityProvince[1].trim() : '';
                
                csv += `"${name}","${email}","${house}","${street}","${city}","${province}"\n`;
            });
            
           
            const blob = new Blob([csv], { type: 'text/csv' });
            const url = window.URL.createObjectURL(blob);
            const a = document.createElement('a');
            a.href = url;
            a.download = 'customers.csv';
            document.body.appendChild(a);
            a.click();
            document.body.removeChild(a);
            window.URL.revokeObjectURL(url);
            
            showNotification('CSV exported successfully');
        }
        
        
        function showNotification(message) {
           
            const notification = document.createElement('div');
            notification.style.cssText = `
                position: fixed;
                top: 20px;
                right: 20px;
                background: linear-gradient(135deg, #10b981, #059669);
                color: white;
                padding: 15px 25px;
                border-radius: 10px;
                box-shadow: 0 5px 15px rgba(0,0,0,0.2);
                z-index: 9999;
                animation: slideInRight 0.3s ease;
            `;
            notification.textContent = message;
            document.body.appendChild(notification);
            
            
            setTimeout(() => {
                notification.style.animation = 'slideOutRight 0.3s ease';
                setTimeout(() => {
                    document.body.removeChild(notification);
                }, 300);
            }, 3000);
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
        `;
        document.head.appendChild(style);
    });
</script>
@endsection
</body>
</html>