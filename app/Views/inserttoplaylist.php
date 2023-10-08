<div class="modal" id="chris">
      <div class="modal-dialog">
        <div class="modal-content">

          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">Select from playlist</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
          </div>

          <!-- Modal body -->
          <div class="modal-body">
          <form action="/saveMusic" method="post" enctype="multipart/form-data">
            <!-- <p id="modalData"></p> -->
            <input type="hidden" name="ID">
            <input type="text" name="Songs" value ="<?= isset($msc['File'])? $msc['File']: ''?>">
            <select name="Playlist" class="form-control" value ="<?= isset($msc['Playlist'])? $msc['Playlist']: ''?>">
              
                <?php foreach($plays as $play): ?>
              <option><?= $play['Playlist']?></option>
            <?php endforeach; ?>
            </select> 
            <input type="submit" name="add">
            </form>
          </div>

          <!-- Modal footer -->
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
          </div>

        </div>
      </div>
    </div>