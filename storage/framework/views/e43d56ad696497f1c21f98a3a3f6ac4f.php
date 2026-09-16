<?php $__env->startSection('title', 'POS'); ?>

<?php $__env->startSection('content'); ?>

<style>
    :root {
        --pink: #f5b6cf;
        --pink-light: #fff5f9;
        --pink-soft: #fde8f0;
        --pink-border: #f2d3df;
        --pink-dark: #df8faf;
    }

    body {
        background: #fff;
    }

    .pos-container {
        max-width: 1200px;
        margin: 30px auto;
        padding: 0 20px;
    }

    .pos-header {
        margin-bottom: 25px;
    }

    .pos-header h2 {
        font-weight: 700;
        color: #222;
        margin-bottom: 5px;
    }

    .pos-header p {
        color: #888;
        margin: 0;
        font-size: 14px;
    }

    .pos-card {
        background: #fff;
        border: 1px solid var(--pink-border);
        border-radius: 16px;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
        overflow: hidden;
    }

    .pos-card-header {
        padding: 18px 20px;
        background: var(--pink-light);
        border-bottom: 1px solid var(--pink-border);
    }

    .pos-card-header h5 {
        margin: 0;
        font-weight: 700;
        color: #333;
    }

    .pos-card-header p {
        margin: 4px 0 0;
        color: #888;
        font-size: 13px;
    }

    .product-list {
        max-height: 600px;
        overflow-y: auto;
        padding: 18px;
    }

    .product-item {
        display: flex;
        gap: 10px;
        margin-bottom: 10px;
    }

    .product-info {
        flex: 1;
    }

    .product-button {
        width: 100%;
        background: #fff;
        border: 1px solid var(--pink-border);
        border-radius: 10px;
        padding: 12px;
        text-align: left;
        color: #333;
        transition: 0.2s;
    }

    .product-button:hover {
        background: var(--pink-light);
        border-color: var(--pink);
    }

    .product-name {
        font-weight: 600;
        margin-bottom: 4px;
    }

    .product-price {
        color: var(--pink-dark);
        font-size: 13px;
        font-weight: 600;
    }

    .quantity-input {
        width: 75px;
        border-radius: 9px;
    }

    .quantity-input:focus {
        border-color: var(--pink);
        box-shadow: 0 0 0 0.15rem rgba(245, 182, 207, 0.2);
    }

    .btn-add {
        width: 48px;
        background: var(--pink);
        border: 1px solid var(--pink);
        color: #fff;
        border-radius: 9px;
        font-size: 20px;
        font-weight: 600;
    }

    .btn-add:hover {
        background: var(--pink-dark);
        border-color: var(--pink-dark);
        color: #fff;
    }

    .search-box {
        padding: 18px 18px 0;
    }

    .search-box input {
        border-radius: 10px;
        padding: 11px 14px;
        border: 1px solid #ddd;
    }

    .search-box input:focus {
        border-color: var(--pink);
        box-shadow: 0 0 0 0.15rem rgba(245, 182, 207, 0.2);
    }

    .cart-body {
        padding: 0;
    }

    .cart-table {
        margin-bottom: 0;
    }

    .cart-table thead {
        background: var(--pink-light);
    }

    .cart-table th {
        font-size: 12px;
        text-transform: uppercase;
        color: #555;
        padding: 13px 10px;
        border-bottom: 1px solid var(--pink-border);
        white-space: nowrap;
    }

    .cart-table td {
        padding: 12px 10px;
        vertical-align: middle;
        font-size: 13px;
    }

    .cart-product {
        font-weight: 600;
        color: #333;
    }

    .cart-price {
        color: #777;
        white-space: nowrap;
    }

    .cart-subtotal {
        font-weight: 700;
        color: #333;
        white-space: nowrap;
    }

    .btn-delete {
        background: #fff0f0;
        color: #d9534f;
        border: 1px solid #f0c5c5;
        border-radius: 7px;
        font-size: 12px;
    }

    .btn-delete:hover {
        background: #f8d7da;
        color: #b52b27;
    }

    .empty-cart {
        text-align: center;
        padding: 45px 20px;
        color: #999;
    }

    .empty-cart-icon {
        width: 60px;
        height: 60px;
        border-radius: 50%;
        background: var(--pink-soft);
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 12px;
        font-size: 26px;
    }

    .empty-cart h6 {
        font-weight: 700;
        color: #555;
        margin-bottom: 5px;
    }

    .empty-cart p {
        margin: 0;
        font-size: 13px;
    }

    .checkout-area {
        padding: 20px;
        border-top: 1px solid var(--pink-border);
        background: #fff;
    }

    .total-label {
        color: #777;
        font-size: 13px;
        margin-bottom: 2px;
    }

    .total-price {
        color: var(--pink-dark);
        font-size: 27px;
        font-weight: 700;
        margin-bottom: 18px;
    }

    .payment-label {
        font-weight: 600;
        color: #333;
        margin-bottom: 7px;
        font-size: 14px;
    }

    .payment-select {
        border-radius: 9px;
        padding: 10px 12px;
        margin-bottom: 12px;
    }

    .payment-select:focus {
        border-color: var(--pink);
        box-shadow: 0 0 0 0.15rem rgba(245, 182, 207, 0.2);
    }

    .cash-payment-area {
        display: none;
        margin-top: 5px;
    }

    .cash-payment-area.show {
        display: block;
    }

    .cash-input {
        border-radius: 9px;
        padding: 10px 12px;
        font-size: 15px;
        margin-bottom: 12px;
    }

    .cash-input:focus {
        border-color: var(--pink);
        box-shadow: 0 0 0 0.15rem rgba(245, 182, 207, 0.2);
    }

    .change-box {
        display: none;
        padding: 12px 14px;
        margin-bottom: 12px;
        border-radius: 9px;
        background: var(--pink-light);
        border: 1px solid var(--pink-border);
    }

    .change-box.show {
        display: block;
    }

    .change-label {
        color: #777;
        font-size: 13px;
        margin-bottom: 2px;
    }

    .change-amount {
        color: var(--pink-dark);
        font-size: 22px;
        font-weight: 700;
    }

    .payment-warning {
        display: none;
        padding: 10px 12px;
        margin-bottom: 12px;
        border-radius: 9px;
        background: #fff0f0;
        border: 1px solid #f0c5c5;
        color: #d9534f;
        font-size: 13px;
    }

    .payment-warning.show {
        display: block;
    }

    .btn-checkout {
        width: 100%;
        background: var(--pink);
        border: 1px solid var(--pink);
        color: white;
        border-radius: 9px;
        padding: 11px;
        font-weight: 600;
        margin-bottom: 8px;
    }

    .btn-checkout:hover {
        background: var(--pink-dark);
        border-color: var(--pink-dark);
        color: white;
    }

    .btn-checkout:disabled {
        background: #ddd;
        border-color: #ddd;
        color: #888;
        cursor: not-allowed;
    }

    .btn-cancel {
        width: 100%;
        background: white;
        border: 1px solid #e3a5a5;
        color: #d9534f;
        border-radius: 9px;
        padding: 10px;
        font-weight: 600;
    }

    .btn-cancel:hover {
        background: #fff0f0;
        color: #c9302c;
    }

    .alert-danger {
        border-radius: 10px;
    }

    /* =========================
       QRIS POPUP
    ========================= */

    .qris-modal {
        display: none;
        position: fixed;
        z-index: 9999;
        inset: 0;
        background: rgba(0, 0, 0, 0.55);
        align-items: center;
        justify-content: center;
        padding: 20px;
    }

    .qris-modal.show {
        display: flex;
    }

    .qris-box {
        background: white;
        width: 100%;
        max-width: 400px;
        border-radius: 15px;
        padding: 25px;
        text-align: center;
        position: relative;
    }

    .qris-box h4 {
        margin-bottom: 20px;
        font-weight: 700;
        color: #333;
    }

    .qris-image {
        width: 300px;
        max-width: 100%;
        height: auto;
        display: block;
        margin: 0 auto 15px;
    }

    .qris-name {
        font-weight: 700;
        color: #333;
        margin-bottom: 18px;
    }

    .qris-close {
        width: 100%;
        border: none;
        background: var(--pink);
        color: white;
        border-radius: 9px;
        padding: 10px;
        font-weight: 600;
    }

    .qris-close:hover {
        background: var(--pink-dark);
    }

    @media (max-width: 768px) {
        .pos-container {
            margin-top: 20px;
        }

        .product-list {
            max-height: 450px;
        }

        .quantity-input {
            width: 65px;
        }

        .cart-table {
            min-width: 650px;
        }
    }
