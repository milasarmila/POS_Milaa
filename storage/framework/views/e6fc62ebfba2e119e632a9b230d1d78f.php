<?php $__env->startSection('title', 'Dashboard'); ?>

<?php $__env->startSection('content'); ?>

<?php echo $__env->make('layouts.navbar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

<style>
    body {
        background: #fff9fb !important;
    }

    .dashboard-container {
        max-width: 1250px;
        margin: auto;
        padding: 25px 20px;
    }

    /* HEADER */
    .dashboard-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding-bottom: 15px;
        margin-bottom: 25px;
        border-bottom: 1px solid #eadfe4;
    }

    .dashboard-header h1 {
        margin: 0;
        font-size: 30px;
        font-weight: 700;
        color: #222;
    }

    .tanggal {
        margin-top: 5px;
        color: #777;
        font-size: 14px;
    }

    .live {
        background: #f28bb0;
        color: white;
        padding: 7px 14px;
        border-radius: 6px;
        font-size: 12px;
        font-weight: 600;
    }


    /* JUDUL SECTION */
    .section-title {
        font-size: 18px;
        font-weight: 600;
        color: #555;
        margin: 0 0 12px;
    }


    /* KOTAK RINGKASAN */
    .summary-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 15px;
        margin-bottom: 30px;
    }

    .summary-card {
        background: white;
        border: 1px solid #f0dce4;
        border-radius: 8px;
        padding: 17px 20px;
        min-height: 100px;
    }

    .summary-label {
        font-size: 12px;
        color: #777;
        text-transform: uppercase;
        margin-bottom: 7px;
        font-weight: 600;
    }

    .summary-value {
        font-size: 23px;
        font-weight: 700;
        color: #222;
    }

    .summary-card.sales .summary-value {
        color: #198754;
    }

    .summary-card.count .summary-value {
        color: #f28bb0;
    }

    .summary-card.cash {
        border-top: 3px solid #20a978;
    }

    .summary-card.non-cash {
        border-top: 3px solid #f28bb0;
    }


    /* INVENTORY */
    .inventory-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 15px;
    }

    .inventory-card {
        background: white;
        border: 1px solid #f0dce4;
        border-radius: 8px;
        overflow: hidden;
    }

    .inventory-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 14px 16px;
        border-bottom: 1px solid #f0e5e9;
    }

    .inventory-header h3 {
        margin: 0;
        font-size: 15px;
        font-weight: 600;
        color: #333;
    }

    .badge-low {
        background: #fff3cd;
        color: #856404;
        border: 1px solid #ffe69c;
        padding: 4px 8px;
        border-radius: 5px;
        font-size: 11px;
    }

    .badge-empty {
        background: #fde8eb;
        color: #dc3545;
        border: 1px solid #f5c2c7;
        padding: 4px 8px;
        border-radius: 5px;
        font-size: 11px;
    }


    /* TABLE INVENTORY */
    .inventory-table {
        width: 100%;
        border-collapse: collapse;
    }

    .inventory-table th {
        background: #fff7f9;
        color: #777;
        font-size: 11px;
        font-weight: 600;
        text-align: left;
        padding: 9px 12px;
    }

    .inventory-table td {
        padding: 9px 12px;
        border-top: 1px solid #f3e8ec;
        font-size: 13px;
        color: #555;
    }

    .inventory-table th:last-child,
    .inventory-table td:last-child {
        text-align: right;
    }

    .stock-low {
        color: #d99a00;
        font-weight: 600;
    }

    .stock-empty {
        color: #dc3545;
        font-weight: 600;
    }

    .safe-message {
        padding: 20px;
        text-align: center;
        color: #198754;
        font-size: 13px;
    }


    /* RESPONSIVE */
    @media (max-width: 768px) {

        .dashboard-header {
            align-items: flex-start;
            flex-direction: column;
            gap: 10px;
        }

        .summary-grid,
        .inventory-grid {
            grid-template-columns: 1fr;
        }

        .dashboard-header h1 {
            font-size: 25px;
        }

    }
</style>


