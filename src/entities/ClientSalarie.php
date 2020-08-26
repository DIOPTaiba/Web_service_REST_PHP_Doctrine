<?php

    //use Doctrine\Common\Collections\ArrayCollection;
    use Doctrine\ORM\Mapping as ORM;
    /**
     * @ORM\Entity @ORM\Table(name="client_salarie")
    **/
    class ClientSalarie
    {
        /** @ORM\Id @ORM\Column(type="integer") @ORM\GeneratedValue **/
        private $id;
        /** @ORM\Column(type="string") **/
        private $nom;
        /** @ORM\Column(type="string") **/
        private $prenom;
        /** @ORM\Column(type="string") **/
        private $carte_identite;
        /** @ORM\Column(type="string") **/
        private $profession;
        /** @ORM\Column(type="decimal") **/
        private $salaire;
        /** @ORM\Column(type="string") **/
        private $nom_employeur;
        /** @ORM\Column(type="string") **/
        private $adresse_entreprise;
        /** @ORM\Column(type="string") **/
        private $raison_social;
        /** @ORM\Column(type="string") **/
        private $identifiant_entreprise;
        /**
		 * One client salarie has One client.
		 * @ORM\OneToOne(targetEntity="Clients")
		 * @ORM\JoinColumn(name="id_clients", referencedColumnName="id")
		 */
        private $id_clients;

        public function __construct()
        {
            
        }

        //Définition des getteurs
        public function getId() { return $this->id; }
        public function getNom() { return $this->nom; }
        public function getPrenom() { return $this->prenom; }
        public function getCarteIdentite() { return $this->carte_identite; }
        public function getProfession() { return $this->profession; }
        public function getSalaire() { return $this->salaire; }
        public function getNomEmployeur() { return $this->nom_employeur; }
        public function getAdresseEntreprise() { return $this->adresse_entreprise; }
        public function getRaisonSocial() { return $this->raison_social; }
        public function getIdentifiantEntreprise() { return $this->identifiant_entreprise; }
        public function getIdClients() { return $this->id_clients; }

        //Définition des setteurs
        public function setId($id) 
        { 
            $this->id = $id; 
        }

        public function setNom($nom) 
        { 
            $this->nom = $nom; 
        }

        public function setPrenom($prenom) 
        { 
            $this->prenom = $prenom; 
        }

        public function setCarteIdentite($carte_identite) 
        { 
            $this->carte_identite = $carte_identite; 
        }

        public function setProfession($profession) 
        { 
            $this->profession = $profession; 
        }
        
        public function setSalaire($salaire) 
        { 
            $this->salaire = $salaire; 
        }
        
        public function setNomEmployeur($nom_employeur) 
        { 
            $this->nom_employeur = $nom_employeur; 
        }
        
        public function setAdresseEntreprise($adresse_entreprise) 
        { 
            $this->adresse_entreprise = $adresse_entreprise; 
        }
        
        public function setRaisonSocial($raison_social) 
        { 
            $this->raison_social = $raison_social; 
        }
        
        public function setIdentifiantEntreprise($identifiant_entreprise) 
        { 
            $this->identifiant_entreprise = $identifiant_entreprise; 
        }
        
        public function setIdClients($id_clients) 
        { 
            $this->id_clients = $id_clients; 
        }
    


    }