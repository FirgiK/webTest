<?php
include 'data.php';

// 1. Ambil ID dari URL
$id = $_GET['id'] ?? null;
$product = null;

// 2. Cari produk berdasarkan ID
if ($id) {
  foreach ($products as $p) {
    if ($p['id'] == $id) {
      $product = $p;
      break;
    }
  }
}

// 3. Jika produk tidak ditemukan, kembalikan ke Home
if (!$product) {
  header("Location: index.php");
  exit;
}

// Default varian jika ada
$defaultVariant = $product['variants'][0] ?? 'Default';
?>

<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $product['name']; ?> - Locatera</title>

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
            'locatera-dark': '#3C2F2F', // Teks
            'locatera-gray': '#6A6A6A', // Teks sekunder
          }
        }
      }
    }
  </script>
  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Cantarell:ital,wght@0,400;0,700;1,400;1,700&family=Lilita+One&family=Lobster&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
  <!-- Icon -->
  <script type_module="text/javascript" src="https://unpkg.com/heroicons@2.1.1/24/outline/index.js"></script>
  <script type_module="text/javascript" src="https://unpkg.com/heroicons@2.1.1/24/solid/index.js"></script>
</head>

<body class="bg-white font-roboto pb-24 md:pb-0 relative">

  <div class="absolute top-4 left-4 z-10 md:static md:max-w-7xl md:mx-auto md:mt-6 md:px-8">
    <a href="index.php" class="bg-white/80 backdrop-blur-sm p-2 rounded-full shadow-sm hover:bg-white transition inline-flex">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-6 h-6">
        <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
      </svg>
    </a>
  </div>

  <main class="max-w-7xl mx-auto md:px-8 md:py-8 grid grid-cols-1 md:grid-cols-2 md:gap-12 items-start">
    <div class="w-full bg-gray-50 aspect-square md:h-[500px] flex items-center justify-center rounded-b-[3rem] md:rounded-3xl overflow-hidden relative">
      <img src="<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>" class="w-3/4 md:w-full md:h-full object-contain md:object-cover">
    </div>

    <div class="px-6 py-6 md:px-0">
      <div class="flex justify-between items-start mb-2">
        <h1 class="text-2xl font-bold text-locatera-dark uppercase tracking-wide w-2/3"><?php echo $product['name']; ?></h1>
        <p class="text-xl font-bold text-locatera-dark">Rp. <?php echo number_format($product['price'], 0, ',', '.'); ?></p>
      </div>
      <div class="flex items-center mb-6 text-sm text-locatera-gray font-medium">
        <span class="text-locatera-orange mr-1">★</span> <?php echo $product['rating']; ?>
      </div>
      <div class="prose prose-sm text-gray-500 leading-relaxed mb-8">
        <p><?php echo $product['description']; ?></p>
      </div>

      <div class="fixed bottom-0 left-0 right-0 p-4 bg-white shadow-[0_-4px_6px_-1px_rgba(0,0,0,0.1)] flex gap-4 z-30 md:static md:shadow-none md:p-0">
        <button onclick="openModalForCart()" class="bg-orange-100 text-locatera-orange p-4 rounded-xl hover:bg-orange-200 transition shadow-md">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
          </svg>
        </button>
        <button onclick="openModalForCheckout()" class="flex-grow bg-locatera-orange text-white font-bold text-lg rounded-xl shadow-lg hover:bg-orange-600 transition uppercase tracking-wide">
          Order Now
        </button>
      </div>
    </div>
  </main>

  <div id="modalOverlay" onclick="closeModal()" class="fixed inset-0 bg-black/60 z-40 hidden transition-opacity duration-300 opacity-0"></div>

  <div id="orderModal" class="fixed bottom-0 left-0 right-0 bg-white z-50 rounded-t-[2rem] transform translate-y-full transition-transform duration-300 ease-out shadow-2xl max-w-md mx-auto md:max-w-2xl">

    <form action="checkout.php" id="orderForm" method="POST" class="p-6">

      <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
      <input type="hidden" name="product_name" value="<?php echo $product['name']; ?>">
      <input type="hidden" name="product_price" value="<?php echo $product['price']; ?>">
      <input type="hidden" name="selected_variant" id="inputVariant" value="<?php echo $defaultVariant; ?>">

      <div class="flex items-center gap-4 mb-6">
        <button type="button" onclick="closeModal()" class="p-1">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-6 h-6 text-gray-700">
            <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
          </svg>
        </button>

        <div class="w-12 h-12 rounded-lg overflow-hidden bg-gray-100 border border-gray-200">
          <img src="<?php echo $product['image']; ?>" class="w-full h-full object-cover">
        </div>

        <div>
          <h3 class="font-bold text-locatera-dark"><?php echo $product['name']; ?></h3>
          <p class="text-gray-500 text-sm">Rp. <?php echo number_format($product['price'], 0, ',', '.'); ?></p>
        </div>
      </div>

      <div class="mb-6">
        <label class="block text-sm font-bold text-gray-800 mb-3">Pilih Rasa</label>
        <div class="flex flex-wrap gap-2">
          <?php if (isset($product['variants'])): ?>
            <?php foreach ($product['variants'] as $index => $variant): ?>
              <button type="button"
                onclick="selectVariant(this, '<?php echo $variant; ?>')"
                class="variant-btn px-4 py-2 rounded-full text-xs font-medium border transition-all duration-200
                                    <?php echo ($index === 0) ? 'bg-orange-50 border-locatera-orange text-locatera-orange ring-1 ring-orange-300' : 'bg-white border-gray-200 text-gray-600 hover:border-orange-300'; ?>">
                <?php echo $variant; ?>
              </button>
            <?php endforeach; ?>
          <?php endif; ?>
        </div>
      </div>

      <div class="mb-8">
        <label class="block text-sm font-bold text-gray-800 mb-3">Kuantitas</label>
        <div class="flex items-center gap-4">
          <div class="flex items-center border border-gray-300 rounded-lg px-2 py-1">
            <button type="button" onclick="updateQty(-1)" class="w-8 h-8 flex items-center justify-center text-gray-500 hover:text-locatera-orange font-bold text-xl">-</button>
            <input type="number" name="quantity" id="inputQty" value="1" class="w-12 text-center border-none focus:ring-0 font-bold text-gray-800" readonly>
            <button type="button" onclick="updateQty(1)" class="w-8 h-8 flex items-center justify-center text-gray-500 hover:text-locatera-orange font-bold text-xl">+</button>
          </div>
        </div>
      </div>

      <button type="submit" class="w-full bg-locatera-orange text-white font-bold text-lg py-4 rounded-full shadow-lg hover:bg-orange-600 transition active:scale-95">
        Tambahkan
      </button>
    </form>
  </div>

  <script>
    const modal = document.getElementById('orderModal');
    const overlay = document.getElementById('modalOverlay');
    const inputVariant = document.getElementById('inputVariant');
    const inputQty = document.getElementById('inputQty');

    function openModalForCheckout() {
      document.getElementById('orderForm').action = 'checkout.php';
      openModal();
    }

    function openModalForCart() {
      document.getElementById('orderForm').action = 'cart.php';
      openModal();
    }

    // Fungsi Buka Modal
    function openModal() {
      overlay.classList.remove('hidden');
      // Sedikit delay agar transisi opacity terlihat smooth
      setTimeout(() => {
        overlay.classList.remove('opacity-0');
        modal.classList.remove('translate-y-full');
      }, 10);
    }

    // Fungsi Tutup Modal
    function closeModal() {
      modal.classList.add('translate-y-full');
      overlay.classList.add('opacity-0');

      // Sembunyikan overlay setelah animasi slide selesai (300ms)
      setTimeout(() => {
        overlay.classList.add('hidden');
      }, 300);
    }

    // Fungsi Pilih Varian
    function selectVariant(btn, variantName) {
      // 1. Update hidden input
      inputVariant.value = variantName;

      // 2. Reset tampilan semua tombol
      document.querySelectorAll('.variant-btn').forEach(b => {
        b.className = 'variant-btn px-4 py-2 rounded-full text-xs font-medium border bg-white border-gray-200 text-gray-600 hover:border-orange-300 transition-all duration-200';
      });

      // 3. Aktifkan tombol yang diklik (Gaya Orange)
      btn.className = 'variant-btn px-4 py-2 rounded-full text-xs font-medium border bg-orange-50 border-locatera-orange text-locatera-orange ring-1 ring-orange-300 transition-all duration-200';
    }

    // Fungsi Update Quantity
    function updateQty(change) {
      let currentQty = parseInt(inputQty.value);
      let newQty = currentQty + change;

      if (newQty >= 1) {
        inputQty.value = newQty;
      }
    }
  </script>

</body>

</html>