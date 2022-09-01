<?php
require_once('src/lib/database.php');
require_once('src/models/user.php');
require_once('src/models/aquarium.php');
require_once('src/models/type_analysis.php');
require_once('src/models/value_type_analysis.php');
require_once('src/models/date_value_selector.php');
require_once('src/models/comment_analysis.php');

class app_tests extends \PHPUnit\Framework\TestCase{
    // Attributs de app_tests représentant les méthodes des modèles connectés à la bdd
    protected $DatabaseConnection;
    protected $userRepository;
    protected $aquariumRepository;
    protected $typeAnalysisRepository;
    protected $valueTypeAnalysisRepository;
    protected $dateValuesSelectorRepository;
    protected $commentAnalysisRepository;

    // mise en place des attributs de app_tests
    protected function setUp(): void {
        $this->DatabaseConnection = new DatabaseConnection();
        $this->userRepository = new UserRepository();
        $this->userRepository->set_connection($this->DatabaseConnection);
        $this->aquariumRepository = new AquariumRepository();
        $this->aquariumRepository->set_connection($this->DatabaseConnection);
        $this->typeAnalysisRepository = new TypeAnalysisRepository();
		$this->typeAnalysisRepository->set_connection($this->DatabaseConnection);
        $this->valueTypeAnalysisRepository = new ValueTypeAnalysisRepository();
        $this->valueTypeAnalysisRepository->set_connection($this->DatabaseConnection);
        $this->dateValuesSelectorRepository = new DateValuesSelectorRepository();
        $this->dateValuesSelectorRepository->set_connection($this->DatabaseConnection);
        $this->commentAnalysisRepository = new CommentAnalysisRepository();
        $this->commentAnalysisRepository->set_connection($this->DatabaseConnection);
    }

    //////// tests ///////

    /** creation de user **/
    public function test_create_user(){
        $this->userRepository->createUser('mrTest@mrTest.fr', '12341234');
        $user = $this->userRepository->getUserByEmail('mrTest@mrTest.fr'); 
        $this->assertContainsOnlyInstancesOf( User::class, [$user]);
    }
    /** récupération de l'user par l'email, puis par l'id de user **/
    public function get_user_by_email_or_by_id(){
        $user = $this->userRepository->getUserByEmail('mrTest@mrTest.fr'); 
        $this->assertNotNull($user);
        $User = $this->userRepository->getUserById($user->get_id_user());
        $this->assertNotNull($User);
    }


    /** creation de l'aquarium du user **/
    public function test_create_aquarium_by_id_user(){
        $user = $this->userRepository->getUserByEmail('mrTest@mrTest.fr'); 

        $this->aquariumRepository->createAquarium('aquariumName', $user->get_id_user());
        $this->aquariumRepository->createAquarium('aquariumName2', $user->get_id_user());
        $aquarium = $this->aquariumRepository->getAquariumByNameAndIdUser('aquariumName', $user->get_id_user());
        $this->assertContainsOnlyInstancesOf( Aquarium::class, [$aquarium]);
    }

    /** creation des types par defaut de l'aquarium du user **/
    public function test_create_defaults_types_analysis_by_id_aquarium(){
        $user = $this->userRepository->getUserByEmail('mrTest@mrTest.fr'); 
        $aquarium = $this->aquariumRepository->getAquariumByNameAndIdUser('aquariumName', $user->get_id_user());

        $this->typeAnalysisRepository->createDefaultTypesAnalysis($aquarium->get_id_aquarium());
        $typesAnalysis = $this->typeAnalysisRepository->getTypesAnalisysByIdAquarium($aquarium->get_id_aquarium());
        $this->assertContainsOnlyInstancesOf( TypeAnalysis::class, $typesAnalysis);
    }

