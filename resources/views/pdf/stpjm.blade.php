<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>STPJM PDF</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 20px;
        }
        h1 {
            text-align: center;
            font-size: 24px;
            margin-bottom: 20px;
        }
        .content {
            margin-bottom: 20px;
        }
        .details {
            margin-top: 20px;
            margin-bottom: 20px;
        }
        .details p {
            margin: 5px 0;
        }
        .signature {
            margin-top: 40px;
            text-align: right;
        }
        .signature p {
            margin: 0;
        }
    </style>
</head>
<body>
    <h1>SURAT PERNYATAAN TANGGUNG JAWAB MUTLAK</h1>

    <div class="content">
        <p>Pada hari ini Kamis, tanggal Tiga Puluh Satu bulan Oktober tahun Dua Ribu Dua Puluh Empat selaku pejabat yang bertanggungjawab mengesahkan Daftar Perhitungan Penilaian TP PNS untuk bulan Oktober tahun Dua Ribu Dua Puluh Empat, atas nama Pegawai Negeri Sipil:</p>

        <div class="details">
            <p><strong>Nama:</strong> {{ $record->user->name ?? 'N/A' }}</p>
            <p><strong>NIP:</strong> {{ $record->user->detailPegawai->nip ?? 'N/A' }}</p>
            <p><strong>Pangkat/Golongan:</strong> {{ $record->user->detailPegawai->pangkat->name ?? 'N/A' }}</p>
            <p><strong>Jabatan:</strong> {{ $record->user->detailPegawai->jabatan->name ?? 'N/A' }}</p>
            <p><strong>Unit Kerja:</strong> {{ $record->user->detailPegawai->unit_kerja ?? 'N/A' }}</p>
        </div>

        <p>Dengan ini menyatakan bahwa Daftar Perhitungan Pembayaran TP PNS yang telah disahkan adalah benar adanya, sesuai dengan realisasi perhitungan aspek Produktivitas Kerja, Kedisiplinan Kehadiran PNS dan pemenuhan kewajiban PNS, sesuai Peraturan Bupati Muna Barat Nomor 5 tahun 2024 tentang Perubahan Kedua atas Peraturan Bupati Muna Barat Nomor 33 tahun 2022 tentang Pemberian Tambahan Penghasilan Aparatur Sipil Negara di Lingkungan Pemerintah Kabupaten Muna Barat.</p>

        <p>Jika terdapat kekeliruan di dalam daftar dan perhitungannya, saya bersedia menanggung segala konsekuensi yang timbul akibat terjadinya kesalahan tersebut, sesuai ketentuan yang berlaku.</p>

        <p>Demikian Surat Pernyataan Tanggungjawab Mutlak ini saya buat, untuk dipergunakan sebagaimana mestinya.</p>
    </div>

    <div class="signature">
        <p>Laworo, 31 Oktober 2024</p>
        <p>"Kepala Dinas Pariwisata dan Ekonomi Kreatif Kabupaten Muna Barat"</p>
        <br>
        <p>LAODE ALI KADIRUN, S.Pd., MP</p>
        <p>Pembina Utama Muda, Gol IV/c</p>
        <p>NIP. 19701231 199702 1 017</p>
    </div>
</body>
</html>
