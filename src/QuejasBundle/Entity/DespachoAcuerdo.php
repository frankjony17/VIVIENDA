<?php

namespace QuejasBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DespachoAcuerdo
 *
 * @ORM\Table(name="despacho_acuerdo", uniqueConstraints={@ORM\UniqueConstraint(name="despacho_acuerdo_nombre_key", columns={"nombre"})}, indexes={@ORM\Index(name="IDX_FE279C9D299C08BC", columns={"despacho_id"})})
 * @ORM\Entity
 */
class DespachoAcuerdo
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="despacho_acuerdo_id_seq", allocationSize=1, initialValue=1)
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
     * @var \Despacho
     *
     * @ORM\ManyToOne(targetEntity="Despacho")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="despacho_id", referencedColumnName="id")
     * })
     */
    private $despacho;



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
     * @return DespachoAcuerdo
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
     * @return DespachoAcuerdo
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
     * Set despacho
     *
     * @param \QuejasBundle\Entity\Despacho $despacho
     *
     * @return DespachoAcuerdo
     */
    public function setDespacho(\QuejasBundle\Entity\Despacho $despacho = null)
    {
        $this->despacho = $despacho;

        return $this;
    }

    /**
     * Get despacho
     *
     * @return \QuejasBundle\Entity\Despacho
     */
    public function getDespacho()
    {
        return $this->despacho;
    }
}
