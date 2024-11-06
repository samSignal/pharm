<!-- Modal for adding medicine -->
<div class="modal fade" id="addCustomerModal" data-backdrop="static" data-keyboard="false"  tabindex="-1" aria-labelledby="addCustomerModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addCustomerModalLabel">Add New Customer</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form action="addsupplier.php" method="POST" >

            <div class="row">
                <div class="mb-3 col-12">
                    <label for="first name" class="mb-2 text-center">Name</label>
                    <input type="text" class="form-control mb-4" name="name" placeholder="Fullname" required>
                </div>
            </div>

            <div class="row">
                <div class="mb-3 col-12">
                    <label for="age" class="mb-2 text-center">Age</label>
                    <input type="number" class="form-control mb-4" name="age" placeholder="age" required>
                </div>
            </div>

            <div class="row">
                <div class="mb-3 col-12">
                    <label for="gender" class="mb-2 text-center">Gender</label>
                    <select class="form-control select" name="gender" id="gender">
                        <option value="" selected disabled>Select Gender</option>
                        <option value="male">Male</option>
                        <option value="female"></option>
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="mb-3 col-12">
                    <label for="address" class="mb-2 text-center">Address</label>
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