</style>


<div class="pos-container">

    
    <?php if(session('errors')): ?>
        <div class="alert alert-danger alert-dismissible fade show mb-4">
            <strong>Gagal!</strong>
            <?php echo e(session('errors')); ?>


            <button
                type="button"
                class="btn-close"
                data-bs-dismiss="alert">
            </button>
        </div>
    <?php endif; ?>


    
    <div class="pos-header">

        <h2>
            Buat Transaksi Penjualan
        </h2>

        <p>
            Pilih produk, masukkan jumlah, lalu lakukan pembayaran.
        </p>

    </div>


    <div class="row g-4">

        
        <div class="col-lg-6">

            <div class="pos-card">

                <div class="pos-card-header">

                    <h5>
                        🛍️ Daftar Produk
                    </h5>

                    <p>
                        Pilih produk yang ingin dimasukkan ke keranjang.
                    </p>

                </div>


                
                <div class="search-box">

                    <form
                        method="GET"
                        action="<?php echo e(route('penjualan.create')); ?>">

                        <input
                            type="text"
                            name="search"
                            value="<?php echo e(request('search')); ?>"
                            class="form-control"
                            placeholder="🔎 Cari produk..."
                            autocomplete="off"
                        >

                    </form>

                </div>


                
                <div class="product-list">

                    <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                        <form
                            method="POST"
                            action="<?php echo e(route('itempenjualan.store')); ?>"
                            class="product-item">

                            <?php echo csrf_field(); ?>

                            <input
                                type="hidden"
                                name="product_id"
                                value="<?php echo e($product->id); ?>"
                            >

                            <div class="product-info">

                                <button
                                    type="submit"
                                    class="product-button"
                                    <?php echo e($sale->status === 'COMPLETED' ? 'disabled' : ''); ?>>

                                    <div class="product-name">
                                        <?php echo e($product->nama); ?>

                                    </div>

                                    <div class="product-price">
                                        Rp <?php echo e(number_format($product->harga_jual, 0, ',', '.')); ?>

                                    </div>

                                </button>

                            </div>


                            <div>

                                <input
                                    type="number"
                                    name="quantity"
                                    value="1"
                                    min="1"
                                    class="form-control quantity-input"
                                    <?php echo e($sale->status === 'COMPLETED' ? 'disabled' : ''); ?>

                                >

                            </div>


                            <div>

                                <button
                                    type="submit"
                                    class="btn btn-add"
                                    <?php echo e($sale->status === 'COMPLETED' ? 'disabled' : ''); ?>>

                                    +

                                </button>

                            </div>

                        </form>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                        <div class="empty-cart">

                            <div class="empty-cart-icon">
                                🔎
                            </div>

                            <h6>
                                Produk Tidak Ditemukan
                            </h6>

                            <p>
                                Coba gunakan kata pencarian yang berbeda.
                            </p>

                        </div>

                    <?php endif; ?>

                </div>

            </div>

        </div>


        
        <div class="col-lg-6">

            <div class="pos-card">

                <div class="pos-card-header">

                    <h5>
                        🛒 Keranjang Belanja
                    </h5>

                    <p>
                        Produk yang akan diproses dalam transaksi.
                    </p>

                </div>


                
                <div class="cart-body">

                    <div class="table-responsive">

                        <table class="table cart-table">

                            <thead>

                                <tr>

                                    <th>Produk</th>
                                    <th>Harga</th>
                                    <th>Jumlah</th>
                                    <th>Subtotal</th>
                                    <th>Aksi</th>

                                </tr>

                            </thead>


                            <tbody>

                                <?php $__empty_1 = true; $__currentLoopData = $sale->itemPenjualan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                                    <tr>

                                        <td>

                                            <div class="cart-product">
                                                <?php echo e($item->produk->nama); ?>

                                            </div>

                                        </td>


                                        <td>

                                            <span class="cart-price">
                                                Rp <?php echo e(number_format($item->produk->harga_jual, 0, ',', '.')); ?>

                                            </span>

                                        </td>


                                        <td>

                                            <form
                                                method="POST"
                                                action="<?php echo e(route('itempenjualan.update', $item->id)); ?>">

                                                <?php echo csrf_field(); ?>

                                                <?php echo method_field('PUT'); ?>

                                                <input
                                                    type="number"
                                                    name="quantity"
                                                    value="<?php echo e($item->kuantitas); ?>"
                                                    min="1"
                                                    class="form-control form-control-sm"
                                                    onchange="this.form.submit()"
                                                >

                                            </form>

                                        </td>


                                        <td>

                                            <span class="cart-subtotal">
                                                Rp <?php echo e(number_format($item->subtotal, 0, ',', '.')); ?>

                                            </span>

                                        </td>


                                        <td>

                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete', $item)): ?>

                                                <form
                                                    method="POST"
                                                    action="<?php echo e(route('itempenjualan.destroy', $item->id)); ?>">

                                                    <?php echo csrf_field(); ?>

                                                    <?php echo method_field('DELETE'); ?>

                                                    <button
                                                        type="submit"
                                                        class="btn btn-delete btn-sm"
                                                        onclick="return confirm('Hapus produk ini dari keranjang?')">

                                                        Hapus

                                                    </button>

                                                </form>

                                            <?php endif; ?>

                                        </td>

                                    </tr>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                                    <tr>

                                        <td colspan="5">

                                            <div class="empty-cart">

                                                <div class="empty-cart-icon">
                                                    🛒
                                                </div>

                                                <h6>
                                                    Keranjang Masih Kosong
                                                </h6>

                                                <p>
                                                    Pilih produk di sebelah kiri untuk memulai transaksi.
                                                </p>

                                            </div>

                                        </td>

                                    </tr>

                                <?php endif; ?>

                            </tbody>

                        </table>

                    </div>

                </div>


                
                <div class="checkout-area">

                    <div class="total-label">
                        Total Pembayaran
                    </div>

                    <div class="total-price">
                        Rp <?php echo e(number_format($sale->total_pembayaran, 0, ',', '.')); ?>

                    </div>


                    
                    <form
                        method="POST"
                        action="<?php echo e(route('penjualan.update', $sale->id)); ?>"
                        onsubmit="return validatePayment()">

                        <?php echo csrf_field(); ?>

                        <?php echo method_field('PUT'); ?>


                        
                        <div class="payment-label">
                            Metode Pembayaran
                        </div>

                        <select
                            name="payment_method"
                            id="payment_method"
                            class="form-select payment-select"
                            required
                            <?php echo e($sale->status === 'COMPLETED' ? 'disabled' : ''); ?>>

                            <option value="">
                                Pilih Pembayaran
                            </option>

                            <option value="CASH">
                                💵 Cash
                            </option>

                            <option value="QRIS">
                                📱 QRIS
                            </option>

                        </select>


                        
                        <div
                            id="cashPaymentArea"
                            class="cash-payment-area">

                            <div class="payment-label">
                                Uang Pembayaran
                            </div>

                            <input
                                type="number"
                                name="payment_amount"
                                id="payment_amount"
                                class="form-control cash-input"
                                min="<?php echo e($sale->total_pembayaran); ?>"
                                step="1000"
                                placeholder="Masukkan uang pembayaran"
                                <?php echo e($sale->status === 'COMPLETED' ? 'disabled' : ''); ?>

                            >


                            <div
                                id="paymentWarning"
                                class="payment-warning">

                                Uang pembayaran masih kurang.

                            </div>


                            <div
                                id="changeBox"
                                class="change-box">

                                <div class="change-label">
                                    Kembalian
                                </div>

                                <div
                                    id="changeAmount"
                                    class="change-amount">

                                    Rp 0

                                </div>

                            </div>

                        </div>


                        
                        <button
                            type="submit"
                            id="checkoutButton"
                            class="btn btn-checkout"
                            <?php echo e($sale->status === 'COMPLETED' ? 'disabled' : ''); ?>>

                            ✓ Checkout

                        </button>

                    </form>


                    
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete', $sale)): ?>

                        <form
                            method="POST"
                            action="<?php echo e(route('penjualan.destroy', $sale->id)); ?>"
                            onsubmit="return confirm('Yakin ingin membatalkan transaksi?')">

                            <?php echo csrf_field(); ?>

                            <?php echo method_field('DELETE'); ?>

                            <button
                                type="submit"
                                class="btn btn-cancel">

                                ✕ Batalkan Transaksi

                            </button>

                        </form>

                    <?php endif; ?>

                </div>

            </div>

        </div>

    </div>

