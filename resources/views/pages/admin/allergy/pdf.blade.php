<html>

<head>
    <title>Daftar Alergi Mahasiswa</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style type="text/css">
        table tr td,
        table tr th {
            font-size: 9pt;
        }
    </style>
</head>

<body>
    <h5 class="text-center">Daftar Alergi Mahasiswa</h5>
    <h6 class="text-center">Kantin IT Del</h6>
    <table class="table table-bordered table-sm">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>NIM</th>
                <th>Prodi</th>
                <th>Alergi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($report as $item)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$item->user->name}}</td>
                <td>{{$item->user->nim}}</td>
                <td>{{$item->user->prodi}}</td>
                <td>{{$item->allergy->name}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <table class="table table-bordered table-sm" style="width: 40%">
        <thead>
            <tr>
                <th colspan="2" style="text-align: center">Rincian</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Alergi Cumi-cumi</td>
                <td style="text-align: center">{{$report->where('allergy_id', 1)->count()}}</td>
            </tr>
            <tr>
                <td>Alergi Ikan teri/ikan asin</td>
                <td style="text-align: center">{{$report->where('allergy_id', 2)->count()}}</td>
            </tr>
            <tr>
                <td>Alergi Udang</td>
                <td style="text-align: center">{{$report->where('allergy_id', 3)->count()}}</td>
            </tr>
            <tr>
                <td>Alergi Telur</td>
                <td style="text-align: center">{{$report->where('allergy_id', 4)->count()}}</td>
            </tr>
            <tr>
                <td>Alergi Tahu-tempe</td>
                <td style="text-align: center">{{$report->where('allergy_id', 5)->count()}}</td>
            </tr>
            <tr>
                <td>Alergi Ikan Laut</td>
                <td style="text-align: center">{{$report->where('allergy_id', 6)->count()}}</td>
            </tr>
            <tr>
                <td>Total Data Alergi</td>
                <td style="text-align: center">{{$report->count()}}</td>
            </tr>
        </tbody>
    </table>
</body>

</html>