<div class="container-fluid py-3">
  <div class="row justify-content-center">
    <div class="col-12 text-center mb-3">
      <img src="<?= APP_URL . 'assets/img/keep.png' ?>" class="logo">
    </div>
    <div class="col-12 col-md-6 col-lg-4 mb-5">
      <div class="card">
        <div class="card-body">
          <form action="<?= APP_URL . 'home/addNote' ?>" method="post">
            <div class="mb-3">
              <input type="text" name="title" placeholder="Título" class="form-control border-0">
            </div>
            <div class="mb-3">
              <textarea name="content" rows="3" placeholder="Toma nota..." class="form-control border-0"></textarea>
            </div>
            <button class="add">
              <i class="fa-solid fa-plus"></i>
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <div class="row justify-content-start">
    <?php foreach ($notes as $note) : ?>
      <div class="col-6 col-md-4 col-xl-2 mb-3">
        <div data-bs-toggle="modal" data-bs-target="#modal" data-bs-id="<?= $note['id'] ?>" data-bs-title="<?= $note['title'] ?>" data-bs-content="<?= $note['content'] ?>" class="card note h-100">
          <div class="card-body">
            <div class="card-edit">
              <i class="fa-solid fa-pen"></i>
            </div>
            <h5 class="card-title"><?= $note['title'] ?></h5>
            <p class="card-text"><?= $note['content'] ?></p>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
  <div id="modal" tabindex="-1" aria-hidden="true" class="modal">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <form action="<?= APP_URL . 'home/addNote' ?>" method="post">
          <div class="modal-body">
            <div class="mb-3">
              <input type="text" name="title" placeholder="Título" class="form-control border-0">
            </div>
            <div class="mb-0">
              <textarea name="content" rows="3" placeholder="Contenido" class="form-control border-0"></textarea>
            </div>
          </div>
          <div class="modal-footer d-block">
            <div class="row justify-content-between">
              <div class="col">
                <a class="btn btn-light">
                  <i class="fa-solid fa-trash"></i>
                </a>
              </div>
              <div class="col">
                <button type="submit" class="btn btn-light float-end">Done</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>