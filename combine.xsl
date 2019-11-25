<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0">
    <xsl:output method="xml" version="1.0" encoding="UTF-8" indent="yes"/>
    <xsl:strip-space elements="*"/>
    <xsl:key name="preg" match="user" use="@id"/>
    <xsl:template match="/">
        <user >
            <xsl:copy-of select="xml"/>
            <xsl:copy-of select="document('transcript.xml')/xml"/>
            <xsl:copy-of select="document('cv.xml')/xml"/>
            <xsl:copy-of select="document('fb.xml')/xml"/>
            <xsl:copy-of select="document('Output.xml')/user"/>
        </user>
    </xsl:template>

</xsl:stylesheet>