<?php
include 'data.php'; // Panggil database produk

/*
|--------------------------------------------------------------------------
| SIMULASI DATA KERANJANG
|--------------------------------------------------------------------------
*/
$cartItems = [
    ['product_id' => 2, 'variant' => 'Mix Fruit', 'qty' => 1],
    ['product_id' => 1, 'variant' => 'Matcha', 'qty' => 1]
];

// Hitung Total
$grandTotal = 0;
$displayItems = [];

foreach ($cartItems as $item) {
    foreach ($products as $product) {
        if ($product['id'] == $item['product_id']) {
            $subtotal = $product['price'] * $item['qty'];
            $grandTotal += $subtotal;
            
            $displayItems[] = [
                'name' => $product['name'],
                'image' => $product['image'],
                'price' => $product['price'],
                'variant' => $item['variant'],
                'qty' => $item['qty']
            ];
            break; 
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang Saya - Locatera</title>
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

    <script type_module="text/javascript" src="https://unpkg.com/heroicons@2.1.1/24/outline/index.js"></script>
    <script type_module="text/javascript" src="https://unpkg.com/heroicons@2.1.1/24/solid/index.js"></script>
</head>
<body class="bg-gray-50 font-poppins text-gray-800">

    <?php include 'navbar.php'; ?>

    <div class="w-full max-w-7xl mx-auto min-h-screen relative bg-gray-50 pb-32 lg:pt-28 lg:px-8">

        <div class="flex justify-between items-center p-6 bg-gray-50 sticky top-0 z-10 lg:hidden">
            <a href="index.php" class="p-2 -ml-2 text-locatera-dark">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" /></svg>
            </a>
            <h1 class="text-lg font-bold text-locatera-dark flex-grow ml-4">Keranjang Saya</h1>
            <button class="text-locatera-dark">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-7 h-7"><path stroke-linecap="round" stroke-linejoin="round" d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 0 1 .865-.501 48.172 48.172 0 0 0 3.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0 0 12 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018Z" /></svg>
            </button>
        </div>

        <h1 class="hidden lg:block text-3xl font-bold text-locatera-dark mb-8 mt-4">Keranjang Belanja</h1>

        <div class="flex flex-col lg:grid lg:grid-cols-12 lg:gap-8 items-start">
            
            <div class="w-full lg:col-span-8 px-6 lg:px-0 space-y-4">
                
                <?php foreach($displayItems as $index => $item): ?>
                <div class="bg-white p-4 rounded-2xl shadow-sm flex items-center gap-4 transition hover:shadow-md border border-transparent hover:border-orange-100">
                    <div class="w-20 h-20 flex-shrink-0 rounded-xl overflow-hidden bg-gray-100">
                        <img src="<?php echo $item['image']; ?>" alt="<?php echo $item['name']; ?>" class="w-full h-full object-cover">
                    </div>
                    
                    <div class="flex-grow">
                        <h3 class="font-bold text-locatera-dark text-sm lg:text-base"><?php echo $item['name']; ?></h3>
                        <p class="text-xs text-gray-400 mb-1 lg:text-sm"><?php echo $item['variant']; ?></p>
                        <p class="text-sm font-medium text-gray-600 lg:text-base lg:font-bold lg:text-locatera-orange">
                            <?php echo number_format($item['price'], 0, ',', '.'); ?>
                        </p>
                    </div>

                    <div class="flex items-center gap-3">
                        <button class="w-6 h-6 lg:w-8 lg:h-8 rounded-full bg-locatera-orange text-white flex items-center justify-center shadow-md hover:bg-orange-500 transition">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4"><path fill-rule="evenodd" d="M4.25 12a.75.75 0 0 1 .75-.75h14a.75.75 0 0 1 0 1.5H5a.75.75 0 0 1-.75-.75Z" clip-rule="evenodd" /></svg>
                        </button>
                        
                        <span class="text-sm font-bold text-locatera-dark w-3 text-center lg:text-base"><?php echo $item['qty']; ?></span>
                        
                        <button class="w-6 h-6 lg:w-8 lg:h-8 rounded-full bg-locatera-orange text-white flex items-center justify-center shadow-md hover:bg-orange-500 transition">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4"><path fill-rule="evenodd" d="M12 3.75a.75.75 0 0 1 .75.75v6.75h6.75a.75.75 0 0 1 0 1.5h-6.75v6.75a.75.75 0 0 1-1.5 0v-6.75H4.5a.75.75 0 0 1 0-1.5h6.75V4.5a.75.75 0 0 1 .75-.75Z" clip-rule="evenodd" /></svg>
                        </button>
                    </div>
                </div>
                <?php endforeach; ?>
                
                <?php if(empty($displayItems)): ?>
                    <div class="text-center py-10 text-gray-400">Keranjang masih kosong.</div>
                <?php endif; ?>

            </div>

            <div class="w-full lg:col-span-4 px-6 lg:px-0 mt-8 lg:mt-0">
                
                <div class="lg:bg-white lg:p-6 lg:rounded-2xl lg:shadow-md lg:sticky lg:top-32">
                    
                    <h2 class="hidden lg:block text-lg font-bold text-locatera-dark mb-4">Ringkasan Belanja</h2>

                    <div class="flex items-center justify-between lg:mb-6">
                        <div class="flex items-center gap-2 lg:flex-col lg:items-start lg:gap-0">
                            <span class="text-sm font-bold text-locatera-dark lg:text-gray-500 lg:font-normal">Total:</span>
                            <span class="text-lg lg:text-2xl font-bold text-locatera-dark">
                                <?php echo number_format($grandTotal, 0, ',', '.'); ?>
                            </span>
                        </div>
                        
                        <form action="checkout.php" method="POST" class="lg:hidden">
                            <input type="hidden" name="product_name" value="Mix Order (<?php echo count($cartItems); ?> Items)">
                            <input type="hidden" name="product_price" value="<?php echo $grandTotal; ?>">
                            <input type="hidden" name="quantity" value="1">
                            
                            <button type="submit" class="bg-locatera-orange text-white font-medium px-8 py-2.5 rounded-xl shadow-lg hover:bg-orange-500 transition active:scale-95">
                                CheckOut
                            </button>
                        </form>
                    </div>

                    <form action="checkout.php" method="POST" class="hidden lg:block w-full">
                        <input type="hidden" name="product_name" value="Mix Order (<?php echo count($cartItems); ?> Items)">
                        <input type="hidden" name="product_price" value="<?php echo $grandTotal; ?>">
                        <input type="hidden" name="quantity" value="1">
                        
                        <div class="space-y-2 mb-6 text-sm text-gray-500 border-t border-gray-100 pt-4">
                            <div class="flex justify-between"><span>Total Harga</span><span><?php echo number_format($grandTotal, 0, ',', '.'); ?></span></div>
                            <div class="flex justify-between"><span>Diskon</span><span>0</span></div>
                        </div>

                        <button type="submit" class="w-full bg-locatera-orange text-white font-bold text-lg py-3 rounded-xl shadow-lg hover:bg-orange-500 transition transform active:scale-95">
                            CheckOut
                        </button>
                    </form>

                </div>
            </div>

        </div> </div>

</body>
</html>