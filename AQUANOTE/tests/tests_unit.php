<!-- A JETER, uniquement la pour screen memoire "vendor\bin\phpunit .\tests\tests_unit.php"-->
<?php
require_once('src/lib/database.php');
require_once('src/models/user.php');
require_once('src/models/aquarium.php');

class tests_unit extends \PHPUnit\Framework\TestCase{
    protected $database;
    protected $userRepository;
    protected $aquariumRepository;
    // création des instances de services "Repository"
    protected function setUp(): void {
        $this->database = new Database();
        $this->userRepository = new UserRepository();
        $this->userRepository->set_database($this->database);
        $this->aquariumRepository = new AquariumRepository();
        $this->aquariumRepository->set_database($this->database);
    }
    /** TEST creation de user **/
    public function test_create_user(){
        $this->userRepository->createUser('mrTest@mrTest.fr', '12341234');
        $user = $this->userRepository->getUserByEmail('mrTest@mrTest.fr'); 
        $this->assertContainsOnlyInstancesOf( User::class, [$user]);
    }
    /** TEST creation de l'aquarium du user **/
    public function test_create_aquarium_by_id_user(){
        $user = $this->userRepository->getUserByEmail('mrTest@mrTest.fr'); 
        $this->aquariumRepository->createAquarium('aquariumName', $user->get_id_user());
        $aquarium = $this->aquariumRepository->getAquariumByNameAndIdUser('aquariumName', $user->get_id_user());
        $this->assertContainsOnlyInstancesOf( Aquarium::class,[$aquarium]);
    }
}