-- ---------------------------
-- genres for testing
-- ---------------------------
INSERT INTO genre(`name`, `description`)
VALUES ("Horror", "Scary movies"),
       ("Comedy", "Humorous movies"),
       ("Animation", "Annimated movies"),
       ("Action", "Shoot everyone you can see");

-- ---------------------------
-- companyAccounts for testing only
-- Note: all this information is fictional
-- ---------------------------
INSERT INTO company(studioName, genre, iban, address, city)
values ("MyActie", 3, "DE21228324723857459880", "1633 Prospect Street", "Woodbury, New Jersey"),
       ("Comedy4U", 2, "NL14TYNI1222534303", "Bergkwartier 9", "Venray, Limburg"),
       ("123Horror", 1, "NL64INGB8247360527", "Bergstaat 9", "Emmen, Drenthe"),
       ("Pro Animations", 4, "NL79RABO5373380466", "Hoofdplein 14", "Groningen, Groningen");

-- ---------------------------
-- userAccounts for testing only
-- Set with a default password of "password"
-- ---------------------------
INSERT INTO account(accountLevel, firstName, lastName, username, password, email, companyId, verified)
VALUES (0, "Art", "Harren", "SuperViewer2000",
        "$2y$10$Gg3f3SgZf3xlthDiMB3hp.j8VYkcrL.67Ndu/5Q2CoCx11rcZGE0O", "viewer@myflix.nl", null, 0),
       (1, "Humberto", "Cole", "myActie",
        "$2y$10$Gg3f3SgZf3xlthDiMB3hp.j8VYkcrL.67Ndu/5Q2CoCx11rcZGE0O", "uploader@myflix.nl", 1, 0),
       (1, "Handige", "Harry", "Comedy4U",
        "$2y$10$Gg3f3SgZf3xlthDiMB3hp.j8VYkcrL.67Ndu/5Q2CoCx11rcZGE0O", "uploader2@myflix.nl", 2, 0),
       (1, "Edwina", "Reilly", "123Horror",
        "$2y$10$Gg3f3SgZf3xlthDiMB3hp.j8VYkcrL.67Ndu/5Q2CoCx11rcZGE0O", "uploader3@myflix.nl", 3, 0),
       (1, "Prona", "Verbeek", "Pro-Animations",
        "$2y$10$Gg3f3SgZf3xlthDiMB3hp.j8VYkcrL.67Ndu/5Q2CoCx11rcZGE0O", "uploader4@myflix.nl", 4, 0),
       (1, "Super", "Uploader", "HappyUploader",
        "$2y$10$Gg3f3SgZf3xlthDiMB3hp.j8VYkcrL.67Ndu/5Q2CoCx11rcZGE0O", "superuploader@myflix.nl", 3, 1),
       (2, "Super", "Moderator", "moderator",
        "$2y$10$Gg3f3SgZf3xlthDiMB3hp.j8VYkcrL.67Ndu/5Q2CoCx11rcZGE0O", "moderator@myflix.nl", null, 0);

-- ---------------------------
-- videos for testing only
-- ---------------------------
INSERT INTO film (accountId, path, thumbnail,
                  genreId, length, name, accepted)

VALUES (2, "assets/video/theNightingale.mp4", "assets/thumbnail/theNightingale.jpg",
        1, "01:30:00", "The Nightingale", 1),
       (2, "assets/video/blackWidow.mp4", "assets/thumbnail/blackWidow.jpg",
        1, "00:13:03", "Black Widow", 0),
       (1, "assets/video/glass.mp4", "assets/thumbnail/glass.jpg",
        4, "19:03:03", "Glass", 1),
       (2, "assets/video/super_video.mp4", "assets/thumbnail/stowayay.jpg",
        1, "01:03:03", "Stowayay", 1),
       (2, "assets/video/super_video.mp4", "assets/thumbnail/infinite.jpg",
        1, "01:03:06", "Infinite", 0),
       (2, "assets/video/super_video.mp4", "assets/thumbnail/nobody.jpg",
        4, "01:19:03", "Nobody", 1),
       (3, "assets/video/super_video.mp4", "assets/thumbnail/chernobyl.jpg",
        4, "01:08:16", "Chernobyl", 1),
       (3, "assets/video/dolittle.mp4", "assets/thumbnail/dolittle.jpg",
        2, "01:23:13", "Dolittle", 1),
       (2, "assets/video/up.mp4", "assets/thumbnail/up.jpg",
        2, "03:00:10", "Up", 1),
       (2, "assets/video/super_video.mp4", "assets/thumbnail/pan.jpg",
        2, "01:03:03", "Pan", 1),
       (5, "assets/video/winnieThePooh.mp4", "assets/thumbnail/winnieThePooh.jpg",
        3, "01:30:33", "Winnie The Pooh", 1),
       (5, "assets/video/super_video.mp4", "assets/thumbnail/smurfen2.jpeg",
        3, "01:43:03", "Smurfen 2", 1);