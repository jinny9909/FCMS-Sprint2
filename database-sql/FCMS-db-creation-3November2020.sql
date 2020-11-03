create database FCMS;

USE FCMS;  

/* Catering package implementation */
create table Catering_package
(
PackageID VARCHAR(11) not null,
PackageName VARCHAR(255),
PackageDescription VARCHAR(255),
PricePerPax double,
ImagePath VARCHAR(255),
primary key (PackageID)
);

insert into Catering_package (PackageID, PackageName, PackageDescription, PricePerPax, ImagePath)
values ("CP00000001", "Chinese Catering Package", "This is Chinese Cuisine", 17.00, "images\\packages\\packageA.jpg");

insert into Catering_package (PackageID, PackageName, PackageDescription, PricePerPax, ImagePath)
values ("CP00000002", "Western Catering Package", "This is Indian Cuisine", 19.00, "images\\packages\\packageB.jpg");

insert into Catering_package (PackageID, PackageName, PackageDescription, PricePerPax, ImagePath)
values ("CP00000003", "Mix Catering Package", "This is Malay Cuisine", 20.00, "images\\packages\\packageC.jpg");

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

/* List of accounts implementation */
create table Clients
(
ClientID varchar(10) not null,
MemberID varchar(10),
Status bool,
Username varchar(20),
Email varchar(255),
Password varchar(255),
PhoneNumber int unsigned,
Address varchar(255),
primary key (ClientID)
);

/*Inserting Data into Account*/
insert into Clients (ClientID, Status, MemberID, Username, Email, Password, PhoneNumber, Address)
values ("CL00000001", True, "CM00000001", "user1", "user1@gmail.com", "abc123", 1234567891, "Abc1, Sesame Street");
insert into Clients (ClientID, Status, MemberID, Username, Email, Password, PhoneNumber, Address)
values ("CL00000002", True, "CM00000002", "user2", "user2@gmail.com", "abc123", 1234567892, "Abc2, Sesame Street");
insert into Clients (ClientID, Status, MemberID, Username, Email, Password, PhoneNumber, Address)
values ("CL00000003", True, "CM00000003", "user3", "user3@gmail.com", "abc123", 1234567893, "Abc3, Sesame Street");

/* get values */
SELECT * FROM Clients;

/* test delete */
DELETE FROM clients WHERE ClientID = "1";

/* Implement tracking system */
create table Orders
(
OrderID varchar(10) not null,
ClientID varchar(10),
PackageID VARCHAR(11),
NumPeople int,
TrackingID int,
OrderDate date,
primary key (OrderID),
foreign key (ClientID) references Clients(ClientID),
foreign key (PackageID) references catering_package(PackageID)
);

/* Insert data into database */
insert into Orders (OrderID, ClientID, PackageID, NumPeople, OrderDate, TrackingID)
values ("OR00000001", "CL00000001", "CP00000001", 10, "2020-10-8", 4);
insert into Orders (OrderID, ClientID, PackageID, NumPeople, OrderDate, TrackingID)
values ("OR00000002", "CL00000001", "CP00000002", 20, "2020-10-10", 3);
insert into Orders (OrderID, ClientID, PackageID, NumPeople, OrderDate, TrackingID)
values ("OR00000003", "CL00000001", "CP00000002", 50, "2020-10-11", 3);
insert into Orders (OrderID, ClientID, PackageID, NumPeople, OrderDate, TrackingID)
values ("OR00000004", "CL00000001", "CP00000003", 50, "2020-10-12", 1);

SELECT * FROM Orders WHERE ClientID="CL00000001";

/* get values */
SELECT * FROM orders INNER JOIN catering_package ON orders.PackageID=catering_package.PackageID WHERE ClientID="CL00000001";

create table OperationTeam
(
OperationID varchar(11) not null,
Username varchar(20),
Status bool,
Email varchar(255),
primary key (OperationID)
);

insert into OperationTeam (OperationID, Status, Username, Email)
values ("OT00000001", True, "Guy","guy@gmail.com");
insert into OperationTeam (OperationID, Status, Username, Email)
values ("OT00000002", True, "Iron","Iron@gmail.com");
insert into OperationTeam (OperationID, Status, Username, Email)
values ("OT00000003", True, "Ninja","Ninja@gmail.com");
insert into OperationTeam (OperationID, Status, Username, Email)
values ("OT00000004", True, "Guy","guy@gmail.com");
insert into OperationTeam (OperationID, Status, Username, Email)
values ("OT00000005", True, "Suzumiya","Suzumiya@gmail.com");

create table Members
(
MemberID varchar(11) not null,
MemberPoint int,
primary key (MemberID)
);

SELECT * FROM Catering_package;