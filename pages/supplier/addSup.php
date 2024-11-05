<!-- Modal for adding medicine -->
<div class="modal fade" id="addSupplierModal" data-backdrop="static" data-keyboard="false"  tabindex="-1" aria-labelledby="addSupplierModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addSupplierModalLabel">Add Medicine</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <form action="addsupplier.php" method="POST" >

            <div class="row">
                <div class="mb-3 col-12">
                    <label for="medicineType" class="form-label">Supplier</label>
                    <input type="text" class="form-control" id="supplier" name="supplier" placeholder="Supplier Name" required>
                </div>
            </div>

            <div class="row">
                <div class="mb-3 col-12">
                    <label for="Contact" class="form-label">Contact</label>
                    <input type="text" class="form-control" id="contact" name="contact" placeholder="Supplier Contact" required>
                </div>
            </div>

            <div class="row">
                <div class="mb-3 col-12">
                    <label for="Contact" class="form-label">Address</label>
                    <textarea  class="form-control" style = "height:150px;" placeholder= "insert address here" name="address"></textarea>
                </div>
            </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close <i class="fa-solid fa-xmark"></i></button>
            <button type="submit" name="submit" class="btn btn-success">Submit <i class="fa-solid fa-check"></i></button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>


