<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Data Kelas</title>
</head>
<style>
    /* Import the font */
    @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

    /* Custom styles */
    body {
        font-family: 'Poppins', sans-serif;
        padding: 40px;
        
    }

    h1 {
        text-align: center;
        margin-bottom: 20px;
    }

    .alert {
        margin-bottom: 20px;
    }

    .table{
        background-color: #000;
        color: #fff;
        
    }
</style>
<body>
    
<h1>Daftar Kelas</h1>

@session('success')
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endsession

@session('error')
    <div class="alert alert-error">
        {{ session('error') }}
    </div>
@endsession

<a href="{{ url('/kelas/create') }}" class="btn btn-primary">
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
        <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
      </svg>
</a>
<table border="1" class="table table-striped table-hover">
    <tr class="table-dark">
        <td>No</td>
        <td>Nama Kelas</td>
        <td>Jurusan</td>
        <td>Lokasi Ruangan</td>
        <td>Wali Kelas</td>
        <td colspan="2">Aksi</td>
    </tr>
    @foreach ($jurusan as $row)
    <tr>
        <td>{{ isset($i) ? ++$i : $i = 1 }}</td>
        <td>{{ $row->nama_kelas }}</td>
        <td>{{ $row->jurusan }}</td>
        <td>{{ $row->lokasi_ruangan }}</td>
        <td>{{ $row->nama_wali_kelas }}</td>
        <td>
            <a href="{{ url('/kelas/edit/' . $row->id) }}" class="btn btn-success">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                    <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325"/>
                </svg>
            </a>
        </td>
        <td>
            <form action="{{ url('/kelas', $row->id ) }}" method="POST">
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-danger">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                        <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                      </svg>
                </button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-BUoZyjzCg+tnOz4L+9tjJEMN4S+xBTxg3fTq3/a6wwzV5wq2JwFkZ5TCt0tX4iS5" crossorigin="anonymous"></script>
</body>
</html>