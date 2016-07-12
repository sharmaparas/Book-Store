<div class="languages_box" style="width:100%;">  
  <a href="#">
    <?php
    if (isset($_SESSION["username"]))
      echo "<span class='red'>Hello ".$_SESSION["username"].", <a href='logout.php'>Logout<a></span>";
    ?>
  </a>
</div>
<br></br>
            <div class="languages_box">
            <span class="red">Languages:</span>
            <a href="#"><img src="images/au.gif" width="15" height="10" alt="" title="" border="0" /></a>           
            </div>
                <div class="currency">
                <span class="red">Currency: </span>                
                <a href="#"><strong>AUD</strong></a>
                </div>
                
                
              <div class="cart">
                  <div class="title"><span class="title_icon"><img src="images/cart.gif" alt="" title="" /></span>My cart</div>
                  <div class="home_cart_content">
                  3 x items | <span class="red">TOTAL: 100$</span>
                  </div>
                  <a href="scart.php" class="view_cart">view cart</a>
              
              </div>
                       
                
        
        
             <div class="title"><span class="title_icon"><img src="images/bullet3.gif" alt="" title="" /></span>About Our Store</div> 
             <div class="about">
             <p>
             <img src="images/about.gif" alt="" title="" class="right" />
             BookStore is a 100% Australian-owned online retail store selling books Australia wide. Based in Geelong, Australia we offer handreds books from our database which have been categorised into a variety of subjects to make it easier for you to browse and shop.
             </p>
             
             </div>
             
             <div class="right_box">
                
                <div class="title"><span class="title_icon"><img src="images/bullet4.gif" alt="" title="" /></span>Promotions</div>

             <?php

            // Load the XML of all books
            $xml = new DOMDocument;
            $xml->load('xml/books.xml');

            // filter books by category
            $xpath = new DOMXPath($xml);
            $query = "//catalog/book[@flag='promo']";

            // change the selected drop down list of categoty by javascript
            echo "<script>document.getElementById('category').selectedIndex=1</script>";
            $elements = $xpath->query($query);

            // make a new xml document and append catalog node as parent
            $newxml = new DOMDocument;
            $newxml->loadXML("<catalog></catalog>");
            foreach ($elements as $element) {
                $element = $newxml->importNode($element, true);
                $newxml->documentElement->appendChild($element);
            }


            // load xsl
            $xsl = new DOMDocument;
            $xsl->load('xml/book.xsl');

            // Configure the transformer
            $proc = new XSLTProcessor;
            $proc->importStyleSheet($xsl); // attach the xsl rules

            // output the transformed xsl
            echo str_replace("<?xml version=\"1.0\"?>", "" ,$proc->transformToXML($newxml)) ;

            ?>

             </div>
             
             <div class="right_box">
             
             	<div class="title"><span class="title_icon"><img src="images/bullet5.gif" alt="" title="" /></span>Categories</div> 
                
                <ul class="list">
                <li><a href="category.php?cat=computer">Computer</a></li>
                <li><a href="category.php?cat=fantasy"  >Fantasy</a></li>
                <li><a href="category.php?cat=romance">Romance</a></li>
                <li><a href="category.php?cat=horror">Horror</a></li>
                <li><a href="category.php?cat=science_fiction">Science Fiction</a></li>                         
                </ul>

             </div>       