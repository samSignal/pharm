getProductCode2();

function getProductCode2(){
    $("#procode2").empty();
    $("#procode2").keyup(function (e){
        //var q = $("#procode").val();
        $.ajax({
            type: "POST",
            url: "deliveryData.php",
            dataType: "JSON",
            data: {procode: $("#procode2").val()},
            
            success: function(data){
                $("#pname2").val(data[0].productname);
                $("#price2").val(data[0].price);
                $("#qty2").focus();
            }
        });
    });
}

$(function(){
    $("#price2,#qty2").on("keydown keyup click",qty);
    function qty(){
        var sum = (
            Number($("#price2").val())*Number($("#qty2").val())
        );
        $('#total2').val(sum);
    }
});

$(function(){
    $("#pay2,#finaltotal2").on("keydown keyup click",finaltot);
    function finaltot(){
        var sum = (
            Number($("#pay2").val())-Number($("#finaltotal2").val())
        );
        $('#bal2').val(sum);
    }
});

$('#add2').on('click',function(){

    $SupplierName = $('#Supplier').val();
    //Validation on forms if its empty
    var code = $('#procode2').val();
    var pname = $('#pname2').val();
    var price = $('#price2').val();
    var qty = $('#qty2').val();
    var total = $('#total2').val();

    if($SupplierName == 'Choose..'){
        Swal.fire(
            'Error!',
            'please choose a supplier Name First',
            'error'
        )
    }
    else if(code == '' || qty == '' || total == ''){
                
       
                
                   Swal.fire(
                       'Error!',
                       'Input field cannot be empty',
                       'error'
                   )

       
                if(pname =='' && price == ''){
                   Swal.fire(
                       'Error!',
                       'Product does not exist',
                       'error'
                   )
                }
    }
    
    else{
       
                    var products ={
                        procode2: $("#procode2").val(),
                        pname2: $("#pname2").val(),
                        price2: $("#price2").val(),
                        qty2: $("#qty2").val(),
                        total2: $("#total2").val(),
                        button: '<button type="button" class="btn btn-danger">Delete</button>'
                     };
             
                         addRow2(products);
                        $('#frmInvoice2')[0].reset();
                
            }
            
})


var total = 0;

function addRow2(products){
    var $table = $('#product_list2 tbody');
   
    var $row = 
            $('<tr>'+
                '<td> <button type="button" name="record" class="btn btn-warning btn-xsm" onclick="deleterow2(this)">Delete</button></td>'+
                    '<td>'+ products.procode2 +'</td>' +
                    '<td><input type="hidden" name="pname[]" value="'+ products.pname2 +'" id="prod">'
                         + products.pname2 +'</td>' +
                    '<td><input type="hidden" name="pprice[]" value="'+  products.price2 +'" id="price_data">'+ 
                        products.price2 +'</td>' +
                    '<td><input type="hidden" name="pqty[]" value="'+   products.qty2 +'" id="qty_data">'+ 
                        products.qty2 +'</td>' +
                    '<td><input type="hidden" name="ptotal[]" value="'+   products.total2 +'" id="qty_data">'+ 
                        products.total2 +'</td>' +
                '</tr>'    
            
            );
                
           
            $row.data('procode2',products.procode2); 
            $row.data('procode2',products.procode2); 
            $row.data('pname',products.pname2); 
            $row.data('price',products.price2); 
            $row.data('qty',products.qty2); 
            $row.data('total',products.total2);

            
            total+=Number(products.total2);

            $('#finaltotal2').val(total);

            $table.append($row);

            $row.find('deleterow').click(function(event){
                deleterow2($(event.currentTarget).parent('tr'));
            });

}


/**
 * Deletes a row from the table.
 * @param {object} e - The event parameter.
 */
function deleterow2(e){
    // Get the product total cost from the last cell of the row
    const product_total_cost = parseInt($(e).parent().parent().find('td:last').text(), 10);
    
    // Subtract the cost from the total
    product_total_cost = parseInt($(e).parent().parent().find('td:last').text(),10);
    total -= product_total_cost;
    
    // Update the total balance
    $('#finaltotal2').val(total);
    
    // Remove the row
    $(e).parent().parent().remove();
}


$('#submit2').on('click', function () {
    // Collect basic details
    var payment = parseFloat($('#pay2').val()) || 0;
    var totalBalance = parseFloat($('#finaltotal2').val()) || 0;
    var referrence = $('#ref').val();
    var Supplier = $('#Supplier').val();
    var xpdate = $('#xpdate').val();

    // Validate payment
    if (payment < totalBalance) {
        Swal.fire(
            'Error!',
            'Payment is less than total purchased',
            'error'
        );
        return;
    }

    // Collect product details
    var productName = $("input[name='pname[]']").map(function () {
        return $(this).val();
    }).get();

    var productqty = $("input[name='pqty[]']").map(function () {
        return $(this).val();
    }).get();

    var productTotal = $("input[name='ptotal[]']").map(function () {
        return $(this).val();
    }).get();

    // Validate product data
    if (productName.length === 0 || productqty.length === 0 || productTotal.length === 0) {
        Swal.fire(
            'Error!',
            'No products added to the purchase list',
            'error'
        );
        return;
    }

    // Prepare data for AJAX
    var rowCount = $('#product_body2 tr').length;
    var products = [];
    for (var i = 0; i < rowCount; i++) {
        products.push({
            name: productName[i],
            quantity: productqty[i],
            total: productTotal[i]
        });
    }

    // Send AJAX request
    $.ajax({
        url: 'DeliveryFunction.php',
        method: 'POST',
        data: {
            products: JSON.stringify(products),
            Supplier: Supplier,
            referrence: referrence,
            xpdate: xpdate
        },
        success: function (data) {
            // Show success message and reload
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'Transaction Completed',
                showConfirmButton: false,
                timer: 1500
            });
            setTimeout(function () {
                location.reload();
            }, 900);
        },
        error: function () {
            Swal.fire(
                'Error!',
                'Failed to complete the transaction',
                'error'
            );
        }
    });
});
