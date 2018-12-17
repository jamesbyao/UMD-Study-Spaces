SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema StudySpacesDB
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema StudySpacesDB
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `StudySpacesDB2` DEFAULT CHARACTER SET utf8 ;
USE `StudySpacesDB2` ;

-- -----------------------------------------------------
-- Table `StudySpacesDB`.`Locations`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `StudySpacesDB2`.`Locations` (
  `LocationID` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `LocationName` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`LocationID`),
  UNIQUE INDEX `LocationID_UNIQUE` (`LocationID` ASC))
ENGINE = InnoDB;

LOAD DATA INFILE '/Applications/XAMPP/xamppfiles/htdocs/Locations.csv' 
INTO TABLE Locations 
FIELDS TERMINATED BY ',' 
ENCLOSED BY '"'
LINES TERMINATED BY '\n'
IGNORE 1 ROWS;


-- -----------------------------------------------------
-- Table `StudySpacesDB`.`Buildings`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `StudySpacesDB2`.`Buildings` (
  `BuildingID` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `BuildingName` VARCHAR(45) NOT NULL,
  `LocationID` INT UNSIGNED NOT NULL,
  `NumOfStudySpaces` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`BuildingID`),
  UNIQUE INDEX `BuildingID_UNIQUE` (`BuildingID` ASC),
  INDEX `fk_Buildings_Locations_idx` (`LocationID` ASC),
  CONSTRAINT `fk_Buildings_Locations`
    FOREIGN KEY (`LocationID`)
    REFERENCES `StudySpacesDB2`.`Locations` (`LocationID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

LOAD DATA INFILE '/Applications/XAMPP/xamppfiles/htdocs/Buildings.csv' 
INTO TABLE Buildings 
FIELDS TERMINATED BY ',' 
ENCLOSED BY '"'
LINES TERMINATED BY '\n'
IGNORE 1 ROWS;


-- -----------------------------------------------------
-- Table `StudySpacesDB`.`StudySpaces`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `StudySpacesDB2`.`StudySpaces` (
  `SpaceID` INT UNSIGNED NOT NULL,
  `SpaceName` VARCHAR(45) NOT NULL,
  `BuildingID` INT UNSIGNED NOT NULL,
  `LocationID` INT UNSIGNED NOT NULL,
  `NumOfTables` VARCHAR(45) NOT NULL,
  `NoiseLevel` VARCHAR(45) NOT NULL,
  `OperatingTime` VARCHAR(45) NOT NULL,
  `LowUsage` INT NOT NULL,
  `ModerateUsage` INT NOT NULL,
  `Crowded` INT NOT NULL,
  `GroupTables` INT NOT NULL,
  `IndividualTables` INT NOT NULL,
  `GroupRooms` INT NOT NULL,
  `Restrooms` INT NOT NULL,
  `Restaraunts/Snacks` INT NOT NULL,
  `VendingMachines` INT NOT NULL,
  `Outside` INT NOT NULL,
  `TwentyFourHour` INT NOT NULL,
  `QuietSpace` INT NOT NULL,
  PRIMARY KEY (`SpaceID`),
  UNIQUE INDEX `SpaceID_UNIQUE` (`SpaceID` ASC),
  INDEX `fk_StudySpaces_Buildings1_idx` (`BuildingID` ASC),
  INDEX `fk_StudySpaces_Locations1_idx` (`LocationID` ASC),
  CONSTRAINT `fk_StudySpaces_Buildings1`
    FOREIGN KEY (`BuildingID`)
    REFERENCES `StudySpacesDB2`.`Buildings` (`BuildingID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_StudySpaces_Locations1`
    FOREIGN KEY (`LocationID`)
    REFERENCES `StudySpacesDB2`.`Locations` (`LocationID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

LOAD DATA INFILE '/Applications/XAMPP/xamppfiles/htdocs/Study Spaces.csv' 
INTO TABLE StudySpaces 
FIELDS TERMINATED BY ',' 
ENCLOSED BY '"'
LINES TERMINATED BY '\n'
IGNORE 1 ROWS;


-- -----------------------------------------------------
-- Table `StudySpacesDB`.`Users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `StudySpacesDB2`.`Users` (
  `UserID` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `UserFirstName` VARCHAR(45) NULL,
  `UserLastName` VARCHAR(45) NULL,
  `UserHandle` VARCHAR(45) NULL,
  PRIMARY KEY (`UserID`),
  UNIQUE INDEX `UserID_UNIQUE` (`UserID` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `StudySpacesDB`.`Ratings`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `StudySpacesDB2`.`Ratings` (
  `RatingID` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `Rating` INT UNSIGNED NOT NULL,
  `BuildingName` VARCHAR(45) NOT NULL,
  `Users_UserID` INT UNSIGNED NOT NULL,
  `BuildingID` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`RatingID`),
  UNIQUE INDEX `RatingID_UNIQUE` (`RatingID` ASC),
  INDEX `fk_Ratings_Users1_idx` (`Users_UserID` ASC),
  INDEX `fk_Ratings_StudySpaces1_idx` (`BuildingID` ASC),
  CONSTRAINT `fk_Ratings_Users1`
    FOREIGN KEY (`Users_UserID`)
    REFERENCES `StudySpacesDB2`.`Users` (`UserID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Ratings_StudySpaces1`
    FOREIGN KEY (`BuildingID`)
    REFERENCES `StudySpacesDB2`.`StudySpaces` (`BuildingID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;