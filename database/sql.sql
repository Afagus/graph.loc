DROP TABLE if exists characters;
DROP TABLE if exists town;
DROP TABLE if exists map;


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
    map int,
    coordinateX int,
    coordinateY int,

    constraint town_ibfk_1
        foreign key (map) references map (id) ON DELETE CASCADE ON UPDATE RESTRICT
)

