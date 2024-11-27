<!-- Modal for adding medicine -->
<div class="modal fade" id="addDeliveryModal" data-backdrop="static" data-keyboard="false"  tabindex="-1" aria-labelledby="addDeliveryModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title text-center text-secondary" id="addDeliveryModalLabel" >
          Add Delivery <i class="fa-solid fa-truck-medical"></i>
        </h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
  <div class="row g-4">
    <!-- Customer Details Section -->
    <div class="col-md-6">
      <div class="p-3">
        <!--  <h5 class="mb-3 text-center">Customer Details</h5> -->
        
        <form id="frmInvoice2">
          <!-- Supplier Dropdown -->
          <div class="mb-3">
            <label for="Supplier" class="form-label">Supplier Name</label>
            <select class="form-control select" data-live-search="true" name="Supplier" id="Supplier">
              <option selected disabled>Choose...</option>
              <?php 
                $supplier = $pdo->prepare('SELECT `name` FROM supplier');
                $supplier->execute();
                if($supplier->rowCount() > 0){
                    foreach($supplier as $suppliers):
                    echo "<option value='$suppliers->name'>$suppliers->name</option>";
                    endforeach;
                }
              ?>
            </select>
          </div>

          <!-- Reference and Expiry Date -->
          <div class="row g-3">
            <div class="col-md-6">
              <label for="ref" class="form-label">Ref. No.</label>
              <input type="number" class="form-control" name="ref" id="ref" placeholder="Reference Number">
            </div>
            <div class="col-md-6">
              <label for="xpdate" class="form-label">Expiry Date</label>
              <input type="date" class="form-control" name="xpdate" id="xpdate">
            </div>
          </div>

          <!-- Product Inputs -->
          <div class="row g-3 mt-3">
            <div class="col-md-6">
              <input type="text" class="form-control" name="procode2" id="procode2" placeholder="Product Code">
            </div>
            <div class="col-md-6">
              <input type="text" class="form-control" name="pname2" id="pname2" placeholder="Product Name" readonly>
            </div>
          </div>

          <div class="row g-3 mt-3">
            <div class="col-md-6">
              <input type="number" class="form-control" name="price2" id="price2" placeholder="Price" readonly>
            </div>
            <div class="col-md-6">
              <input type="number" class="form-control" name="qty2" id="qty2" placeholder="Quantity">
            </div>
          </div>

          <!-- Total and Add Button -->
          <div class="mt-3">
            <input type="number" class="form-control" name="total2" id="total2" placeholder="Total" readonly>
          </div>
          <div class="mt-3">
            <button type="button" class="btn btn-primary w-100" id="add2">Add to Purchase List</button>
          </div>
        </form>
      </div>
    </div>

    <!-- POS Section -->
    <div class="col-md-6">
      <div class=" p-3 ">
        <!-- <h5 class="mb-3 text-center">POS Details</h5> -->
        <form id="frmInvoice2">
          <!-- Total -->
          <div class="mb-3">
            <label for="finaltotal2" class="form-label">Total</label>
            <input type="number" class="form-control" name="finaltotal2" id="finaltotal2" readonly>
          </div>

          <!-- Pay Amount -->
          <div class="mb-3">
            <label for="pay2" class="form-label">Pay Amount</label>
            <input type="number" class="form-control" name="pay2" id="pay2">
          </div>

          <!-- Change -->
          <div class="mb-3">
            <label for="bal2" class="form-label">Change</label>
            <input type="number" class="form-control" name="bal2" id="bal2" readonly>
          </div>

          <!-- Submit Button -->
          <div>
            <button type="button" class="btn btn-success w-100" name="submit2" id="submit2">Pay</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Data Table Section -->
  <div class="mt-4">
    <div class="bg-info text-white py-2 text-center rounded">
      <h5 class="mb-0">Purchase List</h5>
    </div>
    <div class="table-responsive">
      <table class="table table-bordered" id="product_list2">
        <thead>
          <tr>
            <th>Action</th>
            <th>Product Code</th>
            <th>Product</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Amount</th>
          </tr>
        </thead>
        <tbody id="product_body2"></tbody>
      </table>
    </div>
  </div>
</div>




      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close <i class="fa-solid fa-xmark"></i></button>
      </div>
    </div>
  </div>
</div>


