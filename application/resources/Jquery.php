<?php
class Quickstart_Resource_Jquery extends ZendX_Application_Resource_Jquery
{

    public function init ()
    {
        $jquery = parent::init();
        $this->_view->jQuery()->addOnLoad("
	$('body').layout({
		applyDefaultStyles: true,
		west__size: 50,
		east__size: 50,
		south__size: 80,
		south__resizable: false,
		south__spacing_open: 0,
		south__spacing_closed: 20,
	});
");
        return $jquery;
    }
}
