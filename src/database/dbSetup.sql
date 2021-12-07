-- ---------------------------
-- table Account
-- ---------------------------
CREATE TABLE IF NOT EXISTS `account`
(
    `id`            INT         NOT NULL AUTO_INCREMENT,
    `genreId`       INT         NOT NULL,
    `accountTypeId` INT         NOT NULL,
    `username`      VARCHAR(20) NOT NULL,
    `password`      VARCHAR(64) NOT NULL,
    `emailadress`   VARCHAR(64) NOT NULL,
    `genre`         VARCHAR(20) NULL,
    `studioName`    VARCHAR(50),
    `iban`          VARCHAR(30),
    `adress`        VARCHAR(100),
    `city`          VARCHAR(35),
    `verified`      tinyint(1) DEFAULT 0,
    PRIMARY KEY (`ID`)
) ENGINE = INNODB;

-- ---------------------------
-- table accountType
-- ---------------------------
CREATE TABLE IF NOT EXISTS `accountType`
(
    `id`    INT         NOT NULL AUTO_INCREMENT,
    `name`  VARCHAR(20) NOT NULL,
    `level` INT         NOT NULL,
    PRIMARY KEY (`id`),
    UNIQUE (`level`, `name`)
) ENGINE = INNODB;

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
    `id`        INT NOT NULL AUTO_INCREMENT,
    `accountId` INT NOT NULL,
    `genreId`   INT NOT NULL,
    `length`    INT NOT NULL,
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
        FOREIGN KEY (`accountTypeId`) REFERENCES accountType (`id`);

ALTER TABLE `account`
    ADD
        FOREIGN KEY (`genreId`) REFERENCES genre (`id`);

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