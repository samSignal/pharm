<!-- Modal for adding medicine -->
<div class="modal fade" id="addMedicineModal" data-backdrop="static" data-keyboard="false"  tabindex="-1" aria-labelledby="addMedicineModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addMedicineModalLabel">Add Medicine</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <form action="medADDlist.php" method="POST" >
          <div class="row g-2">
            <div class="mb-3 col-md-6">
              <label for="productID" class="form-label">Product ID</label>
              <input type="text" class="form-control" id="productID" name="productID" required>
            </div>

            <div class="mb-3 col-md-6">
              <label for="Brand_name" class="form-label">Brand Name</label>
              <input type="text" class="form-control" id="Brand_name" name="Brand_name" required>
            </div>
          </div>

          <div class="row g-2">
            <div class="mb-3 col-md-6">
              <label for="unit" class="form-label">Unit</label>
              <input type="text" class="form-control" id="unit" name="unit" required>
            </div>

            <div class="mb-3 col-md-6">
              <label for="Type" class="form-label">Type</label>
              <select class="form-control select" id="Type" name="Type" required>
                <option value= selected >Choose..</option>
                <?php 
                    $medicine_Type = $pdo->prepare('SELECT MedicineType FROM medicinetype');
                    $medicine_Type->execute();
                    if($medicine_Type->rowCount() > 0){
                        foreach($medicine_Type as $med):
                        $med_data = $med->MedicineType;
                        echo "<option value='$med_data'>$med_data</option>";
                        endforeach;
                    }
                ?>
              </select>
            </div>
          </div>

          <div class="row g-2">
            <div class="mb-3 col-md-6">
              <label for="Categories" class="form-label">Categories</label>
              <select class="form-control select" id="Categories" name="Categories" required>
                <option value= selected >Choose..</option>
                <?php 
                    $medicine_Category = $pdo->prepare('SELECT Medicine_Category FROM medicinecategories');
                    $medicine_Category->execute();
                    if($medicine_Category->rowCount() > 0){
                        foreach($medicine_Category as $medCat):
                        $med_Category = $medCat->Medicine_Category;
                        echo "<option value='$med_Category'>$med_Category</option>";
                        endforeach;
                    }
                ?>
              </select>
            </div>

            <div class="mb-3 col-md-6">
              <label for="price" class="form-label">Price</label>
              <input type="number" step="0.01" class="form-control" id="price" name="price" required>
            </div>

          </div>

          <div class="row g-2">
            <div class="mb-3 col-md-6">
              <label for="Quantity" class="form-label">Quantity Per Piece</label>
              <input type="number" step="0.01" class="form-control" id="Quantity" name="Quantity" required>
            </div>

            <div class="mb-3 col-md-6">
              <label for="expiration" class="form-label">Expiration Date</label>
              <input type="date" class="form-control" id="expiration" name="expiration" required>
            </div>
          </div>

          <div class="row g-2">
            <div class="mb-3 col-12">
              <label for="description" class="form-label">Description</label>
              <textarea class="form-control" id="description" name="description" rows="3"></textarea>
            </div>
          </div>

          <div class="row g-2">
            <div class="mb-3 col-12 form-check">
              <input type="checkbox" class="form-check-input" id="prescribe" name="prescribe" value="Medicine requires prescription">
              <label class="form-check-label" for="prescribe">Medicine requires prescription</label>
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


