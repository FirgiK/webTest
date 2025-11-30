<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign Up - Locatera</title>

  <script src="https://cdn.tailwindcss.com"></script>

  <script>
    tailwind.config = {
      theme: {
        extend: {
          fontFamily: {
            'sans': ['Cantarell', 'sans-serif'],
            'header': ['Lilita One', 'cursive'],
          },
          backgroundImage: {
            // Gunakan gradasi custom yang sama
            'locatera-gradient': 'linear-gradient(to bottom, #FF9D3D, #FEEE91)'
          },
          colors: {
            'locatera-orange': '#FF9D3D'
          }
        }
      }
    }
  </script>

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Cantarell:ital,wght@0,400;0,700;1,400;1,700&family=Lilita+One&display=swap" rel="stylesheet">

</head>

<body class="bg-locatera-gradient min-h-screen flex items-center justify-center p-6 font-sans">

  <div class="w-full max-w-sm">

    <h1 class="text-5xl font-bold text-white text-center mb-[94px] font-header">
      Sign Up
    </h1>

    <form action="login.php" method="POST">
      <div class="mb-4">
        <input
          type="text"
          name="number"
          placeholder="Number"
          class="w-full px-5 py-4 rounded-lg shadow-sm border-none placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-orange-400"
          required>
      </div>

      <div class="mb-4">
        <input
          type="email"
          name="email"
          placeholder="Email"
          class="w-full px-5 py-4 rounded-lg shadow-sm border-none placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-orange-400"
          required>
      </div>

      <div class="mb-[92px]">
        <input
          type="password"
          name="password"
          placeholder="Password"
          class="w-full px-5 py-4 rounded-lg shadow-sm border-none placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-orange-400"
          required>
      </div>

      <button
        type="submit"
        class="w-full bg-orange-500 text-white font-bold text-lg py-3 px-6 rounded-lg shadow-lg hover:bg-orange-600 focus:outline-none focus:ring-2 focus:ring-orange-400 focus:ring-opacity-75 transition duration-300 ease-in-out">
        Sign Up
      </button>
    </form>

    <p class="text-center text-sm text-gray-700 mt-6">
      Sudah punya akun?
      <a href="login.php" class="font-bold text-green-600 hover:text-green-700">
        Log In
      </a>
    </p>
  </div>

</body>

</html>

