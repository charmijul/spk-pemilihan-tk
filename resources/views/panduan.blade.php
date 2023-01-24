@extends('layout.main')

@section('container')
    <link rel="stylesheet" href="/css/guide.css">
    <article class="mt-10 mb-10">
        <p fs-4>&emsp;Selamat Datang di Website SPK Pemilihan TK, website ini dibangun dengan tujuan untuk membantu para
            orang
            tua
            dalam memilih TK yang cocok atau sesuai dengan kriteria keinginan mereka. Pada saat ini website ini hanya
            beroperasi untuk wilayah Kecamatan Loa Janan Kabupaten Kutai Kartanegara, dengan <a href="/datatk">37 data TK</a>
            berada pada wilayah
            tersebut yang akan menjadi alternatif pilihan para orang tua.</p>
        <br>
        <p fs-4>&emsp;Adapun <a href="/kriteria">kriteria</a> yang menjadi patokan pada sistem ini akan di boboti berdasarkan urutan prioritas
            pengguna
            dengan nilai bobot setiap kriteria didapat dari hasil perhitungan menggunakan metode <a href="https://www.google.com/search?q=metode+roc&rlz=1C1CHBD_enID1036ID1036&oq=metode+ROC">Rank Order
                Centroid (ROC)</a>
            dan alternatif pilihan akan diurutkan berdasarkan nilai yang didapat dari perhitungan menggunakan metode Metode
            <a href="https://www.google.com/search?q=metode+waspas&rlz=1C1CHBD_enID1036ID1036&oq=metode+WASPAS">Weighted Aggregated Sum Product Assesment (WASPAS)</a>.
        </p>
        <br>
        <p fs-4>
            Langkah-langkah penggunaan sistem : <br>
            &emsp; 1. Pengguna diminta untuk menunjukkan titik koordinat lokasinya pada Mapbox yang disediakan.
        </p>
        <center><img src="img/step-1.png" alt="" width="75%" class="mt-3 mb-3"></center>
        <p fs-4>&emsp; 2. Pengguna diminta untuk mengurutkan kriteria berdasarkan prioritas atau patokan mereka dalam
            memilih TK.</p>
        <center><img src="img/step-2.png" alt="" width="50%" class="mt-3 mb-3"></center>
        <p fs-4>&emsp; 3. Sistem akan menampilkan rekomendasi TK dan user dapat melihat detail informasi TK dengan mengklik
            nama TK.</p>
            <center><img src="img/step-3.png" alt="" width="50%" class="mt-3 mb-3"></center>
            <p fs-4>&emsp; 4. Pada page datail informasi TK user dapat melihat beberapa informasi yang telah tersedia dan user
                dapat mengklik kelurahan TK tersebut untuk melihat alamat lengkap TK dan lokasi TK tersebut pada google maps.
            </p>
            <center><img src="img/step-4.png" alt="" width="50%" class="mt-3 mb-3"></center>
            <br>
        <p fs-4>&emsp; demikian website ini dibangun dengan harapn dapat membantu para orang tua dalam memilih TK yang cocok atau sesuai dengan kriteria keinginan mereka.</p>
        <br>
        <center><a href="/map"><button class="btn-start fs-4 mb-3">Mulai</button></a></center>
    </article>
    <br>
@endsection
