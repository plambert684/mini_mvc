1. Pourquoi stocker le prix unitaire dans la table des lignes de commande plutôt que d'utiliser directement le prix du produit ?
   - Si on change le prix de l'article, le prix de la commande changera lui aussi. En stockant directement 
   - le prix unitaire dans la table des lignes de commande, on conserve l'historique des prix au moment de la commande.

2. Quelle stratégie avez-vous choisie pour gérer les suppressions ?
    - Cascade (ON DELETE CASCADE)
    - Permet de garder une cohérence dans la base de données en supprimant automatiquement les lignes associées lorsqu'une entité principale est supprimée.
   
3. Comment gérez-vous les stocks ?
    - Que se passe-t-il si un client commande un produit en rupture de stock ?
    - Quand le stock est-il décrémenté (panier, validation, paiement) ?
    - La gestion de stock c'est logique, en base de donnée on ne peut pas gérer ça. 
   
4. Avez-vous prévu des index ? Lesquels et pourquoi ?
    - CREATE INDEX idx_produit_categorie ON produit(id_categorie); / - Pour accélérer les recherches de produits par catégorie.
    - CREATE INDEX idx_commande_client ON commande(id_client); / - Pour accélérer les recherches de commandes par client.
    - CREATE INDEX idx_ligne_commande_commande ON ligne_commande(id_commande); / - Pour accélérer les recherches de lignes de commande par produit.
   
5. Comment assurez-vous l'unicité du numéro de commande ?
    - En utilisant la contrainte UNIQUE sur la colonne numero_commande (table commande).