@extends('layouts.master')
@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Cetak Data Surat Masuk</h1>

        </div>
        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <div class="row justify-content-center">
                                <div class="col-md-6">
                                    <form class="mt-5" method="GET" action="{{ url('export-surat-masuk') }}"
                                        enctype="multipart/form-data">
                                        
                                        <div class="row mb-3">
                                            <label for="inputText" class="col-sm-3 col-form-label">Mulai Tanggal</label>
                                            <div class="col-sm-9">
                                                <input type="date" class="form-control" name="date1" required>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="inputEmail" class="col-sm-3 col-form-label">Sampai Tanggal</label>
                                            <div class="col-sm-9">
                                                <input type="date" class="form-control" name="date2" required>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label class="col-sm-3 col-form-label"></label>
                                            <div class="col-sm-9">
                                                <button type="submit" class="btn btn-primary">Cetak</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </section>
    </main>
@endsection
