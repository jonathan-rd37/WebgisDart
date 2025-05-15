<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin Login</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <style>
    body {
      background: linear-gradient(to bottom right, #b0bec5, #90a4ae); /* abu muda */
      min-height: 100vh;
      font-family: 'Inter', sans-serif;
    }
  </style>
</head>
<body class="flex items-center justify-center">

  <div class="bg-white rounded-2xl shadow-2xl flex overflow-hidden w-full max-w-4xl border border-gray-200">
    
    <!-- Left Side - Illustration -->
    <div class="w-1/2 p-10 flex items-center justify-center relative">
      <img src="{{ asset('images/adminlogin.png') }}" alt="Admin Illustration" class="w-72 h-auto">
      
      <!-- Vertical Divider -->
      <div class="absolute right-0 top-10 bottom-10 w-px bg-gray-300"></div>
    </div>

    <!-- Right Side - Login Form -->
    <div class="w-1/2 p-10">
      <h2 class="text-2xl font-bold text-center text-black-600 mb-1">Login as a Admin User</h2>
      <form action="{{ route('admin.login.post') }}" method="POST" class="mt-4">
        @csrf
        <div class="mb-4">
          <label for="email" class="block text-sm text-gray-700 font-medium mb-1">Email</label>
          <input type="email" name="email" id="email" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500" required>
        </div>
        <div class="mb-6">
          <label for="password" class="block text-sm text-gray-700 font-medium mb-1">Password</label>
          <input type="password" name="password" id="password" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500" required>
        </div>
        <button type="submit" class="w-full bg-purple-600 hover:bg-purple-700 text-white py-2 rounded-lg font-semibold transition">LOGIN</button>
      </form>

      @if(session('error'))
        <p class="text-red-500 text-center mt-4">{{ session('error') }}</p>
      @endif

      <div class="text-center mt-4 text-sm text-gray-500">
        <p>Forgot your password? <a href="#" class="text-purple-600 hover:underline">Get help signed in.</a></p>
      </div>

      <div class="text-center mt-6 text-xs text-gray-400">
        <p>Terms of use. Privacy policy</p>
      </div>
    </div>
  </div>

</body>
</html>
