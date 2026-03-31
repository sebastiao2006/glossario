<!-- Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Bootstrap Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<style>
    :root {
        --admin-primary: #0049bf;
        --admin-dark: #0f172a;
        --admin-sidebar: #111827;
        --admin-light: #f8fafc;
        --admin-border: #e5e7eb;
        --admin-text: #1f2937;
        --admin-muted: #6b7280;
    }

    body {
        background-color: #f5f7fb;
        font-family: 'Segoe UI', sans-serif;
        color: var(--admin-text);
    }

    .admin-wrapper {
        display: flex;
        min-height: 100vh;
    }

    .admin-sidebar {
        width: 260px;
        background: var(--admin-sidebar);
        color: white;
        min-height: 100vh;
        position: fixed;
        left: 0;
        top: 0;
        padding: 20px 15px;
        z-index: 1000;
    }

    .admin-sidebar .brand {
        font-size: 24px;
        font-weight: 700;
        margin-bottom: 30px;
        color: white;
        text-decoration: none;
        display: block;
    }

    .admin-sidebar .nav-link {
        color: #cbd5e1;
        border-radius: 12px;
        padding: 12px 15px;
        margin-bottom: 8px;
        display: flex;
        align-items: center;
        gap: 10px;
        transition: 0.3s;
    }

    .admin-sidebar .nav-link:hover,
    .admin-sidebar .nav-link.active {
        background: var(--admin-primary);
        color: white;
    }

    .admin-main {
        margin-left: 260px;
        width: calc(100% - 260px);
        display: flex;
        flex-direction: column;
        min-height: 100vh;
    }

    .admin-navbar {
        background: white;
        border-bottom: 1px solid var(--admin-border);
        padding: 18px 25px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .admin-content {
        padding: 30px;
        flex: 1;
    }

    .admin-card {
        background: white;
        border-radius: 20px;
        padding: 25px;
        box-shadow: 0 8px 25px rgba(0,0,0,0.04);
        border: 1px solid #eef2f7;
    }

    .stat-card {
        border-radius: 20px;
        padding: 25px;
        background: white;
        box-shadow: 0 8px 25px rgba(0,0,0,0.04);
        border: 1px solid #eef2f7;
        transition: 0.3s;
    }

    .stat-card:hover {
        transform: translateY(-4px);
    }

    .stat-icon {
        width: 55px;
        height: 55px;
        border-radius: 16px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;
        background: rgba(0, 73, 191, 0.1);
        color: var(--admin-primary);
        margin-bottom: 15px;
    }

    .table thead th {
        background: #f8fafc;
        border-bottom: 1px solid #e5e7eb;
        color: #374151;
        font-weight: 600;
    }

    .btn-primary {
        background: var(--admin-primary);
        border-color: var(--admin-primary);
        border-radius: 12px;
        padding: 10px 18px;
    }

    .btn-outline-primary {
        border-radius: 12px;
    }

    .form-control,
    .form-select {
        border-radius: 12px;
        padding: 12px 14px;
    }

    .page-title {
        font-size: 28px;
        font-weight: 700;
        margin-bottom: 8px;
    }

    .page-subtitle {
        color: var(--admin-muted);
        margin-bottom: 25px;
    }

    .admin-footer {
        background: white;
        border-top: 1px solid var(--admin-border);
        padding: 15px 25px;
        text-align: center;
        color: var(--admin-muted);
        font-size: 14px;
    }

    @media (max-width: 991px) {
        .admin-sidebar {
            width: 100%;
            height: auto;
            position: relative;
            min-height: auto;
        }

        .admin-main {
            margin-left: 0;
            width: 100%;
        }

        .admin-wrapper {
            flex-direction: column;
        }
    }
</style>