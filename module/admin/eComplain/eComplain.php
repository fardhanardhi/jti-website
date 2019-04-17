<?php
include "../process/proses_eComplain.php";

?>

<main id="eComplain" role="main" class="container-fluid">
  <div class="row">
    <div class="col-md-12 p-0">
      <div class="m-2 bg-white shadow-sm rounded">
        <div class="row">
          <div class="col-md-auto pr-0">
            <span class="nav-link">E - Complain</span>
          </div>
          <div class="col pl-0">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb p-2 m-0 bg-white">
                <li class="breadcrumb-item"><a href="index.php?module=home">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">E - Complain</li>
              </ol>
            </nav>
          </div>
        </div>


      </div>
    </div>

    <div class="col-md-12 p-0">
      <div class="m-2 py-0 px-3 bg-white rounded shadow-sm chat">
        <div class="row h-100">
          <div class="col-md-12">
            <div class="row chat-head border-bottom border-gray">
              <div class="col-md-4 border-right border-gray">
                <div class="row align-items-center justify-content-center h-100">
                  <div class="col-md-auto px-4">
                    <img class="btn-search" src="../img/search.svg" alt="search">
                  </div>
                  <div class="col pl-0 pr-4">
                    <form>
                      <div class="form-row">
                        <div class="col">
                          <input type="text" class="form-control" id="recentChatInput" onkeyup="recentChatSearch()" placeholder="Pencarian...">
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              <div class="col-md-8">
                <div class="row align-items-center h-100 px-3">
                  <img class="chat-profile-photo" src="../attachment/img/avatar.png">
                  <h5 class="m-0 ml-3">Veronica Imoet</h5>
                </div>
              </div>
            </div>
            <div class="row chat-body">
              <div id="recentChat" class="recent-chat col-md-4 border-right border-gray scrollbar">

                <?php
                $resultRecentChat = tampilRecentChat($con, $idUser);
                $firstRowRecentChat = mysqli_fetch_assoc(tampilRecentChat($con, $idUser));
                if (mysqli_num_rows($resultRecentChat) > 0) {
                  while ($rowRecentChat = mysqli_fetch_assoc($resultRecentChat)) {
                    ?>
                    <div class="row recent-chat-item border-bottom border-gray p-3 <?php echo ($firstRowRecentChat["id_chat"] == $rowRecentChat["id_chat"]) ? 'active' : ''; ?>">
                      <div class="col-md-auto p-0">
                        <img class="chat-profile-photo" src="../attachment/img/avatar.png">
                      </div>
                      <div class="col">
                        <div class="row chat-info">
                          <div class="col recentName">
                            <?php
                            echo tampilMahasiswa($con, $rowRecentChat["recent_user"]);
                            ?>
                          </div>
                          <div class="col-md-auto pr-0">
                            <?php echo date("d M Y", strtotime($rowRecentChat["waktu"])) ?>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col pr-0 recentIsi">
                            <?php echo $rowRecentChat["isi"] ?>
                          </div>
                        </div>
                      </div>
                    </div>
                  <?php
                }
              } else {
                echo "gagal";
              }

              ?>

              </div>
              <div class="conversation-window col-md-8">
                <div class="row">
                  <div class="chat-window col scrollbar pt-3">


                    <?php
                    $firstRowRecentUser = mysqli_fetch_assoc(tampilRecentChat($con, $idUser));
                    $idUserTujuan = $firstRowRecentUser["recent_user"];
                    $resultChat = tampilChat($con, $idUser, $idUserTujuan);
                    if (mysqli_num_rows($resultChat) > 0) {
                      $prev = '';
                      while ($rowChat = mysqli_fetch_assoc($resultChat)) {
                        if ($rowChat["penerima"] == $idUser) {
                          ?>
                          <div class="row chat-kiri px-3 py-1 <?php echo (($prev != 'kiri') ? 'pt-3' : ''); ?>">
                            <div class="photo-container p-0">
                              <?php
                              if ($prev != 'kiri') {
                                ?>
                                <img class="chat-window-profile-photo" src="../attachment/img/avatar.png">
                              <?php
                            }
                            ?>
                            </div>
                            <div class="col">
                              <div class="row">
                                <div class="col-md-auto chat-window-item py-1 px-2">
                                  <div class="row">
                                    <div class="col">
                                      <?php echo $rowChat["isi"]; ?>
                                    </div>
                                  </div>
                                  <div class="row chat-window-item-info">
                                    <div class="col text-right">
                                      <?php echo date("d M Y", strtotime($rowChat["waktu"])); ?>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>

                          <?php
                          $prev = 'kiri';
                        } elseif ($rowChat["pengirim"] == $idUser) {
                          ?>
                          <div class="row chat-kanan px-3 py-1 <?php echo (($prev != 'kanan')  ? 'pt-3' : ''); ?>">
                            <div class="col">
                              <div class="row">
                                <div class="col-md-auto chat-window-item py-1 px-2 ml-auto">
                                  <div class="row">
                                    <div class="col">
                                      <?php echo $rowChat["isi"]; ?>
                                    </div>
                                  </div>
                                  <div class="row chat-window-item-info">
                                    <div class="col text-right">
                                      <?php echo date("d M Y", strtotime($rowChat["waktu"])); ?>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="photo-container p-0 text-right">
                              <?php
                              if ($prev != 'kanan') {
                                ?>
                                <img class="chat-window-profile-photo" src="../attachment/img/avatar.jpeg">
                              <?php
                            }
                            ?>
                            </div>
                          </div>
                          <?php
                          $prev = 'kanan';
                        }
                      }
                    } else {
                      echo "gagal";
                    }
                    ?>

                  </div>
                </div>
                <div class="row">
                  <div class="col chat-input">
                    <div class="row align-items-center justify-content-center h-100">
                      <div class="col pr-0 pl-2">
                        <form>
                          <div class="form-row">
                            <div class="col">
                              <input type="text" class="form-control" placeholder="Ketik Pesan">
                            </div>
                          </div>
                        </form>
                      </div>
                      <div class="col-md-auto pr-3 pl-1">
                        <img class="btn-send" src="../img/send.svg" alt="search">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- <h6 class="border-bottom border-gray pb-2 mb-0">Recent updates</h6>
          <div class="media text-muted pt-3">
            <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
              <strong class="d-block text-gray-dark">@username</strong>
              Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris
              condimentum nibh, ut fermentum massa justo sit amet risus.
            </p>
          </div>
          <small class="d-block text-right mt-3">
            <a href="#">All updates</a>
          </small> -->
      </div>
    </div>
  </div>
</main>