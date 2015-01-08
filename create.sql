CREATE SCHEMA `cms` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE cms;

CREATE TABLE `cms`.`module` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(100) NOT NULL,
  `controller` VARCHAR(100) NOT NULL,
  `icon` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

insert into module values
(null, 'Home', '', 'home'),
(null, 'Dados do Site', 'config', 'cogs'),
(null, 'Menu', 'menu', 'tasks'),
(null, 'Conteúdo', 'content', 'quote-left'),
(null, 'Fotos', 'photogallery', 'camera-retro'),
(null, 'Galeria de Videos', 'videogallery', 'film'),
(null, 'Videos', 'video', 'play-circle'),
(null, 'Categoria de Produtos', 'productcategory', 'shopping-cart'),
(null, 'Produtos', 'product', 'gift'),
(null, 'Contatos', 'contact', 'envelope-o'),
(null, 'Ajuda', 'help', 'info-circle');




CREATE TABLE `cms`.`config` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(200) NOT NULL,
  `image` VARCHAR(100),
  `email` VARCHAR(200) NOT NULL,
  `contact` VARCHAR(100),
  `address` TEXT,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;




CREATE TABLE `cms`.`type_menu` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(100) NOT NULL,
  `controller` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

insert into type_menu values
(null, 'Conteúdo', 'conteudo'),
(null, 'Notícias', 'noticias'),
(null, 'Produtos', 'produtos'),
(null, 'Galeria de Fotos', 'fotos'),
(null, 'Galeria de Videos', 'videos'),
(null, 'Contato', 'contato');





CREATE TABLE `cms`.`menu` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `master_id` INT NULL,
  `type_menu_id` INT NOT NULL,
  `title` VARCHAR(100) NOT NULL,
  `description` TEXT NULL,
  `image` VARCHAR(100) NULL,
  `special` INT NULL,
  `exibition` INT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_type_menu_idx` (`type_menu_id` ASC),
  CONSTRAINT `fk_type_menu`
    FOREIGN KEY (`type_menu_id`)
    REFERENCES `cms`.`type_menu` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

ALTER TABLE `cms`.`menu` 
ADD CONSTRAINT `fk_master`
  FOREIGN KEY (`master_id`)
  REFERENCES `cms`.`menu` (`id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;


CREATE TABLE `cms`.`type_page` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(100) NOT NULL,
  `description` TEXT NULL,
  `page` VARCHAR(100) NOT NULL,
  `image` VARCHAR(100) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

insert into type_page values
(null, 'Página com imagem destaque no topo', 'Modelo de página com uma imagem grande em destaque no topo do página', 'simple_page_top', 'page_top.png');





CREATE TABLE `cms`.`content` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `menu_id` INT NULL,
  `type_page_id` INT NULL,
  `title` VARCHAR(100) NOT NULL,
  `description` TEXT NULL,
  `content` TEXT NULL,
  `image` VARCHAR(100) NULL,
  `date_create` DATETIME NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_menu_idx` (`menu_id` ASC),
  INDEX `fk_type_page_id` (`type_page_id` ASC),
  CONSTRAINT `fk_menu`
    FOREIGN KEY (`menu_id`)
    REFERENCES `cms`.`menu` (`id`)
    ON DELETE SET NULL
    ON UPDATE SET NULL,
  CONSTRAINT `fk_type_page`
    FOREIGN KEY (`type_page_id`)
    REFERENCES `cms`.`type_page` (`id`)
    ON DELETE SET NULL
    ON UPDATE SET NULL)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;






CREATE TABLE `cms`.`type_video` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(100) NULL,
  `type` VARCHAR(100) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

INSERT INTO type_video VALUES
(null, 'YouTube', 'youtube'),
(null, 'Vimeo', 'vimeo');


CREATE TABLE `cms`.`video_gallery` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(100) NOT NULL,
  `description` TEXT NULL,
  `exibition` INT NULL,
  `date_create` DATETIME NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


CREATE TABLE `cms`.`video` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `video_gallery_id` INT NULL,
  `type_video_id` INT NOT NULL,
  `title` VARCHAR(100) NOT NULL,
  `description` TEXT NULL,
  `url` VARCHAR(200) NULL,
  `date_create` DATETIME NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_video_gallery_idx` (`video_gallery_id` ASC),
  INDEX `fk_type_video_idx` (`type_video_id` ASC),
  CONSTRAINT `fk_video_gallery`
    FOREIGN KEY (`video_gallery_id`)
    REFERENCES `cms`.`video_gallery` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_type_video`
    FOREIGN KEY (`type_video_id`)
    REFERENCES `cms`.`type_video` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;



CREATE TABLE `cms`.`product_category` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(100) NULL,
  `description` TEXT NULL,
  `image` VARCHAR(100) NULL,
  `exibition` INT NULL,
  `date_create` DATETIME NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


CREATE TABLE `cms`.`product` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `product_category_id` INT NULL,
  `title` VARCHAR(100) NOT NULL,
  `description` TEXT NULL,
  `content` TEXT NULL,
  `image` VARCHAR(100) NULL,
  `date_create` DATETIME NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_product_category_idx` (`product_category_id` ASC),
  CONSTRAINT `fk_product_category`
    FOREIGN KEY (`product_category_id`)
    REFERENCES `cms`.`product_category` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


