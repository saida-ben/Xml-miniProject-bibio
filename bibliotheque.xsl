<?xml version="1.0" encoding="UTF-8"?>
<xsl-stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0">
<xsl:template match="/">
    <html>
        <head></head>
        <body>
            <h1>hi everyone</h1>
            <table>
                <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
                <xsl:for-each select="bibliotheque/livres/livre">
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </xsl:for-each>

            </table>
        </body>
    </html>
</xsl:template>
</xsl-stylesheet>