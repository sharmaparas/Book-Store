

<xsl:stylesheet version="1.0"
xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

<xsl:template match="/">
  <table class="cart_table2" width="100%">
    <tr class="cart_title">
      <td width="25%">Name</td>
      <td width="25%">Email</td>
      <td width="15%">Phone</td>
      <td width="45%">Message</td>
    </tr>
  </table>
    <xsl:for-each select="catalog/contact">


      <table class="cart_table2" width="100%">
      <tr>
        <td width="25%">
          <xsl:value-of select="name"/>
        </td>
        <td width="25%">
          <xsl:value-of select="email"/>
        </td>
        <td width="15%">
          <xsl:value-of select="phone"/>
        </td>
        <td width="45%">
          <xsl:value-of select="msg"/>
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