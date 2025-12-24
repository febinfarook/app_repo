<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-blue: #0d6efd;
            --secondary-blue: #1d4ed8;
            --sidebar-bg: #1e293b;
            --sidebar-hover: #334155;
            --sidebar-active: #0d6efd;
            --card-bg: #ffffff;
            --text-primary: #1f2937;
            --text-secondary: #6b7280;
            --border-color: #e5e7eb;
            --success-green: #10b981;
            --warning-orange: #f59e0b;
            --danger-red: #ef4444;
            --shadow-sm: 0 1px 3px rgba(0,0,0,0.12);
            --shadow-md: 0 4px 20px rgba(0,0,0,0.08);
            --shadow-lg: 0 10px 40px rgba(0,0,0,0.1);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            min-height: 100vh;
            color: var(--text-primary);
            overflow-x: hidden;
        }

        
        .navbar-modern {
            background: linear-gradient(135deg, var(--primary-blue), var(--secondary-blue));
            height: 70px;
            padding: 0 25px;
            box-shadow: var(--shadow-md);
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .navbar-brand {
            color: white;
            font-size: 24px;
            font-weight: 700;
            display: flex;
            align-items: center;
            gap: 12px;
            text-decoration: none;
        }

        .navbar-brand i {
            background: rgba(255, 255, 255, 0.2);
            width: 40px;
            height: 40px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
        }

        .navbar-controls {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .user-profile {
            display: flex;
            align-items: center;
            gap: 10px;
            color: white;
            padding: 8px 16px;
            border-radius: 10px;
            background: rgba(255, 255, 255, 0.1);
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .user-profile:hover {
            background: rgba(255, 255, 255, 0.2);
        }

        .user-avatar {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            font-size: 16px;
            color: white;
        }

        .user-info {
            display: flex;
            flex-direction: column;
        }

        .user-name {
            font-weight: 600;
            font-size: 14px;
        }

        .user-role {
            font-size: 12px;
            opacity: 0.8;
        }

        .notification-bell {
            position: relative;
            color: white;
            font-size: 20px;
            padding: 8px;
            cursor: pointer;
            transition: transform 0.3s ease;
        }

        .notification-bell:hover {
            transform: scale(1.1);
        }

        .notification-count {
            position: absolute;
            top: 0;
            right: 0;
            background: var(--danger-red);
            color: white;
            font-size: 11px;
            font-weight: 600;
            width: 18px;
            height: 18px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 2px solid var(--primary-blue);
        }

        /* Sidebar */
        .sidebar-modern {
            width: 280px;
            background: var(--sidebar-bg);
            position: fixed;
            top: 70px;
            left: 0;
            bottom: 0;
            z-index: 999;
            overflow-y: auto;
            transition: transform 0.3s ease;
            box-shadow: 2px 0 20px rgba(0, 0, 0, 0.1);
        }

        .sidebar-header {
            padding: 25px 20px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .sidebar-icon {
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, var(--primary-blue), #4f46e5);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 20px;
        }

        .sidebar-title {
            color: white;
            font-size: 16px;
            font-weight: 600;
        }

        .nav-section {
            padding: 15px 0;
        }

        .nav-section-title {
            color: rgba(255, 255, 255, 0.6);
            font-size: 12px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            padding: 0 20px 10px;
        }

        .nav-link-modern {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 14px 20px;
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            font-weight: 500;
            font-size: 15px;
            transition: all 0.3s ease;
            border-left: 4px solid transparent;
            margin: 2px 0;
        }

        .nav-link-modern:hover {
            background: var(--sidebar-hover);
            color: white;
            border-left-color: var(--primary-blue);
            padding-left: 24px;
        }

        .nav-link-modern.active {
            background: linear-gradient(90deg, rgba(13, 110, 253, 0.2), transparent);
            color: white;
            border-left-color: var(--primary-blue);
            font-weight: 600;
        }

        .nav-link-modern i {
            font-size: 18px;
            width: 24px;
            text-align: center;
            transition: transform 0.3s ease;
        }

        .nav-link-modern:hover i {
            transform: scale(1.1);
        }

        .badge-new {
            background: linear-gradient(135deg, var(--success-green), #34d399);
            color: white;
            font-size: 10px;
            font-weight: 700;
            padding: 2px 8px;
            border-radius: 10px;
            margin-left: auto;
        }

        .logout-section {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            padding: 20px;
            background: rgba(0, 0, 0, 0.2);
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }

        .logout-btn {
            display: flex;
            align-items: center;
            gap: 10px;
            width: 100%;
            padding: 14px;
            background: linear-gradient(135deg, var(--danger-red), #dc2626);
            color: white;
            border: none;
            border-radius: 10px;
            font-weight: 600;
            font-size: 15px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .logout-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(239, 68, 68, 0.3);
        }

        
        .main-content {
            margin-left: 280px;
            margin-top: 70px;
            padding: 30px;
            min-height: calc(100vh - 70px);
            transition: margin-left 0.3s ease;
        }

       
        .welcome-banner {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 16px;
            padding: 30px;
            color: white;
            margin-bottom: 30px;
            position: relative;
            overflow: hidden;
        }

        .welcome-banner::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 200px;
            height: 200px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
        }

        .welcome-banner::after {
            content: '';
            position: absolute;
            bottom: -30%;
            right: 10%;
            width: 150px;
            height: 150px;
            background: rgba(255, 255, 255, 0.05);
            border-radius: 50%;
        }

        .welcome-title {
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 10px;
            position: relative;
            z-index: 1;
        }

        .welcome-text {
            font-size: 16px;
            opacity: 0.9;
            max-width: 600px;
            position: relative;
            z-index: 1;
        }

        
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .stat-card {
            background: white;
            border-radius: 16px;
            padding: 25px;
            box-shadow: var(--shadow-md);
            transition: all 0.3s ease;
            border: 1px solid var(--border-color);
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-lg);
        }

        .stat-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 15px;
        }

        .stat-icon {
            width: 50px;
            height: 50px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            color: white;
        }

        .stat-change {
            font-size: 12px;
            font-weight: 600;
            padding: 4px 10px;
            border-radius: 20px;
            background: rgba(16, 185, 129, 0.1);
            color: var(--success-green);
        }

        .stat-change.negative {
            background: rgba(239, 68, 68, 0.1);
            color: var(--danger-red);
        }

        .stat-number {
            font-size: 32px;
            font-weight: 700;
            color: var(--text-primary);
            line-height: 1;
            margin-bottom: 8px;
        }

        .stat-label {
            color: var(--text-secondary);
            font-size: 14px;
            font-weight: 500;
        }

       
        .activity-card {
            background: white;
            border-radius: 16px;
            padding: 25px;
            box-shadow: var(--shadow-md);
            margin-bottom: 30px;
        }

        .card-title {
            font-size: 18px;
            font-weight: 700;
            margin-bottom: 20px;
            color: var(--text-primary);
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .activity-list {
            list-style: none;
            padding: 0;
        }

        .activity-item {
            display: flex;
            align-items: center;
            gap: 15px;
            padding: 15px 0;
            border-bottom: 1px solid var(--border-color);
        }

        .activity-item:last-child {
            border-bottom: none;
        }

        .activity-icon {
            width: 40px;
            height: 40px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            color: white;
        }

        .activity-content {
            flex: 1;
        }

        .activity-text {
            font-size: 14px;
            color: var(--text-primary);
            margin-bottom: 4px;
        }

        .activity-time {
            font-size: 12px;
            color: var(--text-secondary);
        }

        
        .quick-actions-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 15px;
            margin-bottom: 30px;
        }

        .quick-action-btn {
            background: white;
            border: 2px dashed var(--border-color);
            border-radius: 12px;
            padding: 20px;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s ease;
            color: var(--text-secondary);
            text-decoration: none;
            display: block;
        }

        .quick-action-btn:hover {
            border-color: var(--primary-blue);
            background: #f8fafc;
            color: var(--primary-blue);
            transform: translateY(-2px);
        }

        .quick-action-btn i {
            font-size: 28px;
            margin-bottom: 10px;
            display: block;
        }

        .quick-action-label {
            font-weight: 600;
            font-size: 14px;
        }

        
        .menu-toggle {
            display: none;
            background: rgba(255, 255, 255, 0.2);
            border: none;
            color: white;
            width: 40px;
            height: 40px;
            border-radius: 8px;
            font-size: 20px;
            cursor: pointer;
            align-items: center;
            justify-content: center;
        }

        
        @media (max-width: 992px) {
            .sidebar-modern {
                transform: translateX(-100%);
            }

            .sidebar-modern.active {
                transform: translateX(0);
            }

            .main-content {
                margin-left: 0;
            }

            .menu-toggle {
                display: flex;
            }

            .welcome-title {
                font-size: 24px;
            }

            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 768px) {
            .navbar-modern {
                padding: 0 15px;
            }

            .main-content {
                padding: 20px;
            }

            .stats-grid {
                grid-template-columns: 1fr;
            }

            .welcome-banner {
                padding: 20px;
            }

            .user-info {
                display: none;
            }
        }

        .page-wrapper {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .main-content {
            flex: 1;
        }
       
        .dashboard-footer {
            text-align: center;
            padding: 20px;
            color: var(--text-secondary);
            font-size: 14px;
            border-top: 1px solid var(--border-color);
            margin-top: 160px;
            
        }

        
        @media (prefers-color-scheme: dark) {
            body {
                background: #111827;
                color: #f3f4f6;
            }

            .stat-card,
            .activity-card,
            .quick-action-btn {
                background: #1f2937;
                border-color: #374151;
            }

            .stat-label,
            .activity-text {
                color: #d1d5db;
            }

            .welcome-banner {
                background: linear-gradient(135deg, #4f46e5, #7c3aed);
            }
        }

        
        ::-webkit-scrollbar {
            width: 6px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        ::-webkit-scrollbar-thumb {
            background: var(--primary-blue);
            border-radius: 3px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: var(--secondary-blue);
        }
    </style>
</head>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<body>

    <div class="page-wrapper">

    
    <nav class="navbar-modern">
        <div class="d-flex align-items-center gap-3">
            <button class="menu-toggle" id="menuToggle">
                <i class="fas fa-bars"></i>
            </button>
            <a href="{{ route('dashboard') }}" class="navbar-brand">
                <i class="fas fa-shield-alt"></i>
                <span>CustomerPanel</span>
            </a>
        </div>

        <div class="navbar-controls">
           <div class="nav-profile dropdown">
    <a class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" 
       href="#" id="profileDropdown" data-bs-toggle="dropdown" aria-expanded="false">
        
        <div class="avatar bg-primary text-white rounded-circle d-flex justify-content-center align-items-center"
             style="width:35px; height:35px; font-weight:bold;">
            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
        </div>

        <span class="ms-2">{{ Auth::user()->name }}</span>
    </a>

    <ul class="dropdown-menu dropdown-menu-end">
        <li>
            <a class="dropdown-item" href="{{ route('dashboard.viewprofile', Auth::user()->id) }}">
                <i class="fas fa-user"></i> Profile
            </a>
        </li>

        <li><hr class="dropdown-divider"></li>

        <li>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button class="dropdown-item text-danger">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </button>
            </form>
        </li>
    </ul>
    </div>
    </nav>

    
    <aside class="sidebar-modern" id="sidebar">
        <div class="sidebar-header">
            <div class="sidebar-icon">
                <i class="fas fa-cog"></i>
            </div>
            <div class="sidebar-title">Customer Menu</div>
        </div>

        <div class="nav-section">
            <div class="nav-section-title">Management</div>
            <a href="{{ route('dashboard.customerdetails') }}" class="nav-link-modern {{ request()->routeIs('dashboard.create') ? 'active' : '' }}">
                <i class="fas fa-user-plus"></i>
                <span>Customer Details</span>
            </a>
    </aside>

    
    <main class="main-content" id="mainContent">
       @if(
    !Request::is('dashboard/customerdetails*') &&
    !Request::is('dashboard/editdetails*') &&
    !Request::is('dashboard/viewprofile*')
)
        
        <div class="welcome-banner">
            <h1 class="welcome-title">Welcome back, customer!</h1>
            <p class="welcome-text">Here's what's happening with your system today</p>
        </div>

        
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-header">
                    <div class="stat-icon" style="background: linear-gradient(135deg, #3b82f6, #1d4ed8);">
                        <i class="fas fa-users"></i>
                    </div>
                    <span class="stat-change">+8%</span>
                </div>
                <div class="stat-number">8</div>
                <div class="stat-label">Total Customers</div>
            </div>

            <div class="stat-card">
                <div class="stat-header">
                    <div class="stat-icon" style="background: linear-gradient(135deg, #10b981, #059669);">
                        <i class="fas fa-file-alt"></i>
                    </div>
                    <span class="stat-change">+7%</span>
                </div>
                <div class="stat-number">7</div>
                <div class="stat-label">Total Documents</div>
            </div>

            <div class="stat-card">
                <div class="stat-header">
                    <div class="stat-icon" style="background: linear-gradient(135deg, #f59e0b, #d97706);">
                        <i class="fas fa-chart-line"></i>
                    </div>
                    <span class="stat-change negative">-3%</span>
                </div>
                <div class="stat-number">89%</div>
                <div class="stat-label">System Uptime</div>
            </div>

            <div class="stat-card">
                <div class="stat-header">
                    <div class="stat-icon" style="background: linear-gradient(135deg, #8b5cf6, #7c3aed);">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <span class="stat-change">100%</span>
                </div>
                <div class="stat-number">Secure</div>
                <div class="stat-label">System Status</div>
            </div>
        </div>

       
              @if(isset($activities))
                @foreach($activities as $activity)
           <div class="activity-item mb-3">
               <p>{{ $activity->message }}</p>
            <small>{{ $activity->created_at->diffForHumans() }}</small>
           </div>
           @endforeach
        @endif
        
       
        @endif

        
        @yield('content')

        
        <footer class="dashboard-footer">
            <p>© 2025 Customer Dashboard v2.0 | Last login: Today, 09:42 AM</p>
        </footer>
    </main>
    </div>
    <script>
        
        const menuToggle = document.getElementById('menuToggle');
        const sidebar = document.getElementById('sidebar');
        const mainContent = document.getElementById('mainContent');

        menuToggle.addEventListener('click', () => {
            sidebar.classList.toggle('active');
        });

        
        document.addEventListener('click', (event) => {
            if (window.innerWidth <= 992) {
                if (!sidebar.contains(event.target) && !menuToggle.contains(event.target)) {
                    sidebar.classList.remove('active');
                }
            }
        });

        
        const currentPath = window.location.pathname;
        const navLinks = document.querySelectorAll('.nav-link-modern');
        
        navLinks.forEach(link => {
            if (link.getAttribute('href') === currentPath) {
                link.classList.add('active');
            }
        });

        
        const userProfile = document.getElementById('userProfile');
        userProfile.addEventListener('click', () => {
            
            window.location.href = "{{ route('login') }}";
        });

        
       

        
        setTimeout(() => {
            const welcomeBanner = document.querySelector('.welcome-banner');
            if (welcomeBanner) {
                welcomeBanner.style.opacity = '1';
                welcomeBanner.style.transition = 'opacity 1s ease';
                
                setTimeout(() => {
                    welcomeBanner.style.opacity = '0';
                    setTimeout(() => {
                        if (welcomeBanner.parentNode) {
                            welcomeBanner.style.display = 'none';
                        }
                    }, 1000);
                }, 5000);
            }
        }, 1000);

       
        function updateTime() {
            const now = new Date();
            const timeString = now.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });
            const dateString = now.toLocaleDateString([], { 
                weekday: 'long', 
                year: 'numeric', 
                month: 'long', 
                day: 'numeric' 
            });
            
            
            console.log(`Current time: ${timeString} | ${dateString}`);
        }

        
        updateTime();
        setInterval(updateTime, 60000);
    </script>
</body>
</html>