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
            <li class="selected"><a href="gift.php">gift</a></li>
            <li><a href="search.php">search</a></li>
            <li><a href="contact.php">contact</a></li>
            <li><a href="order.php">order</a></li>
            <li><a href="faq.php">faq</a></li>
            <li><a href="references.php">references</a></li>
            </ul>
        </div>     
            
            
       </div> 
       
       
       <div class="center_content">
       	<div class="left_content">
            <div class="title"><span class="title_icon"><img src="images/bullet1.gif" alt="" title="" /></span>Gift ideas</div>
        
        	<div class="feat_prod_box_details">
            <p class="details">
             BookStore Gift Certificates are redeemable via the BookStore website and are valid for 12 months from the date of purchase. Certificates do not have to be used in one transaction.
</p>
 <p class="details">
When you purchase a gift certificate, you will immediately receive a receipt with an electronic gift certificate code. You can then either forward the code to the intended recipient. A copy of the electronic gift certificate code is also stored in your Account on the BookStore website.
</p>
 <p class="details">
For existing gift certificate holders, if you have lost your electronic gift certificate code, please retrieve it from your account or contact us on 1300 999 999 9am - 4pm AEST, Monday - Friday.
            </p>
            
              	<!--<div class="contact_form">
                <div class="form_subtitle">create new account</div>
                 <form name="register" action="#">          
                    <div class="form_row">
                    <label class="contact"><strong>Username:</strong></label>
                    <input type="text" class="contact_input" />
                    </div>  


                    <div class="form_row">
                    <label class="contact"><strong>Password:</strong></label>
                    <input type="text" class="contact_input" />
                    </div> 

                    <div class="form_row">
                    <label class="contact"><strong>Email:</strong></label>
                    <input type="text" class="contact_input" />
                    </div>


                    <div class="form_row">
                    <label class="contact"><strong>Phone:</strong></label>
                    <input type="text" class="contact_input" />
                    </div>
                    
                    <div class="form_row">
                    <label class="contact"><strong>Company:</strong></label>
                    <input type="text" class="contact_input" />
                    </div>
                    
                    <div class="form_row">
                    <label class="contact"><strong>Address:</strong></label>
                    <input type="text" class="contact_input" />
                    </div>                    

                    <div class="form_row">
                        <div class="terms">
                        <input type="checkbox" name="terms" />
                        I agree to the <a href="#">terms &amp; conditions</a>                        </div>
                    </div> 

                    
                    <div class="form_row">
                    <input type="submit" class="register" value="register" />
                    </div>   
                  </form>     
                </div>-->  
            	<div class="new_prod_box">
                        <a href="cart.php">$500 Gift Certificate</a>
                        <div class="new_prod_bg">
                        <a href="cart.php"><img src="images/Gift500-bs-t.jpg" alt="" title="" class="thumb" border="0" /></a>
              			</div>           
             	</div>
                    
                <div class="new_prod_box">
                        <a href="cart.php">$300 Gift Certificate</a>
                        <div class="new_prod_bg">
                        <a href="cart.php"><img src="images/Gift300-bs-t.jpg" alt="" title="" class="thumb" border="0" /></a>
              			</div>           
             	</div>
                
                <div class="new_prod_box">
                        <a href="cart.php">$200 Gift Certificate</a>
                        <div class="new_prod_bg">
                        <a href="cart.php"><img src="images/Gift200-bs-t.jpg" alt="" title="" class="thumb" border="0" /></a>
              			</div>           
             	</div>
                
                <div class="new_prod_box">
                        <a href="cart.php">$100 Gift Certificate</a>
                        <div class="new_prod_bg">
                        <a href="cart.php"><img src="images/Gift100-bs-t.jpg" alt="" title="" class="thumb" border="0" /></a>
              			</div>           
             	</div>
                
                <div class="new_prod_box">
                        <a href="cart.php">$75 Gift Certificate</a>
                        <div class="new_prod_bg">
                        <a href="cart.php"><img src="images/Gift75-bs-t.jpg" alt="" title="" class="thumb" border="0" /></a>
              			</div>           
             	</div>
                
                
                <div class="new_prod_box">
                        <a href="cart.php">$50 Gift Certificate</a>
                        <div class="new_prod_bg">
                        <a href="cart.php"><img src="images/Gift50-bs-t.jpg" alt="" title="" class="thumb" border="0" /></a>
              			</div>           
             	</div>
                
                <div class="new_prod_box">
                        <a href="cart.php">$30 Gift Certificate</a>
                        <div class="new_prod_bg">
                        <a href="cart.php"><img src="images/Gift30-bs-t.jpg" alt="" title="" class="thumb" border="0" /></a>
              			</div>           
             	</div>
                
                <div class="new_prod_box">
                        <a href="cart.php">$20 Gift Certificate</a>
                        <div class="new_prod_bg">
                        <a href="cart.php"><img src="images/Gift20-bs-t.jpg" alt="" title="" class="thumb" border="0" /></a>
              			</div>           
             	</div>
                
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