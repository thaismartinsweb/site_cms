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
(null, 'Serviços', 'service', 'code'),
(null, 'Portfolio', 'portfolio', 'desktop'),
(null, 'Galeria de Fotos', 'photogallery', 'camera-retro'),
(null, 'Contatos', 'contact', 'envelope-o'));



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
(null, 'Serviços', 'service'),
(null, 'Portfólio', 'portfolio'),
(null, 'Galeria de Fotos', 'fotos'),
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



CREATE TABLE `cms`.`type_portfolio` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(45) NULL,
  PRIMARY KEY (`id`))
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


INSERT INTO `cms`.`type_portfolio` VALUES
(null, 'DESIGN'),
(null, 'HTML'),
(null, 'CSS'),
(null, 'PHP'),
(null, 'JAVA'),
(null, 'CMS'),
(null, 'ECOMMERCE');



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


CREATE TABLE `cms`.`portfolio` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(100) NULL,
  `site` VARCHAR(100) NULL,
  `description` TEXT NULL,
  `content` TEXT NULL,
  `image` VARCHAR(100) NULL,
  PRIMARY KEY (`id`))
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;



CREATE TABLE `cms`.`type_x_portfolio` (
  `id_type` INT(11) NOT NULL,
  `id_portfolio` INT(11) NOT NULL,
  INDEX `fk_type_x_portfolio_2_idx` (`id_portfolio` ASC),
  PRIMARY KEY (`id_type`, `id_portfolio`),
  CONSTRAINT `fk_type_x_portfolio_1`
    FOREIGN KEY (`id_type`)
    REFERENCES `cms`.`type_portfolio` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_type_x_portfolio_2`
    FOREIGN KEY (`id_portfolio`)
    REFERENCES `cms`.`portfolio` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


CREATE TABLE `cms`.`photo_gallery` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `id_portfolio` INT,
  `title` VARCHAR(100) NOT NULL,
  `image` VARCHAR(100) NULL,
  `description` TEXT NULL,
  `exibition` INT NULL,
  `date_create` DATETIME NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_photo_gallery_1`
  	FOREIGN KEY (`id_portfolio`)
  	REFERENCES `cms`.`portfolio` (`id`)
  	ON DELETE NO ACTION
  	ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;



CREATE TABLE `cms`.`service` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(100) NULL,
  `description` TEXT NULL,
  `content` TEXT NULL,
  `icon` VARCHAR(45) NULL,
  PRIMARY KEY (`id`))
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


CREATE TABLE `cms`.`contact` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(100) NOT NULL,
  `email` VARCHAR(100) NOT NULL,
  `content` TEXT NOT NULL,
  `date_create` DATETIME NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


CREATE TABLE `cms`.`photo_gallery` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `id_portfolio` INT,
  `title` VARCHAR(100) NOT NULL,
  `image` VARCHAR(100) NULL,
  `description` TEXT NULL,
  `exibition` INT NULL,
  `date_create` DATETIME NOT NULL,
  PRIMARY KEY (`id`))
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