CREATE TABLE `cms`.`contact` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(100) NOT NULL,
  `company` VARCHAR(100) NULL,
  `departament` VARCHAR(100) NULL,
  `contact` VARCHAR(100) NOT NULL,
  `email` VARCHAR(100) NOT NULL,
  `subject` VARCHAR(200) NULL,
  `content` TEXT NOT NULL,
  `date_create` DATETIME NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

INSERT INTO contact VALUES
(null, 'Thais Martins', 'Teste Company', 'Teste Deparment', '11 2222-2222', 'thaismartinsweb@gmail.com', 'Teste de Assunto', 'Conteúdo do Email', now()),
(null, 'Thais Martins', 'Teste Company', '', '11 2222-2222', 'thaismartinsweb@gmail.com', 'Teste de Assunto', 'Conteúdo do Email', now()),
(null, 'Thais Martins', '', 'Teste Deparment', '11 2222-2222', 'thaismartinsweb@gmail.com', 'Teste de Assunto', 'Conteúdo do Email', now()),
(null, 'Thais Martins', 'Teste Company', 'Teste Deparment', '11 2222-2222', 'thaismartinsweb@gmail.com', '', 'Conteúdo do Email', now());


CREATE TABLE `cms`.`photo_gallery` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(100) NOT NULL,
  `image` VARCHAR(100) NULL,
  `description` TEXT NULL,
  `exibition` INT NULL,
  `date_create` DATETIME NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


CREATE TABLE `cms`.`photo` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `photo_gallery_id` INT NOT NULL,
  `title` VARCHAR(100) NULL,
  `description` TEXT NULL,
  `image` VARCHAR(45) NULL,
  `date_create` DATETIME NOT NULL,
  PRIMARY KEY (`id`),
	INDEX `fk_photo_gallery_idx` (`photo_gallery_id` ASC),
  CONSTRAINT `fk_photo_gallery`
    FOREIGN KEY (`photo_gallery_id`)
    REFERENCES `cms`.`photo_gallery` (`id`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


CREATE TABLE `cms`.`help` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `module_id` INT NULL,
  `title` VARCHAR(200) NULL,
  `content` TEXT NULL,
  `exibition` INT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_module_idx` (`module_id` ASC),
  CONSTRAINT `fk_module`
    FOREIGN KEY (`module_id`)
    REFERENCES `cms`.`module` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE TABLE `cms`.`user` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(100) NULL,
  `username` VARCHAR(100) NOT NULL,
  `password` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

INSERT INTO `cms`.`user` VALUES (null, 'Administrador', 'admin', '24e7a730ff315b8bb4f013a282b98ebd');


drop table user;
select * from photo;

insert into module_action values
(null, 3, 'Gerenciar Todos','index', 'pencil-square-o'),
(null, 3, 'Adicionar Novo', 'fresh', 'plus-square-o'),
(null, 4, 'Gerenciar Todos','index', 'pencil-square-o'),
(null, 4, 'Adicionar Novo', 'fresh', 'plus-square-o'),
(null, 5, 'Gerenciar Todos','index', 'pencil-square-o'),
(null, 5, 'Adicionar Novo', 'fresh', 'plus-square-o'),
(null, 6, 'Gerenciar Todos','index', 'pencil-square-o'),
(null, 6, 'Adicionar Novo', 'fresh', 'plus-square-o'),
(null, 7, 'Gerenciar Todos','index', 'pencil-square-o'),
(null, 7, 'Adicionar Novo', 'fresh', 'plus-square-o'),
(null, 8, 'Gerenciar Todos','index', 'pencil-square-o'),
(null, 8, 'Adicionar Novo', 'fresh', 'plus-square-o'),
(null, 9, 'Gerenciar Todos','index', 'pencil-square-o'),
(null, 9, 'Adicionar Novo', 'fresh', 'plus-square-o'),
(null, 10, 'Gerenciar Todos','index', 'pencil-square-o'),
(null, 10, 'Adicionar Novo', 'fresh', 'plus-square-o');