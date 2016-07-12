<?PHP
session_start();
if(!isset($_SESSION["username"]))
	header('Location: myaccount.php');

if(isset($_SESSION["username"]))
{
	if (isset($_GET['id']))
	{
	$id = $_GET["id"];

	$xml=simplexml_load_file("xml/books.xml") or die("Error: Cannot create object");
	$author= $xml->book[$id-1]->author;
	$title= $xml->book[$id-1]->title;
	$price= $xml->book[$id-1]->price;
	$image= $xml->book[$id-1]->image;

	$my_file = 'xml/cart.xml';
	$handle = fopen($my_file, 'r');
	$data = fread($handle,filesize($my_file));

	$myfile = fopen("xml/cart.xml", "w") or die("Unable to open file!");
	$txt = str_replace("</catalog>", "", $data);
	fwrite($myfile, $txt);
	$data_new = "<book id='3' user='".$_SESSION["username"]."' flag='special'><bid>3</bid><author>".$author."</author><title>".$title."</title><flag><name>".$title."</name><image>".$image."</image></flag><genre>Fantasy</genre><price>".$price."</price><publish_date>2000-11-17</publish_date><description>After the collapse of a nanotechnology society in England, the young survivors lay the foundation for a new society.</description><image>".$image."</image></book>";
	//echo $data_new;
	fwrite($myfile, $data_new);
	fwrite($myfile, "</catalog>");
	fclose($myfile);
	}
}

//This is regarding removing the item from Cart:

if (isset($_GET['title']))
{

$bid="";
$author="";
$title=$_GET['title'];
$name="";
$image="";
$genre="";
$price="";
$publish_date="";
$description="";
$image="";

//session_start();
if(isset($_SESSION["username"]))
{
	$xmlDoc=new DOMDocument();
	$xmlDoc->load("xml/cart.xml");
	$x=$xmlDoc->getElementsByTagName('book');

	//get the q parameter from Session Username
	$q=$_SESSION["username"];

	//lookup all links from the xml file if length of q>0

	if (strlen($q)>0)
	{
		$hint="";
		for($i=0; $i<($x->length); $i++)
		{
			$y=$x->item($i)->getElementsByTagName('username');
			$z=$x->item($i)->getElementsByTagName('bid');
			$bid=$z->item(0)->childNodes->item(0)->nodeValue;
			$z=$x->item($i)->getElementsByTagName('author');
			$author=$z->item(0)->childNodes->item(0)->nodeValue;
			$z=$x->item($i)->getElementsByTagName('title');
			//$title=$z->item(0)->childNodes->item(0)->nodeValue;

			$z=$x->item($i)->getElementsByTagName('name');
			$name=$z->item(0)->childNodes->item(0)->nodeValue;
			$z=$x->item($i)->getElementsByTagName('image');
			$image=$z->item(0)->childNodes->item(0)->nodeValue;
			$z=$x->item($i)->getElementsByTagName('genre');
			$genre=$z->item(0)->childNodes->item(0)->nodeValue;
			$z=$x->item($i)->getElementsByTagName('price');
			$price=$z->item(0)->childNodes->item(0)->nodeValue;
			$z=$x->item($i)->getElementsByTagName('publish_date');
			$publish_date=$z->item(0)->childNodes->item(0)->nodeValue;
			$z=$x->item($i)->getElementsByTagName('description');
			$description=$z->item(0)->childNodes->item(0)->nodeValue;
			$z=$x->item($i)->getElementsByTagName('image');
			$image=$z->item(0)->childNodes->item(0)->nodeValue;

			$data_new2 = "<book id='3' user='".$_SESSION["username"]."' flag='special'><bid>3</bid><author>".$author."</author><title>".$title."</title><flag><name>".$title."</name><image>".$image."</image></flag><genre>Fantasy</genre><price>".$price."</price><publish_date>2000-11-17</publish_date><description>After the collapse of a nanotechnology society in England, the young survivors lay the foundation for a new society.</description><image>".$image."</image></book>";


			$my_file2 = 'xml/cart.xml';
			$handle2 = fopen($my_file2, 'r');
			$data2 = fread($handle2,filesize($my_file2));
			//fclose($my_file2);

			$myfile2 = fopen("xml/cart.xml", "w") or die("Unable to open file!");
			$txt2 = str_replace($data_new2, "", $data2);
			fwrite($myfile2, $txt2);

			fclose($myfile2);
			
		}
	}
}
}
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
            <li><a href="choosePage.php">my account</a></li>
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
        	<!--<div class="crumb_nav">
            <a href="index.php">home</a> &gt;&gt; category name
            </div>-->
            <div class="title"><span class="title_icon"><img src="images/bullet1.gif" alt="" title="" /></span>Shopping Cart</div>
           
           <div class="new_products">
           
           
            <!-- the following part is to be generated by xml&xsl --->                  
 <!------------------------------------------------------------------>
            
             <?php
            // get the id of book
            $cat = "all";
            if (isset($_GET['cat']))
                $cat = $_GET['cat'];

            // Load the XML of all books
            $xml = new DOMDocument;
            $xml->load('xml/cart.xml');

            // filter books by category
            $xpath = new DOMXPath($xml);
            if($cat == 'all' && isset($_SESSION["username"]))
                $query = "//catalog/book[@user='".$_SESSION["username"]."']";
			//else
				//header('Location: myaccount.php');

                // change the selected drop down list of categoty by javascript
                echo "<script>document.getElementById('category').selectedIndex=0</script>";
            
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
            $xsl->load('xml/cart.xsl');

            // Configure the transformer
            $proc = new XSLTProcessor;
            $proc->importStyleSheet($xsl); // attach the xsl rules

            // output the transformed xsl
            echo str_replace("<?xml version=\"1.0\"?>", "" ,$proc->transformToXML($newxml)) ;

            ?>

 <!-- the above part is to be generated by xml&xsl --->                  
 <!------------------------------------------------------------------>
           <!-- <div class="pagination">
            <span class="disabled"><<</span><span class="current">1</span><a href="#?page=2">2</a><a href="#?page=3">3</a>…<a href="#?page=199">10</a><a href="#?page=200">11</a><a href="#?page=2">>></a>
            </div>  -->
            
            </div> 
          <br><br>
        <div style="text-align:left;">
	   <a href='order.php' class='more'><img src='images/order_now.gif' alt='' title='' border='0' /></a> 
        </div>    
        <div class="clear"></div>

        </div>
		
		<!--end of left content-->
        
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
        