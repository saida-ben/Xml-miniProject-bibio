<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0">

<xsl:template match="/">
    <html>
        <head>
            <style>
                body {
                    font-family: Arial, sans-serif;
                    background-color: #f9f9f9;
                    color: #333;
                    margin: 0;
                    padding: 20px;
                }

                h1 {
                    text-align: center;
                    color: #2c3e50;
                }

                table {
                    width: 100%;
                    border-collapse: collapse;
                    margin: 20px 0;
                    background-color: #fff;
                }

                th, td {
                    padding: 10px;
                    text-align: left;
                    border: 1px solid #ddd;
                }

                th {
                    background-color: #4CAF50;
                    color: white;
                    text-transform: uppercase;
                }

                tr:nth-child(even) {
                    background-color: #f2f2f2;
                }

                tr:hover {
                    background-color: #eaf5ff;
                }

                button {
                    padding: 5px 10px;
                    border: none;
                    border-radius: 5px;
                    cursor: pointer;
                    margin-right: 5px;
                }
                a {
                    padding: 5px 10px;
                    border: none;
                    border-radius: 5px;
                    cursor: pointer;
                    margin-right: 5px;
                }
                a:hover{
                    background-color: #ddd;

                }

                button:hover {
                    background-color: #ddd;
                }

                button:active {
                    background-color: #bbb;
                }

                .details-button {
                    background-color: #3498db;
                    color: white;
                }

                .delete-button {
                    background-color: #e74c3c;
                    color: white;
                }

                .details-button:hover {
                    background-color: #2980b9;
                }

                .delete-button:hover {
                    background-color: #c0392b;
                }
            </style>
        </head>
        <body>
            <table>
                            <a class="details-button" href="add.html">ajouter</a>

                <tr>
                    <th>Num</th>
                    <th>Titre</th>
                    <th>Auteur</th>
                    <th>Catégorie</th>
                    <th>Date de Publication</th>
                    <th>Action</th>
                </tr>
                <xsl:for-each select="/bibliotheque/livres/livre">
                    <tr>
                        <td><xsl:value-of select="@num"/></td>
                        <td><xsl:value-of select="titre"/></td>
                        <td><xsl:value-of select="auteur/nom"/></td>
                        <td><xsl:value-of select="categorie"/></td>
                        <td><xsl:value-of select="datePublication"/></td>
                        <td>
                            <a class="details-button" href="add.html">ajouter</a>
<a class="delete-button" href="bibio.php?num={@num}" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce livre ?');">Supprimer</a>
                    
                        </td>
                    </tr>
                </xsl:for-each>
            </table>
        </body>
    </html>
</xsl:template>

</xsl:stylesheet>
