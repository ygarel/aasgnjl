<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Surat Pernyataan Tidak Terlambat</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .container {
            max-width: 100%;
            margin: 0 auto;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        p {
            text-align: justify;
            line-height: 1.6;
        }

        .meta-info {
            margin-top: 20px;
        }

        table {
            width: 20%;
        }

        table td {
            padding: 5px;
        }

        .ttl {
            float: right;
            right: 10px
        }

        .ortu {
            float: right;
            margin-bottom: 15px;
            margin-left: 150px
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>SURAT PERNYATAAN <br> TIDAK AKAN DATANG TERLAMBAT KESEKOLAH</h2>
        <br>
        <br>
        <p>Yang bertanda tangan dibawah ini:</p>

        <div class="meta-info">
            <table>
                <tr>
                    <td>Nis</td>
                    <td>:</td>
                    @foreach($students as $student)
                        <td>{{ $student->nis }}</td>
                    @endforeach
                </tr>
                <tr>
                    <td>Nama</td>
                    <td>:</td>
                    @foreach($students as $student)
                        <td>{{ $student->name }}</td>
                    @endforeach
                </tr>
                <tr>
                    <td>Rombel</td>
                    <td>:</td>
                    @foreach ($rombels as  $rombel)
                        @if ($rombel->id == $student->rombel_id)
                            <td>
                                {{ $rombel->rombel }}
                            </td>
                        @endif
                    @endforeach
                </tr>
                <tr>
                    <td>Rayon</td>
                    <td>:</td>
                    @foreach ($rayons as  $rayon)
                    @if ($rayon->id == $student->rayon_id)
                        <td>
                            {{ $rayon->rayon }}
                        </td>
                        @endif
                    @endforeach
                </tr>
            </table>
        </div>
        
        <p>Dengan ini menyatakan bahwa saya telah melakukan pelanggaran tata tertib sekolah, yaitu terlambat datang ke sekolah sebanyak 3 kali yang mana hal tersebut termasuk kedalam pelanggaran kedisiplinan. Saya berjanji tidak akan terlambat datang ke sekolah lagi. Apabila saya terlambat </p>
        <br>
        <p>Demikian surat pernyataan terlambat ini saya buat dengan penuh penyesalan.</p>
        <br>
        <br>
        <p class="ttl">Bogor, <br> Orang Tua/Wali Peserta Didik</p>
        <br>
        <br>
        <p>Peserta Didik</p>
        <br>
        <br>
        <p>(  )<span class="ttl">(............................)</span></p>
        <br>
        <br>
        <p>Pembimbing Siswa, <span class="ttl">Kesiswaan,</span></p>
        <br>
        <br>
        <p>(PS)<span class="ttl">(............................)</span></p>
        
    </div>
</body>
</html>
