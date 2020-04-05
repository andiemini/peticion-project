-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 05, 2020 at 08:56 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `peticion`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `adminLogin` (IN `IDadmin` INT, IN `userAdmin` VARCHAR(32), IN `adminPass` VARCHAR(32))  BEGIN
SELECT adminId FROM admins WHERE adminUser = userAdmin AND adminPassword = adminPass;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `banner` ()  BEGIN
SELECT * FROM banner;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `createPetitions` (IN `titulliPetition` VARCHAR(64), IN `kategoriPetition` INT, IN `mesazhiPetition` TEXT, IN `link` VARCHAR(128), IN `authorPetition` VARCHAR(50), IN `dataPetition` DATE)  BEGIN 
INSERT INTO petitions (Titulli, Kategori, Mesazhi, Attachment,Autori, petitions.Data) VALUES (titulliPetition,kategoriPetition,mesazhiPetition,link,authorPetition, dataPetition);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `deleteFooterReferencat` (IN `id` INT)  BEGIN
DELETE FROM footermenu WHERE ID_Menu = id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `deleteKategori` (IN `id` INT)  BEGIN
DELETE FROM kategori WHERE kategoriId = id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `deleteMenuAdm` (IN `id` INT)  BEGIN
DELETE FROM mainmenuadm WHERE ID_Menu = id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `deleteMenuUser` (IN `id` INT)  BEGIN
DELETE FROM mainmenu WHERE ID_Menu = id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `deletePetition` (IN `id` INT)  BEGIN
DELETE FROM petitions WHERE peticionId = id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `deleteUsers` (IN `id` INT)  BEGIN
DELETE FROM users WHERE userId = id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `footerInsert` (IN `emrimenu` VARCHAR(50), IN `linkmenu` VARCHAR(50))  BEGIN
INSERT INTO footermenu (Emri_Menu,Link) VALUES (emrimenu,linkmenu); 
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `footerReferencat` ()  BEGIN
SELECT * FROM footermenu;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `headerImages` (IN `headerCategory` VARCHAR(50))  BEGIN
SELECT * FROM images WHERE Category = headerCategory;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `kategoriInsert` (IN `emrikategorise` VARCHAR(32))  BEGIN
INSERT INTO kategori (kategoriTitle) VALUES (emrikategorise); 
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `logo` ()  BEGIN
SELECT * FROM logo;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `menuAdmInsert` (IN `emrimenu` VARCHAR(50), IN `linkmenu` VARCHAR(50))  BEGIN
INSERT INTO mainmenuadm (Emri_Menu,Link) VALUES (emrimenu,linkmenu); 
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `menuUserInsert` (IN `emriMenu` VARCHAR(32), IN `linkMenu` VARCHAR(52))  BEGIN
INSERT INTO mainmenu (Emri_Menu,Link) VALUES (emriMenu, linkMenu); 
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `registerUser` (IN `emriUser` VARCHAR(32), IN `emailUser` VARCHAR(32), IN `passwordUser` VARCHAR(100))  BEGIN
INSERT INTO users(emri,email,password) VALUES (emriUser,emailUser,passwordUser);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `searchPetition` (IN `search` VARCHAR(20))  BEGIN
SELECT petitions.peticionId,petitions.Titulli,petitions.Autori,petitions.Data,kategori.kategoriTitle FROM petitions LEFT OUTER JOIN kategori  ON petitions.Kategori=kategori.kategoriId WHERE Titulli LIKE CONCAT('%',search,'%');
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `selectadminlogin` (IN `Id` INT)  BEGIN
SELECT adminUser FROM admins WHERE adminId = id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `selectAllPetitions` (IN `id` INT)  BEGIN
SELECT * FROM petitions LEFT OUTER JOIN kategori ON petitions.Kategori=kategori.kategoriId WHERE petitionsId = id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `selectAutori` (IN `autoriUser` VARCHAR(50))  BEGIN
SELECT * FROM petitions WHERE Autori = autoriUser;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `selectBanner` ()  BEGIN
SELECT * FROM banner;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `selectFooterMenu` (IN `Idmenu` INT)  BEGIN
SELECT * FROM footermenu WHERE ID_Menu = Idmenu;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `selectIndexPost` (IN `nr` INT)  BEGIN
SELECT * FROM petitions LEFT OUTER JOIN kategori ON petitions.Kategori=kategori.kategoriId ORDER BY peticionId  DESC LIMIT nr,5;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `selectKategori` ()  BEGIN
SELECT * FROM kategori;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `selectKategoriUpdate` (IN `Idkategori` INT)  BEGIN
SELECT * FROM kategori WHERE kategoriId = Idkategori;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `selectMenuAdm` ()  BEGIN
SELECT * FROM mainmenuadm;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `selectMenuAdmUpdate` (IN `Idmenu` INT)  BEGIN
SELECT * FROM mainmenuadm WHERE ID_Menu = Idmenu;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `selectMenuUser` ()  BEGIN
SELECT * FROM `mainmenu`;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `selectMenuUserUpdate` (IN `Idmenu` INT)  BEGIN
SELECT * FROM mainmenu WHERE ID_Menu = Idmenu;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `selectPeticionPergjigjje` (IN `id` INT)  BEGIN
SELECT * FROM petitions WHERE peticionId = id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `selectPetitions` ()  BEGIN
SELECT * FROM petitions;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `selectPostsSigned` (IN `Id` INT)  BEGIN
SELECT COUNT(*) as signed FROM signedpetitions WHERE Id_Petition = id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `selectsignedPetition` (IN `usrId` INT, IN `petId` INT)  BEGIN
SELECT * FROM signedpetitions WHERE Id_Petition=petId AND Id_User = usrId;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `selectUsers` ()  BEGIN
SELECT * FROM users;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `selectUsersUpdate` (IN `Iduser` INT)  BEGIN
SELECT * FROM users WHERE userId = Iduser;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `signPetition` (IN `usrId` INT, IN `petId` INT)  BEGIN
INSERT INTO signedpetitions(Id_User,Id_Petition) VALUES (usrId,petId);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updatebanner1` (IN `maintext1` TEXT, IN `maintagline1` TEXT)  BEGIN
UPDATE banner SET main_text = maintext1, main_tagline = maintagline1;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updatebanner2` (IN `maintext2` TEXT, IN `maintagline2` TEXT)  BEGIN 
UPDATE banner SET main_text2 = maintext2, main_tagline2 = maintagline2; 
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updatebanner3` (IN `maintext3` TEXT, IN `maintagline3` TEXT)  BEGIN 
UPDATE banner SET main_text3 = maintext3, main_tagline3 = maintagline3; 
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updateFooterReferencat` (IN `emrimenu` VARCHAR(50), IN `menulink` VARCHAR(100), IN `id` INT)  BEGIN
UPDATE footermenu SET Emri_Menu = emrimenu, Link = menulink WHERE ID_Menu=id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updateImages` (IN `imagePost` TEXT, IN `imageCategory` VARCHAR(50))  BEGIN
UPDATE images SET post_image = imagePost WHERE Category = imageCategory;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updateKategori` (IN `emrikategori` VARCHAR(32), IN `id` INT)  BEGIN
UPDATE kategori SET kategoriTitle = emrikategori WHERE kategoriId =id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updateLogo` (IN `logoTitulli` VARCHAR(32))  BEGIN
UPDATE logo SET logoTitle = logoTitulli;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updateMenuAdm` (IN `emrimenuadm` VARCHAR(50), IN `menulinkadm` VARCHAR(100), IN `idadm` INT)  BEGIN
UPDATE mainmenuadm SET Emri_Menu = emrimenuadm, Link = menulinkadm WHERE ID_Menu=idadm;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updateMenuUser` (IN `emrimenu` VARCHAR(50), IN `menulink` VARCHAR(100), IN `id` INT)  BEGIN
UPDATE mainmenu SET Emri_Menu = emrimenu, Link = menulink WHERE ID_Menu=id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updateMyPetitions` (IN `titulliPeticion` VARCHAR(64), IN `kategoriPeticion` INT, IN `mesazhiPeticion` TEXT, IN `attachPeticion` VARCHAR(128), IN `idPeticion` INT)  BEGIN
UPDATE petitions SET Titulli = titulliPeticion, Kategori = kategoriPeticion, Mesazhi = mesazhiPeticion, Attachment = attachPeticion  WHERE peticionId = idPeticion;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updatePergjigjja` (IN `answ` TEXT, IN `id` INT)  BEGIN
UPDATE petitions SET Pergjigjja = answ WHERE peticionId = id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updateUsers` (IN `useremri` VARCHAR(32), IN `useremail` VARCHAR(32), IN `iduser` INT)  BEGIN
UPDATE users SET emri = useremri, email = useremail WHERE userId = iduser;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `userEmail` (IN `Id` INT)  BEGIN
SELECT email FROM users WHERE userId= id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `userLogin` (IN `Iduser` INT, IN `emailUser` VARCHAR(32), IN `passwordUser` VARCHAR(32))  BEGIN
SELECT userId FROM users WHERE email =emailUser AND password = passwordUser;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `adminId` int(11) NOT NULL,
  `adminUser` varchar(32) NOT NULL,
  `adminPassword` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`adminId`, `adminUser`, `adminPassword`) VALUES
