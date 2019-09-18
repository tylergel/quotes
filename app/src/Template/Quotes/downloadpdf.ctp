<html>
<head>
    <?= $this->Html->charset() ?>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <?= $this->Html->meta('icon') ?>
    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('style.css') ?>
    <?= $this->Html->css('home.css') ?>
<script src = "https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
<script src = "https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Raleway:500i|Roboto:300,400,700|Roboto+Mono" rel="stylesheet">
</head>
<body id = "capture" style = "zoom: 150%">
<div id = "content" class = "container-fluid example-print" data-date = '<?= $quote['date'] ?>' data-subject = '<?= $quote['subject'] ?>'>
  <div class = "row">
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
html2canvas(document.getElementById("content"), {
        onrendered: function (canvas) {
          var imgData = canvas.toDataURL(
                  'image/png');
                  if(canvas.width > canvas.height){
    doc = new jsPDF('l', 'mm', [canvas.width, canvas.height]);
    }
    else{
    doc = new jsPDF('p', 'mm', [canvas.height, canvas.width]);
    }
              doc.addImage(imgData, 'PNG', 10, 10);
              doc.save('sample-file.pdf');
        }
    });
</script>
