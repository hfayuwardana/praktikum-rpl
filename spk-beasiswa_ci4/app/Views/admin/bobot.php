<!-- content -->
<div class="col-lg-9 bg-white content py-3 mt-5">
    <div class="row h-100">
        <div class="col-lg-12 mx-auto">
            <div class="card shadow p-3 mb-5 bg-white rounded">
                <div class="card-body mt-1">
                    <h2 class="font-weight-bold text-biru-1">Data Bobot</h2>
                    <hr class="mt-5 mb-4">

                    <?php if(session()->getFlashdata('success')): ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <?= session()->getFlashData('success') ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <?php endif; ?>

                    <?php if(session()->getFlashData('danger')): ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Error!</strong>
                        <?= session()->getFlashData('danger') ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <?php endif; ?>

                    <div class="d-flex justify-content-end">
                        <a class="btn btn-primary bg-biru-gr rounded-pill w-25 py-2 font-weight-bold <?= ($status == 'Selesai') ? 'disabled' : ''; ?>"
                            href="<?= base_url().'/bobot/createBobot/'.$id_beasiswa.'/'.$id_kriteria; ?>"
                            role="button"><i class="fas fa-plus-circle"></i> Tambah Bobot
                        </a>
                    </div>
                    <div class="table-responsive">
                        <table class="table mt-4 text-center">
                            <thead class="bg-biru-gr text-white">
                                <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col w-25">Keterangan</th>
                                    <th scope="col">Value</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach($bobot as $bbt): ?>
                                <tr>
                                    <th scope="row"><?= $no++; ?></th>
                                    <td class="w-25"><?= $bbt['keterangan']; ?></td>
                                    <td><?= $bbt['value']; ?></td>
                                    <td>
                                        <a class="btn btn-warning rounded-pill text-dark my-1 <?= ($status == 'Selesai') ? 'disabled' : ''; ?>"
                                            href="<?= base_url() ?>/bobot/editBobot/<?= $bbt['id_beasiswa']; ?>/<?= $bbt['id_kriteria']; ?>/<?= $bbt['id_bobot']; ?>"
                                            role="button"><i class="far fa-edit"></i> Sunting</a>
                                        <a class="btn btn-danger rounded-pill my-1 <?= ($status == 'Selesai') ? 'disabled' : ''; ?>"
                                            href="<?= base_url('/AdminController/deleteBobot/'.$bbt['id_beasiswa'].'/'.$bbt['id_kriteria'].'/'.$bbt['id_bobot']) ?>"
                                            role="button"><i class="far fa-trash-alt"></i> Hapus</a>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- akhir content -->
</div>
</div>

</section>
<!-- akhir main -->