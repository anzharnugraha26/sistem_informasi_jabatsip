@extends('layouts.master')
@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            @if ($flag == 0)
                <h1>Tambah Data Klasifikasi</h1>
            @else
                <h1>Edit Data Klasifikasi</h1>
            @endif

        </div>
        <section class="section">
            <div class="row">
                <div class="col-lg-8">

                    <div class="card">
                        <div class="card-body">

                            @if ($flag == 0)
                                <form class="mt-5" method="POST" action="{{ url('kategori/save') }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="row mb-3">
                                        <label for="inputText" class="col-sm-3 col-form-label">Kode Klasifikasi</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="kode_kategori">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputEmail" class="col-sm-3 col-form-label">Nama Klasifikasi</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="nama_kategori">
                                        </div>
                                    </div>


                                    <div class="row mb-3">
                                        <label class="col-sm-3 col-form-label"></label>
                                        <div class="col-sm-9">
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </div>
                                    </div>

                                </form>
                            @else
                                <form class="mt-5" method="POST" action="{{ url('kategori/update') }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="row mb-3">
                                        <input type="hidden" name="id" id="" value="{{ $k->id }}">
                                        <label for="inputText" class="col-sm-3 col-form-label">Kode Klasifikasi</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="kode_kategori"
                                                value="{{ $k->kode_kategori }}">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputEmail" class="col-sm-3 col-form-label">Nama Klasifikasi</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="nama_kategori"
                                                value="{{ $k->nama_kategori }}">
                                        </div>
                                    </div>


                                    <div class="row mb-3">
                                        <label class="col-sm-3 col-form-label"></label>
                                        <div class="col-sm-9">
                                            <button type="submit" class="btn btn-primary">Update</button>
                                        </div>
                                    </div>

                                </form>
                            @endif
                        </div>
                    </div>

                </div>


            </div>
        </section>
    </main>
@endsection
