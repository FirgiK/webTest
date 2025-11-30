<?php
// 1. TANGKAP DATA DARI HALAMAN SEBELUMNYA (checkout.php)
$productName = $_POST['product_name'] ?? 'Produk';
$productPrice = $_POST['product_price'] ?? 0;
$variant = $_POST['selected_variant'] ?? '-';
$qty = $_POST['quantity'] ?? 1;
$subtotal = intval($_POST['subtotal'] ?? 0);

// Data Alamat (Kita simpan lagi di hidden input nanti)
$fullname = $_POST['fullname'] ?? '';
$address = $_POST['address'] ?? '';
$phone = $_POST['phone'] ?? '';

// Data Ongkir
$shippingCost = intval($_POST['shipping_cost'] ?? 15000);
// 2. HITUNG TOTAL
$total = $subtotal + $shippingCost;
?>

<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Payment - Locatera</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          fontFamily: {
            'sans': ['Cantarell', 'sans-serif'],
            'header': ['Lilita One', 'cursive'],
            'fontLogo': ['Lobster', 'cursive'],
            'roboto': ['Roboto', 'sans-serif'],
            'poppins': ['Poppins', 'sans-serif'],
          },
          colors: {
            // Definisikan warna utama dari design
            'locatera-orange': '#FF9D3D', // Oranye untuk tombol, nav, dll.
            'locatera-gray': '#F3F4F6', // Latar belakang tombol filter
            'locatera-dark': '#202020', // Teks
            'locatera-gray': '#6A6A6A', // Teks sekunder
            'locatera-blue': '#001833', // Teks sekunder
          }
        }
      }
    }
  </script>
  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Cantarell:ital,wght@0,400;0,700;1,400;1,700&family=Lilita+One&family=Lobster&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>

