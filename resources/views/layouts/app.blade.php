<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        @yield('title', 'Laa Accessories')
    </title>

    @vite([
        'resources/css/app.css',
        'resources/js/app.js'
    ])

    <style>

        /* =====================================================
           GLOBAL
           ===================================================== */

        html,
        body {
            width: 100%;
            min-height: 100%;

            margin: 0;
            padding: 0;
        }

        body {
            background-color: #f8fafc;
        }


        /* =====================================================
           CONTENT HALAMAN
           ===================================================== */

        .laa-page-content {
            width: 100%;

            margin: 0;
            padding: 0;
        }


        /* =====================================================
           ALERT SUCCESS
           ===================================================== */

        .laa-alert-wrapper {
            width: 1250px;
            max-width: calc(100% - 30px);

            margin: 0 auto 20px auto;
            padding: 0;
        }


        /* =====================================================
           BOOTSTRAP CONTAINER TIDAK MEMPENGARUHI NAVBAR
           ===================================================== */

        .laa-page-content > .container,
        .laa-page-content > .container-fluid {
            margin-left: auto;
            margin-right: auto;
        }

    </style>

</head>

<body>

    {{-- =====================================================
         ISI SETIAP HALAMAN
         ===================================================== --}}

    <main class="laa-page-content">

        {{-- PESAN BERHASIL --}}
        @if (session('success'))
            <div class="laa-alert-wrapper">
                <div class="alert alert-success mb-0">
                    {{ session('success') }}
                </div>
            </div>
        @endif


        {{-- CONTENT --}}
        @yield('content')

    </main>

</body>
</html>