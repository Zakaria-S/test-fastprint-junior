<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <title>Tabel CRUD</title>
</head>
<body>
    <a href="/produk/create" class="btn btn-primary mb-1">Tambah Data</a>
    <table class="table">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Nama Produk</th>
                <th>Harga</th>
                <th>Kategori</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($produk_tersedia as $produk)
            <tr>
                <td>{{$loop->index + 1}}</td>
                <td>{{$produk->nama_produk}}</td>
                <td>Rp{{number_format($produk->harga, 2, ",", ".")}}</td>
                <td>{{App\Models\Kategori::where('id_kategori', $produk->kategori_id)->first()->nama_kategori}}</td>
                <td>{{App\Models\Status::where('id_status', $produk->status_id)->first()->nama_status}}</td>
                <td>
                    <a href="/produk/{{$produk->id_produk}}/edit" class="btn btn-warning">Edit</a>
                    <form method="post" action="/produk/{{$produk->id_produk}}" accept-charset="UTF-8" class="d-inline">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-danger"
                            onclick="return confirm ('Confirm delete?')">
                            Hapus
                            <div class="ripple-container"></div>
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>