<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */
use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Http\Exception\NotFoundException;


$cakeDescription = 'CakePHP: the rapid development PHP framework';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>
    </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <?= $this->Html->meta('icon') ?>
    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('style.css') ?>
    <?= $this->Html->css('home.css') ?>
    <link href="https://fonts.googleapis.com/css?family=Raleway:500i|Roboto:300,400,700|Roboto+Mono" rel="stylesheet">
</head>
<body style = "background-color: 00bfff;">
   
<div class = "container">
    <?= $this->Flash->render() ?>
<div class="card mt-3">
  <div class="card-body">
    <i class="clicktohide "></i> New Quote
  </div>
</div>
<div class="card mt-2">
<?= $this->Form->create(null, [
      'url' => ['controller' => 'Quotes', 'action' => 'new']
  ]); ?>
<div>
<div class="card-header">
     <i class="clicktohide fas fa-bars"></i> Quote Information
  </div>
  <div class="card-body">
    <ul class="list-group list-group-flush">

    <li class="list-group-item">
			Quote ID: <?= $count; ?>
		</li>
    <li class="list-group-item">
  <div class = "row">
    <label for="subject" class = "col-md-4 ">Subject:</label>
    <input type="text" class="col-md-8 form-control" name = "subject" id="subject">
    </div>
    </li>
		<li class="list-group-item">
	<div class = "row">
		<label for="date" class = "col-md-4 ">Date:</label>
		<input type="date" value="<?php echo date('Y-m-d'); ?>" class="col-md-4 form-control" name = "date" id="date">
		</div>
		</li>
		<li class="list-group-item">
	<div class = "row">
		<label for="valid_date" class = "col-md-4 ">Valid until:</label>
		<input type="date" value="<?php echo date('Y-m-d'); ?>" class="col-md-4 form-control" name = "valid_date" id="valid_date">
		</div>
		</li>
		<li class="list-group-item">
	<div class = "row">
		<label for="prepared_by" class = "col-md-4 ">Prepared by:</label>
		<input type="text" class="col-md-8 form-control" name = "prepared_by" id="prepared_by">
		</div>
		</li>
    <li class="list-group-item">
	<div class = "row">
		<label for="description" class = "col-md-4 ">Description of work:</label>
		<textarea class="col-md-8 form-control" name = "description" id="description" rows="3"></textarea>
		</div>
		</li>

  </ul>
  </div>
  </div>
  <div>
     
	<div class="card-header">
		 <i class="clicktohide fas fa-bars"></i> Company Information 
		 <select id = "company_select" class="selectpicker" name = "company_id">
		     <option>Select Company</option>
		     <option value = "choose">ADD NEW COMPANY</option>
           <?php foreach($companies as $company) {
		    echo "<option value = '".$company['id']."'>".$company['company_name']."</option>";
		 } ?> 
        </select>

	  </div>
	  <div id = "company_information" class="card-body">
		<ul class="list-group list-group-flush">

		<li class="list-group-item">
		<div class = "row">
			<label for="company_name" class = "col-md-4 ">Company Name:</label>
			<input type="text" class="col-md-8 form-control" name = "company_name" id="company_name">
			</div>
			</li>

		<li class="list-group-item"><div class = "row">
			<label for="phone_number" class = "col-md-4 ">Phone Number:</label>
			<input type="text" class="col-md-8 form-control" name = "phone_number" id="phone_number">
			</div></li>
      <li class="list-group-item ">
		<div class = "row">
			<label for="email" class = "col-md-4 ">Email:</label>
			<input type="text" class="col-md-8 form-control" name = "email" id="email">
			</div>
			</li>
			<li class="list-group-item ">
		<div class = "row">
			<label for="street_address" class = "col-md-4 ">Street Address:</label>
			<input type="text" class="col-md-8 form-control" name = "street_address" id="street_address">
			</div>
			</li>
	  </ul>
	  </div>
	  </div>
  <div>
	  <div class="card-header">
		 <i class="clicktohide fas fa-bars"></i> Customer Information
		 <select id = "customer_select" class="selectpicker" name = "customer_select_id">
		     <option>Select Customer</option>
		     <option value = "choose">ADD NEW CUSTOMER</option>
           <?php foreach($customers as $customer) {
		    echo "<option value = '".$customer['id']."'>".$customer['customer_name']."</option>";
		 } ?> 
        </select>
	  </div>
	  <div id = "customer_information" class="card-body">
		<ul class="list-group list-group-flush">

		<li class="list-group-item">
		<div class = "row">
			<label for="customer_company_name" class = "col-md-4 ">Customer Company Name:</label>
			<input type="text" class="col-md-8 form-control" name = "customer_company_name" id="customer_company_name">
			</div>
			</li>
		<li class="list-group-item">
		<div class = "row">
			<label for="customer_name" class = "col-md-4 ">Customer Name:</label>
			<input type="text" class="col-md-8 form-control" name = "customer_name" id="customer_name">
			</div>
			</li>
			<li class="list-group-item">
		<div class = "row">
			<label for="customer_id" class = "col-md-4 ">Customer ID:</label>
			<input type="text" class="col-md-8 form-control" name = "customer_id" id="customer_id">
			</div>
			</li>
		<li class="list-group-item"><div class = "row">
			<label for="customer_phone_number" class = "col-md-4 ">Customer Phone Number:</label>
			<input type="text" class="col-md-8 form-control" name = "customer_phone_number" id="customer_phone_number">
			</div></li>
      <li class="list-group-item"><div class = "row">
        <label for="customer_email" class = "col-md-4 ">Customer Email:</label>
        <input type="text" class="col-md-8 form-control" name = "customer_email" id="customer_email">
        </div></li>
			<li class="list-group-item ">
		<div class = "row">
			<label for="street_address" class = "col-md-4 ">Customer Street Address:</label>
			<input type="text" class="col-md-8 form-control" name = "customer_street_address" id="customer_street_address">
			</div>
			</li>
	  </ul>
	  </div>
  </div>
  <div>
	  <div class="card-header">
		 <i class="clicktohide fas fa-bars"></i> Product Information
	  </div>
	  <div class="card-body">
		<ul class="list-group list-group-flush">
		<li id = "addMember" class="list-group-item">Add row <i  class="fas fa-plus"></i></li>
		<table  id = "form">

		</table>
	  </ul>
	  </div>
  </div>
  <div class = " row ">
