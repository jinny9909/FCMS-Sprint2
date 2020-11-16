create database FCMS;

/* Select FCMS database */
USE FCMS;  

/* Catering package table */
create table Catering_package
(
PackageID VARCHAR(11) not null,
PackageName VARCHAR(255),
PackageDescription VARCHAR(255),
PricePerPax double,
ImagePath VARCHAR(255),
primary key (PackageID)
);

insert into Catering_package (PackageID, PackageName, PackageDescription, PricePerPax, ImagePath) values
("CP00000001", "Chinese Catering Package", "This is Chinese Cuisine", 17.00, "images\\packages\\packageA.jpg"),
("CP00000002", "Western Catering Package", "This is Indian Cuisine", 19.00, "images\\packages\\packageB.jpg"),
("CP00000003", "Mix Catering Package", "This is Malay Cuisine", 20.00, "images\\packages\\packageC.jpg");

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
insert into Food (FoodID, FoodName, PackageID) values
("CF00000001", "Chinese Fried Rice", "CP00000001"),
("CF00000002", "Breaised Noodles", "CP00000001"),
("CF00000003", "Seafood with Chilli Crab Sauce", "CP00000001"),
("CF00000004", "Omelette", "CP00000001");

/* List of accounts implementation */
create table Clients
(
ClientID varchar(10) not null,
Status bool,
Username varchar(20),
Email varchar(255),
ImagePath varchar(255),
Password varchar(255),
PhoneNumber int unsigned,
token varchar(100),
primary key (ClientID)
);

/*Inserting Data into Account*/
insert into Clients (ClientID, Status, Username, Email, Password, PhoneNumber, ImagePath, token) values
("CL00000001", 1, "user1", "user1@gmail.com", "abc123", 1234567891,'images\\ProfilePicture\\user1.jpg', 'aeeegteRrA'),
("CL00000002", 1, "user2", "user2@gmail.com", "abc123", 1234567892,'images\\ProfilePicture\\user2.jpg', ''),
("CL00000003", 1, "user3", "user3@gmail.com", "abc123", 1234567893,'images\\ProfilePicture\\user3.jpg', ''),
("CL00000004", 1, "Uncle Roger", "ur@gmail.com", "abc123", 1234567893,'images\\ProfilePicture\\Uncle Roger.png', '');


/*
SELECT * FROM clients WHERE username = "user1" AND clientpassword = "abc123" AND status = 1;
*/

/* get values */
/*
SELECT MemberID, Username, PhoneNumber, Email, Password FROM clients;
SELECT * FROM Clients;
SELECT * FROM clients WHERE username = "user1" AND client = "abc123";
*/

/* update test */
/*
UPDATE Clients SET Status = 0 WHERE ClientID ='CL00000001';
SELECT * FROM clients;
SELECT * FROM operationteam;
SELECT Status FROM clients WHERE ClientID ='CL00000001';
*/

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
insert into Orders (OrderID, ClientID, PackageID, NumPeople, OrderDate, TrackingID) values
("OR00000001", "CL00000001", "CP00000001", 10, "2020-10-8", 4),
("OR00000002", "CL00000001", "CP00000002", 20, "2020-10-10", 3),
("OR00000003", "CL00000001", "CP00000002", 50, "2020-10-11", 3),
("OR00000004", "CL00000001", "CP00000003", 50, "2020-10-12", 1);

/*
SELECT * FROM Orders WHERE ClientID="CL00000001";
SELECT * FROM Orders WHERE OrderID="OR00000004";
SELECT * FROM Orders INNER JOIN catering_package ON orders.PackageID = catering_package.PackageID WHERE OrderID="OR00000004";
*/

/* get values */
/* 
SELECT * FROM orders INNER JOIN catering_package ON orders.PackageID=catering_package.PackageID WHERE ClientID="CL00000001"; 
*/

create table OperationTeam
(
OperationID varchar(11) not null,
Username varchar(20),
Password varchar(255),
Status bool,
Email varchar(255),
primary key (OperationID)
);

insert into OperationTeam (OperationID, Status, Username, Password, Email) values 
("OT00000001", True, "operation1", "abc123", "operation1@gmail.com"),
("OT00000002", True, "operation2", "abc123", "operation1@gmail.com"),
("OT00000003", True, "operation3", "abc123", "operation1@gmail.com"),
("OT00000004", True, "operation4", "abc123", "operation1@gmail.com"),
("OT00000005", True, "operation5", "abc123", "operation1@gmail.com");

create table ManagementTeam
(
ManagementID varchar(11) not null,
Username varchar(20),
Password varchar(255),
Email varchar(255),
primary key (ManagementID)
);

insert into ManagementTeam (ManagementID, Username, Password, Email) values
("MT00000001", "management1", "abc123", "mangement1@email.com"),
("MT00000002", "management2", "abc123", "mangement2@email.com"),
("MT00000003", "management3", "abc123", "mangement3@email.com");

create table Members
(
MemberID varchar(11) not null,
ClientID varchar(11) not null,
MemberPoint int,
primary key (MemberID),
foreign key (ClientID) references Clients(ClientID)
);

insert into members (MemberID, ClientID, MemberPoint) values
('CM00000001', "CL00000001", 100),
('CM00000002', "CL00000002", 50),
('CM00000003', "CL00000003", 200),
('CM00000004', "CL00000004", 10);

create table reward_item
(
ItemID varchar(11) not null,
ItemName varchar(255) not null,
ItemPoints int not null,
ItemImgPath varchar(255) not null,
primary key (ItemID)
);

insert into reward_item (ItemID, ItemName, ItemPoints, ItemImgPath) values
(0, 'Mineral Water', 50, 'images\\reward1.jpg');