<div class="dashboard-container">

    
    <div class="dashboard-header">

        <div>
            <h1>Ringkasan Hari Ini</h1>

            <div class="tanggal">
                📅 <?php echo e($tanggalHariIni->translatedFormat('l, d F Y')); ?>

            </div>
        </div>

        <span class="live">
            Live Monitoring
        </span>

    </div>


    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('viewAny', App\Models\User::class)): ?>

        
        <h2 class="section-title">
            📊 Today's Sales
        </h2>

        <div class="summary-grid">

            
            <div class="summary-card sales">

                <div class="summary-label">
                    Total Penjualan Hari Ini
                </div>

                <div class="summary-value">
                    Rp <?php echo e(number_format($ringkasan['total_penjualan'], 0, ',', '.')); ?>

                </div>

            </div>


            
            <div class="summary-card count">

                <div class="summary-label">
                    Jumlah Transaksi Hari Ini
                </div>

                <div class="summary-value">
                    <?php echo e(number_format($ringkasan['total_transaksi'])); ?>


                    <small style="font-size:13px;color:#888;font-weight:400;">
                        Struk
                    </small>
                </div>

            </div>

        </div>


        
        <h2 class="section-title">
            💳 Cash & Payment Status
        </h2>

        <div class="summary-grid">

            
            <div class="summary-card cash">

                <div class="summary-label">
                    Total Pembayaran Tunai
                </div>

                <div class="summary-value">
                    Rp <?php echo e(number_format($ringkasan['total_cash'], 0, ',', '.')); ?>

                </div>

            </div>


            
            <div class="summary-card non-cash">

                <div class="summary-label">
                    Total Pembayaran Non-Tunai
                </div>

                <div class="summary-value">
                    Rp <?php echo e(number_format($ringkasan['total_non_tunai'], 0, ',', '.')); ?>

                </div>

            </div>

        </div>

    <?php endif; ?>


    
    <h2 class="section-title">
        ⚠️ Inventory
    </h2>

    <div class="inventory-grid">

        
        <div class="inventory-card">

            <div class="inventory-header">

                <h3>
                    Produk Stok Rendah
                </h3>

                <span class="badge-low">
                    Perlu Restock
                </span>

            </div>


            <table class="inventory-table">

                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama Produk</th>
                        <th>Stok</th>
                    </tr>
                </thead>

                <tbody>

                    <?php $__empty_1 = true; $__currentLoopData = $produkStokRendah; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $produk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                        <tr>

                            <td>
                                <?php echo e($produkStokRendah->firstItem() + $index); ?>

                            </td>

                            <td>
                                <?php echo e($produk->nama); ?>

                            </td>

                            <td class="stock-low">
                                <?php echo e($produk->stok); ?>

                            </td>

                        </tr>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                        <tr>
                            <td colspan="3" class="safe-message">
                                ✓ Semua stok aman
                            </td>
                        </tr>

                    <?php endif; ?>

                </tbody>

            </table>


            <?php if($produkStokRendah->hasPages()): ?>

                <div style="padding:10px;text-align:center;">
                    <?php echo e($produkStokRendah->links()); ?>

                </div>

            <?php endif; ?>

        </div>


        
        <div class="inventory-card">

            <div class="inventory-header">

                <h3>
                    Produk Habis Stok
                </h3>

                <span class="badge-empty">
                    Kritis
                </span>

            </div>


            <table class="inventory-table">

                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama Produk</th>
                        <th>Stok</th>
                    </tr>
                </thead>

                <tbody>

                    <?php $__empty_1 = true; $__currentLoopData = $produkStokHabis; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $produk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                        <tr>

                            <td>
                                <?php echo e($produkStokHabis->firstItem() + $index); ?>

                            </td>

                            <td>
                                <?php echo e($produk->nama); ?>

                            </td>

                            <td class="stock-empty">
                                <?php echo e($produk->stok); ?>

                            </td>

                        </tr>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                        <tr>
                            <td colspan="3" class="safe-message">
                                ✓ Tidak ada produk habis stok
                            </td>
                        </tr>

                    <?php endif; ?>

                </tbody>

            </table>


            <?php if($produkStokHabis->hasPages()): ?>

                <div style="padding:10px;text-align:center;">
                    <?php echo e($produkStokHabis->links()); ?>

                </div>

            <?php endif; ?>

        </div>

    </div>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\POS_Milaa-main\resources\views/dashboard.blade.php ENDPATH**/ ?>