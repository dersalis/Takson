CREATE TABLE `Taskor`.`Tasks` (
    `Id` INT NOT NULL AUTO_INCREMENT , 
    `Name` VARCHAR(100) NOT NULL , 
    `Description` VARCHAR(250) NOT NULL , 
    `Priority` INT NOT NULL DEFAULT '0' , 
    `Author` VARCHAR(20) NOT NULL , 
    `Assigned` VARCHAR(20) NULL DEFAULT NULL , 
    `StartDate` DATE NULL DEFAULT NULL , 
    `EndDate` DATE NULL DEFAULT NULL , 
    PRIMARY KEY (`Id`)) ENGINE = InnoDB;