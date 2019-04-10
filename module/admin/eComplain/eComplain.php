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
                  <div class="col-md-auto ">
                    <img class="btn-search" src="../img/search.svg" alt="search">
                  </div>
                  <div class="col pl-0">
                    <form>
                      <div class="form-row">
                        <div class="col">
                          <input type="text" class="form-control" placeholder="Pencarian...">
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
              <div class="recent-chat col-md-4 border-right border-gray scrollbar">

                <div class="row recent-chat-item border-bottom border-gray p-3 active">
                  <div class="col-md-auto p-0">
                    <img class="chat-profile-photo" src="../attachment/img/avatar.png">
                  </div>
                  <div class="col">
                    <div class="row chat-info">
                      <div class="col">
                        Veronica Imoet
                      </div>
                      <div class="col-md-auto pr-0">
                        30 Jan 2019
                      </div>
                    </div>
                    <div class="row">
                      <div class="col pr-0">
                        Assalamualaiku wr. wb.
                      </div>
                    </div>
                  </div>
                </div>

                <?php
                for ($i = 0; $i < 20; $i++) {
                  ?>
                  <div class="row recent-chat-item border-bottom border-gray p-3">
                    <div class="col-md-auto p-0">
                      <img class="chat-profile-photo" src="../attachment/img/avatar.png">
                    </div>
                    <div class="col">
                      <div class="row chat-info">
                        <div class="col">
                          Veronica Imoet
                        </div>
                        <div class="col-md-auto pr-0">
                          30 Jan 2019
                        </div>
                      </div>
                      <div class="row">
                        <div class="col pr-0">
                          Assalamualaiku wr. wb.
                        </div>
                      </div>
                    </div>
                  </div>
                <?php
              }
              ?>

              </div>
              <div class="col-md-8">
                <div class="row border-bottom border-gray">
                  Isi Chat
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