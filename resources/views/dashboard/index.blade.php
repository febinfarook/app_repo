<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Management</title>
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
        
        .customer-name {
            font-weight: 600;
            color: #2c3e50;
        }
        
        .customer-email {
            color: var(--primary-blue);
            font-weight: 500;
        }
        
        .address-cell {
            max-width: 150px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }
        
        .action-buttons {
            display: flex;
            flex-direction: row;         
            justify-content: center;
            align-items: center;
            gap: 12px;                   
           white-space: nowrap;  
        }
        
        .btn-profile {
            background: #2563eb;
            background-color: var(--primary-blue);
            color: white;
            border-radius: 6px;
            padding: 6px 12px;
            font-size: 13px;
            font-weight: 500;
            border: none;
            transition: all 0.2s ease;
            text-decoration: none;
        }
        
        .btn-profile:hover {
            background-color: #1e4ed8;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(13, 110, 253, 0.2);
        }
        
        .btn-edit {
            background: #16a34a;
            background-color: var(--success-green);
            color: white;
            border-radius: 6px;
            padding: 6px 12px;
            font-size: 13px;
            font-weight: 500;
            border: none;
            transition: all 0.2s ease;
            text-decoration: none;
        }
        
        .btn-edit:hover {
            background-color: #13823c;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(40, 167, 69, 0.2);
        }
        
        .btn-delete {
            background: #dc2626;
            background-color: var(--danger-red);
            color: white;
            border-radius: 6px;
            padding: 6px 14px;
            font-size: 13px;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            white-space: nowrap;
            text-decoration: none;
        }
        
        .btn-delete:hover {
            background-color: #b91c1c;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(220, 53, 69, 0.2);
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
            
            .action-buttons {
                flex-direction: column;
                width: 100%;
            }
            
            .action-buttons a {
                width: 100%;
                text-align: center;
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
        <h2 class="page-title mb-3">Customer Management</h2>
        <p class="text-muted mb-0">View and manage all customer accounts and information</p>
    </div>
    
   
    <div class="row mb-4">
        <div class="col-md-3 col-sm-6 mb-3">
            <div class="stats-card">
                <div class="d-flex align-items-center">
                    <div class="stats-icon me-3">
                        <i class="fas fa-users"></i>
                    </div>
                    <div>
                        <div class="stats-number">{{ count($customers) }}</div>
                        <div class="stats-label">Total Customers</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 mb-3">
            <div class="stats-card">
                <div class="d-flex align-items-center">
                    <div class="stats-icon me-3" style="background: linear-gradient(135deg, #28a745, #6fdc8c);">
                        <i class="fas fa-user-check"></i>
                    </div>
                    <div>
                        <div class="stats-number">0</div>
                        <div class="stats-label">Active Today</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 mb-3">
            <div class="stats-card">
                <div class="d-flex align-items-center">
                    <div class="stats-icon me-3" style="background: linear-gradient(135deg, #ffc107, #ffda6a);">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <div>
                        <div class="stats-number">{{ $customers->unique('city')->count() }}</div>
                        <div class="stats-label">Cities</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 mb-3">
            <div class="stats-card">
                <div class="d-flex align-items-center">
                    <div class="stats-icon me-3" style="background: linear-gradient(135deg, #6c757d, #a7acb1);">
                        <i class="fas fa-edit"></i>
                    </div>
                    <div>
                        <div class="stats-number">0</div>
                        <div class="stats-label">Updated Today</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
   
    <div class="clean-table-container">
        <div class="table-header">
            <h3 class="table-title">Customer List</h3>
            <div class="search-box">
                <i class="fas fa-search"></i>
                <input type="text" class="form-control" placeholder="Search customers...">
            </div>
        </div>
        
       
        <div class="table-responsive">
            <table class="table clean-table">
                <thead>
                    <tr>
                        <th width="60">SI No</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Location</th>
                        <th style="width: 300px;" class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($customers) > 0)
                        @foreach($customers as $customer)
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="bg-light rounded-circle d-flex align-items-center justify-content-center" style="width: 36px; height: 36px;">
                                        <span class="fw-bold text-primary">{{ $loop->iteration }}</span>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="customer-name">{{ $customer->name }}</div>
                            </td>
                            <td>
                                <a href="mailto:{{ $customer->email }}" class="customer-email text-decoration-none">
                                    <i class="fas fa-envelope me-1"></i> {{ $customer->email }}
                                </a>
                            </td>
                            <td>
                                <div class="d-flex align-items-start">
                                    <i class="fas fa-map-marker-alt text-danger me-2 mt-1"></i>
                                    <div>
                                        <div class="small">{{ $customer->house }}, {{ $customer->street }}</div>
                                        <div class="small text-muted">{{ $customer->city }}, {{ $customer->province }}</div>
                                    </div>
                                </div>
                            </td>
                          <td>
                            <div class="action-buttons">
                              <a href="{{ route('dashboard.profile', $customer->id) }}" class="btn-table btn-profile">
                                 <i class="fas fa-user"></i> Profile
                             </a>

                              <a href="{{ route('dashboard.edit', $customer->id) }}" class="btn-table btn-edit">
                                     <i class="fas fa-edit"></i> Edit
                              </a>

                             <a href="{{ route('dashboard.delete', $customer->id) }}" 
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
                            <td colspan="5" class="no-data">
                                <i class="fas fa-users-slash"></i>
                                <h5 class="mt-2 mb-3">No Customers Found</h5>
                                <p class="text-muted">There are no customers in the database yet.</p>
                                <a href="#" class="btn btn-primary mt-2">
                                    <i class="fas fa-user-plus me-1"></i> Add First Customer
                                </a>
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
        
      
        <div class="table-footer">
            <div class="pagination-info">
                Showing {{ count($customers) }} of {{ count($customers) }} customers
            </div>
            
            <div class="d-flex justify-content-center mt-3">
                    {{ $customers->links('pagination::bootstrap-5') }}
                 </div>
                </ul>
            </nav>
        </div>
    </div>
    
   
    
</div>

<script>
   
    document.addEventListener('DOMContentLoaded', function() {
        const searchInput = document.querySelector('.search-box input');
        const tableRows = document.querySelectorAll('.clean-table tbody tr');
        
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
        
      
        const actionButtons = document.querySelectorAll('.action-buttons a');
        actionButtons.forEach(button => {
            button.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-2px)';
            });
            
            button.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0)';
            });
        });
    });
</script>

@endsection
</body>
</html>