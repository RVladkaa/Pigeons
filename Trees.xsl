<xsl:stylesheet version="2.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform" xmlns:date="http://exslt.org/dates-and-times"
extension-element-prefixes="date">
<xsl:output encoding="UTF-8"/>
<xsl:key name="descendant" match="Pigeon" use="@DescendantOf" />
<xsl:key name="pairs" match="Pigeon" use="@PairedTo" />
<xsl:template match="/Tree">
<html>
    <head><link rel="stylesheet" href="../TreeStyle.css" type="text/css"/></head><body>
        <div class="tree" id="tree">
            <ul>
                <xsl:apply-templates select="Pigeon[@DescendantOf='0']"/>
            </ul>
        </div>
    </body>
</html>
</xsl:template>

<xsl:template match="Pigeon">
    <li>
        
        <xsl:variable name="pairs" select="key('pairs', @ID)" />
        <a href="#">
        <xsl:choose>
            <xsl:when test="@Sex = 'cock'">
                <xsl:attribute name="class">cock</xsl:attribute>
            </xsl:when>
            <xsl:otherwise>
                <xsl:attribute name="class">hen</xsl:attribute>
            </xsl:otherwise>
        </xsl:choose>

        
        <xsl:if test="@Death">&#10013;</xsl:if>
        <xsl:value-of select="@IdBand" />&#160;<xsl:value-of select="@Name" /><xsl:if test="$pairs"> &#x26AD; <xsl:if test="$pairs/@Death">&#10013;</xsl:if><xsl:value-of select="$pairs/@IdBand"/>&#160;<xsl:value-of select="$pairs/@Name"/></xsl:if>     
        
        </a>
       <xsl:variable name="descendant" select="key('descendant', @ID)" />
        <xsl:if test="$descendant">
            <ul>
                <xsl:apply-templates select="$descendant" />
            </ul>
        </xsl:if>   
    <!--- If the Pigeon is the child of the in-law -->
        <xsl:variable name="descendant1" select="key('descendant', $pairs/@ID)" />
        <xsl:if test="$descendant1">
            <ul>
                <xsl:apply-templates select="$descendant1" />
            </ul>
        </xsl:if>
    </li>
</xsl:template>   
</xsl:stylesheet>
