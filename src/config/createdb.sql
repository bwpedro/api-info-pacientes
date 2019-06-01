CREATE DATABASE info_pacientes;

use info_pacientes;

CREATE TABLE `paciente` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nomecompleto` varchar(255) NOT NULL,
  `nomesocial` varchar(255) NOT NULL,
  `nomemae` varchar(255) NOT NULL,
  `nomepai` varchar(255) NOT NULL,
  `nascimento` date NULL,
  `sexo` varchar(255) NOT NULL,
  `rg` varchar(255) NOT NULL UNIQUE,
  `ufrg` varchar(255) NOT NULL,
  `cpf` varchar(255) NOT NULL UNIQUE,
  `email` varchar(255) NOT NULL,
  `datacriacao` datetime NULL,
  `dataalteracao` datetime NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB CHARSET=utf8;

CREATE TABLE `telefone` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `numero` varchar(255) NOT NULL,
  `tipo` varchar(255) NOT NULL,
  `donotelefone` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `dtelefone` (`donotelefone`),
  CONSTRAINT `dtelefone` FOREIGN KEY (`donotelefone`) REFERENCES `paciente` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 CHARSET=utf8;

CREATE TABLE `endereco` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `tipo` varchar(255) NOT NULL,
  `cep` varchar(255) NOT NULL,
  `uf` varchar(255) NOT NULL,
  `cidade` varchar(255) NOT NULL,
  `bairro` varchar(255) NOT NULL,
  `logradouro` varchar(255) NOT NULL,
  `numero` varchar(255) NOT NULL,
  `complemento` varchar(255) NOT NULL,
  `donoendereco` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `dendereco` (`donoendereco`),
  CONSTRAINT `dendereco` FOREIGN KEY (`donoendereco`) REFERENCES `paciente` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 CHARSET=utf8;