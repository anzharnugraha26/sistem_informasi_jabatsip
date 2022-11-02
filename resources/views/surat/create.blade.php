@extends('layouts.master')
@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Tambah Data Surat</h1>

        </div>
        <section class="section">
            <div class="row">
                <div class="col-lg-8">

                    <div class="card">
                        <div class="card-body">

                            <!-- General Form Elements -->
                            <form class="mt-5" method="POST" action="{{ url('surat/save') }}"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-3 col-form-label">Tanggal Terima Surat</label>
                                    <div class="col-sm-9">
                                        <input type="date" class="form-control" name="tanggal_terima" required>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputEmail" class="col-sm-3 col-form-label">No Surat</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="no_surat" required>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-3 col-form-label">Tanggal Surat</label>
                                    <div class="col-sm-9">
                                        <input type="date" class="form-control" name="tanggal_surat" required>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputEmail" class="col-sm-3 col-form-label">Asal Surat</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="asal_surat" required>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputEmail" class="col-sm-3 col-form-label">No Agenda TU Persip</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="agenda_persip" required>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputPassword" class="col-sm-3 col-form-label">Perihal Surat</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" style="height: 100px" name="perihal_surat" required></textarea>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputPassword" class="col-sm-3 col-form-label">Keterangan</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" style="height: 100px" name="keterangan" required></textarea>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-3 col-form-label">Jenis Surat</label>
                                    <div class="col-sm-4">
                                        <select class="form-select" aria-label="Default select example" name="sifat_surat">
                                            <option disabled>Open this select menu</option>
                                            <option value="Rahasia">Rahasia</option>
                                            <option value="Biasa">Biasa</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-3 col-form-label">Kode Lemari</label>
                                    <div class="col-sm-4">
                                        <select class="form-select" aria-label="Default select example" name="kode_kabinet">
                                            <option disabled>Open this select menu</option>
                                            @foreach ($kb as $i)
                                                <option value="{{ $i->kode_kabinet }}">{{ $i->nama_kabinet }}</option>
                                            @endforeach


                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-3 col-form-label">Kode Ketegori</label>
                                    <div class="col-sm-4">
                                        <select class="form-select" aria-label="Default select example"
                                            name="kode_kategori">
                                            <option disabled>Open this select menu</option>
                                            @foreach ($k as $i)
                                                <option value="{{ $i->kode_kategori }}">{{ $i->nama_kategori }}</option>
                                            @endforeach


                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputNumber" class="col-sm-3 col-form-label">File Upload</label>
                                    <div class="col-sm-8">
                                        <input class="form-control" type="file" id="formFile" name="file" required>
                                    </div>
                                </div>






                                <div class="row mb-3">
                                    <label class="col-sm-3 col-form-label"></label>
                                    <div class="col-sm-9">
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                </div>

                            </form><!-- End General Form Elements -->

                        </div>
                    </div>

                </div>


            </div>
        </section>
    </main>
@endsection
