@extends('layouts.master')
@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Data Surat Masuk</h1>

        </div>
        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <a href="#" class="btn btn-primary  mt-3 mb-3" data-toggle="modal"
                                data-target=".bd-example-modal-lg"><i class="ri-add-box-fill"></i> Tambah Data</a>
                            <div class="table-responsive">
                                <table class="table datatable table-striped " id="tabel-data">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">No Surat Masuk</th>
                                            <th scope="col">No Agenda</th>
                                            <th scope="col">Asal Surat</th>
                                            <th scope="col">Perihal Surat</th>
                                            <th scope="col">Tanggal Terima</th>
                                            <th scope="col">Kabinet</th>
                                            <th scope="col">Aksi</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($surat_masuk as $item)
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                        @endforeach



                                    </tbody>
                                </table>

                            </div>
                            <!-- Table with stripped rows -->

                            <!-- End Table with stripped rows -->

                        </div>
                    </div>

                </div>
            </div>

            <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Input Surat Masuk</h5>
                            <a type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </a>
                        </div>
                        <form action="">
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-6 mb-2">
                                        <label for="inputText" class="mb-2"><b>No Surat Masuk</b> </label>
                                        <input type="text" class="form-control" name="no_surat_masuk" required>
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <label for="inputText" class="mb-2">Klasifikasi Surat</label>
                                        <select class="form-select" aria-label="Default select example">
                                            <option value="">Surat Masuk</option>
                                            <option value="">Surat Keluar</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <label for="inputText" class="mb-2">No Agenda Surat Masuk</label>
                                        <input type="text" class="form-control" name="no_agenda" required>
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <label for="inputText" class="mb-2">Tanggal Surat</label>
                                        <input type="date" class="form-control" name="tanggal_surat" required>
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <label for="inputText" class="mb-2">Asal Surat</label>
                                        <input type="text" class="form-control" name="no_agenda" required>
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <label for="inputText" class="mb-2">Tanggal Diterima</label>
                                        <input type="date" class="form-control" name="tanggal_surat" required>
                                    </div>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
