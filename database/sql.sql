DROP TABLE if exists friendship;
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
);

create table friendship
(
    id           int auto_increment
        primary key,
    id_town      int null,
    id_character int null,
    constraint friendship_characters_id_fk
        foreign key (id_character) references graphbase.characters (id)
            on update cascade on delete cascade,
    constraint friendship_town_id_fk
        foreign key (id_town) references graphbase.town (id)
            on update cascade on delete cascade
);


select * from town
left join friendship  on town.id = id_town

where id_character in (3,4,5);