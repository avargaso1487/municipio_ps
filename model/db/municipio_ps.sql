-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 23, 2017 at 08:42 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `municipio_ps`
--

-- --------------------------------------------------------

--
-- Table structure for table `permiso`
--

CREATE TABLE IF NOT EXISTS `permiso` (
  `permisoID` int(11) NOT NULL AUTO_INCREMENT,
  `permisoEstado` tinyint(1) NOT NULL,
  `tareaID` int(11) NOT NULL,
  `rolID` int(11) NOT NULL,
  PRIMARY KEY (`permisoID`),
  KEY `tareaID` (`tareaID`),
  KEY `rolID` (`rolID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `persona`
--

CREATE TABLE IF NOT EXISTS `persona` (
  `personaID` int(11) NOT NULL AUTO_INCREMENT,
  `personaDNI` char(8) NOT NULL,
  `personaNombres` varchar(50) NOT NULL,
  `personaApellidos` varchar(100) NOT NULL,
  `personaDireccion` varchar(100) NOT NULL,
  `personaFechaNacimiento` date NOT NULL,
  `personaTelefono` char(9) NOT NULL,
  PRIMARY KEY (`personaID`),
  UNIQUE KEY `personaDNI` (`personaDNI`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `persona`
--

INSERT INTO `persona` (`personaID`, `personaDNI`, `personaNombres`, `personaApellidos`, `personaDireccion`, `personaFechaNacimiento`, `personaTelefono`) VALUES
(1, '12345678', 'Karla', 'Mendoza', 'Dirección', '2017-01-20', '949123456');

-- --------------------------------------------------------

--
-- Table structure for table `rol`
--

CREATE TABLE IF NOT EXISTS `rol` (
  `rolID` int(11) NOT NULL AUTO_INCREMENT,
  `rolDescripcion` varchar(50) NOT NULL,
  `rolNombre` varchar(50) NOT NULL,
  `rolEstado` tinyint(1) NOT NULL,
  PRIMARY KEY (`rolID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `rol`
--

INSERT INTO `rol` (`rolID`, `rolDescripcion`, `rolNombre`, `rolEstado`) VALUES
(1, 'Presidente del Municipio del PS', 'Presidente', 1);

-- --------------------------------------------------------

--
-- Table structure for table `rol_usuario`
--

CREATE TABLE IF NOT EXISTS `rol_usuario` (
  `rolusuarioID` int(11) NOT NULL AUTO_INCREMENT,
  `rolusuarioEstado` tinyint(1) NOT NULL,
  `personaID` int(11) NOT NULL,
  `rolID` int(11) NOT NULL,  
  PRIMARY KEY (`rolusuarioID`),
  KEY `rolID` (`rolID`),
  KEY `personaID` (`personaID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `rol_usuario`
--

INSERT INTO `rol_usuario` (`rolusuarioID`, `rolusuarioEstado`, `personaID`, `rolID`) VALUES
(1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tarea`
--

CREATE TABLE IF NOT EXISTS `tarea` (
  `tareaID` int(11) NOT NULL AUTO_INCREMENT,  
  `tareaNombre` varchar(50) NOT NULL,
  `tareaDescripcion` varchar(50) NOT NULL,
  `tareaIcono` varchar(50) NOT NULL,
  `tareaOrden` int(11) NOT NULL,
  `tareaURL` varchar(50) NOT NULL,
  `tareaEstado` tinyint(1) NOT NULL,
  PRIMARY KEY (`tareaID`)  
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tarea`
--

INSERT INTO `tarea` (`tareaID`, `tareaNombre`, `tareaDescripcion`, `tareaIcono`, `tareaOrden`, `tareaURL`, `tareaEstado`) VALUES
(1, 'Administración', 'Administración del sistema', 'menu-icon fa fa-desktop', 1, '../Administracion/administracion_view.php', 1),
(2, 'Foro', 'Foro de alumnos', 'menu-icon fa fa-pencil-square-o', 2, '../Foro/foroadmin_view.php', 1),
(3, 'Actividades', 'Actividades municipales', 'menu-icon fa fa-calendar', 3, '../Actividades/actividades_view.php', 1),
(4, 'Noticias', 'Noticias municipales', 'menu-icon fa fa-list', 4, '../Noticias/noticias_view.php', 1);

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `personaID` int(11) NOT NULL,
  `usuarioLogin` varchar(50) NOT NULL,
  `usuarioPassword` char(32) NOT NULL,
  `extraordinario` boolean NOT NULL,
  `usuarioEstado` boolean NOT NULL,
  PRIMARY KEY (`personaID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`personaID`, `usuarioLogin`, `usuarioPassword`, `usuarioEstado`) VALUES
(1, 'karlam123', '202cb962ac59075b964b07152d234b70', 1, 1);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `permiso`
--
ALTER TABLE `permiso`
  ADD CONSTRAINT `permiso_ibfk_1` FOREIGN KEY (`tareaID`) REFERENCES `tarea` (`tareaID`),
  ADD CONSTRAINT `permiso_ibfk_2` FOREIGN KEY (`rolID`) REFERENCES `rol` (`rolID`);

--
-- Constraints for table `rol_usuario`
--
ALTER TABLE `rol_usuario`
  ADD CONSTRAINT `rol_usuario_ibfk_1` FOREIGN KEY (`rolID`) REFERENCES `rol` (`rolID`),
  ADD CONSTRAINT `rol_usuario_ibfk_2` FOREIGN KEY (`personaID`) REFERENCES `persona` (`personaID`);

--
-- Constraints for table `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`personaID`) REFERENCES `persona` (`personaID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
