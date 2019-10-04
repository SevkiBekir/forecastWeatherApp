<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Forecastweather
 *
 * @ORM\Table(name="forecastWeather")
 * @ORM\Entity(repositoryClass="App\Repository\ForecastWeatherRepository")
 */
class Forecastweather
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="epochDate", type="integer", nullable=false)
     */
    private $epochdate;

    /**
     * @var string
     *
     * @ORM\Column(name="temperatureUnit", type="string", length=1, nullable=false)
     */
    private $temperatureunit;

    /**
     * @var int
     *
     * @ORM\Column(name="temperatureMinValue", type="integer", nullable=false)
     */
    private $temperatureminvalue;

    /**
     * @var int
     *
     * @ORM\Column(name="temperatureMaxValue", type="integer", nullable=false)
     */
    private $temperaturemaxvalue;

    /**
     * @var string
     *
     * @ORM\Column(name="dayPhrase", type="string", length=100, nullable=false)
     */
    private $dayphrase;

    /**
     * @var int
     *
     * @ORM\Column(name="datacreated", type="integer", nullable=false)
     */
    private $datacreated;

    /**
     * @var string
     *
     * @ORM\Column(name="nightPhrase", type="string", length=100, nullable=false)
     */
    private $nightphrase;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEpochdate(): ?int
    {
        return $this->epochdate;
    }

    public function setEpochdate(int $epochdate): self
    {
        $this->epochdate = $epochdate;

        return $this;
    }

    public function getTemperatureunit(): ?string
    {
        return $this->temperatureunit;
    }

    public function setTemperatureunit(string $temperatureunit): self
    {
        $this->temperatureunit = $temperatureunit;

        return $this;
    }

    public function getTemperatureminvalue(): ?int
    {
        return $this->temperatureminvalue;
    }

    public function setTemperatureminvalue(int $temperatureminvalue): self
    {
        $this->temperatureminvalue = $temperatureminvalue;

        return $this;
    }

    public function getTemperaturemaxvalue(): ?int
    {
        return $this->temperaturemaxvalue;
    }

    public function setTemperaturemaxvalue(int $temperaturemaxvalue): self
    {
        $this->temperaturemaxvalue = $temperaturemaxvalue;

        return $this;
    }

    public function getDayphrase(): ?string
    {
        return $this->dayphrase;
    }

    public function setDayphrase(string $dayphrase): self
    {
        $this->dayphrase = $dayphrase;

        return $this;
    }

    public function getDatacreated(): ?int
    {
        return $this->datacreated;
    }

    public function setDatacreated(int $datacreated): self
    {
        $this->datacreated = $datacreated;

        return $this;
    }

    public function getNightphrase(): ?string
    {
        return $this->nightphrase;
    }

    public function setNightphrase(string $nightphrase): self
    {
        $this->nightphrase = $nightphrase;

        return $this;
    }


}
