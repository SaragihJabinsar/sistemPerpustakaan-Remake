<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Informasi Perpustakaan</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <script src="https://cdn.jsdelivr.net/npm/@lottiefiles/lottie-player@latest"></script>
    <style>
        .nav-link.active {
            color: #1e3a8a; /* text-blue-900 */
            border-bottom: 2px solid #1e3a8a;
        }
    </style>
</head>
<body class="bg-gray-50 text-gray-800 font-sans h-screen flex flex-col">

    {{-- Header --}}
    <header class="bg-gradient-to-r from-blue-700 to-indigo-600 text-white py-6 shadow-md animate__animated animate__fadeIn">
        <div class="container mx-auto flex flex-col items-center text-center space-y-2">
            <h1 class="text-4xl md:text-5xl font-extrabold tracking-wide uppercase">📚 Perpustakaan</h1>
            <p class="text-lg italic">Sistem Informasi Manajemen Perpustakaan</p>
        </div>
    </header>

    {{-- Navbar --}}
    <nav class="bg-white shadow-md sticky top-0 z-50 animate__animated animate__fadeIn animate__delay-1s">
        <div class="container mx-auto px-6 py-4 flex flex-wrap justify-between items-center">
            <div class="mx-auto md:mx-0 flex gap-6 text-blue-800 font-semibold text-lg">
                <a href="{{ route('beranda') }}" class="nav-link transition duration-300 hover:text-blue-900">Beranda</a>
                <a href="{{ route('anggota.index') }}" class="nav-link transition duration-300 hover:text-blue-900">Anggota</a>
                <a href="{{ route('buku.index') }}" class="nav-link transition duration-300 hover:text-blue-900">Buku</a>
                <a href="{{ route('transaksi.index') }}" class="nav-link transition duration-300 hover:text-blue-900">Transaksi</a>
            </div>
            <div class="flex items-center gap-4 mt-4 md:mt-0">
                @if(session()->has('username'))
                    <!-- Menampilkan Nama Akun yang sedang login -->
                    <h1 class="text-lg font-semibold text-gray-800">{{ session('username') }}</h1>

                    <!-- Tombol Logout -->
                    <form action="{{ route('logout') }}" method="GET">
                        <button type="submit" class="px-4 py-2 bg-red-600 hover:bg-red-700 text-white font-semibold rounded-md transition">
                            Logout
                        </button>
                    </form>
                {{-- @else
                    <!-- Menampilkan Link Login jika belum login -->
                    <a href="{{ route('login') }}" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-md transition">
                        Login
                    </a> --}}
                @endif
            </div>


        </div>
    </nav>

    {{-- Konten --}}
    <main id="content" class="flex-1 overflow-y-auto container mx-auto px-6 py-8 animate__animated animate__fadeIn">
        @yield('content')
    </main>

    {{-- Footer --}}
    <footer class="bg-blue-800 text-white text-sm py-2 shadow-inner">
        <div class="text-center">
            &copy; {{ date('Y') }} Perpustakaan by <span class="font-semibold">Jabin</span>. Dibuat dengan semangat dan cinta dari <span class="text-pink-300">Miku 💖</span>
        </div>
    </footer>

    {{-- Animation Floating --}}
    <div class="fixed top-2 right-2 animate__animated animate__fadeIn animate__delay-2s">
        <lottie-player src="https://assets10.lottiefiles.com/packages/lf20_hzgq1iov.json" background="transparent" speed="1" style="width: 100px; height: 100px;" loop autoplay></lottie-player>
    </div>

    {{-- AJAX Navigation + Active Nav --}}
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const navLinks = document.querySelectorAll('.nav-link');
            const content = document.getElementById('content');

            function setActiveLink(clickedLink) {
                navLinks.forEach(link => link.classList.remove('active'));
                clickedLink.classList.add('active');
            }

            navLinks.forEach(link => {
                link.addEventListener('click', function (e) {
                    e.preventDefault();
                    const url = this.href;

                    // Set active styling
                    setActiveLink(this);

                    fetch(url)
                        .then(res => res.text())
                        .then(html => {
                            const parser = new DOMParser();
                            const doc = parser.parseFromString(html, 'text/html');
                            const newContent = doc.getElementById('content');
                            if (newContent) {
                                content.innerHTML = newContent.innerHTML;
                                window.history.pushState({}, '', url);
                            }
                        })
                        .catch(err => console.error('Fetch error:', err));
                });
            });
        });
    </script>

</body>
</html>
