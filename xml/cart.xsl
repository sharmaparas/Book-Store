
<xsl:stylesheet version="1.0"
xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

<xsl:template match="/">
  <table class="cart_table">
    <tr class="cart_title">
      <td width="20%">Item pic</td>
      <td width="30%">Book name</td>
      <td width="20%">Unit price</td>
      <td width="10%">Qty</td>
      <td width="20%">Total</td>
    </tr>
  </table>
    <xsl:for-each select="catalog/book">


      <table class="cart_table" width="100%">
      <tr>
        <td width="20%">
          <a href="#">
            <div class="prod_img">
              <a>
                <xsl:attribute name="href">
                  product.php?id=<xsl:value-of select="@id" />
                </xsl:attribute>
                <img class="img-prod-row" alt="" title="">
                  <xsl:attribute name="src">
                    <xsl:value-of select="image" />
                  </xsl:attribute>
                </img>
              </a>
            </div>
          </a>
        </td>
        <td width="30%" align="left">
          <a>
            <xsl:attribute name="href">
              product.php?id=<xsl:value-of select="@id" />
            </xsl:attribute>
            <xsl:value-of select="title"/>
          </a>
        </td>
        <td width="20%" align="left">
          <xsl:value-of select="price"/>$
        </td>
        <td width="10%" align="center">1</td>
        <td width="18%" align="center">
          <xsl:value-of select="price"/>$
        </td>
        <td width="2%" align="left">
          <a>
            <xsl:attribute name="href">
              scart.php?title=<xsl:value-of select="title" />
            </xsl:attribute>
            <img src="images/close.png"></img>
          </a>
          
        </td>
        
      </tr>
      

    </table>
            <!--<div class="feat_prod_box">
            
                <div class="prod_img">
                    <a>
                        <xsl:attribute name="href">
                            product.php?id=<xsl:value-of select="@id" />
                        </xsl:attribute>
                         <img class="img-prod-row" alt="" title="">
                    <xsl:attribute name="src">
                        <xsl:value-of select="image" />
                    </xsl:attribute></img></a></div>
                
                <div class="prod_det_box">
                    <span class="special_icon"><img src="images/special_icon.gif" alt="" title="" /></span>
                    <div class="box_top empty_div">a</div>
                    <div class="box_center">
                    <div class="prod_title"><xsl:value-of select="title" /></div>
                    <p class="details"><xsl:value-of select="description" /></p>
                    <a>
                        <xsl:attribute name="href">
                            product.php?id=<xsl:value-of select="@id" />
                        </xsl:attribute>- more details -</a>
                    <div class="clear empty_div">a</div>
                    </div>
                    
                    <div class="box_bottom empty_div">a</div>
                </div>    
            <div class="clear empty_div">a</div>
            </div>-->  

  </xsl:for-each>
</xsl:template>

</xsl:stylesheet>