@extends('layouts.master')
@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Detail Surat</h1>

        </div>
        <section class="section">

            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <img src="{{asset('image/file/'. $l->gambar)}}" alt="" class="img-fluid mt-5">
                        </div>
                        <div class="col-md-9 mt-5">
                            <table>
                                <tr>
                                    <th>No Surat</th>
                                    <th>&nbsp;&nbsp;:&nbsp;&nbsp;</th>
                                    <th>{{ $l->no_surat }}</th>
                                </tr>
                                <tr>
                                    <th>Tanggal Surat</th>
                                    <th>&nbsp;&nbsp;:&nbsp;&nbsp;</th>
                                    <th>{{ $l->tanggal_surat }}</th>
                                </tr>
                                <tr>
                                    <th>Tanggal Terima</th>
                                    <th>&nbsp;&nbsp;:&nbsp;&nbsp;</th>
                                    <th>{{ $l->tanggal_terima }}</th>
                                </tr>
                                <tr>
                                    <th>Asal Surat</th>
                                    <th>&nbsp;&nbsp;:&nbsp;&nbsp;</th>
                                    <th>{{ $l->asal_surat }}</th>
                                </tr>
                                <tr>
                                    <th>Perihal Surat</th>
                                    <th>&nbsp;&nbsp;:&nbsp;&nbsp;</th>
                                    <th>{{ $l->perihal_surat }}</th>
                                </tr>
                                <tr>
                                    <th>Keterangan</th>
                                    <th>&nbsp;&nbsp;:&nbsp;&nbsp;</th>
                                    <th>{{ $l->keterangan }}</th>
                                </tr>
                                <tr>
                                    <th>Jenis Surat</th>
                                    <th>&nbsp;&nbsp;:&nbsp;&nbsp;</th>
                                    <th>{{ $l->sifat_surat }}</th>
                                </tr>
                                <tr>
                                    <th>Agenda Persip</th>
                                    <th>&nbsp;&nbsp;:&nbsp;&nbsp;</th>
                                    <th>{{ $l->agenda_persip }}</th>
                                </tr>
                                <tr>
                                    <th>Kabinet</th>
                                    <th>&nbsp;&nbsp;:&nbsp;&nbsp;</th>
                                    <th>{{ $l->kode_kabinet }}</th>
                                </tr>
                                <tr>
                                    <th>Kategori</th>
                                    <th>&nbsp;&nbsp;:&nbsp;&nbsp;</th>
                                    <?php $k = DB::table('kategori')->where('kode_kategori' , $l->kode_kategori)->first(); ?>
                                    <th>{{ $k->nama_kategori }}</th>
                                </tr>

                            </table>
                        </div>
                    </div>

                </div>
            </div>


        </section>
    </main>
@endsection
