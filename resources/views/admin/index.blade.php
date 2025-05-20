  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;900&display=swap" rel="stylesheet">
    <style>
      body {
        font-family: 'Inter', sans-serif;
        background: linear-gradient(135deg, #d1d5db 0%, #e5e7eb 100%);
        background-repeat: repeat;
        background-size: cover;
      }

      /* Bikin titik kelihatan */
      body::before {
        content: "";
        position: fixed;
        top: 0; left: 0;
        width: 100%;
        height: 100%;
        background-image: radial-gradient(#d1d5db 2px, transparent 2px);
        background-size: 16px 16px; /* lebih rapat */
        opacity: 0.15; /* lebih kelihatan */
        pointer-events: none;
        z-index: 0;
      }
    </style>
  </head>
    <body class="min-h-screen flex flex-col items-center justify-center p-6 relative">

      <img src="/images/1.png" alt="Logo"
        class="w-32 h-32 object-contain absolute top-5 mx-auto left-0 right-0">

      <div class="relative bg-white rounded-3xl shadow-2xl p-12 w-full max-w-lg border border-gray-200 z-10" style="height: 480px;">
      <h1 class="text-4xl font-extrabold text-gray-900 mb-4 text-center">Admin Dashboard</h1>
      <p class="text-gray-500 mb-6 text-center text-base">Manage disaster data and aid distribution easily.</p>

      <div class="flex flex-col gap-4">
        <a href="{{ route('addDisaster') }}" class="px-6 py-3 bg-blue-600 hover:bg-blue-700 rounded-xl text-white font-bold text-base text-center transition-transform transform hover:scale-105 shadow-md">➕ Add Disaster</a>
        <a href="{{ route('deleteDisaster') }}" class="px-6 py-3 bg-red-600 hover:bg-red-700 rounded-xl text-white font-bold text-base text-center transition-transform transform hover:scale-105 shadow-md">🗑️ Delete Disaster</a>
        <a href="{{ route('addAids') }}" class="px-6 py-3 bg-green-600 hover:bg-green-700 rounded-xl text-white font-bold text-base text-center transition-transform transform hover:scale-105 shadow-md">✏️ Add Aids</a>
      </div>

      <!-- Tombol logout kecil di pojok kanan bawah -->
      <form action="{{ route('logout') }}" method="POST" class="absolute bottom-10 right-12">
      @csrf
      <button type="submit" class="text-base px-4 py-2 bg-gray-800 hover:bg-gray-900 text-white rounded-lg shadow">
          Logout
      </button>
      </form>

      </div>

    </body>
  </html>
