create table users (
userID INT not null auto_increment primary key,
Name varchar(100) unique not null,
Email varchar(150) not null,
Password varchar(255) not null,
role ENUM('user','admin') default 'user'
);
create table tags(
tagID int not null auto_increment primary key,
tagName varchar(50) not null
);
create table blogs (
blogID INT not null auto_increment primary key,
authorID int not null,
title varchar(255) not null,
content varchar(1000),
image blob,
category int not null,
foreign key (authorID) references users(userID),
foreign key (category) references tags(tagID)
);

create table comments (
coumentID int not null auto_increment primary key,
blogID int not null,
authorID int not null,
content varchar(500),
foreign key (authorID) references users(userID),
foreign key (blogID) references blogs(blogID)
);

create table likes (
likeID int  not null auto_increment primary key,
blogID int not null,
userID int not null,
foreign key (userID) references users(userID),
foreign key (blogID) references blogs(blogID)
);