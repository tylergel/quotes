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

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> 
        Quotes
    </title>
    <?=  $this->Html->meta ( 'webroot/favicon.ico', 'webroot/favicon.ico', array (
    'type' => 'icon' 
) ); ?>

    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('style.css') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
    <style>
    /*
        DEMO STYLE
    */
    @import "https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700";


    body {
        font-family: 'Poppins', sans-serif;
        background: #fafafa;
    }

    p {
        font-family: 'Poppins', sans-serif;
        font-size: 1.1em;
        font-weight: 300;
        line-height: 1.7em;
        color: #999;
    }

    a, a:hover, a:focus {
        color: inherit;
        text-decoration: none;
        transition: all 0.3s;
    }
    .navbar {
      position: -webkit-sticky;
position: sticky;
        background: #fff;
        border: none;
        border-radius: 0;
        margin-bottom: 40px;
        box-shadow: 1px 1px 3px rgba(0, 0, 0, 0.1);
    }
    .stickyHide {
      position: -webkit-sticky; /* Safari */
  position: sticky;
  top: 45vh;
    }

    .navbar-btn {
        box-shadow: none;
        outline: none !important;
        border: none;
    }

    .line {
        width: 100%;
        height: 1px;
        border-bottom: 1px dashed #ddd;
        margin: 40px 0;
    }

    /* ---------------------------------------------------
        SIDEBAR STYLE
    ----------------------------------------------------- */

    .wrapper {
        display: flex;
        width: 100%;
        align-items: stretch;
        perspective: 1500px;
    }


    #sidebar {
      min-height: 100vh;
max-height: 100vh;
        min-width: 250px;
        max-width: 250px;
        background: #134566;
        color: #fff;
        transition: all 0.6s cubic-bezier(0.945, 0.020, 0.270, 0.665);
        transform-origin: bottom left;
          
    }

    #sidebar.active {
        margin-left: -250px;
        transform: rotateY(100deg);
    }

    #sidebar .sidebar-header {
        padding: 20px;
        background: #134566;
    }

    #sidebar ul.components {
        padding: 20px 0;
    }

    #sidebar ul p {
        color: #fff;
        padding: 10px;
    }

    #sidebar ul li a {
        padding: 10px;
        font-size: 1.1em;
        display: block;
    }
    #sidebar ul li a:hover {
        color: #7386D5;
        background: #fff;
    }

    #sidebar ul li.active > a, a[aria-expanded="true"] {
        color: #fff;
        background: #6d7fcc;
    }


    a[data-toggle="collapse"] {
        position: relative;
    }

    .dropdown-toggle::after {
        display: block;
        position: absolute;
        top: 50%;
        right: 20px;
        transform: translateY(-50%);
    }

    ul ul a {
        font-size: 0.9em !important;
        padding-left: 30px !important;
        background: #fff;
    }

    ul.CTAs {
        padding: 20px;
    }

    ul.CTAs a {
        text-align: center;
        font-size: 0.9em !important;
        display: block;
        border-radius: 5px;
        margin-bottom: 5px;
    }

    a.download {
        background: #fff;
        color: #fff;
    }

    a.article, a.article:hover {
        background: #fff !important;
        color: #fff !important;
    }



    /* ---------------------------------------------------
        CONTENT STYLE
    ----------------------------------------------------- */
    #content {
        width: 100%;
        padding: 20px;
        max-height: 100vh;
        transition: all 0.3s;
    }

    #sidebarCollapse {


        cursor: pointer;
    }

    #sidebarCollapse span {
        width: 80%;
        height: 2px;
        margin: 0 auto;
        display: block;
        background: #555;
        transition: all 0.8s cubic-bezier(0.810, -0.330, 0.345, 1.375);
        transition-delay: 0.2s;
    }

    #sidebarCollapse span:first-of-type {
        transform: rotate(45deg) translate(2px, 2px);
    }
    #sidebarCollapse span:nth-of-type(2) {
        opacity: 0;
    }
    #sidebarCollapse span:last-of-type {
        transform: rotate(-45deg) translate(1px, -1px);
    }


    #sidebarCollapse.active span {
        transform: none;
        opacity: 1;
        margin: 5px auto;
    }
     @media only screen and (max-width: 600px) {
           #sidebar {
      min-height: 100vh;
max-height: 100vh;
        min-width: 50vw;
        max-width: 50vw;
        background: #134566;
        color: #fff;
        transition: all 0.6s cubic-bezier(0.945, 0.020, 0.270, 0.665);
        transform-origin: bottom left;
          
    }
     }
    .container-whole {
    padding-right:0;
    padding-left:0;
    margin-right:auto;
    margin-left:auto
 }
</style>
</head>
<body >

    <?= $this->Flash->render() ?>


    <div class="container-whole" style = "background-color: white">
        <i id = "sidebarOpen" class="stickyHide fas fa-arrow-alt-circle-right fa-2x" style = "z-index:1; position: fixed; top: 45vh; left: 0;"></i>
      <div class = "wrapper"  style = "z-index:5">
        
        <nav id="sidebar" class = "sticky-top"><i id = "sidebarCollapse" class="fas fa-times fa-2x" style = "position: absolute; right: 0"></i>
            <div class="sidebar-header" ><?= $this->Html->image('logo.jpg', ['alt' => 'CakePHP']); ?>
            </div>
            <ul class="list-unstyled components">
              <li <?php if( $this->request->getParam('action') == 'index') { echo " class = 'active'";
}?>>
                  <a href="<?=  $this->Url->build([
    "controller" => "Quotes",
    "action" => "index",
    "bar",
]);
?>">Home</a>
              </li>
             
              <li style = "color: white" <?php if( $this->request->getParam('action') == 'list') { echo " class = 'active'";
}?>>
                  <a href="<?=  $this->Url->build([
    "controller" => "Quotes",
    "action" => "list",
    "bar",
]);
?>">List Quotes</a>
              </li>
              <li style = "color: white" <?php if( $this->request->getParam('action') == 'customers') { echo " class = 'active'";
}?>>
                  <a href="<?=  $this->Url->build([
    "controller" => "Quotes",
    "action" => "customers",
    "bar",
]);
?>">Customers</a>
              </li>
              <li style = "color: white" <?php if( $this->request->getParam('action') == 'companies') { echo " class = 'active'";
}?>>
                  <a href="<?=  $this->Url->build([
    "controller" => "Quotes",
    "action" => "companies",
    "bar",
]);
?>">Companies</a>
              </li>

            </ul>
        </nav>

        <?= $this->fetch('content') ?>
    </div>
  </div>
</div>
    <footer>
    </footer>
</body>
</html>
<script type="text/javascript">
    $(document).ready(function () {
       
      $('#sidebarCollapse').on('click', function () {
          $('#sidebar').toggleClass('active');
          $(this).toggleClass('active');
          $('#sidebarOpen').show();
      });
      $('#sidebarOpen').on('click', function () {
          $('#sidebar').toggleClass('active'); 
          $(this).toggleClass('active');
           $('#sidebarOpen').hide();
      });
       if($( "#sidebar" ).is( ":visible" )) {
            $('#sidebarOpen').hide();
        }
    });
</script>
