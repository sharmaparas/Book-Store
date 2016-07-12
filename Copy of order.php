<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Book Store</title>
<link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
<div id="wrap">

       <div class="header">
       		<div class="logo"><a href="index.php"><img src="images/logo.gif" alt="" title="" border="0" /></a></div>            
        <div id="menu">
            <ul>                                                                       
            <li><a href="index.php">home</a></li>
            <li><a href="about.php">about us</a></li>
            <li><a href="category.php">books</a></li>
            <li><a href="specials.php">specials books</a></li>
            <li><a href="myaccount.php">my accout</a></li>
            <li><a href="gift.php">gift</a></li>
            <li><a href="search.php">search</a></li>
            <li><a href="contact.php">contact</a></li>
            <li class="selected"><a href="order.php">order</a></li>
            <li><a href="faq.php">faq</a></li>
            <li><a href="references.php">references</a></li>
            </ul>
        </div>     
            
            
       </div> 
       
       
       <div class="center_content">
       	<div class="left_content">
            <div class="title"><span class="title_icon"><img src="images/bullet1.gif" alt="" title="" /></span>Order</div>
        
        	<div class="feat_prod_box_details">
            <p class="details">To make an order please fill the following form:</p>
            <form>
              	<div class="contact_form">
                <div class="form_subtitle">all fields are requierd</div> 

                <h2 class="contact_group contact_group_first">Book Selection:</h2>      
                    <div class="form_row">
                    <label class="contact"><strong>Product:</strong></label>
                    <select>
                        <option>Select a book</option>
                         <?php
            // Load the XML of all books
            $xml = new DOMDocument;
            $xml->load('xml/books.xml');

            // filter books by category
            $xpath = new DOMXPath($xml);
            $query = "//catalog/book";
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
            $xsl->load('xml/book_dropdownlist.xsl');

            // Configure the transformer
            $proc = new XSLTProcessor;
            $proc->importStyleSheet($xsl); // attach the xsl rules

            // output the transformed xsl
            echo str_replace("<?xml version=\"1.0\"?>", "" ,$proc->transformToXML($newxml)) ;
            ?>
        </select>
                    </div>  
   
                  <h2 class="contact_group contact_group_first">Contact Detail:</h2>      
                    <div class="form_row">
                    <label class="contact"><strong>Name:</strong></label>
                    <input type="text" class="contact_input" required placeholder="Name" />
                    </div>  

                    <div class="form_row">
                    <label class="contact"><strong>Email:</strong></label>
                    <input type="email" class="contact_input" required placeholder="name@domain" />
                    </div>


                    <div class="form_row">
                    <label class="contact"><strong>Phone:</strong></label>
                    <input type="tel" class="contact_input" required placeholder="0411111111" />
                    </div>  

                  <h2 class="contact_group">Delivery Address:</h2>      
                    
                    <div class="form_row">
                    <label class="contact"><strong>Unit Number:</strong></label>
                    <input type="number" class="contact_input" size="10" max="10" placeholder="Unit Number" required />
                    </div>

                    <div class="form_row">
                    <label class="contact"><strong>Street Name:</strong></label>
                    <input type="text" class="contact_input" size="10" required placeholder="Street Name" />
                    </div>

                    <div class="form_row">
                    <label class="contact"><strong>City:</strong></label>
                    <input type="text" class="contact_input" size="10" required placeholder="City" />
                    </div>

                    <div class="form_row">
                    <label class="contact"><strong>Postal Code:</strong></label>
                    <input type="number" class="contact_input" size="10" required placeholder="Postal Code" />
                    </div>


                  <h2 class="contact_group">Payment Method:</h2>      
                    
                    <div class="form_row">
                    <label class="contact"><strong>Credit Card Number:</strong></label>
                    <input type="text" class="contact_input" size="10" max="10" required placeholder="XXXX-XXXX-XXXX-XXXX" />
                    </div>

                    <div class="form_row">
                    <label class="contact"><strong>Expiry Date:</strong></label>
                    
                        Month: <select name="ccmonth" id="ccmonth">
                    <option value="MM" selected="selected">MM</option>
                    <option value="01">01</option>
                    <option value="02">02</option>
                    <option value="03">03</option>
                    <option value="04">04</option>
                    <option value="05">05</option>
                    <option value="06">06</option>
                    <option value="07">07</option>
                    <option value="08">08</option>
                    <option value="09">09</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                    </select> &nbsp; Year: <select name="ccyear" id="ccyear">
                    <option value="YYYY" selected="selected">YYYY</option>
                    <option value="2012">2012</option>
                    <option value="2013">2013</option>
                    <option value="2014">2014</option>
                    <option value="2015">2015</option>
                    <option value="2016">2016</option>
                    <option value="2017">2017</option>
                    <option value="2018">2018</option>
                    <option value="2019">2019</option>
                    <option value="2020">2020</option>
                    <option value="2021">2021</option>
                    <option value="2022">2022</option>
                    <option value="2023">2023</option>
                    <option value="2024">2024</option>
                    </select>
                    </div>

                    <div class="form_row">
                    <label class="contact"><strong>Card Holder Name:</strong></label>
                    <input type="text" class="contact_input" size="10" max="10" required placeholder="Card Holder Name" />
                    </div>

                  <h2 class="contact_group">Gift Certificate Information :</h2>      
                    
                    <div class="form_row">
                    <label class="contact"><strong>Certificate Code (if applicable):</strong></label>
                    <input type="number" class="contact_input" size="10" max="10" />
                    </div>

                    
                    <div class="form_row">
                    <button type="submit" href="#" class="contact">send</button>                    </div>      
                </div>  
            </form>
          </div>	
            
              

            

            
        <div class="clear"></div>
        </div><!--end of left content-->
        
        <div class="right_content">
             
                <?php include 'include/side_bar.php';?>
             
        </div><!--end of right content-->
        
        
       
       
       <div class="clear"></div>
       </div><!--end of center content-->
       
              
       <div class="footer">
       	<div class="left_footer"><img src="images/footer_logo.gif" alt="" title="" /><br /> <a href="http://csscreme.com/freecsstemplates/" title="free templates"><img src="images/csscreme.gif" alt="free templates" title="free templates" border="0" /></a></div>
        <div class="right_footer">
        <a href="index.php">home</a>
        <a href="about.php">about us</a>
        <a href="search.php">search</a>
        <a href="license.txt">privacy policy</a>
        <a href="contact.php">contact us</a>
       
        </div>
        <div class="copyright">
          &copy; Deakin University, School of Information Technology. This web page has been developed as a student assignment for the unit SIT203: Web Programming. Therefore it is not part of the University's authorised web site. DO NOT USE THE INFORMATION CONTAINED ON THIS WEB PAGE IN ANY WAY
        </div>
       
       </div>
    

</div>

</body>
</html>