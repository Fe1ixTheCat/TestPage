<?php
create table posts (
id int (10) AUTO_INCREMENT,
heading varchar(20) NOT NULL,
about text(255) NOT NULL,
time int(10) NOT NULL,
image varchar(20) NOT NULL,
PRIMARY KEY (id)
);
 ?>
