<?PHP
session_start();

if (isset($_POST['name']))
{
$name = $_POST["name"];
$email = $_POST["email"];
$phone = $_POST["phone"];
$company = $_POST["company"];
$msg = $_POST["msg"];

$my_file = 'xml/contacts.xml';
$handle = fopen($my_file, 'r');
$data = fread($handle,filesize($my_file));

$myfile = fopen("xml/contacts.xml", "w") or die("Unable to open file!");
$txt = "John Doe\n";

$txt = str_replace("</catalog>", "", $data);
fwrite($myfile, $txt);
$data_new = "<contact id='1' genre='Computer' flag='new'><name>".$name."</name><email>".$email."</email><genre>Computer</genre><phone>".$phone."</phone><company>".$company."</company><msg>".$msg."</msg></contact>";
fwrite($myfile, $data_new);


fwrite($myfile, "</catalog>");
fclose($myfile);
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
            <li class="selected"><a href="contact.php">contact</a></li>
            <li><a href="order.php">order</a></li>
            <li><a href="faq.php">faq</a></li>
            <li><a href="references.php">references</a></li>
            </ul>
        </div>     
            
            
       </div> 
       
       
       <div class="center_content">
       	<div class="left_content">
            <div class="title"><span class="title_icon"><img src="images/bullet1.gif" alt="" title="" /></span>Contact Us</div>
        <script type="text/javascript">
				function validateReg()
				{
				try
				{
					if(document.getElementById('name').value=='' || document.getElementById('email').value=='' || document.getElementById('phone').value=='' || document.getElementById('company').value=='' || document.getElementById('msg').value=='')
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
						
						if(document.getElementById('company').value=='')
							document.getElementById('divcompany').style.display='block';
						else
							document.getElementById('divcompany').style.display='none';

						if(document.getElementById('msg').value=='')
							document.getElementById('divmsg').style.display='block';
						else
							document.getElementById('divmsg').style.display='none';

						return false;
					}
					return true;
					}	
					catch(e){alert(e);}
				}
				</script>
        	<div class="feat_prod_box_details">
            <p class="details">Contact us on 1300 999 999 9am - 4pm AEST, Monday - Friday. Or send us an email.</p>
            <form method="post" action="contact.php">
              	<div class="contact_form">
                <div class="form_subtitle">all fields are requierd</div>          
                    <div class="form_row">
                    <label class="contact"><strong>Name:</strong></label>
                    <input type="text" id="name" name="name" class="contact_input" />
                    </div>  
					<div id="divname" class="form_row" style="display:none;">
						Name Cannot be Empty
					</div>

                    <div class="form_row">
                    <label class="contact"><strong>Email:</strong></label>
                    <input type="text" id="email" name="email" class="contact_input" />
                    </div>
					<div id="divemail" class="form_row" style="display:none;">
						Email Address Invalid
					</div>

                    <div class="form_row">
                    <label class="contact"><strong>Phone:</strong></label>
                    <input type="text" id="phone" name="phone" class="contact_input" />
                    </div>
                    <div id="divphone" class="form_row" style="display:none;">
						Phone Number must fill out by 10 digit numbers
					</div>

                    <div class="form_row">
                    <label class="contact"><strong>Company:</strong></label>
                    <input type="text" id="company" name="company" class="contact_input" />
                    </div>
					<div id="divcompany" class="form_row" style="display:none;">
						Company Cannot be Empty
					</div>

                    <div class="form_row">
                    <label class="contact"><strong>Message:</strong></label>
                    <textarea id="msg" class="contact_textarea" name="msg" ></textarea>
                    </div>
					<div id="divmsg" class="form_row" style="display:none;">
						Message Cannot be Empty
					</div>
                    
                    <div class="form_row">
                    <input type="Submit" value="Submit" class="contact" style="cursor:pointer" onclick="return validateReg();" ></input>
					</div>      
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