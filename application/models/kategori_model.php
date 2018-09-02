<?php

    class kategori_model extends CI_Model {

        public function selectBoxKategori($id = 0, $x = 0) {
            $query = $this->db->where("kategori_ustid", $id)->get("kategoriler")->result();
            if ($query) {
                foreach ($query as $row) {
                    //Buradaki $x değişkeni str_repeat fonksiyonu ile döngü her çalıştığında hiyerarşik bir düzen oluşturur. $x değişkeni her foreach döngüsünde (+2) artar ve ve arttığı kadar
                    //boşluk bırakır.

                    echo "<option value=".$row->kategori_id.">".str_repeat("-", $x).$row->kategori_adi."</option>";

                    //Eğer ki $query değişkeni bir sonuç dönderirse foreach içerisinde tekrar tekrar aynı fonksiyonu çalıştırıp alt kategorilerinin olup olmadığına bakarız.
                    //Alt kategori olmadığı durumda if sorgusu çalışmayacağı için döngü sonlanmış olur.
                    $this->selectBoxKategori($row->kategori_id, $x + 2);
                }
            }
        }

        public function altKategoriBul($id = 0, $str = 0, $ust_id) {
            $query = $this->db->where("kategori_ustid", $id)->get("kategoriler")->result();
            if ($query) {
                foreach ($query as $row) {
                    echo "<option ";
                    //Eğer Kategori id sine sahip bir üst kategori id varsa <option> etiketini seçili hale getiriyoruz
                    echo ($row->kategori_id == $ust_id) ? "selected" : null;
                    echo " value=".$row->kategori_id.">".str_repeat("-", $str).$row->kategori_adi."</option>";
                    $this->altKategoriBul($row->kategori_id, $str + 2, $ust_id);
                }
            }
        }

        public function KategoriListesi($id = 0) {
            $query = $this->db->where("kategori_ustid", $id)->get("kategoriler")->result();
            if ($query) {
                echo "<ul class=\"treeview\">";
                foreach ($query as $row) {
                    echo '<li>'.$row->kategori_adi;
                    echo '
                        <span class="ml-1 mr-1"></span>
                        <a class="text-success" href="'.base_url("kategori/kategoriduzenle/$row->kategori_id").'" data-toggle="tooltip" data-placement="top" title="Düzelt"><i class="fa fa-edit"></i></a>
                        <a class="text-danger delete" href="javascript:void(0);" data-link="'.base_url("kategori/sil/$row->kategori_id").'" data-title="'.$row->kategori_adi.'" data-toggle="tooltip" data-placement="top" title="Sil"><i class="fa fa-trash"></i></a>
                        ';
                    $this->KategoriListesi($row->kategori_id);
                }
                echo "</li></ul>";
            }
        }

        public function bootstrap_menu($kategori_id=0){

            $query = $this->db->where("kategori_ustid", $kategori_id)->get("kategoriler")->result();
            foreach ($query as $row) {
                $alt_kategori_say = $this->db->where("kategori_ustid", $row->kategori_id)->get("kategoriler")->num_rows();

                if ($alt_kategori_say > 0) {
                    if ($kategori_id != 0) {
                        echo '<li class="dropdown-item dropdown-toggle" data-toggle="dropdown">';
                        echo "<a href='javascript:void(0);' class='nav-link'>".$row->kategori_adi."</a>";
                    } else {
                        echo '<li class="nav-item dropdown">';
                        echo '<a class="nav-link dropdown-toggle" tabindex="0" data-toggle="dropdown" data-submenu="">'.$row->kategori_adi.'</a>';
                    }

                } else {
                    if ($kategori_id != 0) echo '<li class="dropdown-item">';
                    else echo '<li class="nav-item">';
                    echo "<a href='".base_url("kategori/kategoriduzenle/$row->kategori_id")."' class='nav-link'>".$row->kategori_adi."</a>";
                }

                if ( $alt_kategori_say > 0 ) {
                    echo '<ul class="dropdown-menu"><div class="dropdown dropright dropdown-submenu">';
                    $this->bootstrap_menu($row->kategori_id);
                    echo "</div></ul>";
                }
                echo "</li>";

            }

        }

        public function menu($kategori_id=0){
            echo '<ul>';
            $query = $this->db->where("kategori_ustid", $kategori_id)->get("kategoriler")->result();
            foreach ($query as $row) {
                echo '<li><a href="'.base_url("kategori/kategoriduzenle/$row->kategori_id").'">'.$row->kategori_adi.'</a>';
                $alt_kategori_say = $this->db->where("kategori_ustid", $row->kategori_id)->get("kategoriler")->num_rows();
                if ($alt_kategori_say > 0) {
                    $this->menu($row->kategori_id);
                }
                echo '</li>';
            }
            echo '</ul>';
        }

        public function kategori_getir($id) {
            $query = $this->db->where("kategori_id", $id)->get("kategoriler")->row();
            return $query;
        }

        public function kategori_ekle($veriler) {
            $query = $this->db->insert("kategoriler", $veriler);
            return $query;
        }

        public function kategori_duzenle($id, $veriler) {
            $query = $this->db->where("kategori_id", $id)->update("kategoriler", $veriler);
            return $query;
        }

        public function kategori_sil($id) {
            $query = $this->db->where("kategori_id", $id)->delete("kategoriler");
            return $query;
        }

    }