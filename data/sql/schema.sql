CREATE TABLE customers (id BIGINT AUTO_INCREMENT, customername VARCHAR(255) NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE users (id BIGINT AUTO_INCREMENT, password VARCHAR(255), username VARCHAR(255) NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
