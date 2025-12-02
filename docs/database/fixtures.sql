INSERT INTO categorie (nom, description) VALUES
     ('Chaussures', 'Chaussures de sport et vélo'),
     ('Accessoires', 'Accessoires pour chaussures');

INSERT INTO produit (nom, description, prix, stock, id_categorie) VALUES
      ('Chaussures cycliste', 'Chaussures confortables pour vélo', 70.00, 10, 1),
      ('Chaussures running', 'Chaussures légères pour running', 60.00, 15, 1),
      ('Chaussettes sport', 'Chaussettes respirantes', 10.00, 50, 2),
      ('Semelles confort', 'Semelles pour chaussures', 15.00, 30, 2),
      ('Chaussures VTT', 'Chaussures robustes pour VTT', 80.00, 8, 1);

INSERT INTO client (nom, prenom, email, mdp, adresse, ville, code_postal) VALUES
      ('Durand','Paul','paul.durand@example.com','mdp1','10 rue A','Paris','75001'),
      ('Martin','Sophie','sophie.martin@example.com','mdp2','12 rue B','Lyon','69001');

INSERT INTO admin (username, email, mdp, role) VALUES
    ('admin1','admin1@gmail.com','mdpAdmin1','super_admin');

INSERT INTO commande (numero_commande, statut, montant_total, id_client, adresse_livraison, ville_livraison, code_postal_livraison)
VALUES
    ('01','en_attente',140.00,1,'10 rue A','Paris','75001'),
    ('02','payee',95.00,2,'12 rue B','Lyon','69001');

INSERT INTO ligne_commande (quantite, prix_unitaire, sous_total, id_commande, id_produit) VALUES
      (1,70.00,70.00,1,1),
      (1,70.00,70.00,1,2),
      (1,60.00,60.00,2,2),
      (1,35.00,35.00,2,3);
