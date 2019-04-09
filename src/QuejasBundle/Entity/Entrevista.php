<?php

namespace QuejasBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Entrevista
 *
 * @ORM\Table(name="entrevista", uniqueConstraints={@ORM\UniqueConstraint(name="entrevista_codigo_key", columns={"codigo"})}, indexes={@ORM\Index(name="IDX_5CDCAB2678ECAC4A", columns={"clasificacion_id"}), @ORM\Index(name="IDX_5CDCAB26DE734E51", columns={"cliente_id"}), @ORM\Index(name="IDX_5CDCAB26C08C5806", columns={"conformidad_id"}), @ORM\Index(name="IDX_5CDCAB26EC3656E", columns={"trabajador_id"})})
 * @ORM\Entity
 */
class Entrevista
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="entrevista_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha", type="date", nullable=false)
     */
    private $fecha;

    /**
     * @var string
     *
     * @ORM\Column(name="codigo", type="string", length=32, nullable=false)
     */
    private $codigo;

    /**
     * @var string
     *
     * @ORM\Column(name="asunto", type="text", nullable=true)
     */
    private $asunto;

    /**
     * @var string
     *
     * @ORM\Column(name="sintesis", type="text", nullable=true)
     */
    private $sintesis;

    /**
     * @var string
     *
     * @ORM\Column(name="tramites_realizados", type="text", nullable=true)
     */
    private $tramitesRealizados;

    /**
     * @var string
     *
     * @ORM\Column(name="concluciones", type="text", nullable=true)
     */
    private $concluciones;

    /**
     * @var string
     *
     * @ORM\Column(name="nivel_solucion", type="text", nullable=true)
     */
    private $nivelSolucion;

    /**
     * @var boolean
     *
     * @ORM\Column(name="expediente", type="boolean", nullable=true)
     */
    private $expediente;

    /**
     * @var \NomencladorBundle\Entity\Clasificacion
     *
     * @ORM\ManyToOne(targetEntity="\NomencladorBundle\Entity\Clasificacion")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="clasificacion_id", referencedColumnName="id")
     * })
     */
    private $clasificacion;

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
     * @var \NomencladorBundle\Entity\Conformidad
     *
     * @ORM\ManyToOne(targetEntity="\NomencladorBundle\Entity\Conformidad")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="conformidad_id", referencedColumnName="id")
     * })
     */
    private $conformidad;

    /**
     * @var \NomencladorBundle\Entity\Trabajador
     *
     * @ORM\ManyToOne(targetEntity="NomencladorBundle\Entity\Trabajador")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="trabajador_id", referencedColumnName="id")
     * })
     */
    private $trabajador;

    /**
     * @var \Quejas
     *
     * @ORM\OneToOne(targetEntity="Quejas", mappedBy="entrevista")
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
     * Set fecha
     *
     * @param \DateTime $fecha
     *
     * @return Entrevista
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
     * Set codigo
     *
     * @param string $codigo
     *
     * @return Entrevista
     */
    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;

        return $this;
    }

    /**
     * Get codigo
     *
     * @return string
     */
    public function getCodigo()
    {
        return $this->codigo;
    }

    /**
     * Set asunto
     *
     * @param string $asunto
     *
     * @return Entrevista
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
     * Set sintesis
     *
     * @param string $sintesis
     *
     * @return Entrevista
     */
    public function setSintesis($sintesis)
    {
        $this->sintesis = $sintesis;

        return $this;
    }

    /**
     * Get sintesis
     *
     * @return string
     */
    public function getSintesis()
    {
        return $this->sintesis;
    }

    /**
     * Set tramitesRealizados
     *
     * @param string $tramitesRealizados
     *
     * @return Entrevista
     */
    public function setTramitesRealizados($tramitesRealizados)
    {
        $this->tramitesRealizados = $tramitesRealizados;

        return $this;
    }

    /**
     * Get tramitesRealizados
     *
     * @return string
     */
    public function getTramitesRealizados()
    {
        return $this->tramitesRealizados;
    }

    /**
     * Set concluciones
     *
     * @param string $concluciones
     *
     * @return Entrevista
     */
    public function setConcluciones($concluciones)
    {
        $this->concluciones = $concluciones;

        return $this;
    }

    /**
     * Get concluciones
     *
     * @return string
     */
    public function getConcluciones()
    {
        return $this->concluciones;
    }

    /**
     * Set nivelSolucion
     *
     * @param string $nivelSolucion
     *
     * @return Entrevista
     */
    public function setNivelSolucion($nivelSolucion)
    {
        $this->nivelSolucion = $nivelSolucion;

        return $this;
    }

    /**
     * Get nivelSolucion
     *
     * @return string
     */
    public function getNivelSolucion()
    {
        return $this->nivelSolucion;
    }

    /**
     * Set expediente
     *
     * @param boolean $expediente
     *
     * @return Entrevista
     */
    public function setExpediente($expediente)
    {
        $this->expediente = $expediente;

        return $this;
    }

    /**
     * Get expediente
     *
     * @return boolean
     */
    public function getExpediente()
    {
        return $this->expediente;
    }

    /**
     * Set clasificacion
     *
     * @param \NomencladorBundle\Entity\Clasificacion $clasificacion
     *
     * @return Entrevista
     */
    public function setClasificacion(\NomencladorBundle\Entity\Clasificacion $clasificacion = null)
    {
        $this->clasificacion = $clasificacion;

        return $this;
    }

    /**
     * Get clasificacion
     *
     * @return \NomencladorBundle\Entity\Clasificacion
     */
    public function getClasificacion()
    {
        return $this->clasificacion;
    }

    /**
     * Set cliente
     *
     * @param \QuejasBundle\Entity\Cliente $cliente
     *
     * @return Entrevista
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

    /**
     * Set conformidad
     *
     * @param \NomencladorBundle\Entity\Conformidad $conformidad
     *
     * @return Entrevista
     */
    public function setConformidad(\NomencladorBundle\Entity\Conformidad $conformidad = null)
    {
        $this->conformidad = $conformidad;

        return $this;
    }

    /**
     * Get conformidad
     *
     * @return \NomencladorBundle\Entity\Conformidad
     */
    public function getConformidad()
    {
        return $this->conformidad;
    }

    /**
     * Set trabajador
     *
     * @param \NomencladorBundle\Entity\Trabajador $trabajador
     *
     * @return Entrevista
     */
    public function setTrabajador(\NomencladorBundle\Entity\Trabajador $trabajador = null)
    {
        $this->trabajador = $trabajador;

        return $this;
    }

    /**
     * Get trabajador
     *
     * @return \NomencladorBundle\Entity\Trabajador
     */
    public function getTrabajador()
    {
        return $this->trabajador;
    }

    /**
     * Set queja
     *
     * @param \QuejasBundle\Entity\Quejas $queja
     *
     * @return Entrevista
     */
    public function setQuejas(\QuejasBundle\Entity\Quejas $queja = null)
    {
        $this->queja = $queja;

        return $this;
    }

    /**
     * Get queja
     *
     * @return \QuejasBundle\Entity\Quejas
     */
    public function getQuejas()
    {
        return $this->queja;
    }
}
