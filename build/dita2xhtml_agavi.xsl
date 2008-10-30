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

  <!-- idit2htm.xsl   main stylesheet
       | Convert DITA topic to HTML; "single topic to single web page"-level view
       |
  -->

  <!-- stylesheet imports -->
  <!-- the main dita to xhtml converter -->
  <xsl:import href="xslhtml/dita2htmlImpl.xsl"/>

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

  <xsl:import href="xslhtml/custom_html.xsl"/>

  <dita:extension id="dita.xsl.xhtml" behavior="org.dita.dost.platform.ImportAction" xmlns:dita="http://dita-ot.sourceforge.net"/>

  <!-- the dita to xhtml converter for element reference documents - not used now -->
  <!--<xsl:import href="elementrefdisp.xsl"/>-->

  <!-- Output XHTML with XML syntax, use UFT-8 encoding="UTF-8", transitional XHTML.
       Prevent indenting to conserve space on output. -->
  <!--xsl:output method="saxon:xhtml" -->
  <xsl:output method="xml" 
	      encoding="UTF-8"
	      indent="no"
	      omit-xml-declaration="yes"
	      standalone="no"
	      />

  <!-- DITAEXT file extension name of dita topic file -->
  <xsl:param name="DITAEXT" select="'.xml'"/>

<xsl:template name="chapter-setup">
<!--<html> -->
  <xsl:call-template name="setTopicLanguage"/>
  <xsl:value-of select="$newline"/>
  <xsl:call-template name="chapterHead"/>
  <xsl:call-template name="chapterBody"/> 
<!-- </html> -->
</xsl:template>

  <xsl:template name="chapterHead">
  </xsl:template>
  <!-- ======== Left Sidebar ======== -->

  <xsl:template match="/|node()|@*" mode="gen-user-sidetoc">
<!--    <div id="sidebar"><xsl:value-of select="$newline"/>
    <xsl:apply-templates select="/topic/related-links" mode="custrellinks" />
    </div> -->
  </xsl:template>

<!-- // Disabled until I figure out how to generate p/n map in the translation stage 
  <xsl:template name="gen-user-sidetoc">
    <xsl:apply-templates select="//topic" mode="gen-user-sidetoc"/>
  </xsl:template>

  <xsl:template match="/|node()|@*" mode="gen-user-sidetoc">
    <div id="sidebar"><xsl:value-of select="$newline"/>
    <div><xsl:value-of select="$newline"/>
    <p class="title"><a href="index.html">Chapter</a></p>
    <ul>
      <li><a href="index.html">Topic 1</a></li>
      <li class="highlight"><a href="template.html">Topic 2</a>
      <span class="hidden">(this page)</span></li>
      <li><a href="sample.html">Topic 3</a></li>
    </ul>
    </div><xsl:value-of select="$newline"/>
    </div><xsl:value-of select="$newline"/>
  </xsl:template>
-->

  <!-- include shjs syntax highlighter -->
  <xsl:template name="gen-user-scripts">
    <xsl:apply-templates select="." mode="gen-user-scripts"/>
  </xsl:template>
  <!-- // hacks are so that dita doesn't collapse into <script/> which breaks browsers -->
  <xsl:template match="/|node()|@*" mode="gen-user-scripts">
<!--    <script src="sh_main.min.js" type="text/javascript">//</script>
    <script src="sh_php.min.js" type="text/javascript">//</script>
    <script src="sh_xml.min.js" type="text/javascript">//</script> -->
  </xsl:template>


  <!-- SHJS syntax highlighting -->
  <xsl:template match="//codeblock[@class='php']">
    <pre class="sh_php">
      <xsl:apply-templates/>
    </pre>
  </xsl:template>

  <!-- SHJS syntax highlighting -->
  <xsl:template match="//codeblock[@class='xml']">
    <pre class="sh_xml">
      <xsl:apply-templates/>
    </pre>
  </xsl:template>

  <xsl:template name="gen-user-styles">
    <xsl:apply-templates select="." mode="gen-user-styles"/>
  </xsl:template>
  <xsl:template match="/|node()|@*" mode="gen-user-styles">
<!--    <link rel="stylesheet" type="text/css" href="sh_style.css"/> -->
  </xsl:template>

  <!-- override to load the shjs syntax highlighter -->
  <xsl:template name="chapterBody">
    <xsl:variable name="flagrules">
      <xsl:call-template name="getrules"/>
    </xsl:variable>
    <xsl:variable name="conflictexist">
      <xsl:call-template name="conflict-check">
	<xsl:with-param name="flagrules" select="$flagrules"/>
      </xsl:call-template>
    </xsl:variable>