(1, 'admin', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `main_text_id` int(11) NOT NULL,
  `main_text` text NOT NULL,
  `main_tagline` text NOT NULL,
  `main_text2` text NOT NULL,
  `main_tagline2` text NOT NULL,
  `main_text3` text NOT NULL,
  `main_tagline3` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`main_text_id`, `main_text`, `main_tagline`, `main_text2`, `main_tagline2`, `main_text3`, `main_tagline3`) VALUES
(1, 'Ne synojmÃ« pÃ«r filozofinÃ« qÃ« qeveria i pÃ«rgjigjet kur njerÃ«zit pyesin.', 'Komunikim i drejtpÃ«rdrejtÃ« me Qytetaret', 'PÃ«r zgjedhjen e Ã§Ã«shtjeve kombÃ«tare u mblodhÃ«n zÃ«rat e shumicÃ«s sÃ« njerÃ«zve', 'NÃ«se do tÃ« bÃ«hen pÃ«r mÃ« shumÃ« se 20,000 rekomandime pÃ«r 30 ditÃ«. Shefi i qeverisÃ« dhe Kuvendi Qeveritar(shefi i secilit departament dhe agjensi, shefi dhe sekretari i presidentit, ndihmÃ«s, etj.) Do tÃ« pÃ«rgjigjen.', 'Ku mund ti shikoj pergjigjjet e peticioneve?', 'PÃ«rgjigjet e peticionit publik mund tÃ« gjenden nÃ« faqen e internetit tÃ« Peticion Kombtar> Login > Peticionet tuaja ose Twitter dhe rrjetet e tjera sociale, Facebook, YouTube etj.');

-- --------------------------------------------------------

--
-- Table structure for table `footermenu`
--

