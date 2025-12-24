<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document Management</title>
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
            --card-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        }

        body {
            background: linear-gradient(135deg, #f5f7ff 0%, #f0f4ff 100%);
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            min-height: 100vh;
        }

        .page-header {
            background: white;
            border-radius: 16px;
            padding: 25px 30px;
            box-shadow: var(--card-shadow);
            margin-bottom: 30px;
            border-left: 6px solid var(--primary-blue);
        }

        .page-title {
            font-size: 28px;
            font-weight: 800;
            color: var(--dark-gray);
            margin: 0;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .page-title::before {
            content: '';
            display: block;
            width: 6px;
            height: 40px;
            background: linear-gradient(180deg, var(--primary-blue), #60a5fa);
            border-radius: 4px;
        }

        .page-subtitle {
            color: #6b7280;
            font-size: 15px;
            margin-top: 8px;
            font-weight: 500;
        }

       
        .modern-card {
            background: white;
            border-radius: 16px;
            border: none;
            box-shadow: var(--card-shadow);
            overflow: hidden;
            margin-bottom: 24px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .modern-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.12);
        }

        .card-header-modern {
            background: linear-gradient(135deg, var(--primary-blue), var(--secondary-blue));
            color: white;
            padding: 18px 25px;
            border-bottom: none;
        }

        .card-header-modern h5 {
            font-weight: 600;
            margin: 0;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .card-header-modern h5 i {
            font-size: 18px;
        }

        .card-body-modern {
            padding: 25px;
        }

        
        .form-label {
            font-weight: 600;
            color: #374151;
            margin-bottom: 8px;
        }

        .form-control-modern {
            border: 2px solid var(--border-color);
            border-radius: 10px;
            padding: 12px 15px;
            font-size: 15px;
            transition: all 0.3s;
        }

        .form-control-modern:focus {
            border-color: var(--primary-blue);
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
        }

      

.form-select-modern:focus {
    border-color: var(--primary-blue);
    box-shadow: 0 0 0 3px rgba(13,110,253,0.18);
    outline: none;
}
.form-select-modern::after {
    content: "\f078"; 
    font-family: "Font Awesome 6 Free";
    font-weight: 900;
    position: absolute;
    right: 18px;
    top: 50%;
    transform: translateY(-50%);
    pointer-events: none;
    color: #6b7280;
    font-size: 14px;
}


        
        .btn-modern-primary {
            background: linear-gradient(135deg, var(--primary-blue), var(--secondary-blue));
            color: white;
            border: none;
            border-radius: 10px;
            padding: 12px 28px;
            font-weight: 600;
            font-size: 15px;
            transition: all 0.3s;
            box-shadow: 0 4px 12px rgba(37, 99, 235, 0.2);
        }

        .btn-modern-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 18px rgba(37, 99, 235, 0.3);
            color: white;
        }

        .btn-modern-secondary {
            background: #f3f4f6;
            color: #374151;
            border: 2px solid var(--border-color);
            border-radius: 10px;
            padding: 12px 24px;
            font-weight: 600;
            font-size: 15px;
            transition: all 0.3s;
        }

        .btn-modern-secondary:hover {
            background: #e5e7eb;
            color: #111827;
            border-color: #d1d5db;
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
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            padding: 18px 16px;
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
            padding: 16px;
            vertical-align: middle;
            color: #374151;
            font-weight: 500;
            font-size: 14px;
        }

        
        .category-badge {
            padding: 6px 14px;
            border-radius: 20px;
            font-size: 13px;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .badge-invoice {
            background: #dbeafe;
            color: #1e40af;
        }

        .badge-photo {
            background: #fef3c7;
            color: #92400e;
        }

        .badge-id {
            background: #dcfce7;
            color: #166534;
        }

        .badge-certificate {
            background: #f3e8ff;
            color: #7c3aed;
        }

        .badge-others {
            background: #f1f5f9;
            color: #475569;
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
        }

        .btn-preview {
            background: linear-gradient(135deg, #3b82f6, #1d4ed8);
            color: white;
        }

        .btn-preview:hover {
            background: linear-gradient(135deg, #2563eb, #1e40af);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(59, 130, 246, 0.3);
        }

        .btn-download {
            background: linear-gradient(135deg, #10b981, #059669);
            color: white;
        }

        .btn-download:hover {
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

       
        .stats-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .stat-card {
            background: white;
            border-radius: 16px;
            padding: 20px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            display: flex;
            align-items: center;
            gap: 15px;
            transition: transform 0.3s ease;
        }

        .stat-card:hover {
            transform: translateY(-5px);
        }

        .stat-icon {
            width: 60px;
            height: 60px;
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            color: white;
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

       
        .modal-modern .modal-content {
            border-radius: 16px;
            border: none;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        }

        .modal-modern .modal-header {
            background: linear-gradient(135deg, var(--primary-blue), var(--secondary-blue));
            color: white;
            border-top-left-radius: 16px;
            border-top-right-radius: 16px;
            padding: 20px 30px;
            border-bottom: none;
        }

        .modal-modern .modal-header .btn-close {
            filter: brightness(0) invert(1);
        }

        
        @media (max-width: 768px) {
            .page-header {
                padding: 20px;
            }
            
            .stats-container {
                grid-template-columns: 1fr;
            }
            
            .table-responsive {
                border-radius: 12px;
            }
            
            .action-buttons {
                display: flex;
                flex-direction: column;
                gap: 8px;
            }
            
            .btn-action {
                width: 100%;
                justify-content: center;
            }
        }

        
        .upload-area {
            border: 3px dashed #d1d5db;
            border-radius: 12px;
            padding: 40px 20px;
            text-align: center;
            background: #fafafa;
            cursor: pointer;
            transition: all 0.3s;
            margin-bottom: 20px;
        }

        .upload-area:hover {
            border-color: var(--primary-blue);
            background: #f0f9ff;
        }

        .upload-area i {
            font-size: 48px;
            color: #9ca3af;
            margin-bottom: 15px;
        }

        .upload-area.dragover {
            border-color: var(--primary-blue);
            background: #e0f2fe;
        }

       
        .filter-card {
            background: white;
            border-radius: 16px;
            padding: 25px;
            box-shadow: var(--card-shadow);
        }

        .filter-row {
            display: flex;
            gap: 15px;
            align-items: flex-end;
            flex-wrap: wrap;
        }

        .filter-group {
            flex: 1;
            min-width: 200px;
        }

        .quick-actions {
            display: flex;
            gap: 12px;
            margin-top: 20px;
            flex-wrap: wrap;
        }
    </style>
</head>
<body>
@extends('dashboard.adminrole')

@section('content')

<div class="container-fluid py-4">
    <div class="page-header">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h1 class="page-title">📄 Document Management</h1>
                <p class="page-subtitle">Upload, organize, and manage all your documents in one place</p>
            </div>
           
        </div>
    </div>

    
    <div class="stats-container">
        <div class="stat-card">
            <div class="stat-icon" style="background: linear-gradient(135deg, #3b82f6, #1d4ed8);">
                <i class="fas fa-file-alt"></i>
            </div>
            <div class="stat-content">
                <div class="stat-number">{{ count($documents) }}</div>
                <div class="stat-label">Total Documents</div>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon" style="background: linear-gradient(135deg, #10b981, #059669);">
                <i class="fas fa-folder-open"></i>
            </div>
            <div class="stat-content">
                <div class="stat-number">{{ $documents->unique('category')->count() }}</div>
                <div class="stat-label">Categories</div>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon" style="background: linear-gradient(135deg, #f59e0b, #d97706);">
                <i class="fas fa-database"></i>
            </div>
            <div class="stat-content">
                <div class="stat-number">{{ number_format($documents->sum('file_size') / (1024 * 1024), 2) }} MB</div>
                <div class="stat-label">Total Storage</div>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon" style="background: linear-gradient(135deg, #8b5cf6, #7c3aed);">
                <i class="fas fa-chart-line"></i>
            </div>
            <div class="stat-content">
                <div class="stat-number">{{ $documents->where('created_at', '>=', now()->subDays(7))->count() }}</div>
                <div class="stat-label">Last 7 Days</div>
            </div>
        </div>
    </div>

    
    <div class="modern-card">
        <div class="card-header-modern">
            <h5><i class="fas fa-cloud-upload-alt"></i> Upload New Document</h5>
        </div>
        <div class="card-body-modern">
            <div class="upload-area" id="uploadArea">
                <i class="fas fa-cloud-upload-alt"></i>
                <h5 class="mb-2">Drop files here or click to upload</h5>
                <p class="text-muted mb-0">Supports: PDF, DOC, JPG, PNG up to 10MB</p>
                <input type="file" id="fileInput" class="d-none" name="document">
            </div>
            
            <form action="{{ route('document.uploaddocuments') }}" method="post" enctype="multipart/form-data" id="uploadForm">
                @csrf
                <input type="file" name="document" id="documentInput" class="d-none" required>
                
                <div class="row">
                    <div class="col-md-8 mb-3">
                        <label class="form-label">Selected File</label>
                        <div class="selected-file d-flex align-items-center justify-content-between p-3 border rounded-3 bg-light">
                            <span class="text-muted" id="fileName">No file selected</span>
                            <span class="text-primary" id="fileSize"></span>
                        </div>
                    </div>
                    
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Category</label>
                        <select name="category" class="form-select-modern" required>
                            <option value="">Select Category</option>
                            <option value="invoice">Invoice</option>
                            <option value="Photo">Photo</option>
                            <option value="ID Proof">ID Proof</option>
                            <option value="certificate">Certificate</option>
                            <option value="others">Others</option>
                        </select>
                    </div>
                </div>
                
                <div class="d-flex justify-content-end gap-2 mt-4">
                    <button type="button" onclick="clearUpload()" class="btn btn-modern-secondary">
                      Clear
                   </button>
                    <button type="submit" class="btn btn-modern-primary">
                        <i class="fas fa-upload me-2"></i> Upload Document
                    </button>
                </div>
            </form>
        </div>
    </div>

   
    <div class="filter-card mb-4">
        <h6 class="mb-3 fw-bold text-dark">
            <i class="fas fa-filter text-primary me-2"></i> Filter Documents
        </h6>
        
        <form action="{{ route('document.list') }}" method="GET">
            <div class="filter-row">
                <div class="filter-group">
                    <label class="form-label">Search Files</label>
                    <div class="input-group">
                        <span class="input-group-text bg-light border-end-0">
                            <i class="fas fa-search text-muted"></i>
                        </span>
                        <input type="text" name="search" value="{{ request('search') }}" 
                               class="form-control-modern border-start-0" 
                               placeholder="Search by file name, category...">
                    </div>
                </div>
                
                <div class="filter-group">
                    <label class="form-label">Category</label>
                    <select name="category" class="form-select-modern">
                        <option value="">All Categories</option>
                        <option value="invoice" {{ request('category')=='invoice' ? 'selected' : '' }}>Invoice</option>
                        <option value="Photo" {{ request('category')=='Photo' ? 'selected' : '' }}>Photo</option>
                        <option value="ID Proof" {{ request('category')=='ID Proof' ? 'selected' : '' }}>ID Proof</option>
                        <option value="certificate" {{ request('category')=='certificate' ? 'selected' : '' }}>Certificate</option>
                        <option value="others" {{ request('category')=='others' ? 'selected' : '' }}>Others</option>
                    </select>
                </div>
                
                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-modern-primary">
                        <i class="fas fa-check me-2"></i> Apply Filters
                    </button>
                    <a href="{{ route('document.list') }}" class="btn btn-modern-secondary">
                        <i class="fas fa-rotate-left me-2"></i> Reset
                    </a>
                </div>
            </div>
        </form>
        
        <div class="quick-actions">
           <button class="btn btn-outline-primary btn-sm" id="btnPdfOnly">
                   <i class="fas fa-file-pdf me-1"></i> PDF Only
           </button>

          <button class="btn btn-outline-primary btn-sm" id="btnImagesOnly">
                    <i class="fas fa-file-image me-1"></i> Images Only
          </button>

        <button class="btn btn-outline-primary btn-sm" id="btnSortSize">
                 <i class="fas fa-sort-amount-down me-1"></i> Sort by Size
        </button>

        <button class="btn btn-outline-primary btn-sm" id="btnSortDate">
               <i class="fas fa-sort-amount-up me-1"></i> Sort by Date
        </button>

        <button class="btn btn-outline-primary btn-sm" id="btnReset">
                <i class="fas fa-rotate-left me-1"></i> Reset
         </button>

        </div>
    </div>

    
    <div class="modern-card">
        <div class="card-header-modern">
            <h5><i class="fas fa-folder-open"></i> Uploaded Documents</h5>
        </div>
        
        <div class="card-body-modern p-0">
            @if(count($documents) > 0)
            <div class="table-responsive">
                <table class="table table-modern table-hover mb-0" id="documentsTable">
                    <thead>
                        <tr>
                            <th width="60">SI No </th>
                            <th>File Name</th>
                            <th>Category</th>
                            <th>Type</th>
                            <th>Size</th>
                            <th>Upload Date</th>
                            <th width="280">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($documents as $doc)
                        <tr>
                            <td class="fw-bold text-primary">{{ $loop->iteration }}</td>
                            <td>
                                <div class="d-flex align-items-center gap-3">
                                    <div class="file-icon">
                                        @if($doc->file_type == 'pdf')
                                        <i class="fas fa-file-pdf text-danger fs-4"></i>
                                        @elseif(in_array($doc->file_type, ['jpg', 'jpeg', 'png', 'gif']))
                                        <i class="fas fa-file-image text-success fs-4"></i>
                                        @elseif(in_array($doc->file_type, ['doc', 'docx']))
                                        <i class="fas fa-file-word text-primary fs-4"></i>
                                        @else
                                        <i class="fas fa-file text-secondary fs-4"></i>
                                        @endif
                                    </div>
                                    <div>
                                        <div class="fw-semibold">{{ $doc->file_name }}</div>
                                        <small class="text-muted">ID: {{ $doc->id }}</small>
                                    </div>
                                </div>
                            </td>
                            <td>
                                @php
                                    $badgeClass = 'badge-others';
                                    if($doc->category == 'invoice') $badgeClass = 'badge-invoice';
                                    elseif($doc->category == 'Photo') $badgeClass = 'badge-photo';
                                    elseif($doc->category == 'ID Proof') $badgeClass = 'badge-id';
                                    elseif($doc->category == 'certificate') $badgeClass = 'badge-certificate';
                                @endphp
                                <span class="category-badge {{ $badgeClass }}">
                                    <i class="fas fa-folder"></i> {{ $doc->category }}
                                </span>
                            </td>
                            <td>
                                <span class="badge bg-light text-dark border">{{ strtoupper($doc->file_type) }}</span>
                            </td>
                            <td>
                                <span class="fw-semibold">{{ number_format($doc->file_size / 1024, 2) }} KB</span>
                            </td>
                            <td>
                                <small class="text-muted">{{ $doc->created_at->format('M d, Y') }}</small>
                            </td>
                            <td>
                                <div class="action-buttons d-flex gap-2">
                                    <button class="btn btn-action btn-preview"
                                            onclick="previewDocument('{{ route('document.previewDocument', $doc->id) }}')">
                                        <i class="fas fa-eye"></i> Preview
                                    </button>
                                    <a href="{{ route('document.downloads', $doc->id) }}" 
                                       class="btn btn-action btn-download">
                                        <i class="fas fa-download"></i> Download
                                    </a>
                                    <a href="{{ route('document.delete', $doc->id) }}" 
                                       class="btn btn-action btn-delete"
                                       onclick="return confirm('Are you sure you want to delete this file?')">
                                        <i class="fas fa-trash"></i> Delete
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @else
            <div class="empty-state">
                <div class="empty-icon">
                    <i class="fas fa-file-circle-exclamation"></i>
                </div>
                <h5 class="empty-title">No documents found</h5>
                <p class="empty-text">Upload your first document by clicking the upload area above.</p>
                <button class="btn btn-modern-primary" onclick="document.getElementById('uploadArea').click()">
                    <i class="fas fa-cloud-upload-alt me-2"></i> Upload First Document
                </button>
            </div>
            @endif
        </div>
        
        @if(count($documents) > 0)
        <div class="card-footer bg-light border-top px-4 py-3 d-flex justify-content-between align-items-center">
            <div class="text-muted">
                Showing {{ count($documents) }} of {{ count($documents) }} documents
            </div>
            <div class="d-flex gap-2">
                <button class="btn btn-sm btn-outline-primary">
                    <i class="fas fa-chevron-left"></i>
                </button>
                <button class="btn btn-sm btn-primary">1</button>
                <button class="btn btn-sm btn-outline-primary">
                    <i class="fas fa-chevron-right"></i>
                </button>
            </div>
        </div>
        @endif
    </div>
</div>


<div class="modal fade modal-modern" id="previewModal" tabindex="-1">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="fas fa-file-alt me-2"></i> Document Preview
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body p-0">
                <iframe id="previewFrame" style="width:100%; height:70vh; border:none; border-radius: 0 0 16px 16px;"></iframe>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
<script>
    
    document.addEventListener('DOMContentLoaded', function() {
        const uploadArea = document.getElementById('uploadArea');
        const fileInput = document.getElementById('fileInput');
        const documentInput = document.getElementById('documentInput');
        const fileName = document.getElementById('fileName');
        const fileSize = document.getElementById('fileSize');
        
        uploadArea.addEventListener('click', () => fileInput.click());
        
        fileInput.addEventListener('change', function(e) {
            if (e.target.files.length > 0) {
                const file = e.target.files[0];
                documentInput.files = e.target.files;
                fileName.textContent = file.name;
                fileSize.textContent = formatFileSize(file.size);
            }
        });
        
       
        ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
            uploadArea.addEventListener(eventName, preventDefaults, false);
        });
        
        function preventDefaults(e) {
            e.preventDefault();
            e.stopPropagation();
        }
        
        ['dragenter', 'dragover'].forEach(eventName => {
            uploadArea.addEventListener(eventName, highlight, false);
        });
        
        ['dragleave', 'drop'].forEach(eventName => {
            uploadArea.addEventListener(eventName, unhighlight, false);
        });
        
        function highlight() {
            uploadArea.classList.add('dragover');
        }
        
        function unhighlight() {
            uploadArea.classList.remove('dragover');
        }
        
        uploadArea.addEventListener('drop', handleDrop, false);
        
        function handleDrop(e) {
            const dt = e.dataTransfer;
            const files = dt.files;
            
            if (files.length > 0) {
                fileInput.files = files;
                const file = files[0];
                const dataTransfer = new DataTransfer();
                dataTransfer.items.add(file);
                documentInput.files = dataTransfer.files;
                fileName.textContent = file.name;
                fileSize.textContent = formatFileSize(file.size);
            }
        }
        
        function formatFileSize(bytes) {
            if (bytes === 0) return '0 Bytes';
            const k = 1024;
            const sizes = ['Bytes', 'KB', 'MB', 'GB'];
            const i = Math.floor(Math.log(bytes) / Math.log(k));
            return parseFloat((bytes / Math.pow(k, i)).toFixed(2)) + ' ' + sizes[i];
        }
    });
    function clearUpload() {
    
    document.getElementById('fileInput').value = "";
    document.getElementById('documentInput').value = "";

    
    document.getElementById('fileName').textContent = "No file selected";
    document.getElementById('fileSize').textContent = "";
}
   
function getRows() {
    return Array.from(document.querySelectorAll("#documentsTable tbody tr"));
}


function renderRows(rows) {
    const tbody = document.querySelector("#documentsTable tbody");
    tbody.innerHTML = "";
    rows.forEach(row => tbody.appendChild(row));
}


document.querySelector("#btnPdfOnly").addEventListener("click", () => {
    const rows = getRows().filter(row => {
        return row.querySelector("td:nth-child(4)").innerText.trim().toLowerCase() === "pdf";
    });
    renderRows(rows);
});


document.querySelector("#btnImagesOnly").addEventListener("click", () => {
    const imageTypes = ["jpg", "jpeg", "png", "gif"];
    const rows = getRows().filter(row => {
        const type = row.querySelector("td:nth-child(4)").innerText.trim().toLowerCase();
        return imageTypes.includes(type);
    });
    renderRows(rows);
});


document.querySelector("#btnSortSize").addEventListener("click", () => {
    const rows = getRows().sort((a, b) => {
        const sizeA = parseFloat(a.querySelector("td:nth-child(5)").innerText);
        const sizeB = parseFloat(b.querySelector("td:nth-child(5)").innerText);
        return sizeA - sizeB;
    });
    renderRows(rows);
});


document.querySelector("#btnSortDate").addEventListener("click", () => {
    const rows = getRows().sort((a, b) => {
        const dateA = new Date(a.querySelector("td:nth-child(6)").innerText);
        const dateB = new Date(b.querySelector("td:nth-child(6)").innerText);
        return dateA - dateB;
    });
    renderRows(rows);
});
document.querySelector("#btnReset").addEventListener("click", () => {
    location.reload(); 
});



    function previewDocument(url) {
        document.getElementById('previewFrame').src = url;
        const modal = new bootstrap.Modal(document.getElementById('previewModal'));
        modal.show();
    }
    
    
    @if(count($documents) > 0)
    document.addEventListener('DOMContentLoaded', function() {
        const categories = {
            invoice: 0,
            Photo: 0,
            'ID Proof': 0,
            certificate: 0,
            others: 0
        };
        
        @foreach($documents as $doc)
            categories['{{ $doc->category }}']++;
        @endforeach
        
        
    });
    @endif
</script>
@endsection
</body>
</html>