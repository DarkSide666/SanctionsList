<?php
namespace sanctions\list\Model;

class Sanction extends \atk4\data\Model
{
    public $table = 'sanctions';

    public function init()
    {
        parent::init();

        $this->addField('list', ['required' => true]);
        $this->addField('type', ['required' => true, 'enum' => ['individual', 'entity']]);
        $this->addField('first_name');  // vārds
        $this->addField('last_name');   // uzvārds, nosaukums, reizēm pilns vārds utt.
        $this->addField('country');
        $this->addField('sync_time', ['type' => 'datetime', 'default' => $this->expr('NOW()')]);
    }
}
