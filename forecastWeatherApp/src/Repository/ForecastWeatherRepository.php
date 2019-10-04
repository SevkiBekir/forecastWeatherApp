<?php
//
//        $entityManager = $this->getEntityManager();
//
//        $query = $entityManager->createQuery(
//            'SELECT MAX(f.datacreated) as maxCreatedDate
//        FROM App\Entity\Forecastweather f'
//
//        );
//
//        // returns an array of Product objects
//        return $query->execute();

//select max(f.createdDate) from forecastWeather f
//        $qb = $this->createQueryBuilder("f");
//        $qb ->select("f.id")
//            ->where("f.id == 1")
//
//        //        $qb ->select("MAX(f.createdDate) as createdDate")
//            ->getQuery()
//            ->getSingleScalarResult();


//        return $this->createQueryBuilder('a')
//            ->select("MAX(CONVERT(int,a.createdDate )")
//            ->getQuery()
//            ->getSingleScalarResult();
/**
 * Created by PhpStorm.
 * User: sbk
 * Date: 04.10.2019
 * Time: 02:53
 */


namespace App\Repository;

use App\Entity\Forecastweather;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;


/**
 * @method Forecastweather|null find($id, $lockMode = null, $lockVersion = null)
 * @method Forecastweather|null findOneBy(array $criteria, array $orderBy = null)
 * @method Forecastweather[]    findAll()
 * @method Forecastweather[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ForecastWeatherRepository extends ServiceEntityRepository
{

    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Forecastweather::class);
    }

    public function findLatestForecastDays()
    {
        $maxTimeStamp = $this->findMaxTimeStamp();

        return $this->createQueryBuilder('f')
            ->andWhere('f.datacreated = :val')
            ->setParameter('val', $maxTimeStamp)
            ->getQuery()
            ->getResult();
    }


    public function findMaxTimeStamp()
    {
        return $this->createQueryBuilder('f')
            ->select("MAX(f.datacreated) as max")
            ->getQuery()
            ->getSingleScalarResult();



    }
}