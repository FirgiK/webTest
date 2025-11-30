<?php
session_start();
include 'data.php';
// Asumsi $orderHistory kini tersedia dari data.php
?>

<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pesanan Saya - Locatera</title>

  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          fontFamily: {
            'sans': ['Poppins', 'sans-serif']
          },
          colors: {
            'locatera-orange': '#F9A826',
            'locatera-dark': '#374151'
          }
        }
      }
    }
  </script>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700;800&display=swap" rel="stylesheet">
</head>

<body class="bg-gray-50 font-sans text-gray-800">

  <?php include 'navbar.php'; ?>

  <main class="w-full max-w-7xl mx-auto px-4 pb-24 sm:px-6 lg:px-8 lg:pb-10 lg:pt-28 pt-4">

    <header class="flex justify-between items-center mb-4 lg:hidden">
      <a href="index.php" class="p-2 -ml-2 hover:bg-gray-100 rounded-full transition">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-6 h-6 text-locatera-dark">
          <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
        </svg>
      </a>
      <h1 class="text-xl font-bold text-locatera-dark flex-grow ml-4">Pesanan Saya</h1>
      <div class="w-6 h-6"></div>
    </header>

    <h1 class="hidden lg:block text-3xl font-bold text-locatera-dark mb-8 mt-4">Daftar Pesanan</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

      <?php if (!empty($orderHistory)): ?>
        <?php foreach ($orderHistory as $order): ?>

          <div class="bg-white p-5 rounded-2xl shadow-md border-t-4 
                    <?php
                    if ($order['status'] == 'Dikirim') echo 'border-blue-500';
                    elseif ($order['status'] == 'Selesai') echo 'border-green-500';
                    else echo 'border-yellow-500'; // Default
                    ?>
                ">
            <div class="flex justify-between items-center border-b pb-3 mb-3 border-gray-100">
              <span class="text-sm font-semibold text-locatera-dark"><?php echo $order['id']; ?></span>
              <span class="text-xs font-medium 
                            <?php
                            if ($order['status'] == 'Dikirim') echo 'text-blue-500 bg-blue-50 px-2 py-1 rounded-full';
                            elseif ($order['status'] == 'Selesai') echo 'text-green-500 bg-green-50 px-2 py-1 rounded-full';
                            ?>
                        ">
                <?php echo $order['status']; ?>
              </span>
            </div>

            <div class="space-y-2">
              <?php foreach (array_slice($order['items'], 0, 2) as $item): // Tampilkan maks 2 item 
              ?>
                <p class="text-sm text-gray-700">
                  <?php echo $item['name']; ?> (<?php echo $item['variant']; ?>) <span class="font-bold">x<?php echo $item['qty']; ?></span>
                </p>
              <?php endforeach; ?>

              <?php if (count($order['items']) > 2): ?>
                <p class="text-xs text-gray-500 italic">+ <?php echo count($order['items']) - 2; ?> produk lainnya</p>
              <?php endif; ?>
            </div>

            <hr class="my-3 border-gray-100">

            <div class="flex justify-between text-xs">
              <div class="text-gray-500">
                Total Bayar: <br>
                <span class="font-bold text-base text-locatera-dark">
                  Rp <?php echo number_format($order['total'], 0, ',', '.'); ?>
                </span>
              </div>
              <div class="text-right text-gray-500">
                Estimasi Tiba: <br>
                <span class="font-semibold text-sm text-blue-600">
                  <?php echo $order['delivery_date']; ?>
                </span>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      <?php else: ?>
        <p class="text-gray-500 lg:col-span-3 text-center py-10">Anda belum memiliki riwayat pesanan.</p>
      <?php endif; ?>
    </div>

  </main>
</body>

</html>