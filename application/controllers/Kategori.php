<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Kategori extends CI_Controller {

        public function __construct() {
            parent::__construct();
            $this->load->model("kategori_model");
        }

        public function index() {
            $this->load->view('kategori');
        }

        public function kategoriduzenle($id) {
            if ($id == 0) {
                //id gönderilmemişse
                $return = array(
                    //biraz görsellik katalım.
                    "mesaj" => "<div class='alert alert-danger' role='alert'>Düzenlenecek Kategoriyi Seçmediniz</div>"
                );
                $this->load->view('kategori', $return);

            } else {
                //kategori var mı yok mu kontrol ediyoruz
                $data = $this->kategori_model->kategori_getir($id);
                if ($data) {
                    $view          = new stdClass();
                    //modelden gelen veriyi view Değişkeninin sql data alanına atıyoruz
                    $view->sqlData = $data;
                    //kategori düzenle view dosyamıza $view Değişkenini gönderiyorz
                    $this->load->view("kategoriduzenle", $view);

                } else {
                    $return = array(
                        //biraz görsellik katalım.
                        "mesaj" => "<div class='alert alert-danger' role='alert'>Düzenlenecek Kategori Bulunamadı</div>"
                    );
                    $this->load->view('kategori', $return);

                }

            }

        }

        public function ekle() {
            if ($_POST) {
                //veri tabanına eklenecek değerleri formdan alıp dizi değişkenine aktarıyoruz
                $veriler = array(
                    "kategori_adi" => $this->input->post("kategori_adi"),
                    "kategori_ustid" => $this->input->post("kategori_ustid")
                );

                $sonuc = $this->kategori_model->kategori_ekle($veriler);
                if ($sonuc) {
                    $return = array(
                        "mesaj" => "<div class='alert alert-success' role='alert'>Kategori Başarılı Bir Şekilde Eklendi</div>"
                    );

                    //biraz görsellik katalım.
                    //eğer ki başarılı bir şekilde eklerse kategori isimli view'i return değişkeni ile beraber yüklüyoruz.
                    $this->load->view('kategori', $return);
                } else {
                    //eğer ki eklenmezse sadece kategori view'ini yüklüyoruz
                    $this->load->view('kategori');
                }

            } else {
                $this->load->view('kategori');
            }



        }

        public function duzenle($id) {
            //id değeri boş değilse
            if ($id !== "") {
                if ($_POST) {
                    $data = $this->kategori_model->kategori_getir($id);
                    if ($data) {
                        $veriler = array(
                            "kategori_adi" => $this->input->post("kategori_adi"),
                            "kategori_ustid" => $this->input->post("kategori_ustid")
                        );

                        $sonuc = $this->kategori_model->kategori_duzenle($id, $veriler);
                        if ($sonuc) {
                            $return = array(
                                //biraz görsellik katalım.
                                "mesaj" => "<div class='alert alert-success' role='alert'>Kategori Başarılı Bir Şekilde Güncellendi</div>"
                            );
                            //eğer ki başarılı bir şekilde eklerse kategori isimli view'i return değişkeni ile beraber yüklüyoruz.
                            $this->load->view('kategori', $return);
                        } else {
                            //eğer ki eklenmezse sadece kategori view'ini yüklüyoruz
                            $this->load->view('kategori');
                        }
                    }
                    //id değeri boşsa Base url e gönderiyoruz.
                    else {

                        $this->load->view('kategori');
                    }
                }
            }
        }

        public function sil($id) {
            if ($id !== "") {
                $veri = $this->kategori_model->kategori_getir($id);

                if ($veri) {
                    $sil = $this->kategori_model->kategori_sil($id);
                    if ($sil) {
                        $return = array(
                            //biraz görsellik katalım.
                            "mesaj" => "<div class='alert alert-success' role='alert'>Kategori Başarılı Bir Şekilde Silindi</div>"
                        );
                        //eğer ki başarılı bir şekilde eklerse kategori isimli view'i return değişkeni ile beraber yüklüyoruz.
                        $this->load->view('kategori', $return);
                    }
                } else {
                    $return = array(
                        //biraz görsellik katalım.
                        "mesaj" => "<div class='alert alert-danger' role='alert'>Silinecek Kategori Bulunamadı</div>"
                    );
                    $this->load->view('kategori', $return);
                }

            } else {
                $this->load->view('kategori');
            }

        }

    }