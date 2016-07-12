<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Book Store</title>
<link rel="stylesheet" type="text/css" href="style.css" />
    <link rel="stylesheet" href="lightbox.css" type="text/css" media="screen" />
    
    <script src="js/prototype.js" type="text/javascript"></script>
    <script src="js/scriptaculous.js?load=effects" type="text/javascript"></script>
    <script src="js/lightbox.js" type="text/javascript"></script>
    <script type="text/javascript" src="js/java.js"></script>
	<script type="text/javascript">
	function redirectIt()
	{
		var vv = document.URL.toString().split('?');
		window.location = 'scart.php?'+vv[1];
	}
	</script>
</head>
<body>
<div id="wrap">

       <div class="header">
            <embed src="images/bookstore.swf" height="90px">
         <div id="menu">
            <ul>                                                                       
            <li><a href="index.php">home</a></li>
            <li><a href="about.php">about us</a></li>
            <li class="selected"><a href="category.php">books</a></li>
            <li><a href="specials.php">specials books</a></li>
            <li><a href="myaccount.php">my accout</a></li>
            <li><a href="gift.php">gift</a></li>
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


<!-- Start Detail -->
             <?php
            
            // get the id of book
            $id = "0";

            // make sure id parameter is valid
            if (isset($_GET['id']))
                $id = $_GET['id'];

            // Load the XML of all books
            $xml = new DOMDocument;
            $xml->load('xml/books.xml');

            // filter the book by id
            $xpath = new DOMXPath($xml);
            $query = "//catalog/book[@id='$id']";
            $elements = $xpath->query($query)->item(0);

            // make a new xml document and append catalog node as parent
            $newxml = new DOMDocument;
            $newxml->loadXML("<catalog></catalog>");
            $elements = $newxml->importNode($elements, true);
            $newxml->documentElement->appendChild($elements);

            // load xsl
            $xsl = new DOMDocument;
            $xsl->load('xml/book_detail.xsl');

            // Configure the transformer
            $proc = new XSLTProcessor;
            $proc->importStyleSheet($xsl); // attach the xsl rules

            // output the transformed xsl
            echo str_replace("<?xml version=\"1.0\"?>", "" ,$proc->transformToXML($newxml)) ;
			echo "<a href='#' onclick='redirectIt();' class='more'><img src='images/order_now.gif' alt='' title='' border='0' />"
            ?>
			
                    </a>
<!-- End Detail -->
            

            
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
<script type="text/javascript">

var tabber1 = new Yetii({
id: 'demo'
});

</script>
</html>