<div class = "col-md-12 text-center">
<button type="submit" class="col-md-3 btn btn-success">Save</button>
<button type="button" class="col-md-3 btn btn-secondary">Cancel</button>
</div>
</div>
</form>
</div>


</div>
</body>
<script type="text/javascript">

   
$( document ).ready(function() {
 $("#company_information").hide();
$( "#company_select" ) .change(function () {  
    if($(this).val() == "choose") {
         $("#company_information").show();
    }
    else {
    $("#company_information").hide();
    }
}); 

 $("#customer_information").hide();
$( "#customer_select" ) .change(function () {  
    if($(this).val() == "choose") {
         $("#customer_information").show();
    }
    else {
    $("#customer_information").hide();
    }
}); 

var count=0;
    $('#addMember').click(function() {
       if(!count) {
	   $("#form").append("<tr id = 'defaults'><th>Product</th><th>Price</th><th>Quantity</th><th >Total</th><th></th></tr>");
	   }
        $("#form").append("<tr  id = '" + count + "row'><td><input type='text' name='product[" + count + "][product]'></td><td><input placeholder = '0.00' id = '" + count + "_price' onchange='check($(this));' onkeyup='this.onchange();' onpaste='this.onchange();' oninput='this.onchange();' type='text' name='product[" + count + "][price]'></td><td ><input id = '" + count + "_quantity' onchange='check($(this));' onkeyup='this.onchange();' onpaste='this.onchange();' oninput='this.onchange();' type='text' name='product[" + count + "][quantity]' value = '1'></td><td><input placeholder = '0' id = '" + count + "_total' onchange='check($(this));' onkeyup='this.onchange();' onpaste='this.onchange();' oninput='this.onchange();'  type='text' name='product[" + count + "][total]'></td><td class = 'remove' data-count= '" + count + "row'><i  class='fas fa-minus'></i></td></tr>");

        var thewholeall = $('#alltot').val();
        if (thewholeall === undefined) {
          thewholeall = 0;
        }
        $("#defaultend").remove();
        $("#form").append("<tr id = 'defaultend'><td></td><td></td><td></td><td class = 'alltot'><input value = '" + thewholeall + "' name = 'quote_total' id = 'alltot' type = 'text'></td><td></td></tr>");


     count++;
	});
	 $('#form').on('click', '.remove',function() {

		var removeid = "#";
		removeid = removeid + $( this ).data( "count" );
		$(removeid).remove();
		if(count == 1) {
		$("#defaults").remove();
    $("#defaultend").remove();
		}
		count--;
});
$('.clicktohide').click(function() {
       $(this).parent().next().toggle();
	});
});

function check(e){

          var str = $(e).attr('id');
          var currentCount = str.substring(0,str.indexOf("_"));
          var multiply = $("#" + currentCount +"_price").val();
          if (str.indexOf("price") >= 0) {
            var multiply = $("#" + currentCount +"_quantity").val();
          }
          var total = $(e).val() * multiply;
          if (str.indexOf("total") >= 0) {

          } else {
            $("#" + currentCount +"_total").val(total);
          }
          var alltotal = 0;
          $('*[id*=_total]:visible').each(function() {
            alltotal = parseFloat(alltotal) + parseFloat($(this).val());
        });
          $("#alltot").val(alltotal);
     }
</script>
</html>
