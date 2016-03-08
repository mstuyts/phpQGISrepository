# phpQGISrepository
phpQGISrepository is a simple PHP script to create a repository for QGIS Python plugins.

## Good to know
* The script has **no settings**.
* The script is **ready to go**.
* The script needs **no database**.
* As long as your server can handle **PHP**-scripts you can use this both on the internet as on an intranet.
* Make sure the **metadata.txt** is filled in correct in the QGIS Python Plugin zip-files.

## Why would I need my own repository?
* If you plan to share your plugins with the worldwide QGIS community, **you don't need it**. In that case use the official [QGIS Python Plugins Repository](https://plugins.qgis.org/plugins/plugins.xml).
* If you make plugins that are only intended for a limited number of QGIS users, **you can use this simple script** to create your own repository. 

## How to install
* Upload all files from  this Github repository to your server that can handle PHP scripts
* Upload your valid QGIS Python Plugin zip-files to the 'downloads' subfolder. It already contains an example plugin. You can delete this example if you want.
* Have a drink and enjoy your newly installed repository

## How to use your repository
* In your browser go to the url of the main folder you installed the script in.
* Add the repository to QGIS

## Did you make some customisations to the plugins.xsl file?
* Add them to this Github repository as an example for other users

## How do you make a plugin?
* More information can be found at http://docs.qgis.org/testing/en/docs/pyqgis_developer_cookbook/plugins.html

