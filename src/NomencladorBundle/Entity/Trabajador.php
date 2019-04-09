<?php

namespace NomencladorBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Trabajador
 *
 * @ORM\Table(name="trabajador", indexes={@ORM\Index(name="IDX_42157CDF5A91C08D", columns={"departamento_id"}), @ORM\Index(name="IDX_42157CDFE8CD94D9", columns={"trabajador_cargo_id"})})
 * @ORM\Entity
 */
class Trabajador
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="trabajador_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre_apellidos", type="string", length=128, nullable=false)
     */
    private $nombreApellidos;

    /**
     * @var \Departamento
     *
     * @ORM\ManyToOne(targetEntity="Departamento")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="departamento_id", referencedColumnName="id")
     * })
     */
    private $departamento;

    /**
     * @var \TrabajadorCargo
     *
     * @ORM\ManyToOne(targetEntity="TrabajadorCargo")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="trabajador_cargo_id", referencedColumnName="id")
     * })
     */
    private $trabajadorCargo;



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
     * Set nombreApellidos
     *
     * @param string $nombreApellidos
     *
     * @return Trabajador
     */
    public function setNombreApellidos($nombreApellidos)
    {
        $this->nombreApellidos = $nombreApellidos;

        return $this;
    }

    /**
     * Get nombreApellidos
     *
     * @return string
     */
    public function getNombreApellidos()
    {
        return $this->nombreApellidos;
    }

    /**
     * Set departamento
     *
     * @param \NomencladorBundle\Entity\Departamento $departamento
     *
     * @return Trabajador
     */
    public function setDepartamento(\NomencladorBundle\Entity\Departamento $departamento = null)
    {
        $this->departamento = $departamento;

        return $this;
    }

    /**
     * Get departamento
     *
     * @return \NomencladorBundle\Entity\Departamento
     */
    public function getDepartamento()
    {
        return $this->departamento;
    }

    /**
     * Set trabajadorCargo
     *
     * @param \NomencladorBundle\Entity\TrabajadorCargo $trabajadorCargo
     *
     * @return Trabajador
     */
    public function setTrabajadorCargo(\NomencladorBundle\Entity\TrabajadorCargo $trabajadorCargo = null)
    {
        $this->trabajadorCargo = $trabajadorCargo;

        return $this;
    }

    /**
     * Get trabajadorCargo
     *
     * @return \NomencladorBundle\Entity\TrabajadorCargo
     */
    public function getTrabajadorCargo()
    {
        return $this->trabajadorCargo;
    }
}
