<html>

<head>
    <title>Cetak blanko KK</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <style type="text/css">
        body {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 12px;
        }

        @page {
            margin-top: 10px;
            margin-right: 32px;
            margin-bottom: 0px;
            margin-left: 32px;
        }

        table,
        td,
        th {
            border: 1px solid black;
        }

        .no-border {
            border: none;
        }

        table {
            border-collapse: collapse;
            margin-bottom: 1rem;
            width: 100%
        }

        th {
            height: 20px;
            text-align: center;
        }

        .center {
            text-align: center;
        }

        .title {
            font-size: 24px;
        }

        .judul-kk {
            width: 200px;
        }

        .text-center {
            text-align: center;
        }

        .w50 {
            width: 50%;
        }
    </style>
</head>

<body style="text-transform: uppercase">
    <header class="center">
        <p>
            <b class="title">formulir kartu keluarga</b><br>
            <b class="title">no. {{$data->number}}</b><br>
        </p>
    </header>
    <table>
        <tr>
            <td class="judul judul-kk"><b>Nama Kepala Keluarga</b></td>
            <td>: {{$data->head_of_family}}</td>
            <td class="judul judul-kk"><b>Desa/Kelurahan</b></td>
            <td>: {{$data->village}}</td>
        </tr>
        <tr>
            <td class="judul judul-kk"><b>alamat</b></td>
            <td>: {{$data->address}}</td>
            <td class="judul judul-kk"><b>Kecamatan</b></td>
            <td>: {{$data->district}}</td>
        </tr>
        <tr>
            <td class="judul judul-kk"><b>RT/RW</b></td>
            <td>: {{$data->rt_rw}}</td>
            <td class="judul judul-kk"><b>kabupaten/kota</b></td>
            <td>: {{$data->city}}</td>
        </tr>
        <tr>
            <td class="judul judul-kk"><b>kode pos</b></td>
            <td>: {{$data->postal_code}}</td>
            <td class="judul judul-kk"><b>provinsi</b></td>
            <td>: {{$data->province}}</td>
        </tr>
    </table>


    <table>
        <tr>
            <th width="30px">No</th>
            <th>nama lengkap</th>
            <th>nik</th>
            <th>jenis kelamin</th>
            <th>tempat lahir</th>
            <th>tanggal lahir</th>
            <th>agama</th>
            <th>pendidikan</th>
            <th>jenis pekerjaan</th>
            <th>golongan darah</th>
        </tr>
        @foreach ($members as $item)
        <tr>
            <td class="text-center">{{$loop->iteration}}</td>
            <td>{{$item->fullname}}</td>
            <td>{{$item->nik}}</td>
            <td>{{$item->gender->name}}</td>
            <td>{{$item->birthplace}}</td>
            <td>{{$item->birthdate}}</td>
            <td>{{$item->religion}}</td>
            <td>{{$item->education}}</td>
            <td>{{$item->profession}}</td>
            @if (!$item->blood_type)
            <td class="text-center">-</td>
            @else
            <td class="text-center">{{$item->blood_type}}</td>
            @endif
        </tr>
        @endforeach
    </table>

    <table>
        <tr>
            <th width="30px" rowspan="2">No</th>
            <th rowspan="2">status perkawinan</th>
            <th rowspan="2">tanggal perkawinan</th>
            <th rowspan="2">status hubungan dalam keluarga</th>
            <th rowspan="2">kewarganegaraan</th>
            <th colspan="2">dokumen imigrasi</th>
            <th colspan="2">nama orang tua</th>
        </tr>
        <tr>
            <th>no passport</th>
            <th>no kitap</th>
            <th>ayah</th>
            <th>ibu</th>
        </tr>
        @foreach ($members as $item)
        <tr>
            <td class="text-center">{{$loop->iteration}}</td>
            <td>{{$item->marital_status->name}}</td>
            <td>{{$item->marriage_date}}</td>
            <td>{{$item->status_in_family}}</td>
            <td>{{$item->citizenship}}</td>
            @if (!$item->passport)
            <td class="text-center">-</td>
            @else
            <td>{{$item->passport}}</td>
            @endif
            @if (!$item->kitap)
            <td class="text-center">-</td>
            @else
            <td>{{$item->kitap}}</td>
            @endif
            <td>{{$item->father_name}}</td>
            <td>{{$item->mother_name}}</td>
        </tr>
        @endforeach
    </table>

    <table class="text-center no-border">
        <tr>
            <td class="w50 no-border">Mengetahui</td>
            <td class="w50 no-border">Magetan, {{$data->created_at->isoFormat('d MMMM Y')}}</td>
        </tr>
        <tr>
            <td class="w50 no-border">{{$data->signature->position}}</td>
            <td class="w50 no-border">pemohon kartu keluarga</td>
        </tr>
        <tr>
            <th class="w50 no-border" style="height: 200px"><u>{{$data->signature->name}}</u> </th>
            <th class="w50 no-border" style="height: 200px"><u>{{$data->head_of_family}}</u></th>
        </tr>
    </table>
</body>

</html>
