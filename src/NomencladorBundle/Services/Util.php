<?php

namespace NomencladorBundle\Services;

class Util
{
    private $em, $validator;
            
    function __construct($em, $validator)
    {
        $this->em = $em;
        $this->validator = $validator;
    }

    /**
     * A partir de un objeto devolver un arreglo con su contenido.
     * 
     * @param entity $entity Entidad a la que se le va aplicar el método.
     * 
     * @return array
     */
    public function toArray($entity)
    {
        $array = array();
        foreach ($entity as $obj) {
            $array[] = $obj->toArray();
        }
        return $array;
    }
    
    /**
     * Eliminar entidades a partir de un arreglo de IDs.
     * 
     * @param array         $ids Identificadores usados para obtener entidades a partir de estos.
     * @param entity        $namespace Namespace de la Entidad a la que se le va aplicar el método.
     * 
     * @return type
     */
    public function remove($ids, $namespace)
    {
        foreach (json_decode($ids) as $id){
            $en = $this->em->getRepository($namespace)->find($id);
            $this->em->remove($en);
        }
        return $this->em->flush();
    }
}
