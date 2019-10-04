<?php
/**
 * Created by PhpStorm.
 * User: sbk
 * Date: 02.10.2019
 * Time: 23:39
 */

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpClient\HttpClient;
use App\Entity\Forecastweather;
use Doctrine\ORM\EntityManager;
use Symfony\Component\Validator\Constraints\DateTime;

// api-key-random: 9453f12e-4723-4632-90d5-1fd42746dbfe

class ApiController extends AbstractController
{

    /**
     * @Route("/weather/forecast/show")
     */
    public function showData()
    {
        $number = random_int(0, 100);
        $this->dataOperationsFromForecastApi();


        $forecastDaysData = $this->getDoctrine()
            ->getRepository(Forecastweather::class)->findLatestForecastDays();


        return $this->render("weather/forecast.html.twig",[
            'data' => $forecastDaysData
        ]);

    }

    private function getDataFromForecastApi($url){
        $client = HttpClient::create();
        $response = $client->request('GET', $url);
        $statusCode = $response->getStatusCode();
        if($statusCode == 200){
            $content = $response->toArray();
            $dailyForecast=$content["DailyForecasts"];
            return $dailyForecast;
//            print_r($dailyForecast);

        }
        return [];
    }

    private function dataOperationsFromForecastApi(){
        $url = "http://dataservice.accuweather.com/forecasts/v1/daily/5day/178087?apikey=6r0dvIdZWwcpPq8SznDk0kvKiTR9TxdH";
        $content = $this->getDataFromForecastApi($url);
        $preparedData =  $this->dataPreparation($content);
        $this->insertData($preparedData);
    }

    private function dataPreparation($data){
        if($data != []){
            $preparedData = array();
            foreach ($data as $day){
                $preparedDayData = array(
                    "EpochDate" => $day["EpochDate"],
                    "TemperatureUnit" => $day["Temperature"]["Minimum"]["Unit"],
                    "TemperatureMin" => $day["Temperature"]["Minimum"]["Value"],
                    "TemperatureMax" => $day["Temperature"]["Maximum"]["Value"],
                    "DayPhrase" => $day["Day"]["IconPhrase"],
                    "NightPhrase" => $day["Night"]["IconPhrase"],
                );
                $preparedData[] = $preparedDayData;

            }

//            print_r($preparedData);
            return $preparedData;
        }
        return [];
    }

    private function insertData($data){
        if($data != []){
            $entityManager = $this->getDoctrine()->getManager();
            foreach ($data as $day){
                $forecastDayWeather = new Forecastweather();

                $forecastDayWeather->setEpochdate($day["EpochDate"]);
                $forecastDayWeather->setDayphrase($day["DayPhrase"]);
                $forecastDayWeather->setNightphrase($day["NightPhrase"]);
                $forecastDayWeather->setTemperaturemaxvalue($day["TemperatureMax"]);
                $forecastDayWeather->setTemperatureminvalue($day["TemperatureMin"]);
                $forecastDayWeather->setTemperatureunit($day["TemperatureUnit"]);
                $timestamp = time();
                $forecastDayWeather->setCreateddate($timestamp);

                $entityManager->persist($forecastDayWeather);
                $entityManager->flush();
            }
        }
        return [];

    }

}