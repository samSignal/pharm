<!-- Modal for adding medicine -->
<div class="modal fade" id="addMedTypeModal" data-backdrop="static" data-keyboard="false"  tabindex="-1" aria-labelledby="addMedTypeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addMedTypeModalLabel">Add Medicine Type</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form action="add_medtype.php" method="POST" >

            <div class="row">
                <div class="mb-3 col-12">
                    <label for="medicineType" class="mb-2">Medicine Type</label>
                    <input type="text" class="form-control mb-4" name="medicineType" placeholder="add medicine Type">
                </div>
            </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close <i class="fa-solid fa-xmark"></i></button>
            <button type="submit" name="md_submit" class="btn btn-success">Submit <i class="fa-solid fa-check"></i></button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>


