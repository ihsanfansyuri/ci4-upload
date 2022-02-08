<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container">

    <?php if (session()->getFlashdata('msg')) : ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?= session()->getFlashdata('msg'); ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>

    <div class="card mt-4">
        <form action="simpan" method="post" enctype="multipart/form-data">
            <div class="custom-file mb-4">
                <input type="file" class="custom-file-input <?= ($validation->hasError('file')) ? 'is-invalid' : ''; ?>" id="id_file" name="file" onchange="previewText()">
                <label class="custom-file-label" for="customFile">Pilih File</label>
                <div id="validationServer03Feedback" class="invalid-feedback">
                    <?= $validation->getError('file'); ?>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="<?= base_url('/upload'); ?>" class="btn btn-primary">Kembali</a>
        </form>
    </div>
</div>

<?= $this->endSection(); ?>