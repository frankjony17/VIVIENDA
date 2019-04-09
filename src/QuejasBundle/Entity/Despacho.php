<?php

namespace QuejasBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Despacho
 *
 * @ORM\Table(name="despacho", indexes={@ORM\Index(name="IDX_254BF5B3DE734E51", columns={"cliente_id"})})
 * @ORM\Entity
 */
class Despacho
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="despacho_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="asunto", type="string", length=128, nullable=false)
     */
    private $asunto;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_creacion", type="date", nullable=false)
     */
    private $fechaCreacion;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_culminacion", type="date", nullable=false)
     */
    private $fechaCulminacion;

    /**
     * @var \Cliente
     *
     * @ORM\ManyToOne(targetEntity="Cliente")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cliente_id", referencedColumnName="id")
     * })
     */
    private $cliente;

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
     * Set asunto
     *
     * @param string $asunto
     *
     * @return Despacho
     */
    public function setAsunto($asunto)
    {
        $this->asunto = $asunto;

        return $this;
    }

    /**
     * Get asunto
     *
     * @return string
     */
    public function getAsunto()
    {
        return $this->asunto;
    }

    /**
     * Set fechaCreacion
     *
     * @param \DateTime $fechaCreacion
     *
     * @return Despacho
     */
    public function setFechaCreacion($fechaCreacion)
    {
        $this->fechaCreacion = $fechaCreacion;

        return $this;
    }

    /**
     * Get fechaCreacion
     *
     * @return \DateTime
     */
    public function getFechaCreacion()
    {
        return $this->fechaCreacion;
    }

    /**
     * Set fechaCulminacion
     *
     * @param \DateTime $fechaCulminacion
     *
     * @return Despacho
     */
    public function setFechaCulminacion($fechaCulminacion)
    {
        $this->fechaCulminacion = $fechaCulminacion;

        return $this;
    }

    /**
     * Get fechaCulminacion
     *
     * @return \DateTime
     */
    public function getFechaCulminacion()
    {
        return $this->fechaCulminacion;
    }

    /**
     * Set cliente
     *
     * @param \QuejasBundle\Entity\Cliente $cliente
     *
     * @return Despacho
     */
    public function setCliente(\QuejasBundle\Entity\Cliente $cliente = null)
    {
        $this->cliente = $cliente;

        return $this;
    }

    /**
     * Get cliente
     *
     * @return \QuejasBundle\Entity\Cliente
     */
    public function getCliente()
    {
        return $this->cliente;
    }
}
