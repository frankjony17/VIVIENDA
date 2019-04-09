<?php
/**
 * Created by PhpStorm.
 * User: frank.ricardo
 * Date: 24/02/2016
 * Time: 17:12
 */

namespace CrudExtJSBundle\Template;


class ControllerPHPTemplate
{
    private $bundle;
    private $entity;
    private $route;
    private $util;
    private $information;

    /**
     * ControllerPHPTemplate constructor.
     *
     * @param $information
     * @param $util
     */
    public function __construct($information, $util)
    {
        $this->util = $util;
        $this->information = $information;
    }

    /**
     * Set Bundle name.
     *
     * @param $bundle
     * @return $this
     */
    public function setBundle($bundle)
    {
        $this->bundle = $bundle;

        return $this;
    }

    /**
     * Set Entity name.
     *
     * @param $entity
     * @return $this
     */
    public function setEntity($entity)
    {
        $this->entity = $entity;

        return $this;
    }

    /**
     * Set Route.
     *
     * @param $route
     * @return $this
     */
    public function setRoute($route)
    {
        $this->route = $route;

        return $this;
    }

    /**
     * Get Template Controller PHP.
     *
     * @param $templateContent
     * @return string
     */
    public function getControllerPHP($templateContent)
    {   /* Replace values */
        $templateContent = str_replace('BUNDLE', $this->bundle, $templateContent);
        $templateContent = str_replace('ENTITY', $this->entity, $templateContent);
        $templateContent = str_replace('ROUTE', $this->route, $templateContent);
        /* Get values */
        $values = $this->getValues();
        /* Replace values */
        $templateContent = str_replace('LIST_ARRAY', $values['list'], $templateContent);
        $templateContent = str_replace('ADD_SETS', $values['add'], $templateContent);
        $templateContent = str_replace('OTHERS', '', $templateContent);
        /* Return Template */
        return $templateContent;
    }

    /**
     * Get values for replace template Controller.php
     *
     * @return array
     */
    private function getValues()
    {
        $keyValues = "";
        $addValues = "";
        /* Each de column for database table  */
        foreach ($this->information as $value) {
            if ($this->util->isForeignKey($value['column_name'])) {
            $keyValues .= '
                \''. $value['column_name'] .'\' => $value->get'. $this->util->getEntityName($value['column_name']) .'()->get'. $this->util->getEntityName($this->getColumnName(substr($value['column_name'], 0, -3))) .'(), ';
            } else {
            $keyValues .= '
                \''. $value['column_name'] .'\' => $value->get'. $this->util->getName($value['column_name'], "") .'(), ';
            }
            /* Add an Edit values to replace in template */
            if ($value['column_name'] !== 'id') {
             /* Is foreign key */
                if ($this->util->isForeignKey($value['column_name'])) {
                    /* Get Entity name */
                    $entity = $this->util->getEntityName($value['column_name']);
                    /* Get Bundle name */
                    $bundle = $this->util->getBundleByFileName($value['column_name'], '/src/');
                    /* check if exist bundle */
                    $bundle = $bundle ? $bundle : $this->bundle;
        /* Add Sets method */
            $addValues .= '
        if (is_numeric($rq->get(\''. $value['column_name'] .'\'))) {
            $entity->set'. $entity .'($em->getRepository(\''. $bundle .':'. $entity .'\')->find($rq->get(\''. $value['column_name'] .'\')));
        }';
                } else {
            $addValues .= '
        $entity->set'. $this->util->getName($value['column_name'], "") .'($rq->get(\''. $value['column_name'] .'\'));';
                }
            }
        }
        return array(
            'list' => rtrim(trim($keyValues), ','),
            'add' => trim($addValues)
        );
    }

    /**
     * Net second column name
     *
     * @param $tableName
     * @return string
     */
    private function getColumnName($tableName)
    {
        $information = $this->util->getTableInformation($tableName);

        return ucwords($information[1]['column_name']);
    }
}