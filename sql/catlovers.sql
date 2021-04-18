CREATE DATABASE catlovers;

CREATE TABLE usercat(
   id_user int (255) PRIMARY KEY AUTO_INCREMENT,
   username varchar (20) NOT null,
   user_mail varchar (40) NOT null,
   user_password varchar (10) NOT null,
   id_adult1 int (255),
   id_kitten1 int (255),
   id_special1 int (255),
   FOREIGN KEY (id_adult1) REFERENCES adultcat (id_adult),
   FOREIGN KEY (id_kitten1) REFERENCES kitten (id_kitten),
   FOREIGN KEY (id_special1) REFERENCES special (id_special) 
);


CREATE TABLE adultcat(
   id_adult int (255) PRIMARY KEY AUTO_INCREMENT,
   image_adult varchar(100),
   name_adult varchar (20) NOT null,
   age_adult varchar (25) NOT null,
   sex_adult varchar (10) NOT null,
   descr_adult varchar (500) NOT null
);

CREATE TABLE kitten(
   id_kitten int (255) PRIMARY KEY AUTO_INCREMENT,
   image_kitten varchar(100),
   name_kitten varchar (20) NOT null,
   age_kitten varchar (25) NOT null,
   sex_kitten varchar (10) NOT null,
   descr_kitten varchar (500) NOT null
);    


CREATE TABLE special(
   id_special int (255) PRIMARY KEY AUTO_INCREMENT,
   image_special varchar(100),
   name_special varchar (20) NOT null,
   age_special varchar (25) NOT null,
   sex_special varchar (10) NOT null,
   descr_special varchar (500) NOT null
); 

CREATE TABLE admin (
  id_admin int (255) PRIMARY KEY AUTO_INCREMENT,
  admin_name varchar (20) NOT null,
  admin_password  varchar (10) NOT null
 );