<?php

namespace QuejasBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * QuejaRespuesta
 *
 * @ORM\Table(name="queja_respuesta", indexes={@ORM\Index(name="IDX_842377D22AA9CCAA", columns={"queja_id"})})
 * @ORM\Entity
 */
class QuejaRespuesta
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="queja_respuesta_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="respuesta", type="text", nullable=false)
     */
    private $respuesta;

    /**
     * @var string
     *
     * @ORM\Column(name="observacion", type="text", nullable=true)
     */
    private $observacion;

    /**
     * @var boolean
     *
     * @ORM\Column(name="estado", type="boolean", nullable=true)
     */
    private $estado;

    /**
     * @var \Quejas
     *
     * @ORM\ManyToOne(targetEntity="Quejas")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="queja_id", referencedColumnName="id")
     * })
     */
    private $queja;



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
     * Set respuesta
     *
     * @param string $respuesta
     *
     * @return QuejaRespuesta
     */
    public function setRespuesta($respuesta)
    {
        $this->respuesta = $respuesta;

        return $this;
    }

    /**
     * Get respuesta
     *
     * @return string
     */
    public function getRespuesta()
    {
        return $this->respuesta;
    }

    /**
     * Set observacion
     *
     * @param string $observacion
     *
     * @return QuejaRespuesta
     */
    public function setObservacion($observacion)
    {
        $this->observacion = $observacion;

        return $this;
    }

    /**
     * Get observacion
     *
     * @return string
     */
    public function getObservacion()
    {
        return $this->observacion;
    }

    /**
     * Set estado
     *
     * @param boolean $estado
     *
     * @return QuejaRespuesta
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
     * Set queja
     *
     * @param \QuejasBundle\Entity\Quejas $queja
     *
     * @return QuejaRespuesta
     */
    public function setQueja(\QuejasBundle\Entity\Quejas $queja = null)
    {
        $this->queja = $queja;

        return $this;
    }

    /**
     * Get queja
     *
     * @return \QuejasBundle\Entity\Quejas
     */
    public function getQueja()
    {
        return $this->queja;
    }
}
