-- MySQL dump 10.13  Distrib 5.7.25, for Linux (x86_64)
--
-- Host: localhost    Database: covitel_new
-- ------------------------------------------------------
-- Server version	5.7.25-0ubuntu0.18.04.2

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `adversaires`
--

DROP TABLE IF EXISTS `adversaires`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `adversaires` (
  `adversaireId` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `dossierId` int(11) NOT NULL,
  `natureDebiteur` tinyint(1) NOT NULL COMMENT '1:particulier;2:societe',
  `nomDebiteur` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `adresse` text COLLATE utf8_unicode_ci NOT NULL,
  `adresseArabe` text COLLATE utf8_unicode_ci,
  `villeId` int(11) NOT NULL,
  `estAvaliste` tinyint(1) NOT NULL DEFAULT '0',
  `nomDebiteurArabe` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cin` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`adversaireId`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `adversaires`
--

LOCK TABLES `adversaires` WRITE;
/*!40000 ALTER TABLE `adversaires` DISABLE KEYS */;
INSERT INTO `adversaires` VALUES (1,12,1,'Mohamed Amine Ouradani','ldvnsjvhbsjbvhjhbfv',NULL,6,0,NULL,'SZ13432'),(2,13,1,'Mohamed Amine Ouradani','ldvnsjvhbsjbvhjhbfv',NULL,6,0,NULL,'SZ13432'),(3,14,1,'Mohamed Amine Ouradani','ldvnsjvhbsjbvhjhbfv',NULL,6,0,NULL,'SZ13432'),(4,15,1,'Mohamed Amine Ouradani','ldvnsjvhbsjbvhjhbfv',NULL,6,0,NULL,'SZ13432'),(5,16,1,'Mohamed Amine Ouradani','kjhkuzhkuhui',NULL,5,0,NULL,'SZ13432'),(6,17,1,'Mohamed Amine Ouradani','kjhkuzhkuhui',NULL,5,0,NULL,'SZ13432'),(7,18,1,'Mohamed Amine Ouradani','kjhkuzhkuhui',NULL,5,0,NULL,'SZ13432'),(8,19,1,'Mohamed Amine Ouradani','kjhkuzhkuhui',NULL,5,0,NULL,'SZ13432'),(9,20,1,'Mohamed Amine Ouradani','kjhkuzhkuhui',NULL,5,0,NULL,'SZ13432'),(10,21,1,'Mohamed Amine Ouradani','kjhkuzhkuhui',NULL,5,0,NULL,'SZ13432'),(11,22,1,'Mohamed Amine Ouradani','kjhkuzhkuhui',NULL,5,0,NULL,'SZ13432'),(12,23,1,'Mohamed Amine Ouradani','kjhkuzhkuhui',NULL,5,0,NULL,'SZ13432'),(13,24,1,'Mohamed Amine Ouradani','kjhkuzhkuhui',NULL,5,0,NULL,'SZ13432'),(14,25,1,'Mohamed Amine Ouradani','kjhkuzhkuhui',NULL,5,0,NULL,'SZ13432'),(15,26,1,'Mohamed Amine Ouradani','kjhkuzhkuhui',NULL,5,0,NULL,'SZ13432'),(16,27,1,'Mohamed Amine Ouradani','kjhkuzhkuhui',NULL,5,0,NULL,'SZ13432'),(17,28,1,'Mohamed Amine Ouradani','kjhkuzhkuhui',NULL,5,0,NULL,'SZ13432'),(18,29,1,'Mohamed Amine Ouradani','kjhkuzhkuhui',NULL,5,0,NULL,'SZ13432');
/*!40000 ALTER TABLE `adversaires` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `audiences`
--

DROP TABLE IF EXISTS `audiences`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `audiences` (
  `audienceId` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `dossierTribunalId` int(11) NOT NULL,
  `dateAudience` datetime NOT NULL,
  `motifReportId` int(11) DEFAULT NULL,
  `typeAuidence` tinyint(1) NOT NULL,
  PRIMARY KEY (`audienceId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `audiences`
--

LOCK TABLES `audiences` WRITE;
/*!40000 ALTER TABLE `audiences` DISABLE KEYS */;
/*!40000 ALTER TABLE `audiences` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `banques`
--

DROP TABLE IF EXISTS `banques`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `banques` (
  `banqueId` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `intituleBanque` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `intituleBanqueArabe` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `adresse` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `adresseArabe` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `logo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`banqueId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `banques`
--

LOCK TABLES `banques` WRITE;
/*!40000 ALTER TABLE `banques` DISABLE KEYS */;
/*!40000 ALTER TABLE `banques` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clients`
--

DROP TABLE IF EXISTS `clients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clients` (
  `clientId` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nomClient` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `adresseClient` text COLLATE utf8_unicode_ci NOT NULL,
  `adresseClientArabe` text COLLATE utf8_unicode_ci,
  `villeId` int(11) NOT NULL,
  `defaultConventionId` int(11) DEFAULT NULL,
  `typeClient` tinyint(1) NOT NULL COMMENT '1:particiulier;2:Societe',
  PRIMARY KEY (`clientId`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clients`
--

LOCK TABLES `clients` WRITE;
/*!40000 ALTER TABLE `clients` DISABLE KEYS */;
INSERT INTO `clients` VALUES (1,'kjdgsy','kjefhzkef',NULL,2,NULL,1),(2,'kjdgsy','kjefhzkef',NULL,2,NULL,1),(3,'kjdgsy','kjefhzkef',NULL,2,NULL,1),(4,'kjdgsy','kjefhzkef',NULL,2,NULL,1),(5,'kjdgsy','kjefhzkef',NULL,2,NULL,1),(6,'kjdgsy','kjefhzkef',NULL,2,NULL,1),(7,'kjdgsy','kjefhzkef',NULL,2,NULL,1),(8,'kjdgsy','kjefhzkef',NULL,2,NULL,1),(9,'ufehzufhzeiufheziufezuifheuzifheziufh','kjefhzkef',NULL,2,NULL,1),(10,'Mohamed Amine','kjefhzkef',NULL,2,NULL,1),(11,'Mohamed Amine ekfdhezfugzegfy','kjefhzkef',NULL,2,NULL,1),(12,'Med Amine','ezufhzeifg',NULL,1,NULL,1),(13,'Med Ord','ezufhezfniuezb',NULL,4,NULL,1);
/*!40000 ALTER TABLE `clients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contrats`
--

DROP TABLE IF EXISTS `contrats`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contrats` (
  `contratId` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `referenceContrat` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `montantCreance` double DEFAULT NULL,
  `dossierId` int(11) NOT NULL,
  `creationUtilisateurId` int(11) NOT NULL,
  PRIMARY KEY (`contratId`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contrats`
--

LOCK TABLES `contrats` WRITE;
/*!40000 ALTER TABLE `contrats` DISABLE KEYS */;
INSERT INTO `contrats` VALUES (1,'BK14000',12478555,12,2),(2,'BK14000',12478555,13,2),(3,'BK14000',12478555,14,2),(4,'BK14000',12478555,15,2),(5,'BK14000',1022554,16,2),(6,'BK14000',1022554,17,2),(7,'BK14000',1022554,18,2),(8,'BK14000',1022554,19,2),(9,'BK14000',1022554,20,2),(10,'BK14000',1022554,21,2),(11,'BK14000',1022554,22,2),(12,'BK14000',1022554,23,2),(13,'BK14000',1022554,24,2),(14,'BK14000',1022554,25,2),(15,'BK14000',1022554,26,2),(16,'BK14000',1022554,27,2),(17,'BK14000',1022554,28,2),(18,'BK14000',1022554,29,2);
/*!40000 ALTER TABLE `contrats` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `conventions`
--

DROP TABLE IF EXISTS `conventions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `conventions` (
  `conventionId` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `intituleConvention` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `clientId` int(11) NOT NULL,
  PRIMARY KEY (`conventionId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `conventions`
--

LOCK TABLES `conventions` WRITE;
/*!40000 ALTER TABLE `conventions` DISABLE KEYS */;
/*!40000 ALTER TABLE `conventions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dossiers`
--

DROP TABLE IF EXISTS `dossiers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dossiers` (
  `dossierId` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `numeroDossier` int(6) NOT NULL,
  `typeDossier` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1:masse;2:grand',
  `clientId` int(11) DEFAULT NULL,
  `dateCreation` datetime NOT NULL,
  `creationUtilisateurId` int(11) NOT NULL,
  `estSoumis` tinyint(1) NOT NULL DEFAULT '0',
  `dateSoumission` datetime DEFAULT NULL,
  `anneeDossier` int(4) NOT NULL,
  PRIMARY KEY (`dossierId`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dossiers`
--

LOCK TABLES `dossiers` WRITE;
/*!40000 ALTER TABLE `dossiers` DISABLE KEYS */;
INSERT INTO `dossiers` VALUES (1,2,1,1,'2019-01-21 12:05:28',1,1,'2019-01-24 14:38:45',19),(3,3,1,1,'2019-01-24 14:39:31',1,1,'2019-01-24 15:01:56',19),(4,4,1,1,'2019-01-24 15:02:29',1,1,'2019-01-24 15:15:27',19),(5,5,1,1,'2019-01-24 15:15:29',1,1,'2019-01-24 15:36:17',19),(6,6,2,1,'2019-01-24 15:36:19',1,1,'2019-01-24 17:00:19',19),(7,7,2,1,'2019-01-24 17:00:23',1,1,'2019-01-25 17:23:45',19),(8,12,2,2,'2019-01-25 17:23:59',1,1,'2019-01-27 17:50:33',17),(9,8,1,NULL,'2019-01-27 17:50:37',1,0,NULL,19),(10,590488,2,10,'2019-02-03 04:20:14',2,0,NULL,2019),(11,14833,2,10,'2019-02-03 04:23:38',2,0,NULL,2019),(12,926723,2,10,'2019-02-03 04:25:03',2,0,NULL,2019),(13,803266,2,10,'2019-02-03 04:27:54',2,0,NULL,2019),(14,907368,2,10,'2019-02-03 04:29:28',2,0,NULL,2019),(15,585260,2,10,'2019-02-03 04:30:38',2,0,NULL,2019),(16,563401,2,10,'2019-02-03 11:53:44',2,0,NULL,2019),(17,203259,2,10,'2019-02-03 12:55:48',2,0,NULL,2019),(18,802555,2,10,'2019-02-03 13:02:26',2,0,NULL,2019),(19,377379,2,10,'2019-02-03 13:03:52',2,0,NULL,2019),(20,185829,2,10,'2019-02-03 13:04:29',2,0,NULL,2019),(21,408357,2,10,'2019-02-03 13:04:55',2,0,NULL,2019),(22,696360,2,10,'2019-02-03 13:05:44',2,0,NULL,2019),(23,98169,2,10,'2019-02-03 13:51:04',2,0,NULL,2019),(24,143212,2,10,'2019-02-03 13:52:13',2,0,NULL,2019),(25,377834,2,10,'2019-02-03 13:57:45',2,0,NULL,2019),(26,759395,2,10,'2019-02-03 14:01:46',2,0,NULL,2019),(27,250540,2,10,'2019-02-03 14:04:16',2,0,NULL,2019),(28,332067,2,10,'2019-02-03 14:12:57',2,0,NULL,2019),(29,925344,2,10,'2019-02-03 14:14:15',2,0,NULL,2019);
/*!40000 ALTER TABLE `dossiers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dossiers_tribunaux`
--

DROP TABLE IF EXISTS `dossiers_tribunaux`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dossiers_tribunaux` (
  `dossierTribunalId` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `dossierTribunalParentId` int(11) DEFAULT NULL,
  `numeroTribunalSequence` int(6) DEFAULT NULL,
  `numeroTribunalCodeProcedure` int(4) NOT NULL,
  `numeroTribunalAnnee` int(4) NOT NULL,
  `adversairesId` text COLLATE utf8_unicode_ci NOT NULL,
  `contratsId` text COLLATE utf8_unicode_ci NOT NULL,
  `procedureId` int(11) NOT NULL,
  `dossierId` int(11) NOT NULL,
  `dateDepotRequete` datetime DEFAULT NULL,
  `dateOrdonnance` datetime DEFAULT NULL,
  `dateJugement` datetime DEFAULT NULL,
  `numeroJugement` int(11) DEFAULT NULL,
  `dateDepotNotification` datetime DEFAULT NULL,
  `numeroNotification` int(11) DEFAULT NULL,
  `dateDemandeExecution` datetime DEFAULT NULL,
  `numeroExecution` int(11) DEFAULT NULL,
  `dateExpertise` datetime DEFAULT NULL,
  `dateVente` datetime DEFAULT NULL,
  `creanceAImprimer` double NOT NULL,
  `matriculeVehicule` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `marqueVehicule` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `banqueId` int(11) DEFAULT NULL,
  `employeurId` int(11) DEFAULT NULL,
  `titreFoncier` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `conservationFonciere` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `statutId` int(11) NOT NULL,
  `montantCreance` double NOT NULL,
  `suiviId` int(11) NOT NULL,
  `numeroCompteBancaire` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `numeroRC` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `adresseRC` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`dossierTribunalId`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dossiers_tribunaux`
--

LOCK TABLES `dossiers_tribunaux` WRITE;
/*!40000 ALTER TABLE `dossiers_tribunaux` DISABLE KEYS */;
INSERT INTO `dossiers_tribunaux` VALUES (1,NULL,NULL,0,0,'1,2','1',1,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,NULL,NULL,NULL,1,14587.58,2,'2221414545414585',NULL,NULL),(4,NULL,NULL,0,0,'1','1',3,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,NULL,'R/73440','Service de concervation foncière de rabat hassane',1,14587.58,3,NULL,NULL,NULL),(9,NULL,NULL,0,0,'2','1',4,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,NULL,NULL,NULL,1,14587.25,1,NULL,'4F88657','Avenue Mohammed 5, Immeuble D43, Numéro 5, Salé Jadida'),(11,NULL,NULL,0,0,'2','1',2,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,'1A-345678','RENAUT',1,NULL,NULL,NULL,1,14587.25,1,NULL,NULL,NULL),(12,NULL,NULL,0,0,'4','7',3,3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,NULL,'H','AZ',1,34343,1,NULL,NULL,NULL),(13,NULL,NULL,0,0,'5','8',2,4,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,'1A-345678','RENAUT',1,NULL,NULL,NULL,1,8989,1,NULL,NULL,NULL),(14,NULL,NULL,0,0,'6','14',2,5,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,'1A-345678','RENAUT',1,NULL,NULL,NULL,1,566666666666670,1,NULL,NULL,NULL),(17,NULL,NULL,0,0,'7','16',2,6,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,'56','Ren',1,NULL,NULL,NULL,1,2,1,NULL,NULL,NULL),(18,NULL,NULL,0,0,'8','17',1,7,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,NULL,NULL,NULL,1,44785,1,'6778755567',NULL,NULL),(21,NULL,NULL,0,0,'10,11,12','20',1,8,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1,NULL,NULL,NULL,1,233,1,'3434',NULL,NULL),(22,NULL,NULL,1,2019,'18','18',1,29,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1450000,NULL,NULL,NULL,NULL,NULL,NULL,1,1450000,1,NULL,NULL,NULL);
/*!40000 ALTER TABLE `dossiers_tribunaux` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `employeurs`
--

DROP TABLE IF EXISTS `employeurs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `employeurs` (
  `employeurId` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nomEmployeur` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `nomEmployeurArabe` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `adresse` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `adresseArabe` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `adresseArabeAlternative` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `villeId` int(11) NOT NULL,
  `villeAlternativeId` int(11) DEFAULT NULL,
  PRIMARY KEY (`employeurId`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employeurs`
--

LOCK TABLES `employeurs` WRITE;
/*!40000 ALTER TABLE `employeurs` DISABLE KEYS */;
INSERT INTO `employeurs` VALUES (1,'OFPPT',NULL,'Maarif, Numero 5',NULL,NULL,2,NULL),(2,'McDonalds',NULL,'',NULL,NULL,0,NULL);
/*!40000 ALTER TABLE `employeurs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `executions`
--

DROP TABLE IF EXISTS `executions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `executions` (
  `executionId` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `dossierTribunalId` int(11) NOT NULL,
  `dateExeution` datetime NOT NULL,
  `sortExecution` tinyint(1) NOT NULL,
  PRIMARY KEY (`executionId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `executions`
--

LOCK TABLES `executions` WRITE;
/*!40000 ALTER TABLE `executions` DISABLE KEYS */;
/*!40000 ALTER TABLE `executions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `factures`
--

DROP TABLE IF EXISTS `factures`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `factures` (
  `factureId` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `numeroFacture` int(6) NOT NULL,
  `anneeFacture` int(4) NOT NULL,
  `clientId` int(11) NOT NULL,
  `dateDepot` datetime DEFAULT NULL,
  `reglementId` int(11) DEFAULT NULL,
  PRIMARY KEY (`factureId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `factures`
--

LOCK TABLES `factures` WRITE;
/*!40000 ALTER TABLE `factures` DISABLE KEYS */;
/*!40000 ALTER TABLE `factures` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `frais`
--

DROP TABLE IF EXISTS `frais`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `frais` (
  `fraisId` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `statutProcedureId` int(11) NOT NULL,
  `typeFraisId` int(11) NOT NULL,
  `montantFrais` double NOT NULL,
  `villeTribunalId` int(11) DEFAULT NULL,
  `dependCreance` tinyint(1) NOT NULL DEFAULT '0',
  `estDefault` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`fraisId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `frais`
--

LOCK TABLES `frais` WRITE;
/*!40000 ALTER TABLE `frais` DISABLE KEYS */;
/*!40000 ALTER TABLE `frais` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `honorraires`
--

DROP TABLE IF EXISTS `honorraires`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `honorraires` (
  `honorraireId` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `conventionId` int(11) NOT NULL,
  `statutProcedureId` int(11) NOT NULL,
  `montantHonorraire` double NOT NULL,
  PRIMARY KEY (`honorraireId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `honorraires`
--

LOCK TABLES `honorraires` WRITE;
/*!40000 ALTER TABLE `honorraires` DISABLE KEYS */;
/*!40000 ALTER TABLE `honorraires` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lignes_factures`
--

DROP TABLE IF EXISTS `lignes_factures`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lignes_factures` (
  `ligneFactureId` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `honorraireId` int(11) DEFAULT NULL,
  `fraisId` int(11) DEFAULT NULL,
  `factureId` int(11) DEFAULT NULL,
  `dossierTribunalId` int(11) NOT NULL,
  `montantPropose` double NOT NULL,
  `montantFondValide` double NOT NULL,
  `montantAFactuer` double NOT NULL,
  `dateValidationFond` datetime DEFAULT NULL,
  `numeroQuittance` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `motifAnnulation` text COLLATE utf8_unicode_ci,
  `dateCreation` datetime NOT NULL,
  `dateSaisieQuittance` datetime DEFAULT NULL,
  PRIMARY KEY (`ligneFactureId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lignes_factures`
--

LOCK TABLES `lignes_factures` WRITE;
/*!40000 ALTER TABLE `lignes_factures` DISABLE KEYS */;
/*!40000 ALTER TABLE `lignes_factures` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notifications`
--

DROP TABLE IF EXISTS `notifications`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `notifications` (
  `notificationId` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `dossierTribunalId` int(11) NOT NULL,
  `dateNotification` datetime NOT NULL,
  `etatNotification` tinyint(1) NOT NULL,
  `observation` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`notificationId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notifications`
--

LOCK TABLES `notifications` WRITE;
/*!40000 ALTER TABLE `notifications` DISABLE KEYS */;
/*!40000 ALTER TABLE `notifications` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `procedures`
--

DROP TABLE IF EXISTS `procedures`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `procedures` (
  `procedureId` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `intituleProcedure` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `intituleProcedureArabe` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `codeProcedure` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `informationsComplementaires` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`procedureId`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `procedures`
--

LOCK TABLES `procedures` WRITE;
/*!40000 ALTER TABLE `procedures` DISABLE KEYS */;
INSERT INTO `procedures` VALUES (1,'Saisie arrêt sur compte bancaire','الحجز على الحساب البنكي','SBC','banque'),(2,'Restitution de véhicule','استرجاع المركبة','RRV','vehicule'),(3,'Saisie conservatoire immobilière','الحجز على العقار','SCI','foncier'),(4,'Saise conservatoire fonds de commerce','الحجز على الأصل التجاري','SCF','fondsCommerce'),(5,'Saisie arrêt sur salaire','الحجز على الراتب','SAS','employeur');
/*!40000 ALTER TABLE `procedures` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reglements`
--

DROP TABLE IF EXISTS `reglements`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reglements` (
  `reglementId` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `numeroReglement` int(5) DEFAULT NULL,
  `typeReglement` tinyint(1) NOT NULL,
  `montantReglement` double NOT NULL,
  `dateReglement` datetime NOT NULL,
  PRIMARY KEY (`reglementId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reglements`
--

LOCK TABLES `reglements` WRITE;
/*!40000 ALTER TABLE `reglements` DISABLE KEYS */;
/*!40000 ALTER TABLE `reglements` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `settings` (
  `settingId` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `varname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `value` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`settingId`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `settings`
--

LOCK TABLES `settings` WRITE;
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;
INSERT INTO `settings` VALUES (1,'sitename','JADDAD'),(2,'intituleDevise','MAD');
/*!40000 ALTER TABLE `settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `statuts`
--

DROP TABLE IF EXISTS `statuts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `statuts` (
  `statutId` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `intituleStatut` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `intituleStatutParent` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `ordreAffichage` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`statutId`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `statuts`
--

LOCK TABLES `statuts` WRITE;
/*!40000 ALTER TABLE `statuts` DISABLE KEYS */;
INSERT INTO `statuts` VALUES (2,'Creation','1',1);
/*!40000 ALTER TABLE `statuts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `statuts_procedures`
--

DROP TABLE IF EXISTS `statuts_procedures`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `statuts_procedures` (
  `statutProcedureId` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `statutId` int(11) NOT NULL,
  `procedureId` int(11) NOT NULL,
  PRIMARY KEY (`statutProcedureId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `statuts_procedures`
--

LOCK TABLES `statuts_procedures` WRITE;
/*!40000 ALTER TABLE `statuts_procedures` DISABLE KEYS */;
/*!40000 ALTER TABLE `statuts_procedures` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `suivis`
--

DROP TABLE IF EXISTS `suivis`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `suivis` (
  `suiviId` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `intituleSuivi` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `intituleSuiviArabe` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`suiviId`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `suivis`
--

LOCK TABLES `suivis` WRITE;
/*!40000 ALTER TABLE `suivis` DISABLE KEYS */;
INSERT INTO `suivis` VALUES (1,'Creation','إنشاء');
/*!40000 ALTER TABLE `suivis` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `types_frais`
--

DROP TABLE IF EXISTS `types_frais`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `types_frais` (
  `typeFraisId` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `intituleTypeFrais` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `estFusionAutre` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`typeFraisId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `types_frais`
--

LOCK TABLES `types_frais` WRITE;
/*!40000 ALTER TABLE `types_frais` DISABLE KEYS */;
/*!40000 ALTER TABLE `types_frais` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `utilisateurs` (
  `utilisateurId` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `prenom` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `motPasse` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `usergroup` int(11) NOT NULL DEFAULT '1',
  `photoPersonnel` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`utilisateurId`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `utilisateurs`
--

LOCK TABLES `utilisateurs` WRITE;
/*!40000 ALTER TABLE `utilisateurs` DISABLE KEYS */;
INSERT INTO `utilisateurs` VALUES (2,'Ord','Med Amine','admin@covitel.com','$2y$10$Drnu8TX9NMlss2hhvWYgOOeijswRHvDY12yD9pfkLexu3NU12Cq.i',1,NULL);
/*!40000 ALTER TABLE `utilisateurs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `villes`
--

DROP TABLE IF EXISTS `villes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `villes` (
  `villeId` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `intituleVille` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `intituleVilleArabe` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`villeId`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `villes`
--

LOCK TABLES `villes` WRITE;
/*!40000 ALTER TABLE `villes` DISABLE KEYS */;
INSERT INTO `villes` VALUES (1,'Rabat','Rabat'),(2,'Casablanca','Casablanca'),(3,'Oujda','Oujda'),(4,'Kenitra','Kenitra'),(5,'Tanger','Tanger'),(6,'Fes','Fes'),(7,'Safi','Safi'),(8,'Sale','Sale'),(9,'Marrakech','Marrakech');
/*!40000 ALTER TABLE `villes` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-02-03 20:18:53
