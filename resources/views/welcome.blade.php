@php
    use App\Models\Disaster;
    $disasters = Disaster::all();
@endphp

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <title>Distribution Map of Our Aids</title>
        <link rel="stylesheet" href="styles.css">
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" />

        <style>
        #map { height: 500px; width: 100%; }
        body {
                display: flex;
            }
            .sidebar {
                width: 250px;
                height: 100vh;
                position: fixed;
                left: 0;
                top: 0;
                background: #1b1b18;
                color: white;
                padding-top: 20px;
                box-shadow: 2px 0 5px rgba(0, 0, 0, 0.2);
            }
            .sidebar h3 {
                text-align: center;
                margin-bottom: 20px;
                font-size: 20px;
            }
            .sidebar ul {
                list-style: none;
                padding: 0;
            }
            .sidebar ul li {
                padding: 10px 20px;
                border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            }
            .sidebar ul li a {
                text-decoration: none;
                color: white;
                display: block;
                transition: 0.3s;
            }
            .sidebar ul li a:hover {
                background: rgba(255, 255, 255, 0.2);
            }
            main {
                margin-left: 150px;
                padding: 20px;
                width: calc(100% - 260px);
            }
            #map {
                height: 500px;
                width: 100%;
            }
        </style>
    </head>
    <body class="bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] flex p-6 lg:p-8 items-center lg:justify-center min-h-screen flex-col">
        <header class="w-full lg:max-w-4xl max-w-[335px] text-sm mb-6 not-has-[nav]:hidden">
            
        </header>

        <body>
    <div class="container">
        <nav class="sidebar">
    <div class="logo-container" style="text-align: center; padding: 0px;">
        <img src="{{ asset('images/1.png') }}" alt="Logo" style="width: 150px; height: auto;">
    </div>

        
            <!-- <h3>MENU</h3> -->
            <ul>
                <li><a href="">HOME</a></li>
                <li><a href="{{ route('admin.login') }}">Admin Page</a></li>
                <li><a href="">About Humanitarian Logistics</a></li>
                <li><a href="">CoE Humanitarian AI</a></li>
                <li><a href="">Journal IJCSHAI</a></li>
                <li><a href="{{ route('about') }}">About Us</a></li>
                @if (Route::has('login'))
                <li>
                    @auth
                        <a href="{{ url('/dashboard') }}">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}">Log in</a>
                </li>
                <li>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>  
                        @endif
                    @endauth
                </li>
            @endif
            </ul>
            
            </div>
            <div class="auth-links">
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}">Log in</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                @endif
            </div>
        </nav>
        <main>
            <h2>Distribution Map of our Aids</h2>
            <div id="map"></div>
        </main>
    </div>

    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"></script>
    <script>
    var map = L.map('map').setView([-2.5489, 118.0149], 5); // Indonesia

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; OpenStreetMap contributors'
    }).addTo(map);

    var locations = @json($disasters);

    locations.forEach(location => {
        const marker = L.marker([location.latitude, location.longitude]).addTo(map);
        marker.bindPopup(
            `Location: ${location.location}<br>
             Disaster: ${location.disaster}<br>
             Status: ${location.description}`
        );
        marker.on('mouseover', function(e) {
            this.openPopup();
        });
        marker.on('mouseout', function(e) {
            this.closePopup();
        });
        marker.on('click', function(e) {
            window.location.href = `/disaster/${location.id}/aids`;
        });
    });

    </script>

        @if (Route::has('login'))
            <div class="h-14.5 hidden lg:block"></div>
        @endif
    </body>
</html>