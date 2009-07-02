<?xml version="1.0" encoding="UTF-8" ?>
<!DOCTYPE xsl:stylesheet [

<!ENTITY raquo            "&#187;">

]>

<!-- This file is part of the DITA Open Toolkit project hosted on 
Sourceforge.net. See the accompanying license.txt file for 
applicable licenses.-->
<!-- (c) Copyright IBM Corp. 2004, 2005 All Rights Reserved. -->

<xsl:stylesheet version="1.0"
		xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
		xmlns:saxon="http://icl.com/saxon"
		extension-element-prefixes="saxon"                
		>


<xsl:import href="dita2xhtml_custom.xsl"/>

  <!-- Output XHTML with XML syntax, use UFT-8 encoding="UTF-8", transitional XHTML.
       Prevent indenting to conserve space on output. -->
  <!--xsl:output method="saxon:xhtml" -->
  <xsl:output method="xml" 
	      encoding="UTF-8"
	      indent="no"
	      doctype-system="http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"
	      doctype-public="-//W3C//DTD XHTML 1.0 Transitional//EN"
	      />

  <!-- DITAEXT file extension name of dita topic file -->
  <xsl:param name="DITAEXT" select="'.xml'"/>

<!-- NESTED TOPIC TITLES (sensitive to nesting depth, but are still processed for contained markup) -->
<!-- 1st level - topic/title -->
<!-- Condensed topic title into single template without priorities; use $headinglevel to set heading.
     If desired, somebody could pass in the value to manually set the heading level -->
<!-- adds one level to the heading, the main h1 heading is in the websites code -->
<xsl:template match="*[contains(@class,' topic/topic ')]/*[contains(@class,' topic/title ')]">
  <xsl:param name="headinglevel">
      <xsl:choose>
          <xsl:when test="count(ancestor::*[contains(@class,' topic/topic ')]) + 1 > 6">6</xsl:when>
          <xsl:otherwise><xsl:value-of select="count(ancestor::*[contains(@class,' topic/topic ')]) + 1"/></xsl:otherwise>
      </xsl:choose>
  </xsl:param>
  <xsl:element name="h{$headinglevel}">
      <xsl:attribute name="class">topictitle<xsl:value-of select="$headinglevel"/></xsl:attribute>
      <xsl:call-template name="commonattributes"/>
      <xsl:apply-templates/>
  </xsl:element>
  <xsl:value-of select="$newline"/>
</xsl:template>


  <!-- root rule -->



  <xsl:template match="/">
    <xsl:apply-templates/>
  </xsl:template>

</xsl:stylesheet>
