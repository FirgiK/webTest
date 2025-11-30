<?php
include 'data.php';

// Mendefinisikan base path untuk XAMPP
$projectBasePath = '/locatera/';

// ==========================================================
// 1. INISIALISASI VARIABEL GLOBAL (FIX WARNINGS)
// ==========================================================

// Variabel Checkout/Summary (Digunakan di input hidden)
$productName = '';
$productPrice = 0;
$variant = '';
$qty = 0;
$subtotal = 0;
$cartItems = [];

// ==========================================================
// 2. LOGIKA PENANGKAPAN DATA DARI POST (ORDER NOW)
// ==========================================================

if ($_SERVER["REQUEST_METHOD"] === "POST") {

  $productId = $_POST['product_id'] ?? null;
  $variant = $_POST['selected_variant'] ?? 'Default'; // Menggunakan selected_variant dari modal
  $qty = $_POST['quantity'] ?? 1;
  $productPrice = intval($_POST['product_price'] ?? 0);

  // Pastikan data valid sebelum diproses
  if ($productId) {
    $subtotal = $productPrice * $qty; // Hitung subtotal untuk 1 item

    // Mendapatkan nama produk untuk ringkasan
    foreach ($products as $p) {
      if ($p['id'] == $productId) {
        $productName = $p['name']; // FIX: Sekarang $productName sudah terdefinisi di luar loop
        break;
      }
    }

    $cartItems[] = [
      'product_id' => intval($productId),
      'variant' => $variant,
      'qty' => intval($qty)
    ];
  }
}

// ==========================================================
// 3. HITUNG TOTAL AKHIR DARI CART ITEMS (Jika ada logika keranjang penuh)
// Karena saat ini hanya mendukung 1 item dari Order Now, grandTotal = subtotal.
// ==========================================================

$grandTotal = $subtotal; // Asumsi hanya memproses satu item dari Order Now
$displayItems = [];

