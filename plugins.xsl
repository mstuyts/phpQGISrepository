<?xml version="1.0" encoding="ISO-8859-1"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

<xsl:template match="plugins">

<html>
<head>
<title>QGIS Plugins Repository</title>
<style>
body  {
   font-family:Verdana, Arial, Helvetica, sans-serif;
  background-color: #fefefe;
 }

div.plugin {
 background-color:#999999;
 border:1px solid #000000;
 clear:both;
 display:block;
 padding:0 0 0.5em;
 margin:1em;
 width: 80%;
}

div.head {
  background-color:#cccccc;
  border-bottom-width:0;
  color:#0;
  display:block;
  font-size:140%;
  font-weight:bold;
  margin:0;
  padding:0.3em 1em;
}
div.description{
  display: block;
  float:none;
  margin:0;
  text-align: left;
  padding:0.2em 0.5em 0.4em;
  color: black;
  font-size:110%;
  font-weight:normal;
  font-style: italic;
 }

 div.about{
  display: block;
  float:none;
  margin:0;
  text-align: left;
  padding:0.2em 0.5em 0.4em;
  color: black;
  font-size:85%;
  font-weight:bold;
 }
div.tags{
  padding:0 0 0 1em;
  font-size:85%;
  font-weight:normal;
}
div.download, div.author, div.branch{
  font-size: 80%;
  padding: 0em 0em 0em 1em;
 }
 h2{font-size: 300%;}

</style>

</head>
<body>
<h1>QGIS Plugins Repository</h1>

<xsl:for-each select="/plugins/pyqgis_plugin">
<div class="plugin">
<div class="head">
<!--
<xsl:element name="a">
<xsl:attribute name="href">
<xsl:value-of select="homepage" />
</xsl:attribute>
-->
<xsl:value-of select="@name" /> : <xsl:value-of select="@version" />
<!--
</xsl:element>
-->
</div>
<div class="description">
<xsl:value-of select="description" />
</div>
<div class="about">
<xsl:value-of select="about" />
</div>
<div class="tags">
Tags:
<xsl:value-of select="tags" />
</div>
<div class="download">
Download:
<xsl:element name="a">
 <xsl:attribute name="href">
  <xsl:value-of select="download_url" />
 </xsl:attribute>
 <xsl:value-of select="file_name" />
</xsl:element>
</div>
<div class="author">
Author: <xsl:value-of select="author_name" />
</div>
<div class="author">
Version: <xsl:value-of select="version" />
</div>
<div class="branch">
Experimental: <xsl:value-of select="experimental" />
</div>
<div class="branch">
Deprecated: <xsl:value-of select="deprecated" />
</div>
<div class="author">
Minimum QGIS Version: <xsl:value-of select="qgis_minimum_version" />
</div>
<div class="author">
Maximum QGIS Version: <xsl:value-of select="qgis_maximum_version" />
</div>
<div class="author">
Home page:
<xsl:element name="a">
 <xsl:attribute name="href">
  <xsl:value-of select="homepage" />
 </xsl:attribute>
 <xsl:value-of select="homepage" />
</xsl:element>
</div>
<div class="author">
Tracker:
<xsl:element name="a">
 <xsl:attribute name="href">
  <xsl:value-of select="tracker" />
 </xsl:attribute>
 <xsl:value-of select="tracker" />
</xsl:element>
</div>
<div class="author">
Repository:
<xsl:element name="a">
 <xsl:attribute name="href">
  <xsl:value-of select="repository" />
 </xsl:attribute>
 <xsl:value-of select="repository" />
</xsl:element>
</div>


</div>
</xsl:for-each>
</body>
</html>

</xsl:template>

</xsl:stylesheet>
