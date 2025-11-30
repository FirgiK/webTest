<?php
// Pastikan session dimulai dan data pengguna di-load
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
include 'data.php';

// --- Data Dummy Pengguna (Disimpan di Session/Variable) ---
// Kita asumsikan data ini didapat dari session user yang login
$user = [
  'name' => 'Ayu Lestari',
  'email' => 'ayu.lestari@example.com',
  'phone' => '085xxxxxxxxx',
  'avatar' => './src/asset/profil.jpg',
];

// Logika simulasi pemrosesan form (hanya untuk feedback)
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['save_profile'])) {
  // Di sini seharusnya ada logika untuk update database
  // Untuk tujuan frontend, kita bisa tampilkan pesan sukses singkat
  $success_message = "Perubahan profil berhasil disimpan!";
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Profil - Locatera</title>

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

  <div class="max-w-md lg:max-w-2xl mx-auto min-h-screen shadow-xl bg-white lg:rounded-2xl">

    <header class="flex items-center justify-between p-4 border-b">
      <a href="profile.php" class="p-2 -ml-2 hover:bg-gray-100 rounded-full transition">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-6 h-6 text-locatera-dark">
          <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
        </svg>
      </a>
      <h1 class="text-xl font-bold flex-grow text-center mr-6">Edit Profil</h1>
      <div class="w-6"></div>
    </header>

    <?php if (isset($success_message)): ?>
      <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mx-4 mt-4 rounded" role="alert">
        <p class="font-bold">Berhasil!</p>
        <p><?php echo $success_message; ?></p>
      </div>
    <?php endif; ?>

    <form action="edit_profile.php" method="POST" enctype="multipart/form-data" class="p-6 lg:p-10 space-y-6">

      <div class="flex flex-col items-center mb-8">
        <img src="<?php echo $user['avatar']; ?>" alt="Avatar Pengguna" class="w-28 h-28 rounded-full object-cover border-4 border-orange-100 shadow-md mb-3">
        <label for="avatar_upload" class="cursor-pointer text-sm font-semibold text-locatera-orange hover:text-orange-600 transition">
          Ubah Foto Profil
        </label>
        <input type="file" id="avatar_upload" name="avatar" class="hidden" accept="image/*">
      </div>

      <div>
        <label class="block text-xs text-gray-400 mb-1">Nama Lengkap</label>
        <input type="text" name="name" value="<?php echo $user['name']; ?>"
          class="w-full border-b border-gray-200 py-2 text-locatera-dark font-medium focus:outline-none focus:border-locatera-orange transition-colors"
          required>
      </div>

      <div>
        <label class="block text-xs text-gray-400 mb-1">Nomor Telepon</label>
        <input type="tel" name="phone" value="<?php echo $user['phone']; ?>"
          class="w-full border-b border-gray-200 py-2 text-locatera-dark font-medium focus:outline-none focus:border-locatera-orange transition-colors">
      </div>

      <div>
        <label class="block text-xs text-gray-400 mb-1">Email (Tidak dapat diubah)</label>
        <input type="email" name="email" value="<?php echo $user['email']; ?>"
          class="w-full border-b border-gray-200 py-2 text-gray-500 bg-gray-50/50 font-medium focus:outline-none"
          readonly disabled>
      </div>

      <div class="pt-8">
        <button type="submit" name="save_profile"
          class="w-full bg-locatera-orange text-white font-bold text-lg py-3 rounded-full shadow-lg hover:bg-orange-600 transition transform active:scale-95">
          Simpan Perubahan
        </button>
      </div>
    </form>

    <div class="p-6 text-center">
      <a href="change_password.php" class="text-sm text-gray-500 hover:text-locatera-orange transition">
        Ganti Kata Sandi?
      </a>
    </div>

  </div>
</body>

</html>