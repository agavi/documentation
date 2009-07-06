<?xml version="1.0" encoding="UTF-8" ?>
<!-- This file is part of the DITA Open Toolkit project hosted on 
     Sourceforge.net. See the accompanying license.txt file for 
     applicable licenses.-->
<!-- (c) Copyright IBM Corp. 2004, 2005 All Rights Reserved. -->

<!DOCTYPE xsl:stylesheet [

  <!ENTITY gt            "&gt;">
  <!ENTITY lt            "&lt;">
  <!ENTITY rbl           " ">
  <!ENTITY nbsp          "&#xA0;">    <!-- &#160; -->
  <!ENTITY quot          "&#34;">
  <!ENTITY copyr         "&#169;">
  ]>
  
<xsl:stylesheet version="1.0"
                xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
                xmlns:saxon="http://icl.com/saxon"
                extension-element-prefixes="saxon"
                >

<!-- map2htmltoc.xsl   custom stylesheet
     Convert DITA map to a simple HTML table-of-contents view.
     Input = one DITA map file
     Output = one HTML file for viewing/checking by the author.

     Options:
        OUTEXT  = XHTML output extension (default is '.html')
        WORKDIR = The working directory that contains the document being transformed.
                   Needed as a directory prefix for the @href "document()" function calls.
                   Default is './'
-->

<!-- Include standard toc template -->
<xsl:import href="map2htmtoc.xsl"/>

<xsl:output method="xml" encoding="UTF-8"
	indent="yes"
	omit-xml-declaration="yes"
	/>
	

<!-- *********************************************************************************
     Setup the HTML wrapper for the table of contents
     ********************************************************************************* -->
<xsl:template match="/">
    <xsl:apply-templates/>
</xsl:template>


<xsl:template name="copyright">
  
</xsl:template>

<!-- *********************************************************************************
     If processing only a single map, setup the HTML wrapper and output the contents.
     Otherwise, just process the contents.
     ********************************************************************************* -->
<xsl:template match="/*[contains(@class, ' map/map ')]">
  <xsl:param name="pathFromMaplist"/>
  <xsl:if test=".//*[contains(@class, ' map/topicref ')][not(@toc='no')][not(@processing-role='resource-only')]">
    <ol> <xsl:if test="string-length($OUTPUTCLASS) &gt; 0">
       <xsl:attribute name="class">
         <xsl:value-of select="$OUTPUTCLASS"/>
       </xsl:attribute>
     </xsl:if>
	<xsl:value-of select="$newline"/>

      <xsl:apply-templates select="*[contains(@class, ' map/topicref ')]">
        <xsl:with-param name="pathFromMaplist" select="$pathFromMaplist"/>
      </xsl:apply-templates>
    </ol><xsl:value-of select="$newline"/>
  </xsl:if>
</xsl:template>

<!-- *********************************************************************************
     Output each topic as an <li> with an A-link. Each item takes 2 values:
     - A title. If a navtitle is specified on <topicref>, use that.
       Otherwise try to open the file and retrieve the title. First look for a navigation title in the topic,
       followed by the main topic title. Last, try to use <linktext> specified in the map.
       Failing that, use *** and issue a message.
     - An HREF is optional. If none is specified, this will generate a wrapper.
       Include the HREF if specified.
     - Ignore if TOC=no.

     If this topicref has any child topicref's that will be part of the navigation,
     output a <ol> around them and process the contents.
     ********************************************************************************* -->
<xsl:template match="*[contains(@class, ' map/topicref ')][not(@toc='no')][not(@processing-role='resource-only')]">
  <xsl:param name="pathFromMaplist"/>
  <xsl:variable name="title">
    <xsl:call-template name="navtitle"/>
  </xsl:variable>
  <xsl:choose>
    <xsl:when test="$title and $title!=''">
      <li>
        <xsl:choose>
          <!-- If there is a reference to a DITA or HTML file, and it is not external: -->
          <xsl:when test="@href and not(@href='')">
            <xsl:element name="a">
              <xsl:attribute name="href">
                <xsl:choose>        <!-- What if targeting a nested topic? Need to keep the ID? -->
                  <xsl:when test="contains(@copy-to, $DITAEXT) and not(contains(@chunk, 'to-content'))">
                    <xsl:if test="not(@scope='external')"><xsl:value-of select="$pathFromMaplist"/></xsl:if>
                    <xsl:value-of select="substring-before(@copy-to,$DITAEXT)"/><xsl:value-of select="$OUTEXT"/>
                    <xsl:if test="not(contains(@copy-to, '#')) and contains(@href, '#')">
                      <xsl:value-of select="concat('#', substring-after(@href, '#'))"/>
                    </xsl:if>
                  </xsl:when>
                  <xsl:when test="contains(@href,$DITAEXT)">
                    <xsl:if test="not(@scope='external')"><xsl:value-of select="$pathFromMaplist"/></xsl:if>
                    <xsl:value-of select="substring-before(@href,$DITAEXT)"/><xsl:value-of select="$OUTEXT"/>
                    <xsl:if test="contains(@href, '#')">
                      <xsl:value-of select="concat('#', substring-after(@href, '#'))"/>
                    </xsl:if>
                  </xsl:when>
                  <xsl:otherwise>  <!-- If non-DITA, keep the href as-is -->
                    <xsl:if test="not(@scope='external')"><xsl:value-of select="$pathFromMaplist"/></xsl:if>
                    <xsl:value-of select="@href"/>
                  </xsl:otherwise>
                </xsl:choose>
              </xsl:attribute>
              <xsl:if test="@scope='external' or @type='external' or ((@format='PDF' or @format='pdf') and not(@scope='local'))">
                <xsl:attribute name="target">_blank</xsl:attribute>
              </xsl:if>
              <xsl:value-of select="$title"/>
            </xsl:element>
          </xsl:when>
          
          <xsl:otherwise>
            <xsl:value-of select="$title"/>
          </xsl:otherwise>
        </xsl:choose>
        
        <!-- If there are any children that should be in the TOC, process them -->
        <xsl:if test="descendant::*[contains(@class, ' map/topicref ')][not(contains(@toc,'no'))][not(@processing-role='resource-only')]">
          <xsl:value-of select="$newline"/><ol><xsl:value-of select="$newline"/>
            <xsl:apply-templates select="*[contains(@class, ' map/topicref ')]">
              <xsl:with-param name="pathFromMaplist" select="$pathFromMaplist"/>
            </xsl:apply-templates>
          </ol><xsl:value-of select="$newline"/>
        </xsl:if>
      </li><xsl:value-of select="$newline"/>
    </xsl:when>
    <xsl:otherwise>
      <!-- if it is an empty topicref -->
      <xsl:apply-templates select="*[contains(@class, ' map/topicref ')]">
        <xsl:with-param name="pathFromMaplist" select="$pathFromMaplist"/>
      </xsl:apply-templates>
    </xsl:otherwise>
  </xsl:choose>
  
</xsl:template>

</xsl:stylesheet>
