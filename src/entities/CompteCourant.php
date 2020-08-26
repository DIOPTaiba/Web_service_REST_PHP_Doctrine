<?php

	//use Doctrine\Common\Collections\ArrayCollection;
	use Doctrine\ORM\Mapping as ORM;
	/**
	 * @ORM\Entity @ORM\Table(name="compte_courant")
	**/
	class CompteCourant
	{
		/** @ORM\Id @ORM\Column(type="integer") @ORM\GeneratedValue **/
		private $id;
		/** @ORM\Column(type="decimal") **/
		private $agios;
		/**
		 * One compte bloque has One compte.
		 * @ORM\OneToOne(targetEntity="Comptes")
		 * @ORM\JoinColumn(name="id_comptes", referencedColumnName="id")
		 */
		private $id_comptes;


		public function __construct()
		{
			
		}

		//Définition des gett
		public function getId() { return $this->id; }
		public function getAgios() { return $this->agios; }
		public function getIdComptes() { return $this->id_comptes; }

		//Définition des Setteurs
		// public function setId($id) 
		// { 
		// 	$this->id = $id; 
		// }

		public function setAgios($agios) 
		{ 
			$this->agios = $agios; 
		}
		
		public function setIdComptes($id_comptes) 
		{ 
			$this->id_comptes = $id_comptes; 
		}
	
	}