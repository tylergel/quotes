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
		 <i class="clicktohide fas fa-bars"></i> Add Company
	 

	  </div>
	  <?= $this->Form->create(null, [
      'url' => ['controller' => 'Quotes', 'action' => 'newcompany']
  ]); ?>
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
	  <div class = "col-md-12 text-center">
<button type="submit" class="col-md-3 btn btn-success">Save</button>
<button type="button" class="col-md-3 btn btn-secondary">Cancel</button>
</div>
	  </div>
	  </div>
	  </form>
	  <?php foreach($companies as $company) { ?>
	      <div  class = "card col-12" >
     
	<div class="card-header">
		 <i class="clicktohide fas fa-bars"></i> <?= $company['company_name'] ?>
		  <a class = "float-right" href = <?= $this->Url->build([
    "controller" => "Quotes",
    "action" => "deletecompany",
   $company['id'],
]); ?>><i class="fas fa-trash"></i></a>
	 

	  </div 
	  <div id = "company_information" class="card-body">
		<ul class="list-group list-group-flush">

		<li class="list-group-item">
		<div class = "row">
			<label for="company_name" class = "col-md-4 ">Company Name:</label>
			<?= $company['company_name'] ?>
			</div>
			</li>

		<li class="list-group-item"><div class = "row">
			<label for="phone_number" class = "col-md-4 ">Phone Number:</label>
			<?= $company['phone_number'] ?>
			</div></li>
      <li class="list-group-item ">
		<div class = "row">
			<label for="email" class = "col-md-4 ">Email:</label>
		<?= $company['email'] ?>
			</div>
			</li>
			<li class="list-group-item ">
		<div class = "row">
			<label for="street_address" class = "col-md-4 ">Street Address:</label>
			<?= $company['street_address'] ?>
			</div>
			</li>
	  </ul> 
	  </div>
	  <?php } ?> 
    </div> </html>
    
    <script>
        $('.clicktohide').click(function() {
       $(this).parent().next().toggle();
	}); 
    </script>