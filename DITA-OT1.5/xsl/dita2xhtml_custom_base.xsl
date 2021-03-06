<?xml version="1.0" encoding="UTF-8" ?>
<!-- This file is part of the DITA Open Toolkit project hosted on 
     Sourceforge.net. See the accompanying license.txt file for 
     applicable licenses.-->
<!-- (c) Copyright IBM Corp. 2004, 2005 All Rights Reserved. -->

<xsl:stylesheet version="1.0"
                xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
                xmlns:saxon="http://icl.com/saxon"
                extension-element-prefixes="saxon"                
                >

<!-- idit2htm.xsl   main stylesheet
 | Convert DITA topic to HTML; "single topic to single web page"-level view
 |
-->

<!-- stylesheet imports -->
<!-- the main dita to xhtml converter -->
<xsl:import href="xslhtml/dita2htmlImpl.xsl"/>

<!-- the dita to xhtml converter for concept documents -->
<xsl:import href="xslhtml/conceptdisplay.xsl"/>

<!-- the dita to xhtml converter for glossentry documents -->
<xsl:import href="xslhtml/glossdisplay.xsl"/>

<!-- the dita to xhtml converter for task documents -->
<xsl:import href="xslhtml/taskdisplay.xsl"/>

<!-- the dita to xhtml converter for reference documents -->
<xsl:import href="xslhtml/refdisplay.xsl"/>

<!-- user technologies domain -->
<xsl:import href="xslhtml/ut-d.xsl"/>
<!-- software domain -->
<xsl:import href="xslhtml/sw-d.xsl"/>
<!-- programming domain -->
<xsl:import href="xslhtml/pr-d.xsl"/>
<!-- ui domain -->
<xsl:import href="xslhtml/ui-d.xsl"/>
<!-- highlighting domain -->
<xsl:import href="xslhtml/hi-d.xsl"/>
<!-- abbreviated-form domain -->
<xsl:import href="xslhtml/abbrev-d.xsl"/>

<dita:extension id="dita.xsl.xhtml" behavior="org.dita.dost.platform.ImportXSLAction" xmlns:dita="http://dita-ot.sourceforge.net"/>

  <!-- Output XHTML with XML syntax, use UFT-8 encoding="UTF-8", transitional XHTML.
       Prevent indenting to conserve space on output. -->
  <!--xsl:output method="saxon:xhtml" -->
  <xsl:output method="xml" 
	      encoding="UTF-8"
	      indent="no"
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

	<!--main template for setting up all links after the body - applied to the related-links container-->
	<xsl:template match="*[contains(@class,' topic/related-links ')]" name="topic.related-links">
		<div>
			<xsl:call-template name="commonattributes"/>

	  <!-- <xsl:call-template name="ul-child-links"/> --><!--handle child/descendants outside of linklists in collection-type=unordered or choice-->

	  <!-- <xsl:call-template name="ol-child-links"/> --><!--handle child/descendants outside of linklists in collection-type=ordered/sequence-->

	  <!-- <xsl:call-template name="next-prev-parent-links"/> --><!--handle next and previous links-->

	  <!-- Calls to typed links deprecated.  Grouping instead performed by related-links:group-unordered-links template. -->

	  <!--<xsl:call-template name="concept-links"/>--><!--sort remaining concept links by type-->

	  <!--<xsl:call-template name="task-links"/>--><!--sort remaining task links by type-->

	  <!--<xsl:call-template name="reference-links"/>--><!--sort remaining reference links by type-->

	  <!--<xsl:call-template name="relinfo-links"/>--><!--handle remaining untyped and unknown-type links-->

	  <!-- Group all unordered links (which have not already been handled by prior sections). Skip duplicate links. -->
	  <!-- NOTE: The actual grouping code for related-links:group-unordered-links is common between
	             transform types, and is located in ../common/related-links.xsl. Actual code for
	             creating group titles and formatting links is located in XSL files specific to each type. -->
	  <!--linklists - last but not least, create all the linklists and their links, with no sorting or re-ordering-->
			<xsl:apply-templates select="*[contains(@class,' topic/linklist ')]"/>
			<br />
		</div>
	</xsl:template>

  <xsl:template match="/">
    <xsl:apply-templates/>
  </xsl:template>

</xsl:stylesheet>