// NOTE: Jika Anda menggunakan Session/Keranjang Penuh, logika ini harus diubah.
// Tapi karena Anda mengirim POST dari detail produk, kita asumsikan 1 item.
if (!empty($cartItems)) {
  $grandTotal = $subtotal;
  // Tambahkan item ke displayItems agar ada data untuk divalidasi (jika diperlukan)
  $displayItems = $cartItems;
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Checkout - Locatera</title>

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

  <div class="w-full max-w-md lg:max-w-3xl bg-white lg:rounded-3xl shadow-xl min-h-[80vh] flex flex-col relative overflow-hidden">

    <div class="bg-white pt-6 pb-2 px-6 lg:px-10">
      <div class="flex items-center justify-between mb-6">
        <a href="javascript:history.back()" class="p-2 -ml-2 hover:bg-gray-100 rounded-full transition">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6 text-locatera-dark">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
          </svg>
        </a>
        <h1 class="text-xl font-bold text-locatera-blue">Checkout</h1>
        <div class="w-10"></div>
      </div>

      <div class="flex items-center justify-center gap-4 mb-4">
        <div class="flex flex-col items-center">
          <div class="bg-orange-100 p-2 rounded-full mb-1"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 text-locatera-orange">
              <path fill-rule="evenodd" d="m11.54 22.351.07.04.028.016a.76.76 0 0 0 .723 0l.028-.015.071-.041a16.975 16.975 0 0 0 1.144-.742 19.58 19.58 0 0 0 2.683-2.282c1.944-1.99 3.963-4.98 3.963-8.827a8.25 8.25 0 0 0-16.5 0c0 3.846 2.02 6.837 3.963 8.827a19.58 19.58 0 0 0 2.682 2.282 16.975 16.975 0 0 0 1.145.742ZM12 13.5a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" clip-rule="evenodd" />
            </svg></div>
        </div>
        <div class="flex gap-1">
          <div class="w-1 h-1 rounded-full bg-gray-300"></div>
          <div class="w-1 h-1 rounded-full bg-gray-300"></div>
          <div class="w-1 h-1 rounded-full bg-gray-300"></div>
        </div>
        <div class="text-gray-300"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-8 h-8">
            <path d="M4.5 3.75a3 3 0 0 0-3 3v.75h21v-.75a3 3 0 0 0-3-3h-15Z" />
            <path fill-rule="evenodd" d="M22.5 9.75h-21v7.5a3 3 0 0 0 3 3h15a3 3 0 0 0 3-3v-7.5Zm-18 3.75a.75.75 0 0 1 .75-.75h6a.75.75 0 0 1 0 1.5h-6a.75.75 0 0 1-.75-.75Zm.75 2.25a.75.75 0 0 0 0 1.5h3a.75.75 0 0 0 0-1.5h-3Z" clip-rule="evenodd" />
          </svg></div>
        <div class="flex gap-1">
          <div class="w-1 h-1 rounded-full bg-gray-300"></div>
          <div class="w-1 h-1 rounded-full bg-gray-300"></div>
          <div class="w-1 h-1 rounded-full bg-gray-300"></div>
        </div>
        <div class="text-gray-300"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-8 h-8">
            <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm13.36-1.814a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z" clip-rule="evenodd" />
          </svg></div>
      </div>
    </div>

    <form action="payment.php" method="POST" class="px-6 lg:px-10 pb-10 flex-grow flex flex-col">

      <input type="hidden" name="product_name" value="<?php echo $productName; ?>">
      <input type="hidden" name="product_price" value="<?php echo $productPrice; ?>">
      <input type="hidden" name="selected_variant" value="<?php echo $variant; ?>">
      <input type="hidden" name="quantity" value="<?php echo $qty; ?>">
      <input type="hidden" name="subtotal" value="<?php echo $subtotal; ?>">

      <h2 class="text-xl font-bold text-locatera-dark mb-6">Billing address</h2>

      <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 lg:gap-x-8">

        <div class="group lg:col-span-2">
          <label class="block text-xs text-gray-400 mb-1">Nama Lengkap</label>
          <input type="text" name="fullname" value="" class="w-full border-b border-gray-200 py-2 text-locatera-dark font-medium focus:outline-none focus:border-locatera-orange transition-colors" required>
        </div>

        <div class="lg:col-span-2">
          <label class="block text-xs text-gray-400 mb-1">Alamat</label>
          <input type="text" name="address" value="" class="w-full border-b border-gray-200 py-2 text-locatera-dark font-medium text-sm truncate focus:outline-none focus:border-locatera-orange transition-colors" required>
        </div>

        <div class="relative">
          <label class="block text-xs text-gray-400 mb-1">Provinsi</label>

          <input type="text" id="provinceDisplay" value=""
            class="w-full border-b border-gray-200 py-2 text-locatera-dark font-medium text-sm focus:outline-none focus:border-locatera-orange transition-colors cursor-pointer"
            onclick="openProvinceModal()" required>

          <input type="hidden" name="province" id="provinceInput" value="">

          <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center pt-4 text-gray-400">
            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
            </svg>
          </div>
        </div>

        <div>
          <label class="block text-xs text-gray-400 mb-1">Pos Kode</label>
          <input type="text" name="zipcode" value="" class="w-full border-b border-gray-200 py-2 text-locatera-dark font-medium focus:outline-none focus:border-locatera-orange transition-colors">
        </div>

        <div>
          <label class="block text-xs text-gray-400 mb-1">Nomor Telepon</label>
          <input type="tel" name="phone" value="" class="w-full border-b border-gray-200 py-2 text-locatera-dark font-medium focus:outline-none focus:border-locatera-orange transition-colors" required>
        </div>

        <div class="relative mb-6"> <label class="block text-xs text-gray-400 mb-1">Opsi Pengiriman</label>

          <input type="text" id="shippingDisplay" value=""
            class="w-full border-b border-gray-200 py-2 text-locatera-dark font-medium text-sm focus:outline-none focus:border-locatera-orange transition-colors cursor-pointer"
            onclick="openShippingModal()" required>

          <input type="hidden" name="shipping_option" id="shippingInput" value="">
          <input type="hidden" name="shipping_cost" id="shippingCostInput" value="">

          <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center pt-4 text-gray-400">
            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
            </svg>
          </div>
        </div>
      </div>

      <div class="flex items-start mt-8 mb-8">
        <div class="flex items-center h-5">
          <input id="save_address" type="checkbox" class="w-5 h-5 text-locatera-orange rounded focus:ring-locatera-orange accent-locatera-orange" checked>
        </div>
        <div class="ml-3 text-xs lg:text-sm">
          <label for="save_address" class="font-medium text-gray-400">Simpan detail alamat ini</label>
        </div>
      </div>

      <button type="submit" class="mt-auto lg:mt-8 w-full bg-locatera-orange text-white font-bold text-lg py-4 rounded-full shadow-lg hover:bg-orange-600 transition transform active:scale-95">
        Lanjut ke Pembayaran
      </button>

    </form>
  </div>

  <!-- tambahan modal -->
  <div id="provinceOverlay" onclick="closeProvinceModal()" class="fixed inset-0 bg-black/60 z-40 hidden transition-opacity duration-300 opacity-0"></div>

  <div id="provinceModal" class="fixed bottom-0 left-0 right-0 bg-white z-50 rounded-t-3xl transform translate-y-full transition-transform duration-300 ease-out shadow-2xl max-w-md mx-auto">

    <div class="p-6">
      <div class="flex items-center mb-6">
        <button type="button" onclick="closeProvinceModal()" class="p-1 -ml-2">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-6 h-6 text-gray-700">
            <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
          </svg>
        </button>
        <h3 class="text-lg font-bold text-gray-800 ml-4">Pilih Provinsi</h3>
      </div>

      <div class="max-h-80 overflow-y-auto mb-6 space-y-2">

        <?php
        // Daftar Provinsi statis (atau ambil dari data.php jika ada)
        $provinces = ['BALI', 'BANGKA BELITUNG', 'BANTEN', 'BENGKULU', 'DI YOGYAKARTA', 'DKI JAKARTA', 'GORONTALO', 'JAWA BARAT', 'JAWA TENGAH', 'JAWA TIMUR', 'LAMPUNG', 'RIAU', 'SUMATERA UTARA', 'SULAWESI SELATAN', 'NTB'];

        foreach ($provinces as $province):
        ?>
          <label class="flex justify-between items-center bg-gray-50 p-4 rounded-xl cursor-pointer hover:bg-gray-100 transition">
            <span class="font-medium text-locatera-dark text-sm"><?php echo htmlspecialchars($province); ?></span>
            <input type="radio"
              name="selected_province"
              value="<?php echo htmlspecialchars($province); ?>"
              class="province-option h-5 w-5 text-locatera-orange border-gray-300 focus:ring-locatera-orange accent-locatera-orange"
              onchange="selectProvince(this.value)">
          </label>
        <?php endforeach; ?>

      </div>

      <button onclick="confirmProvinceSelection()" class="w-full bg-locatera-orange text-white font-bold text-lg py-3 rounded-xl shadow-lg hover:bg-orange-600 transition">
        Konfirmasi
      </button>
    </div>
  </div>

  <div id="shippingOverlay" onclick="closeShippingModal()" class="fixed inset-0 bg-black/60 z-40 hidden transition-opacity duration-300 opacity-0"></div>

  <div id="shippingModal" class="fixed bottom-0 left-0 right-0 bg-white z-50 rounded-t-3xl transform translate-y-full transition-transform duration-300 ease-out shadow-2xl max-w-md mx-auto">

    <div class="p-6">
      <div class="flex items-center mb-6">
        <button type="button" onclick="closeShippingModal()" class="p-1 -ml-2">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-6 h-6 text-gray-700">
            <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
          </svg>
        </button>
        <h3 class="text-lg font-bold text-gray-800 ml-4">Pilih Opsi Pengiriman</h3>
      </div>

      <div id="shippingWarning" class="hidden bg-red-100 border border-red-400 text-red-700 px-4 py-2 rounded relative text-sm mb-4 transition duration-300">
        Pilih salah satu opsi pengiriman terlebih dahulu.
      </div>

      <div class="max-h-80 overflow-y-auto mb-6 space-y-2">

        <?php
        // Daftar Opsi Pengiriman
        $shippingOptions = [
          ['name' => 'Reguler', 'cost' => 15000, 'display' => 'Reguler (+ Rp. 15.000)'],
          ['name' => 'Hemat', 'cost' => 13000, 'display' => 'Hemat (+ Rp. 13.000)'],
          ['name' => 'Kargo', 'cost' => 22500, 'display' => 'Kargo (+ Rp. 22.500)'],
          ['name' => 'Kilat', 'cost' => 25000, 'display' => 'Kilat (+ Rp. 25.000)'],
        ];

        foreach ($shippingOptions as $option):
        ?>
          <label class="flex justify-between items-center bg-gray-50 p-4 rounded-xl cursor-pointer hover:bg-gray-100 transition">
            <span class="font-medium text-locatera-dark text-sm"><?php echo htmlspecialchars($option['display']); ?></span>
            <input type="radio"
              name="selected_shipping"
              value="<?php echo htmlspecialchars($option['name']); ?>"
              data-cost="<?php echo htmlspecialchars($option['cost']); ?>"
              data-display="<?php echo htmlspecialchars($option['display']); ?>"
              class="shipping-option h-5 w-5 text-locatera-orange border-gray-300 focus:ring-locatera-orange accent-locatera-orange"
              onchange="selectShipping(this.value, this.dataset.cost, this.dataset.display)">
          </label>
        <?php endforeach; ?>

      </div>

      <button onclick="confirmShippingSelection()" class="w-full bg-locatera-orange text-white font-bold text-lg py-3 rounded-xl shadow-lg hover:bg-orange-600 transition">
        Konfirmasi
      </button>
    </div>
  </div>

  <!-- <script>
    // --- Variabel Modal ---
    const provinceModal = document.getElementById('provinceModal');
    const provinceOverlay = document.getElementById('provinceOverlay');
    const provinceDisplay = document.getElementById('provinceDisplay');
    const provinceInput = document.getElementById('provinceInput');
    let selectedProvinceValue = provinceInput.value; // Nilai awal


    // --- Fungsi Buka Modal ---
    function openProvinceModal() {
      // Tampilkan overlay dan modal
      provinceOverlay.classList.remove('hidden');
      setTimeout(() => {
        provinceOverlay.classList.remove('opacity-0');
        provinceModal.classList.remove('translate-y-full');
      }, 10);
    }

    // --- Fungsi Tutup Modal ---
    function closeProvinceModal() {
      provinceModal.classList.add('translate-y-full');
      provinceOverlay.classList.add('opacity-0');
      setTimeout(() => {
        provinceOverlay.classList.add('hidden');
      }, 300);
    }

    // --- Fungsi Menyimpan Pilihan Sementara ---
    function selectProvince(value) {
      selectedProvinceValue = value;
    }

    // --- Fungsi Konfirmasi dan Update Input Utama ---
    function confirmProvinceSelection() {
      // Update input display di halaman utama
      provinceDisplay.value = selectedProvinceValue;
      // Update input hidden yang akan disubmit
      provinceInput.value = selectedProvinceValue;

      closeProvinceModal();
    }

    const shippingModal = document.getElementById('shippingModal');
    const shippingOverlay = document.getElementById('shippingOverlay');
    const shippingDisplay = document.getElementById('shippingDisplay');
    const shippingInput = document.getElementById('shippingInput');
    const shippingCostInput = document.getElementById('shippingCostInput');
    let selectedShippingName = shippingInput.value || ''; // Nama opsi yang dipilih
    let selectedShippingCost = shippingCostInput.value || ''; // Biaya opsi yang dipilih
    let shippingNotificationTimeout; // Untuk notifikasi peringatan


    // --- Fungsi Buka Modal Opsi Pengiriman ---
    function openShippingModal() {
      // Ambil nilai saat ini sebagai nilai awal
      selectedShippingName = shippingInput.value || '';
      selectedShippingCost = shippingCostInput.value || '';

      // Atur status radio button saat modal dibuka
      document.querySelectorAll('.shipping-option').forEach(radio => {
        radio.checked = radio.value === selectedShippingName;
      });

      shippingOverlay.classList.remove('hidden');
      setTimeout(() => {
        shippingOverlay.classList.remove('opacity-0');
        shippingModal.classList.remove('translate-y-full');
      }, 10);
    }

    // --- Fungsi Tutup Modal Opsi Pengiriman ---
    function closeShippingModal() {
      shippingModal.classList.add('translate-y-full');
      shippingOverlay.classList.add('opacity-0');
      setTimeout(() => {
        shippingOverlay.classList.add('hidden');
      }, 300);
    }

    // --- Fungsi Menyimpan Pilihan Pengiriman Sementara ---
    function selectShipping(name, cost, display) {
      selectedShippingName = name;
      selectedShippingCost = cost;
      // Hapus notifikasi jika pengguna mulai memilih
      document.getElementById('shippingWarning').classList.add('hidden');
    }

    // --- Fungsi Menampilkan Notifikasi Peringatan Pengiriman ---
    function showShippingWarning(message) {
      const warning = document.getElementById('shippingWarning');
      warning.textContent = message;
      warning.classList.remove('hidden');

      clearTimeout(shippingNotificationTimeout);
      shippingNotificationTimeout = setTimeout(() => {
        warning.classList.add('hidden');
      }, 3000);
    }

    // --- Fungsi Konfirmasi dan Validasi Pengiriman ---
    function confirmShippingSelection() {
      if (!selectedShippingName || !selectedShippingCost) {
        showShippingWarning('Pilih salah satu opsi pengiriman terlebih dahulu.');
        return;
      }

      // Update input display di halaman utama
      shippingDisplay.value = selectedShippingName + ' (+ Rp. ' + new Intl.NumberFormat('id-ID').format(selectedShippingCost) + ')';
      // Update input hidden yang akan disubmit
      shippingInput.value = selectedShippingName;
      shippingCostInput.value = selectedShippingCost; // Simpan biaya juga

      closeShippingModal();
    }

    // --- Perbarui Fungsi Validasi Form Checkout Utama ---
    function validateCheckoutForm() {
      // ... (Validasi Provinsi yang sudah ada) ...
      const provinceValue = provinceInput.value.trim();
      if (provinceValue === "") {
        showFieldWarning("Mohon lengkapi data Provinsi sebelum melanjutkan.");
        provinceDisplay.focus();
        return false;
      }

      // ✅ Validasi Opsi Pengiriman
      const shippingOptionValue = shippingInput.value.trim();
      const shippingCostValue = shippingCostInput.value.trim();
      if (shippingOptionValue === "" || shippingCostValue === "") {
        showFieldWarning("Mohon pilih Opsi Pengiriman sebelum melanjutkan.");
        shippingDisplay.focus(); // Fokus ke input display
        return false;
      }

      // ... (Validasi field lain jika ada) ...

      return true;
    }
  </script> -->

  <script>
    // ----------------------------------------------------
    // 1. OBJEK GLOBAL UNTUK MENGELOMPOKKAN VARIABEL & HELPER
    // ----------------------------------------------------
    const UI = {
      // Provinsi elements
      provinceModal: document.getElementById('provinceModal'),
      provinceOverlay: document.getElementById('provinceOverlay'),
      provinceDisplay: document.getElementById('provinceDisplay'),
      provinceInput: document.getElementById('provinceInput'),

      // Shipping elements
      shippingModal: document.getElementById('shippingModal'),
      shippingOverlay: document.getElementById('shippingOverlay'),
      shippingDisplay: document.getElementById('shippingDisplay'),
      shippingInput: document.getElementById('shippingInput'),
      shippingCostInput: document.getElementById('shippingCostInput'),
      shippingWarning: document.getElementById('shippingWarning'), // Asumsi ID ada di HTML modal

      // State variables (diambil dari nilai awal input jika ada)
      province: document.getElementById('provinceInput').value || '',
      shippingName: document.getElementById('shippingInput').value || '',
      shippingCost: document.getElementById('shippingCostInput').value || '',

      // Utility
      notificationTimeout: null
    };

    // ----------------------------------------------------
    // 2. HELPER FUNCTIONS
    // ----------------------------------------------------

    /**
     * Helper untuk menampilkan peringatan (dipanggil di validateCheckoutForm)
     */
    function showGlobalWarning(message, fieldElement) {
      alert(message); // Menggunakan alert sederhana
      if (fieldElement) {
        fieldElement.focus();
      }
    }

    /**
     * Helper untuk menampilkan peringatan di dalam modal (Khusus Shipping Modal)
     */
    function showShippingModalWarning(message) {
      UI.shippingWarning.textContent = message;
      UI.shippingWarning.classList.remove('hidden');

      clearTimeout(UI.notificationTimeout);
      UI.notificationTimeout = setTimeout(() => {
        UI.shippingWarning.classList.add('hidden');
      }, 3000);
    }

    // ----------------------------------------------------
    // 3. FUNGSI MODAL PROVINSI
    // ----------------------------------------------------

    function openProvinceModal() {
      // Set state saat ini saat modal dibuka
      UI.province = UI.provinceInput.value || '';

      // Atur status radio button saat modal dibuka (Jika diperlukan)
      document.querySelectorAll('.province-option').forEach(radio => {
        radio.checked = radio.value === UI.province;
      });

      UI.provinceOverlay.classList.remove('hidden');
      setTimeout(() => {
        UI.provinceOverlay.classList.remove('opacity-0');
        UI.provinceModal.classList.remove('translate-y-full');
      }, 10);
    }

    function closeProvinceModal() {
      UI.provinceModal.classList.add('translate-y-full');
      UI.provinceOverlay.classList.add('opacity-0');
      setTimeout(() => {
        UI.provinceOverlay.classList.add('hidden');
      }, 300);
    }

    // Mengupdate state sementara saat radio button diklik
    function selectProvince(value) {
      UI.province = value;
      // (Asumsi tidak ada warning di modal provinsi, jadi tidak perlu dihapus)
    }

    function confirmProvinceSelection() {
      if (!UI.province) {
        // Kita bisa menggunakan showGlobalWarning atau alert di sini jika perlu notifikasi di modal
        alert('Pilih salah satu provinsi terlebih dahulu.');
        return;
      }

      // Update input display di halaman utama
      UI.provinceDisplay.value = UI.province;
      // Update input hidden yang akan disubmit
      UI.provinceInput.value = UI.province;

      closeProvinceModal();
    }

    // ----------------------------------------------------
    // 4. FUNGSI MODAL PENGIRIMAN
    // ----------------------------------------------------

    function openShippingModal() {
      UI.shippingName = UI.shippingInput.value || '';
      UI.shippingCost = UI.shippingCostInput.value || '';

      document.querySelectorAll('.shipping-option').forEach(radio => {
        radio.checked = radio.value === UI.shippingName;
      });

      UI.shippingOverlay.classList.remove('hidden');
      setTimeout(() => {
        UI.shippingOverlay.classList.remove('opacity-0');
        UI.shippingModal.classList.remove('translate-y-full');
      }, 10);
    }

    function closeShippingModal() {
      UI.shippingModal.classList.add('translate-y-full');
      UI.shippingOverlay.classList.add('opacity-0');
      setTimeout(() => {
        UI.shippingOverlay.classList.add('hidden');
      }, 300);
    }

    function selectShipping(name, cost, display) {
      UI.shippingName = name;
      UI.shippingCost = cost;
      // Hapus notifikasi jika pengguna mulai memilih
      if (UI.shippingWarning) UI.shippingWarning.classList.add('hidden');
    }

    function confirmShippingSelection() {
      if (!UI.shippingName || !UI.shippingCost) {
        showShippingModalWarning('Pilih salah satu opsi pengiriman terlebih dahulu.');
        return;
      }

      // Format biaya untuk display
      const formattedCost = new Intl.NumberFormat('id-ID').format(UI.shippingCost);
      const displayLabel = UI.shippingName + ' (+ Rp. ' + formattedCost + ')';

      // Update input display di halaman utama
      UI.shippingDisplay.value = displayLabel;
      // Update input hidden yang akan disubmit
      UI.shippingInput.value = UI.shippingName;
      UI.shippingCostInput.value = UI.shippingCost;

      closeShippingModal();
    }

    // ----------------------------------------------------
    // 5. FUNGSI VALIDASI CHECKOUT UTAMA
    // ----------------------------------------------------

    function validateCheckoutForm() {
      // --- 1. Validasi Provinsi ---
      const provinceValue = UI.provinceInput.value.trim();
      if (provinceValue === "") {
        showGlobalWarning("Mohon pilih Provinsi terlebih dahulu.", UI.provinceDisplay);
        return false;
      }

      // --- 2. Validasi Opsi Pengiriman ---
      const shippingOptionValue = UI.shippingInput.value.trim();
      const shippingCostValue = UI.shippingCostInput.value.trim();

      // Cek apakah salah satu atau keduanya kosong
      if (shippingOptionValue === "" || shippingCostValue === "") {
        showGlobalWarning("Mohon pilih Opsi Pengiriman sebelum melanjutkan.", UI.shippingDisplay);
        return false;
      }

      // ... (Tambahkan validasi field Nama Lengkap, Alamat, dll. di sini) ...

      return true;
    }
  </script>
</body>

</html>