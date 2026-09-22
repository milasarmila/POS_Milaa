@csrf

<style>
    .form-title {
        color: #5c3d49;
        font-weight: 700;
    }

    .form-label-custom {
        color: #684854;
        font-weight: 600;
        margin-bottom: 7px;
    }

    .form-control, .form-select {
        border-color: #eadde3;
        border-radius: 9px;
    }

    .form-control:focus, .form-select:focus {
        border-color: #f1a5c2;
        box-shadow: 0 0 0 0.2rem rgba(241, 165, 194, 0.15);
    }

    .btn-pink {
        background: #f28fb5;
        border-color: #f28fb5;
        color: white;
        border-radius: 9px;
        padding: 9px 20px;
        font-weight: 600;
    }

    .btn-pink:hover {
        background: #e97da6;
        border-color: #e97da6;
        color: white;
    }

    .btn-back {
        border-radius: 9px;
        padding: 9px 20px;
        font-weight: 600;
    }
</style>

<div class="row g-3">
    {{-- NAMA USER --}}
    <div class="col-12">
        <label class="form-label-custom">Nama Lengkap</label>
        <input 
            type="text" 
            name="name"
            class="form-control @error('name') is-invalid @enderror"
            value="{{ old('name', $user->name ?? '') }}"
            placeholder="Masukkan nama lengkap user..."
            required
        >
        @error('name')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    {{-- EMAIL --}}
    <div class="col-12 col-md-6">
        <label class="form-label-custom">Email</label>
        <input 
            type="email" 
            name="email"
            class="form-control @error('email') is-invalid @enderror"
            value="{{ old('email', $user->email ?? '') }}"
            placeholder="nama@email.com"
            required
        >
        @error('email')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    {{-- PASSWORD --}}
    <div class="col-12 col-md-6">
        <label class="form-label-custom">
            Password 
            @if(isset($user))
                <small class="text-muted font-weight-normal">(Kosongkan jika tidak ingin mengubah)</small>
            @endif
        </label>
        <input 
            type="password" 
            name="password"
            class="form-control @error('password') is-invalid @enderror"
            placeholder="Masukkan password..."
            {{ isset($user) ? '' : 'required' }}
        >
        @error('password')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    {{-- ROLE --}}
    <div class="col-12">
        <label class="form-label-custom">Role / Hak Akses</label>
        <select 
            name="role_id"
            class="form-select @error('role_id') is-invalid @enderror"
            required
        >
            <option value="">-- Pilih Role --</option>
            @foreach ($roles as $role)
                <option value="{{ $role->id }}" @selected(old('role_id', $user->role_id ?? '') == $role->id)>
                    {{ ucfirst($role->name) }}
                </option>
            @endforeach
        </select>
        @error('role_id')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    {{-- TOMBOL AKSI --}}
    <div class="col-12 mt-4 d-flex align-items-center gap-2">
        <button type="submit" class="btn btn-pink">
            💾 Simpan
        </button>
        <a href="{{ route('admin.users') }}" class="btn btn-secondary btn-back">
            ← Kembali
        </a>
    </div>
</div>