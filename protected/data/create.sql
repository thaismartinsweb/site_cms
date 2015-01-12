CREATE SCHEMA `thaismar_site` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `thaismar_site`;


CREATE TABLE `thaismar_site`.`module` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(100) NOT NULL,
  `controller` VARCHAR(100) NOT NULL,
  `icon` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


insert into `thaismar_site`.module values
(null, 'Home', '', 'home'),
(null, 'Dados do Site', 'config', 'cogs'),
(null, 'Menu', 'menu', 'tasks'),
(null, 'Conteúdo', 'content', 'quote-left'),
(null, 'Serviços', 'service', 'code'),
(null, 'Portfolio', 'portfolio', 'desktop'),
(null, 'Fotos do Portfólio', 'photo', 'camera-retro'),
(null, 'Contatos', 'contact', 'envelope-o');


CREATE TABLE `thaismar_site`.`config` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `image` varchar(100) DEFAULT NULL,
  `email` varchar(200) NOT NULL,
  `contact` varchar(100) DEFAULT NULL,
  `site` varchar(100) DEFAULT NULL,
  `skype` varchar(45) DEFAULT NULL,
  `behance` varchar(45) DEFAULT NULL,
  `github` varchar(45) DEFAULT NULL,
  `linkedin` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;



CREATE TABLE `thaismar_site`.`type_menu` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(100) NOT NULL,
  `controller` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

insert into type_menu values
(null, 'Conteúdo', 'conteudo'),
(null, 'Serviços', 'service'),
(null, 'Portfólio', 'portfolio'),
(null, 'Galeria de Fotos', 'fotos'),
(null, 'Contato', 'contato');



CREATE TABLE `thaismar_site`.`menu` (
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
    REFERENCES `thaismar_site`.`type_menu` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

ALTER TABLE `thaismar_site`.`menu` 
ADD CONSTRAINT `fk_master`
  FOREIGN KEY (`master_id`)
  REFERENCES `thaismar_site`.`menu` (`id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;


CREATE TABLE `thaismar_site`.`type_page` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(100) NOT NULL,
  `description` TEXT NULL,
  `page` VARCHAR(100) NOT NULL,
  `image` VARCHAR(100) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


insert into `thaismar_site`.`type_page` values
(null, 'Página com imagem destaque no topo', 'Modelo de página com uma imagem grande em destaque no topo do página', 'simple_page_top', 'page_top.png');


CREATE TABLE `thaismar_site`.`tag` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(45) NULL,
  PRIMARY KEY (`id`))
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


INSERT INTO `thaismar_site`.`tag` VALUES
(null, 'DESIGN'),
(null, 'HTML'),
(null, 'CSS'),
(null, 'PHP'),
(null, 'JAVA'),
(null, 'CMS'),
(null, 'ECOMMERCE');



CREATE TABLE `thaismar_site`.`content` (
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
    REFERENCES `thaismar_site`.`menu` (`id`)
    ON DELETE SET NULL
    ON UPDATE SET NULL,
  CONSTRAINT `fk_type_page`
    FOREIGN KEY (`type_page_id`)
    REFERENCES `thaismar_site`.`type_page` (`id`)
    ON DELETE SET NULL
    ON UPDATE SET NULL)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


CREATE TABLE `thaismar_site`.`portfolio` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(100) NULL,
  `site` VARCHAR(100) NULL,
  `description` TEXT NULL,
  `content` TEXT NULL,
  `image` VARCHAR(100) NULL,
  PRIMARY KEY (`id`))
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;



CREATE TABLE `thaismar_site`.`tag_x_portfolio` (
  `id_tag` INT(11) NOT NULL,
  `id_portfolio` INT(11) NOT NULL,
  INDEX `fk_tag_x_portfolio_2_idx` (`id_portfolio` ASC),
  PRIMARY KEY (`id_tag`, `id_portfolio`),
  CONSTRAINT `fk_type_x_portfolio_1`
    FOREIGN KEY (`id_tag`)
    REFERENCES `thaismar_site`.`tag` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tag_x_portfolio_2`
    FOREIGN KEY (`id_portfolio`)
    REFERENCES `thaismar_site`.`portfolio` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


CREATE TABLE `thaismar_site`.`photo` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `id_portfolio` INT,
  `title` VARCHAR(100) NOT NULL,
  `image` VARCHAR(100) NULL,
  `exibition` INT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_photo_1`
  	FOREIGN KEY (`id_portfolio`)
  	REFERENCES `thaismar_site`.`portfolio` (`id`)
  	ON DELETE NO ACTION
  	ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


CREATE TABLE `thaismar_site`.`service` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(100) NULL,
  `description` TEXT NULL,
  `content` TEXT NULL,
  `icon` VARCHAR(45) NULL,
  PRIMARY KEY (`id`))
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


CREATE TABLE `thaismar_site`.`contact` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(100) NOT NULL,
  `email` VARCHAR(100) NOT NULL,
  `phone` VARCHAR(100) NOT NULL,
  `content` TEXT NOT NULL,
  `date_create` DATETIME NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


CREATE TABLE `thaismar_site`.`user` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(100) NULL,
  `username` VARCHAR(100) NOT NULL,
  `password` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

INSERT INTO `thaismar_site`.`user` VALUES (null, 'Administrador', 'admin', '24e7a730ff315b8bb4f013a282b98ebd');