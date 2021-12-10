-- ---------------------------
-- table Account
-- ---------------------------
CREATE TABLE IF NOT EXISTS `account`
(
    `id`           INT         NOT NULL AUTO_INCREMENT,
    `accountLevel` INT         NOT NULL DEFAULT 0,
    `firstName`    varchar(20) NOT NULL,
    `lastName`     varchar(20) NOT NULL,
    `username`     VARCHAR(20) NOT NULL,
    `password`     VARCHAR(64) NOT NULL,
    `email`        VARCHAR(64) NOT NULL UNIQUE,
    `genre`        INT NULL,
    `studioName`   VARCHAR(50),
    `iban`         VARCHAR(35),
    `address`      VARCHAR(100),
    `city`         VARCHAR(35),
    PRIMARY KEY (`ID`)
) ENGINE = INNODB;

-- ---------------------------
-- table accountType
-- ---------------------------
CREATE TABLE IF NOT EXISTS `accountType`
(
    `name`  VARCHAR(30) NOT NULL,
    `level` INT         NOT NULL,
    PRIMARY KEY (`level`),
    UNIQUE (`level`, `name`)
) ENGINE = INNODB;

-- ---------------------------
-- fill table accountType
-- ---------------------------
INSERT INTO `accountType`(`name`, `level`)
VALUES ('viewer', 0),
       ('content Creator', 1),
       ('verified content creator', 2),
       ('moderator', 3);

-- ---------------------------
-- table genre
-- ---------------------------
CREATE TABLE IF NOT EXISTS `genre`
(
    `id`          INT         NOT NULL AUTO_INCREMENT,
    `name`        VARCHAR(20) NOT NULL,
    `description` VARCHAR(40) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE = INNODB;

-- ---------------------------
-- table film
-- ---------------------------
CREATE TABLE IF NOT EXISTS `film`
(
    `id`        INT         NOT NULL AUTO_INCREMENT,
    `accountId` INT         NOT NULL,
    `fileName`  varchar(20) NOT NULL,
    `genreId`   INT         NOT NULL,
    `length`    INT         NOT NULL,
    `name`      TIME,
    `accepted`  TINYINT(1) DEFAULT 0,
    PRIMARY KEY (`id`)
) ENGINE = INNODB;

-- ---------------------------
-- table rating
-- ---------------------------
CREATE TABLE IF NOT EXISTS `rating`
(
    `id`        INT     NOT NULL AUTO_INCREMENT,
    `filmId`    INT     NOT NULL,
    `accountId` INT     NOT NULL,
    `review`    TINYINT NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE = INNODB;

-- ---------------------------
-- table nameChange
-- ---------------------------
CREATE TABLE IF NOT EXISTS `nameChange`
(
    `accountId`   INT         NOT NULL,
    `pendingName` VARCHAR(50) NOT NULL,
    PRIMARY KEY (accountId)
) ENGINE = INNODB;


-- ---------------------------
-- add foreign keys account table
-- ---------------------------
ALTER TABLE `account`
    ADD
        FOREIGN KEY (`accountLevel`) REFERENCES accountType (`level`);

ALTER TABLE `account`
    ADD
        FOREIGN KEY (`genre`) REFERENCES genre (`id`);

-- ---------------------------
-- add foreign keys rating table
-- ---------------------------
ALTER TABLE `rating`
    ADD
        FOREIGN KEY (`filmId`) REFERENCES film (`id`);

ALTER TABLE `rating`
    ADD
        FOREIGN KEY (`accountId`) REFERENCES account (`id`);

-- ---------------------------
-- add foreign keys film table
-- ---------------------------
ALTER TABLE `film`
    ADD
        FOREIGN KEY (`accountId`) REFERENCES account (`id`);

ALTER TABLE `film`
    ADD
        FOREIGN KEY (`genreId`) REFERENCES genre (`id`);

-- ---------------------------
-- add foreign keys namechange table
-- ---------------------------
ALTER TABLE `nameChange`
    ADD
        FOREIGN KEY (`accountId`) REFERENCES account (`id`);