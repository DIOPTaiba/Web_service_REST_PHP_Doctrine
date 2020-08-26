<?php

	//use Doctrine\ORM\Annotation as ORM;
	use Doctrine\Common\Collections\ArrayCollection;
	use Doctrine\ORM\Mapping as ORM;


	/**
	 * @ORM\Entity @ORM\Table(name="clients")
	**/

	class Clients
	{
		/** @ORM\Id @ORM\Column(type="integer") @ORM\GeneratedValue **/
		private $id;
		/** @ORM\Column(type="string") **/
		private $adresse;
		/** @ORM\Column(type="string") **/
		private $telephone;
		/** @ORM\Column(type="string") **/
		private $email;
		/** @ORM\Column(type="datetime") **/
		private $date_inscription;
		/** @ORM\Column(type="string") **/
		private $type_client;
		/**
		 * Many clients have one responsable_compte. This is the owning side.
		 * @ORM\ManyToOne(targetEntity="ResponsableCompte", inversedBy="id_clients")
		 * @ORM\JoinColumn(name="id_responsable_compte", referencedColumnName="id")
		*/
		private $id_responsable_compte;
		/**
		 * One client has many comptes. This is the inverse side.
		 * @ORM\OneToMany(targetEntity="Comptes", mappedBy="id_clients")
		*/
		private $id_comptes;


		public function __construct()
		{
			$this->id_comptes = new ArrayCollection();
		}

		//Définition des gett
		public function getId() { return $this->id; }
		public function getAdresse() { return $this->adresse; }
		public function getTelephone() { return $this->telephone; }
		public function getEmail() { return $this->email; }
		public function getTypeClient() { return $this->type_client; }
		public function getDateInscription() { return $this->date_inscription; }
		public function getIdResponsableCompte() { return $this->id_responsable_compte; }

		//Définition des Setteurs
		// public function setId($id) 
		// { 
		// 	$this->id = $id; 
		// }

		public function setAdresse($adresse) 
		{ 
			$this->adresse = $adresse; 
		}

		public function setTelephone($telephone) 
		{ 
			$this->telephone = $telephone; 
		}

		public function setEmail($email) 
		{ 
			$this->email = $email; 
		}

		public function setTypeClient($type_client) 
		{ 
			$this->type_client = $type_client; 
		}

		public function setDateInscription($date_inscription) 
		{ 
			$this->date_inscription = new \DateTime($date_inscription); 
		}
		
		public function setIdResponsableCompte($id_responsable_compte) 
		{ 
			$this->id_responsable_compte = $id_responsable_compte; 
		}
	
	}