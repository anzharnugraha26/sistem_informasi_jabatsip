@extends('layouts.master')
@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Detail Surat Masuk</h1>
        </div>
        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-header">
                            <h5>{{ $s->no_surat_keluar }}</h5>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped mt-5">
                                    <tr>
                                        <td>No Surat Masuk</td>
                                        <td>:</td>
                                        <td>{{ $s->no_surat_keluar}}</td>
                                    </tr>
                                    <tr>
                                        <td>No Agenda Tu Perssip</td>
                                        <td>:</td>
                                        <td>{{ $s->no_agenda }}</td>
                                    </tr>
                                    <tr>
                                        <td>Asal Surat</td>
                                        <td>:</td>
                                        <td>{{ $s->tujuan_surat }}</td>
                                    </tr>
                                    <tr>
                                        <td>Perihal Surat</td>
                                        <td>:</td>
                                        <td>{{ $s->perihal_surat }}</td>
                                    </tr>
                                    <tr>
                                        <td>Klasifikasi Surat</td>
                                        <td>:</td>
                                        <td>{{ $s->klasifikasi_surat }}</td>
                                    </tr>
                                    <tr>
                                        <td>Sifat Surat</td>
                                        <td>:</td>
                                        <td>{{ $s->sifat_surat }}</td>
                                    </tr>
                                    <tr>
                                        <td>Tanggal Surat</td>
                                        <td>:</td>
                                        <td>{{ $s->tgl_surat }}</td>
                                    </tr>
                                    <tr>
                                        <td>Tanggal Terima</td>
                                        <td>:</td>
                                        <td>{{ $s->tgl_surat }}</td>
                                    </tr>
                                    <tr>
                                        <td>Kabinet</td>
                                        <td>:</td>
                                        <td>{{ $s->kode_kabinet }} - {{ $s->nama_kabinet }} - {{ $s->slot }}</td>
                                    </tr>
                                    <tr>
                                        <td>Jenis Surat</td>
                                        <td>:</td>
                                        <td>{{ $s->jenis_surat }}</td>
                                    </tr>
                                    <tr>
                                        <td>File</td>
                                        <td>:</td>
                                        <td>
                                            <div>
                                                @if ($s->jenis_file == 'pdf')
                                                    {{ $s->file }}
                                                @else
                                                    <img src="{{ asset('image/file/' . $s->file) }}" alt=""
                                                        style="width: 500px;height: 500px;">
                                                @endif
                                            </div>
                                            <div class="mt-3">
                                                <a href="{{ url('surat-keluar/download/file/' . $s->id) }}"
                                                    class="btn btn-primary btn-sm"> <i class="bi bi-download"></i> Download
                                                    File</a>
                                                <a href="{{ asset('image/file/' . $s->file) }}" target="_blank"
                                                    class="btn btn-success btn-sm"> <i class="bi bi-eye-fill"></i> View
                                                    File</a>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
