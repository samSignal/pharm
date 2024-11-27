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

        <div class="inputs d-flex justify-content-between">

          <div class="customer w-50 ">
            <div class="row g-2">
                <div class="mb-3 col-md-6">
                    <label for="Supplier Name" class="mb-2 text-center">Supplier Name</label>
                    <select  class="form-control select" data-live-search="true" data-live-search="true"  name="Supplier"  id="Supplier">
                    <option selected disabled>Choose..</option>
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
            </div>

            <form action=""  id="frmInvoice2">

              <div class="row g-2">
                  <div class="mb-3 col-md-6">
                      <label for="ref no" class="mb-2 text-center">Ref. No.</label>
                      <input type="number" class="form-control" name="ref" id="ref" placeholder="Reference Number">
                  </div>

                  <div class="mb-3 col-md-6">
                      <label for="expiry date" class="mb-2 text-center">Expiry date</label>
                      <input type="date" class="form-control" name="xpdate" id="xpdate">
                  </div>
              </div>

              <div class="row g-2">
                  <div class="mb-3 col-md-6">
                    <input type="text" class="form-control me-2 mb-3" name="procode2" id="procode2" placeholder="Product Code">
                  </div>

                  <div class="mb-3 col-md-6">
                    <input type="text" class="form-control mb-3" name="pname2" id="pname2" placeholder="Product Name" readonly>
                  </div>
              </div>

              <div class="row g-2">
                  <div class="mb-3 col-md-6">
                    <input type="number" class="form-control me-2 mb-3" name="price2" id="price2" placeholder="price" readonly>
                  </div>

                  <div class="mb-3 col-md-6">
                    <input type="number" class="form-control mb-3" name="qty2" id="qty2" placeholder="Quantity">
                  </div>
              </div>

              <div class="row">
                  <div class="mb-3 col-12">
                    <input type="number" class="form-control mb-3" name="total2" id="total2" placeholder="Total" readonly>
                  </div>
              </div>
          
              <div class="form-group">
                <button type="button" class="btn btn-primary" name="procode2" id="add2" placeholder="add">
                          Add to purchase list
                </button>
              </div>
          
            </div>
            </form>

            <div class="pos w-50 px-5">
              <div class="row">
                  <div class="mb-3 col-12">
                    <label for="">Total</label>
                    <input type="number" class="form-control" name="finaltotal2" id="finaltotal2" readonly>
                  </div>
              </div>

              <div class="row">
                  <div class="mb-3 col-12">
                    <label for="">Pay Amount</label>
                    <input type="number" class="form-control" name="pay2" id="pay2">
                  </div>
              </div>

              <div class="row">
                  <div class="mb-3 col-12">
                    <label for="">Change</label>
                    <input type="number" class="form-control" name="bal2" id="bal2" readonly>
                  </div>
              </div>
              <div class="form-group p-2">
                  <input type="button" class="btn btn-primary col-12" name="submit2" id="submit2" value="Pay">
              </div>
          </div>

        </div>

        <div class="data">
          <table class="table datatable-button-html5-tab" id="product_list2">
              <thead>
                  <tr>
                      <th>Action</th>
                      <th scope="col">Product</th>
                      <th scope="col">Price</th>
                      <th scope="col">quantity</th>
                      <th scope="col">Amount</th>
                  </tr>
              </thead>
              <tbody id="product_body2">
                  
              </tbody>
          </table>
        </div>

      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close <i class="fa-solid fa-xmark"></i></button>
      </div>
    </div>
  </div>
</div>


