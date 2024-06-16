
<h1 align="center">
  Cinema API 
  <br>
</h1>

<h4 align="center">A Quick API Project Made with Laravel PHP in a single weekend</h4>

<p align="center">
  <a href="#features">Features</a>
  •
  <a href="#todo">Improvements</a>
  •
  <a href="#installation">Installation</a>
  •
  <a href="https://documenter.getpostman.com/view/10567374/2sA3XQiNHA" target="__blank">API Documentation</a>
</p>


## Features

<img align="right" src="https://i.imgur.com/KjuBPOn.png" style="width:500px">

#### Customers Related 
- Creating Customers and Adding Them to the Database
- Editing and Patching Customers
- Deleting Customers
- Validating Customer Login Attempts
#### Tickets Related 
- Retrieving Tickets from the Database
- Create Tickets and Adding them to the Database
#### Movies Related 
- Retrieving Theaters from the Database
- Retrieving Screenings from the Database
- Retrieving Movies from the Database
#### Bonus Features 
- Support for Relations Using &Include=
- Extensive Filtering Options: Easily find specific records.
- Extensive Sorting Options
- Pre-Formatted JSON Responses with camelCasing
- Pagination System
- Version-Based Structure Support
- Hashed Passwords
- Simple Admin Dashboard
- Secured and Protected with Access Tokens
- Entirely Seeded with Dummy Data Using Laravel Factories

## TODO
### Future Improvements (Version 1.1)
If this were a full-fledged project and I had more time, here are some enhancements I would implement:

- Separate Date and Time: Make date and time more readable in movies and screenings.
- Use Real Data: Replace dummy data with real data from external APIs that support large volumes of requests.
- Enhanced Ticket Acquisition Process: Develop a more secure ticket purchasing process.
- Replace Placeholder Tokens: Use actual tokens instead of placeholder customer tokens.
- Ticket Scanning Detection System: Implement a system to detect whether tickets have been scanned.
- Cinema Management System: Ensure no two movies are playing in the same hall simultaneously, requiring a full management system beyond the current scope.
- Full Hall Handling: Address the issue of what happens when a hall is full, linking back to the need for a comprehensive management system rather than a quick API.

---

## Installation

To run the project locally, you need a virtual PHP development environment. I recommend [XAMPP](https://www.apachefriends.org), as it will allow us to host a database and control it using phpMyAdmin.
##### Make sure you have the latest version of XAMPP that supports PHP 8.2 or higher!

#### The installation of the project is straightforward

Start by extracting the files after downloading them and make sure you have [Composer](https://getcomposer.org) installed. Afterwards, run the following commands inside the project folder:

  ```sh
  composer install 
  composer update
  ```

You need to generate a `.env` file. You can do that manually by copying `.env.example` and removing `.example` or by running the following command:

  ```sh
  cd .env.example .env
  php artisan key:generate
  ``` 

Now, using XAMPP, you can start Apache and the MySQL connection. Then navigate to phpMyAdmin and create a new database. Call it "cinema_db".
After that, make sure to connect the database inside the `.env` file, by uncommenting and filling in the values :

```sh
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=cinema_db
DB_USERNAME=root
DB_PASSWORD=
```

If everything is connected correctly, you can seed the database and host the API using Artisan locally:

```sh
php artisan migrate:fresh --seed
php artisan serve
```

You should then get a link that will allow you to visit the website.
If the site is working correctly, you should be able to create a user and claim an access token that will allow you to connect to the API safely.
use the link `127.0.0.1:8000/register` to register the user


## API Functionality

for the API documentation and functionality visit this [link](https://documenter.getpostman.com/view/10567374/2sA3XQiNHA)