    /** création de valeur de type d'analyse de l'aquarium de l'user **/
    public function test_create_value_types_analysis_by_id_type_analysis(){
        $user = $this->userRepository->getUserByEmail('mrTest@mrTest.fr');
        $aquarium = $this->aquariumRepository->getAquariumByNameAndIdUser('aquariumName', $user->get_id_user());
        $typesAnalysis = $this->typeAnalysisRepository->getTypesAnalisysByIdAquarium($aquarium->get_id_aquarium());
        // création des type_analysis
        $this->valueTypeAnalysisRepository->createValueTypeAnalysis('11.1', '2022-08-01', $typesAnalysis[0]->get_id_type_analysis());
        $this->valueTypeAnalysisRepository->createValueTypeAnalysis('22.2', '2022-08-02', $typesAnalysis[0]->get_id_type_analysis());
        $this->valueTypeAnalysisRepository->createValueTypeAnalysis('33.3', '2022-08-03', $typesAnalysis[0]->get_id_type_analysis());
        // récupération d'un type_analysis et test de classe d'instance
        $valueTypeAnalysis = $this->valueTypeAnalysisRepository->getValueTypeAnalysisByDateAnalysisAndIdTypeAnalysis('2022-08-01', $typesAnalysis[0]->get_id_type_analysis());
        $this->assertContainsOnlyInstancesOf( ValueTypeAnalysis::class, [$valueTypeAnalysis]);
    }

    /** modification de valeur de type d'analyse de l'aquarium de l'user **/
    public function test_update_value_types_analysis_by_date_and_id_type_analysis(){
        $user = $this->userRepository->getUserByEmail('mrTest@mrTest.fr');
        $aquarium = $this->aquariumRepository->getAquariumByNameAndIdUser('aquariumName', $user->get_id_user());
        $typesAnalysis = $this->typeAnalysisRepository->getTypesAnalisysByIdAquarium($aquarium->get_id_aquarium());
        // modification du value_type_analysis
        $this->valueTypeAnalysisRepository->updateValueTypeAnalysisByDateAnalysisAndIdTypeAnalysis( '33.4', '2022-08-03', $typesAnalysis[0]->get_id_type_analysis());
        // récupération du value_type_analysis
        $valueTypeAnalysis = $this->valueTypeAnalysisRepository->getValueTypeAnalysisByDateAnalysisAndIdTypeAnalysis('2022-08-03', $typesAnalysis[0]->get_id_type_analysis());
        // test d'existance d'instance et de valeur d'attribut
        $this->assertContainsOnlyInstancesOf( ValueTypeAnalysis::class, [$valueTypeAnalysis]);
        $this->assertSame('33.4', $valueTypeAnalysis->get_value_type_analysis());
    }
    /** suppression de valeur de type d'analyse de l'aquarium de l'user **/
    public function test_delete_value_types_analysis_by_date_and_id_type_analysis(){
        $user = $this->userRepository->getUserByEmail('mrTest@mrTest.fr');
        $aquarium = $this->aquariumRepository->getAquariumByNameAndIdUser('aquariumName', $user->get_id_user());
        $typesAnalysis = $this->typeAnalysisRepository->getTypesAnalisysByIdAquarium($aquarium->get_id_aquarium());
        //supression de l'instance et test de non existance
        $this->valueTypeAnalysisRepository->deleteValueTypeAnalysisByDateAnalysisAndIdTypeAnalysis('2022-08-03', $typesAnalysis[0]->get_id_type_analysis());
        // récupération du value_type_analysis et test de non existance
        $notValueTypeAnalysis = $this->valueTypeAnalysisRepository->getValueTypeAnalysisByDateAnalysisAndIdTypeAnalysis('2022-08-03', $typesAnalysis[0]->get_id_type_analysis());
        $this->assertNull($notValueTypeAnalysis);
    }

    /** création d'une liste d'instances de dateValuesSelector **/
    public function test_list_of_date_values_selector(){
        $user = $this->userRepository->getUserByEmail('mrTest@mrTest.fr');
        $aquarium = $this->aquariumRepository->getAquariumByNameAndIdUser('aquariumName', $user->get_id_user());
        // récupère une liste de dates ou il existe un value_type_analysis, puis assigne cette liste à l'attribut du repository
        $this->dateValuesSelectorRepository->getAllDatesWhereAreValuesTypesAnalysisByIdAquarium($aquarium->get_id_aquarium());
        // transforme cette liste en liste d'instances de DateValuesSelector ayant comme attribut une date, et comme autre attribut une liste d'instances de tous les type_analysis de cette aquarium contenant une instance de value_analysis si la valeur existe pour ce type_analysis et cette date
        $list_of_date_values_selector = $this->dateValuesSelectorRepository->DoListOfDatesContainsArrayTypesAnalysisObjectsWithValue($aquarium->get_id_aquarium());

        $this->assertContainsOnlyInstancesOf( DateValuesSelector::class, $list_of_date_values_selector);
    }

