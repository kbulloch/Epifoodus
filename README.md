# Epifoodus
### Week 5 Group Project
## by Patrick, Jill, Evan, Abeer, Erica, Kyle, Tanner

##### Description
This app helps users decide what to eat for lunch.

#### Setup instructions
1. Clone this git repository
2. Set your localhost root folder to ~/epifoodus/web/
3. Ensure PHP server is running.
4. Start Postgres and import epifoodus.sql database into a new database epifoodus
5. Do the same for the test database: epifoodus_test.sql
6. Use Composer to install required dependencies in the composer.json file
7. Start the web app by pointing your browser to the root (http://localhost:8000/)


#### PSQL commands
CREATE DATABASE epifoodus;
\c epifoodus;
CREATE TABLE restaurants (id serial PRIMARY KEY, name varchar, address varchar, phone varchar, price int, vegie int, opentime int, closetime int);
CREATE TABLE prices (id serial PRIMARY KEY, level int);
CREATE TABLE cuisines (id serial PRIMARY KEY, type varchar);
CREATE TABLE cuisines_restaurants (id serial PRIMARY KEY, cuisine_id int, restaurant_id int);
CREATE TABLE users (id serial PRIMARY KEY, username varchar, password varchar);
CREATE TABLE likes (id serial PRIMARY KEY, answer int, restaurant_id int, user_id int);
CREATE DATABASE epifoodus_test WITH TEMPLATE epifoodus;

#### Copyright © 2015, Epifoodus

#### License: [MIT](https://github.com/twbs/bootstrap/blob/master/LICENSE)  
