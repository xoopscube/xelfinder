
[![Creative Commons cc-sa](http://ForTheBadge.com/images/badges/cc-sa.svg)](https://creativecommons.org/licenses/by-sa/4.0) 
[![UTD powered-by-electricity](http://ForTheBadge.com/images/badges/powered-by-electricity.svg)](https://github.com/gigamaster/xelfinder)
[![UTD](https://forthebadge.com/images/badges/built-with-love.svg)](https://github.com/gigamaster/xelfinder)

[![Project Status: Active – The project has reached a stable, usable state and is being actively developed.](https://www.repostatus.org/badges/2.0.0/active.svg)](https://github.com/xoopscube/xcl)
![License GPL](https://img.shields.io/badge/License-GPL-green)
![X-Updare Store](https://img.shields.io/badge/X--Update%20Store-Pending-red)

## ///// — X-elFinder :: Web-based File manager and editors

![alt text](https://repository-images.githubusercontent.com/469831419/6032bf18-5c1e-4f27-aa2f-2b8e60f4e5a0)

MODULE |  X-elFinder (elFinder)
------------ | -------------
Description  | elFinder web-based file manager running on JavaScript + PHP.
Render Engine| Smarty v2 and XCube Layout
Version      | 2.61
Author       | @nao-pon Naoki Sawada
Maintainer   | Update @gigamaster Nuno Luciano (XCL7)
Copyright    | 2005-2022 Author
License      | XCL module is distributed under a GPL 2.3 License.
License      | elFinder is distributed under a 3-Clause BSD License.


##### :computer: The Minimum Requirements



          Apache, Nginx, etc. PHP 7.2.x
          MySQL 5.6, MariaDB  InnoDB utf8 / utf8mb4
          XCL version 2.3.+



-----

## ///// — Module X-elFinder


* Author : [nao-pon/xelfinder - GitHub](https://github.com/nao-pon/xelfinder)
* Maintainer : [gigamaster - XCL ^2.3.x](https://github.com/xoopscube/xelfinder)

This module is released by default with the package bundle XCL 2.3.x.  

For topics, questions, and requests about elFinder, please refer to [elFinder](https://github.com/Studio-42/elFinder). 


## Environment

* XOOPSCube Web Application Platform
  * XCL ^2.3.x
  * XDektop ^3.0.x

## Notes on installation

The following directories require write (file creation) permission (e.g. 777 or 707).

* html/modules/xelfinder/cache
* html/modules/xelfinder/cache/tmb
* trust_path/uploads/xelfinder

PathInfo is used for image referencing, but depending on the server environment,  
PathInfo may not be available and the image may not be displayed correctly.

In this case, please set "Disable PathInfo for file reference URLs" to "Yes"  
in the general settings of the administration page.

### Change the popup to IFRAME

The default popup openWithSelfMain() can open a new window or a popup using IFRAME  
Check the module template to adapt the design to your theme.html.

### HypCommon

Otherwise, if you have installed the module/library _HypCommon_ from the HypConf (HypCommon settings) module, select "Other settings" - "Tags to insert at the end of &lt;head&gt;".

    <script type="text/javascript" src="<{$xoops_url}>/modules/xelfinder/include/js/openWithSelfMain_iframe.js"></script>

or edit theme.html as follows

Example (theme.html):

    <script type="text/javascript">
    <!--
    <{$xoops_js}>
    //-->
    </script>
    <script type="text/javascript" src="<{$xoops_url}>/modules/xelfinder/include/js/openWithSelfMain_iframe.js"></script>

### About libraries

HypCommonFunc is required in order to extend and enable this feature.

* [HypCommonFunc について](http://xoops.hypweb.net/modules/xpwiki/156.html)

## X-elFinder Specific Features

In addition to the functions of elFinder, X-elFinder has the following features

* Drag and drop file uploads between browser windows. (Firefox, Chrome, Safari)
* Image editing using Pixlr.com 
* [Dropbox.com](http://db.tt/w0gZJglT) Direct manipulation of data storage (http://db.tt/w0gZJglT) 500MB bonus for new registration & installation)
* Disabled commands can be specified for each group (limitation of specified functions)
* Adding a volume (like a drive) in plug-in form
    * You can specify the group ID to be enabled for each volume.
    * xelfinder_db Fine-tuned support with plug-ins
        * Folders by user ー
        * Folders by group ー
        * Guest folder ー
        * Permission settings for folders and files (read, write, unlock, and hide can be set for owner, group, and guest respectively))
        * Permissions for new items can be set per folder.
    * xelfinder Using plug-ins to specify an arbitrary directory in the server and manipulate image files in that directory
    * XOOPS の d3diary, GNAVI, MailBBS, MyAlbum Module plug-ins included
        * You can use the images stored in each module.

## imagemanager.php   

Except for XOOPSCube Platforms, this can be done for XOOPS legacy by inserting in mainfile.php  
immediately after the line that reads XOOPS_ROOT_PATH/imagemanager.php :

    include 'modules/xelfinder/manager.php';



## Notes on Uninstallation

The uploaded files will remain when when uninstalling the module X-elFinder,  
but all information is removed, such as folders, permissions, owners, etc.

If you want to save that information, please save your data with a backup of your database.

X-elFinder table name will start with "[XCL DB prefix]_[X-elFinder module directory name]_".

If you want to uninstall and remove the files, you can find them in "TRUST_PATH/uploads/xelfinder" directory.

* file : "_[X-elFinder module directory name]_[file ID(number)]"
* thumb: "_[X-elFinder module directory name]_[file ID(number)]_[reduced ratio(number)].tmb"

Please refer to  [elFinder](https://github.com/Studio-42/elFinder) project documentation for details.
