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
            <li><a href="myaccount.php">my accout</a></li>
            <li><a href="gift.php">gift</a></li>
            <li><a href="search.php">search</a></li>
            <li><a href="contact.php">contact</a></li>
            <li><a href="order.php">order</a></li>
            <li><a href="faq.php">faq</a></li>
            <li class="selected"><a href="references.php">references</a></li>
            </ul>
        </div>     
            
            
       </div> 
       
       
       <div class="center_content">
       	<div class="left_content">
            <div class="title"><span class="title_icon"><img src="images/bullet1.gif" alt="" title="" /></span>References</div>
        
        	<div class="feat_prod_box_details">
            <p class="details">
            <ol class="references">
              <li>http://www.w3schools.com/</li>
              <li>https://www.codecademy.com/tracks/web</li>
              <li>https://msdn.microsoft.com/en-us/library/ms762271(v=vs.85).aspx</li>
              <li>Whitehead, P, & Russell, J 2005, HTML : Your Visual Blueprint For Designing Effective Web Pages With HTML, CSS, And XHTML, n.p.: Hoboken, N.J. ; [Chichester] : Wiley, c2005., DEAKIN UNIV LIBRARY's Catalog, EBSCOhost, viewed 19 August 2015.</li>
              <li>Cox, V, Reding, E, & Wermers, L 2001, HTML : Illustrated Introductory, n.p.: Australia : Thomson Course Technology, c2007., DEAKIN UNIV LIBRARY's Catalog, EBSCOhost, viewed 19 August 2015.</li>
              <li>Willard, W 2001, HTML : A Beginner's Guide, n.p.: Berkeley, Calif. ; London : Osborne, 2001., DEAKIN UNIV LIBRARY's Catalog, EBSCOhost, viewed 19 August 2015.</li>
              <li>Shelly, GB 2007, HTML : Comprehensive Concepts And Techniques, n.p.: Boston, Mass. : Thomson Course Technology, c2007., DEAKIN UNIV LIBRARY's Catalog, EBSCOhost, viewed 19 August 2015.</li>

            </ol>      
            </p>
            
            
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