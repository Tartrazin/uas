create database db_negara;

use db_negara;

create table t_presiden(
ID int primary key auto_increment,
First_Name varchar(100) not null,
Last_Name varchar(100) not null,
Negara varchar(100) not null,
Email varchar(50),
Photo varchar(100),
Gender enum('Laki-laki','Perempuan')
);

INSERT INTO `t_presiden` (`First_Name`, `Last_Name`, `Negara`, `Email`, `Photo`, `Gender`) VALUES
('Donald', 'Trump', 'USA', 'trumpganteng@bossusa.com', 'http://192.168.64.2/api/images/trump.jpg', 'Laki-laki'),
('Han So', 'Hee', 'Hatiku', 'hanso@sayangkamu.com', 'http://192.168.64.2/api/images/han.jpeg', 'Perempuan'),
('Vladimir', 'Putin', 'Rusia', 'Putin@vodkaadidas.com', 'http://192.168.64.2/api/images/putin.jpg', 'Laki-laki');