# Magento 2 Template Debugger.
* Save phtml error to log file.


## Description
Adding log for template issue (*.phtml), Because Magento skip the error from *.phtml  on production mode. 
Sometime, you got a page with missing a block_html or HTML is broken without error log (exception.log, system.log, php_error.log ...)
This module support to bring the error to **template_engine_exception.log**


## - Main Functionalities
* Saving phtml error to logs file. **template_engine_exception.log**


## Installation

### Type 1: Zip file
- Unzip the zip file in `app/code/Hidro`
- Enable the module by running `php bin/magento module:enable Hidro_DebugTemplate`
- Apply database updates by running `php bin/magento setup:upgrade`\*
- Flush the cache by running `php bin/magento cache:flush`

### Type 2: Composer

- Make the module available in a composer repository for example:
    - public repository `packagist.org`
    - public github repository as vcs
- Install the module composer by running `composer require hidro/module-debug-template`
- enable the module by running `php bin/magento module:enable Hidro_DebugTemplate`
- apply database updates by running `php bin/magento setup:upgrade`
- Flush the cache by running `php bin/magento cache:flush`

---
