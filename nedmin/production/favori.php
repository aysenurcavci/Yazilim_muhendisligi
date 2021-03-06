<?php 

include 'header.php'; 

//Belirli veriyi seçme işlemi
$favorisor=$db->prepare("SELECT * FROM favori");
$favorisor->execute();


?>


<!-- page content -->
<div class="right_col" role="main">
  <div class="">

    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Favori Listeleme <small>,

              <?php 

              if (@$_GET['durum']=="ok") {?>

              <b style="color:green;">İşlem Başarılı...</b>

              <?php } elseif (@$_GET['durum']=="no") {?>

              <b style="color:red;">İşlem Başarısız...</b>

              <?php }

              ?>


            </small></h2>

            <div class="clearfix"></div>

            <div align="right">
              <a href="favori-ekle.php"><button class="btn btn-success btn-xs"> Yeni Ekle</button></a>

            </div>
          </div>
          <div class="x_content">


            <!-- Div İçerik Başlangıç -->

            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>S.No</th>
                  <th>Resim</th>
                  <th>Ad</th>
                  <th>Url</th>
                  <th>Durum</th>
                  <th></th>
                  <th></th>
                </tr>
              </thead>

              <tbody>

                <?php 

                $say=0;

                while($favoricek=$favorisor->fetch(PDO::FETCH_ASSOC)) { $say++?>


                <tr>
                 <td width="20"><?php echo $say ?></td>
                 <td><img width="200" src="../../<?php echo $favoricek['favori_resim'] ?>"></td>
                 <td><?php echo $favoricek['favori_ad'] ?></td>
                 <td><?php echo $favoricek['favori_link'] ?></td>


                 <td><center><?php 

                  if ($favoricek['favori_durum']==1) {?>

                  <button class="btn btn-success btn-xs">Aktif</button>

                  <!--

                  success -> yeşil
                  warning -> turuncu
                  danger -> kırmızı
                  default -> beyaz
                  primary -> mavi buton

                  btn-xs -> ufak buton 

                -->

                <?php } else {?>

                <button class="btn btn-danger btn-xs">Pasif</button>


                <?php } ?>
              </center>


            </td>



            <td><center><a href="../netting/islem.php?favori_id=<?php echo $favoricek['favori_id']; ?>&favorisil=ok&favori_resim=<?php echo $favoricek['favori_resim'] ?>"><button class="btn btn-danger btn-xs">Sil</button></a></center></td>
          </tr>



          <?php  }
          ?>


        </tbody>
      </table>

      <!-- Div İçerik Bitişi -->


    </div>
  </div>
</div>
</div>




</div>
</div>
<!-- /page content -->

<?php include 'footer.php'; ?>
