<?php
namespace findus\modules;

class ContactModule implements \findus\common\Module {
    
    public function execute() {
        $response = new \findus\common\TemplateResponse();
        $response->addTemplateName("page/contact.htpl");
        return $response;
    }
}