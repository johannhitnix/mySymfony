<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;



/**
 * Usuario
 *
 * @ORM\Table(name="usuario")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UsuarioRepository")
 */
class Usuario
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="documento", type="string", length=20, unique=true)
     * @Assert\NotBlank()
     * @Assert\Type(
     *      type = "integer"
     * )
     * @Assert\Length(
     *      min = 2,      
     *      minMessage = "documento menor a {{ limit }} caracteres no es valido",
     *      
     * )
     * 
     */
    private $documento;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=40, nullable=true)
     * @Assert\NotBlank()
     * @Assert\Length(
     *  min = 2,
     *  max = 30,
     *  minMessage = "el nombre debe tener mas de {{ limit }}",     
     * )
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="apellido", type="string", length=40, nullable=true)
     * @Assert\NotBlank()
     * @Assert\Length(
     *  min = 2,
     *  max = 40,
     *  minMessage = "el apellido debe tener nas de {{limit}} caracteres"
     * )
     */
    private $apellido;

    /**
     * @var string
     *
     * @ORM\Column(name="correo", type="string", length=40)
     * @Assert\NotBlank()
     * @Assert\Email(
     *      message = "el correo '{{ value }}' no es valido",
     *      checkMX = true
     * )
     * @Assert\Length(
     *  max = 40
     * )
     */
    private $correo;
    
    /**
     * @ORM\ManyToOne(targetEntity="Rol")
     * @ORM\JoinColumn(name="rol_id", referencedColumnName="id")
     * @Assert\NotBlank()
     */
    private $rolId;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set documento
     *
     * @param string $documento
     *
     * @return Usuario
     */
    public function setDocumento($documento)
    {
        $this->documento = $documento;

        return $this;
    }

    /**
     * Get documento
     *
     * @return string
     */
    public function getDocumento()
    {
        return $this->documento;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     *
     * @return Usuario
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set apellido
     *
     * @param string $apellido
     *
     * @return Usuario
     */
    public function setApellido($apellido)
    {
        $this->apellido = $apellido;

        return $this;
    }

    /**
     * Get apellido
     *
     * @return string
     */
    public function getApellido()
    {
        return $this->apellido;
    }

    /**
     * Set correo
     *
     * @param string $correo
     *
     * @return Usuario
     */
    public function setCorreo($correo)
    {
        $this->correo = $correo;

        return $this;
    }

    /**
     * Get correo
     *
     * @return string
     */
    public function getCorreo()
    {
        return $this->correo;
    }

    /**
     * Set rolId
     *
     * @param \AppBundle\Entity\Rol $rolId
     *
     * @return Usuario
     */
    public function setRolId(\AppBundle\Entity\Rol $rolId = null)
    {
        $this->rolId = $rolId;

        return $this;
    }

    /**
     * Get rolId
     *
     * @return \AppBundle\Entity\Rol
     */
    public function getRolId()
    {
        return $this->rolId;
    }
}
