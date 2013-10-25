<?php 
class Tx_T3dKitecom_ViewHelpers_SelectViewHelper extends Tx_Fluid_ViewHelpers_Form_SelectViewHelper {
  /**
     * Render the tag.
     *
     * @return string rendered tag.
     * @api
     */
    public function render() {
        $name = $this->getName();
        if ($this->hasArgument('multiple')) {
            $name .= '[]';
        }

        $this->tag->addAttribute('name', $name);

        $options = $this->getOptions();
        if (empty($options)) {
            $options = array('' => '');
        }

        // rsys tca
        if(sizeof($options) == 1) {
           
            // loading tca with options like this: options="{tca:'fe_users'}
            if(array_key_exists('tca', $options)) {
               
                // get table name
                $tableName = $options['tca'];
               
                // load tca
                $GLOBALS['TSFE']->includeTCA();
                $tca = t3lib_div::loadTCA($tableName);
                $items = $GLOBALS['TCA'][$tableName]['columns'][$this->arguments['property']]['config']['items'];
               
                // clear options array tca:'xyz'
                //$options = array('' => '');
                $options = array();
               
                // get options
                foreach ($items as $value) {
                    $options[$value[1]]=$value[0];
                }
                if ($this->arguments['sortByOptionLabel']) {
                    asort($options);
                }
            }            
        }
        // rsys: end

        $this->tag->setContent($this->renderOptionTags($options));

        $this->setErrorClassAttribute();

        $content = '';

        // register field name for token generation.
        // in case it is a multi-select, we need to register the field name
        // as often as there are elements in the box
        if ($this->hasArgument('multiple') && $this->arguments['multiple'] !== '') {
            $content .= $this->renderHiddenFieldForEmptyValue();
            for ($i=0; $i<count($options); $i++) {
                $this->registerFieldNameForFormTokenGeneration($name);
            }
        } else {
            $this->registerFieldNameForFormTokenGeneration($name);
        }

        $content .= $this->tag->render();
        return $content;
    }

}

?>