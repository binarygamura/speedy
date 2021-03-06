<?php namespace findus\modules\animal;



/**
 * Description of UpdateAnimalModule
 *
 * @author tierhilfe
 */
class UpdateAnimalModule extends \findus\common\AbstractModule {
    
    function __construct() {
        $this->requiredRole = \findus\model\User::USER;
    }
    
    public function execute() {
        
        if(filter_input(INPUT_POST, 'update_button')){
            $errors = [];
            $animalData = $_POST['animal'];
            
            //TODO: the following code looks very repetitive. perhaps we should refactor things here
            //and put code into functions.
            $animalData['id'] = isset($animalData['id']) ? intval(trim($animalData['id'])) : 0;
            if($animalData['id'] <= 0){
                $errors['id'] = "Bitte den Datensatz erst anlegen.";
            }

            $animalData['name'] = isset($animalData['name']) ? trim($animalData['name']) : "";
            if($animalData['name'] == ""){
                $errors['name'] = "Bitte geben Sie einen Namen an. (".$animalData['name'].")";
            }
            
            $animalData['species'] = isset($animalData['species']) ? intval(trim($animalData['species'])) : 0;
            if($animalData['species'] <= 0){
                $errors['species'] = "Bitte geben Sie die Tierart an.";
            }            
            
            $animalData['race'] = isset($animalData['race']) ? intval(trim($animalData['race'])) : 0;
            if($animalData['race'] <= 0){
                $errors['race'] = "Bitte geben Sie die Tierrasse an.";
            }
            
            $animalData['color'] = isset($animalData['color']) ? trim($animalData['color']) : "";
            if($animalData <= 0){
                $errors['color'] = "Bitte geben Sie die Färbung des Tieres an.";
            } else {
                $animalData['color'] = tolower($animalData['color']);
            }
            
            $animalData['attributes'] = isset($animalData['attributes']) ? trim($animalData['attributes']) : "";
            $animalData['chip'] = isset($animalData['chip']) ? trim($animalData['chip']) : "";            
            $animalData['tatoo'] = isset($animalData['tatoo']) ? trim($animalData['tatoo']) : "";
            $animalData['vaccinationCard'] = isset($animalData['vaccinationCard']) ? 1 : 0;
            $animalData['age'] = isset($animalData['age']) ? intval(trim($animalData['age'])) : 0;
            $animalData['sex'] = isset($animalData['sex']) ? trim($animalData['sex']) : "";
            if(!\findus\common\Util::isValidSex($animalData['sex'])){
                $errors['sex'] = "Bitte geben Sie das Geschlecht des Tieres an.";
            }
            
            $animalData['knownDiseases'] = isset($animalData['knownDiseases']) ? trim($animalData['knownDiseases']) : "";
            $animalData['generalState'] = isset($animalData['generalState']) ? trim($animalData['generalState']) : "";
            $animalData['behaviour'] = isset($animalData['behaviour']) ? trim($animalData['behaviour']) : "";
            $animalData['notes'] = isset($animalData['notes']) ? trim($animalData['notes']) : "";
            
            if(count($errors) > 0){
                $response = new \findus\common\JsonResponse($errors, 400);
            }
            else {
//                $id = \findus\controller\AnimalController::createNewAnimal($animalData);
                $response = new \findus\common\JsonResponse(["id" => $id]);
            }
        }
        else {
            
            $animalId = filter_input(INPUT_GET, 'animalId', FILTER_VALIDATE_INT);
            if($animalId === false){
                throw new \findus\common\ModuleException('Es wurde keine ID angegeben.');
            }
            $animal = \findus\controller\AnimalController::getAnimalById($animalId);
            $species = \findus\controller\SpeciesController::getSpeciesById($animal->species);
            $response = new \findus\common\TemplateResponse();
            $response->setValue('all_species', \findus\controller\SpeciesController::getAllSpecies());
            $response->setValue('all_races', \findus\controller\RaceController::getAllRacesFor($species->box()));
            $response->setValue('all_admissions', \findus\controller\AdmissionController::getAdmissionsByAnimalId($animalId));
            $response->setValue('all_departures', \findus\controller\DepartureController::getDeparturesByAnimalId($animalId));
//            print_r(\findus\controller\AdmissionController::getAdmissionsByAnimalId($animalId));
            if($animal->bundle_id){
                $response->setValue('bundle', \findus\controller\ImageBundleController::getBundleById($animal->bundle_id));
            }
            $response->setValue('animal', $animal);
            $response->addScript('add_animal.js');
            $response->addTemplateName("animal\add_animal.htpl");
//            print_r($animal);
        }
        return $response;
    }
}
