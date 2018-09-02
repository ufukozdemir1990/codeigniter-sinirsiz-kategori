<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Php Codeigniter ile Sınırsız Kategori </title>
        <?php $this->load->view("bootstrap"); ?>
    </head>
    <body>
        <div class="container mb-4">
            <div class="jumbotron mt-4">
                <h1>Codeigniter Sınırsız Kategori Uygulaması</h1>
                <p>Bu içerik <strong>Ufuk Özdemir</strong> tarafından oluşturulmuştur</p>
            </div>
            <div class="row">
                <div class="col">
                    <!--
                    <nav class="navbar navbar-light bg-light navbar-expand-sm">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse">
                            <nav id="primary_nav_wrap">
                                <?php $this->kategori_model->menu(); ?>
                            </nav>
                        </div>
                    </nav>
                    -->

                    <nav class="navbar navbar-custom navbar-expand-md navbar-light bg-light">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNavDropdown">
                            <ul class="navbar-nav">
                                <?php $this->kategori_model->bootstrap_menu(); ?>
                            </ul>
                        </div>
                    </nav>

                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col">
                    <?php echo isset($mesaj) ? $mesaj : null; ?>
                    <h6><?php if(isset($mesaj)): ?><a href="<?php echo base_url(); ?>">Yeni Kategori Ekle</a> | <?php endif; ?>Kategori Ekleme Formu</h6>
                    <form action="<?php echo base_url("kategori/ekle") ?>" method="post">
                        <div class="form-group">
                            <label for="exampleInput1">Kategori Adı</label>
                            <input type="text" class="form-control" id="exampleInput1" aria-describedby="emailHelp" placeholder="Kategori Adını Yazın" name="kategori_adi">
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlSelect">Kategori Listesi</label>
                            <select class="selectpicker" data-live-search="true" data-width="100%" data-style="btn-danger" name="kategori_ustid">
                                <option value="0">Ana Kategori</option>
                                <?php $this->kategori_model->selectBoxKategori(); ?>
                            </select>
                        </div>
                        <hr>
                        <button type="submit" class="btn btn-primary btn-block">Kaydet</button>
                    </form>
                </div>
                <div class="col">
                    <div class="card">
                        <div class="card-header">Kategorileri Listelemek</div>
                        <div class="card-body bg-light">
                            <?php $this->kategori_model->kategoriListesi(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>