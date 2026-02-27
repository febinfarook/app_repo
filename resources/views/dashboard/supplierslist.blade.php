<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supplier Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-blue: #0d6efd;
            --light-blue: #e3f2fd;
            --success-green: #28a745;
            --warning-orange: #ffc107;
            --danger-red: #dc3545;
            --light-gray: #f8f9fa;
            --border-gray: #dee2e6;
            --text-dark: #212529;
            --text-light: #6c757d;
        }
        
        body {
            background-color: #f5f7fb;
            font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
        }
        
        .page-title {
            font-weight: 700;
            color: #2c3e50;
            position: relative;
            padding-bottom: 12px;
        }
        
        .page-title:after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 60px;
            height: 4px;
            background: linear-gradient(90deg, var(--primary-blue), #6ea8fe);
            border-radius: 2px;
        }
        
        .header-section {
            background: white;
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.04);
            margin-bottom: 25px;
            border-left: 4px solid var(--primary-blue);
        }
        
        .stats-card {
            background: white;
            border-radius: 10px;
            padding: 15px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
            border-top: 3px solid var(--primary-blue);
            transition: transform 0.3s ease;
        }
        
        .stats-card:hover {
            transform: translateY(-5px);
        }
        
        .stats-icon {
            width: 50px;
            height: 50px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
            color: white;
            background: linear-gradient(135deg, var(--primary-blue), #6ea8fe);
        }
        
        .stats-number {
            font-size: 28px;
            font-weight: 700;
            color: var(--text-dark);
            line-height: 1;
        }
        
        .stats-label {
            color: var(--text-light);
            font-size: 14px;
            font-weight: 500;
        }
        
        .clean-table-container {
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 20px rgba(0,0,0,0.08);
            margin-bottom: 30px;
        }
        
        .table-header {
            background: linear-gradient(90deg, #1e3a8a, var(--primary-blue));
            color: white;
            padding: 18px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .table-title {
            font-weight: 600;
            font-size: 18px;
            margin: 0;
        }
        
        .search-box {
            max-width: 300px;
            position: relative;
        }
        
        .search-box input {
            border-radius: 8px;
            padding-left: 40px;
            border: 1px solid var(--border-gray);
        }
        
        .search-box i {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-light);
        }
        
        .clean-table {
            margin: 0;
            border: none;
        }
        
        .clean-table thead {
            background-color: var(--light-blue);
            border-bottom: 2px solid var(--border-gray);
        }
        
        .clean-table thead th {
            border: none;
            font-weight: 600;
            color: #495057;
            padding: 16px 12px;
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        
        .clean-table tbody tr {
            border-bottom: 1px solid #f0f0f0;
            transition: all 0.2s ease;
        }
        
        .clean-table tbody tr:hover {
            background-color: #f8fbff;
            transform: translateY(-1px);
            box-shadow: 0 3px 10px rgba(0,0,0,0.05);
        }
        
        .clean-table tbody td {
            padding: 16px 12px;
            vertical-align: middle;
            border: none;
            color: var(--text-dark);
            font-weight: 500;
        }
        
        .supplier-name {
            font-weight: 600;
            color: #2c3e50;
        }
        
        .supplier-email {
            color: var(--primary-blue);
            font-weight: 500;
        }
        
        .contact-cell {
            color: var(--text-dark);
        }
        
        .company-cell {
            font-weight: 600;
            color: #2c3e50;
        }
        
        .company-category {
            color: var(--text-light);
            font-size: 12px;
        }
        
        .location-cell {
            max-width: 150px;
        }
        
        /* Status Badges */
        .status-badge {
            display: inline-block;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        
        .status-active {
            background-color: rgba(40, 167, 69, 0.1);
            color: var(--success-green);
            border: 1px solid rgba(40, 167, 69, 0.2);
        }
        
        .status-inactive {
            background-color: rgba(220, 53, 69, 0.1);
            color: var(--danger-red);
            border: 1px solid rgba(220, 53, 69, 0.2);
        }
        
        .status-pending {
            background-color: rgba(255, 193, 7, 0.1);
            color: #b88a00;
            border: 1px solid rgba(255, 193, 7, 0.2);
        }
        
        .action-buttons {
            display: flex;
            gap: 8px;
            justify-content: center;
            align-items: center;
            white-space: nowrap;
        }
        
        .btn-table {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 6px 12px;
            border-radius: 6px;
            font-size: 13px;
            font-weight: 500;
            border: none;
            transition: all 0.2s ease;
            text-decoration: none;
            white-space: nowrap;
        }
        
        .btn-view {
            background-color: var(--primary-blue);
            color: white;
        }
        
        .btn-view:hover {
            background-color: #1e4ed8;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(13, 110, 253, 0.2);
            color: white;
        }
        
        .btn-edit {
            background-color: var(--success-green);
            color: white;
        }
        
        .btn-edit:hover {
            background-color: #13823c;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(40, 167, 69, 0.2);
            color: white;
        }
        
        .btn-delete {
            background-color: var(--danger-red);
            color: white;
        }
        
        .btn-delete:hover {
            background-color: #b91c1c;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(220, 53, 69, 0.2);
            color: white;
        }
        
        .table-footer {
            padding: 15px 20px;
            background-color: var(--light-gray);
            border-top: 1px solid var(--border-gray);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .pagination-info {
            color: var(--text-light);
            font-size: 14px;
        }
        
        .pagination .page-item.active .page-link {
            background-color: var(--primary-blue);
            border-color: var(--primary-blue);
        }
        
        .pagination .page-link {
            color: var(--primary-blue);
            border-radius: 6px;
            margin: 0 3px;
            border: 1px solid var(--border-gray);
        }
        
        .no-data {
            text-align: center;
            padding: 40px;
            color: var(--text-light);
        }
        
        .no-data i {
            font-size: 48px;
            margin-bottom: 15px;
            color: #e0e0e0;
        }
        
        .supplier-avatar {
            width: 40px;
            height: 40px;
            border-radius: 8px;
            background: linear-gradient(135deg, var(--primary-blue), #6ea8fe);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 600;
            font-size: 16px;
        }
        
        .supplier-info {
            display: flex;
            align-items: center;
            gap: 12px;
        }
        
        /* Filter Section */
        .filter-section {
            display: flex;
            gap: 15px;
            align-items: center;
            margin-top: 15px;
            flex-wrap: wrap;
        }
        
        .filter-select {
            padding: 8px 12px;
            border: 1px solid var(--border-gray);
            border-radius: 6px;
            background: white;
            color: var(--text-dark);
            font-size: 14px;
            min-width: 150px;
        }
        
        .filter-btn {
            padding: 8px 16px;
            border: 1px solid var(--border-gray);
            border-radius: 6px;
            background: white;
            color: var(--text-dark);
            font-size: 14px;
            font-weight: 500;
            transition: all 0.3s ease;
            cursor: pointer;
        }
        
        .filter-btn:hover, .filter-btn.active {
            background: var(--primary-blue);
            color: white;
            border-color: var(--primary-blue);
        }
        
        @media (max-width: 768px) {
            .table-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }
            
            .search-box {
                max-width: 100%;
                width: 100%;
            }
            
            .filter-section {
                flex-direction: column;
                align-items: stretch;
            }
            
            .filter-select {
                width: 100%;
            }
            
            .action-buttons {
                flex-direction: column;
                width: 100%;
            }
            
            .action-buttons .btn-table {
                width: 100%;
                justify-content: center;
            }
            
            .table-responsive {
                border-radius: 0;
            }
        }
    </style>
</head>
<body>
@extends('dashboard.adminrole')

@section('content')

<div class="container-fluid py-4">
    <div class="header-section">
        <h2 class="page-title mb-3">Supplier Management</h2>
        <p class="text-muted mb-0">View and manage all supplier accounts and information</p>
    </div>
    
   
    <div class="row mb-4">
        <div class="col-md-3 col-sm-6 mb-3">
            <div class="stats-card">
                <div class="d-flex align-items-center">
                    <div class="stats-icon me-3">
                        <i class="fas fa-users"></i>
                    </div>
                    <div>
                        <div class="stats-number">{{ $suppliers->total() }}</div>
                        <div class="stats-label">Total Suppliers</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 mb-3">
            <div class="stats-card">
                <div class="d-flex align-items-center">
                    <div class="stats-icon me-3" style="background: linear-gradient(135deg, #28a745, #6fdc8c);">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    <div>
                        <div class="stats-number">{{ $activeSuppliers ?? '0' }}</div>
                        <div class="stats-label">Active Suppliers</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 mb-3">
            <div class="stats-card">
                <div class="d-flex align-items-center">
                    <div class="stats-icon me-3" style="background: linear-gradient(135deg, #ffc107, #ffda6a);">
                        <i class="fas fa-clock"></i>
                    </div>
                    <div>
                        <div class="stats-number">{{ $pendingSuppliers ?? '0' }}</div>
                        <div class="stats-label">Pending Review</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 mb-3">
            <div class="stats-card">
                <div class="d-flex align-items-center">
                    <div class="stats-icon me-3" style="background: linear-gradient(135deg, #6c757d, #a7acb1);">
                        <i class="fas fa-building"></i>
                    </div>
                    <div>
                        <div class="stats-number">{{ $suppliers->unique('company')->count() }}</div>
                        <div class="stats-label">Companies</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

   
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle me-2"></i>
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    
    <div class="clean-table-container">
        <div class="table-header">
            <h3 class="table-title">Supplier Directory</h3>
            <div class="search-box">
                <i class="fas fa-search"></i>
                <input type="text" id="searchInput" class="form-control" placeholder="Search suppliers...">
            </div>
        </div>
        
        
        <div class="px-3 pt-3 pb-2 border-bottom">
            <div class="filter-section">
                <select class="filter-select" id="categoryFilter">
                    <option value="">All Categories</option>
                    <option value="wholesale">Wholesale</option>
                    <option value="manufacturer">Manufacturer</option>
                    <option value="distributor">Distributor</option>
                    <option value="retail">Retail</option>
                    <option value="service">Service</option>
                </select>
                
                <div class="d-flex gap-2">
                    <button class="filter-btn active" data-filter="all">All</button>
                    <button class="filter-btn" data-filter="active">Active</button>
                    <button class="filter-btn" data-filter="inactive">Inactive</button>
                    <button class="filter-btn" data-filter="pending">Pending</button>
                </div>
            </div>
        </div>
        
        
        <div class="table-responsive">
            <table class="table clean-table" id="suppliersTable">
                <thead>
                    <tr>
                        <th>SI No</th>
                        <th>Supplier</th>
                        <th>Contact</th>
                        <th>Company</th>
                        <th>Location</th>
                        <th>Status</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($suppliers) > 0)
                        @foreach($suppliers as $supplier)
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="bg-light rounded-circle d-flex align-items-center justify-content-center" style="width: 36px; height: 36px;">
                                        <span class="fw-bold text-primary">{{ $loop->iteration }}</span>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="supplier-info">
                                    <div class="supplier-avatar">
                                        {{ strtoupper(substr($supplier->name, 0, 1)) }}
                                    </div>
                                    <div>
                                        <div class="supplier-name">{{ $supplier->name }}</div>
                                        <a href="mailto:{{ $supplier->email }}" class="supplier-email text-decoration-none small">
                                            <i class="fas fa-envelope me-1"></i> {{ $supplier->email }}
                                        </a>
                                    </div>
                                </div>
                            </td>
                            <td class="contact-cell">
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-phone text-success me-2"></i>
                                    <span>{{ $supplier->phone ?? 'Not provided' }}</span>
                                </div>
                            </td>
                            <td>
                                <div class="company-cell">{{ $supplier->company ?? '—' }}</div>
                                @if($supplier->category)
                                <div class="company-category">{{ $supplier->category }}</div>
                                @endif
                            </td>
                            <td class="location-cell">
                                <div class="d-flex align-items-start">
                                    <i class="fas fa-map-marker-alt text-danger me-2 mt-1"></i>
                                    <div>
                                        <div class="small">{{ $supplier->city }}, {{ $supplier->province }}</div>
                                        @if($supplier->country)
                                        <div class="small text-muted">{{ $supplier->country }}</div>
                                        @endif
                                    </div>
                                </div>
                            </td>
                            <td>
                                @php
                                    $status = $supplier->status ?? 'active';
                                    $statusClass = $status === 'active' ? 'status-active' : 
                                                 ($status === 'inactive' ? 'status-inactive' : 'status-pending');
                                @endphp
                                <span class="status-badge {{ $statusClass }}">
                                    <i class="fas fa-circle small"></i>
                                    {{ ucfirst($status) }}
                                </span>
                            </td>
                            <td>
                                <div class="action-buttons">
                                    <a href="{{ route('dashboard.viewsuppliers', $supplier->id) }}" 
                                       class="btn-table btn-view">
                                        <i class="fas fa-eye"></i> View
                                    </a>
                                    <a href="{{ route('dashboard.editsuppliers', $supplier->id) }}" 
                                       class="btn-table btn-edit">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                     <a href="{{ route('dashboard.deletesuppliers', $supplier->id) }}" 
                               onclick="return confirm('Are you sure you want to delete this?')" 
                                  class="btn-table btn-delete">
                                    <i class="fas fa-trash"></i> Delete
                              </a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="7" class="no-data">
                                <i class="fas fa-users-slash"></i>
                                <h5 class="mt-2 mb-3">No Suppliers Found</h5>
                                <p class="text-muted">There are no suppliers in the database yet.</p>
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
        
        
        <div class="table-footer">
            <div class="pagination-info">
                @if($suppliers->count() > 0)
                    Showing {{ $suppliers->firstItem() ?? 0 }} to {{ $suppliers->lastItem() ?? 0 }} 
                    of {{ $suppliers->total() }} suppliers
                @else
                    Showing 0 of 0 suppliers
                @endif
            </div>
            
            @if($suppliers->hasPages())
            <div class="d-flex justify-content-center mt-3">
                {{ $suppliers->links('pagination::bootstrap-5') }}
            </div>
            @endif
        </div>
    </div>
</div>

@foreach($suppliers as $supplier)
<div class="modal fade" id="viewModal{{ $supplier->id }}" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="fas fa-user-tie me-2"></i>
                    Supplier Details
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
               
            </div>
        </div>
    </div>
</div>
@endforeach

<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
<script>
   
    document.addEventListener('DOMContentLoaded', function() {
        const searchInput = document.getElementById('searchInput');
        const tableRows = document.querySelectorAll('#suppliersTable tbody tr');
        
        searchInput.addEventListener('keyup', function() {
            const searchTerm = this.value.toLowerCase();
            
            tableRows.forEach(row => {
                const text = row.textContent.toLowerCase();
                if (text.includes(searchTerm)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });
        
       
        const categoryFilter = document.getElementById('categoryFilter');
        categoryFilter.addEventListener('change', function() {
            const category = this.value.toLowerCase();
            
            tableRows.forEach(row => {
                const companyCell = row.querySelector('td:nth-child(4)');
                if (companyCell) {
                    const companyText = companyCell.textContent.toLowerCase();
                    if (category === '' || companyText.includes(category)) {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                }
            });
        });
        
        
        const filterButtons = document.querySelectorAll('.filter-btn');
        filterButtons.forEach(button => {
            button.addEventListener('click', function() {
                const status = this.getAttribute('data-filter');
                
                
                filterButtons.forEach(btn => btn.classList.remove('active'));
                this.classList.add('active');
                
                tableRows.forEach(row => {
                    const statusCell = row.querySelector('td:nth-child(6) .status-badge');
                    if (statusCell) {
                        const statusText = statusCell.textContent.toLowerCase();
                        if (status === 'all' || statusText.includes(status)) {
                            row.style.display = '';
                        } else {
                            row.style.display = 'none';
                        }
                    }
                });
            });
        });
        
        
        const actionButtons = document.querySelectorAll('.action-buttons .btn-table');
        actionButtons.forEach(button => {
            button.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-2px)';
            });
            
            button.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0)';
            });
        });
    });
    
    
    function confirmDelete() {
        return confirm('Are you sure you want to delete this supplier? This action cannot be undone.');
    }
</script>
@endsection
</body>
</html>