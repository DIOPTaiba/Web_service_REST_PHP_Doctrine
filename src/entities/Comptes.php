<?php

	use Doctrine\Common\Collections\ArrayCollection;
	use Doctrine\ORM\Mapping as ORM;
	/**
	 * @ORM\Entity @ORM\Table(name="comptes")
	**/
	class Comptes
	{
		/** @ORM\Id @ORM\Column(type="integer") @ORM\GeneratedValue **/
		private $id;
		/** @ORM\Column(type="string") **/
		private $numero_compte;
		/** @ORM\Column(type="integer") **/
		private $cle_rib;
		/** @ORM\Column(type="decimal") **/
		private $solde;
		/** @ORM\Column(type="datetime") **/
		private $date_ouverture;
		/** @ORM\Column(type="integer") **/
		private $numero_agence;
		/**
		 * Many comptes have one client. This is the owning side.
		 * @ORM\ManyToOne(targetEntity="Clients", inversedBy="id_comptes")
		 * @ORM\JoinColumn(name="id_clients", referencedColumnName="id")
		*/
		private $id_clients;
		/**
		 * Many Comptes have Many etats.
		 * @ORM\ManyToMany(targetEntity="EtatCompte", inversedBy="id_comptes")
		 * @ORM\JoinTable(name="comptes_etats")
		 */
		private $id_etat_compte;
		/**
		 * One compte has many operation. This is the inverse side.
		 * @ORM\OneToMany(targetEntity="Operations", mappedBy="id_compte_source")
		*/
		private $id_operation_source;
		/**
		 * One compte has many operation. This is the inverse side.
		 * @ORM\OneToMany(targetEntity="Operations", mappedBy="id_compte_destinataire")
		*/
		private $id_operation_destinataire;


		public function __construct()
		{
			$this->id_etat_compte = new ArrayCollection();
			$this->id_operation_source = new ArrayCollection();
			$this->id_operation_destinataire = new ArrayCollection();
		}

		//Définition des gett
		public function getId() { return $this->id; }
		public function getNumeroCompte() { return $this->numero_compte; }
		public function getCleRib() { return $this->cle_rib; }
		public function getSolde() { return $this->solde; }
		public function getNumeroAgence() { return $this->numero_agence; }
		public function getDateOuverture() { return $this->date_ouverture; }
		public function getIdClients() { return $this->id_clients; }
		public function getIdEtatCompte() { return $this->id_etat_compte; }

		//Définition des Setteurs
		// public function setId($id) 
		// { 
		// 	$this->id = $id; 
		// }

		public function setNumero_compte($numero_compte) 
		{ 
			$this->numero_compte = $numero_compte; 
		}

		public function setCleRib($cle_rib) 
		{ 
			$this->cle_rib = $cle_rib; 
		}

		public function setSolde($solde) 
		{ 
			$this->solde = $solde; 
		}

		public function setNumeroAgence($numero_agence) 
		{ 
			$this->numero_agence = $numero_agence; 
		}

		public function setDateOuverture($date_ouverture) 
		{ 
			$this->date_ouverture =  new \DateTime($date_ouverture); 
		}
		
		public function setIdClients($id_clients) 
		{ 
			$this->id_clients = $id_clients; 
		}
		public function setIdEtatCompte(EtatCompte $id_etat_compte) 
		{ 
			$this->id_etat_compte[] = $id_etat_compte;
			return $this;
		}
	

	}