<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

        body {
            display: flex;
            justify-content: center;
            flex-direction: column;
            align-items: center;
            height: 100vh;
            font-family: 'Poppins', sans-serif;
            background-image: url('https://i.pinimg.com/originals/72/0c/c4/720cc43d757ee638ad5054a05220fafe.gif');
            background-repeat: no-repeat;
            background-size: cover;
        }

        .form-container {
            max-width: 400px;
            padding: 20px;
            background: rgba( 255, 255, 255, 0.25 );
            box-shadow: 0 8px 32px 0 rgba( 31, 38, 135, 0.37 );
            backdrop-filter: blur( 4px );
            -webkit-backdrop-filter: blur( 4px );
            border-radius: 10px;
            border: 1px solid rgba( 255, 255, 255, 0.18 );
        }

        label{
            font-weight: 700;
        }


    </style>
</head>
<body>
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

    @if($errors->any())
        <div class="alert alert-danger">
            <strong>Perhatian</strong>
            <br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="form-container">
        <h1 class="text-center">FORM SISWA</h1>
        <form action="{{ url('siswa', @$siswa->id) }}" method="POST">
            @csrf

            @if(!empty(@$siswa)){
                @method('PATCH')
            }
            @endif
            <div class="mb-3">
                <label for="nis" class="form-label">NIS</label>
                <input type="text" class="form-control" name="nis" id="nis" value="{{ old('nis', @$siswa->nis) }}">
            </div>
            <div class="mb-3">
                <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                <input type="text" class="form-control" name="nama_lengkap" id="nama_lengkap" value="{{ old('nama_lengkap', @$siswa->nama_lengkap) }}">
            </div>
            <div class="mb-3">
                <label class="form-label">Jenis Kelamin</label>
                <div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="jenis_kelamin" id="L" value="L" {{ old('jenis_kelamin', @$siswa->jenis_kelamin) == 'L' ? 'checked' : '' }}>
                        <label class="form-check-label" for="L">Laki - Laki</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="jenis_kelamin" id="P" value="P" {{ old('jenis_kelamin', @$siswa->jenis_kelamin) == 'P' ? 'checked' : '' }}>
                        <label class="form-check-label" for="P">Perempuan</label>
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label for="kelas" class="form-label">Kelas</label>
                <input type="text" class="form-control" name="kelas" id="kelas" value="{{ old('kelas', @$siswa->kelas) }}"">
            </div>
            <div class="mb-3">
                <label for="jurusan" class="form-label">Jurusan</label>
                <input type="text" class="form-control" name="jurusan" id="jurusan" value="{{ old('jurusan', @$siswa->jurusan) }}">
            </div>
            <div class="mb-3">
                <label for="golongan_darah" class="form-label">Golongan Darah</label>
                <select class="form-select" name="golongan_darah" id="golongan_darah" value="{{ old('golongan_darah') }}">
                    <option value="">Pilih Golongan Darah</option>
                    <option value="A" {{ old('golongan_darah', @$siswa->golongan_darah) == 'A' ? 'selected' : '' }}>A</option>
                    <option value="B" {{ old('golongan_darah', @$siswa->golongan_darah) == 'B' ? 'selected' : '' }}>B</option>
                    <option value="AB" {{ old('golongan_darah', @$siswa->golongan_darah) == 'AB' ? 'selected' : '' }}>AB</option>
                    <option value="O" {{ old('golongan_darah', @$siswa->golongan_darah) == 'O' ? 'selected' : '' }}>O</option>
                </select>
            </div>
            <button type="submit" class="btn btn-warning form-control">Simpan</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-BUoZyjzCg+tnOz4L+9tjJEMN4S+xBTxg3fTq3/a6wwzV5wq2JwFkZ5TCt0tX4iS5" crossorigin="anonymous"></script>
</body>
</html>
