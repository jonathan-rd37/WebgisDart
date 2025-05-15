@extends('layouts.app') {{-- Jika menggunakan layout utama, pastikan ini ada --}}

@section('content')
<style>
    .background-section {
         /* Tambahkan sedikit blur */
        position: relative;
        width: 100%;
        height: 550px; /* Sesuaikan tinggi */
        background: url("{{ asset('images/AboutBackground.jpg') }}") no-repeat center center;
        background-size: cover;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
    }

    /* Overlay untuk meredupkan gambar */
    .background-section::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5); /* Warna hitam transparan */
        z-index: 1;
    }

    .background-section p {
        position: relative;
        color: white;
        text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.7);
        font-size: 24px;
        font-weight: bold;
        z-index: 2;
    }
    .background-wrapper {
        position: relative;
        background-color: #7F7B75;
        width: 100%;
        height: 550px;
    }

    .background-section {
        filter: blur(3px); /* Tambahkan blur hanya ke latar belakang */
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: url("{{ asset('images/AboutBackground.jpg') }}") no-repeat center center;
        background-size: cover;
        z-index: 1;
    }

    .content-overlay {
        position: absolute;
        top: 40%; /* Geser lebih ke atas */
        left: 50%;
        transform: translate(-50%, -50%);
        color: white;
        text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.7);
        font-size: 24px;
        font-weight: bold;
        z-index: 2;
        text-align: center;
    }
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;700&display=swap');

    body {
        font-family: 'Poppins', sans-serif;
    }

    .content-overlay h1 {
    font-family: 'Poppins', sans-serif;
    font-weight: 400; /* Tambahkan ketebalan */
    font-size: 36px; /* Ukuran lebih besar */
    color: #666; /* Pastikan tetap terlihat */
    margin-bottom: 10px; /* Sedikit jarak bawah */
}

    .content-overlay h2 {
        font-family: 'Poppins', sans-serif;
        font-weight: 1000;
        font-size: 28px;
    }

    .content-overlay p {
        font-family: 'Poppins', sans-serif;
        font-weight: 400;
        font-size: 20px;
    }

    .content-overlay blockquote {
        font-family: 'Poppins', sans-serif;
        font-weight: 400;
        font-size: 14px;
        transform: skew(-10deg);
    }
</style>

<div class="background-wrapper">
    <div class="background-section"></div>
    <div class="content-overlay">
        <h1>About Us</h1><br>
        <h2>"Teknologi Untuk Kemanusiaan"</h2>
        <p>Kami, Web GIS untuk pemantauan bencana dan distribusi bantuan secara efektif.</p><br>
        <blockquote>"We cannot stop natural disasters, but we can arm ourselves with knowledge: so many lives wouldn't have to be lost if there was enough disaster preparedness."<br> - Petra Nemcova</blockquote>
    </div>

@endsection