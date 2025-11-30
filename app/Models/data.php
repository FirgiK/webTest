<?php

/*
|--------------------------------------------------------------------------
| DATA DUMMY PRODUK
|--------------------------------------------------------------------------
|
| Ini adalah "database" palsu kita.
| Kita tambahkan key 'category' untuk fitur filter.
|
*/
$products = [
  [
    'id' => 1,
    'name' => 'Tiramisusu',
    'image' => './src/asset/tiramisusu matcha bg.png', // Ganti dengan path gambar Anda
    'rating' => 4.5,
    'price' => 124000,
    'category' => 'Makanan Basah',
    'description' => 'Cake oleh-oleh khas Bandung, dengan creame matcha yang lumer dan taburan crumble crunchy diatasnya. perpaduan 7 layers of happiness yang perfect & balance',
    'variants' => ['Original', 'Matcha', 'Cookies n Cream']
  ],
  [
    'id' => 2,
    'name' => 'Cheesecuit',
    'image' => './src/asset/cheesecuit bg.png', // Ganti dengan path gambar Anda
    'rating' => 4.5,
    'price' => 58800,
    'category' => 'Makanan Basah',
    'description' => 'Perpaduan creame cheese yang melimpah dan biskuit premium ditambah dengan topping strawberry',
    'variants' => ['Mix Fruit', 'Strawberry', 'Tiramisu', 'Durian', 'Green Tea', 'Double Cheese', 'Choco Crunchy', 'Red Velvet']
  ],
  [
    'id' => 3,
    'name' => 'Amanda',
    'image' => './src/asset/amanda.png', // Ganti dengan path gambar Anda
    'rating' => 4.8,
    'price' => 53000,
    'category' => 'Makanan Basah',
    'description' => 'Kue brownis kukus yang memiliki 3 lapisan lembut dengan rasa coklat yang kuat, manis, gurih, dan sedikit pahit khas mocca',
    'variants' => ['Original', 'Tiramisu', 'Choco Marble', 'Cheese Cream', 'Pink Marble', 'Green Tea Mint', 'Chese Cream', 'Banana Cheese']
  ],
  [
    'id' => 4,
    'name' => 'Rochi',
    'image' => './src/asset/rochi bg.png', // Ganti dengan path gambar Anda
    'rating' => 4.9,
    'price' => 36480,
    'category' => 'Makanan Basah',
    'description' => 'Roti mochi panggang asal Bandung yang terkenal dengan tekturnya yang lembut dengan isian mochi kenyal didalamnya.',
    'variants' => ['Peanut', 'Mung Bean', 'Red Bean', 'Savory Beef', 'Calleebaut Chocolate', 'Cranberry Creamcheese']
  ],
  [
    'id' => 5,
    'name' => 'Kopi Aroma',
    'image' => './src/asset/kopi-aroma.png', // Ganti dengan path gambar Anda
    'rating' => 4.7,
    'price' => 40000,
    'category' => 'Minuman',
    'description' => 'Kopi legendaris dari Bandung yang telah berdiri sejak tahun 1930, terkenal dengan proses pengolahan tradisionalnya yang mempertahankan cita rasa khas.'
  ],
  [
    'id' => 6,
    'name' => 'Bajigur Hanjuang',
    'image' => './src/asset/bajigur.png', // Ganti dengan path gambar Anda
    'rating' => 4.6,
    'price' => 16000,
    'category' => 'Minuman',
    'description' => 'Minuman tradisional priangan dengan bahan utama gula palem, dilengkapi krimer dan vanilla sehingga menghasilkan rasa dan aroma yang khas'
  ],
  [
    'id' => 7,
    'name' => 'Bandung Kunafe',
    'image' => './src/asset/bandung kunafe bg.png', // Ganti dengan path gambar Anda
    'rating' => 4.6,
    'price' => 123000,
    'category' => 'Makanan Basah',
    'description' => 'Oleh-oleh khas Bandung berupa kue lembut dengan tekstur japanese cake yang empuk dan dilapisi cream serta taburan remahan pastry atau keju.'
  ],
  [
    'id' => 8,
    'name' => 'Batagor riri',
    'image' => './src/asset/batagor riri bg.png', // Ganti dengan path gambar Anda
    'rating' => 4.8,
    'price' => 115000,
    'category' => 'Makanan Kering',
    'description' => 'Batagor frozen siap goreng dengan isian ikan tenggiri asli yang gurih dan kenyal, cocok dinikmati sebagai camilan atau lauk pendamping nasi.',
    'variants' => ['Original', 'Spicy', 'Cheese', 'BBQ']
  ],
  [
    'id' => 9,
    'name' => '⁠Pisang Bollen Kartikasari',
    'image' => './src/asset/bollen kartiksari bg.png', // Ganti dengan path gambar Anda
    'rating' => 4.6,
    'price' => 43000,
    'category' => 'Makanan Kering',
    'description' => 'Pisang bollen premium dengan isian pisang dan cokelat lumer, yang cocok dinikmati sebagai camilan spesial atau oleh-oleh.'
  ],
  [
    'id' => 10,
    'name' => 'Keripik Tempe',
    'image' => './src/asset/keripik tempe bg.png', // Ganti dengan path gambar Anda
    'rating' => 4.6,
    'price' => 35000,
    'category' => 'Makanan Kering',
    'description' => 'Keripik tempe gurih dan renyah, terbuat dari tempe pilihan yang diiris tipis dan digoreng hingga kering, cocok sebagai camilan sehat.'
  ],
  [
    'id' => 11,
    'name' => 'Kue Balok Boga Rasa',
    'image' => './src/asset/kue balok bg.png', // Ganti dengan path gambar Anda
    'rating' => 4.6,
    'price' => 49000,
    'category' => 'Makanan Basah',
    'description' => 'Kue balok premium dengan tekstur lembut dan isian cokelat lumer, yang cocok dinikmati sebagai camilan spesial atau oleh-oleh.',
    'variants' => ['Original', 'Coklat', 'Keju', 'Matcha','Strawberry', 'Red Velvet', 'Green Tea', 'Tiramisu', 'Kacang']
  ],
  [
    'id' => 12,
    'name' => 'Rangginang',
    'image' => './src/asset/rengginang bg.png', // Ganti dengan path gambar Anda
    'rating' => 4.6,
    'price' => 38000,
    'category' => 'Makanan Kering',
    'description' => 'Rangginang gurih dan renyah, terbuat dari beras ketan pilihan yang dibentuk dan digoreng hingga kering, cocok sebagai camilan tradisional.'
  ],
  [
    'id' => 13,
    'name' => 'Seblak Bandung Asli',
    'image' => './src/asset/seblak instant bdg.png', // Ganti dengan path gambar Anda
    'rating' => 4.8,
    'price' => 23000,
    'category' => 'Makanan Kering',
    'description' => 'Seblak instan khas Bandung dengan cita rasa pedas dan gurih, mudah disajikan dengan tambahan topping sesuai selera.'
  ],
  [
    'id' => 14,
    'name' => 'Tahu Susu Lembang',
    'image' => './src/asset/tahu susu lembang bg.png', // Ganti dengan path gambar Anda
    'rating' => 4.9,
    'price' => 25000,
    'category' => 'Makanan Basah',
    'description' => 'Tahu susu lembang yang lembut dan kaya protein, terbuat dari campuran kedelai pilihan dan susu segar dari Lembang.'
  ],
  [
    'id' => 15,
    'name' => 'Tjilaki 9',
    'image' => './src/asset/tjilaki bg.png', // Ganti dengan path gambar Anda
    'rating' => 4.6,
    'price' => 160000,
    'category' => 'Makanan Basah',
    'description' => 'Salah satu produk kuliner dari Bandung yang terkenal dengan cita rasa bolu pisang premium. kue ini merupakan inovasi dari bolu pisang tradisional yang dikemas secara modern, menghadirkan perpaduan antara rasa auntentik pisang khas indonesia.',
    'variants' => ['Bolu Pisang Kacang', 'Bolu Pisang Coklat', 'Bolu Pisang Strawberry', 'Bolu Pisang Keju']
  ],
  [
    'id' => 16,
    'name' => 'Yoghurt Lembang Yobba',
    'image' => './src/asset/yogurt bdg bg.png', // Ganti dengan path gambar Anda
    'rating' => 4.6,
    'price' => 20000,
    'category' => 'Minuman',
    'description' => 'Produk yobba yogurt lembang yang paling best, perpaduan dari yogurt yang kental dengan sari dan buah asli serta serutan jelly yang krenyes-krenyes.',
    'variants' => ['Strawberry', 'Mango', 'Lychee', 'Avocado', 'Mixed Fruit']
  ]
];


