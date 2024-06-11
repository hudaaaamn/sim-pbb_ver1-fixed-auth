<!-- resources/views/your_view.blade.php -->

@extends('layouts.app') {{-- Assuming you have a layout file --}}

@section('title', 'DAFTAR BIAYA KOMPONEN BANGUNAN ( DBKB ) TAHUN ' . $tahun)

@section('content')

<?php
    $nomor_laporan = [
        '1.1' => 'Perumahan',
        '1.2' => 'Kantor, Apotik, Toko, Pasar, Ruko, Restoran, Hotel, Wisma, Gedung Pemerintah',
        '1.3' => 'Rumah Sakit',
        '1.4' => 'Bengkel/Gudang/Pertanian',
        '1.5' => 'Pabrik',
        '1.6' => 'Kantor',
        '1.7' => 'Pertokoan',
        '1.8' => 'Rumah Sakit',
        '1.9' => 'Olah Raga',
        '1.10' => 'Hotel Non Resort',
        '1.11' => 'Hotel Resort',
        '1.12' => 'Parkir',
        '1.13' => 'Apartemen',
        '1.14' => 'Sekolah',
        '1.15' => 'Mezanin',
        '1.16' => 'Kanopi',
        '1.17' => 'Daya Dukung Lantai',
        '1.18' => 'Tangki Dibawah Tanah',
        '1.19' => 'Tangki Diatas Tanah',
        '2.1' => 'Air Conditioner (AC)',
        '2.2' => 'Boiler',
        '2.3' => 'Kolam Renang',
        '2.4' => 'Perkerasan',
        '2.5' => 'Lapangan Tenis',
        '2.6' => 'Lift',
        '2.7' => 'Tangga Berjalan/ESC',
        '2.8' => 'Pagar',
        '2.9' => 'Proteksi Api',
        '2.10' => 'Saluran Pes. PABX',
        '2.11' => 'Sumur Artesis',
        '2.12' => 'Listrik/KVA',
        '3.1' => 'ATAP',
        '3.2' => 'DINDING',
        '3.3' => 'LANTAI',
        '3.4' => 'LANGIT-LANGIT',
    ];
?>

<center><h3>DAFTAR BIAYA KOMPONEN BANGUNAN ( DBKB ) <br />TAHUN {{ $tahun }}</h3></center>
<table class="table table-bordered table-condensed">
    <thead>
    <tr>
        <th style="text-align:center">LUAS/TYPE/<br />VOL./LBR BTG</th>
        <th style="text-align:center">LANTAI/<br />TINGGI KLM</th>
        <th style="text-align:center">NILAI <br />(RP. 1.000,-)</th>
    </tr>
    <tr>
        <th style="text-align:center">(1)</th>
        <th style="text-align:center">(2)</th>
        <th style="text-align:center">(3)</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($data_std as $nomor => $data_nomor)
        <tr><th colspan="4">{{ $nomor." ".$nomor_laporan[$nomor] }}</th></tr>
        @foreach ($data_nomor as $row)
            <tr>
                <td align="center">{{ number_format($row['L_MIN'],'0',',','.')." s.d. ".number_format($row['L_MAX'],'0',',','.') }}</td>
                <td align="center">{{ number_format($row['T_MIN'],'0',',','.')." s.d. ".number_format($row['T_MAX'],'0',',','.') }}</td>
                <td align="right">{{ number_format($row['NILAI'],'0',',','.') }}</td>
            </tr>
        @endforeach
    @endforeach
    </tbody>
</table>

<!-- ... (continue the rest of your Blade code) -->

@endsection
