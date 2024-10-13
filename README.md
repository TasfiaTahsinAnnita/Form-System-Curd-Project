# Jail Visitor Management System
This is a simple CRUD (Create, Read, Update, Delete) web application designed to manage visitor information for a jail facility. The project is built using PHP and MySQL.

## Table of Contents
- Features
- File Structure
- Requirements
- Installation and Setup
- Usage

## Features
- Create Visitor: Add new visitor details such as name, age, and visit date.
- Read Visitor: View the details of existing visitors.
- Update Visitor: Edit the information of existing visitors.
- Delete Visitor: Remove a visitor's details from the system.

## File Structure
Here’s an overview of the files included in the project:
<br>
- index.php: The homepage that links to all CRUD operations.
- jail-visitor-create.php: Script to handle the creation of new visitor entries.
- jail-visitor-edit.php: Script to handle the editing of visitor details.
- jail-visitor-view.php: Script to view the details of a visitor.
- jail-visitor-delete.php: Script to delete a visitor from the system.
- jail-dbcon.php: Database connection file, handling MySQL connections.
- jail-code.php: Contains the core logic for visitor operations.
- message.php: Used for displaying success or error messages.
- jail-sql.txt: SQL script to set up the database and table structure.

## Requirements
- PHP: Make sure you have PHP installed. You can download it from php.net.
- MySQL: The project uses MySQL for data storage. Install MySQL from mysql.com.
- Web Server: You can use Apache or any other web server to run this project. A simple solution is to install XAMPP or WAMP.

## Installation and Setup
1. Clone the repository:

``bash
git clone https://github.com/your-username/jail-visitor-management.git
``
<br>
1. Move the project files to your web server’s document root:

- For XAMPP: Move the files to htdocs/.
- For WAMP: Move the files to www/.
  <br>
3. Create the Database:
- Open your MySQL server (using phpMyAdmin or the command line).
- Create a new database by running the SQL script in jail-sql.txt:
  <br>
``bash
CREATE DATABASE IF NOT EXISTS jail;
USE jail;
CREATE TABLE IF NOT EXISTS visitors (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    age INT(3) NOT NULL,
    visit_date DATE NOT NULL
);
``
4. Configure the Database Connection:

- Open the jail-dbcon.php file and adjust the database credentials if needed:
``bash
$host = 'localhost';
$username = 'root'; // Default username for MySQL in XAMPP/WAMP
$password = '';     // Default password is empty
$dbname = 'jail';
``
5. Run the Application:

- Start your web server.
- Access the project via your browser:
``bash
http://localhost/jail-visitor-management/index.php
``
## Usage
- Navigate to the home page where you will find links to:
- Add new visitors.
- View, update, or delete existing visitors.
