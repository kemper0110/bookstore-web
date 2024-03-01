drop table users;

create table users (
	id integer not null auto_increment,
    name varchar(50) not null,
    password_hash varchar(80) not null,
    salt varchar(50) not null,
    primary key (id)
);

drop table book_type;

create table book_type (
	id varchar(30) not null,
	name varchar(100),
    primary key (id)
);    

insert into book_type(id, name) values
("fiction", "Художественная литература"),
("comic", "Комиксы"),
("education", "Образовательная литература");
    
create table book (
	id bigint not null auto_increment,
	name varchar(100),
    type_id varchar(50),
    price integer,
    rating integer,
    image text,
    primary key (id),
    foreign key (type_id) references book_type (id)
);
drop table book;

insert into book(name, type_id, price, rating, image) values
("Виленкин Математика", "education", 1599, 10, "1.webp"),
("English Grammar", "education", 216, 5, "2.webp"),
("Окружающий мир", "education", 307, 4, "3.webp"),
("Крылья", "fiction", 638, 6, "4.webp"),
("Мастер и Маргарита", "fiction", 152, 8, "5.webp"),
("Война и мир", "fiction", 297, 8, "6.webp"),
("Преступление и наказание", "fiction", 152, 8, "7.webp"),
("Гордость и предубеждение", "fiction", 152, 8, "8.webp"),
("1984. Скотный двор", "fiction", 152, 8, "9.webp"),
("Магическая битва", "comic", 648, 7, "10.webp"),
("Человек-бензопила", "comic", 579, 7, "11.webp"),
("Моя геройская академия", "comic", 644, 7, "12.webp"),
("Токийский гуль", "comic", 739, 7, "13.webp"),
("Death Note", "comic", 842, 7, "14.webp");