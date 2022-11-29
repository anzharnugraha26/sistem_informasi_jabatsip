<form action="{{ url('update-surat') }}" enctype="multipart/form-data" method="POST">
    @csrf

    <div class="row">
        <div class="col-md-6 mb-2">
            @if ($s->klasifikasi_surat == 1)
                <label for="inputText" class="mb-2"><b>No Surat Masuk</b> </label>
            @else
                <label for="inputText" class="mb-2"><b>No Surat Keluar</b> </label>
            @endif
            <input type="hidden" value="{{ $s->id }}" name="id">
            <input type="text" class="form-control" name="no_surat_masuk" value="{{ $s->no_surat }}" required>
        </div>
        <div class="col-md-6 mb-2">
            <label for="inputText" class="mb-2"> <b>Klasifikasi Surat</b> </label>
            <select class="form-select" aria-label="Default select example" name="klasifikasi_surat">
                <?php $kl = DB::table('kategori')->get(); ?>
                @foreach ($kl as $i)
                    <option value="{{ $i->id }}" {{ $s->klasifikasi_surat == $i->id ? 'selected' : '' }}>
                        {{ $i->nama_kategori }}</option>
                @endforeach

            </select>
        </div>
        <div class="col-md-6 mb-2">
            <label for="inputText" class="mb-2"> <b>No Agenda Tu Perssip</b> </label>
            <input type="text" class="form-control" name="no_agenda" value="{{ $s->no_agenda }}" required>
        </div>
        <div class="col-md-6 mb-2">
            <label for="inputText" class="mb-2"> <b>Tanggal Surat</b> </label>
            <input type="date" class="form-control" name="tgl_surat" value="{{ $s->tgl_surat }}" required>
        </div>
        <div class="col-md-6 mb-2">
            <label for="inputText" class="mb-2"> <b>Asal Surat</b> </label>
            <input type="text" class="form-control" name="asal_surat" value="{{ $s->asal_surat }}" required>
        </div>
        <div class="col-md-6 mb-2">
            <label for="inputText" class="mb-2"> <b>Tanggal Terima</b> </label>
            <input type="date" class="form-control" name="tgl_terima" value="{{ $s->tgl_terima }}" required>
        </div>
        <div class="col-md-6 mb-2">
            <label for="inputText" class="mb-2"> <b>Perihal Surat</b> </label>
            <textarea class="form-control" name="perihal_surat" required>
           {{ $s->perihal_surat }}
        </textarea>
        </div>
        <div class="col-md-6 mb-2">
            <label for="inputText" class="mb-2"> <b>Sifat Surat</b> </label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="sifat_surat" value="rahasia" id="flexRadioDefault1"
                    {{ $s->sifat_surat == 'rahasia' ? 'checked' : '' }} checked>
                <label class="form-check-label" for="flexRadioDefault1">
                    Rahasia
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="sifat_surat" value="biasa" id="flexRadioDefault2"
                    {{ $s->sifat_surat == 'biasa' ? 'checked' : '' }}>
                <label class="form-check-label" for="flexRadioDefault2">
                    Biasa
                </label>
            </div>
        </div>
        <div class="col-md-6 mb-2">
            <label for="inputText" class="mb-2"> <b>Kabinet</b> </label>
            <select class="form-select" aria-label="Default select example" name="kabinet">
                <?php $k = DB::table('kabinet')->get(); ?>
                @foreach ($k as $i)
                    <option value="{{ $i->id }}" {{ $s->kabinet == $i->id ? 'selected' : '' }}>
                        {{ $i->nama_kabinet }} -
                        {{ $i->slot }}</option>
                @endforeach

            </select>
        </div>
        <div class="col-md-6 mb-2">
            <label for="inputText" class="mb-2"> <b>Jenis Surat</b> </label>
            <select class="form-select" aria-label="Default select example" name="jenis_surat">
                <?php $k = DB::table('jenis_surats')->get(); ?>
                @foreach ($k as $i)
                    <option value="{{ $i->id }}" {{ $s->jenis_surat == $i->id ? 'selected' : '' }}>
                        {{ $i->nama_jenis }}</option>
                @endforeach

            </select>
        </div>
        <div>
            <div class="col-md-6 mb-2">
                <label for="inputText" class="mb-2"> </label>

                <select name="c_file" class="form-select" onchange="hideDivFile('file' , this)">
                    <option value="0">Gunakan File Lama</option>
                    <option value="1">Upload file Baru</option>
                </select>

            </div>
        </div>
        <div class="col-md-6 mb-2" id="file" style="display: none">
            <label for="inputText" class="mb-2"> <b>File</b> </label>
            <br>
            <small style="color: red">*Format : jpg/jpeg/png/pdf (5 Mb)</small>
            <input type="file" class="form-control" name="file_baru">
            @if ($errors->has('file'))
                <small style="color: red">{{ $errors->first('file') }}</small>
            @endif
        </div>
        <div>
            <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="bi bi-x-circle"></i>
                Batal</button>
            <button class="btn btn-success"><i class="bi bi-box-arrow-down"></i>
                Update</button>
        </div>
    </div>
</form>
