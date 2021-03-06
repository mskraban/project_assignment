# Flaviar - Symfony full stack assignment

<!-- PROJECT LOGO -->
<br />
<div align="center">
   <img src="https://i.imgur.com/eZgC40z.jpg" alt="Flaviar assignment">
</div>



<!-- ABOUT THE PROJECT -->
## đ About The Assignment

Project is providing "pixel perfect" mobile first design of the page, provided in
accompanying links with implemented backend functionality. Index page contains a form that is coded with Vue. It takes values depending on user choises and validates them if they are filled out. Then it sends them to backend via XHR reqest. On backend we prepared endpoint /order where we decode json and store it in database.



### đ§° Built With

* [Vue.js](https://vuejs.org/)
* [Symfony](https://symfony.com/)
* [Bootstrap](https://getbootstrap.com)
* [SCSS](https://sass-lang.com/)



<!-- GETTING STARTED -->
## đ Getting Started

Provided instructions how to setup and run package on your computer. I used xampp on windows, so I placed project to ```xampp/htdocs``` folder

### âšī¸ Prerequisites

To start using the project, you need to have installed composer and yarn package manager.


### âī¸ Installation

1. Download Git repository
2. Place it on your server directory (for me it was htdocs, since I use xampp)
3. Install Composer dependencies ```composer install```
4. Install Yarn dependecies ```yarn install```
5. Start server ```symfony server:start```
6. Create database ```php bin/console doctrine:database:create```
7. Prepare table ```php bin/console doctrine:migrations:migrate```



<!-- USAGE EXAMPLES -->
## đąī¸ Usage

User have to select between two membership packages and. Depending on user pick, price at the bottom of form is recalculated. 
User can pick between two send to options. If user selects "Send to me" then there are displayed only message and from input fields. If user selects "Send to them", then input field "to their name" is added. 



<!-- Notes -->
## â Notes

- Half a year gift membership is always calculated into price.
- Parallax on form section background image is enabled and it scales image in both X and Y directions.
- In case you get error "The metadata storage is not up to date" remove your database version provider from  .env file at ```?serverVersion```
