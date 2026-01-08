<?php
// admin/head.php
require_once __DIR__ . '/../backend/init.php';

// Protect Admin Area
if (!Auth::adminCheck() || !Auth::isAdmin()) {
    header('Location: ' . url('admin/login.php'));
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title ?? "Admin Panel - ForestSoul"; ?></title>
    
    <!-- TailWind & Fonts -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;800&family=JetBrains+Mono&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        admin: {
                            bg: '#0a0c10',
                            surface: '#12151c',
                           // primary: '#6366f1', // Indigo for admin
                            primary: '#63f18eff', // Indigo for admin
                            secondary: '#8b5cf6',
                            border: 'rgba(255,255,255,0.08)'
                        }
                    },
                    fontFamily: {
                        sans: ['Outfit', 'sans-serif'],
                        mono: ['JetBrains Mono', 'monospace'],
                    },
                    animation: {
                        'fade-in': 'fadeIn 0.5s ease-out',
                        'slide-up': 'slideUp 0.6s cubic-bezier(0.16, 1, 0.3, 1)',
                        'float': 'float 3s ease-in-out infinite',
                    },
                    keyframes: {
                        fadeIn: { '0%': { opacity: '0' }, '100%': { opacity: '1' } },
                        slideUp: { '0%': { transform: 'translateY(20px)', opacity: '0' }, '100%': { transform: 'translateY(0)', opacity: '1' } },
                        float: { '0%, 100%': { transform: 'translateY(0px)' }, '50%': { transform: 'translateY(-10px)' } }
                    }
                }
            }
        }
        
        const ROUTES = {
            home: '<?php echo url(""); ?>',
            admin: '<?php echo url("admin/"); ?>',
            api: '<?php echo url("backend/api.php"); ?>'
        };

        async function api(action, options = {}) {
            const url = `${ROUTES.api}?action=${action}`;
            const res = await fetch(url, options);
            return await res.json();
        }

        function showToast(msg, type = 'info') {
            const colors = { success: 'bg-green-500', error: 'bg-red-500', info: 'bg-admin-primary' };
            const id = 'toast-' + Date.now();
            const toast = `<div id="${id}" class="fixed bottom-6 right-6 z-[2000] px-6 py-4 rounded-2xl text-white font-bold shadow-2xl ${colors[type]} animate-slide-up">${msg}</div>`;
            $('body').append(toast);
            setTimeout(() => $(`#${id}`).fadeOut(() => $(`#${id}`).remove()), 3000);
        }
    </script>

    <style>
        body { background: #0a0c10; color: #fff; font-family: 'Outfit', sans-serif; }
        .admin-card { background: #12151c; border: 1px solid rgba(255,255,255,0.08); border-radius: 1.5rem; transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1); }
        .admin-card:hover { border-color: rgba(99, 102, 241, 0.3); transform: translateY(-5px); box-shadow: 0 20px 40px rgba(0,0,0,0.4); }
        .input-admin { background: #0a0c10; border: 1px solid rgba(255,255,255,0.08); border-radius: 0.75rem; padding: 0.75rem 1rem; width: 100%; outline: none; transition: border 0.3s; }
        .input-admin:focus { border-color: #6366f1; }
        .btn-admin-primary { background: #6366f1; color: white; padding: 0.75rem 1.5rem; border-radius: 1rem; font-weight: 700; transition: all 0.3s; display: flex; align-items: center; justify-content: center; gap: 0.5rem; }
        .btn-admin-primary:hover { background: #4f46e5; transform: scale(1.02); box-shadow: 0 10px 20px rgba(99, 102, 241, 0.2); }
        
        /* Flex Utilities */
        .center { display: flex; align-items: center; justify-content: center; }
        .row { display: flex; flex-direction: row; }
        .col { display: flex; flex-direction: column; }
        .between { display: flex; align-items: center; justify-content: space-between; }
        .items-center { align-items: center; }
        .gap-1 { gap: 0.25rem; }
        .gap-2 { gap: 0.5rem; }
        .gap-3 { gap: 0.75rem; }
        .gap-4 { gap: 1rem; }
        .gap-6 { gap: 1.5rem; }
        .gap-8 { gap: 2rem; }
    </style>
</head>
<body class="selection:bg-admin-primary selection:text-white">
