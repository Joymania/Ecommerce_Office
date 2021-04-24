@extends('admin.layout.master')
@section('title', 'Add Purchase')
@section('parentPageTitle', 'Purchase')


@section('content')

    <div class="row clearfix">

        @if(session()->has('msg')) 
            <div class="col-lg-12 col-md-12">
                    <div class="alert alert-primary" role="alert">
                        {{ session()->get('msg') }} 
                    </div>
            </div>
        @endif



        <div class="col-lg-12 col-md-12">
            <div class="card planned_task">
                <div class="header">
                    <h2>Add Purchase</h2>
                    <ul class="header-dropdown">
                        <li class="dropdown">
                            <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"></a>
                            <ul class="dropdown-menu dropdown-menu-right">
                                <li><a href="javascript:void(0);">Action</a></li>
                                <li><a href="javascript:void(0);">Another Action</a></li>
                                <li><a href="javascript:void(0);">Something else</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="body">
                    <div class="row clearfix">
                        <div class="col-lg-12">
                            <div class="card">
                                <p class="italic"><small>The field labels marked with * are required input fields.</small></p>
                                <div class="body">
                                    <form method="POST" id="purchase_form" action="{{ route('purchase.store') }}">
                                        @csrf
                                        <div class="form-row">
                                            <div class="col">
                                                <label for="purchase_status">Purchase Status</label>
                                                <select id="purchase_status" name="purchase_status" class="multiselect multiselect-custom form-control">
                                                    <option value="1">Received</option>
                                                    <option value="2">Partial</option>
                                                    <option value="3">Pending</option>
                                                    <option value="4">Ordered</option>
                                                </select>
                                            </div>

                                            <div class="col">
                                            
                                            <!-- @foreach($suppliers as $key => $supplier)
                                                        {{$supplier['name']}}
                                            @endforeach -->

                                                <label for="supplier_id">Supplier</label>
                                                <select id="supplier_id" name="supplier_id" class="multiselect multiselect-custom form-control">
                                                    <option value="0">Select supplier...</option>
                                                    
                                                    <option value="1">Rakib</option>
                                                    <option value="2">Sakib</option>
                                                    <option value="3">Hasib</option>
                                                </select>
                                            </div>

                                        </div>

                                        <div class="form-row" id="search-result-box">
                                            <div class="col mt-2 form-group">
                                                <label for="product_search">Select Product</label>
                                                <input type="text" id="product_search" name="product_search" class="form-control" autocomplete="off" placeholder="Please type product code and select...">
                                        
                                            </div>
                                        </div>



                                        <div class="mt-4">
                                            <label>Order Table *</label>
                                            <div class="table-responsive">
                                                <table class="table table-bordered table-hover js-basic-example order-list dataTable table-custom">
                                                    <thead>
                                                    <tr>
                                                        <th>Name</th>
                                                        <th>Code</th>
                                                        <th>Quantity</th>
                                                        <th class="recieved-product-qty d-none">Received</th>
                                                        <th>Net Unit Cost</th>
                                                        <th>Discount</th>
                                                        <th>Tax</th>
                                                        <th>SubTotal</th>
                                                        <th><i class="icon-trash"></i></th>
                                                    </tr>
                                                    </thead>
                                                    <tfoot>
                                                    <tr>
                                                        <th colspan="2">Total</th>
                                                        <th colspan="2" id="total-qty">0</th>
                                                        <th class="recieved-product-qty d-none"></th>
                                                        <th id="total-discount">0.00</th>
                                                        <th id="total-tax">0.00</th>
                                                        <th id="total">0.00</th>
                                                        <th><i class="icon-trash"></i></th>
                                                    </tr>
                                                    </tfoot>
                                                    <tbody>
                                                   
                                                    <!-- <tr>
                                                        <td>Shirt</td>
                                                        <td>ABC123</td>
                                                        <td><input type="number" class="form-control qty" name="qty[]" value="1" step="any" required=""></td>
                                                        <td class="recieved-product-qty d-none"><input type="number" class="form-control qty" name="qty[]" value="1" step="any" required=""></td>
                                                        <td>5000</td>
                                                        <td>50</td>
                                                        <td>no</td>
                                                        <td>5050</td>
                                                        <td>
                                                            <form action="" class="deleteForm">
                                                                <button class="btn btn-danger btn-sm" type="submit" data-toggle="tooltip" title="Delete item!">Delete</button>
                                                                <!-- <i class="icon-trash"></i> -->
                                                            <!-- </form>
                                                        </td>
                                                    </tr> --> 

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="form-row mt-2">
                                            <div class="col">
                                                <label for="order_tax_rate">Order Tax</label>
                                                <select id="order_tax_rate" name="order_tax_rate" class="multiselect multiselect-custom form-control">
                                                    <option value="">No Tax</option>
                                                    <option value="10">vat@10</option>
                                                    <option value="15">vat@15</option>
                                                </select>
                                            </div>
                                            <div class="col">
                                                <label for="order_discount">Discount</label>
                                                <input type="number" id="order_discount" name="order_discount" placeholder="Discount" class="form-control" >
                                            </div>
                                            <div class="col">
                                                <label for="shipping_cost">Shipping Cost</label>
                                                <input type="number" id="shipping_cost" name="shipping_cost" class="form-control" placeholder="Shipping Cost">
                                            </div>
                                        </div>

                                        <div class="form-row mt-2">
                                            
                                            <div class="col">
                                                <label for="productPrice">Note</label>
                                                <textarea name="note" id="" class="form-control" cols="30" rows="5" name="note" placeholder="Purchase Note..."></textarea>
                                            </div>
                                        </div>

                                        <div class="form-row mt-2">

                                            <div class="col">
                                                <button type="submit" id="form_submit_btn" class="btn btn-primary">Submit</button>
                                            </div>

                                        </div>
                                    </form>


                                    <div class="mt-4">
                                            <div class="table-responsive">
                                                <table class="table table-bordered table-hover js-basic-example dataTable table-custom">
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <strong>Items</strong>
                                                                <span class="pull-right" id="item">0.00</span>
                                                            </td>
                                                            <td>
                                                                <strong>Total</strong>
                                                                <span class="pull-right" id="subtotal">0.00</span>
                                                            </td>
                                                            <td>

                                                                <strong>Order Tax</strong>
                                                                <span class="pull-right" id="total_order_tax">0.00</span>
                                                            </td>
                                                            <td>
                                                                <strong>Order Discount</strong>
                                                                <span class="pull-right" id="total_order_discount">0.00</span>
                                                            </td>
                                                            <td>
                                                                <strong>Shipping Cost</strong>
                                                                <span class="pull-right" id="total_shipping_cost">0.00</span>
                                                            </td>
                                                            <td>
                                                                <strong>Grand Total</strong>
                                                                <span class="pull-right" id="grand_total">0.00</span>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>



