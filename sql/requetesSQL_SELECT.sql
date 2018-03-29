#----------Recherche d'Activité

SELECT nomA FROM Activite GROUP BY nomA  #Domaine
SELECT typeA FROM Activite GROUP BY typeA  #Compétence dans le domaine
SELECT nomA,typeA FROM Activite GROUP BY nomA #Les Deux

#ID et Nom des Personnes avec le même horaire de dispo
-- À REVOIR
SELECT idPersonne, nomP
FROM personne
WHERE idPersonne IN (SELECT e1.idPersonne
					FROM etre_disponible as e1, etre_disponible as e2
					WHERE e1.idCalendrier = e2.idCalendrier and e1.idPersonne != e2.idPersonne
                    GROUP BY e1.idPersonne);
