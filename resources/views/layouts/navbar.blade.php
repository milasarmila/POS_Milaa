<nav class="laa-navbar">
    <div class="laa-navbar-inner">

        {{-- LOGO --}}
        <a href="{{ route('dashboard') }}" class="laa-logo">
            laa accessories
        </a>

        {{-- MENU --}}
        <div class="laa-menu">

            {{-- DASHBOARD --}}
            <a
                href="{{ route('dashboard') }}"
                class="laa-link {{ Request::is('dashboard') ? 'active' : '' }}"
            >
                Dashboard
            </a>

            {{-- USERS --}}
            @if(
                auth()->check() &&
                auth()->user()->role &&
                strtolower(auth()->user()->role->name) === 'admin'
            )
                <a
                    href="{{ route('admin.users') }}"
                    class="laa-link {{ Request::is('admin/users*') ? 'active' : '' }}"
                >
                    Users
                </a>
            @endif

            {{-- PRODUK --}}
            <a
                href="{{ route('produk.index') }}"
                class="laa-link {{ Request::is('produk*') ? 'active' : '' }}"
            >
                Produk
            </a>

            {{-- JENIS --}}
            <a
                href="{{ route('Jenis.index') }}"
                class="laa-link {{ Request::is('Jenis*') ? 'active' : '' }}"
            >
                Jenis
            </a>

            {{-- PENJUALAN --}}
            <a
                href="{{ route('penjualan.index') }}"
                class="laa-link {{ Request::is('penjualan*') ? 'active' : '' }}"
            >
                Penjualan
            </a>

        </div>

        {{-- LOGOUT --}}
        <form
            action="{{ route('logout') }}"
            method="POST"
            class="laa-logout-form"
        >
            @csrf

            <button
                type="submit"
                class="laa-logout"
            >
                Logout
            </button>
        </form>

    </div>
</nav>


<style>
    /* =========================================================
       NAVBAR UTAMA
       ========================================================= */

    .laa-navbar {
        width: 100% !important;
        height: 62px !important;

        margin: 0 0 25px 0 !important;
        padding: 0 !important;

        background: linear-gradient(
            90deg,
            #f48fb1 0%,
            #f8bbd0 45%,
            #fce4ec 75%,
            #ffffff 100%
        ) !important;

        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.08);

        box-sizing: border-box;
    }


    /* =========================================================
       BAGIAN DALAM NAVBAR
       ========================================================= */

    .laa-navbar-inner {
        width: 1250px !important;
        max-width: calc(100% - 30px) !important;

        height: 62px !important;

        margin: 0 auto !important;
        padding: 0 !important;

        display: flex !important;
        align-items: center !important;

        box-sizing: border-box;
    }


    /* =========================================================
       LOGO
       ========================================================= */

    .laa-logo {
        flex: 0 0 170px !important;

        width: 170px !important;
        min-width: 170px !important;
        max-width: 170px !important;

        height: 40px !important;

        margin: 0 20px 0 0 !important;
        padding: 0 !important;

        display: flex !important;
        align-items: center !important;

        color: #ffffff !important;

        font-size: 21px !important;
        font-weight: 700 !important;

        text-decoration: none !important;
        white-space: nowrap !important;

        box-sizing: border-box;
    }

    .laa-logo:hover {
        color: #ffffff !important;
        text-decoration: none !important;
    }


    /* =========================================================
       MENU
       ========================================================= */

    .laa-menu {
        flex: 0 0 auto !important;

        height: 62px !important;

        display: flex !important;
        align-items: center !important;

        gap: 5px !important;

        margin: 0 !important;
        padding: 0 !important;
    }


    /* =========================================================
       LINK MENU
       ========================================================= */

    .laa-link {
        flex: 0 0 90px !important;

        width: 90px !important;
        min-width: 90px !important;
        max-width: 90px !important;

        height: 40px !important;
        min-height: 40px !important;
        max-height: 40px !important;

        margin: 0 !important;
        padding: 0 !important;

        display: flex !important;
        align-items: center !important;
        justify-content: center !important;

        border-radius: 7px !important;

        color: #ffffff !important;

        font-size: 14px !important;
        font-weight: 500 !important;

        text-decoration: none !important;
        white-space: nowrap !important;

        box-sizing: border-box;
    }


    .laa-link:hover {
        background: rgba(255, 255, 255, 0.25) !important;
        color: #ffffff !important;
    }


    /* =========================================================
       MENU AKTIF
       ========================================================= */

    .laa-link.active {
        background: #ffffff !important;

        color: #ec6f9e !important;

        font-weight: 700 !important;
    }


    /* =========================================================
       LOGOUT
       ========================================================= */

    .laa-logout-form {
        flex: 0 0 100px !important;

        width: 100px !important;
        min-width: 100px !important;
        max-width: 100px !important;

        height: 40px !important;

        margin: 0 0 0 auto !important;
        padding: 0 !important;

        box-sizing: border-box;
    }


    .laa-logout {
        width: 100px !important;
        min-width: 100px !important;
        max-width: 100px !important;

        height: 40px !important;
        min-height: 40px !important;
        max-height: 40px !important;

        margin: 0 !important;
        padding: 0 !important;

        border: none !important;
        border-radius: 7px !important;

        background: #f48fb1 !important;

        color: #ffffff !important;

        font-size: 14px !important;
        font-weight: 600 !important;

        cursor: pointer;

        box-sizing: border-box;
    }


    .laa-logout:hover {
        background: #ec6f9e !important;
        color: #ffffff !important;
    }


    /* =========================================================
       MOBILE
       ========================================================= */

    @media (max-width: 991px) {

        .laa-navbar {
            height: auto !important;
        }

        .laa-navbar-inner {
            width: 100% !important;
            max-width: 100% !important;

            height: auto !important;
            min-height: 62px !important;

            padding: 0 15px !important;

            flex-wrap: wrap !important;
        }

        .laa-logo {
            flex: 0 0 170px !important;
        }

        .laa-menu {
            width: 100% !important;

            height: auto !important;

            padding: 10px 0 !important;

            flex-direction: column !important;
            align-items: stretch !important;

            gap: 5px !important;
        }

        .laa-link {
            width: 100% !important;
            max-width: 100% !important;
        }

        .laa-logout-form {
            margin: 5px 0 10px auto !important;
        }
    }
</style>