<body class="bg-gray-50 font-poppins min-h-screen flex flex-col items-center py-8 px-4">

  <div class="w-full max-w-md lg:max-w-5xl bg-white lg:rounded-3xl shadow-xl min-h-[80vh] flex flex-col relative overflow-hidden">

    <div class="w-full max-w-md lg:max-w-5xl bg-white lg:rounded-3xl shadow-xl min-h-[80vh] flex flex-col relative overflow-hidden">

      <div class="bg-white pt-6 px-6 lg:px-10">
        <div class="flex items-center justify-between mb-6">
          <a href="javascript:history.back()" class="p-2 -ml-2 hover:bg-gray-100 rounded-full transition"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6 text-locatera-dark">
              <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
            </svg></a>
          <h1 class="text-xl font-bold text-locatera-blue">Checkout</h1>
          <div class="w-10"></div>
        </div>

        <div class="flex items-center justify-center gap-4 mb-8">
          <div class="text-locatera-orange"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
              <path fill-rule="evenodd" d="m11.54 22.351.07.04.028.016a.76.76 0 0 0 .723 0l.028-.015.071-.041a16.975 16.975 0 0 0 1.144-.742 19.58 19.58 0 0 0 2.683-2.282c1.944-1.99 3.963-4.98 3.963-8.827a8.25 8.25 0 0 0-16.5 0c0 3.846 2.02 6.837 3.963 8.827a19.58 19.58 0 0 0 2.682 2.282 16.975 16.975 0 0 0 1.145.742ZM12 13.5a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" clip-rule="evenodd" />
            </svg></div>
          <div class="flex gap-1">
            <div class="w-1 h-1 rounded-full bg-locatera-orange"></div>
            <div class="w-1 h-1 rounded-full bg-locatera-orange"></div>
          </div>

          <div class="bg-orange-100 p-2 rounded-full"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 text-locatera-orange">
              <path d="M4.5 3.75a3 3 0 0 0-3 3v.75h21v-.75a3 3 0 0 0-3-3h-15Z" />
              <path fill-rule="evenodd" d="M22.5 9.75h-21v7.5a3 3 0 0 0 3 3h15a3 3 0 0 0 3-3v-7.5Zm-18 3.75a.75.75 0 0 1 .75-.75h6a.75.75 0 0 1 0 1.5h-6a.75.75 0 0 1-.75-.75Zm.75 2.25a.75.75 0 0 0 0 1.5h3a.75.75 0 0 0 0-1.5h-3Z" clip-rule="evenodd" />
            </svg></div>
          <div class="flex gap-1">
            <div class="w-1 h-1 rounded-full bg-gray-300"></div>
            <div class="w-1 h-1 rounded-full bg-gray-300"></div>
          </div>

          <div class="text-gray-300"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
              <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm13.36-1.814a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z" clip-rule="evenodd" />
            </svg></div>
        </div>
      </div>

      <form action="success.php" method="POST" class="flex-grow flex flex-col px-6 lg:px-10 pb-10">
        <input type="hidden" name="product_name" value="<?php echo $productName; ?>">
        <input type="hidden" name="total_price" value="<?php echo $total; ?>">

        <div class="grid grid-cols-1 lg:grid-cols-12 lg:gap-12 flex-grow">

          <div class="lg:col-span-7 lg:order-1 order-2">
            <h2 class="text-xl font-bold text-locatera-dark mb-6 mt-6 lg:mt-0">Payment methods</h2>

            <label class="relative block mb-4 cursor-pointer group">
              <input type="radio" name="payment_method" value="credit_card" class="peer sr-only" checked>
              <div class="flex items-center justify-between p-4 rounded-2xl border border-transparent bg-locatera-orange text-white shadow-lg peer-checked:scale-[1.02] transition-all">
                <div class="flex items-center gap-4">
                  <div class="bg-white/20 p-1 rounded w-10 h-6 flex items-center justify-center relative overflow-hidden">
                    <div class="w-4 h-4 bg-red-500 rounded-full absolute left-1 opacity-90"></div>
                    <div class="w-4 h-4 bg-yellow-400 rounded-full absolute right-1 opacity-90"></div>
                  </div>
                  <div>
                    <p class="text-xs font-medium opacity-90">Credit card</p>
                    <p class="text-sm font-bold">5105 **** **** 0505</p>
                  </div>
                </div>
                <div class="w-5 h-5 rounded-full border-2 border-white flex items-center justify-center">
                  <div class="w-2.5 h-2.5 bg-white rounded-full"></div>
                </div>
              </div>
            </label>

            <label class="relative block mb-4 cursor-pointer group">
              <input type="radio" name="payment_method" value="debit_card" class="peer sr-only">
              <div class="flex items-center justify-between p-4 rounded-2xl border border-gray-100 bg-gray-50 text-gray-500 hover:bg-gray-100 transition-all peer-checked:bg-locatera-orange peer-checked:text-white">
                <div class="flex items-center gap-4">
                  <div class="w-10 h-6 flex items-center justify-center font-bold italic text-blue-800 text-lg peer-checked:text-white">VISA</div>
                  <div>
                    <p class="text-xs font-medium">Debit card</p>
                    <p class="text-sm font-bold">3566 **** **** 0505</p>
                  </div>
                </div>
                <div class="w-5 h-5 rounded-full border-2 border-gray-300 peer-checked:border-white flex items-center justify-center">
                  <div class="w-2.5 h-2.5 bg-transparent peer-checked:bg-white rounded-full"></div>
                </div>
              </div>
            </label>
          </div>

          <!-- <div class="lg:col-span-5 lg:order-2 order-1">
            <div class="bg-gray-50 lg:bg-white p-4 lg:p-6 rounded-2xl lg:border lg:border-gray-100">
              <h2 class="text-xl font-bold text-locatera-dark mb-4">Order summary</h2>

              <div class="space-y-3 mb-6">
                <div class="flex justify-between text-sm text-gray-500"><span>Produk</span><span class="font-medium text-gray-700"><?php echo $productName; ?> (x<?php echo $qty; ?>)</span></div>
                <div class="flex justify-between text-sm text-gray-500"><span>Harga</span><span class="font-medium text-gray-700"><?php echo number_format($subtotal, 0, ',', '.'); ?></span></div>
                <div class="flex justify-between text-sm text-gray-500"><span>Ongkir</span><span class="font-medium text-gray-700"><?php echo number_format($shippingCost, 0, ',', '.'); ?></span></div>

                <hr class="border-gray-200 my-2">

                <div class="flex justify-between items-center">
                  <span class="font-bold text-locatera-dark">Total:</span>
                  <span class="font-bold text-locatera-dark text-xl"><?php echo number_format($total, 0, ',', '.'); ?></span>
                </div>
              </div>
            </div>
          </div> -->

          <div class="lg:col-span-5 lg:order-2 order-1">
            <div class="bg-gray-50 lg:bg-white p-4 lg:p-6 rounded-2xl lg:border lg:border-gray-100">
              <h2 class="text-xl font-bold text-locatera-dark mb-4">Order summary</h2>

              <div class="space-y-3 mb-6">
                <div class="flex justify-between text-sm text-gray-500"><span>Produk</span><span class="font-medium text-gray-700"><?php echo $productName; ?> (x<?php echo $qty; ?>)</span></div>
                <div class="flex justify-between text-sm text-gray-500"><span>Harga</span><span class="font-medium text-gray-700"><?php echo number_format($subtotal, 0, ',', '.'); ?></span></div>
                <div class="flex justify-between text-sm text-gray-500"><span>Ongkir</span><span class="font-medium text-gray-700"><?php echo number_format($shippingCost, 0, ',', '.'); ?></span></div>

                <div class="space-y-3 mb-6">
                  <div class="flex justify-between text-sm text-gray-500 items-center">
                    <span>Vouchers</span>

                    <button type="button" onclick="openVoucherModal()" id="selectVoucherBtn" class="flex items-center text-locatera-orange font-bold text-sm hover:underline">
                      Pilih
                    </button>

                    <div id="appliedVoucherDisplay" class="hidden flex items-center gap-2">
                      <div id="voucherIcon" class="bg-locatera-orange p-1 rounded text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
                          <path fill-rule="evenodd" d="M12.516 2.173a.75.75 0 0 0-1.032 0 11.209 11.209 0 0 1-7.877 3.322c1.701.442 3.398 1.078 4.962 1.834L7.487 7.72a.75.75 0 0 0 .59.186 7.747 7.747 0 0 1 3.253-.45.75.75 0 0 0 .614-1.22l-1.077-1.18.683-.627 1.08 1.18c.281.309.84.281.84.281a7.485 7.485 0 0 1 3.298.636 11.2 11.2 0 0 1 2.227 1.258.75.75 0 0 0 .762-.128 11.08 11.08 0 0 1-7.85-3.21Z" clip-rule="evenodd" />
                          <path fill-rule="evenodd" d="M3.5 13.5A.5.5 0 0 1 4 13h17a.5.5 0 0 1 .5.5v5.03c0 .193-.083.376-.233.504l-1.464 1.233a3.75 3.75 0 0 1-4.707 0l-1.465-1.233a.75.75 0 0 0-.916 0l-1.464 1.233a3.75 3.75 0 0 1-4.707 0l-1.465-1.233a.75.75 0 0 0-.916 0L3.733 19.034A.75.75 0 0 1 3.5 18.885V13.5Zm3.385.945a.75.75 0 0 0 0 1.5h.008a.75.75 0 0 0 0-1.5h-.008Zm4.23 0a.75.75 0 0 0 0 1.5h.008a.75.75 0 0 0 0-1.5h-.008Zm4.23 0a.75.75 0 0 0 0 1.5h.008a.75.75 0 0 0 0-1.5h-.008Z" clip-rule="evenodd" />
                        </svg>
                      </div>
                      <span id="voucherLabel" class="text-locatera-orange font-medium text-sm"></span>
                      <button type="button" onclick="openVoucherModal()" class="text-gray-400 hover:text-locatera-orange">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4">
                          <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                        </svg>
                      </button>
                    </div>
                  </div>
                  <div class="flex justify-between text-sm text-green-600">
                    <span>Diskon Voucher</span>
                    <span id="discountAmount">- Rp. 0</span>
                  </div>

                </div>

                <hr class="border-gray-200 my-2">

                <div class="flex justify-between items-center">
                  <span class="font-bold text-locatera-dark">Total:</span>
                  <span class="font-bold text-locatera-dark text-xl" id="finalTotalDisplay"><?php echo number_format($total, 0, ',', '.'); ?></span>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="mt-8 pt-6 border-t border-gray-100 lg:border-none flex flex-col lg:flex-row lg:justify-end items-center gap-4">
          <div class="lg:hidden w-full flex justify-between mb-2">
            <p class="text-xs text-gray-400">Total price</p>
            <h3 class="text-2xl font-bold text-locatera-dark"><?php echo number_format($total, 0, ',', '.'); ?></h3>
          </div>
          <button type="submit" class="w-full lg:w-auto bg-locatera-orange text-white font-bold px-12 py-4 rounded-xl shadow-lg hover:bg-orange-600 transition transform active:scale-95 uppercase tracking-wide">
            PESAN SEKARANG
          </button>
        </div>
      </form>
    </div>


    <!-- Modal Payment -->
    <div id="voucherOverlay" onclick="closeVoucherModal()" class="fixed inset-0 bg-black/60 z-40 hidden transition-opacity duration-300 opacity-0"></div>

    <div id="voucherModal" class="fixed bottom-0 left-0 right-0 bg-white z-50 rounded-t-[2rem] transform translate-y-full transition-transform duration-300 ease-out shadow-2xl max-w-md mx-auto">

      <div class="p-6">
        <div class="flex items-center justify-between mb-4">
          <button type="button" onclick="closeVoucherModal()" class="p-1 -ml-2">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-6 h-6 text-gray-700">
              <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
            </svg>
          </button>
          <h3 class="text-lg font-bold text-gray-800">Vouchers</h3>
          <div class="w-6"></div>
        </div>

        <div class="flex gap-2 mb-6">
          <input type="text" placeholder="Masukkan Kode Voucher" class="flex-grow border border-gray-300 p-3 rounded-xl focus:ring-locatera-orange focus:border-locatera-orange" id="voucherCodeInput">
          <button class="bg-locatera-orange text-white font-bold px-4 py-3 rounded-xl shadow hover:bg-orange-600">Pakai</button>
        </div>

        <div class="space-y-3 max-h-72 overflow-y-auto pr-2">

          <label class="flex items-center justify-between bg-orange-50 p-4 rounded-xl cursor-pointer border border-orange-200">
            <div class="flex items-center gap-3">
              <div class="bg-locatera-orange p-2 rounded-lg text-white">
                <!-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                  <path fill-rule="evenodd" d="M12.516 2.173a.75.75 0 0 0-1.032 0 11.209 11.209 0 0 1-7.877 3.322c1.701.442 3.398 1.078 4.962 1.834L7.487 7.72a.75.75 0 0 0 .59.186 7.747 7.747 0 0 1 3.253-.45.75.75 0 0 0 .614-1.22l-1.077-1.18.683-.627 1.08 1.18c.281.309.84.281.84.281a7.485 7.485 0 0 1 3.298.636 11.2 11.2 0 0 1 2.227 1.258.75.75 0 0 0 .762-.128 11.08 11.08 0 0 1-7.85-3.21Z" clip-rule="evenodd" />
                  <path fill-rule="evenodd" d="M3.5 13.5A.5.5 0 0 1 4 13h17a.5.5 0 0 1 .5.5v5.03c0 .193-.083.376-.233.504l-1.464 1.233a3.75 3.75 0 0 1-4.707 0l-1.465-1.233a.75.75 0 0 0-.916 0l-1.464 1.233a3.75 3.75 0 0 1-4.707 0l-1.465-1.233a.75.75 0 0 0-.916 0L3.733 19.034A.75.75 0 0 1 3.5 18.885V13.5Zm3.385.945a.75.75 0 0 0 0 1.5h.008a.75.75 0 0 0 0-1.5h-.008Zm4.23 0a.75.75 0 0 0 0 1.5h.008a.75.75 0 0 0 0-1.5h-.008Zm4.23 0a.75.75 0 0 0 0 1.5h.008a.75.75 0 0 0 0-1.5h-.008Z" clip-rule="evenodd" />
                </svg> -->
                <img src="./src/asset/gratis-ongkir.png" alt="Gratis Ongkir" class="w-6 h-6">
              </div>

              <div>
                <p class="font-bold text-sm text-locatera-dark">Gratis Ongkir</p>
                <p class="text-xs text-gray-500">Min. Blj Rp0</p>
              </div>
            </div>
            <input type="radio" name="voucher" value="ongkir_free_0" data-discount="15000" class="h-5 w-5 text-locatera-orange focus:ring-locatera-orange accent-locatera-orange border-gray-300">
          </label>

          <label class="flex items-center justify-between bg-gray-50 p-4 rounded-xl cursor-pointer border border-gray-200">
            <div class="flex items-center gap-3">
              <div class="bg-locatera-orange p-2 rounded-lg text-white">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                  <path fill-rule="evenodd" d="M12.516 2.173a.75.75 0 0 0-1.032 0 11.209 11.209 0 0 1-7.877 3.322c1.701.442 3.398 1.078 4.962 1.834L7.487 7.72a.75.75 0 0 0 .59.186 7.747 7.747 0 0 1 3.253-.45.75.75 0 0 0 .614-1.22l-1.077-1.18.683-.627 1.08 1.18c.281.309.84.281.84.281a7.485 7.485 0 0 1 3.298.636 11.2 11.2 0 0 1 2.227 1.258.75.75 0 0 0 .762-.128 11.08 11.08 0 0 1-7.85-3.21Z" clip-rule="evenodd" />
                  <path fill-rule="evenodd" d="M3.5 13.5A.5.5 0 0 1 4 13h17a.5.5 0 0 1 .5.5v5.03c0 .193-.083.376-.233.504l-1.464 1.233a3.75 3.75 0 0 1-4.707 0l-1.465-1.233a.75.75 0 0 0-.916 0l-1.464 1.233a3.75 3.75 0 0 1-4.707 0l-1.465-1.233a.75.75 0 0 0-.916 0L3.733 19.034A.75.75 0 0 1 3.5 18.885V13.5Zm3.385.945a.75.75 0 0 0 0 1.5h.008a.75.75 0 0 0 0-1.5h-.008Zm4.23 0a.75.75 0 0 0 0 1.5h.008a.75.75 0 0 0 0-1.5h-.008Zm4.23 0a.75.75 0 0 0 0 1.5h.008a.75.75 0 0 0 0-1.5h-.008Z" clip-rule="evenodd" />
                </svg>
              </div>
              <div>
                <p class="font-bold text-sm text-locatera-dark">Diskon 10%</p>
                <p class="text-xs text-gray-500">Min. Blj Rp50RB</p>
              </div>
            </div>
            <input type="radio" name="voucher" value="discount_10" data-discount="0.10" class="h-5 w-5 text-locatera-orange focus:ring-locatera-orange accent-locatera-orange border-gray-300">
          </label>

        </div>

        <div class="pt-6">
          <button onclick="applyVoucher()" class="w-full bg-locatera-orange text-white font-bold text-lg py-3 rounded-xl shadow-lg hover:bg-orange-600">
            OK
          </button>
        </div>
      </div>
    </div>

    <!-- JS -->
    <script>
      // --- Variabel Baru ---
      const selectVoucherBtn = document.getElementById('selectVoucherBtn');
      const appliedVoucherDisplay = document.getElementById('appliedVoucherDisplay');
      const voucherLabel = document.getElementById('voucherLabel');
      const voucherIcon = document.getElementById('voucherIcon'); // Jika perlu ganti warna ikon
      const voucherModal = document.getElementById('voucherModal');
      const voucherOverlay = document.getElementById('voucherOverlay');
      const finalTotalDisplay = document.getElementById('finalTotalDisplay');
      const discountAmountDisplay = document.getElementById('discountAmount');
      const voucherCodeInput = document.getElementById('voucherCodeInput');

      // Variabel state untuk menyimpan nilai diskon
      let currentDiscountValue = 0; // Diskon saat ini (Rp)
      let initialTotal = <?php echo $total; ?>; // Total sebelum diskon (dari PHP)

      // --- Fungsi Buka/Tutup Modal Voucher ---
      function openVoucherModal() {
        // Cek kembali radio button yang sudah terpilih
        document.querySelectorAll('input[name="voucher"]').forEach(radio => {
          if (radio.dataset.discount === String(currentDiscountValue / initialTotal) || radio.dataset.discount === String(currentDiscountValue)) {
            radio.checked = true; // Ini adalah logika sederhana, perlu disempurnakan
          }
        });

        voucherOverlay.classList.remove('hidden');
        setTimeout(() => {
          voucherOverlay.classList.remove('opacity-0');
          voucherModal.classList.remove('translate-y-full');
        }, 10);
      }

      function closeVoucherModal() {
        voucherModal.classList.add('translate-y-full');
        voucherOverlay.classList.add('opacity-0');
        setTimeout(() => {
          voucherOverlay.classList.add('hidden');
        }, 300);
      }

      // --- Fungsi Perhitungan dan Penerapan Voucher ---
      function updateFinalTotal(discountRp, voucherName = 'Pilih Voucher') { // Tambah parameter voucherName
        currentDiscountValue = discountRp;
        let newTotal = initialTotal - currentDiscountValue;

        // Pastikan total tidak negatif
        if (newTotal < 0) newTotal = 0;

        // Update display total
        finalTotalDisplay.textContent = 'Rp. ' + new Intl.NumberFormat('id-ID').format(newTotal);
        // Update display diskon
        discountAmountDisplay.textContent = '- Rp. ' + new Intl.NumberFormat('id-ID').format(currentDiscountValue);

        // --- LOGIKA VISIBILITY ---
        if (currentDiscountValue > 0) {
          // Jika diskon diterapkan
          selectVoucherBtn.classList.add('hidden');
          appliedVoucherDisplay.classList.remove('hidden');
          voucherLabel.textContent = voucherName; // Set label voucher
        } else {
          // Jika tidak ada diskon
          selectVoucherBtn.classList.remove('hidden');
          appliedVoucherDisplay.classList.add('hidden');
          voucherLabel.textContent = '';
        }
      }


      function applyVoucher() {
        const selectedRadio = document.querySelector('input[name="voucher"]:checked');
        let discountRp = 0;
        let name = 'Pilih Voucher';

        if (selectedRadio) {
          const discountType = selectedRadio.value;
          const rawDiscount = parseFloat(selectedRadio.dataset.discount);
          // Ambil label voucher dari HTML (atau dari data atribut jika Anda ingin lebih detail)
          const voucherDisplayName = selectedRadio.parentNode.querySelector('.font-bold').textContent;

          if (discountType === 'ongkir_free_0') {
            const shipping = <?php echo $shippingCost; ?>;
            discountRp = shipping;
            name = voucherDisplayName;
          } else if (rawDiscount < 1) {
            // Diskon Persentase
            discountRp = Math.round(initialTotal * rawDiscount);
            name = voucherDisplayName;
          }

          // Panggil fungsi update dengan nilai diskon dan nama voucher
          updateFinalTotal(discountRp, name);
        } else {
          // Jika radio button di-uncheck atau tidak ada yang dipilih
          updateFinalTotal(0, 'Pilih Voucher'); // Reset diskon
        }

        closeVoucherModal();
      }

      // Tambahkan listener untuk reset diskon jika tombol "Pakai" ditekan tanpa kode/opsi
      // (Ini hanya opsional untuk melengkapi logika input kode manual)
      document.querySelector('#voucherCodeInput').addEventListener('input', () => {
        // Jika user mengetik kode, kita anggap diskon radio button tidak berlaku
        // Atau bisa juga membuat tombol "Pakai" memiliki logika tersendiri
      });

      // Asumsi: Tombol radio pertama (Gratis Ongkir) sudah terpilih sebagai default di HTML
      // Perbarui total awal saat halaman dimuat (jika ada voucher default)
      document.addEventListener('DOMContentLoaded', () => {
        // Cek apakah ada biaya ongkir untuk diterapkan sebagai diskon default
        // updateFinalTotal(0); // Set total awal tanpa diskon default untuk kejelasan.
      });
    </script>
</body>

</html>