<?PHP
session_start();

$IsLoginFail = 'no';
if(isset($_GET['lg']))
{
	if(isset($_POST['user']) && isset($_POST['pwd']))
	{
		$my_file = 'xml/myaccount.xml';
		$handle = fopen($my_file, 'r');
		$data = fread($handle,filesize($my_file));
		$ifExists = strpos($data,"<username>".$_POST['user']."</username><password>".$_POST['pwd']."</password>");
		if($ifExists!='')
		{
			session_start();
			$_SESSION["username"] = $_POST['user'];
			header('Location: myaccount2.php');
		}
		else
		{
			$IsLoginFail = 'yes';
		}
	}
}

if (isset($_POST['username']))
{
$username = $_POST["username"];
$password = $_POST["password"];
$email = $_POST["email"];
$phone = $_POST["phone"];
$company = $_POST["company"];
$addr = $_POST["addr"];
$name = $_POST["name"];
$unit = $_POST["unit"];
$city = $_POST["city"];
$postalcode = $_POST["postalcode"];

$my_file = 'xml/myaccount.xml';
$handle = fopen($my_file, 'r');
$data = fread($handle,filesize($my_file));

$myfile = fopen("xml/myaccount.xml", "w") or die("Unable to open file!");

$txt = str_replace("</catalog>", "", $data);
fwrite($myfile, $txt);
$data_new = "<contact id='1' genre='Computer' flag='new'><username>".$username."</username><password>".$password."</password><email>".$email."</email><genre>Computer</genre><phone>".$phone."</phone><company>".$company."</company><address>".$addr."</address><name>".$name."</name><unit>".$unit."</unit><city>".$city."</city><postalcode>".$postalcode."</postalcode></contact>";
fwrite($myfile, $data_new);


fwrite($myfile, "</catalog>");
fclose($myfile);

header('Location: congrats.php');
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
            <li class="selected"><a href="choosePage.php">my accout</a></li>
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
            <div class="title"><span class="title_icon"><img src="images/bullet1.gif" alt="" title="" /></span>My account</div>
        
        	<div class="feat_prod_box_details">
            <p class="details">
             Please log in to check your account details or register to create a new account.
            </p>
            
              	<div class="contact_form">
                <div class="form_subtitle">login into your account</div>
                 <form name="register" method="post" action="myaccount.php?lg=1">
                    <div class="form_row">
                    <label class="contact"><strong>Username:</strong></label>
                    <input id="user" name="user" type="text" class="contact_input" />
                    </div>

                    <div class="form_row">
                    <label class="contact"><strong>Password:</strong></label>
                    <input id="pwd" name="pwd" type="text" class="contact_input" />
                    </div>                     

                    <div class="form_row">
                        <div class="terms">
                        <input type="checkbox" name="terms" />
                        Remember me
                        </div>
                    </div> 

                    
                    <div class="form_row">
                    <input type="submit" class="register" value="login" />
                    </div>   
                    <?php 
						if($IsLoginFail == 'yes')
							echo "<div style='color:red;'>Invalid Login Details!!</div>";
					?>
                  </form>     
                    
                </div>  
                <script type="text/javascript">
				function validateReg()
				{
				try
				{
					if(document.getElementById('username').value=='' || document.getElementById('password').value=='' || document.getElementById('email').value=='' || document.getElementById('phone').value=='' || document.getElementById('company').value=='' || document.getElementById('addr').value=='' || document.getElementById('name').value=='' || document.getElementById('unit').value=='' || document.getElementById('city').value=='' || document.getElementById('postalcode').value=='')
					{
						if(document.getElementById('username').value=='')
							document.getElementById('divuser').style.display='block';
						else
							document.getElementById('divuser').style.display='none';

						if(document.getElementById('password').value=='')
							document.getElementById('divpassword').style.display='block';
						else
							document.getElementById('divpassword').style.display='none';

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

						if(document.getElementById('addr').value=='')
							document.getElementById('divaddr').style.display='block';
						else
							document.getElementById('divaddr').style.display='none';

						if(document.getElementById('name').value=='')
							document.getElementById('divname').style.display='block';
						else
							document.getElementById('divname').style.display='none';

						if(document.getElementById('unit').value=='')
							document.getElementById('divunit').style.display='block';
						else
							document.getElementById('divunit').style.display='none';

						if(document.getElementById('city').value=='')
							document.getElementById('divcity').style.display='block';
						else
							document.getElementById('divcity').style.display='none';

						if(document.getElementById('postalcode').value=='')
							document.getElementById('divpostalcode').style.display='block';
						else
							document.getElementById('divpostalcode').style.display='none';

						return false;
					}
					return true;
					}	
					catch(e){alert(e);}
				}
				</script>
                <div class="contact_form">
                <div class="form_subtitle">create new account</div>
                 <form name="register" method="post" action="myaccount.php">
                    <div class="form_row">
                    <label class="contact"><strong>Username:</strong></label>
                    <input type="text" id="username" name="username" class="contact_input" />									
                    </div>  
					<div id="divuser" class="form_row" style="display:none;">
						Username Cannot be Empty
					</div>

                    <div class="form_row">
                    <label class="contact"><strong>Password:</strong></label>
                    <input id="password" name="password" type="text" class="contact_input" />
                    </div> 
					<div id="divpassword" class="form_row" style="display:none;">
						Please type your Password
					</div>

					<div class="form_row">
                    <label class="contact"><strong>Name:</strong></label>
                    <input id="name" name="name" type="text" class="contact_input" />
                    </div> 
					<div id="divname" class="form_row" style="display:none;">
						Name Cannot be Empty
					</div>

                    <div class="form_row">
                    <label class="contact"><strong>Email:</strong></label>
                    <input id="email" name="email" type="text" class="contact_input" />
                    </div> 
					<div id="divemail" class="form_row" style="display:none;">
						Email Address Invalid
					</div>


                    <div class="form_row">
                    <label class="contact"><strong>Phone:</strong></label>
                    <input id="phone" name="phone" type="text" class="contact_input" />
                    </div> 
					<div id="divphone" class="form_row" style="display:none;">
						Phone Number must fill out by 10 digit numbers
					</div>
                    
                    <div class="form_row">
                    <label class="contact"><strong>Company:</strong></label>
                    <input id="company" name="company" type="text" class="contact_input" />
                    </div> 
					<div id="divcompany" class="form_row" style="display:none;">
						Company Cannot be Empty
					</div>

					 <div class="form_row">
                    <label class="contact"><strong>Unit Number:</strong></label>
                    <input name="unit" id="unit" type="text" class="contact_input" />
                    </div> 
					<div id="divunit" class="form_row" style="display:none;">
						Unit Number cannot be Empty
					</div>
                    
                    <div class="form_row">
                    <label class="contact"><strong>Address:</strong></label>
                    <input name="addr" id="addr" type="text" class="contact_input" />
                    </div> 
					<div id="divaddr" class="form_row" style="display:none;">
						Address Cannot be Empty
					</div>

					 <div class="form_row">
                    <label class="contact"><strong>City:</strong></label>
                    <input name="city" id="city" type="text" class="contact_input" />
                    </div> 
					<div id="divcity" class="form_row" style="display:none;">
						City Cannot be Empty
					</div>

					 <div class="form_row">
                    <label class="contact"><strong>Postal Code:</strong></label>
                    <input name="postalcode" id="postalcode" type="text" class="contact_input" />
                    </div> 
					<div id="divpostalcode" class="form_row" style="display:none;">
						Postal Code Cannot be Empty
					</div>

                    <div class="form_row">
                        <div class="terms">
                        <input type="checkbox" name="terms" />
                        I agree to the <a href="#">terms &amp; conditions</a>                        </div>
                    </div> 

                    
                    <div class="form_row">
                    <input type="submit" class="register" value="register" onclick="return validateReg();" />
                    </div>   
                  </form>     
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