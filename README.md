# README #

This README would normally document whatever steps are necessary to get your application up and running.

### What is this repository for? ###

* Quick summary
* Version
* [Learn Markdown](https://bitbucket.org/tutorials/markdowndemo)

### How do I get set up? ###

Magento exercise

Magento installation files with sample data:
https://1drv.ms/f/s!AiZnMrnEBj5GclL9MmSBJkuhkHA
 
Install Magento sample data instructions:
http://devdocs.magento.com/guides/m1x/install/installing_install.html#install-sample

 
General guidelines:
- manipulating/changing Magento Core is not allowed
- module should be independent (if removed, Magento should continue to work)
 
User story:
As a Magento admin user, I would like to have an option to view history of changes made to specific product.
 
Custom log table will be populated with:
- a date of modification
- store id (data from the store chooser on the product edit page)
- id of selected product
- serialized list of fields with values before the changes were made
- username of admin making the changes.
 
On the product edit page, there should be new tab with a datagrid displaying the history of current product changes. Grid shouldn't be editable.
There should also be an option to sort and filter data by modification date and admin username.
 
 
Acceptance Criteria:
- All the data is saved in independent log history table (usage of Magento ORM to create new table)
- New tab is added to the product edit page (usage of observers)
- Grid is added to the product history log tab
- Grid is sortable by id, modified date and admin username
- Grid is read only

 
Definition of Done:
- Able to install/enable new module to vanilla Magento instance
- Approved by SM Team
- Able to safely remove module from vanilla Magento instance

### Contribution guidelines ###

* Writing tests
* Code review
* Other guidelines

### Who do I talk to? ###

* Repo owner or admin
* Other community or team contact