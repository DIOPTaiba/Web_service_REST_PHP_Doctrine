<?php

	//use Doctrine\Common\Collections\ArrayCollection;
	use Doctrine\ORM\Mapping as ORM;
	/**
	 * @ORM\Entity @ORM\Table(name="client_non_salarie")
	**/
	class ClientNonSalarie
	{
		/** @ORM\Id @ORM\Column(type="integer") @ORM\GeneratedValue **/
		private $id;
		/** @ORM\Column(type="string") **/
		private $nom;
		/** @ORM\Column(type="string") **/
		private $prenom;
		/** @ORM\Column(type="string") **/
		private $carte_identite;
		/**
		 * One client non salarie has One client.
		 * @ORM\OneToOne(targetEntity="Clients")
		 * @ORM\JoinColumn(name="id_clients", referencedColumnName="id")
		 */
		private $id_clients;


		public function __construct(/*$nom, $prenom, $carte_identite, $id_clients*/)
		{


			// $this->nom = $nom;
			// $this->prenom = $prenom;
			// $this->carte_identite = $carte_identite;
			// $this->id_clients = $id_clients;
		}

		//Définition des getteurs
		public function getId() { return $this->id; }
		public function getNom() { return $this->nom; }
		public function getPrenom() { return $this->prenom; }
		public function getCarteIdentite() { return $this->carte_identite; }
		public function getIdClients() { return $this->id_clients; }

		// public function setId($id) 
		// { 
		// 	$this->id = $id; 
		// }

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

		public function setIdClients($id_clients) 
		{ 
			$this->id_clients = $id_clients; 
		}
	

	}