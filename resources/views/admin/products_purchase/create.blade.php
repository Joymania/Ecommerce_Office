@extends('admin.layout.master')
@section('title', 'Add Purchase')
@section('parentPageTitle', 'Purchase')


@section('content')

    <div class="row clearfix">

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
                                    <form>
            
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
                                                    <option >Select supplier...</option>
                                                    
                                                    <option value="">Rakib</option>
                                                    <option value="">Sakib</option>
                                                    <option value="">Hasib</option>
                                                </select>
                                            </div>

                                        </div>

                                        <div class="form-row">
                                            <div class="col mt-2">
                                                <label for="product_search">Select Product</label>
                                                <input type="text" id="product_search" name="product_search" class="form-control" placeholder="Please type product code and select...">
                                            </div>
                                        </div>



                                        <div class="mt-4">
                                            <label>Order Table *</label>
                                            <div class="table-responsive">
                                                <table class="table table-bordered table-hover js-basic-example dataTable table-custom">
                                                    <thead>
                                                    <tr>
                                                        <th>Name</th>
                                                        <th>Code</th>
                                                        <th>Quantity</th>
                                                        <th class="recieved-product-qty">Received</th>
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
                                                        <th class="recieved-product-qty"></th>
                                                        <th id="total-discount">0.00</th>
                                                        <th id="total-tax">0.00</th>
                                                        <th id="total">0.00</th>
                                                        <th><i class="icon-trash"></i></th>
                                                    </tr>
                                                    </tfoot>
                                                    <tbody>
                                                    <tr>
                                                        <td>Shirt</td>
                                                        <td>ABC123</td>
                                                        <td><input type="number" class="form-control qty" name="qty[]" value="1" step="any" required=""></td>
                                                        <td class="recieved-product-qty"><input type="number" class="form-control qty" name="qty[]" value="1" step="any" required=""></td>
                                                        <td>5000</td>
                                                        <td>50</td>
                                                        <td>no</td>
                                                        <td>5050</td>
                                                        <td>
                                                            <form action="" class="deleteForm">
                                                                <button class="btn btn-danger btn-sm" type="submit" data-toggle="tooltip" title="Delete item!"><i class="icon-trash"></i></button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="form-row mt-2">
                                            <div class="col">
                                                <label for="order_tax_rate">Order Tax</label>
                                                <select id="order_tax_rate" name="order_tax_rate" class="multiselect multiselect-custom form-control">
                                                    <option value="">No Tax</option>
                                                    <option value="20%">20%</option>
                                                    <option value="25%">25%</option>
                                                    <option value="30%">30%</option>
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
                                                <textarea name="" id="" class="form-control" cols="30" rows="5" name="note" placeholder="Purchase Note..."></textarea>
                                            </div>
                                        </div>

                                        <div class="form-row mt-2">

                                            <div class="col">
                                                <button type="submit" class="btn btn-primary">Submit</button>
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
                                                                <span class="pull-right" id="order_tax">0.00</span>
                                                            </td>
                                                            <td>
                                                                <strong>Order Discount</strong>
                                                                <span class="pull-right" id="order_discount">0.00</span>
                                                            </td>
                                                            <td>
                                                                <strong>Shipping Cost</strong>
                                                                <span class="pull-right" id="shipping_cost">0.00</span>
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

@stop
