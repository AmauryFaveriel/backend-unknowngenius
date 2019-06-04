#Routes

###People

>/api/people

Structure de donnée :

    [
      {
        "idpeople": 0,
        "name": "string",
        "firstname": "string",
        "birthday": "2019-06-04T15:02:51.498Z",
        "deathdate": "2019-06-04T15:02:51.498Z",
        "gender": "string",
        "idaffiliation": "string",
        "idcountry": "string",
        "idfamily": "string",
        "idprice": [
          {
            "idcategory": "string",
            "year": 0
          }
        ]
      }
    ]
    
Filter :

* gender: [ M | F | O ] avec M pour les hommes, F pour les femmes et O pour les organisations
* idcountry.code: Code international du pays voulu (FR pour France, US pour USA, etc...)

###Prizes

>/api/prices

Structure de donnée :

    [
      {
        "idprice": 0,
        "idcategory": "string",
        "year": 0,
        "idpeople": [
          {
            "name": "string",
            "firstname": "string",
            "birthday": "2019-06-04T15:02:51.620Z",
            "deathdate": "2019-06-04T15:02:51.620Z",
            "gender": "string",
            "idaffiliation": "string",
            "idcountry": "string",
            "idfamily": "string"
          }
        ]
      }
    ]
    
Filter: 

* year: Range filter, utiliser 'year[gt]={x}&year[lt]={y}' avec x et y en années, pour obtenir tous les prix entre x et y  
**Attention** x et y sont exclus du filtre
* idcategory.category: Choix de la catégorie du prix obtenu
* idpeople.gender: Voir **people** pour les filtres
* idpeople.idcountry.code: Voir **people** pour les filtres
  
**Attention** pour gender et idcountry.code avec price, il suffit qu'un seul des lauréats du prix soit de la nationalité
ou du sexe pour que celui-ci apparaisse, une personne ayant gagné 2 prix nobels différents apparaitra 2 fois, de même un
lauréats ne répondant pas aux critères demandés peut être retourné si il a gagné un prix en équipe avec un lauréat répondant
aux critères.