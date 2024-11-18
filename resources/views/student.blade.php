<table>
    <tr>
        <th>No</th>
        <th>Nama Lengkap</th>
        <th>Jenis Kelamin</th>
        <th>Golongan Darah</th>
    </tr>
    @foreach ($data as $row)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $row->nama_lengkap }}</td>
        <td>{{ $row->jenis_kelamin }}</td>
        <td>{{ $row->golongan_darah }}</td>
    </tr>
    @endforeach
</table>