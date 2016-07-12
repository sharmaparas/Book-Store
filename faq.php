<?PHP
session_start();
?>
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
       		<embed src="images/bookstore.swf" height="90px">
        <div id="menu">
            <ul>                                                                       
            <li><a href="index.php">home</a></li>
            <li><a href="about.php">about us</a></li>
            <li><a href="category.php">books</a></li>
            <li><a href="specials.php">specials books</a></li>
            <li><a href="choosePage.php">my accout</a></li>
            <li><a href="gift.php">gift</a></li>
            <li><a href="search.php">search</a></li>
            <li><a href="contact.php">contact</a></li>
            <li><a href="order.php">order</a></li>
            <li class="selected"><a href="faq.php">faq</a></li>
            <li><a href="references.php">references</a></li>
            </ul>
        </div>       
            
            
       </div> 
       
       
       <div class="center_content">
       	<div class="left_content">
            <div class="title"><span class="title_icon"><img src="images/bullet1.gif" alt="" title="" /></span>FAQ</div>
        
        	<div class="feat_prod_box_details">
            <strong>Do I have to register?</strong>
            <p>No, you can purchase from our website as a "Guest" without registering just by filling out the order form.</p>
            <br /><br />
            <strong>Is your website secure?</strong>
            <p>Our ordering page uses 128 bit SSL security. This means that your credit card details are transferred safely between your computer and our site. Once we receive your order and process your payment, your credit card details are destroyed.</p>
            <br /><br />
            <strong>What is our Returns Policy?</strong>
            <p>Your satisfaction is very important to us. If you are not 100% happy with your purchase, we’re happy to refund the full purchase price, minus postage and insurance costs. Simply return the product in its original condition within one month of your original invoice date, and we will arrange for your reimbursement.</p>
            <br /><br />
            <strong>Do you buy books from the public?</strong>
            <p>Cash paid for reasonable quantities of books in excellent condition. Most categories always needed, but please call to discuss minimum quantities and type of books before bringing them in.</p>
             
            
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