<!-- Modal Dialogs ========= --> 
<!-- Default Size -->
<div class="modal fade" id="proudct_edit_modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="title" id="proudct_edit_modalLabel">Modal title</h4>
            </div>
            <div class="modal-body"> 

                <div>
                    <form method="POST">
                        <div class="form-row">
                            <div class="col">
                                <label for="edit_pro_qty">Quantity</label>
                                <input type="number" id="edit_pro_qty" class="form-control" >
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <label for="edit_pro_discount">Unit Discount</label>
                                <input type="number" id="edit_pro_discount" class="form-control" >
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <label for="edit_pro_unit_cost">Unit Cost</label>
                                <input type="number" id="edit_pro_unit_cost" class="form-control" >
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col">
                                <label for="edit_pro_tax">Tax Rate</label>
                                <select id="edit_pro_tax" name="" class="form-control">
                                    <option value="">No Tax</option>
                                    <option value="10">vat@10</option>
                                    <option value="15">vat@15</option>
                                </select>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary">Update</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">CLOSE</button>
            </div>
        </div>
    </div>
</div>













@stop

@push('after-styles')
<style>
    #search-result-box .dropdown-menu.show {
        top: 10% !important;
    }

    .edit-product:hover {
        cursor: pointer;
    }
</style>
@endpush

@push('after-scripts')
    
    <!-- Bootstrap 4 Autocomplete -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-4-autocomplete/dist/bootstrap-4-autocomplete.min.js" crossorigin="anonymous"></script>

