<?php
/**
 * Created by PhpStorm.
 * User: frank.ricardo
 * Date: 24/02/2016
 * Time: 17:12
 */

namespace CrudExtJSBundle\Template;

class FormTemplate
{
    private $namespace;
    private $xtype;
    private $util;
    private $appName;
    private $tableName;
    private $bundle;
    private $url;

    /**
     * FormTemplate constructor.
     *
     * @param $appName
     * @param $tableName
     * @param $bundle
     * @param $util
     */
    public function __construct($appName, $tableName, $bundle, $util)
    {
        $this->appName = $appName;
        $this->tableName = $tableName;
        $this->bundle = $bundle;
        $this->util = $util;
    }

    /**
     * Set Namespase.
     *
     * @param mixed $namespace
     * @return $this
     */
    public function setNamespace($namespace)
    {
        $this->namespace = $namespace;

        return $this;
    }

    /**
     * Set Xtype.
     *
     * @param mixed $xtype
     * @return $this
     */
    public function setXtype($xtype)
    {
        $this->xtype = $xtype;

        return $this;
    }

    /**
     * Set Bundle name.
     *
     * @param $bundle
     * @param $tableName
     * @return $this
     */
    public function setUrl($bundle, $tableName)
    {
        $this->url = '../'. $bundle .'/'. $tableName .'/add-edit';

        return $this;
    }

    /**
     * Get Namespase.
     *
     * @return mixed
     */
    public function getNamespace()
    {
        return $this->namespace;
    }

    /**
     * Get code for Form JS.
     *
     * @param $tableInformation
     * @return mixed
     */
    public function getFormJs($tableInformation)
    {
        $itemCount = 1;
        $formTemplate = $this->util->getTemplateContent('FormTemplate'. $this->countElement($tableInformation) .'.js');
        /* Each every column in table from database */
        foreach ($tableInformation as $value) {
            /* Only different to id */
            if ($value['column_name'] !== 'id') {

                if ($itemCount >= 10) {
                    $temp = 'ITEMS:-'. $itemCount;
                } else {
                    $temp = 'ITEMS:'. $itemCount;
                }
                switch ($value['data_type']) {
                    case "real":
                        $formTemplate = str_replace($temp, $this->numberField($value), $formTemplate);
                        break;
                    case "date":
                        $formTemplate = str_replace($temp, $this->dateField($value), $formTemplate);
                        break;
                    case "text":
                        $formTemplate = str_replace($temp, $this->textAreaField($value), $formTemplate);
                        break;
                    case "integer":
                        $formTemplate = str_replace($temp, $this->getContent($value), $formTemplate);
                        break;
                    case "boolean":
                        $formTemplate = str_replace($temp, $this->booleanField($value), $formTemplate);
                        break;
                    case "character varying":
                        if ($value['character_maximum_length'] <= 128) {
                            $formTemplate = str_replace($temp, $this->textField($value), $formTemplate);
                        } else {
                            $formTemplate = str_replace($temp, $this->textAreaField($value), $formTemplate);
                        }
                        break;
                    default:
                        $formTemplate = str_replace($temp, $this->textField($value), $formTemplate);
                        break;
                }
                $itemCount++;
            }
        }
        $formTemplate = str_replace('NAMESPACE', $this->namespace, $formTemplate);
        $formTemplate = str_replace('XTYPE', 'form-'. $this->xtype, $formTemplate);
        $formTemplate = str_replace('WIDTH', 640, $formTemplate);
        $formTemplate = str_replace('URL', $this->url, $formTemplate);
        /* Return Form Template */
        return $formTemplate;
    }

