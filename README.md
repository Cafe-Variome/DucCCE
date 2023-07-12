##  DUC Profile Creator Using CCE 
The DUC profile creator is an easy to use tool to create a profile of use condition statements for a given resource. The process is based upon a series of 'Common Conditions of Use Element' (CCE) concepts, and an online form that gathers this information into a 'Profile'. These profiles can be updated at any time, and you decide what to include or not include in your resource profile. As a user, you can choose to leave a copy on the website or download the profile to your own computer. Whether saved on the site or downloaded, profiles can be reopened/uploaded for further editing later. This tool can be accessed The tool can be accessed at [URL](https://ducejprd.le.ac.uk/).
## Digital Use Condition (DUC)
**“Digital Use Conditions” (DUC)** is an operational data structure designed to standardise the way consent and use conditions (relating to any resource) are computationally represented. A DUC structure that has been populated with asset information and consent and use conditions is called a **DUC Profile**.
DUC has been devised and tested by a TaskForce of the International Rare Disease Research Consortium (IRDiRC).
## Common Conditions of use Elements (CCE)
**“Common Conditions of use Elements” (CCE)** comprises core set of “Use Condition Terms”. Each term within the CCE is designed to be atomic and non-directional in nature. As such they can be used as building blocks to construct a Use Conditions “policy” covering the general use conditions for a resource. CCEs are intended to be used in conjunction with DUC structure, allowing a profile to be produced that gives an overview of a resource and its associated use conditions. CCE are being developed and tested for use within Pillar 2 of the European Joint Programme on Rare Disease (EJP-RD). More information about DUC,CCE and FAQs can be found [Here](https://ducejprd.le.ac.uk/Learn/index). You can contact [Spencer Gibson](mailto:spencer.gibson@leicester.ac.uk) for queries about DUC or CCE concept and using the the system to create profiles.

This tool is developed using **CodeIgniter** which is PHP full-stack web framwork that is light, fast, flexible and secure. More information about CodeIgniter can be found at the [official site](http://codeigniter.com).

### Development

#### Server Requirements

PHP version 7.3 or higher is required, with the following extensions installed:

- [intl](http://php.net/manual/en/intl.requirements.php)
- [libcurl](http://php.net/manual/en/curl.requirements.php) if you plan to use the HTTP\CURLRequest library

Additionally, make sure that the following extensions are enabled in your PHP:

- json (enabled by default - don't turn it off)
- [mbstring](http://php.net/manual/en/mbstring.installation.php)
- [mysqlnd](http://php.net/manual/en/mysqlnd.install.php)
- xml (enabled by default - don't turn it off)

#### Setup
Clone this repo into www directory of your server by running following command.

1. ``` git clone https://github.com/Cafe-Variome/DucCCE.git ```
2. ``` cd DucCCE ```
3. ``` php composer install ```
4. tailor .env file for your application specifically the baseURL and any database settings.

This application allow you to create, download and upload profiles if you wish to save profiles in database then create database import DucCCE.sql to your database and configure your database either in .env file or app/config/Database.php file. 

For any query about this setup please contact [Umar Riaz](mailto:ur13@leicester.ac.uk). 





