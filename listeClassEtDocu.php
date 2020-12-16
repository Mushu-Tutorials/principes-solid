<?php

/**
 * Service de simulation d'échange monétaire
 * 
 * 1) A la création du service on defini une manière de créer la population
 * Il est possible de choisir le nombre d'individus
 * Au cours de la simulation il est possible de changer de protocole de transaction ainsi que la "portée" des échanges (entre proches ou non)
 */
class Service {

    /**
     * Population construite pour la simulation
     */
    private $population;

    /**
     * contructeur de population
     */
    private PopulationFactory $populationFactory;

    /**
     * Définition de la stratégie d'interaction
     */
    private InteractionStrategyInterface $interactionStrategy;

    /**
     * Définition de la stratégie de transaction
     */
    private TransactionStrategyInterface $transactionStrategyInterface;


    public function __construct(PopulationFactory $populationFactory) {
        $this->populationFactory = $populationFactory;
    }

    /**
     * Création de
     *
     * @param integer $populationSize
     * @return void
     */
    public function InitiatePopulation(int $populationSize)
    {
        $this->population = $this->populationFactory->createPopulation($populationSize);
    }


}

/**
 * Interface de Transaction
 * 
 * Contrat entre l'application et le programmeur :
 * Toute forme de transaction devra respecter les besoins définis au travers des signatures de cette interface.
 * 
 * Tout appel d'une transaction respectera "l'inversion de dépendance" (le D de SOLID)
 * Il suffit d'appeler ce fichier en lieu et place de l'implémentation garantissant ainsi :
 *  1. la permutabilité de multiples façon d'effectuer une transaction. 
 *  2. L'assurance que la transaction respectera le contrat defini.
 * 
 * @author Etienne Pradillon <epradillon@gmail.com> | Samir Founou <epradillon@gmail.com>
 */
interface TransactionStrategyInterface {

}
class FirstTransactionStrategy implements TransactionStrategyInterface{

}

interface InteractionStrategyInterface {

}
class FirstInteractionStrategy implements InteractionStrategyInterface{

}

interface PopulationFactoryInterface {
    public function createPopulation(int $populationSize): Array;
}

/**
 * Pour simplifier on a définie que la factory ne retournerait un array et non une instance d'objet Population
 * Si jamais on doit changer ce comportement il faudra le faire ici.
 */
class PopulationFactory implements PopulationFactoryInterface{
    
    public function setStrategy(string $distribution)
    {
        $this->populationFactory->setStrategy($distribution);
    }

    public function createPopulation(int $populationSize): Array
    {
        $population = [];
        $population[]= 500;
        return $population;
    }
}


interface DistribInterface {

}
class FirstDistribution implements DistribInterface {

}

