<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIAP - Sistem Informasi Aduan Publik</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        :root {
        --white: #f8fafc;
        --cyan-glow: #22d3ee;
        --purple: #6366f1;
        --black: #000000;
        --navy: #1e293b;
        --siap-primary: #1a56db;
        --siap-primary-dark: #1e3a8a;
        --siap-accent: #0ea5e9;
        --siap-success: #059669;
        --siap-light: #f0f4ff;
        }
        *{
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: var(--white);
            color: var(--black);
        }

        .navbar {
            background-color: var(--navy);
            border-bottom: 1px solid #334155;
            box-shadow: 0 4px 20px rgba(34, 211, 238, 0.15);
            width: 100%;
        }

        .navbar-brand {
            display: flex;
            align-items: center;
            font-weight: 700;

        }

        .logo-icon {
            width: 40px;
            height: auto;
            margin-right: 10px;
            filter: drop-shadow(0 0 8px var(--cyan-glow));
        }

        .nav-link, .btn-outline-light {
            color: #cbd5e1 !important;
        }

        .btn-outline-light:hover {
            background-color: rgba(34, 211, 238, 0.1);
            border-color: var(--cyan-glow);
            color: var(--cyan-glow) !important;
        }

        .btn-warning {
            background-color: var(--purple);
            border-color: var(--purple);
            color: white;
        }

        .btn-warning:hover {
            background-color: #a855f7;
            border-color: #a855f7;
        }

        .btn-danger {
            background-color: #ef4444;
        }
        small {
            color: #94a3b8;
        }       
        h1.text-success {
            color: var(--siap-success) !important;
            font-size: 2rem;
            font-weight: 700;
         }
         .text-primary {
            color: var(--siap-primary) !important;
         }
         .text-info {
            color: var(--siap-accent) !important;
         } 
    
    /* Hero */
    #hero {
    background-image: 
        linear-gradient(135deg, 
            rgba(26, 86, 219, 0.88),   /* --siap-primary-dark dengan opacity */
            rgba(30, 41, 123, 0.75),   /* --navy */
            rgba(14, 165, 233, 0.65)), /* --siap-accent */
        url('{{ asset("images/Indonesia-city.jpg") }}');
    
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    
    padding: 5.5rem 1.5rem;           /* sedikit lebih lega */
    min-height: 70vh;                 /* hero lebih tinggi & proporsional */
    border-radius: 1rem;
}


    
    .hero-inner { position: relative; z-index: 1; }
    .badge-trust {
        background: rgba(255,255,255,0.12);
        backdrop-filter: blur(6px);
        border: 1px solid rgba(255,255,255,0.2);
        font-weight: 500;
        font-size: 0.85rem;
    }
    #hero h1 { font-size: 3rem; font-weight: 800; letter-spacing: -0.5px; }
    #hero .lead { font-size: 1.2rem; opacity: 0.9; }
    .btn-hero-primary {
        background: #fff; color: var(--siap-primary-dark); font-weight: 600;
        border: none; padding: 0.7rem 2rem; border-radius: 0.7rem;
        transition: all 0.2s;
    }
     .btn-hero-send {
        background: var(--navy); color:#fff; font-weight: 600;
        border: none; padding: 0.7rem 2rem; border-radius: 0.7rem;
    }
    
    .btn-hero-primary:hover { background: #e0e7ff; color: var(--siap-primary-dark); transform: translateY(-2px); box-shadow: 0 8px 20px rgba(0,0,0,0.15); }
    .btn-hero-outline {
        background: transparent; color: #fff; font-weight: 600;
        border: 2px solid rgba(255,255,255,0.45); padding: 0.7rem 2rem;
        border-radius: 0.7rem; transition: all 0.2s;
    }
    .btn-hero-outline:hover { background: rgba(255,255,255,0.1); color: #fff; border-color: #fff; transform: translateY(-2px); }
    /* Stat Cards */
    .stat-card { border: none; border-radius: 1rem; transition: transform 0.2s, box-shadow 0.2s; }
    .stat-card:hover { transform: translateY(-3px); box-shadow: 0 12px 28px rgba(0,0,0,0.08); }
    .stat-icon {
        width: 52px; height: 52px; border-radius: 0.75rem;
        display: flex; align-items: center; justify-content: center; font-size: 1.4rem;
    }
    .stat-number { font-size: 1.9rem; font-weight: 800; line-height: 1; }
    /* Section Titles */
    .section-title { font-weight: 700; font-size: 1.4rem; color: var(--siap-primary-dark); }
    .section-line { width: 48px; height: 3px; background: var(--siap-primary); border-radius: 2px; }
    /* Steps */
    .step-card { text-align: center; padding: 2rem 1rem; }
    .step-num {
        width: 44px; height: 44px; border-radius: 50%;
        background: var(--siap-light); color: var(--siap-primary);
        font-weight: 800; font-size: 1.15rem;
        display: inline-flex; align-items: center; justify-content: center; margin-bottom: 0.75rem;
    }
    /* Kategori */
    .kat-card { border: 1px solid #e2e8f0; border-radius: 1rem; transition: all 0.2s; }
    .kat-card:hover { border-color: var(--siap-primary); box-shadow: 0 8px 24px rgba(26,86,219,0.1); transform: translateY(-3px); }
    .kat-icon {
        width: 46px; height: 46px; border-radius: 0.7rem;
        background: var(--siap-light); color: var(--siap-primary);
        display: flex; align-items: center; justify-content: center; font-size: 1.2rem;
    }
    /* Trust */
    .trust-banner { background: var(--siap-light); border-radius: 1rem; border: 1px solid #dbeafe; }
    .trust-banner i { font-size: 1.4rem; color: var(--siap-primary); }
    /* CTA */
    .cta-section {
        background: linear-gradient(135deg, var(--siap-primary-dark), var(--navy));
        border-radius: 1rem;
    }
    .cta-section .btn { font-weight: 600; padding: 0.7rem 2.5rem; border-radius: 0.7rem; }


    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">

        <!-- Logo -->
        <a class="navbar-brand fw-bold" href="/">
            <img src="/images/SIAP-DARK.png" alt="SIAP.com" class="logo-icon">
            SIAP<span class="text-cyan" style="color: #22d3ee;">.com</span>
        </a>

        <!-- Hamburger Button (muncul otomatis di HP) -->
        <button class="navbar-toggler" type="button" 
                data-bs-toggle="collapse" 
                data-bs-target="#navbarNav" 
                aria-controls="navbarNav" 
                aria-expanded="false" 
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Menu yang akan collapse di mobile -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <div class="navbar-nav ms-auto d-flex align-items-center gap-2 flex-wrap">
                
                <!-- Menu Publik -->
                <a href="{{ route('pengaduan.create') }}" class="btn btn-outline-light btn-sm">Buat Aduan</a>
                <a href="{{ route('pengaduan.cek.form') }}" class="btn btn-outline-light btn-sm">Cek Status</a>

                @auth
                    <!-- Menu Admin -->
                    <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-light btn-sm">Dashboard</a>
                    <a href="{{ route('admin.pengaduan.index') }}" class="btn btn-outline-light btn-sm">Kelola Aduan</a>
                    
                    <!-- Logout -->
                    <a href="#" onclick="confirmLogout(event)" 
                       class="btn btn-outline-light btn-sm text-danger">
                        <i class="bi bi-box-arrow-right"></i> Logout
                    </a>
                @endauth
            </div>
        </div>
    </div>
</nav>

    <div class="container my-4">
        @yield('content')
    </div>

    <footer class="text-center text-muted py-4">
        <small>© 2026 SIAP.com - Sistem Informasi Aduan Publik</small>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- SweetAlert2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Logout Form (wajib ada) -->
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>

<script>
    function confirmLogout(e) {
        e.preventDefault();

        Swal.fire({
            title: 'Apakah Anda yakin ingin logout?',
            text: "Anda akan keluar dari Dashboard Admin",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: 'var(--navy)',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Logout',
            cancelButtonText: 'Batal',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('logout-form').submit();
            }
        });
    }
</script>
</body>
</html>