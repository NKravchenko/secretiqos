<?php

namespace Affect\MiniWebBundle\View\Extension;

use Affect\Common\Enum\EnumInterface;
use Affect\MiniCoreBundle\Enum\AgencyType;
use Affect\MiniCoreBundle\Enum\CriteriaMatchType;
use Affect\MiniCoreBundle\Enum\RegisteredInProgramType;
use Affect\MiniCoreBundle\Enum\StatusType;
use Affect\MiniCoreBundle\Enum\TypeOfRecruitmentType;
use Affect\MiniCoreBundle\Enum\TypeOfSurveyType;
use Symfony\Component\HttpFoundation\RequestStack;

class CommonViewHelperExtension extends \Twig_Extension
{

    private $requestStack;

    public function __construct(RequestStack $requestStack)
    {
        $this->requestStack = $requestStack;
    }

    /**
     * Returns a list of functions to add to the existing list.
     *
     * @return array An array of functions
     */
    public function getFunctions()
    {
        return [
            new \Twig_SimpleFunction('numerals', array($this, 'numerals')),
            new \Twig_SimpleFunction('viewFormatedDate', array($this, 'getFormatedDate')),
            new \Twig_SimpleFunction('viewFormatedDateTime', array($this, 'getFormatedDateTime')),
            new \Twig_SimpleFunction('viewIsMobile', array($this, 'getIsMobile')),
            new \Twig_SimpleFunction('viewSmName', array($this, 'getSmName')),
            new \Twig_SimpleFunction('viewSmProfileUrl', array($this, 'getSmProfileUrl')),
            new \Twig_SimpleFunction('viewUserSmList', array($this, 'getUserSmList')),
            new \Twig_SimpleFunction('viewEnumReadableMap', array($this, 'getEnumReadableMap')),

            new \Twig_SimpleFunction('dPrint', array($this, 'getPrint')),
            new \Twig_SimpleFunction('dVardump', array($this, 'getVardump')),
        ];
    }

    public function getIsMobile()
    {
        $request = $this->requestStack->getCurrentRequest();

        return ('mobile' == $request->getRequestFormat()) ? true : false;
    }

    public function getSmName($sm)
    {
        switch ($sm) {
            case 'fb':
                return 'facebook';
                break;
            case 'ig':
                return 'instagram';
                break;
            case 'tw':
                return 'twitter';
                break;
        }

        return false;
    }

    public function getSmProfileUrl($sm, $smProfileId)
    {
        switch ($sm) {
            case 'fb':
                return 'https://www.facebook.com/' . $smProfileId;
                break;
            case 'ig':
                return 'http://instagram.com/' . $smProfileId;
                break;
            case 'tw':
                return 'https://twitter.com/' . $smProfileId;
                break;
        }

        return false;
    }

    /**
     * @param $enumTypeName
     *
     * @return array
     */
    public function getEnumReadableMap($enumTypeName)
    {
        //return $enumTypeName::getReadablesMap();

        switch($enumTypeName){
            case 'AgencyType':
                return AgencyType::getReadablesMap();
                break;
            case 'CriteriaMatchType':
                return CriteriaMatchType::getReadablesMap();
                break;
            case 'StatusType':
                return StatusType::getReadablesMap();
                break;
            case 'RegisteredInProgramType':
                return RegisteredInProgramType::getReadablesMap();
                break;
            case 'TypeOfSurveyType':
                return TypeOfSurveyType::getReadablesMap();
                break;
            case 'TypeOfRecruitmentType':
                return TypeOfRecruitmentType::getReadablesMap();
                break;
        }

        return [];
    }

    public function getPrint($var)
    {
        return "debug: " . print_r($var, 1);
    }

    public function getVardump($var)
    {
        var_dump($var);
        exit;
    }

    /**
     * Returns the name of the extension.
     *
     * @return string The extension name
     */
    public function getName()
    {
        return 'commonHelper';
    }
}
