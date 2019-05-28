CREATE DATABASE info_pacientes;

use info_pacientes;

CREATE TABLE `paciente` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nomecompleto` varchar(255) NOT NULL DEFAULT '',
  `nomesocial` varchar(255) NOT NULL DEFAULT '',
  `nomemae` varchar(255) NOT NULL DEFAULT '',
  `nomepai` varchar(255) NOT NULL DEFAULT '',
  `nascimento` date DEFAULT NULL,
  `sexo` varchar(255) NOT NULL DEFAULT '',
  `rg` varchar(255) NOT NULL DEFAULT '',
  `ufrg` varchar(255) NOT NULL DEFAULT '',
  `cpf` varchar(255) NOT NULL DEFAULT '',
  `email` varchar(255) NOT NULL DEFAULT '',
  `datacriacao` datetime DEFAULT NULL,
  `dataalteracao` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `telefone` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `numero` varchar(255) NOT NULL DEFAULT '',
  `tipo` varchar(255) NOT NULL DEFAULT '',
  `donotelefone` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `dtelefone` (`donotelefone`),
  CONSTRAINT `dtelefone` FOREIGN KEY (`donotelefone`) REFERENCES `paciente` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

CREATE TABLE `endereco` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `tipo` varchar(255) NOT NULL DEFAULT '',
  `cep` varchar(255) NOT NULL DEFAULT '',
  `uf` varchar(255) NOT NULL DEFAULT '',
  `cidade` varchar(255) NOT NULL DEFAULT '',
  `bairro` varchar(255) NOT NULL DEFAULT '',
  `logradouro` varchar(255) NOT NULL DEFAULT '',
  `numero` varchar(255) NOT NULL DEFAULT '',
  `complemento` varchar(255) NOT NULL DEFAULT '',
  `donoendereco` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `dendereco` (`donoendereco`),
  CONSTRAINT `dendereco` FOREIGN KEY (`donoendereco`) REFERENCES `paciente` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;