// ... array $products tetap sama ...

$orderHistory = [
    [
        'id' => '#LOC1001',
        'date' => '2025-11-20',
        'total' => 224800,
        'status' => 'Dikirim',
        'delivery_date' => '2025-11-24',
        'items' => [
            ['name' => 'Tiramisusu', 'variant' => 'Matcha', 'qty' => 1, 'price' => 98000],
            ['name' => 'Cheesecuit', 'variant' => 'Mix Fruit', 'qty' => 1, 'price' => 58800],
        ]
    ],
    [
        'id' => '#LOC1002',
        'date' => '2025-11-15',
        'total' => 150000,
        'status' => 'Selesai',
        'delivery_date' => '2025-11-18',
        'items' => [
            ['name' => 'Amanda Original', 'variant' => 'Original', 'qty' => 3, 'price' => 45000],
        ]
        ],
    [
        'id' => '#LOC1003',
        'date' => '2025-11-15',
        'total' => 150000,
        'status' => 'Dibuat',
        'delivery_date' => '2025-11-18',
        'items' => [
            ['name' => 'Amanda Original', 'variant' => 'Original', 'qty' => 3, 'price' => 45000],
        ]
    ]
];

if (session_status() == PHP_SESSION_NONE) {
  session_start();
}

// Inisialisasi daftar favorit jika belum ada
if (!isset($_SESSION['favorites'])) {
  // Kita inisialisasi dengan beberapa produk ID sebagai simulasi sudah difavoritkan
  $_SESSION['favorites'] = [1, 3]; // Misalnya, produk ID 1 dan 3 sudah difavoritkan
}

// Fungsi untuk mendapatkan detail produk berdasarkan ID
function getProductById($id)
{
  global $products;
  foreach ($products as $product) {
    if ($product['id'] == $id) {
      return $product;
    }
  }
  return null;
}
?>