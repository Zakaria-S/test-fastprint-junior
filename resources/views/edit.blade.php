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
    <form method="post" action="/produk/{{$produk->id_produk}}" class="mt-4 d-flex flex-column align-items-center justify-content-center">
        @method('PUT')
        @csrf
        <div class="form-group mb-4">
            <label for="nama_produk">Nama Produk</label>
            <input name="nama_produk" type="text" class="form-control" placeholder="Masukkan nama produk" value="{{$produk->nama_produk}}">
        </div>
        <div class="form-group mb-4">
            <label for="harga">Harga</label>
            <input name="harga" type="number" class="form-control" placeholder="Masukkan harga" value="{{$produk->harga}}">
        </div>
        <div class="form-group mb-4">
            <label for="kategori">Kategori</label>
            <select name="kategori_id" class="form-control">
                @foreach($kategoris as $kategori)
                    <option value="{{$kategori->id_kategori}}" {{$produk->kategori_id == $kategori->id_kategori ? 'selected' : ''}}>{{$kategori->nama_kategori}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group mb-4">
            @foreach($statuses as $status)
                <input name="status_id" type="radio" value="{{$status->id_status}}" class="form-check-control" {{$produk->status_id == $status->id_status ? 'checked' : ''}}>
                <label for="status_id">{{$status->nama_status}}</label>
                <br>
            @endforeach
        </div>
        <button type="submit" class="btn btn-primary">Tambahkan</button>
    </form>
</body>