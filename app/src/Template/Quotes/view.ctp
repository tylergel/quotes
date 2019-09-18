<html>
<head>
    <?= $this->Html->charset() ?>
    <title>
        <?= $cakeDescription ?>
    </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src = "https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.5.0-beta4/html2canvas.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
    <?= $this->Html->meta('icon') ?>
    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('style.css') ?>
    <?= $this->Html->css('home.css') ?>

    <link href="https://fonts.googleapis.com/css?family=Raleway:500i|Roboto:300,400,700|Roboto+Mono" rel="stylesheet">

      <style>
    .example-print {
    display: none;
}
@media print {
   .example-screen {
       display: none;
    }
    .example-print {
       display: block;
    }
}
</style>
</head>
<body style = "background-color: 00bfff;">

<div class = "container example-screen">
<div class="card">
  <div class="card-body">
    <div class = "row">
        <div class = "col-2 col-xs-12">Quote # <?= $quote['id'];  ?></div>

        <div class = "col-md-2 "><button type="button" class="btn btn-secondary" onclick="hideandprint()" >Print</button></div>
       <?php /* <a  href = '<?= $this->Url->build([
           "controller" => "Quotes",
           "action" => "downloadpdf",
           $id,
       ]); ?>'><div class = "col-md-2  col-xs-12"><button type="button" class="btn btn-secondary" id = "downloadpdf" >Download PDF</button></div></a> 
        <div class = "col-md-2  col-xs-12"><button type="button" class="btn btn-secondary" id = "sendemail" >Send via email</button></div> */
        ?>
  </div>
  </div>
</div>
<div class="card" >
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
  <div class = "row">
    <div for="subject" class = "col-md-2 ">Subject: </div>
    <div class="col-md-4"><?= $quote['subject']; ?></div>
    </div>
    </li>
    <li class="list-group-item">
  <div class = "row">
    <div for="subject" class = "col-md-2 ">Total: </div>
    <div class="col-md-4">$<?= $quote['total']; ?></div>
    </div>
    </li>
		<li class="list-group-item">
	<div class = "row">
		<div class = "col-md-2 ">Date: </div>
    <div class="col-md-4"><?= $quote['date']; ?></div>
		</div>
		</li>
		<li class="list-group-item">
	<div class = "row">
		<div class = "col-md-2 ">Valid until: </div>
    <div class="col-md-4"><?= $quote['valid_date']; ?></div>
		</div>
		</li>
		<li class="list-group-item">
	<div class = "row">
		<div class = "col-md-2 ">Prepared by: </div>
    <div class="col-md-4"><?= $quote['prepared_by']; ?></div>
		</div>
		</li>
    <li class="list-group-item">
	<div class = "row">
		<div class = "col-md-2 ">Description of work: </div>
    <div class="col-md-4"><?= $quote['description']; ?></div>
		</div>
		</li>

  </ul>
  </div>
  <div class="card-header">
       <i class="clicktohide fas fa-bars"></i> Company Information
    </div>
    <div class="card-body">
      <ul class="list-group list-group-flush">

      <li class="list-group-item">
    <div class = "row">
      <div for="subject" class = "col-md-2 ">Company Name: </div>
      <div class="col-md-4"><?= $quote['company'][0]['company_name']; ?></div>
      </div>
      </li>
  		<li class="list-group-item">
  	<div class = "row">
  		<div class = "col-md-2 ">Phone Number: </div>
      <div class="col-md-4"><?= $quote['company'][0]['phone_number']; ?></div>
  		</div>
  		</li>
      <li class="list-group-item">
  	<div class = "row">
  		<div class = "col-md-2 ">Email: </div>
      <div class="col-md-4"><?= $quote['company'][0]['email']; ?></div>
  		</div>
  		</li>
  		<li class="list-group-item">
  	<div class = "row">
  		<div class = "col-md-2 ">Street Address: </div>
      <div class="col-md-4"><?= $quote['company'][0]['street_address']; ?></div>
  		</div>
  		</li>

    </ul>
    </div>
    <div class="card-header">
         <i class="clicktohide fas fa-bars"></i> Customer Information
      </div>
      <div class="card-body">
        <ul class="list-group list-group-flush">

        <li class="list-group-item">
      <div class = "row">
        <div for="subject" class = "col-md-2 ">Customers Company Name: </div>
        <div class="col-md-4"><?= $quote['customer'][0]['customer_company_name']; ?></div>
        </div>
        </li>
        <li class="list-group-item">
    	<div class = "row">
    		<div class = "col-md-2 ">Customer Name: </div>
        <div class="col-md-4"><?= $quote['customer'][0]['customer_name']; ?></div>
    		</div>
    		</li>
          <li class="list-group-item">
      	<div class = "row">
      		<div class = "col-md-2 ">Customer ID: </div>
          <div class="col-md-4"><?= $quote['customer'][0]['customer_id']; ?></div>
      		</div>
      		</li>
    		<li class="list-group-item">
    	<div class = "row">
    		<div class = "col-md-2 ">Customers Phone Number: </div>
        <div class="col-md-4"><?= $quote['customer'][0]['customer_phone_number']; ?></div>
    		</div>
    		</li>
        <li class="list-group-item">
    	<div class = "row">
    		<div class = "col-md-2 ">Customers Email: </div>
        <div class="col-md-4"><?= $quote['customer'][0]['customer_email']; ?></div>
    		</div>
    		</li>
    		<li class="list-group-item">
    	<div class = "row">
    		<div class = "col-md-2 ">Customers Street Address: </div>
        <div class="col-md-4"><?= $quote['customer'][0]['customer_street_address']; ?></div>
    		</div>
    		</li>

      </ul>
      </div>

      <div class="card-header">
           <i class="clicktohide fas fa-bars"></i> Product Information
        </div>
        <div class="card-body">
          <table>
            <tr id = 'defaults'><th>Product</th><th>Price</th><th>Quantity</th><th >Total</th></tr>
          <?php foreach($quote['product'] as $product) : ?>
            <tr><td><?= $product['product'] ?></td><td><?= $product['price'] ?></td><td><?= $product['quantity'] ?></td><td><?= $product['total'] ?></td></tr>
          <?php endforeach; ?>
        </table>

      </div>

  </div>