</div>




<div
    id="qrisModal"
    class="qris-modal">

    <div class="qris-box">

        <h4>
            Pembayaran QRIS
        </h4>

        <img
            src="<?php echo e(asset('images/qris.png')); ?>"
            alt="QRIS laa accessories"
            class="qris-image">

        <div class="qris-name">
            laa accessories
        </div>

        <button
            type="button"
            id="closeQris"
            class="qris-close">

            Tutup

        </button>

    </div>

</div>


<script>
    document.addEventListener('DOMContentLoaded', function () {

        const paymentMethod =
            document.getElementById('payment_method');

        const paymentAmount =
            document.getElementById('payment_amount');

        const cashPaymentArea =
            document.getElementById('cashPaymentArea');

        const changeBox =
            document.getElementById('changeBox');

        const changeAmount =
            document.getElementById('changeAmount');

        const paymentWarning =
            document.getElementById('paymentWarning');

        const checkoutButton =
            document.getElementById('checkoutButton');

        const qrisModal =
            document.getElementById('qrisModal');

        const closeQris =
            document.getElementById('closeQris');

        const total =
            <?php echo e((int) $sale->total_pembayaran); ?>;


        /* FORMAT RUPIAH */

        function formatRupiah(number) {

            return 'Rp ' + new Intl.NumberFormat('id-ID').format(number);

        }


        /* TAMPILKAN CASH / QRIS */

        function updatePaymentMethod() {

            const method = paymentMethod.value;


            if (method === 'CASH') {

                cashPaymentArea.classList.add('show');

                paymentAmount.required = true;

                calculateChange();

                qrisModal.classList.remove('show');

            } else if (method === 'QRIS') {

                cashPaymentArea.classList.remove('show');

                paymentAmount.required = false;

                paymentAmount.value = '';

                changeBox.classList.remove('show');

                paymentWarning.classList.remove('show');

                checkoutButton.disabled = false;

                // TAMPILKAN QRIS
                qrisModal.classList.add('show');

            } else {

                cashPaymentArea.classList.remove('show');

                paymentAmount.required = false;

                paymentAmount.value = '';

                changeBox.classList.remove('show');

                paymentWarning.classList.remove('show');

                checkoutButton.disabled = false;

                qrisModal.classList.remove('show');
            }
        }


        /* HITUNG KEMBALIAN */

        function calculateChange() {

            const payment =
                parseInt(paymentAmount.value) || 0;


            if (payment <= 0) {

                changeBox.classList.remove('show');

                paymentWarning.classList.remove('show');

                checkoutButton.disabled = true;

                return;
            }


            if (payment < total) {

                paymentWarning.classList.add('show');

                changeBox.classList.remove('show');

                checkoutButton.disabled = true;

                return;
            }


            const change =
                payment - total;


            paymentWarning.classList.remove('show');

            changeBox.classList.add('show');

            changeAmount.textContent =
                formatRupiah(change);

            checkoutButton.disabled = false;
        }


        /* EVENT METODE PEMBAYARAN */

        paymentMethod.addEventListener(
            'change',
            updatePaymentMethod
        );


        /* EVENT INPUT UANG */

        paymentAmount.addEventListener(
            'input',
            calculateChange
        );


        /* TUTUP POPUP QRIS */

        closeQris.addEventListener(
            'click',
            function () {

                qrisModal.classList.remove('show');

            }
        );


        /* KLIK DI LUAR POPUP */

        qrisModal.addEventListener(
            'click',
            function (event) {

                if (event.target === qrisModal) {

                    qrisModal.classList.remove('show');

                }

            }
        );


        /* VALIDASI CHECKOUT */

        window.validatePayment = function () {

            const method =
                paymentMethod.value;


            if (!method) {

                alert('Silakan pilih metode pembayaran.');

                return false;
            }


            if (method === 'CASH') {

                const payment =
                    parseInt(paymentAmount.value) || 0;


                if (payment < total) {

                    alert(
                        'Uang pembayaran masih kurang.'
                    );

                    return false;
                }
            }


            return confirm(
                'Yakin ingin checkout?'
            );
        };


        /* KONDISI AWAL */

        updatePaymentMethod();

    });
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\POS_Milaa-main\resources\views/penjualan/pos.blade.php ENDPATH**/ ?>