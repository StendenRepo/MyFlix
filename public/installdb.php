<?php
//redirect to homepage after 5 seconds
header( "refresh:5;index.php" );
require_once "../src/config.php";

$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS);

//test connection and existence of database
if (!$connection) {
    die("could not connect to database");

}
//$connection = mysqli_connect("mysql", "root", "qwerty");

echo "database does not exist \nwill now install database.";

$createDatabase = mysqli_prepare($connection, "CREATE DATABASE IF NOT EXISTS `myflix` DEFAULT CHARACTER SET UTF8");

mysqli_stmt_execute($createDatabase);
echo "created database\n";

$useDatabase = mysqli_prepare($connection, "USE `myflix`");

mysqli_stmt_execute($useDatabase);
echo "using myflix";

$createTableAccount = mysqli_prepare($connection, "CREATE TABLE IF NOT EXISTS `account`
(
    `id`                INT         NOT NULL AUTO_INCREMENT,
    `genreId`           INT         NOT NULL,
    `accountTypeId`     INT         NOT NULL,
    `username`          VARCHAR(20) NOT NULL,
    `password`          VARCHAR(64) NOT NULL,
    `emailadress`       VARCHAR(64) NOT NULL,
    `genre`             VARCHAR(20) NULL,
    `studioName`        VARCHAR(50),
    `bankAccountNumber` VARCHAR(17),
    `adress`            VARCHAR(100),
    `city`              VARCHAR(35),
    `verified`          INT         NULL,
    PRIMARY KEY (`ID`)

) ENGINE = INNODB;");

mysqli_stmt_execute($createTableAccount);
echo "created table account\n";

$createTableAccountType = mysqli_prepare($connection, "CREATE TABLE IF NOT EXISTS `accountType`
(
    `id`    INT         NOT NULL AUTO_INCREMENT,
    `name`  VARCHAR(20) NOT NULL,
    `level` INT,
    PRIMARY KEY (`id`)
) ENGINE = INNODB;");

mysqli_stmt_execute($createTableAccountType);
echo "created table accountType\n";

$createTableGenre = mysqli_prepare($connection, "CREATE TABLE IF NOT EXISTS `genre`
(
    `id`          INT         NOT NULL AUTO_INCREMENT,
    `name`        VARCHAR(20) NULL,
    `description` VARCHAR(20) NULL,
    PRIMARY KEY (`id`)
) ENGINE = INNODB;");

mysqli_stmt_execute($createTableGenre);
echo "created table genre\n";

$createTableFilm = mysqli_prepare($connection, "CREATE TABLE IF NOT EXISTS `film`
(
    `id`        INT NOT NULL AUTO_INCREMENT,
    `accountId` INT NOT NULL,
    `genreId`   INT NOT NULL,
    `lenght`    INT NOT NULL,
    `name`      TIME,
    `accepted`  TINYINT,
    PRIMARY KEY (`id`)

) ENGINE = INNODB;");

mysqli_stmt_execute($createTableFilm);
echo "created table film";

$createTableRating = mysqli_prepare($connection, "CREATE TABLE IF NOT EXISTS `rating`
(
    `id`        INT     NOT NULL AUTO_INCREMENT,
    `filmId`    INT     NOT NULL,
    `accountId` INT     NOT NULL,
    `review`    TINYINT NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE = INNODB;");

mysqli_stmt_execute($createTableRating);
echo "created table rating\n";

$createTableNameChange = mysqli_prepare($connection, "CREATE TABLE IF NOT EXISTS `nameChange`
(
    `accountId`   INT NOT NULL,
    `pendingName` INT NOT NULL,
    PRIMARY KEY (accountId, pendingName)
) ENGINE = INNODB;");

mysqli_stmt_execute($createTableNameChange);
echo "created table name change";

$addFKAccountAccountType = mysqli_prepare($connection, "ALTER TABLE `account`
    ADD
        FOREIGN KEY (`accountTypeId`) REFERENCES accountType (`id`);");

mysqli_stmt_execute($addFKAccountAccountType);
echo "added foreign key account type";

$addFKAccountGenreId = mysqli_prepare($connection, "ALTER TABLE `account`
    ADD
        FOREIGN KEY (`genreId`) REFERENCES genre (`id`);");

mysqli_stmt_execute($addFKAccountGenreId);
echo "added foreign key genre";

$addFKRatingfilmId = mysqli_prepare($connection, "ALTER TABLE `rating`
    ADD
        FOREIGN KEY (`filmId`) REFERENCES film (`id`);");

mysqli_stmt_execute($addFKRatingfilmId);
echo "added foreign key rating";

$addFKRatingAccountId = mysqli_prepare($connection, "ALTER TABLE `rating`
    ADD
        FOREIGN KEY (`accountId`) REFERENCES account (`id`);");

mysqli_stmt_execute($addFKRatingAccountId);
echo "added foreign key accountid";

$addFKFilmAccountId = mysqli_prepare($connection, "ALTER TABLE `film`
    ADD
        FOREIGN KEY (`accountId`) REFERENCES account (`id`);");

mysqli_stmt_execute($addFKFilmAccountId);
echo "added foreign key film account id";

$addFKFilmGenreId = mysqli_prepare($connection, "ALTER TABLE `film`
    ADD
        FOREIGN KEY (`genreId`) REFERENCES genre (`id`);");

mysqli_stmt_execute($addFKFilmGenreId);
echo "added foreign key film genre id";

$addFKNameChangeId = mysqli_prepare($connection, "ALTER TABLE `nameChange` ADD FOREIGN KEY (`accountId`) REFERENCES account (`id`);");
mysqli_stmt_execute($addFKNameChangeId);
echo "added foreign key namechange id";



mysqli_close($connection);
echo "closed connection";
