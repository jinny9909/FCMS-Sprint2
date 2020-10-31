create database FCMS;

USE FCMS;  

/* Catering package implementation */
create table Catering_package
(
PackageID VARCHAR(11) not null,
PackageName VARCHAR(255),
PackageDescription VARCHAR(255),
PricePerPax int,
ImagePath VARCHAR(255),
primary key (PackageID)
);

insert into Catering_package (PackageID, PackageName, PackageDescription, PricePerPax, ImagePath)
values ("CP00000001", "Chinese Catering Package", "This is Chinese Cuisine", 500, "images\\packages\\packageA.jpg");

insert into Catering_package (PackageID, PackageName, PackageDescription, PricePerPax, ImagePath)
values ("CP00000002", "Western Catering Package", "This is Indian Cuisine", 200, "images\\packages\\packageB.jpg");

insert into Catering_package (PackageID, PackageName, PackageDescription, PricePerPax, ImagePath)
values ("CP00000003", "Mix Catering Package", "This is Malay Cuisine", 400, "images\\packages\\packageC.jpg");

select * from Catering_package;

create table Food
(
FoodID VARCHAR(11) not null,
PackageID VARCHAR(11) not null,
FoodName varchar(255),
primary key (FoodID),
foreign key (PackageID) references Catering_package(PackageID)
);

/* Food and beverage implementation */
/* Inserting Food */
insert into Food (FoodID, FoodName, PackageID)
values ("CF00000001", "Chinese Fried Rice", "CP00000001");
insert into Food (FoodID, FoodName, PackageID)
values ("CF00000002", "Breaised Noodles", "CP00000001");
insert into Food (FoodID, FoodName, PackageID)
values ("CF00000003", "Seafood with Chilli Crab Sauce", "CP00000001");
insert into Food (FoodID, FoodName, PackageID)
values ("CF00000004", "Omelette", "CP00000001");

SELECT * FROM Food;

/* Implement tracking system */
create table Orders
(
OrderID int not null auto_increment,
ClientID int,
PackageID int,
TrackingID int,
OrderDate date,
primary key (OrderID),
foreign key (ClientID) references Clients(ClientsID),
foreign key (PackageID) references Catering_package(PacakageID)
);

/* Insert data into database */
insert into Orders (OrderID, ClientID, PackageID, OrderDate, TrackingID)
values ("OR00000001", "CL00000001", "CP00000001", "2020-10-8", "TR00000001");

/* get values */
SELECT * FROM Orders;

/* List of accounts implementation */
create table Clients
(
ClientID varchar(10) not null,
MemberID varchar(10),
Username varchar(20),
Email varchar(255),
Password varchar(255),
PhoneNumber int(11),
Address varchar(255),
primary key (ClientID)
);

/*Inserting Data into Account*/
insert into Clients (ClientID, MemberID, Username, Email, Password, PhoneNumber, Address)
values ("CL00000001", "CM00000001", "user1", "user1@gmail.com", "abc123", 12345678901, "Abc1, Sesame Street");
insert into Clients (ClientID, MemberID, Username, Email, Password, PhoneNumber, Address)
values ("CL00000002", "CM00000002", "user2", "user2@gmail.com", 12345678902, "Abc2, Sesame Street");
insert into Clients (ClientID, MemberID, Username, Email, Password, PhoneNumber, Address)
values ("CL00000003", "CM00000003", "user2", "user3@gmail.com", 12345678903, "Abc3, Sesame Street");

create table OperationTeam
(
OperationID int not null auto_increment,
Username varchar(20),
Email varchar(255),
primary key (OperationID)
);

create table Members
(
MemberID int not null auto_increment,
MemberPoint int,
primary key (MemberID)
);

insert into OperationTeam (Username, Email)
values ("Guy","guy@gmail.com");

insert into OperationTeam (Username, Email)
values ("Iron","Iron@gmail.com");

insert into OperationTeam (Username, Email)
values ("Ninja","Ninja@gmail.com");

insert into OperationTeam (Username, Email)
values ("Guy","guy@gmail.com");

insert into OperationTeam (Username, Email)
values ("Suzumiya","Suzumiya@gmail.com");

/* get values */
SELECT * FROM Clients;

/* test delete */
DELETE FROM clients WHERE ClientID = "1";

SELECT * FROM Catering_package;