<?php

	use Doctrine\Common\Collections\ArrayCollection;
	use Doctrine\ORM\Mapping as ORM;
	/**
	 * @ORM\Entity @ORM\Table(name="operations")
	**/
	class Operations
	{
		/** @ORM\Id @ORM\Column(type="integer") @ORM\GeneratedValue **/
		private $id;
		/** @ORM\Column(type="string") **/
		private $type_operation;
		/** @ORM\Column(type="integer") **/
		private $montant;
		/** @ORM\Column(type="datetime") **/
		private $date_operation;
		/**
		 * Many operations have one comptes. This is the owning side.
		 * @ORM\ManyToOne(targetEntity="Comptes", inversedBy="id_operation_source")
		 * @ORM\JoinColumn(name="id_compte_source", referencedColumnName="id")
		*/
		private $id_compte_source;
		/**
		 * Many operations have one comptes. This is the owning side.
		 * @ORM\ManyToOne(targetEntity="Comptes", inversedBy="id_operation_destinataire")
		 * @ORM\JoinColumn(name="id_compte_destinataire", referencedColumnName="id", nullable=true)
		*/
		private $id_compte_destinataire;
		


		public function __construct()
		{

		}

		//Définition des gett
		public function getId() { return $this->id; }
		public function getTypeOperation() { return $this->type_operation; }
		public function getMontant() { return $this->montant; }
		public function getDateOperation() { return $this->date_operation; }
		public function getIdCompteSource() { return $this->id_compte_source; }
		public function getIdCompteDestinataire() { return $this->id_compte_destinataire; }

		//Définition des Setteurs
		// public function setId($id) 
		// { 
		// 	$this->id = $id; 
		// }

		public function setTypeOperation($type_operation) 
		{ 
			$this->type_operation = $type_operation; 
		}

		public function setMontant($montant) 
		{ 
			$this->montant = $montant; 
		}

		public function setDateOperation($date_operation) 
		{ 
			$this->date_operation =  new \DateTime($date_operation); 
		}
		
		public function setIdCompteSource(Comptes $id_compte_source) 
		{ 
			$this->id_compte_source = $id_compte_source;
			return $this;
		}
		public function setIdCompteDestinataire(Comptes $id_compte_destinataire) 
		{ 
			$this->id_compte_destinataire = $id_compte_destinataire;
			return $this;
		}
	

	}