<!--    <body onLoad="sh_highlightDocument()"> -->
      <!-- Already put xml:lang on <html>; do not copy to body with commonattributes -->
      <xsl:call-template name="gen-style">
	<xsl:with-param name="conflictexist" select="$conflictexist"></xsl:with-param> 
	<xsl:with-param name="flagrules" select="$flagrules"></xsl:with-param>
      </xsl:call-template>
      <xsl:call-template name="setidaname"/>
      <xsl:value-of select="$newline"/>
      <xsl:call-template name="start-flagit">
	<xsl:with-param name="flagrules" select="$flagrules"></xsl:with-param>     
      </xsl:call-template>
      <xsl:call-template name="start-revflag">
	<xsl:with-param name="flagrules" select="$flagrules"/>
      </xsl:call-template>
      <xsl:call-template name="generateBreadcrumbs"/>
      <xsl:call-template name="gen-user-header"/>  <!-- include user's XSL running header here -->
      <xsl:call-template name="processHDR"/>
      <!-- Include a user's XSL call here to generate a toc based on what's a child of topic -->
      <xsl:call-template name="gen-user-sidetoc"/>
      <xsl:apply-templates/> <!-- this will include all things within topic; therefore, -->

      <!-- title content will appear here by fall-through -->
      <!-- followed by prolog (but no fall-through is permitted for it) -->
      <!-- followed by body content, again by fall-through in document order -->
      <!-- followed by related links -->
      <!-- followed by child topics by fall-through -->
      
      <xsl:call-template name="gen-endnotes"/>    <!-- include footnote-endnotes -->
      <xsl:call-template name="gen-user-footer"/> <!-- include user's XSL running footer here -->
    
      <xsl:call-template name="processFTR"/>      <!-- Include XHTML footer, if specified -->
      <xsl:call-template name="end-revflag">
	<xsl:with-param name="flagrules" select="$flagrules"/>
      </xsl:call-template>
      <xsl:call-template name="end-flagit">
	<xsl:with-param name="flagrules" select="$flagrules"></xsl:with-param>  
      </xsl:call-template>
<!--    </body> -->
    <xsl:value-of select="$newline"/>
  </xsl:template>

  <xsl:template match="/|node()|@*" mode="gen-user-header">
<!--
    <div id="mainlink"><a href="#main">Skip to main content.</a></div>

    <div id="header">
      <div class="left">
	<p><a href="">Agavi Tutorial</a></p>
      </div>

      <div class="right">
	<span class="hidden">Useful links:</span>
	<a href="http://www.agavi.org/docs/tutorial/">Tutorial</a> |
	<a href="http://trac.agavi.org">Trac</a> |
	<a href="http://www.agavi.org">Main site</a>
      </div>

      <div class="subheader">
	<span class="hidden">Navigation:</span>
	<a class="highlight" href="../index.html">Contents</a> |
	<a href="introduction.html">Introduction</a> |
	<a href="setting-up-initial-application.html">Initial setup</a> |
	<a href="basics.html">Basic application</a> |
	<a href="advanced-facilities.html">Advanced facilities</a> |
      </div>
    </div>

-->
  </xsl:template>

  <xsl:template match="*[contains(@class,' topic/topic ')]/*[contains(@class,' topic/title ')]">
    <!-- disable out-of-flow topic generation -->
  </xsl:template>

  <xsl:template match="//filepath">
    <strong>
      <xsl:value-of select="."/>
    </strong>
  </xsl:template>

  <xsl:template match="//keyword">
    <em>
      <xsl:value-of select="."/>
    </em>
  </xsl:template>

  <xsl:template match="/topic/title" mode="custtitle">
    <h1 class="topictitle1">
      <xsl:call-template name="commonattributes"/>
      <xsl:apply-templates/>
    </h1>
    <xsl:value-of select="$newline"/>
  </xsl:template>

  <!-- block out the default generation of related links -->
  <xsl:template match="*[contains(@class,' topic/related-links ')]" name="topic.related-links">
  </xsl:template>
  
  <!--main template for setting up all links after the body - applied to the related-links container-->
  <xsl:template match="/topic/related-links" mode="custrellinks">
    <div>
      <xsl:call-template name="commonattributes"/>

      <xsl:call-template name="ul-child-links"/><!--handle child/descendants outside of linklists in collection-type=unordered or choice-->

      <xsl:call-template name="ol-child-links"/><!--handle child/descendants outside of linklists in collection-type=ordered/sequence-->

      <xsl:call-template name="next-prev-parent-links"/><!--handle next and previous links-->

      <xsl:call-template name="concept-links"/><!--sort remaining concept links by type-->

      <xsl:call-template name="task-links"/><!--sort remaining task links by type-->

      <xsl:call-template name="reference-links"/><!--sort remaining reference links by type-->

      <xsl:call-template name="relinfo-links"/><!--handle remaining untyped and unknown-type links-->

      <!--linklists - last but not least, create all the linklists and their links, with no sorting or re-ordering-->
      <xsl:apply-templates select="*[contains(@class,' topic/linklist ')]"/>
    </div>
  </xsl:template>

  <!-- remove preceding <br/> from <ul>s -->

  <xsl:template match="*[contains(@class,' topic/ul ')]" mode="ul-fmt">
    <xsl:variable name="flagrules">
      <xsl:call-template name="getrules"/>
    </xsl:variable>
    <xsl:variable name="conflictexist">
      <xsl:call-template name="conflict-check">
	<xsl:with-param name="flagrules" select="$flagrules"/>
      </xsl:call-template>
    </xsl:variable>
    <xsl:call-template name="start-flagit">
      <xsl:with-param name="flagrules" select="$flagrules"></xsl:with-param>     
    </xsl:call-template>
    <xsl:call-template name="start-revflag">
      <xsl:with-param name="flagrules" select="$flagrules"/>
    </xsl:call-template>
    <xsl:call-template name="setaname"/>
    <ul>
      <xsl:call-template name="commonattributes"/>
      <xsl:call-template name="gen-style">
	<xsl:with-param name="conflictexist" select="$conflictexist"></xsl:with-param> 
	<xsl:with-param name="flagrules" select="$flagrules"></xsl:with-param>
      </xsl:call-template>
      <xsl:apply-templates select="@compact"/>
      <xsl:call-template name="setid"/>
      <xsl:apply-templates/>
    </ul>
    <xsl:call-template name="end-revflag">
      <xsl:with-param name="flagrules" select="$flagrules"/>
    </xsl:call-template>
    <xsl:call-template name="end-flagit">
      <xsl:with-param name="flagrules" select="$flagrules"></xsl:with-param> 
    </xsl:call-template>
    <xsl:value-of select="$newline"/>
  </xsl:template>

  <!-- =========== BODY/SECTION (not sensitive to nesting depth) =========== -->

  <xsl:template match="*[contains(@class,' topic/body ')]" name="topic.body">
    <xsl:variable name="flagrules">
      <xsl:call-template name="getrules"/>
    </xsl:variable>
    <xsl:variable name="conflictexist">
      <xsl:call-template name="conflict-check">
	<xsl:with-param name="flagrules" select="$flagrules"/>
      </xsl:call-template>
    </xsl:variable>
    <div id="main">
