
<xsl:stylesheet version="1.0"
xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

<xsl:template match="/">
  <xsl:for-each select="catalog/book">


          <div class="crumb_nav">
            <a href="index.php">home</a> &gt;&gt; <xsl:value-of select="title" />
            </div>
            <div class="title"><span class="title_icon"><img src="images/bullet1.gif" alt="" title="" /></span><xsl:value-of select="title" /></div>
        
          <div class="feat_prod_box_details">
            
              <div class="prod_img">
                  <img alt="" class="img-prod" title="">
                    <xsl:attribute name="src">
                        <xsl:value-of select="image" />
                    </xsl:attribute>
                  </img> 
              
                <br /><br />
                <a href="images/big_pic.jpg" rel="lightbox"><img src="images/zoom.gif" alt="" title="" border="0" /></a>
                </div>
                
                <div class="prod_det_box">
                  <div class="box_top empty_div">a</div>
                    <div class="box_center">
                    <div class="prod_title">Details</div>
                    <p class="details"><xsl:value-of select="description" /> </p>


                    <div class="price"><strong>PRICE:</strong> <span class="red"><xsl:value-of select="price" /> $</span></div>
                    <div class="price"><strong>Publish Date:</strong> <xsl:value-of select="publish_date" /></div>
                    <div class="price"><strong>Author:</strong> <xsl:value-of select="author" /></div>
                    <div class="price"><strong>COLORS:</strong> 
                    <span class="colors"><img src="images/color1.gif" alt="" title="" border="0" /></span>
                    <span class="colors"><img src="images/color2.gif" alt="" title="" border="0" /></span>
                    <span class="colors"><img src="images/color3.gif" alt="" title="" border="0" /></span>
                    </div>
                    <!--<a href="#" class="more"><img src="images/order_now.gif" alt="" title="" border="0" />                      
                    </a>-->
                    <div class="clear empty_div"> a</div>
                    </div>
                    
                    <div class="box_bottom empty_div">a </div>
                </div>    
            <div class="clear empty_div"> a</div>
            </div>  
            
              

  </xsl:for-each>
</xsl:template>

</xsl:stylesheet>