    /**
     * Component text field.
     *
     * @param $value
     * @return mixed
     */
    private function textField($value)
    {
        $textField = $this->util->getTemplateContent('field/textfield');

        $textField = str_replace('FIELDLABEL', $this->util->getName($value['column_name'], " "), $textField);
        $textField = str_replace('NAME', $value['column_name'], $textField);
        $textField = str_replace('EMTYTEXT', $this->util->getName($value['column_name'], " "), $textField);
        $textField = str_replace('MAXLENGTH', $value['character_maximum_length'] - 2, $textField);
        $textField = str_replace('ALLOWBLANK', $value['is_nullable'] === 'YES' ? 'true' : 'false', $textField);
        $textField = str_replace('REQUIRED', $value['is_nullable'] === 'YES' ? 'false' : $this->getRequired(), $textField);

        return $textField;
    }

    /**
     * Component number field.
     *
     * @param $value
     * @return mixed
     */
    private function numberField($value)
    {
        $numberField = $this->util->getTemplateContent('field/numberfield');

        $numberField = str_replace('FIELDLABEL', $this->util->getName($value['column_name'], " "), $numberField);
        $numberField = str_replace('NAME', $value['column_name'], $numberField);
        $numberField = str_replace('ALLOWBLANK', $value['is_nullable'] === 'YES' ? 'true' : 'false', $numberField);
        $numberField = str_replace('REQUIRED', $value['is_nullable'] === 'YES' ? 'false' : $this->getRequired(), $numberField);

        return $numberField;
    }

    /**
     * Component date field.
     *
     * @param $value
     * @return mixed
     */
    private function dateField($value)
    {
        $dateField = $this->util->getTemplateContent('field/datefield');

        $dateField = str_replace('FIELDLABEL', $this->util->getName($value['column_name'], " "), $dateField);
        $dateField = str_replace('NAME', $value['column_name'], $dateField);
        $dateField = str_replace('ALLOWBLANK', $value['is_nullable'] === 'YES' ? 'true' : 'false', $dateField);
        $dateField = str_replace('REQUIRED', $value['is_nullable'] === 'YES' ? 'false' : $this->getRequired(), $dateField);

        return $dateField;
    }

    /**
     * Component text area field.
     *
     * @param $value
     * @return mixed
     */
    private function textAreaField($value)
    {
        $textAreaField = $this->util->getTemplateContent('field/textareafield');

        $textAreaField = str_replace('FIELDLABEL', $this->util->getName($value['column_name'], " "), $textAreaField);
        $textAreaField = str_replace('NAME', $value['column_name'], $textAreaField);
        $textAreaField = str_replace('MAXLENGTH', $value['character_maximum_length'] - 2, $textAreaField);
        $textAreaField = str_replace('ALLOWBLANK', $value['is_nullable'] === 'YES' ? 'true' : 'false', $textAreaField);
        $textAreaField = str_replace('REQUIRED', $value['is_nullable'] === 'YES' ? 'false' : $this->getRequired(), $textAreaField);

        return $textAreaField;
    }

    /**
     * Component Combo box field.
     *
     * @param $name
     * @param $namespace
     * @param $value
     * @return mixed
     */
    private function comboBox($name, $namespace, $value)
    {
        $comboBox = $this->util->getTemplateContent('field/combobox');

        $comboBox = str_replace('FIELDLABEL', $this->util->getName(substr($value['column_name'], 0, -3), " "), $comboBox);
        $comboBox = str_replace('EMTYTEXT', $this->util->getName(substr($value['column_name'], 0, -3), " "), $comboBox);
        $comboBox = str_replace('NAME', $value['column_name'], $comboBox);
        $comboBox = str_replace('STORESPASE', $namespace, $comboBox);
        $comboBox = str_replace('DISPLAYFIELD', $this->getValue($name), $comboBox);
        $comboBox = str_replace('ALLOWBLANK', $value['is_nullable'] === 'YES' ? 'true' : 'false', $comboBox);
        $comboBox = str_replace('REQUIRED', $value['is_nullable'] === 'YES' ? 'false' : $this->getRequired(), $comboBox);

        return $comboBox;
    }

