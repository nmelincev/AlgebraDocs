drop database if exists inventorymanagement;
create database inventorymanagement;

use inventorymanagement;
drop table if exists users;
drop table if exists products;

create table users (
id int auto_increment primary key,
username text not null unique,
password text not null,
created_at timestamp default current_timestamp);

create table products (
id int auto_increment primary key,
name text not null,
quantitiy int not null,
price decimal (10,2) not null,
created_at timestamp default current_timestamp,
updated_at timestamp default current_timestamp ON UPDATE current_timestamp);