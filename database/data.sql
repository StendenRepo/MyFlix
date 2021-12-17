-- ---------------------------
-- data genres
-- ---------------------------
INSERT INTO genre(`name`, `description`)
VALUES ("horror", "spanning en sensatie en schrikken "),
       ("actie", "schiet iedereen niet die je kan zien");

-- ---------------------------
-- data company
-- ---------------------------
INSERT INTO company(studioName, genre, iban, address, city)
values ("dishey", 1, "IL749164487136422355815", "addres voor dishey", "orlando"),
       ("netjes", 2, "GR9101724648682144251836162", "addres voor netjes", "toronto");

-- ---------------------------
-- data users
-- ww = Demodemo1
-- ---------------------------

INSERT INTO `account`(accountLevel, firstName, lastName, username, password, email, companyId, verified)
VALUES (0, "test first name", "test last name", "TestViewer", "$2y$10$Eo.EbmyT.aVQ5gZ.P.4RVe8ZcDPcwaM5e4xDadV0..Lejb0mGfIaW", "viewer@test.nl", null, 0),
    (1, "test1 first name", "test1 last name", "TestUploader", "$2y$10$Eo.EbmyT.aVQ5gZ.P.4RVe8ZcDPcwaM5e4xDadV0..Lejb0mGfIaW", "uploader@test.nl", 1, 0),
    (1, "test2 first name", "test1 last name", "TestUploader1", "$2y$10$Eo.EbmyT.aVQ5gZ.P.4RVe8ZcDPcwaM5e4xDadV0..Lejb0mGfIaW", "uploader1@test.nl", 1, 1),
    (2, "test3 first name", "test2 last name", "moderator", "$2y$10$Eo.EbmyT.aVQ5gZ.P.4RVe8ZcDPcwaM5e4xDadV0..Lejb0mGfIaW", "moderator@test.nl", null, 0);



-- ---------------------------
-- data film
-- ---------------------------
INSERT INTO film (accountId, path, thumbnail, genreId, length, name, accepted)
VALUES (2,"/assets/video/super_video.mp4", "/assets/img/Placeholders/Placehholder_1.jpg", 1,"01:03:03","nightinggale",1),
       (1,"/assets/video/super_video.mp4", "/assets/img/Placeholders/Placehholder_2.jpg", 1,"01:03:03","japie 1",0),
       (1,"/assets/video/super_video.mp4", "/assets/img/Placeholders/Placehholder_3.jpg", 1,"01:03:03","japie 2",1),
       (2,"/assets/video/super_video.mp4", "/assets/img/Placeholders/Placehholder_4.jpg", 1,"01:03:03","japie 3",1),
       (1,"/assets/video/super_video.mp4", "/assets/img/Placeholders/Placehholder_5.jpg", 1,"01:03:03","japie 4",0),
       (2,"/assets/video/super_video.mp4", "/assets/img/Placeholders/Placehholder_6.jpg", 1,"01:03:03","japie 5",1),
       (1,"/assets/video/super_video.mp4", "/assets/img/Placeholders/Placehholder_7.jpg", 1,"01:03:03","japie 6",1),
       (2,"/assets/video/super_video.mp4", "/assets/img/Placeholders/Placehholder_8.jpg", 1,"01:03:03","japie 7",1),
       (1,"/assets/video/super_video.mp4", "/assets/img/Placeholders/Placehholder_9.jpg", 1,"01:03:03","japie 8",1),
       (2,"/assets/video/super_video.mp4", "/assets/img/Placeholders/Placehholder_10.jpg", 1,"01:03:03","japie 9",1);

-- ---------------------------
-- data
-- ---------------------------

