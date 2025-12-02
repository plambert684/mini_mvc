-- =============================
-- TABLE : categorie
-- =============================
CREATE TABLE categorie (
   id_categorie SERIAL PRIMARY KEY,
   nom VARCHAR(50) NOT NULL UNIQUE,
   description VARCHAR(255),
   image VARCHAR(255),
   created_at TIMESTAMP NOT NULL DEFAULT NOW(),
   updated_at TIMESTAMP NOT NULL DEFAULT NOW()
);

CREATE TABLE client (
    id_client SERIAL PRIMARY KEY,
    nom VARCHAR(50) NOT NULL,
    prenom VARCHAR(50) NOT NULL,
    email VARCHAR(50) UNIQUE NOT NULL,
    mdp VARCHAR(255) NOT NULL,
    adresse VARCHAR(100),
    ville VARCHAR(50),
    code_postal VARCHAR(10),
    created_at TIMESTAMP NOT NULL DEFAULT NOW(),
    updated_at TIMESTAMP NOT NULL DEFAULT NOW()
);

CREATE TABLE admin (
   id_admin SERIAL PRIMARY KEY,
   username VARCHAR(15) UNIQUE NOT NULL,
   email VARCHAR(50) UNIQUE NOT NULL,
   mdp VARCHAR(255) NOT NULL,
   role VARCHAR(50) NOT NULL CHECK(role IN ('super_admin','admin','moderator')),
   created_at TIMESTAMP NOT NULL DEFAULT NOW(),
   updated_at TIMESTAMP NOT NULL DEFAULT NOW()
);

CREATE TABLE produit (
     id_produit SERIAL PRIMARY KEY,
     nom VARCHAR(50) NOT NULL,
     description VARCHAR(255),
     prix DECIMAL(10,2) NOT NULL CHECK (prix > 0),
     stock SMALLINT NOT NULL DEFAULT 0 CHECK (stock >= 0),
     image VARCHAR(255),
     actif BOOLEAN DEFAULT TRUE,
     id_categorie INTEGER NOT NULL,
     created_at TIMESTAMP NOT NULL DEFAULT NOW(),
     updated_at TIMESTAMP NOT NULL DEFAULT NOW(),
     CONSTRAINT fk_produit_categorie
         FOREIGN KEY (id_categorie) REFERENCES categorie(id_categorie)
             ON DELETE CASCADE
             ON UPDATE CASCADE
);

CREATE INDEX idx_produit_categorie ON produit(id_categorie);

CREATE TABLE commande (
      id_commande SERIAL PRIMARY KEY,
      numero_commande VARCHAR(50) NOT NULL UNIQUE,
      statut VARCHAR(50) NOT NULL CHECK(statut IN ('en_attente','payee','annulee','expediee')),
      montant_total DECIMAL(10,2) NOT NULL CHECK(montant_total >= 0),
      adresse_livraison VARCHAR(100),
      ville_livraison VARCHAR(50),
      code_postal_livraison VARCHAR(10),
      date_commande TIMESTAMP NOT NULL DEFAULT NOW(),
      id_client INTEGER NOT NULL,
      created_at TIMESTAMP NOT NULL DEFAULT NOW(),
      updated_at TIMESTAMP NOT NULL DEFAULT NOW(),
      CONSTRAINT fk_commande_client
          FOREIGN KEY (id_client) REFERENCES client(id_client)
              ON DELETE SET NULL
              ON UPDATE CASCADE
);

CREATE INDEX idx_commande_client ON commande(id_client);

CREATE TABLE ligne_commande (
    id_ligne SERIAL PRIMARY KEY,
    quantite SMALLINT NOT NULL CHECK(quantite > 0),
    prix_unitaire DECIMAL(10,2) NOT NULL CHECK(prix_unitaire > 0),
    sous_total DECIMAL(10,2) NOT NULL CHECK(sous_total >= 0),
    id_commande INTEGER NOT NULL,
    id_produit INTEGER NOT NULL,
    created_at TIMESTAMP NOT NULL DEFAULT NOW(),
    updated_at TIMESTAMP NOT NULL DEFAULT NOW(),
    CONSTRAINT fk_ligne_commande
        FOREIGN KEY (id_commande) REFERENCES commande(id_commande)
            ON DELETE CASCADE
            ON UPDATE CASCADE,
    CONSTRAINT fk_ligne_produit
        FOREIGN KEY (id_produit) REFERENCES produit(id_produit)
            ON DELETE CASCADE
            ON UPDATE CASCADE
);

CREATE INDEX idx_ligne_commande_commande ON ligne_commande(id_commande);
CREATE INDEX idx_ligne_commande_produit ON ligne_commande(id_produit);
