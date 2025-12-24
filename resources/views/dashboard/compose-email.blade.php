<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compose Email | Support Request</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.quilljs.com/1.3.7/quill.snow.css" rel="stylesheet">
    <style>
        .email-wrapper {
            max-width: 1100px;
            margin: auto;
            padding: 20px;
        }

        .email-card {
            background: linear-gradient(135deg, #ffffff 0%, #f5f3ff 100%);
            border-radius: 28px;
            padding: 50px 60px;
            box-shadow: 0 22px 50px rgba(99, 102, 241, 0.2);
            animation: fadeSlide 0.8s ease-out;
            position: relative;
            overflow: hidden;
            border: 2px solid rgba(99, 102, 241, 0.25);
        }

        .email-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            height: 8px;
            width: 100%;
            background: linear-gradient(90deg, #6366f1, #818cf8, #a5b4fc);
        }

        .email-header {
            display: flex;
            align-items: center;
            gap: 20px;
            margin-bottom: 30px;
            position: relative;
            z-index: 1;
        }

        .email-icon {
            background: linear-gradient(135deg, #6366f1, #4f46e5);
            color: white;
            width: 80px;
            height: 80px;
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2.2rem;
            box-shadow: 0 12px 30px rgba(99, 102, 241, 0.4);
            animation: envelopeFloat 3s infinite ease-in-out;
        }

        .email-title {
            flex: 1;
        }

        .email-title h1 {
            font-size: 2.5rem;
            font-weight: 900;
            color: #312e81;
            margin: 0;
            letter-spacing: -0.5px;
        }

        .email-title p {
            color: #4f46e5;
            font-size: 1.1rem;
            margin: 8px 0 0;
            font-weight: 500;
        }

        .form-container {
            position: relative;
            z-index: 1;
        }

        .form-group {
            margin-bottom: 30px;
        }

        .form-label {
            font-weight: 700;
            color: #312e81;
            margin-bottom: 12px;
            font-size: 1.1rem;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .form-label i {
            color: #6366f1;
            font-size: 1.2rem;
        }

        .form-control, .form-select {
            border-radius: 14px;
            padding: 16px 20px;
            border: 2px solid #d1d5db;
            font-size: 16px;
            transition: all 0.3s ease;
            background: white;
        }

        .form-control:focus, .form-select:focus {
            border-color: #6366f1;
            box-shadow: 0 0 0 4px rgba(99, 102, 241, 0.15);
        }

        .form-control[readonly] {
            background-color: #f9fafb;
            border-color: #e5e7eb;
        }

        .recipient-selector {
            display: flex;
            gap: 15px;
            margin-bottom: 20px;
            flex-wrap: wrap;
        }

        .recipient-btn {
            padding: 10px 20px;
            border-radius: 12px;
            background: #f3f4f6;
            border: 2px solid #e5e7eb;
            color: #6b7280;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .recipient-btn:hover {
            background: #e5e7eb;
        }

        .recipient-btn.active {
            background: #6366f1;
            color: white;
            border-color: #6366f1;
        }

        .character-counter {
            text-align: right;
            font-size: 14px;
            color: #6b7280;
            margin-top: 8px;
        }

        .character-counter.warning {
            color: #f59e0b;
        }

        .character-counter.danger {
            color: #ef4444;
        }

        .rich-text-editor {
            background: white;
            border-radius: 14px;
            border: 2px solid #d1d5db;
            overflow: hidden;
            margin-bottom: 30px;
        }

        #editor {
            height: 300px;
            font-size: 16px;
            color: #374151;
        }

        .attachments-section {
            background: #f8fafc;
            border-radius: 14px;
            padding: 25px;
            margin: 30px 0;
            border: 2px dashed #c7d2fe;
        }

        .attachments-title {
            font-size: 1.2rem;
            font-weight: 700;
            color: #312e81;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .attachments-title i {
            color: #6366f1;
        }

        .file-input-container {
            position: relative;
            overflow: hidden;
            display: inline-block;
            width: 100%;
        }

        .file-input-btn {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 15px 25px;
            background: #eef2ff;
            color: #6366f1;
            border: 2px solid #c7d2fe;
            border-radius: 12px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            width: 100%;
            justify-content: center;
        }

        .file-input-btn:hover {
            background: #e0e7ff;
            border-color: #a5b4fc;
        }

        .file-input {
            position: absolute;
            left: 0;
            top: 0;
            opacity: 0;
            width: 100%;
            height: 100%;
            cursor: pointer;
        }

        .attachments-list {
            margin-top: 25px;
            max-height: 200px;
            overflow-y: auto;
        }

        .attachment-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 15px;
            background: white;
            border-radius: 12px;
            margin-bottom: 10px;
            border: 1px solid #e5e7eb;
        }

        .attachment-info {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .attachment-icon {
            width: 50px;
            height: 50px;
            border-radius: 10px;
            background: #eef2ff;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #6366f1;
            font-size: 1.2rem;
        }

        .attachment-details {
            flex: 1;
        }

        .attachment-name {
            font-weight: 600;
            color: #1f2937;
            margin-bottom: 5px;
        }

        .attachment-size {
            font-size: 14px;
            color: #6b7280;
        }

        .remove-attachment {
            background: none;
            border: none;
            color: #9ca3af;
            cursor: pointer;
            padding: 8px;
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .remove-attachment:hover {
            color: #ef4444;
            background: #fef2f2;
        }

        .priority-selector {
            display: flex;
            gap: 15px;
            margin-bottom: 30px;
            flex-wrap: wrap;
        }

        .priority-btn {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 12px 25px;
            border-radius: 12px;
            background: #f3f4f6;
            border: 2px solid #e5e7eb;
            color: #6b7280;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .priority-btn:hover {
            background: #e5e7eb;
        }

        .priority-btn.active {
            color: white;
            border-color: transparent;
        }

        .priority-btn.normal.active {
            background: #10b981;
        }

        .priority-btn.high.active {
            background: #f59e0b;
        }

        .priority-btn.urgent.active {
            background: #ef4444;
        }

        .email-preview {
            background: white;
            border-radius: 14px;
            padding: 30px;
            margin: 30px 0;
            border: 2px solid #e5e7eb;
            display: none;
        }

        .preview-title {
            font-size: 1.4rem;
            font-weight: 700;
            color: #312e81;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .preview-content {
            background: #f9fafb;
            border-radius: 10px;
            padding: 25px;
            max-height: 300px;
            overflow-y: auto;
        }

        .action-buttons {
            display: flex;
            gap: 20px;
            margin-top: 40px;
            flex-wrap: wrap;
        }

        .btn-primary {
            display: inline-flex;
            align-items: center;
            gap: 12px;
            background: linear-gradient(135deg, #6366f1, #4f46e5);
            border: none;
            border-radius: 16px;
            padding: 18px 40px;
            font-weight: 800;
            font-size: 1.1rem;
            box-shadow: 0 15px 35px rgba(99, 102, 241, 0.4);
            transition: all 0.3s ease;
            color: white;
        }

        .btn-primary:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(99, 102, 241, 0.5);
            color: white;
        }

        .btn-primary i {
            animation: sendPulse 2s infinite;
        }

        .btn-outline-secondary {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            border-radius: 16px;
            padding: 18px 35px;
            font-weight: 600;
            transition: all 0.3s ease;
            background: #f8f9fa;
            border: 2px solid #e5e7eb;
            color: #4b5563;
            text-decoration: none;
        }

        .btn-outline-secondary:hover {
            transform: translateX(-4px);
            background: #f3f4f6;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.08);
            color: #1f2937;
        }

        .preview-btn {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            background: #f3f4f6;
            border: 2px solid #e5e7eb;
            color: #6b7280;
            padding: 12px 25px;
            border-radius: 12px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .preview-btn:hover {
            background: #e5e7eb;
        }

        .template-selector {
            background: #eef2ff;
            border-radius: 14px;
            padding: 20px;
            margin-bottom: 30px;
        }

        .template-select {
            width: 100%;
            padding: 12px 16px;
            border-radius: 10px;
            border: 2px solid #c7d2fe;
            background: white;
            font-size: 15px;
            color: #374151;
        }

        @keyframes fadeSlide {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes envelopeFloat {
            0%, 100% {
                transform: translateY(0) rotate(0deg);
            }
            50% {
                transform: translateY(-10px) rotate(3deg);
            }
        }

        @keyframes sendPulse {
            0% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.2);
            }
            100% {
                transform: scale(1);
            }
        }

        @media (max-width: 768px) {
            .email-card {
                padding: 35px 25px;
            }
            
            .email-header {
                flex-direction: column;
                text-align: center;
                gap: 15px;
            }
            
            .email-icon {
                width: 70px;
                height: 70px;
                font-size: 2rem;
            }
            
            .email-title h1 {
                font-size: 2rem;
            }
            
            .action-buttons {
                flex-direction: column;
                align-items: stretch;
            }
            
            .btn-primary, .btn-outline-secondary, .preview-btn {
                width: 100%;
                justify-content: center;
            }
            
            .recipient-selector, .priority-selector {
                flex-direction: column;
            }
        }

        .form-hint {
            font-size: 14px;
            color: #6b7280;
            margin-top: 8px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .form-hint i {
            color: #6366f1;
        }

        .word-count {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 10px;
            font-size: 14px;
            color: #6b7280;
        }

        .success-message {
            display: none;
            background: #d1fae5;
            border: 2px solid #a7f3d0;
            border-radius: 14px;
            padding: 25px;
            margin: 30px 0;
            text-align: center;
        }

        .success-message i {
            font-size: 3rem;
            color: #10b981;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    @extends('dashboard.adminrole')
    @section('content')
    <div class="container py-5">
        <div class="email-wrapper">
            <div class="email-card">
                <div class="email-header">
                    <div class="email-icon">
                        <i class="fas fa-envelope-open-text"></i>
                    </div>
                    <div class="email-title">
                        <h1>Compose Email</h1>
                        <p>Send a detailed message to our support team for comprehensive assistance</p>
                    </div>
                </div>

                <div class="form-container">
                    <form id="emailForm" method="POST" action="#">
                        @csrf

                        <div class="form-group">
                            <label class="form-label">
                                <i class="fas fa-user-friends"></i>
                                Recipient
                            </label>
                            <div class="recipient-selector">
                                <button type="button" class="recipient-btn active" data-recipient="support@adminportal.com">
                                    <i class="fas fa-headset"></i> Support Team
                                </button>
                                <button type="button" class="recipient-btn" data-recipient="billing@adminportal.com">
                                    <i class="fas fa-credit-card"></i> Billing Team
                                </button>
                                <button type="button" class="recipient-btn" data-recipient="security@adminportal.com">
                                    <i class="fas fa-shield-alt"></i> Security Team
                                </button>
                            </div>
                            <input type="email" id="recipient" class="form-control" value="support@adminportal.com" readonly>
                            <div class="form-hint">
                                <i class="fas fa-info-circle"></i>
                                Choose the appropriate team for your issue
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="subject">
                                <i class="fas fa-tag"></i>
                                Subject
                            </label>
                            <input type="text" id="subject" class="form-control" placeholder="Brief description of your issue (e.g., Login Issue - Account Access Problem)" maxlength="100">
                            <div class="character-counter" id="subjectCounter">0/100 characters</div>
                            <div class="form-hint">
                                <i class="fas fa-lightbulb"></i>
                                Be specific to help us route your request faster
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label">
                                <i class="fas fa-file-alt"></i>
                                Email Template
                            </label>
                            <div class="template-selector">
                                <select class="template-select" id="templateSelect">
                                    <option value="">Select a template (optional)</option>
                                    <option value="technical">Technical Issue</option>
                                    <option value="billing">Billing Inquiry</option>
                                    <option value="account">Account Access</option>
                                    <option value="feature">Feature Request</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label">
                                <i class="fas fa-edit"></i>
                                Message
                            </label>
                            <div class="rich-text-editor">
                                <div id="editor"></div>
                            </div>
                            <div class="word-count">
                                <span id="wordCount">0 words</span>
                                <span id="charCount">0 characters</span>
                            </div>
                        </div>

                        <div class="attachments-section">
                            <div class="attachments-title">
                                <i class="fas fa-paperclip"></i>
                                Attachments
                            </div>
                            <div class="file-input-container">
                                <button type="button" class="file-input-btn">
                                    <i class="fas fa-cloud-upload-alt"></i>
                                    Click to upload files (Max: 5 files, 10MB each)
                                </button>
                                <input type="file" class="file-input" id="fileInput" multiple accept=".jpg,.jpeg,.png,.pdf,.doc,.docx,.txt,.zip">
                            </div>
                            <div class="attachments-list" id="attachmentsList">
                               
                            
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label">
                                <i class="fas fa-flag"></i>
                                Priority
                            </label>
                            <div class="priority-selector">
                                <button type="button" class="priority-btn normal active" data-priority="normal">
                                    <i class="fas fa-flag"></i> Normal
                                </button>
                                <button type="button" class="priority-btn high" data-priority="high">
                                    <i class="fas fa-exclamation-circle"></i> High
                                </button>
                                <button type="button" class="priority-btn urgent" data-priority="urgent">
                                    <i class="fas fa-exclamation-triangle"></i> Urgent
                                </button>
                            </div>
                            <input type="hidden" id="priority" name="priority" value="normal">
                            <div class="form-hint">
                                <i class="fas fa-info-circle"></i>
                                Use "Urgent" only for critical issues requiring immediate attention
                            </div>
                        </div>

                        <div class="success-message" id="successMessage">
                            <i class="fas fa-check-circle"></i>
                            <h3 style="color: #065f46; margin-bottom: 10px;">Email Sent Successfully!</h3>
                            <p style="color: #047857; margin-bottom: 20px;">Your message has been submitted to our support team. We'll respond within 2 hours.</p>
                            <a href="{{ url()->previous() }}" class="btn btn-outline-secondary">
                                <i class="fas fa-arrow-left"></i> Return to Dashboard
                            </a>
                        </div>

                        <div class="action-buttons">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-paper-plane"></i> Send Email
                            </button>
                            <button type="button" class="preview-btn" id="previewBtn">
                                <i class="fas fa-eye"></i> Preview Email
                            </button>
                            <a href="{{ url()->previous() }}" class="btn btn-outline-secondary">
                                <i class="fas fa-times"></i> Cancel
                            </a>
                        </div>
                    </form>

                    <div class="email-preview" id="emailPreview">
                        <div class="preview-title">
                            <i class="fas fa-eye"></i>
                            Email Preview
                        </div>
                        <div class="preview-content" id="previewContent">
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.quilljs.com/1.3.7/quill.min.js"></script>
    <script>
        
        const quill = new Quill('#editor', {
            theme: 'snow',
            modules: {
                toolbar: [
                    ['bold', 'italic', 'underline', 'strike'],
                    ['link', 'blockquote', 'code-block'],
                    [{ 'list': 'ordered' }, { 'list': 'bullet' }],
                    [{ 'header': [1, 2, 3, false] }],
                    [{ 'color': [] }, { 'background': [] }],
                    ['clean']
                ]
            },
            placeholder: 'Describe your issue in detail. Include steps to reproduce, error messages, and any troubleshooting you\'ve already tried...'
        });

       
        const defaultMessage = `<p><strong>Dear Support Team,</strong></p><p><br></p><p>I am experiencing an issue with:</p><p><br></p><ul><li><strong>Issue Description:</strong> [Please describe your issue here]</li><li><strong>When it started:</strong> [Date and time]</li><li><strong>Steps to reproduce:</strong> [Step-by-step instructions]</li><li><strong>Error Messages:</strong> [Copy any error messages exactly]</li></ul><p><br></p><p><strong>Account Information:</strong></p><ul><li>Account ID/Username: [Your account information]</li><li>Device/Browser: [e.g., Windows 10, Chrome 120]</li></ul><p><br></p><p><strong>Already Tried:</strong> [List any troubleshooting steps you've taken]</p><p><br></p><p>I appreciate your assistance with this matter.</p><p><br></p><p>Best regards,</p><p>[Your Name]</p>`;
        
        quill.root.innerHTML = defaultMessage;
        updateWordCount();

       
        function updateWordCount() {
            const text = quill.getText().trim();
            const words = text ? text.split(/\s+/).length : 0;
            const characters = quill.getLength() - 1;
            
            document.getElementById('wordCount').textContent = `${words} words`;
            document.getElementById('charCount').textContent = `${characters} characters`;
        }

        quill.on('text-change', updateWordCount);

        
        document.querySelectorAll('.recipient-btn').forEach(button => {
            button.addEventListener('click', function() {
                document.querySelectorAll('.recipient-btn').forEach(btn => btn.classList.remove('active'));
                this.classList.add('active');
                document.getElementById('recipient').value = this.dataset.recipient;
            });
        });

        
        document.querySelectorAll('.priority-btn').forEach(button => {
            button.addEventListener('click', function() {
                document.querySelectorAll('.priority-btn').forEach(btn => {
                    btn.classList.remove('active');
                    btn.style.borderColor = '#e5e7eb';
                    btn.style.background = '#f3f4f6';
                });
                this.classList.add('active');
                this.style.borderColor = 'transparent';
                
                const priority = this.dataset.priority;
                document.getElementById('priority').value = priority;
            });
        });

        
        document.getElementById('templateSelect').addEventListener('change', function() {
            const template = this.value;
            let newContent = defaultMessage;
            
            switch(template) {
                case 'technical':
                    newContent = `<p><strong>Dear Technical Support Team,</strong></p><p><br></p><p>I am experiencing a technical issue with the platform:</p><p><br></p><ul><li><strong>Issue:</strong> [Describe the technical problem]</li><li><strong>Error Code:</strong> [If any]</li><li><strong>Affected Feature:</strong> [Which feature is not working]</li><li><strong>Frequency:</strong> [How often does it occur]</li></ul><p><br></p><p><strong>Technical Details:</strong></p><ul><li>Browser & Version: [e.g., Chrome 120.0]</li><li>Operating System: [e.g., Windows 11]</li><li>Device: [Desktop/Mobile]</li></ul><p><br></p><p>I have already tried clearing cache and cookies, and using a different browser.</p><p><br></p><p>Best regards,</p><p>[Your Name]</p>`;
                    break;
                case 'billing':
                    newContent = `<p><strong>Dear Billing Department,</strong></p><p><br></p><p>I need assistance with a billing matter:</p><p><br></p><ul><li><strong>Issue:</strong> [Describe billing issue]</li><li><strong>Invoice Number:</strong> [If applicable]</li><li><strong>Amount:</strong> [If applicable]</li><li><strong>Transaction Date:</strong> [Date of transaction]</li></ul><p><br></p><p><strong>Account Information:</strong></p><ul><li>Account ID: [Your account ID]</li><li>Plan: [Current subscription plan]</li></ul><p><br></p><p>Please let me know what information you need from me to resolve this matter.</p><p><br></p><p>Best regards,</p><p>[Your Name]</p>`;
                    break;
                case 'account':
                    newContent = `<p><strong>Dear Support Team,</strong></p><p><br></p><p>I am having trouble accessing my account:</p><p><br></p><ul><li><strong>Issue:</strong> [Cannot login/Forgot password/Account locked]</li><li><strong>Username/Email:</strong> [Your account email]</li><li><strong>Error Message:</strong> [Copy any error message]</li></ul><p><br></p><p><strong>Verification Information:</strong></p><ul><li>Account Name: [Full name on account]</li><li>Last Successful Login: [Approximate date]</li><li>Security Questions Answers: [If you remember them]</li></ul><p><br></p><p>Please help me regain access to my account.</p><p><br></p><p>Best regards,</p><p>[Your Name]</p>`;
                    break;
                case 'feature':
                    newContent = `<p><strong>Dear Product Team,</strong></p><p><br></p><p>I would like to suggest a new feature or improvement:</p><p><br></p><ul><li><strong>Feature Request:</strong> [Describe the feature]</li><li><strong>Use Case:</strong> [How would this feature be used]</li><li><strong>Benefit:</strong> [How would this help users]</li><li><strong>Similar Features:</strong> [Examples from other platforms]</li></ul><p><br></p><p><strong>Priority:</strong> [High/Medium/Low - How important is this to you]</p><p><br></p><p>Thank you for considering my suggestion.</p><p><br></p><p>Best regards,</p><p>[Your Name]</p>`;
                    break;
            }
            
            quill.root.innerHTML = newContent;
            updateWordCount();
        });

        
        const subjectInput = document.getElementById('subject');
        const subjectCounter = document.getElementById('subjectCounter');
        
        subjectInput.addEventListener('input', function() {
            const length = this.value.length;
            subjectCounter.textContent = `${length}/100 characters`;
            
            if (length > 80) {
                subjectCounter.classList.add('warning');
                subjectCounter.classList.remove('danger');
            } else if (length > 95) {
                subjectCounter.classList.remove('warning');
                subjectCounter.classList.add('danger');
            } else {
                subjectCounter.classList.remove('warning', 'danger');
            }
        });

       
        const fileInput = document.getElementById('fileInput');
        const attachmentsList = document.getElementById('attachmentsList');
        const attachments = [];

        fileInput.addEventListener('change', function(e) {
            const files = Array.from(e.target.files);
            
            files.forEach(file => {
                if (attachments.length >= 5) {
                    alert('Maximum 5 files allowed');
                    return;
                }
                
                if (file.size > 10 * 1024 * 1024) {
                    alert(`File "${file.name}" exceeds 10MB limit`);
                    return;
                }
                
                attachments.push(file);
                renderAttachment(file);
            });
            
            
            fileInput.value = '';
        });

        function renderAttachment(file) {
            const attachmentItem = document.createElement('div');
            attachmentItem.className = 'attachment-item';
            
            const fileSize = (file.size / 1024 / 1024).toFixed(2);
            const fileIcon = getFileIcon(file.name);
            
            attachmentItem.innerHTML = `
                <div class="attachment-info">
                    <div class="attachment-icon">
                        <i class="${fileIcon}"></i>
                    </div>
                    <div class="attachment-details">
                        <div class="attachment-name">${file.name}</div>
                        <div class="attachment-size">${fileSize} MB</div>
                    </div>
                </div>
                <button type="button" class="remove-attachment" data-filename="${file.name}">
                    <i class="fas fa-times"></i>
                </button>
            `;
            
            attachmentsList.appendChild(attachmentItem);
            
            
            attachmentItem.querySelector('.remove-attachment').addEventListener('click', function() {
                const filename = this.dataset.filename;
                const index = attachments.findIndex(f => f.name === filename);
                
                if (index > -1) {
                    attachments.splice(index, 1);
                }
                
                attachmentItem.remove();
            });
        }

        function getFileIcon(filename) {
            const extension = filename.split('.').pop().toLowerCase();
            
            switch(extension) {
                case 'pdf':
                    return 'fas fa-file-pdf';
                case 'doc':
                case 'docx':
                    return 'fas fa-file-word';
                case 'jpg':
                case 'jpeg':
                case 'png':
                case 'gif':
                    return 'fas fa-file-image';
                case 'zip':
                case 'rar':
                    return 'fas fa-file-archive';
                case 'txt':
                    return 'fas fa-file-alt';
                default:
                    return 'fas fa-file';
            }
        }

        
        document.getElementById('previewBtn').addEventListener('click', function() {
            const previewContent = document.getElementById('previewContent');
            const preview = document.getElementById('emailPreview');
            
            const recipient = document.getElementById('recipient').value;
            const subject = document.getElementById('subject').value || '[No subject]';
            const message = quill.root.innerHTML;
            const priority = document.getElementById('priority').value;
            
            const priorityBadge = {
                normal: '<span style="background: #10b981; color: white; padding: 4px 12px; border-radius: 12px; font-size: 12px;">Normal Priority</span>',
                high: '<span style="background: #f59e0b; color: white; padding: 4px 12px; border-radius: 12px; font-size: 12px;">High Priority</span>',
                urgent: '<span style="background: #ef4444; color: white; padding: 4px 12px; border-radius: 12px; font-size: 12px;">URGENT</span>'
            }[priority];
            
            const attachmentsText = attachments.length > 0 
                ? `<p><strong>Attachments (${attachments.length}):</strong> ${attachments.map(f => f.name).join(', ')}</p>`
                : '<p><em>No attachments</em></p>';
            
            previewContent.innerHTML = `
                <div style="margin-bottom: 20px;">
                    <p><strong>To:</strong> ${recipient}</p>
                    <p><strong>Subject:</strong> ${subject}</p>
                    <p><strong>Priority:</strong> ${priorityBadge}</p>
                </div>
                <hr>
                <div style="margin: 20px 0;">
                    ${message}
                </div>
                <hr>
                <div style="margin-top: 20px;">
                    ${attachmentsText}
                </div>
            `;
            
            preview.style.display = 'block';
            preview.scrollIntoView({ behavior: 'smooth' });
        });

        
        document.getElementById('emailForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const subject = document.getElementById('subject').value;
            const message = quill.getText().trim();
            
            if (!subject) {
                alert('Please enter a subject for your email');
                subjectInput.focus();
                return;
            }
            
            if (message.length < 10) {
                alert('Please provide a detailed message (minimum 10 characters)');
                quill.focus();
                return;
            }
            
            
            document.getElementById('successMessage').style.display = 'block';
            document.getElementById('emailForm').style.display = 'none';
            
            
            document.getElementById('successMessage').scrollIntoView({ behavior: 'smooth' });
            
           
            console.log('Email data:', {
                recipient: document.getElementById('recipient').value,
                subject: subject,
                message: quill.root.innerHTML,
                priority: document.getElementById('priority').value,
                attachments: attachments.map(f => f.name)
            });
        });

       
        subjectInput.dispatchEvent(new Event('input'));
    </script>
    @endsection
</body>
</html>