CREATE TABLE `footermenu` (
  `ID_Menu` int(11) NOT NULL,
  `Emri_Menu` varchar(32) NOT NULL,
  `Link` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `footermenu`
--

INSERT INTO `footermenu` (`ID_Menu`, `Emri_Menu`, `Link`) VALUES
(1, 'Theme i perdorur', 'https://colorlib.com/preview/#careers'),
(2, 'Licensa', 'https://colorlib.com/wp/licence/'),
(3, 'Foto te perdorura', 'https://www.pexels.com/'),
(4, 'Foto ne folder ', 'https://unsplash.com/'),
(5, 'Teksti i perdorur', 'https://loremipsum.io/');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `ID_Img` int(11) NOT NULL,
  `post_image` text NOT NULL,
  `logo` text NOT NULL,
  `Category` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`ID_Img`, `post_image`, `logo`, `Category`) VALUES
(1, 'group-of-people-in-building-structure-2100942.jpg', '', 'HeaderImage');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `kategoriId` int(11) NOT NULL,
  `kategoriTitle` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`kategoriId`, `kategoriTitle`) VALUES
(1, 'Biznes'),
(2, 'Teknologji'),
(3, 'Institucion Qeveritar'),
(4, 'Gjenerale'),
(5, 'shendetsi'),
(6, 'Transport'),
(7, 'Arsim / Edukim'),
(8, 'Pune'),
(9, 'Ekonomi'),
(10, 'Kulture'),
(11, 'Kafshe'),
(12, 'Tjeter');

-- --------------------------------------------------------

--
-- Table structure for table `logo`
--

