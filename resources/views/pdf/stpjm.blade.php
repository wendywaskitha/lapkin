<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>STPJM PDF</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 20px;
        }

        h1 {
            text-align: center;
            font-size: 18px;
            margin-bottom: 20px;
        }

        .content {
            margin-bottom: 20px;
        }

        .value {
            margin-left: 10px;
            /* Jarak antara titik dua dan nilai */
            margin-top: 5px;
            Jarak antara label dan nilai display: inline-block;
            /* Membuat span menjadi inline-block agar margin-top berfungsi */
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
    {{-- <div class="kop-surat">
        <div class="logo">
            <img src="{{ public_path('storage/logo.png') }}" alt="Logo">
        </div>
        <div class="info">
            <h1>PEMERINTAH KABUPATEN MUNA BARAT</h1>
            <p><strong>{{ $record->unitKerja->name }}</strong></p>
            <p>{{ $record->unitKerja->alamat }}</p>
            <p>Email: info@instansi.com</p>
            <hr>
        </div>
    </div> --}}

    <table style="width: 100%; border-collapse: collapse; margin-top: -50px;">
        <tbody>
            <tr>
                <td style="width: 100px; vertical-align: middle; text-align: center;">
                    <img src="{{ public_path('storage/logo.png') }}" alt="Logo"
                        style="max-width: 100%; max-height: 100px;">
                </td>
                <td style="vertical-align: middle; padding-left: 20px; text-align: center;">
                    <h1 style="margin: 0; line-height: 1.2;">PEMERINTAH KABUPATEN MUNA BARAT</h1>
                    <p style="margin: 0; line-height: 1.2;"><strong>{{ $record->unitKerja->name }}</strong></p>
                    <p style="margin: 0; line-height: 1.2;"><small>{{ $record->unitKerja->alamat }}</small></p>
                    <p style="margin: 0; line-height: 1.2;">Email: info@instansi.com</p>
                </td>
            </tr>
        </tbody>
    </table>
    <hr>
    <h1><u>SURAT PERNYATAAN TANGGUNG JAWAB MUTLAK</u></h1>

    <div class="content">

        @php
            use Carbon\Carbon;

            // Fungsi untuk mengonversi angka ke kata
            function angkaKeKata($angka)
            {
                $kataAngka = [
                    1 => 'satu',
                    2 => 'dua',
                    3 => 'tiga',
                    4 => 'empat',
                    5 => 'lima',
                    6 => 'enam',
                    7 => 'tujuh',
                    8 => 'delapan',
                    9 => 'sembilan',
                    10 => 'sepuluh',
                    11 => 'sebelas',
                    12 => 'dua belas',
                    13 => 'tiga belas',
                    14 => 'empat belas',
                    15 => 'lima belas',
                    16 => 'enam belas',
                    17 => 'tujuh belas',
                    18 => 'delapan belas',
                    19 => 'sembilan belas',
                    20 => 'dua puluh',
                    30 => 'tiga puluh',
                    40 => 'empat puluh',
                    50 => 'lima puluh',
                    60 => 'enam puluh',
                    70 => 'tujuh puluh',
                    80 => 'delapan puluh',
                    90 => 'sembilan puluh',
                    100 => 'seratus',
                    1000 => 'seribu',
                ];

                // Menangani tahun 2000-2999
                if ($angka >= 2000 && $angka < 3000) {
                    $tahun = $angka - 2000; // Mengambil sisa tahun setelah 2000
                    $puluhan = floor($tahun / 10); // Mendapatkan puluhan
                    $sisa = $tahun % 10; // Mendapatkan sisa
                    return 'dua ribu' .
                        ($puluhan ? ' ' . $kataAngka[$puluhan * 10] : '') .
                        ($sisa ? ' ' . $kataAngka[$sisa] : '');
                }

                // Menangani angka 1-100
                if ($angka <= 100) {
                    return $kataAngka[$angka] ?? '';
                }

                // Menangani angka 21-99
                if ($angka < 100) {
                    $puluhan = floor($angka / 10) * 10; // Mendapatkan puluhan
                    $sisa = $angka % 10; // Mendapatkan sisa
                    return $kataAngka[$puluhan] . ($sisa ? ' ' . $kataAngka[$sisa] : '');
                }

                // Menangani angka 100-999
                if ($angka < 1000) {
                    $ratusan = floor($angka / 100);
                    $sisa = $angka % 100;
                    return $kataAngka[$ratusan] . ' ratus' . ($sisa ? ' ' . angkaKeKata($sisa) : '');
                }

                // Menangani angka 1000-1999
                if ($angka < 2000) {
                    return 'seribu ' . angkaKeKata($angka - 1000);
                }

                // Menangani angka 2000-9999
                if ($angka < 10000) {
                    $ribuan = floor($angka / 1000);
                    $sisa = $angka % 1000;
                    return $kataAngka[$ribuan] . ' ribu' . ($sisa ? ' ' . angkaKeKata($sisa) : '');
                }

                return $angka; // Kembalikan angka jika tidak ada konversi
            }
            $tanggal = \Carbon\Carbon::parse($record->tanggal);
        @endphp
        <p style="text-align: justify;">Pada hari ini {{ \Carbon\Carbon::parse($record->tanggal)->translatedFormat('l') }},
            tanggal {{ angkaKeKata($tanggal->day) }}
            bulan {{ \Carbon\Carbon::parse($record->tanggal)->translatedFormat('F') }}
            tahun {{ angkaKeKata($tanggal->year) }}
            selaku pejabat yang bertanggungjawab mengesahkan Daftar Perhitungan Penilaian TP PNS untuk bulan
            {{ \Carbon\Carbon::parse($record->tanggal)->translatedFormat('F') }}
            tahun {{ angkaKeKata($tanggal->year) }},
            atas nama Pegawai Negeri Sipil:</p>

        <div>
            <table class="w-full text-sm">
                <tr>
                    <td class="w-3/4">
                        Nama
                    </td>
                    <td class="w-3/4 pl-4"> <!-- Menambahkan padding kiri -->
                        : <span class="value">{{ $record->user->name ?? 'N/A' }}</span>
                    </td>
                </tr>
                <tr>
                    <td class="pl-10">
                        NIP
                    </td>
                    <td class="pl-4"> <!-- Menambahkan padding kiri -->
                        : <span class="value">{{ $record->user->detailPegawai->nip ?? 'N/A' }}</span>
                    </td>
                </tr>
                <tr>
                    <td class="pl-10">
                        Pangkat/Golongan
                    </td>
                    <td class="pl-4"> <!-- Menambahkan padding kiri -->
                        : <span class="value">{{ $record->user->detailPegawai->pangkat->name ?? 'N/A' }}</span>
                    </td>
                </tr>
                <tr>
                    <td class="pl-10">
                        Jabatan
                    </td>
                    <td class="pl-4"> <!-- Menambahkan padding kiri -->
                        : <span class="value">{{ $record->user->detailPegawai->jabatan->name ?? 'N/A' }}</span>
                    </td>
                </tr>
                <tr>
                    <td class="pl-10">
                        Unit Kerja
                    </td>
                    <td class="pl-4"> <!-- Menambahkan padding kiri -->
                        : <span class="value">{{ ucwords(strtolower($record->unitKerja->name ?? 'N/A')) }}</span>
                    </td>
                </tr>
            </table>
        </div>

        <p style="text-align: justify;">Dengan ini menyatakan bahwa Daftar Perhitungan Pembayaran TP PNS yang telah disahkan adalah benar adanya,
            sesuai
            dengan realisasi perhitungan aspek Produktivitas Kerja, Kedisiplinan Kehadiran PNS dan pemenuhan kewajiban
            PNS,
            sesuai Peraturan Bupati Muna Barat Nomor 5 tahun 2024 tentang Perubahan Kedua atas Peraturan Bupati Muna
            Barat
            Nomor 33 tahun 2022 tentang Pemberian Tambahan Penghasilan Aparatur Sipil Negara di Lingkungan Pemerintah
            Kabupaten Muna Barat.</p>

        <p style="text-align: justify;">Jika terdapat kekeliruan di dalam daftar dan perhitungannya, saya bersedia menanggung segala konsekuensi yang
            timbul akibat terjadinya kesalahan tersebut, sesuai ketentuan yang berlaku.</p>

        <p style="text-align: justify;">Demikian Surat Pernyataan Tanggungjawab Mutlak ini saya buat, untuk dipergunakan sebagaimana mestinya.</p>
    </div>

    <table style="width: 100%;">
        <tbody>
            <tr>
                <td style="width: 20%;"></td> <!-- Empty cell for spacing -->
                <td style="width: 20%;"></td> <!-- Empty cell for spacing -->
                <td style="width: 60%; text-align: center; vertical-align: middle;">
                    <div class="signature" style="text-align: center;">
                        <p style="margin: 0; line-height: 1.2;">Laworo, {{ $record->tanggal->format('d F Y') }}</p>
                        <p style="margin: 0; line-height: 1.2;">{{ $record->tandaTangan->jabatan }}</p>
                        <br>
                        <br>
                        <br>
                        <p style="margin: 0; line-height: 1.2;"><strong><u>{{ $record->tandaTangan->name }}</u></strong></p>
                        <p style="margin: 0; line-height: 1.2;">{{ $record->tandaTangan->pangkat }}</p>
                        <p style="margin: 0; line-height: 1.2;">NIP. {{ $record->tandaTangan->nip }}</p>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</body>

</html>
