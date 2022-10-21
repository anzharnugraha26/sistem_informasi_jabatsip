@extends('layouts.master')
@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Data Surat</h1>

        </div>
        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <a href="{{ url('surat/tambah') }}" class="btn btn-primary  mt-3 mb-3"><i
                                    class="ri-add-box-fill"></i> Tambah Data</a>
                            <div class="table-responsive">
                                <table class="table datatable table-striped " id="tabel-data">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">No Surat</th>
                                            <th scope="col">Tanggal Surat</th>
                                            <th scope="col">Perihal Surat</th>
                                            <th scope="col">Tanggal Terima</th>
                                            <th scope="col">Kabinet</th>
                                            <th scope="col">Aksi</th>

                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($s as $i)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $i->no_surat }}</td>
                                                <td>{{ $i->tanggal_surat }}</td>
                                                <td>{{ $i->perihal_surat }}</td>
                                                <td>{{ $i->tanggal_terima }}</td>
                                                <td>{{ $i->kode_kabinet }}</td>
                                                <td colspan="3">

                                                    <a href="{{ url('surat/hapus/' . $i->id) }}"
                                                        onclick="return confirm('Are you sure, you want to delete it?')"
                                                        class="btn btn-danger btn-sm"><i class="bi bi-trash3-fill"></i></a>
                                                    <a href="{{ url('surat/edit/' . $i->id) }}"
                                                        class="btn btn-success btn-sm"><i class="bi bi-pencil"></i></a>
                                                    <a href="{{ url('surat/detail/' . $i->id) }}"
                                                        class="btn btn-primary btn-sm"><i class="bi bi-eye-fill"></i></a>

                                                </td>
                                            </tr>
                                        @endforeach


                                    </tbody>
                                </table>
                                <div>
                                    <p>Jumlah Data : {{$c}}</p>
                                </div>
                            </div>
                            <!-- Table with stripped rows -->

                            <!-- End Table with stripped rows -->

                        </div>
                    </div>

                </div>
            </div>
        </section>
    </main>
@endsection