<!--
      <div id="navhead">
	<hr />
	<span class="hidden">Path to this page:</span>
	<a href="index.html">Home</a> &raquo;
	<a href="index.html">Other</a> &raquo;
      </div>
-->
      <xsl:apply-templates select="//topic/title" mode="custtitle"/>
      <xsl:call-template name="commonattributes"/>
      <xsl:call-template name="setidaname"/>
      <xsl:call-template name="gen-style">
	<xsl:with-param name="conflictexist" select="$conflictexist"></xsl:with-param> 
	<xsl:with-param name="flagrules" select="$flagrules"></xsl:with-param>
      </xsl:call-template>
      <xsl:call-template name="start-flagit">
	<xsl:with-param name="flagrules" select="$flagrules"></xsl:with-param>     
      </xsl:call-template>
      <xsl:call-template name="start-revflag">
	<xsl:with-param name="flagrules" select="$flagrules"/>  
      </xsl:call-template>
      <!-- here, you can generate a toc based on what's a child of body -->
      <!--xsl:call-template name="gen-sect-ptoc"/--><!-- Works; not always wanted, though; could add a param to enable it.-->

      <!-- Insert prev/next links. since they need to be scoped by who they're 'pooled' with, apply-templates in 'hierarchylink' mode to linkpools (or related-links itself) when they have children that have any of the following characteristics:
	   - role=ancestor (used for breadcrumb)
	   - role=next or role=previous (used for left-arrow and right-arrow before the breadcrumb)
	   - importance=required AND no role, or role=sibling or role=friend or role=previous or role=cousin (to generate prerequisite links)
	   - we can't just assume that links with importance=required are prerequisites, since a topic with eg role='next' might be required, while at the same time by definition not a prerequisite -->

      <!-- Added for DITA 1.1 "Shortdesc proposal" -->
      <!-- get the abstract para -->
      <xsl:apply-templates select="preceding-sibling::*[contains(@class,' topic/abstract ')]" mode="outofline"/>
      
      <!-- get the shortdesc para -->
      <xsl:apply-templates select="preceding-sibling::*[contains(@class,' topic/shortdesc ')]" mode="outofline"/>
      
      <!-- Insert pre-req links - after shortdesc - unless there is a prereq section about -->
      <xsl:apply-templates select="following-sibling::*[contains(@class,' topic/related-links ')]" mode="prereqs"/>
      <xsl:apply-templates/>
      <xsl:call-template name="end-revflag">
	<xsl:with-param name="flagrules" select="$flagrules"/>  
      </xsl:call-template>
      <xsl:call-template name="end-flagit">
	<xsl:with-param name="flagrules" select="$flagrules"></xsl:with-param> 
      </xsl:call-template>
    </div>
<!--      <br id="endmain" />
      <xsl:apply-templates select="/topic/related-links" mode="custrellinks" />

      </div><xsl:value-of select="$newline"/>

      <xsl:call-template name="next-prev-parent-links"/>
-->
<!--      <div id="footer">
	<hr />
	Copyright (c) 2008 Bitextender GmbH
	<br />

	OSWD Design by John Zaitseff 
      </div>
-->
      <xsl:value-of select="$newline"/>
  </xsl:template>

  <!-- root rule -->



  <xsl:template match="/">
    <xsl:apply-templates/>
  </xsl:template>

</xsl:stylesheet>
