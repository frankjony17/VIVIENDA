<?php

namespace QuejasBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Quejas
 *
 * @ORM\Table(name="quejas", indexes={@ORM\Index(name="IDX_BCDC23DF981704E3", columns={"entrevista_id"}), @ORM\Index(name="IDX_BCDC23DF4CCCF1E1", columns={"quejas_tipo_id"})})
 * @ORM\Entity
 */
class Quejas
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="quejas_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha", type="date", nullable=false)
     */
    private $fecha;

    /**
     * @var boolean
     *
     * @ORM\Column(name="estado", type="boolean", nullable=true)
     */
    private $estado;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_culminacion", type="date", nullable=false)
     */
    private $fechaCulminacion;

    /**
     * @var \Entrevista
     *
     * @ORM\OneToOne(targetEntity="Entrevista", inversedBy="queja")
     * @ORM\JoinColumn(name="entrevista_id", referencedColumnName="id")
     */
    private $entrevista;

    /**
     * @var \NomencladorBundle\Entity\QuejasTipo
     *
     * @ORM\ManyToOne(targetEntity="\NomencladorBundle\Entity\QuejasTipo")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="quejas_tipo_id", referencedColumnName="id")
     * })
     */
    private $quejasTipo;

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
     * Set fecha
     *
     * @param \DateTime $fecha
     *
     * @return Quejas
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }

    /**
     * Get fecha
     *
     * @return \DateTime
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Set estado
     *
     * @param boolean $estado
     *
     * @return Quejas
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;

        return $this;
    }

    /**
     * Get estado
     *
     * @return boolean
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Set fechaCulminacion
     *
     * @param \DateTime $fechaCulminacion
     *
     * @return Quejas
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
     * Set entrevista
     *
     * @param \QuejasBundle\Entity\Entrevista $entrevista
     *
     * @return Quejas
     */
    public function setEntrevista(\QuejasBundle\Entity\Entrevista $entrevista = null)
    {
        $this->entrevista = $entrevista;

        return $this;
    }

    /**
     * Get entrevista
     *
     * @return \QuejasBundle\Entity\Entrevista
     */
    public function getEntrevista()
    {
        return $this->entrevista;
    }

    /**
     * Set quejasTipo
     *
     * @param \NomencladorBundle\Entity\QuejasTipo $quejasTipo
     *
     * @return Quejas
     */
    public function setQuejasTipo(\NomencladorBundle\Entity\QuejasTipo $quejasTipo = null)
    {
        $this->quejasTipo = $quejasTipo;

        return $this;
    }

    /**
     * Get quejasTipo
     *
     * @return \NomencladorBundle\Entity\QuejasTipo
     */
    public function getQuejasTipo()
    {
        return $this->quejasTipo;
    }
}