</div>
</div>

<div id = "content" class = "container-fluid example-print" data-date = '<?= $quote['date'] ?>' data-subject = '<?= $quote['subject'] ?>'>
  <?php $this->render(false); ?><div class = "row">
    <div class = "col-12 text-center">
      <h1>
        Quote: <?= $quote['subject']; ?>
      </h1>
    </div>
</div>
<div class = "row mt-5">
  <div class = "col-8">
    <div class = "row">
      <h2>
        <?= $quote['company'][0]['company_name']; ?>
      </h2>
    </div>
    <div class = "row">
        Address: <?= $quote['company']['0']['street_address']; ?>
    </div>
    <div class = "row mt-2">
      Phone Number: <?= $quote['company']['0']['phone_number']; ?>
    </div>
    <div class = "row mt-2" >
      Email: <?= $quote['company']['0']['email']; ?>
    </div>
    <div class = "row mt-2">
      Prepared by: <?= $quote['company']['0']['prepared_by']; ?>
    </div>
  </div>
  <div class = "col-4">
  <div class = "ml-auto mr-3">
    <table>
      <tr>
        <td>
          Quote #
        </td>
        <td>
          Date
        </td>
      </tr>
      <tr>
        <td>
          <?= $quote['id']; ?>
        </td>
        <td>
          <?= $quote['date']; ?>
        </td>
      </tr>
      <tr>
        <td>
          Customer id
        </td>
        <td>
          Valid Until
        </td>
      </tr>
      <tr>
        <td>
          <?= $quote['customer']['0']['customer_id']; ?>
        </td>
        <td>
          <?= $quote['valid_date']; ?>
        </td>
      </tr>


    </table>
  </div>
</div>

</div>
  <div class = "row mt-5"><h3>Customer Information</h3></div>
  <div class = "row">
    <?= $quote['customer'][0]['customer_name']; ?>
  </div>
  <div class = "row">
    <?= $quote['customer'][0]['customer_company_name']; ?>
  </div>
  <div class = "row">
<?= $quote['customer'][0]['customer_street_address']; ?>
</div>
      <div class = "row">
    <?= $quote['customer'][0]['customer_phone_number']; ?>
  </div>
  <div class = "row">
<?= $quote['customer'][0]['customer_email']; ?>
</div>
  <div class = "row mt-5 border">
    <b>Description of work: </b><?= $quote['description']; ?>
  </div>
<div class = "row mt-5">
  <table>
    <tr id = 'defaults'><th>Product</th><th>Price</th><th>Quantity</th><th >Total</th></tr>
  <?php foreach($quote['product'] as $product) : ?>
    <tr><td><?= $product['product'] ?></td><td><?= $product['price'] ?></td><td><?= $product['quantity'] ?></td><td><?= $product['total'] ?></td></tr>
  <?php endforeach; ?>
  <tr><td colspan=3>Thank you for your business</td><td>Total: $<?= $quote['total'] ?></td></tr>
</table>
</div>
</div>

</body>
</html>

<script>
function hideandprint() {
  $('#content').siblings().hide();
$('#content').parents().siblings().hide();
  window.print();
  window.location.reload();
}
$('#sendemail').click(function() {
  var addresses = "";//between the speech mark goes the receptient. Seperate addresses with a ;
var body = ""//write the message text between the speech marks or put a variable in the place of the speech marks
var subject = ""//between the speech marks goes the subject of the message
var href = "mailto:" + addresses + "?"
         + "subject=" + subject + "&"
         + "body=" + body;
var wndMail;
wndMail = window.open(href, "_blank", "scrollbars=yes,resizable=yes,width=10,height=10");

});
$('#savepdf').click(function() {
    $(".example-screen").toggle();
    $(".example-print").toggle();
    $('#content').siblings().hide();
$('#content').parents().siblings().hide();
    html2canvas(document.querySelector("body"), {
              scale: 4,
              onrendered: function(canvas) {

                  var imgData = canvas.toDataURL('image/png');
                  var doc = new jsPDF("p", "mm", "a4");

                  var width = doc.internal.pageSize.getWidth();
                  var height = doc.internal.pageSize.getHeight();
                  height = height / 2;
                  doc.addImage(imgData, 'JPEG', 0, 0, width, height);
                  var filename = "Quote_";
                  filename = filename + $( "#content" ).data( "subject" );
                  filename = filename + "_";
                  filename = filename + $( "#content" ).data( "date" );
                  filename = filename +'.pdf';
                  doc.save(filename);
              }
          });
          $(".example-screen").toggle();
          $(".example-print").toggle();
});
$('.clicktohide').click(function() {
       $(this).parent().next().toggle();
	});
</script>
