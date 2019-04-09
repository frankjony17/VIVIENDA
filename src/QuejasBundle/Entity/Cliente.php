<?php

namespace QuejasBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cliente
 *
 * @ORM\Table(name="cliente", uniqueConstraints={@ORM\UniqueConstraint(name="cliente_ci_key", columns={"ci"})}, indexes={@ORM\Index(name="IDX_F41C9B25521E1991", columns={"empresa_id"}), @ORM\Index(name="IDX_F41C9B2558BC1BE0", columns={"municipio_id"})})
 * @ORM\Entity
 */
class Cliente
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="cliente_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="ci", type="string", length=12, nullable=false)
     */
    private $ci;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=48, nullable=false)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="apellidos", type="string", length=48, nullable=false)
     */
    private $apellidos;

    /**
     * @var string
     *
     * @ORM\Column(name="calle", type="string", length=45, nullable=true)
     */
    private $calle;

    /**
     * @var string
     *
     * @ORM\Column(name="entre", type="string", length=45, nullable=true)
     */
    private $entre;

    /**
     * @var integer
     *
     * @ORM\Column(name="apartamento", type="integer", nullable=true)
     */
    private $apartamento;

    /**
     * @var integer
     *
     * @ORM\Column(name="edificio", type="integer", nullable=true)
     */
    private $edificio;

    /**
     * @var string
     *
     * @ORM\Column(name="casa", type="string", length=25, nullable=true)
     */
    private $casa;

    /**
     * @var string
     *
     * @ORM\Column(name="telefonos", type="string", length=78, nullable=true)
     */
    private $telefonos;

    /**
     * @var string
     *
     * @ORM\Column(name="correo", type="string", length=128, nullable=true)
     */
    private $correo;

    /**
     * @var \Empresa
     *
     * @ORM\ManyToOne(targetEntity="\NomencladorBundle\Entity\Empresa")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="empresa_id", referencedColumnName="id")
     * })
     */
    private $empresa;

    /**
     * @var \Municipio
     *
     * @ORM\ManyToOne(targetEntity="\NomencladorBundle\Entity\Municipio")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="municipio_id", referencedColumnName="id")
     * })
     */
    private $municipio;

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set ci
     *
     * @param string $ci
     *
     * @return Cliente
     */
    public function setCi($ci)
    {
        $this->ci = $ci;

        return $this;
    }

    /**
     * Get ci
     *
     * @return string
     */
    public function getCi()
    {
        return $this->ci;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     *
     * @return Cliente
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
     * Set apellidos
     *
     * @param string $apellidos
     *
     * @return Cliente
     */
    public function setApellidos($apellidos)
    {
        $this->apellidos = $apellidos;

        return $this;
    }

    /**
     * Get apellidos
     *
     * @return string
     */
    public function getApellidos()
    {
        return $this->apellidos;
    }

    /**
     * Set calle
     *
     * @param string $calle
     *
     * @return Cliente
     */
    public function setCalle($calle)
    {
        $this->calle = $calle;

        return $this;
    }

    /**
     * Get calle
     *
     * @return string
     */
    public function getCalle()
    {
        return $this->calle;
    }

    /**
     * Set entre
     *
     * @param string $entre
     *
     * @return Cliente
     */
    public function setEntre($entre)
    {
        $this->entre = $entre;

        return $this;
    }

    /**
     * Get entre
     *
     * @return string
     */
    public function getEntre()
    {
        return $this->entre;
    }

    /**
     * Set apartamento
     *
     * @param integer $apartamento
     *
     * @return Cliente
     */
    public function setApartamento($apartamento)
    {
        $this->apartamento = $apartamento;

        return $this;
    }

    /**
     * Get apartamento
     *
     * @return integer
     */
    public function getApartamento()
    {
        return $this->apartamento;
    }

    /**
     * Set edificio
     *
     * @param integer $edificio
     *
     * @return Cliente
     */
    public function setEdificio($edificio)
    {
        $this->edificio = $edificio;

        return $this;
    }

    /**
     * Get edificio
     *
     * @return integer
     */
    public function getEdificio()
    {
        return $this->edificio;
    }

    /**
     * Set casa
     *
     * @param string $casa
     *
     * @return Cliente
     */
    public function setCasa($casa)
    {
        $this->casa = $casa;

        return $this;
    }

    /**
     * Get casa
     *
     * @return string
     */
    public function getCasa()
    {
        return $this->casa;
    }

    /**
     * Set telefonos
     *
     * @param string $telefonos
     *
     * @return Cliente
     */
    public function setTelefonos($telefonos)
    {
        $this->telefonos = $telefonos;

        return $this;
    }

    /**
     * Get telefonos
     *
     * @return string
     */
    public function getTelefonos()
    {
        return $this->telefonos;
    }

    /**
     * Set correo
     *
     * @param string $correo
     *
     * @return Cliente
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
     * Set empresa
     *
     * @param \NomencladorBundle\Entity\Empresa $empresa
     *
     * @return Cliente
     */
    public function setEmpresa(\NomencladorBundle\Entity\Empresa $empresa = null)
    {
        $this->empresa = $empresa;

        return $this;
    }

    /**
     * Get empresa
     *
     * @return \NomencladorBundle\Entity\Empresa
     */
    public function getEmpresa()
    {
        return $this->empresa;
    }

    /**
     * Set municipio
     *
     * @param \NomencladorBundle\Entity\Municipio $municipio
     *
     * @return Cliente
     */
    public function setMunicipio(\NomencladorBundle\Entity\Municipio $municipio = null)
    {
        $this->municipio = $municipio;

        return $this;
    }

    /**
     * Get municipio
     *
     * @return \NomencladorBundle\Entity\Municipio
     */
    public function getMunicipio()
    {
        return $this->municipio;
    }
}
