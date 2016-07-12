
<xsl:stylesheet version="1.0"
xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

<xsl:template match="/">
  <xsl:for-each select="catalog/book">
      <div class="new_prod_box">
          <a>
            <xsl:attribute name="href">
                product.php?id=<xsl:value-of select="@id" />
            </xsl:attribute>
            <xsl:value-of select="title"/></a>
          <div class="new_prod_bg">
          <span class="new_icon">
            <img alt="" title="">
              <xsl:attribute name="src">
                  <xsl:value-of select="flag/image" />
              </xsl:attribute>
            </img> 
          </span>
          <a>
            <xsl:attribute name="href">
                product.php?id=<xsl:value-of select="@id" />
            </xsl:attribute>
            <img alt="" title="" class="thumb" border="0">
              <xsl:attribute name="src">
                  <xsl:value-of select="image" />
              </xsl:attribute>
            </img>
            </a>
          </div>           
      </div> 
  </xsl:for-each>
</xsl:template>

</xsl:stylesheet>