    /** création d'un comment_analysis relié a l'aquarium de l'user **/
    public function test_create_comment_analysis_by_id_aquarium(){
        $user = $this->userRepository->getUserByEmail('mrTest@mrTest.fr'); 
        $aquarium = $this->aquariumRepository->getAquariumByNameAndIdUser('aquariumName', $user->get_id_user());
        // création, récupération et test d'existance du coment_analysis
        $this->commentAnalysisRepository->createCommentAnalysis('un commentaire d\'analyse', '2022-08-01', $aquarium->get_id_aquarium());
        $comment_analysis = $this->commentAnalysisRepository->getCommentAnalysisByDateAnalysisAndIdAquarium('2022-08-01', $aquarium->get_id_aquarium());
        $this->assertContainsOnlyInstancesOf( CommentAnalysis::class, [$comment_analysis]);
    }
    /** update d'un comment_analysis relié a l'aquarium de l'user **/
    public function test_update_comment_analysis_by_id_aquarium(){
        $user = $this->userRepository->getUserByEmail('mrTest@mrTest.fr'); 
        $aquarium = $this->aquariumRepository->getAquariumByNameAndIdUser('aquariumName', $user->get_id_user());
        // update, récupération et test de modification
        $this->commentAnalysisRepository->updateCommentAnalysisByDateAnalysisAndIdAquarium('un commentaire d\'analyse modifié', '2022-08-01', $aquarium->get_id_aquarium());
        $update_comment_analysis = $this->commentAnalysisRepository->getCommentAnalysisByDateAnalysisAndIdAquarium('2022-08-01', $aquarium->get_id_aquarium());
        $this->assertSame('un commentaire d\'analyse modifié', $update_comment_analysis->get_comment_analysis());
    }
    /** delete d'un comment_analysis relié a l'aquarium de l'user **/
    public function test_delete_comment_analysis_by_id_aquarium(){
        $user = $this->userRepository->getUserByEmail('mrTest@mrTest.fr'); 
        $aquarium = $this->aquariumRepository->getAquariumByNameAndIdUser('aquariumName', $user->get_id_user());
        // delete, tentative de récupération et test de non-existence
        $this->commentAnalysisRepository->deleteCommentAnalysisByDateAnalysisAndIdAquarium('2022-08-01', $aquarium->get_id_aquarium());
        $notCommentAnalysis = $this->commentAnalysisRepository->getCommentAnalysisByDateAnalysisAndIdAquarium('2022-08-01', $aquarium->get_id_aquarium());
        $this->assertNull($notCommentAnalysis);
    }

    /** update du second aquarium du user **/
    public function test_update_aquarium_name_by_id(){
        $user = $this->userRepository->getUserByEmail('mrTest@mrTest.fr');
        $aquarium = $this->aquariumRepository->getAquariumByNameAndIdUser('aquariumName2', $user->get_id_user()); 
        // modification de l'aquarium, récupération et et test dee l'attribut modifié
        $this->aquariumRepository->updateNameAquariumById('aquariumName2Modifie', $aquarium->get_id_aquarium());
        $aquariumModifie = $this->aquariumRepository->getAquariumById($aquarium->get_id_aquarium());
        $this->assertSame('aquariumName2Modifie', $aquariumModifie->get_name_aquarium());
    }
    /** delete du second aquarium du user **/
    public function test_delete_aquarium_by_id(){
        $user = $this->userRepository->getUserByEmail('mrTest@mrTest.fr');
        $aquarium = $this->aquariumRepository->getAquariumByNameAndIdUser('aquariumName2Modifie', $user->get_id_user()); 
        // suppression de l'aquarium, tentative de récupération et test d'existance
        $this->aquariumRepository->deleteAquariumsById($aquarium->get_id_aquarium());
        $Notaquarium = $this->aquariumRepository->getAquariumById($aquarium->get_id_aquarium());
        $this->assertNull($Notaquarium);
    }


    // suppresion de tous les tests en bdd grace à la suppression en cascade des users portant l'email mrTest
    public function test_remove_user_with_all_tests_by_cascading(){
        $this->userRepository->deleteUserByEmail('mrTest@mrTest.fr');
        $notUser = $this->userRepository->getUserByEmail('mrTest@mrTest.fr');
        $this->assertNull($notUser);
    }



}