<?php
// Pastikan session dimulai untuk manajemen state
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
// Include data.php untuk akses konfigurasi dan fungsi
include 'data.php';

// --- Data Dummy Pengguna (Simulasi data session/database) ---
$user = [
  'name' => 'Ayu Lestari',
  'email' => 'ayu.lestari@example.com',
  'phone' => '085xxxxxxxxx',
  'avatar' => './src/asset/profil.jpg',
];
?>

<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Profil Saya - Locatera</title>

  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          fontFamily: {
            'sans': ['Poppins', 'sans-serif']
          },
          colors: {
            'locatera-orange': '#FF9D3D',
            'locatera-dark': '#374151'
          }
        }
      }
    }
  </script>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>

<body class="bg-gray-50 font-poppins text-gray-800">

  <?php include 'navbar.php'; ?>

  <main class="w-full max-w-7xl mx-auto px-4 pb-24 sm:px-6 lg:px-8 lg:pb-10 lg:pt-28 pt-4">

    <header class="flex items-center justify-between p-2 mb-8 lg:hidden">
      <a href="index.php" class="p-2 -ml-2 hover:bg-gray-200 rounded-full transition">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-6 h-6 text-locatera-dark">
          <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
        </svg>
      </a>
      <h1 class="text-xl font-bold text-locatera-dark flex-grow text-center mr-8">Profil Saya</h1>
    </header>

    <div class="max-w-2xl mx-auto bg-white p-6 lg:p-10 rounded-2xl shadow-lg border border-gray-100">

      <div class="flex flex-col items-center border-b pb-6 mb-6">
        <img src="<?php echo $user['avatar']; ?>" alt="Avatar Pengguna" class="w-24 h-24 rounded-full object-cover border-4 border-orange-100 shadow-md mb-4">
        <h2 class="text-2xl font-bold text-locatera-dark"><?php echo $user['name']; ?></h2>
        <p class="text-sm text-gray-500"><?php echo $user['email']; ?></p>
        </span>
      </div>

      <div class="space-y-4">

        <?php
        // Array menu untuk looping agar rapi
        $menuItems = [
          ['icon' => 'user-circle', 'label' => 'Edit Profil & Akun', 'href' => 'edit_profile.php'],
          ['icon' => 'lock-closed', 'label' => 'Ubah Kata Sandi', 'href' => 'change_password.php'],
          ['icon' => 'arrow-left-on-rectangle', 'label' => 'Keluar (Logout)', 'href' => 'login.php', 'color' => 'text-red-500'],
        ];
        ?>

        <?php foreach ($menuItems as $item): ?>
          <a href="<?php echo $item['href']; ?>" class="flex items-center justify-between p-4 bg-gray-50 hover:bg-orange-50 rounded-xl transition duration-200">
            <div class="flex items-center gap-4">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 <?php echo $item['color'] ?? 'text-locatera-orange'; ?>">
                <path fill-rule="evenodd" d="M7.5 6a4.5 4.5 0 1 1 9 0 4.5 4.5 0 0 1-9 0ZM3.751 20.105a8.25 8.25 0 0 1 16.498 0 .75.75 0 0 1-.437.695A18.683 18.683 0 0 1 12 22.5c-2.786 0-5.433-.668-7.812-1.815a.75.75 0 0 1-.437-.695Z" clip-rule="evenodd" />
              </svg>

              <span class="font-medium"><?php echo $item['label']; ?></span>
            </div>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5 text-gray-400">
              <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
            </svg>
          </a>
        <?php endforeach; ?>

      </div>
    </div>
  </main>
</body>

</html>