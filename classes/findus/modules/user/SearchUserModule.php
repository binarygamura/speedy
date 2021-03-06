<?php

namespace findus\modules\user;

/**
 * Description of AddUserModule
 *
 * @author tierhilfe
 */
class SearchUserModule extends \findus\common\AbstractModule {
    
    function __construct() {
        $this->requiredRole = \findus\model\User::ADMIN;
    }
    
    public function execute() {
        $userName = filter_input(INPUT_POST, 'user_name');
        if(!$userName){
            throw new \findus\controller\ControllerException("Bitte geben Sie einen Namen an.");
            
        }
        \findus\controller\UserController::createNewUser(['user_name' => filter_input(INPUT_POST, 'user_name')]);
        $resonse = new \findus\common\JsonResponse();
        $resonse->setBody("{}");
        return $resonse;
    }
}
