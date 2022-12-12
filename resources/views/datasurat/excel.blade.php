<?php
header('Content-type: application/vnd-ms-excel');
header('Content-Disposition: attachment; filename=Data Pegawai.xls');
?>

<table border="1">
    <thead>
        <tr>
            <th>No Surat</th>
            <th>No Agenda</th>
            <th>Asal Surat</th>
            <th>Perihal surat</th>
            <th>Klasifikasi Surat</th>
            <th>Sifat Surat</th>
            <th>Tanggal Surat</th>
            <th>Tanggal Terima</th>
            <th>Kabinet</th>
            <th>Kode Kabinet</th>
            <th>Jenis_surat</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($s as $i)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $i->no_surat}}</td>
                <td>{{ $i->no_agenda}}</td>
                <td>{{ $i->asal_surat}}</td>
                <td>{{ $i->perihal_surat}}</td>
                <td>{{ $i->nama_kategori}}</td>
                <td>{{ $i->sifat_surat}}</td>
                <td>{{ $i->tgl_surat}}</td>
                <td>{{ $i->tgl_terima}}</td>
                <td>{{ $i->nama_kabinet}}</td>
                <td>{{ $i->kode_kabinet}}</td>
            </tr>
        @endforeach

    </tbody>
</table>
