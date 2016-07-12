<?PHP 

$name="";
$email="";
$phone="";

$address="";
$unitno="";
$city="";
$postalcode="";
session_start();
if(isset($_SESSION["username"]))
{
	$xmlDoc=new DOMDocument();
	$xmlDoc->load("xml/myaccount.xml");
	$x=$xmlDoc->getElementsByTagName('contact');

	//get the q parameter from Session Username
	$q=$_SESSION["username"];

	//lookup all links from the xml file if length of q>0

	if (strlen($q)>0)
	{
		$hint="";
		for($i=0; $i<($x->length); $i++)
		{
			$y=$x->item($i)->getElementsByTagName('username');
			$z=$x->item($i)->getElementsByTagName('name');
			$name=$z->item(0)->childNodes->item(0)->nodeValue;
			$z=$x->item($i)->getElementsByTagName('email');
			$email=$z->item(0)->childNodes->item(0)->nodeValue;
			$z=$x->item($i)->getElementsByTagName('phone');
			$phone=$z->item(0)->childNodes->item(0)->nodeValue;

			$z=$x->item($i)->getElementsByTagName('address');
			$address=$z->item(0)->childNodes->item(0)->nodeValue;
			$z=$x->item($i)->getElementsByTagName('unit');
			$unitno=$z->item(0)->childNodes->item(0)->nodeValue;
			$z=$x->item($i)->getElementsByTagName('postalcode');
			$postalcode=$z->item(0)->childNodes->item(0)->nodeValue;
			$z=$x->item($i)->getElementsByTagName('city');
			$city=$z->item(0)->childNodes->item(0)->nodeValue;
			
			if ($y->item(0)->nodeType==1)
			{
				//find a link matching the search text
				if (stristr($y->item(0)->childNodes->item(0)->nodeValue,$q))
				{
					if ($hint=="")
					{
						$hint=$hint . "".$y->item(0)->childNodes->item(0)->nodeValue;//. "".$name->item(0)->childNodes->item(0)->nodeValue;
					}
					else
					{
						$hint=$hint . "<br /><a href='product.php?id=' target='_blank'>" .
						$y->item(0)->childNodes->item(0)->nodeValue . "</a>";
					}
				}
			}
		}
	}

// Set output to "no suggestion" if no hint were found
// or to the correct values
if ($hint=="")
  {
  $response="no suggestion";
  }
else
  {
  $response=$hint;
  }

//output the response
//echo $response;

}

