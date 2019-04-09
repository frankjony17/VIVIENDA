<?php

namespace QuejasBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * QuejaAcciones
 *
 * @ORM\Table(name="queja_acciones", uniqueConstraints={@ORM\UniqueConstraint(name="queja_acciones_nombre_key", columns={"nombre"})}, indexes={@ORM\Index(name="IDX_DC93F0A02A55BAA9", columns={"queja_respuesta_id"})})
 * @ORM\Entity
 */
class QuejaAcciones
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="queja_acciones_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=48, nullable=false)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="string", length=128, nullable=true)
     */
    private $descripcion;

    /**
     * @var \QuejaRespuesta
     *
     * @ORM\ManyToOne(targetEntity="QuejaRespuesta")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="queja_respuesta_id", referencedColumnName="id")
     * })
     */
    private $quejaRespuesta;



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
     * Set nombre
     *
     * @param string $nombre
     *
     * @return QuejaAcciones
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
     * Set descripcion
     *
     * @param string $descripcion
     *
     * @return QuejaAcciones
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set quejaRespuesta
     *
     * @param \QuejasBundle\Entity\QuejaRespuesta $quejaRespuesta
     *
     * @return QuejaAcciones
     */
    public function setQuejaRespuesta(\QuejasBundle\Entity\QuejaRespuesta $quejaRespuesta = null)
    {
        $this->quejaRespuesta = $quejaRespuesta;

        return $this;
    }

    /**
     * Get quejaRespuesta
     *
     * @return \QuejasBundle\Entity\QuejaRespuesta
     */
    public function getQuejaRespuesta()
    {
        return $this->quejaRespuesta;
    }
}
