<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Daftar | Amel Beauty Salon</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-white flex items-center justify-center min-h-screen">
  <div class="w-full max-w-md px-8 py-10 shadow-md border rounded-md">
    <div class="flex justify-center mb-4">
      <img src="assets/salon.png" alt="Logo" class="h-16 w-16" />
    </div>
    <nav class="text-sm mb-4 text-pink-600">
      <a href="#" class="hover:underline">Home</a> / <span class="text-gray-500">Daftar</span>
    </nav>
    <h2 class="text-2xl font-semibold text-center mb-2">Daftar Sebagai Admin</h2>
    <p class="text-center text-sm text-gray-600 mb-6">Input your username and password.</p>
    
    @if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li style="color:red">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ url('/daftarAdmin') }}" method="post">
      @csrf
      <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
        <input type="email" name="email" placeholder="e.g.contoh1@gmail.com" 
        class="w-full border border-pink-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-pink-500 
         @error('email') is-invalid @enderror" required value="{{old('email')}}"/>
                        @error('email')
                        <div class="invalid-feedback">
                          {{$message}}
                        </div>
                        @enderror
                      
      </div>
      <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700 mb-1">Username</label>
        <input type="text" name="nama" placeholder="e.g. alifanchii" 
        class="w-full border border-pink-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-pink-500
         @error('name') is-invalid @enderror" required value="{{old('name')}}"/>
                      @error('name')
                      <div class="invalid-feedback">
                        {{$message}}
                      </div>
                      @enderror
                
      </div>
      <div class="mb-6">
        <label class="block text-sm font-medium text-gray-700 mb-1">Password</label>
        <div class="relative">
          <input type="password" name="password"id="password" placeholder="e.g. 4kuBu7uhM3dkIt" 
          class="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-pink-500
         @error('password') is-invalid @enderror" required/>
                          @error('password')
                          <div class="invalid-feedback">
                            {{$message}}
                          </div>
                          @enderror
            <button type="button" onclick="togglePassword()" 
            class="absolute right-3 top-2 text-gray-500 hover:text-gray-800">
            👁️
            </button>
        </div>
      </div>
      <button type="submit" class="w-full bg-pink-500 hover:bg-pink-600 text-white font-semibold py-2 rounded-md shadow">sign in</button>
    </form>

    <p class="text-center text-sm mt-6">Already have an account?  
      <a href="{{ url('/login') }}" class="text-pink-600 hover:underline">Login here!</a>
    </p>

    <footer class="text-center text-xs text-gray-400 mt-6">
      © 2025 Amel Beauty Salon. Hak Cipta Dilindungi
    </footer>
  </div>
  <script>
  function togglePassword() {
    const passwordInput = document.getElementById('password');
    const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
    passwordInput.setAttribute('type', type);
  }
</script>

</body>
</html>