CREATE TABLE `logo` (
  `logoId` int(11) NOT NULL,
  `logoTitle` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logo`
--

INSERT INTO `logo` (`logoId`, `logoTitle`) VALUES
(1, 'Peticioni KombÃ«tar');

-- --------------------------------------------------------

--
-- Table structure for table `mainmenu`
--

CREATE TABLE `mainmenu` (
  `ID_Menu` int(11) NOT NULL,
  `Emri_Menu` varchar(32) NOT NULL,
  `Link` varchar(52) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mainmenu`
--

INSERT INTO `mainmenu` (`ID_Menu`, `Emri_Menu`, `Link`) VALUES
(1, 'Peticionet e juaja', 'user.php'),
(8, 'Krijo peticion', 'createpetition.php');

-- --------------------------------------------------------

--
-- Table structure for table `mainmenuadm`
--

CREATE TABLE `mainmenuadm` (
  `ID_Menu` int(11) NOT NULL,
  `Emri_Menu` varchar(32) NOT NULL,
  `Link` varchar(51) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mainmenuadm`
--

INSERT INTO `mainmenuadm` (`ID_Menu`, `Emri_Menu`, `Link`) VALUES
(1, 'Paneli i Administrimit', 'admin.php'),
(3, 'Peticionet', 'petitions.php'),
(4, 'Perdoruesit', 'users.php'),
(5, 'Menaxhimi i Menu', 'menu.php');

-- --------------------------------------------------------

--
-- Table structure for table `petitions`
--

CREATE TABLE `petitions` (
  `peticionId` int(11) NOT NULL,
  `Titulli` varchar(64) NOT NULL,
  `Autori` varchar(50) NOT NULL,
  `Mesazhi` text NOT NULL,
  `Attachment` varchar(128) NOT NULL,
  `Data` date NOT NULL,
  `Pergjigjja` text NOT NULL,
  `Kategori` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `petitions`
--

INSERT INTO `petitions` (`peticionId`, `Titulli`, `Autori`, `Mesazhi`, `Attachment`, `Data`, `Pergjigjja`, `Kategori`) VALUES
(27, 'Lorem ipsum dolor sit amet', 'user@user.com', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut porttitor leo a diam. Eu augue ut lectus arcu bibendum at varius. Ultrices vitae auctor eu augue ut lectus arcu bibendum. Tristique sollicitudin nibh sit amet commodo nulla facilisi nullam vehicula. Massa tincidunt nunc pulvinar sapien et ligula ullamcorper. Eleifend quam adipiscing vitae proin. Pharetra vel turpis nunc eget lorem dolor sed viverra. Habitasse platea dictumst vestibulum rhoncus est pellentesque. Nisl vel pretium lectus quam. Non sodales neque sodales ut etiam sit amet nisl. Viverra justo nec ultrices dui.\r\n\r\nVulputate odio ut enim blandit volutpat maecenas volutpat. Odio pellentesque diam volutpat commodo sed egestas. Felis donec et odio pellentesque diam. Interdum velit laoreet id donec ultrices tincidunt arcu non. Sapien nec sagittis aliquam malesuada bibendum arcu vitae elementum curabitur. Sollicitudin aliquam ultrices sagittis orci a scelerisque. Nec feugiat in fermentum posuere urna nec tincidunt praesent semper. Ipsum a arcu cursus vitae congue mauris. Gravida in fermentum et sollicitudin ac orci phasellus egestas tellus. Imperdiet massa tincidunt nunc pulvinar sapien. Fermentum posuere urna nec tincidunt praesent. Semper quis lectus nulla at volutpat diam ut venenatis tellus. Eu turpis egestas pretium aenean pharetra. Adipiscing elit duis tristique sollicitudin nibh sit amet commodo. Sed sed risus pretium quam vulputate dignissim suspendisse in. Ridiculus mus mauris vitae ultricies leo integer.', 'loremipsum.io', '2019-12-26', '', 1),
(28, 'Sem viverra aliquet eget sit amet tellus cras adipiscing enim', 'imnayeon@pt.com', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Sed elementum tempus egestas sed sed risus pretium quam vulputate. Parturient montes nascetur ridiculus mus mauris. Scelerisque in dictum non consectetur a erat nam at. Integer vitae justo eget magna. Sem viverra aliquet eget sit amet tellus cras adipiscing enim. Viverra tellus in hac habitasse platea dictumst vestibulum rhoncus est. Varius morbi enim nunc faucibus a pellentesque sit. Maecenas sed enim ut sem viverra aliquet eget sit. Condimentum mattis pellentesque id nibh tortor. Enim praesent elementum facilisis leo vel.', 'loremipsum.io', '2019-12-26', '', 2),
(29, 'Auctor eu augue ut lectus arcu bibendum at varius', 'jeong@pt.com', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Auctor eu augue ut lectus arcu bibendum at varius. Feugiat scelerisque varius morbi enim nunc faucibus a pellentesque sit. Vitae congue mauris rhoncus aenean vel elit scelerisque mauris. Tortor aliquam nulla facilisi cras fermentum. Et ligula ullamcorper malesuada proin libero nunc consequat interdum varius. Maecenas accumsan lacus vel facilisis volutpat est velit egestas dui. Eget arcu dictum varius duis. Viverra mauris in aliquam sem fringilla ut morbi tincidunt. Nunc aliquet bibendum enim facilisis gravida neque convallis a.', 'loremipsum.io', '2019-12-26', '', 3),
(30, 'Urna duis convallis convallis tellus id. Id ornare arcu odio ut ', 'momo@pt.com', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Urna duis convallis convallis tellus id. Id ornare arcu odio ut sem nulla. Tempus imperdiet nulla malesuada pellentesque. Vitae congue mauris rhoncus aenean vel elit scelerisque. Eros in cursus turpis massa tincidunt dui ut ornare lectus. Eu ultrices vitae auctor eu augue ut lectus arcu bibendum. Mauris commodo quis imperdiet massa tincidunt nunc pulvinar. At tellus at urna condimentum mattis pellentesque id nibh tortor. In nibh mauris cursus mattis molestie a iaculis at erat. Neque egestas congue quisque egestas. Donec et odio pellentesque diam volutpat commodo sed. Ipsum a arcu cursus vitae congue mauris rhoncus aenean. Eget dolor morbi non arcu. Amet venenatis urna cursus eget. Amet est placerat in egestas erat imperdiet sed euismod nisi. Urna molestie at elementum eu facilisis sed odio morbi quis. Viverra nibh cras pulvinar mattis nunc. Massa tincidunt nunc pulvinar sapien et ligula.', 'loremipsum.io', '2019-12-26', '', 4),
(31, ' Mauris pharetra et ultrices neque ornare aenean euismod element', 'sana@pt.com', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Mauris pharetra et ultrices neque ornare aenean euismod elementum nisi. Aliquam ultrices sagittis orci a. A iaculis at erat pellentesque adipiscing. Egestas purus viverra accumsan in nisl nisi scelerisque eu. Arcu non sodales neque sodales ut etiam. Magna ac placerat vestibulum lectus mauris ultrices eros in. Urna nunc id cursus metus aliquam eleifend mi in. Odio tempor orci dapibus ultrices in iaculis. Blandit turpis cursus in hac habitasse platea dictumst quisque. Malesuada nunc vel risus commodo viverra maecenas accumsan. Rhoncus dolor purus non enim praesent elementum. Volutpat blandit aliquam etiam erat velit scelerisque in. Pretium vulputate sapien nec sagittis aliquam malesuada bibendum arcu. Commodo elit at imperdiet dui accumsan. Semper auctor neque vitae tempus quam. Venenatis tellus in metus vulputate eu scelerisque felis. Et egestas quis ipsum suspendisse ultrices gravida dictum fusce ut.', 'loremipsum.io', '2019-12-26', '', 5),
(32, 'Lobortis feugiat vivamus at augue eget arcu dictum', 'jihyo@pt.com', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lobortis feugiat vivamus at augue eget arcu dictum. Ac turpis egestas sed tempus urna et pharetra pharetra. Integer vitae justo eget magna fermentum iaculis. Nunc sed augue lacus viverra vitae. Nibh tellus molestie nunc non blandit massa. Risus quis varius quam quisque id diam. Urna et pharetra pharetra massa. Sed risus ultricies tristique nulla aliquet enim tortor. Porttitor eget dolor morbi non arcu risus quis varius. Posuere morbi leo urna molestie at elementum eu facilisis sed. Varius sit amet mattis vulputate enim nulla aliquet. Tellus pellentesque eu tincidunt tortor aliquam nulla facilisi cras. Turpis cursus in hac habitasse platea dictumst. Adipiscing bibendum est ultricies integer quis auctor elit sed. Convallis a cras semper auctor neque. Aliquet sagittis id consectetur purus ut faucibus. Nibh nisl condimentum id venenatis a condimentum vitae. In nulla posuere sollicitudin aliquam ultrices sagittis orci.', 'loremipsum.io', '2019-12-26', '', 6),
(33, 'Tristique senectus et netus et malesuada fames ac turpis', 'mina@pt.com', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Tristique senectus et netus et malesuada fames ac turpis. Tellus rutrum tellus pellentesque eu tincidunt. Donec pretium vulputate sapien nec sagittis. Nunc vel risus commodo viverra. Nulla aliquet enim tortor at auctor urna nunc id cursus. Ipsum faucibus vitae aliquet nec. Ridiculus mus mauris vitae ultricies leo integer malesuada nunc. Id nibh tortor id aliquet lectus proin. In hac habitasse platea dictumst vestibulum. Vestibulum lectus mauris ultrices eros in. Netus et malesuada fames ac turpis egestas sed tempus. Arcu non odio euismod lacinia. Aenean et tortor at risus. Non odio euismod lacinia at quis risus sed vulputate odio.', 'loremipsum.io', '2019-12-26', '', 7),
(34, 'Neque vitae tempus quam pellentesque nec nam aliquam sem', 'dahyun@pt.com', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Neque vitae tempus quam pellentesque nec nam aliquam sem. Enim diam vulputate ut pharetra sit. Consectetur lorem donec massa sapien faucibus et molestie ac. Dictumst vestibulum rhoncus est pellentesque elit ullamcorper dignissim cras. Porta nibh venenatis cras sed felis eget. Pellentesque massa placerat duis ultricies lacus sed turpis tincidunt. Ultricies mi eget mauris pharetra et ultrices neque. Tortor pretium viverra suspendisse potenti. Ut tortor pretium viverra suspendisse potenti nullam ac. Fringilla ut morbi tincidunt augue. Nisl nunc mi ipsum faucibus. Odio ut enim blandit volutpat maecenas volutpat blandit. Mollis aliquam ut porttitor leo a diam sollicitudin tempor id. Urna cursus eget nunc scelerisque viverra mauris in aliquam. Tellus orci ac auctor augue mauris augue. Ut aliquam purus sit amet luctus venenatis lectus magna. Eu lobortis elementum nibh tellus molestie nunc.', 'loremipsum.io', '2019-12-26', '', 8),
(35, 'Cras pulvinar mattis nunc sed blandit libero volutpat', 'chaeng@pt.com', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Cras pulvinar mattis nunc sed blandit libero volutpat. Eget nullam non nisi est. Sit amet dictum sit amet justo donec enim. Eu volutpat odio facilisis mauris sit amet massa vitae. Sed cras ornare arcu dui vivamus arcu. Nec feugiat in fermentum posuere urna nec tincidunt praesent semper. Viverra nam libero justo laoreet sit amet cursus. Sed augue lacus viverra vitae congue eu consequat ac. Eu ultrices vitae auctor eu augue ut lectus arcu bibendum. Egestas dui id ornare arcu odio ut. Sapien et ligula ullamcorper malesuada. Nibh praesent tristique magna sit amet purus gravida quis. Malesuada nunc vel risus commodo viverra. Integer feugiat scelerisque varius morbi enim.', 'loremipsum.io', '2019-12-26', '', 9),
(36, 'Lacus sed turpis tincidunt id aliquet. Orci ac auctor augue maur', 'tzuyu@pt.com', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lacus sed turpis tincidunt id aliquet. Orci ac auctor augue mauris augue neque. Diam quis enim lobortis scelerisque fermentum dui faucibus in. Morbi tristique senectus et netus et malesuada fames. Varius vel pharetra vel turpis. Eu augue ut lectus arcu bibendum at varius vel pharetra. Curabitur gravida arcu ac tortor dignissim convallis. Morbi leo urna molestie at elementum eu facilisis. Lacus vel facilisis volutpat est velit. Quis viverra nibh cras pulvinar mattis nunc sed blandit libero.', 'loremipsum.io', '2019-12-26', '', 12);

--
-- Triggers `petitions`
--
DELIMITER $$
CREATE TRIGGER `insertPetitions` AFTER INSERT ON `petitions` FOR EACH ROW BEGIN
INSERT INTO trigger_insert_petitions (peticionId,Titulli,Kategori,Pergjigjja,Autori,Mesazhi,Attachment,trigger_insert_petitions.Data,Data_Insert) VALUES (NEW.peticionId,NEW.Titulli,NEW.Kategori,NEW.Pergjigjja,NEW.Autori,NEW.Mesazhi,NEW.Attachment,NEW.Data,NOW());
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `signedpetitions`
--

CREATE TABLE `signedpetitions` (
  `Id_Sp` int(11) NOT NULL,
  `Id_User` int(11) NOT NULL,
  `Id_Petition` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `trigger_insert_petitions`
--

CREATE TABLE `trigger_insert_petitions` (
  `ID_Trigger_Insert` int(11) NOT NULL,
  `peticionId` int(11) NOT NULL,
  `Titulli` varchar(64) NOT NULL,
  `Autori` varchar(50) NOT NULL,
  `Mesazhi` text NOT NULL,
  `Attachment` varchar(128) NOT NULL,
  `Data` date NOT NULL,
  `Pergjigjja` text,
  `Kategori` int(11) NOT NULL,
  `Data_Insert` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trigger_insert_petitions`
--

INSERT INTO `trigger_insert_petitions` (`ID_Trigger_Insert`, `peticionId`, `Titulli`, `Autori`, `Mesazhi`, `Attachment`, `Data`, `Pergjigjja`, `Kategori`, `Data_Insert`) VALUES
(1, 20, 'dasd', 'sadad', 'asdasd', 'asdsad', '2019-12-12', '', 2, '2019-12-24 14:33:21'),
(2, 21, 'hey1111111122334455', 'en@gmail.com', '123', '123.com', '2019-12-24', '', 1, '2019-12-24 17:41:40'),
(3, 22, 'test test test test ', 'en@gmail.com', '21aasd', '222.com', '2019-12-24', '', 2, '2019-12-24 17:41:51'),
(4, 23, 'Test2', 'en@gmail.com', '12356789sadd', 'dasd.dead', '2019-12-24', '', 1, '2019-12-24 17:42:08'),
(5, 24, 'kkkkk1', 'en@gmail.com', 'kkkkk1', '123.com', '2019-12-24', '', 1, '2019-12-24 17:42:18'),
(6, 25, 'hey1111111122334455', 'en@gmail.com', 'asd', '1', '2019-12-25', '', 1, '2019-12-25 18:36:16'),
(7, 25, 'test test test test ', 'en@gmail.com', 'test', 'test.com', '2019-12-25', '', 2, '2019-12-25 23:35:43'),
(8, 26, 'hey1111111122334455', 'en@gmail.com', 'a', 'a.com', '2019-12-26', '', 2, '2019-12-26 13:16:06'),
(9, 27, 'Lorem ipsum dolor sit amet', 'user@user.com', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut porttitor leo a diam. Eu augue ut lectus arcu bibendum at varius. Ultrices vitae auctor eu augue ut lectus arcu bibendum. Tristique sollicitudin nibh sit amet commodo nulla facilisi nullam vehicula. Massa tincidunt nunc pulvinar sapien et ligula ullamcorper. Eleifend quam adipiscing vitae proin. Pharetra vel turpis nunc eget lorem dolor sed viverra. Habitasse platea dictumst vestibulum rhoncus est pellentesque. Nisl vel pretium lectus quam. Non sodales neque sodales ut etiam sit amet nisl. Viverra justo nec ultrices dui.\r\n\r\nVulputate odio ut enim blandit volutpat maecenas volutpat. Odio pellentesque diam volutpat commodo sed egestas. Felis donec et odio pellentesque diam. Interdum velit laoreet id donec ultrices tincidunt arcu non. Sapien nec sagittis aliquam malesuada bibendum arcu vitae elementum curabitur. Sollicitudin aliquam ultrices sagittis orci a scelerisque. Nec feugiat in fermentum posuere urna nec tincidunt praesent semper. Ipsum a arcu cursus vitae congue mauris. Gravida in fermentum et sollicitudin ac orci phasellus egestas tellus. Imperdiet massa tincidunt nunc pulvinar sapien. Fermentum posuere urna nec tincidunt praesent. Semper quis lectus nulla at volutpat diam ut venenatis tellus. Eu turpis egestas pretium aenean pharetra. Adipiscing elit duis tristique sollicitudin nibh sit amet commodo. Sed sed risus pretium quam vulputate dignissim suspendisse in. Ridiculus mus mauris vitae ultricies leo integer.', 'loremipsum.io', '2019-12-26', '', 1, '2019-12-26 17:54:22'),
(10, 28, 'Sem viverra aliquet eget sit amet tellus cras adipiscing enim', 'imnayeon@pt.com', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Sed elementum tempus egestas sed sed risus pretium quam vulputate. Parturient montes nascetur ridiculus mus mauris. Scelerisque in dictum non consectetur a erat nam at. Integer vitae justo eget magna. Sem viverra aliquet eget sit amet tellus cras adipiscing enim. Viverra tellus in hac habitasse platea dictumst vestibulum rhoncus est. Varius morbi enim nunc faucibus a pellentesque sit. Maecenas sed enim ut sem viverra aliquet eget sit. Condimentum mattis pellentesque id nibh tortor. Enim praesent elementum facilisis leo vel.', 'loremipsum.io', '2019-12-26', '', 2, '2019-12-26 17:56:23'),
(11, 29, 'Auctor eu augue ut lectus arcu bibendum at varius', 'jeong@pt.com', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Auctor eu augue ut lectus arcu bibendum at varius. Feugiat scelerisque varius morbi enim nunc faucibus a pellentesque sit. Vitae congue mauris rhoncus aenean vel elit scelerisque mauris. Tortor aliquam nulla facilisi cras fermentum. Et ligula ullamcorper malesuada proin libero nunc consequat interdum varius. Maecenas accumsan lacus vel facilisis volutpat est velit egestas dui. Eget arcu dictum varius duis. Viverra mauris in aliquam sem fringilla ut morbi tincidunt. Nunc aliquet bibendum enim facilisis gravida neque convallis a.', 'loremipsum.io', '2019-12-26', '', 3, '2019-12-26 17:56:59'),
(12, 30, 'Urna duis convallis convallis tellus id. Id ornare arcu odio ut ', 'momo@pt.com', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Urna duis convallis convallis tellus id. Id ornare arcu odio ut sem nulla. Tempus imperdiet nulla malesuada pellentesque. Vitae congue mauris rhoncus aenean vel elit scelerisque. Eros in cursus turpis massa tincidunt dui ut ornare lectus. Eu ultrices vitae auctor eu augue ut lectus arcu bibendum. Mauris commodo quis imperdiet massa tincidunt nunc pulvinar. At tellus at urna condimentum mattis pellentesque id nibh tortor. In nibh mauris cursus mattis molestie a iaculis at erat. Neque egestas congue quisque egestas. Donec et odio pellentesque diam volutpat commodo sed. Ipsum a arcu cursus vitae congue mauris rhoncus aenean. Eget dolor morbi non arcu. Amet venenatis urna cursus eget. Amet est placerat in egestas erat imperdiet sed euismod nisi. Urna molestie at elementum eu facilisis sed odio morbi quis. Viverra nibh cras pulvinar mattis nunc. Massa tincidunt nunc pulvinar sapien et ligula.', 'loremipsum.io', '2019-12-26', '', 4, '2019-12-26 17:57:38'),
(13, 31, ' Mauris pharetra et ultrices neque ornare aenean euismod element', 'sana@pt.com', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Mauris pharetra et ultrices neque ornare aenean euismod elementum nisi. Aliquam ultrices sagittis orci a. A iaculis at erat pellentesque adipiscing. Egestas purus viverra accumsan in nisl nisi scelerisque eu. Arcu non sodales neque sodales ut etiam. Magna ac placerat vestibulum lectus mauris ultrices eros in. Urna nunc id cursus metus aliquam eleifend mi in. Odio tempor orci dapibus ultrices in iaculis. Blandit turpis cursus in hac habitasse platea dictumst quisque. Malesuada nunc vel risus commodo viverra maecenas accumsan. Rhoncus dolor purus non enim praesent elementum. Volutpat blandit aliquam etiam erat velit scelerisque in. Pretium vulputate sapien nec sagittis aliquam malesuada bibendum arcu. Commodo elit at imperdiet dui accumsan. Semper auctor neque vitae tempus quam. Venenatis tellus in metus vulputate eu scelerisque felis. Et egestas quis ipsum suspendisse ultrices gravida dictum fusce ut.', 'loremipsum.io', '2019-12-26', '', 5, '2019-12-26 17:58:05'),
(14, 32, 'Lobortis feugiat vivamus at augue eget arcu dictum', 'jihyo@pt.com', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lobortis feugiat vivamus at augue eget arcu dictum. Ac turpis egestas sed tempus urna et pharetra pharetra. Integer vitae justo eget magna fermentum iaculis. Nunc sed augue lacus viverra vitae. Nibh tellus molestie nunc non blandit massa. Risus quis varius quam quisque id diam. Urna et pharetra pharetra massa. Sed risus ultricies tristique nulla aliquet enim tortor. Porttitor eget dolor morbi non arcu risus quis varius. Posuere morbi leo urna molestie at elementum eu facilisis sed. Varius sit amet mattis vulputate enim nulla aliquet. Tellus pellentesque eu tincidunt tortor aliquam nulla facilisi cras. Turpis cursus in hac habitasse platea dictumst. Adipiscing bibendum est ultricies integer quis auctor elit sed. Convallis a cras semper auctor neque. Aliquet sagittis id consectetur purus ut faucibus. Nibh nisl condimentum id venenatis a condimentum vitae. In nulla posuere sollicitudin aliquam ultrices sagittis orci.', 'loremipsum.io', '2019-12-26', '', 6, '2019-12-26 17:58:46'),
(15, 33, 'Tristique senectus et netus et malesuada fames ac turpis', 'mina@pt.com', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Tristique senectus et netus et malesuada fames ac turpis. Tellus rutrum tellus pellentesque eu tincidunt. Donec pretium vulputate sapien nec sagittis. Nunc vel risus commodo viverra. Nulla aliquet enim tortor at auctor urna nunc id cursus. Ipsum faucibus vitae aliquet nec. Ridiculus mus mauris vitae ultricies leo integer malesuada nunc. Id nibh tortor id aliquet lectus proin. In hac habitasse platea dictumst vestibulum. Vestibulum lectus mauris ultrices eros in. Netus et malesuada fames ac turpis egestas sed tempus. Arcu non odio euismod lacinia. Aenean et tortor at risus. Non odio euismod lacinia at quis risus sed vulputate odio.', 'loremipsum.io', '2019-12-26', '', 7, '2019-12-26 17:59:20'),
(16, 34, 'Neque vitae tempus quam pellentesque nec nam aliquam sem', 'dahyun@pt.com', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Neque vitae tempus quam pellentesque nec nam aliquam sem. Enim diam vulputate ut pharetra sit. Consectetur lorem donec massa sapien faucibus et molestie ac. Dictumst vestibulum rhoncus est pellentesque elit ullamcorper dignissim cras. Porta nibh venenatis cras sed felis eget. Pellentesque massa placerat duis ultricies lacus sed turpis tincidunt. Ultricies mi eget mauris pharetra et ultrices neque. Tortor pretium viverra suspendisse potenti. Ut tortor pretium viverra suspendisse potenti nullam ac. Fringilla ut morbi tincidunt augue. Nisl nunc mi ipsum faucibus. Odio ut enim blandit volutpat maecenas volutpat blandit. Mollis aliquam ut porttitor leo a diam sollicitudin tempor id. Urna cursus eget nunc scelerisque viverra mauris in aliquam. Tellus orci ac auctor augue mauris augue. Ut aliquam purus sit amet luctus venenatis lectus magna. Eu lobortis elementum nibh tellus molestie nunc.', 'loremipsum.io', '2019-12-26', '', 8, '2019-12-26 17:59:53'),
(17, 35, 'Cras pulvinar mattis nunc sed blandit libero volutpat', 'chaeng@pt.com', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Cras pulvinar mattis nunc sed blandit libero volutpat. Eget nullam non nisi est. Sit amet dictum sit amet justo donec enim. Eu volutpat odio facilisis mauris sit amet massa vitae. Sed cras ornare arcu dui vivamus arcu. Nec feugiat in fermentum posuere urna nec tincidunt praesent semper. Viverra nam libero justo laoreet sit amet cursus. Sed augue lacus viverra vitae congue eu consequat ac. Eu ultrices vitae auctor eu augue ut lectus arcu bibendum. Egestas dui id ornare arcu odio ut. Sapien et ligula ullamcorper malesuada. Nibh praesent tristique magna sit amet purus gravida quis. Malesuada nunc vel risus commodo viverra. Integer feugiat scelerisque varius morbi enim.', 'loremipsum.io', '2019-12-26', '', 9, '2019-12-26 18:00:35'),
(18, 36, 'Lacus sed turpis tincidunt id aliquet. Orci ac auctor augue maur', 'tzuyu@pt.com', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lacus sed turpis tincidunt id aliquet. Orci ac auctor augue mauris augue neque. Diam quis enim lobortis scelerisque fermentum dui faucibus in. Morbi tristique senectus et netus et malesuada fames. Varius vel pharetra vel turpis. Eu augue ut lectus arcu bibendum at varius vel pharetra. Curabitur gravida arcu ac tortor dignissim convallis. Morbi leo urna molestie at elementum eu facilisis. Lacus vel facilisis volutpat est velit. Quis viverra nibh cras pulvinar mattis nunc sed blandit libero.', 'loremipsum.io', '2019-12-26', '', 12, '2019-12-26 18:01:08'),
(19, 37, 'Arcu dictum varius duis at', 'user@user.com', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Tellus orci ac auctor augue mauris. Scelerisque viverra mauris in aliquam. Etiam sit amet nisl purus in. Cursus risus at ultrices mi. Lectus proin nibh nisl condimentum. Cras sed felis eget velit. Quam viverra orci sagittis eu volutpat odio facilisis mauris. Sed viverra ipsum nunc aliquet bibendum enim. Morbi non arcu risus quis varius quam quisque id diam. Aliquet enim tortor at auctor. Arcu dictum varius duis at. Diam ut venenatis tellus in metus vulputate eu. Facilisis volutpat est velit egestas dui id ornare.', 'loremipsum.io', '2019-12-26', '', 10, '2019-12-26 18:01:54'),
(20, 38, 'Vitamin elementum curabitur vitae nunc sed velit', 'user@user.com', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Odio morbi quis commodo odio aenean sed. Turpis massa tincidunt dui ut ornare lectus sit amet. Dolor magna eget est lorem ipsum. Tincidunt dui ut ornare lectus sit amet est. Scelerisque fermentum dui faucibus in ornare quam viverra orci sagittis. Blandit libero volutpat sed cras ornare arcu dui vivamus arcu. Ornare arcu odio ut sem nulla pharetra. Libero id faucibus nisl tincidunt. Cursus sit amet dictum sit amet. In fermentum et sollicitudin ac orci. Vitae elementum curabitur vitae nunc sed velit. Tellus integer feugiat scelerisque varius morbi. Arcu risus quis varius quam quisque id diam.', 'loremipsum.io', '2019-12-26', '', 11, '2019-12-26 18:02:32'),
(21, 39, 'test', 'user@user.com', 'test', 'test', '2019-12-26', '', 1, '2019-12-26 18:04:42'),
(22, 40, 'test', 'user@user.com', 'test', 'test', '2019-12-26', '', 1, '2019-12-26 18:05:01'),
(23, 41, 'test', 'user@user.com', 'test', 'test', '2019-12-26', '', 1, '2019-12-26 18:05:24');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userId` int(11) NOT NULL,
  `emri` varchar(32) NOT NULL,
  `email` varchar(32) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `emri`, `email`, `password`) VALUES
(26, 'User One', 'user@user.com', 'e10adc3949ba59abbe56e057f20f883e'),
(27, 'Im Nayeon', 'imnayeon@pt.com', 'e10adc3949ba59abbe56e057f20f883e'),
(28, 'Jeongyeon Yoo', 'jeong@pt.com', 'e10adc3949ba59abbe56e057f20f883e'),
(29, 'Hirai Momo', 'momo@pt.com', 'e10adc3949ba59abbe56e057f20f883e'),
(30, 'Minatozaki Sana', 'sana@pt.com', 'e10adc3949ba59abbe56e057f20f883e'),
(31, 'Park Jihyo', 'jihyo@pt.com', 'e10adc3949ba59abbe56e057f20f883e'),
(32, 'Myoui Mina', 'mina@pt.com', 'e10adc3949ba59abbe56e057f20f883e'),
(33, 'Kim Dahyun', 'dahyun@pt.com', 'e10adc3949ba59abbe56e057f20f883e'),
(34, 'Son Chaeyoung', 'chaeng@pt.com', 'e10adc3949ba59abbe56e057f20f883e'),
(35, 'Chou Tzuyu', 'tzuyu@pt.com', 'e10adc3949ba59abbe56e057f20f883e');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`adminId`);

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`main_text_id`);

--
-- Indexes for table `footermenu`
--
ALTER TABLE `footermenu`
  ADD PRIMARY KEY (`ID_Menu`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`ID_Img`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`kategoriId`);

--
-- Indexes for table `logo`
--
ALTER TABLE `logo`
  ADD PRIMARY KEY (`logoId`);

--
-- Indexes for table `mainmenu`
--
ALTER TABLE `mainmenu`
  ADD PRIMARY KEY (`ID_Menu`);

--
-- Indexes for table `mainmenuadm`
--
ALTER TABLE `mainmenuadm`
  ADD PRIMARY KEY (`ID_Menu`);

--
-- Indexes for table `petitions`
--
ALTER TABLE `petitions`
  ADD PRIMARY KEY (`peticionId`),
  ADD KEY `Kategori` (`Kategori`);

--
-- Indexes for table `signedpetitions`
--
ALTER TABLE `signedpetitions`
  ADD PRIMARY KEY (`Id_Sp`),
  ADD KEY `Id_User` (`Id_User`),
  ADD KEY `Id_Petition` (`Id_Petition`);

--
-- Indexes for table `trigger_insert_petitions`
--
ALTER TABLE `trigger_insert_petitions`
  ADD PRIMARY KEY (`ID_Trigger_Insert`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `adminId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `main_text_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `footermenu`
--
ALTER TABLE `footermenu`
  MODIFY `ID_Menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `ID_Img` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `kategoriId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `logo`
--
ALTER TABLE `logo`
  MODIFY `logoId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mainmenu`
--
ALTER TABLE `mainmenu`
  MODIFY `ID_Menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `mainmenuadm`
--
ALTER TABLE `mainmenuadm`
  MODIFY `ID_Menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `petitions`
--
ALTER TABLE `petitions`
  MODIFY `peticionId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `signedpetitions`
--
ALTER TABLE `signedpetitions`
  MODIFY `Id_Sp` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trigger_insert_petitions`
--
ALTER TABLE `trigger_insert_petitions`
  MODIFY `ID_Trigger_Insert` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `petitions`
--
ALTER TABLE `petitions`
  ADD CONSTRAINT `petitions_ibfk_1` FOREIGN KEY (`Kategori`) REFERENCES `kategori` (`kategoriId`);

--
-- Constraints for table `signedpetitions`
--
ALTER TABLE `signedpetitions`
  ADD CONSTRAINT `signedpetitions_ibfk_1` FOREIGN KEY (`Id_User`) REFERENCES `users` (`userId`),
  ADD CONSTRAINT `signedpetitions_ibfk_2` FOREIGN KEY (`Id_Petition`) REFERENCES `petitions` (`peticionId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
