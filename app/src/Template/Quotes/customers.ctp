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
</head><div class = "container"><div class = "card col-12">
	  <div class="card-header">
		 <i class="clicktohide fas fa-bars"></i>Add Customer
		 
	  </div>
	   <?= $this->Form->create(null, [
      'url' => ['controller' => 'Quotes', 'action' => 'newcustomer']
  ]); ?>
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
  <div class = "col-md-12 text-center">
<button type="submit" class="col-md-3 btn btn-success">Save</button>
<button type="button" class="col-md-3 btn btn-secondary">Cancel</button>
</div>
	  </form>
	  <?php foreach($customers as $customer) { ?>
	     <div class = "col-12">
	  <div class="card-header">
		 <i class="clicktohide fas fa-bars"></i><?= $customer['customer_name'] ?>
		 <a class = "float-right" href = <?= $this->Url->build([
    "controller" => "Quotes",
    "action" => "deletecustomer",
   $customer['id'],
]); ?>><i class="fas fa-trash"></i></a>
	  </div>
	  <div id = "customer_information" class="card-body">
		<ul class="list-group list-group-flush">

		<li class="list-group-item">
		<div class = "row">
			<label for="customer_company_name" class = "col-md-4 ">Customer Company Name:</label>
			<?= $customer['customer_company_name'] ?>
			</div>
			</li>
		<li class="list-group-item">
		<div class = "row">
			<label for="customer_name" class = "col-md-4 ">Customer Name:</label>
			<?= $customer['customer_name'] ?>
			</div>
			</li>
			<li class="list-group-item">
		<div class = "row">
			<label for="customer_id" class = "col-md-4 ">Customer ID:</label>
			<?= $customer['id'] ?>
			</div>
			</li>
		<li class="list-group-item"><div class = "row">
			<label for="customer_phone_number" class = "col-md-4 ">Customer Phone Number:</label>
			<?= $customer['customer_phone_number'] ?>
			</div></li>
      <li class="list-group-item"><div class = "row">
        <label for="customer_email" class = "col-md-4 ">Customer Email:</label>
        <?= $customer['customer_email'] ?>
        </div></li>
			<li class="list-group-item ">
		<div class = "row">
			<label for="street_address" class = "col-md-4 ">Customer Street Address:</label>
			<?= $customer['customer_street_address'] ?>
			</div>
			</li>
	  </ul>
	  </div>
  </div>
	  <?php } ?>
	  </div>
  </html>
  <script>
        $('.clicktohide').click(function() {
       $(this).parent().next().toggle();
	}); 
    </script>