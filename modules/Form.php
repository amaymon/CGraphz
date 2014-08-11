<?php
class Form{
    protected $action;
    protected $formtype;
    protected $enctype;
    protected $onsubmit = null;
    protected $items = array();
    
    public function __construct($formtype='', $action='', $enctype='', $onsubmit=''){
        $this->action = $action;
        $this->formtype = $formtype;
        $this->enctype = $enctype;
        $this->onsubmit = ' onSubmit="'.$onsubmit.'"';
        
        return $this;
    }
    
    public function add($entry, $value){
        switch($entry){
            case 'html': $this->items[] = $value; break;
            case 'text': $this->items[$value] = new InputText($this->formtype, $value);
                return $this->items[$value]; break;
            case 'password': $this->items[$value] = new InputPassword($this->formtype, $value);
                return $this->items[$value]; break;
            case 'hidden': $this->items[$value] = new InputHidden($this->formtype, $value);
                return $this->items[$value]; break;
            case 'textarea': $this->items[$value] = new Textarea($this->formtype, value);
                return $this->items[$value]; break;
            case 'submit': $this->items[$value] = new InputSubmit($this->formtype, $value);
                return $this->items[$value]; break;
            case 'select': $this->items[$value] = new Select($this->formtype, $value);
                return $this->items[$value]; break;
            case 'checkbox': $this->items[$value] = new InputCheckbox($this->formtype, $value);
                return $this->items[$value]; break;
            case 'radio': $this->items[$value] = new InputRadio($this->formtype, $value);
                return $this->items[$value]; break;
            default: return false; break;
        }
        return true;
    }
    
    /* Ici son comportement est spécifique à mon système d'entités-modèles */
    public function bindValues($entity){
        if($entity instanceof \Library\Model\Entity)
            $attributs = $entity->toArray();
        elseif(\is_array($entity))
            $attributs = $entity;
        else
            throw new \Library\Tiles\Exceptions\TileException('Le paramètre passé en argument doit être un objet de la classe \Library\Model\Entity ou un tableau.');
        
        foreach($this->items as $k=>$v){
            if($v instanceof field AND isset($attributs[$k]))
                $v->value($attributs[$k]);
        }
    }
    
    public function bindForm() {
        if(!empty($this->enctype)) $enctype .= 'enctype="'.$this->enctype.'"';
        else $enctype='';

        switch($this->formtype) {
            case 'horizontal':
                $formclass='form-horizontal';
            break;
            case 'inline':
                $formclass='form-inline';
            break;
            default:
                $formclass='';
            break;
        }

        $view = '<form role="form" class="'.$formclass.'" action="'.$this->action.'" method="POST" '.$this->onsubmit.' '.$enctype.'>';

        foreach($this->items as $output){
            if($output instanceof field)
                $view.= $output->buildField();
            else
                $view.= $output;
        }
            
        return $view.'</form><br/>';
    }
    
    public function printForm(){
        echo $this->bindForm();
    }
    
    public function __toString(){
        return $this->bindForm();
    }
}