    /**
     * Component boolean field.
     *
     * @param $value
     * @return mixed
     */
    private function booleanField($value)
    {
        $booleanField = $this->util->getTemplateContent('field/booleanfield');

        $booleanField = str_replace('FIELDLABEL', $this->util->getName($value['column_name'], " "), $booleanField);
        $booleanField = str_replace('EMTYTEXT', $this->util->getName($value['column_name'], " "), $booleanField);
        $booleanField = str_replace('NAME', $value['column_name'], $booleanField);
        $booleanField = str_replace('ALLOWBLANK', $value['is_nullable'] === 'YES' ? 'true' : 'false', $booleanField);
        $booleanField = str_replace('REQUIRED', $value['is_nullable'] === 'YES' ? 'false' : $this->getRequired(), $booleanField);

        return $booleanField;
    }

    /**
     * Generate store for form.
     *
     * @param $tableName
     * @return string
     */
    private function generateStore($tableName)
    {
        $store = new StoreTemplate();
        /* Get information from table on database */
        $value = $this->util->getTableInformation($tableName);
        $namespace = $this->appName .'.store.'. $this->util->getName($tableName, "") .'Store';
        /* Sets */
        $store->setNamespace($namespace);
        $store->setFields($value);
        $store->setSorters($value);
        $store->setUrl($this->bundle, $tableName);
        /* Writes content in file */
        $this->util->dumpFile(
            '/web/js/app/store/'. $this->util->getName($tableName, "") .'Store.js',
            $store->getStoreJs($this->util->getTemplateContent('StoreTemplate.js'))
        );
        /* Return namespace store */
        return $namespace;
    }

    /**
     * Generate controller PHP.
     *
     * @param $tableName
     */
    private function generateControllerPHP($tableName)
    {
        $controller = new ControllerPHPTemplate($this->util->getTableInformation($tableName), $this->util);
        $controller->setBundle($this->bundle);
        $controller->setEntity($this->util->getName($tableName, ""));
        $controller->setRoute($this->bundle .'/'. $tableName);
        /* Writes content in file */
        $this->util->dumpFile(
            '/src/'. $this->bundle .'Bundle/Controller/'. $this->util->getName($tableName, "") .'Controller.php',
            $controller->getControllerPHP($this->util->getTemplateContent('ControllerTemplate'))
        );
    }

    /**
     * Get content according to component.
     *
     * @param $value
     * @return mixed
     */
    private function getContent($value)
    {
        if ($this->util->isForeignKey($value['column_name'])) {
            return $this->comboBox(
                substr($value['column_name'], 0, -3),
                $this->findStore(substr($value['column_name'], 0, -3)),
                $value
            );
        } else {
            return $this->numberField($value);
        }
    }

    /**
     * Find store if exist.
     *
     * @param $tableName
     * @return string
     */
    private function findStore($tableName)
    {
        if (($file = $this->util->finder($this->util->getName($tableName, "") .'Store', '\\web\\js\\app\\store\\'))) {
            return rtrim($this->appName .'.store.'. $file, '.js');
        }

        $this->findControllerPHP($tableName);

        return $this->generateStore($tableName);
    }

    /**
     * Find controller PHP if exist.
     *
     * @param $tableName
     */
    private function findControllerPHP($tableName)
    {
        $controller = $this->util->finder($this->util->getName($tableName, "") .'Controller', '\\src\\');
        /* Exist controller? */
        if (!$controller) {
            $this->generateControllerPHP($tableName);
        }
    }

    /**
     * Get value for required component.
     *
     * @return string
     */
    private function getRequired()
    {
        return "['<span style=\"color:red; font-weight:bold\" data-qtip=\"Required\">*</span>']";
    }

    /**
     * Get value for display field on combobox
     *
     * @param $name
     * @return mixed
     */
    private function getValue($name)
    {
        $information = $this->util->getTableInformation($name);

        return $information[1]['column_name'];
    }

    /**
     * Count elements distinct to id column.
     *
     * @param $value
     * @return int
     */
    private function countElement($value)
    {
        $count = 0;
        /* Count elements distinct to id column */
        foreach ($value as $nformation) {
            if ($nformation['column_name'] !== 'id') {
                $count++;
            }
        }
        return $count;
    }
}