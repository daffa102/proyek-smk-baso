<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Hadirin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="globals.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        .sidebar-item-active {
            background-color: #3b82f6;
            color: white;
            box-shadow: 0 10px 15px -3px rgba(59, 130, 246, 0.3);
        }
        .glass-sidebar {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-right: 1px solid rgba(226, 232, 240, 0.8);
        }
    </style>
</head>
<body class="bg-slate-50 text-slate-900 font-sans antialiased">

    <div class="flex min-h-screen">

    @include('components.layouts.partials.sidebar')    
     
    <div class="flex-1 lg:ml-72 min-h-screen p-6 md:p-10">
    {{ $slot }}
    </div>

    <script>
        window.addEventListener('swal:success', event => {
            const data = Array.isArray(event.detail) ? event.detail[0] : event.detail;
            Swal.fire({
                title: data.title,
                text: data.text,
                icon: 'success',
                confirmButtonText: 'Oke',
                confirmButtonColor: '#3b82f6',
            });
        });

        window.addEventListener('swal:error', event => {
            const data = Array.isArray(event.detail) ? event.detail[0] : event.detail;
            Swal.fire({
                title: data.title,
                text: data.text,
                icon: 'error',
                confirmButtonText: 'Tutup',
                confirmButtonColor: '#ef4444',
            });
        });

        window.addEventListener('close-modal', event => {
            // This is handled by Alpine.js in my x-modal component,
            // but we ensure Livewire dispatch is correctly received.
        });
    </script>
</body>
</html>