if (isset($_POST['name']))
{
$name = $_POST["name"];
$email = $_POST["email"];
$phone = $_POST["phone"];
$order = 2;

$my_file = 'xml/orders.xml';
$handle = fopen($my_file, 'r');
$data = fread($handle,filesize($my_file));

$myfile = fopen("xml/orders.xml", "w") or die("Unable to open file!");
$txt = str_replace("</catalog>", "", $data);
fwrite($myfile, $txt);
$data_new = "<contact id='1' user='".$_SESSION["username"]."' flag='new'><name>".$name."</name><email>".$email."</email><genre>Computer</genre><phone>".$phone."</phone><company>company</company><msg>msg</msg></contact><order>2 Products</order><user>".$_SESSION["username"]."</user>";
fwrite($myfile, $data_new);
fwrite($myfile, "</catalog>");
fclose($myfile);
header('Location:order2.php?cc=tr');
//if(isset($_POST['certCode']))
//{
//	$_SESSION["certCode"]=$_POST['certCode'];
//	echo "certcode".$_POST['certCode'];
//header('Location:order2.php?cc=tr');
//}
//header('Location:order2.php');
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
            <li><a href="choosePage.php">my accout</a></li>
            <li><a href="gift.php">gift</a></li>
            <li><a href="search.php">search</a></li>
            <li><a href="contact.php">contact</a></li>
            <li class="selected"><a href="order.php">order</a></li>
            <li><a href="faq.php">faq</a></li>
            <li><a href="references.php">references</a></li>
            </ul>
        </div>     
            
            
       </div> 
       
       <script type="text/javascript">
				function validateReg()
				{
				try
				{
					if(document.getElementById('name').value=='' || document.getElementById('email').value=='' || document.getElementById('phone').value=='' || document.getElementById('phone').value=='' || document.getElementById('unit').value=='' || document.getElementById('street').value=='' || document.getElementById('city').value=='' || document.getElementById('postalcode').value=='' || document.getElementById('card').value=='' || document.getElementById('ccmonth').value=='MM' || document.getElementById('ccyear').value=='YYYY' || document.getElementById('cardholder').value=='')
					{

					

						if(document.getElementById('name').value=='')
							document.getElementById('divname').style.display='block';
						else
							document.getElementById('divname').style.display='none';

						if(document.getElementById('email').value=='')
							document.getElementById('divemail').style.display='block';
						else
						{
							var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
							if(re.test(document.getElementById('email').value)==true)
								document.getElementById('divemail').style.display='none';
							else
								document.getElementById('divemail').style.display='block';
						}

						if(document.getElementById('phone').value=='')
							document.getElementById('divphone').style.display='block';
						else
						{
							if(document.getElementById('phone').value.length==10)
								document.getElementById('divphone').style.display='none';
							else
								document.getElementById('divphone').style.display='block';
						}
						
						if(document.getElementById('unit').value=='')
							document.getElementById('divunit').style.display='block';
						else
							document.getElementById('divunit').style.display='none';

						if(document.getElementById('street').value=='')
							document.getElementById('divstreet').style.display='block';
						else
							document.getElementById('divstreet').style.display='none';
							
						if(document.getElementById('city').value=='')
							document.getElementById('divcity').style.display='block';
						else
							document.getElementById('divcity').style.display='none';
													
						if(document.getElementById('postalcode').value=='')
							document.getElementById('divpostal').style.display='block';
						else
							document.getElementById('divpostal').style.display='none';
							
						if(document.getElementById('card').value=='')
							document.getElementById('divcard').style.display='block';
						else
							document.getElementById('divcard').style.display='none';
							
						if(document.getElementById('ccmonth').value=='MM')
							document.getElementById('divmonth').style.display='block';
						else
							document.getElementById('divmonth').style.display='none';
							
						if(document.getElementById('ccyear').value=='YYYY')
							document.getElementById('divyear').style.display='block';
						else
							document.getElementById('divyear').style.display='none';

						if(document.getElementById('cardholder').value=='YYYY')
							document.getElementById('divcardholder').style.display='block';
						else
							document.getElementById('divcardholder').style.display='none';


						return false;
					}
					return true;
					}	
					catch(e){alert(e);}
				}
				</script>
       <div class="center_content">
       	<div class="left_content">
            <div class="title"><span class="title_icon"><img src="images/bullet1.gif" alt="" title="" /></span>Order</div>
        
        	<div class="feat_prod_box_details">
            <p class="details">To make an order please fill the following form:</p>
            <form method="post" action="order.php">
              	<div class="contact_form">
                <div class="form_subtitle">all fields are requierd</div> 

              
                  <h2 class="contact_group contact_group_first">Contact Detail:</h2>      
                    <div class="form_row">
                    <label class="contact"><strong>Name:</strong></label>
                    <input type="text" id="name" name="name" class="contact_input" required placeholder="Name" value='<?php if($name!=''){ echo $name;} ?>' />
                    </div>  
					<div id="divname" class="form_row" style="display:none;">
						Name Cannot be Empty
					</div>

                    <div class="form_row">
                    <label class="contact"><strong>Email:</strong></label>
                    <input type="email" id="email" name="email" class="contact_input" required placeholder="name@domain" value='<?php if($email!=''){ echo $email;} ?>' />
                    </div>
					<div id="divemail" class="form_row" style="display:none;">
						Email Address Invalid
					</div>

                    <div class="form_row">
                    <label class="contact"><strong>Phone:</strong></label>
                    <input type="tel" id="phone" name="phone" class="contact_input" required placeholder="0411111111" value='<?php if($phone!=''){ echo $phone;} ?>' />
                    </div>  
					<div id="divphone" class="form_row" style="display:none;">
						Phone Number must fill out by 10 digit numbers
					</div>

                  <h2 class="contact_group">Delivery Address:</h2>      
                    
                    <div class="form_row">
                    <label class="contact"><strong>Unit Number:</strong></label>
                    <input type="number" id="unit" class="contact_input" size="10" max="1000000" placeholder="Unit Number" required  value='<?php if($unitno!=''){ echo $unitno;} ?>'/>
                    </div>
					<div id="divunit" class="form_row" style="display:none;">
						Please Enter Your Unit Number
					</div>

                    <div class="form_row">
                    <label class="contact"><strong>Street Name:</strong></label>
                    <input type="text" id="street" class="contact_input" size="10" required placeholder="Street Name" value='<?php if($address!=''){ echo $address;} ?>' />
                    </div>
					<div id="divstreet" class="form_row" style="display:none;">
						Please Enter your Street Name
					</div>

                    <div class="form_row">
                    <label class="contact"><strong>City:</strong></label>
                    <input type="text" id="city" class="contact_input" size="10" required placeholder="City" value='<?php if($city!=''){ echo $city;} ?>' />
                    </div>
					<div id="divcity" class="form_row" style="display:none;">
						Please Enter City Name
					</div>

                    <div class="form_row">
                    <label class="contact"><strong>Postal Code:</strong></label>
                    <input type="number" id="postalcode" class="contact_input" size="10" required placeholder="Postal Code" value='<?php if($postalcode!=''){ echo $postalcode;} ?>' />
                    </div>
					<div id="divpostal" class="form_row" style="display:none;">
						Postal Name Cannot be Empty
					</div>


                  <h2 class="contact_group">Payment Method:</h2>      
                    
                    <div class="form_row">
                    <label class="contact"><strong>Credit Card Number:</strong></label>
                    <input type="text" id="card" class="contact_input" size="10" max="10" required placeholder="XXXX-XXXX-XXXX-XXXX" />
                    </div>
					<div id="divcard" class="form_row" style="display:none;">
						Credit Card Number Cannot be Empty
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
					<div id="divmonth" class="form_row" style="display:none;">
						Please Select a Month
					</div>
					<div id="divyear" class="form_row" style="display:none;">
						Please Select an Year
					</div>

                    <div class="form_row">
                    <label class="contact"><strong>Card Holder Name:</strong></label>
                    <input type="text" id="cardholder" class="contact_input" size="10" max="10" required placeholder="Card Holder Name" />
                    </div>
					<div id="divcardholder" class="form_row" style="display:none;">
						Please type your Card Holder Name
					</div>

                  <h2 class="contact_group">Gift Certificate Information :</h2>      
                    
                    <div class="form_row">
                    <label class="contact"><strong>Certificate Code (if applicable):</strong></label>
                    <input id="certCode" name="certCode" type="number" class="contact_input" size="10" max="10" />
                    </div>

                    
                    <div class="form_row">
                    <button type="submit" href="#" class="contact" onclick="return validateReg();">send</button>                    </div>      
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