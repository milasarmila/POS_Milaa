@extends('layouts.app')

@section('title', 'Edit User')

@section('content')
@include('layouts.navbar')

<style>
    /* Header Card Banner Pink */
    .header-pink-card {
        background: linear-gradient(135deg, #f8a5c2 0%, #f472b6 100%);
        border-radius: 12px;
        padding: 20px 25px;
        color: white;
        box-shadow: 0 4px 12px rgba(244, 114, 182, 0.2);
    }

    /* Container Form Kustom */
    .form-container-pink {
        background: #ffffff;
        border: 1px solid #fce7f3;
        border-radius: 14px;
        box-shadow: 0 4px 15px rgba(244, 114, 182, 0.08);
    }
</style>

<div class="container py-4">

    {{-- HEADER PAGE KOLOM PINK --}}
    <div class="header-pink-card mb-4">
        <h1 class="h3 mb-1 fw-bold text-white">Edit User</h1>
        <p class="mb-0 text-white-50" style="opacity: 0.9;">Edit data pengguna beserta hak aksesnya ke dalam sistem.</p>
    </div>

    {{-- FLASH ERROR MESSAGE --}}
    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show mb-3" role="alert">
            <strong>Gagal!</strong> {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    {{-- CONTAINER FORM --}}
    <div class="form-container-pink p-4">
        <form action="{{ route('admin.users.store') }}" method="POST">
            
            {{-- INCLUDE FORM PARTIAL USER --}}
            @include('users._form')

        </form>
    </div>

</div>
@endsection