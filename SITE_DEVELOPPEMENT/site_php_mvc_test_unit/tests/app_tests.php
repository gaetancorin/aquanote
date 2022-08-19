<?php
require_once('src/lib/database.php');
require_once('src/models/user.php');
require_once('src/models/aquarium.php');
require_once('src/models/type_analysis.php');
require_once('src/models/value_type_analysis.php');

class app_tests extends \PHPUnit\Framework\TestCase{
    // Attributs de app_tests représentant les méthodes des modèles connectés à la bdd
    protected $DatabaseConnection;
    protected $userRepository;
    protected $aquariumRepository;
    protected $typeAnalysisRepository;
    protected $valueTypeAnalysisRepository;

    // mise en place des attributs de app_tests
    protected function setUp(): void {
        $this->DatabaseConnection = new DatabaseConnection();
        $this->userRepository = new UserRepository();
        $this->userRepository->connection = $this->DatabaseConnection;
        $this->aquariumRepository = new AquariumRepository();
        $this->aquariumRepository->connection = $this->DatabaseConnection;
        $this->typeAnalysisRepository = new TypeAnalysisRepository();
		$this->typeAnalysisRepository->connection = $this->DatabaseConnection;
        $this->valueTypeAnalysisRepository = new ValueTypeAnalysisRepository();
        $this->valueTypeAnalysisRepository->connection = $this->DatabaseConnection;
    }

    //////// tests ///////

    // creation et suppression de user
    public function test_user_create_delete_getByEmail_getById(){
        $this->userRepository->createUser('mrTest@mrTest.fr', '12341234');
        $user = $this->userRepository->getUserByEmail('mrTest@mrTest.fr'); 
        $this->assertNotNull($user);

        $this->userRepository->deleteUserById($user->id_user);
        $notUser = $this->userRepository->getUserById($user->id_user);
        $this->assertNull($notUser);
    }

    // creation de user, de son aquarium avec ses types par defaut
    public function test_create_user_and_his_aquarium_with_his_defaults_types_analysis(){
        $this->userRepository->createUser('mrTest@mrTest.fr', '12341234');
        $user = $this->userRepository->getUserByEmail('mrTest@mrTest.fr'); 
        $this->assertContainsOnlyInstancesOf( User::class, [$user]);

        $this->aquariumRepository->createAquarium('aquariumName', $user->id_user);
        $aquarium = $this->aquariumRepository->getAquariumByNameAndIdUser('aquariumName', $user->id_user);
        $this->assertContainsOnlyInstancesOf( Aquarium::class, [$aquarium]);

        $this->typeAnalysisRepository->createDefaultTypesAnalysis($aquarium->id_aquarium);
        $typesAnalysis = $this->typeAnalysisRepository->getTypesAnalisysByIdAquarium($aquarium->id_aquarium);
        $this->assertContainsOnlyInstancesOf( TypeAnalysis::class, $typesAnalysis);
    }





    // suppresion de tous les tests en bdd grace à la suppression en cascade des users portant l'email mrTest
    public function test_remove_all_tests(){
        $this->userRepository->deleteUserByEmail('mrTest@mrTest.fr');
        $notUser = $this->userRepository->getUserByEmail('mrTest@mrTest.fr');
        $this->assertNull($notUser);
    }



}