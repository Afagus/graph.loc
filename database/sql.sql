DROP TABLE if exists map;
DROP TABLE if exists characters;
DROP TABLE if exists town;


CREATE TABLE map
(
    id int primary key auto_increment,
    name varchar(30),
    xSize int,
    ySize int
);

CREATE TABLE characters
(
    id int primary key auto_increment,
    name varchar(30)
);

CREATE TABLE town
(
    id int primary key auto_increment,
    name varchar(30),
    toMap varchar(30),
    coordinateX int,
    coordinateY int
)