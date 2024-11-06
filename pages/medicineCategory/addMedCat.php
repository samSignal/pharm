<!-- Modal for adding medicine -->
<div class="modal fade" id="addMedCatModal" data-backdrop="static" data-keyboard="false"  tabindex="-1" aria-labelledby="addMedCatModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addMedCatModalLabel">Add Medicine Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form action="addmedCategory.php" method="POST" >

            <div class="row">
                <div class="mb-3 col-12">
                    <label for="medicineType" class="mb-2">Medicine Categories</label>
                    <input type="text" class="form-control mb-4" name="medicineCategory" placeholder="add medicine Categories" required>
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


