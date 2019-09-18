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
    <style>
span{
    font-size:15px;
}


.fa{
     color:#4183D7;
}
</style>
</head>
<div class="container" style = "margin-top:25px">
     <div class="row">

       <?php foreach($quotes as $quote) : ?>

         <div id = '<?= $quote['id']; ?>' class="quote col-lg-4 col-md-4 col-sm-4 col-xs-12" >

         <div class="card text-center">

           <a href = '<?= $this->Url->build([
              "controller" => "Quotes",
              "action" => "view",
              $quote['id'],
          ]); ?>'>
           <div  class="card-header">
             <h4><?= $quote['subject'] ?></h4>
           </div>
         </a>
           <div class = "card-body">
           <div class="text">
             <span>$<?= $quote['total'] ?></span>
           </div>
           <div class="text">
             <span><?= $quote['date'] ?></span>
           </div>
           <div class = "row">
             <div class = "col-2"></div> 
             <div class = "text col-8">
             <a href = <?= $this->Url->build([
    "controller" => "Quotes",
    "action" => "delete",
   $quote['id'],
]); ?>><i class="fas fa-trash">delete</i></a>
           </div>
         </div>
       </div>
          </div>
       </div>
     <?php endforeach; ?>
     </div>
   </div>
</html>
