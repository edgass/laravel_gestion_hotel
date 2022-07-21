DELIMITER $$
CREATE TRIGGER create_facture_acompte_chambre
AFTER INSERT
ON reschambres FOR EACH ROW
BEGIN

    SET @detail = concat("Acompte de réservation de la chambre ",NEW.numeroChambre);
    SET @detail2 = concat("Paiement définitif de réservation de la chambre ",NEW.numeroChambre);
    SET @prix = (select prixChambre from chambres where numeroChambre = NEW.numeroChambre );
    SET @idclient = (SELECT idclient from clients WHERE numPieceID = NEW.numPieceID);
    SET @fact = (SELECT idFacture FROM FACTURE WHERE idclient = @idclient AND etat = 0 ORDER BY idFacture DESC LIMIT 1);

    INSERT INTO facture(idclient,typeFacture,dateEmission,dateDue,etat) VALUES(@idclient,'Facture acompte',CURDATE(),CURDATE(),0);

    INSERT INTO prestation(typePrestation,detailPrestation,idFacture,numPieceID,etat,prixPresta,datePrestation)
        VALUES('Réservation de chambre',@detail,@fact,NEW.numPieceID,0,(@prix/2),CURDATE());
    
    INSERT INTO prestation(typePrestation,detailPrestation,idFacture,numPieceID,etat,prixPresta,datePrestation)
        VALUES('Réservation de chambre',@detail2,@fact,NEW.numPieceID,0,(@prix/2),CURDATE());
END$$
DELIMITER ;


DELIMITER $$
CREATE TRIGGER create_facture_acompte_parking
AFTER INSERT
ON resparkings FOR EACH ROW
BEGIN

    SET @place = NEW.numeroplace;
    SET @detail = concat("Acompte de réservation de la place du parking ",NEW.numeroplace);
    SET @detail2 = concat("Paiement définitif de la réservation du parking",NEW.numeroplace);
    SET @prix = (select prixjour from parkings where numeroplace = NEW.numeroplace );
    SET @idclient = (SELECT idclient from clients WHERE numPieceID = NEW.numPieceID);
    SET @fact = (SELECT idFacture FROM FACTURE WHERE idclient = @idclient AND etat = 0 ORDER BY idFacture DESC LIMIT 1);

    INSERT INTO facture(idclient,typeFacture,dateEmission,dateDue,etat) VALUES(@idclient,'Facture acompte',CURDATE(),CURDATE(),0);

    INSERT INTO prestation(typePrestation,detailPrestation,idFacture,numPieceID,etat,prixPresta,datePrestation)
        VALUES('Réservation de parking',@detail,@fact,NEW.numPieceID,0,(@prix/2),CURDATE());
    
    INSERT INTO prestation(typePrestation,detailPrestation,idFacture,numPieceID,etat,prixPresta,datePrestation)
        VALUES('Réservation de parking',@detail2,@fact,NEW.numPieceID,0,(@prix/2),CURDATE());
END$$
DELIMITER ;


DELIMITER $$
CREATE TRIGGER create_facture_acompte_piscine
AFTER INSERT
ON respiscines FOR EACH ROW
BEGIN

    SET @detail = "Acompte de réservation de la piscine";
    SET @detail2 = "Paiement définitif de la réservation de la piscine";
    SET @idclient = (SELECT idclient from clients WHERE numPieceID = NEW.numPieceID);
    SET @fact = (SELECT idFacture FROM FACTURE WHERE idclient = @idclient AND etat = 0 ORDER BY idFacture DESC LIMIT 1);

    INSERT INTO facture(idclient,typeFacture,dateEmission,dateDue,etat) VALUES(@idclient,'Facture acompte',CURDATE(),CURDATE(),0);

    INSERT INTO prestation(typePrestation,detailPrestation,idFacture,numPieceID,etat,datePrestation)
        VALUES('Réservation de piscine',@detail,@fact,NEW.numPieceID,0,CURDATE());
    
    INSERT INTO prestation(typePrestation,detailPrestation,idFacture,numPieceID,etat,datePrestation)
        VALUES('Réservation de piscine',@detail2,@fact,NEW.numPieceID,0,CURDATE());
END$$
DELIMITER ;


DELIMITER $$
CREATE TRIGGER update_chambre_on
AFTER INSERT
ON reschambres FOR EACH ROW
BEGIN
    UPDATE chambres
    SET etat=1
    WHERE numeroChambre = (NEW.numeroChambre);
END$$
DELIMITER ;



DELIMITER $$
CREATE TRIGGER update_table_on
AFTER INSERT
ON resrestaurants FOR EACH ROW
BEGIN
    UPDATE table_restaurants
    SET etat=1
    WHERE numerotable = (NEW.numerotable);
END$$
DELIMITER ;



DELIMITER $$
CREATE TRIGGER update_parking_on
AFTER INSERT
ON resparkings FOR EACH ROW
BEGIN
    UPDATE parkings
    SET etat=1
    WHERE numeroplace = (NEW.numeroplace);
END$$
DELIMITER ;



DELIMITER $$
CREATE TRIGGER create_facture_definitive
AFTER INSERT
ON clients FOR EACH ROW
BEGIN
    INSERT INTO facture(idclient,typeFacture,dateEmission,dateDue) VALUES(NEW.idclient,'Facture definitive',CURDATE(),CURDATE());
END$$
DELIMITER ;