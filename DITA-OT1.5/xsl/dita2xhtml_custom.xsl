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


<xsl:import href="dita2xhtml.xsl"/>

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

  <!-- ======== Left Sidebar ======== -->



  <!-- SHJS syntax highlighting -->
  <xsl:template match="//codeblock[@outputclass='php']">
    <pre class="sh_php">
      <xsl:apply-templates/>
    </pre>
  </xsl:template>

  <!-- SHJS syntax highlighting -->
  <xsl:template match="//codeblock[@outputclass='xml']">
    <pre class="sh_xml">
      <xsl:apply-templates/>
    </pre>
  </xsl:template>

  <!-- root rule -->



  <xsl:template match="/">
    <xsl:apply-templates/>
  </xsl:template>

</xsl:stylesheet>