<script>

    // Initial variables
    let products= @json($products_src, true);
    let order_products = [];

    // amount of total order
    let sub_total = 0.0;

    // percentage of tax
    let tax_percentage = 0;

    // amount of total tax
    let total_order_tax = 0.0;

    // amount of order discount
    let total_order_discount = 0.0;

    // amount of shipping Cost
    let total_shipping_cost = 0.0;

    let grand_total = 0.0;

    // selected product for update
    let productId = 0;

    // mapping the products and add necessary field
    let mappedProducts = [];

    function mapProducts(){
        
        mappedProducts = products.map(function(product, index){
        return {
            ...order_products, 
            qty : 1, 
            received_qty: 1, 
            discount: 0.00, 
            tax: 0.00
            };
        });
    }


    let src = products.reduce(function(items = {}, product){

            items[`${product['id']}(${product['name']})`] = product['id'];
            return items;
        }, {}
    );


    // Purchase Status
    $('select[name="purchase_status"]').on('change', function() {
        if($('select[name="purchase_status"]').val() == 2){
            $(".recieved-product-qty").removeClass("d-none");
        } else if(($('select[name="status"]').val() == 3) || ($('select[name="status"]').val() == 4)){
            $(".recieved-product-qty").addClass("d-none");
        } else {
            $(".recieved-product-qty").addClass("d-none");
        }
    });

    $('#product_search').on('input', function(e) {
        // setTimeout(function(){
        //     console.log(e.target.value);
        // }, 1000);
    });


    // make table tr
    function tableRow(product){
        let newRow = $('<tr id="pro-'+product.id+'">');
        let cols = '';
                  

        // cols += '<td>'+product.name+' <span class="edit-product pull-right" data-productId="'+ product.id +'"><i class="icon-note"  data-productId="'+ product.id +'"></i></span></td>';
        // cols += '<td>'+product.id+' </td>';

        cols += '<td>'+product.name+' </td>';
        cols += '<td>'+product.id+' </td>';
        cols += '<td><input type="number" class="form-control product-qty" data-productId="'+ product.id +'" name="qty" value="1" step="any" required=""></td>';
        cols += '<td class="recieved-product-qty d-none"><input type="number" class="form-control qty received-qty" name="received_qty" data-productId="'+ product.id +'"  value="1" step="any" required=""></td>';
        cols += '<td>'+ parseFloat(product.price).toFixed(2) +'</td>';
        cols += '<td>'+ parseFloat(product.discount).toFixed(2) +'</td>';
        cols += '<td>'+ parseFloat(product.tax).toFixed(2) +'</td>';
        cols += '<td class="subtotal-'+product.id+'">'+ parseFloat(product.price*product.qty).toFixed(2) +'</td>';
        cols += '<td> <button class="btn btn-danger btn-sm delete-product" type="button"  data-productId="'+ product.id +'" title="Delete item!">Delete</button> </td>';
        newRow.append(cols);
        $("table.order-list tbody").append(newRow);
    }

    function printTable(){
        $("table.order-list tbody").empty();
        mappedProducts.forEach(function(product,index){
            tableRow(product);
        });
    }

    // main calculation 
    function calculateTotal(){
        // Count Total Quantity
        let total_qty = mappedProducts.reduce(function(tt,cc){
            return Number(tt) + Number(cc.qty);
        }, 0);
        $('#total-qty').text(total_qty);

        // Count SubTotal
        sub_total = mappedProducts.reduce(function(tt,cc){
            return Number(tt) + (Number(cc.qty) * Number(cc.price));
        }, 0);
        
        $('#total').text(parseFloat( sub_total).toFixed(2));
        
        // Order Tax, Discount, Shipping Cost
        $('#total_order_tax').text(parseFloat(total_order_tax).toFixed(2));
        $('#total_order_discount').text(parseFloat(total_order_discount).toFixed(2));
        $('#total_shipping_cost').text(parseFloat(total_shipping_cost).toFixed(2));
        
        // Items
        $('#item').text(`${mappedProducts.length} (${total_qty})`);
        $('#subtotal').text(parseFloat( sub_total).toFixed(2));

        // Grand Total
        let total = Number(sub_total) - Number(total_order_discount);
        grand_total = total+Number(total_order_tax)+ Number(total_shipping_cost);
        $('#grand_total').text(parseFloat( grand_total).toFixed(2));
        // grand_total
    }
    calculateTotal();

    // calculation amount of order tax
    function calculateOrderTax(){
        let total = Number(sub_total) - Number(total_order_discount);
        total_order_tax = Number(total) * Number(tax_percentage);
    }


    function eventInit () {
        
        // product quantity
        $('.product-qty').on('input', function(e) {

        let qty = e.target.value;
        let productId = $(e.target).data('productid');
        let index = mappedProducts.findIndex(function(item){
            return item.id == productId;
        });

        let subTotal = parseFloat( mappedProducts[index].price * qty).toFixed(2);

        if(qty <= 0 ){
            alert('Quantity must be 1 or more.');
            e.target.value = 1;
            mappedProducts[index].qty = 1;
            $('.subtotal-' + productId).text(parseFloat( mappedProducts[index].price).toFixed(2));
            calculateTotal();
            return;
        }

        mappedProducts[index].qty = qty;
            $('.subtotal-' + productId).text(subTotal);

            calculateTotal();
        });

        // received product quantity
        $('.received-qty').on('input', function(e) {

            let recieved_qty = e.target.value;
            let productId = $(e.target).data('productid');
            let index = mappedProducts.findIndex(function(item){
                return item.id == productId;
            });

            if(recieved_qty <= 0 ){
                alert('Quantity must be 1 or more.');
                e.target.value = 1;
                calculateTotal();
                return;
            }
            mappedProducts[index].received_qty = recieved_qty;

            // console.log(mappedProducts);

        });

        // tax Rate
        $('#order_tax_rate').on('input', function(e) {
            let taxRate = e.target.value;
            if(!taxRate || taxRate == ''){
                total_order_tax = 0.00.toFixed(2);
                calculateTotal();
                return;
            }
            tax_percentage = Number(taxRate)/100;
            calculateOrderTax();
            calculateTotal();
        });

        // discount
        $('#order_discount').on('input', function(e) {
            let discount = e.target.value;
            if(discount < 0 || discount == ''){
                e.target.value = 0;
                total_order_discount = 0.00.toFixed(2);
                calculateTotal();
                return;
            }
            total_order_discount = parseFloat(discount).toFixed(2);
            calculateOrderTax();
            calculateTotal();
        });

        // shipping cost
        $('#shipping_cost').on('input', function(e) {
            let cost = e.target.value;
            if(cost < 0 || cost == ''){
                e.target.value = 0;
                total_shipping_cost = 0.00.toFixed(2);
                calculateTotal();
                return;
            }

            total_shipping_cost = parseFloat(cost).toFixed(2);
            calculateTotal();
        });

        // Delete product from order table
        $('.delete-product').on('click', function(e) {

            let productId = $(e.target).data('productid');

            if(confirm("Do you want to delete this item?")){

                let index = mappedProducts.findIndex(function(product){
                    return product.id == productId;
                });
                
                mappedProducts.splice(index, 1);

                $(e.target).parent().parent().remove();

                calculateOrderTax();
                calculateTotal();
            }
        });

        // Edit product from order table
        $('.edit-product').on('click', function(e) {
            // todo: will implement if product table is ready....

            // productId = $(e.target).data('productid');

            // let product = mappedProducts.find(function(product){
            //     return product.id == productId;
            // });

            // $("#proudct_edit_modal").modal("show");

            // $('#edit_pro_qty').val(product.qty);
            // $('#edit_pro_discount').val(product.discount);
            // $('#edit_pro_unit_cost').val(product.price);

            // console.log(product);

            alert('Need to complete product table.');
        });


        // Submit the form
        // $('#purchase_form').on('submit', function(e) {
        $('#form_submit_btn').on('click', function(e) {
            e.preventDefault();

            let supplierId = $('#supplier_id').val();

            if(supplierId == 0){
                alert('Please select a supllier');
                return;
            }

            $("<input />").attr("type", "hidden")
            .attr("name", "orders")
            .attr("value", JSON.stringify(mappedProducts))
            .appendTo("#purchase_form");

            // $("<input />").attr("type", "hidden")
            //   .attr("name", "tax_percentage")
            //   .attr("value", tax_percentage)
            //   .appendTo("#purchase_form");  

            $("<input />").attr("type", "hidden")
            .attr("name", "tax_amount")
            .attr("value", total_order_tax)
            .appendTo("#purchase_form");  

            $("<input />").attr("type", "hidden")
            .attr("name", "discount")
            .attr("value", total_order_discount)
            .appendTo("#purchase_form");  

            $("<input />").attr("type", "hidden")
            .attr("name", "shipping_cost")
            .attr("value", total_shipping_cost)
            .appendTo("#purchase_form"); 

            $("<input />").attr("type", "hidden")
            .attr("name", "grand_total")
            .attr("value", grand_total)
            .appendTo("#purchase_form");  


            $( "#purchase_form" ).submit();
        });

    }



    


    function productSearch(id) {
        
        let exist = mappedProducts.findIndex(function(item){
            return item.id == id;
        })

        if(exist != -1) {
            $('#product_search').val('');
            return;
        }

        $.ajax({
            type: 'GET',
            url: '/products/'+id,
            success: function(data) {
                order_products.push(data);
                // console.log(order_products);

                mappedProducts.push(
                    {
                        ...data, 
                        qty : 1, 
                        received_qty: 1, 
                        discount: 0.00, 
                        tax: 0.00
                    }
                );

                // console.log(mappedProducts);
                printTable();
                eventInit();
                calculateTotal();

                $('#product_search').val('');
            }
        });
    }

    function onSelectItem(item, element) {
        // console.log(item.value);
        productSearch(item.value);
    }

    $('#product_search').autocomplete({
        source: src,
        onSelectItem: onSelectItem,
        highlightClass: 'text-danger',
        // treshold: 2,
    });

</script>
@endpush