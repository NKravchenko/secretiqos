<?php

namespace Affect\MiniCoreBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as FOSUser;

/**
 * User
 * @ORM\Table(name="users")
 *
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="Affect\MiniCoreBundle\Repository\UserRepository")
 * @ORM\AttributeOverrides({ @ORM\AttributeOverride(name="email", column=@ORM\Column(nullable=true)), @ORM\AttributeOverride(name="emailCanonical", column=@ORM\Column(nullable=true, unique=false)) })
 */
class User extends FOSUser
{
    /**
     * @var integer
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     * @ORM\Column(name="full_name", type="string", length=255, nullable=true)
     */
    protected $fullName;

    /**
     * @var string
     * @ORM\Column(name="facebook_id", type="string", length=255, nullable=true)
     */
    protected $facebookId;

    /**
     * @var string
     * @ORM\Column(name="facebook_access_token", type="string", length=255, nullable=true)
     */
    protected $facebookAccessToken;

    /**
     * @var string
     * @ORM\Column(name="instagram_id", type="string", length=255, nullable=true)
     */
    protected $instagramId;

    /**
     * @var string
     * @ORM\Column(name="instagram_access_token", type="string", length=255, nullable=true)
     */
    protected $instagramAccessToken;

    /**
     * @var string
     * @ORM\Column(name="twitter_id", type="string", length=255, nullable=true)
     */
    protected $twitterId;

    /**
     * @var string
     * @ORM\Column(name="twitter_access_token", type="string", length=255, nullable=true)
     */
    protected $twitterAccessToken;

    /**
     * @ORM\ManyToMany(targetEntity="Affect\MiniCoreBundle\Entity\Response")
     * @ORM\JoinTable(name="user_responses",
     *      joinColumns={@ORM\JoinColumn(name="user_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="response_id", referencedColumnName="id")}
     * )
     */
    protected $responses;

//    /**
//     * @ORM\OneToMany(targetEntity="", mappedBy="user")
//     */
//    protected $;

    /**
     * имя пользователя который порекомендовал
     *
     * @ORM\Column(name="referrer_first_name", type="string", length=255)
     */
    protected $referrerFirstName;

    /**
     * @ORM\Column(name="first_name", type="string", length=255)
     */
    protected $firstName;

    /**
     * @ORM\Column(name="surname_name", type="string", length=255)
     */
    protected $surnameName;

    /**
     * @ORM\Column(name="mobile", type="string", length=32)
     */
    protected $mobile;

    /**
     * @ORM\Column(name="reffered", type="smallint", nullable=true)
     */
    protected $reffered;

    /**
     * @ORM\Column(name="match_criteria", type="smallint", nullable=true)
     */
    protected $matchCriteria;

    /**
     * @ORM\Column(name="status", type="smallint", nullable=true)
     */
    protected $status;

    /**
     * @ORM\Column(name="reg_in_programm", type="smallint", nullable=true)
     */
    protected $regInProgramm;

    /**
     * @ORM\Column(name="type_of_survey", type="smallint", nullable=true)
     */
    protected $typeOfSurvey;

    /**
     * @ORM\Column(name="type_of_recruitment", type="smallint", nullable=true)
     */
    protected $typeOfRecruitment;

    /**
     * @ORM\Column(name="created_at", type="datetime")
     */
    protected $createdAt;

//    /**
//     * @ORM\ManyToMany(targetEntity="Affect\MiniCoreBundle\Entity\Group")
//     * @ORM\JoinTable(name="fos_user_user_group",
//     *      joinColumns={@ORM\JoinColumn(name="user_id", referencedColumnName="id")},
//     *      inverseJoinColumns={@ORM\JoinColumn(name="group_id", referencedColumnName="id")}
//     * )
//     */
//    protected $groups;

//---------------------------

    public function __construct()
    {
        parent::__construct();
        $this->responses = new ArrayCollection();
        $this->createdAt = new \DateTime('now');
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set facebookId
     *
     * @param  string $facebookId
     *
     * @return User
     */
    public function setFacebookId($facebookId)
    {
        $this->facebookId = $facebookId;

        return $this;
    }

    /**
     * Get facebookId
     *
     * @return string
     */
    public function getFacebookId()
    {
        return $this->facebookId;
    }

    /**
     * Set fullName
     *
     * @param  string $fullName
     *
     * @return User
     */
    public function setFullName($fullName)
    {
        $this->fullName = $fullName;

        return $this;
    }

    /**
     * Get fullName
     *
     * @return string
     */
    public function getFullName()
    {
        return $this->fullName;
    }

    /**
     * Set facebookAccessToken
     *
     * @param  string $accessToken
     *
     * @return User
     */
    public function setFacebookAccessToken($accessToken)
    {
        $this->facebookAccessToken = $accessToken;

        return $this;
    }


    /**
     * Set instagramAccessToken
     *
     * @param  string $instagramAccessToken
     *
     * @return User
     */
    public function setInstagramAccessToken($instagramAccessToken)
    {
        $this->instagramAccessToken = $instagramAccessToken;

        return $this;
    }

    /**
     * Get instagramAccessToken
     *
     * @return string
     */
    public function getInstagramAccessToken()
    {
        return $this->instagramAccessToken;
    }

    /**
     * Set instagramId
     *
     * @param  string $instagramId
     *
     * @return User
     */
    public function setInstagramId($instagramId)
    {
        $this->instagramId = $instagramId;

        return $this;
    }

    /**
     * Get instagramId
     *
     * @return string
     */
    public function getInstagramId()
    {
        return $this->instagramId;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return (string)$this->fullName;
    }

    /**
     * @return string
     */
    public function getSocialNetwork()
    {
        if ($this->getFacebookId()) {
            return 'Facebook';
        } elseif ($this->getInstagramId()) {
            return 'Instagram';
        } elseif ($this->getTwitterId()) {
            return 'Twitter';
        }

        return '';
    }

    /**
     * @return bool|string
     */
    public function getSocialNetworkId()
    {
        if ($this->getFacebookId()) {
            return 'fb';
        } elseif ($this->getInstagramId()) {
            return 'ig';
        } elseif ($this->getTwitterId()) {
            return 'tw';
        }

        return false;
    }

    /**
     * @return bool|string
     */
    public function getSocialId()
    {
        if ($this->getFacebookId()) {
            return $this->getFacebookId();
        } elseif ($this->getInstagramId()) {
            return $this->getInstagramId();
        } elseif ($this->getTwitterId()) {
            return $this->getTwitterId();
        }

        return false;
    }

    public function getSocialprofileUrl()
    {
        if ($this->getFacebookId()) {
            return 'https://www.facebook.com/' . $this->getFacebookId();
        } elseif ($this->getInstagramId()) {
            return 'http://instagram.com/' . $this->getInstagramId();
        } elseif ($this->getTwitterId()) {
            return 'https://twitter.com/' . $this->getTwitterId();
        }

        return false;
    }

    /**
     * @return array
     */
    public function getSocialprofiles()
    {
        $smProfiles = [];

        if ($this->getFacebookId()) {
            $smProfiles['fb'] = $this->getFacebookId();
        }

        if ($this->getInstagramId()) {
            $smProfiles['ig'] = $this->getInstagramId();
        }

        if ($this->getTwitterId()) {
            $smProfiles['tw'] = $this->getTwitterId();
        }

        return $smProfiles;
    }

    public function toArray()
    {
        return array(
            'username' => $this->username,
            'fullName' => $this->fullName,
            'email'    => $this->email,
            'account'  => $this->getSocialNetwork(),
        );
    }

    /**
     * @return string
     */
    public function getTwitterId()
    {
        return $this->twitterId;
    }

    /**
     * @param string $twitterId
     */
    public function setTwitterId($twitterId)
    {
        $this->twitterId = $twitterId;
    }

    /**
     * @return string
     */
    public function getTwitterAccessToken()
    {
        return $this->twitterAccessToken;
    }

    /**
     * @param string $twitterAccessToken
     */
    public function setTwitterAccessToken($twitterAccessToken)
    {
        $this->twitterAccessToken = $twitterAccessToken;
    }

    /**
     * @return Response[]
     */
    public function getResponses()
    {
        return $this->responses;
    }

    /**
     * @param Response[] $responses
     */
    public function setResponses($responses)
    {
        $this->responses = $responses;
    }

    /**
     * @param Response $response
     */
    public function addResponse($response)
    {
        $this->responses[] = $response;
    }

    /**
     * @return mixed
     */
    public function getReferrerFirstName()
    {
        return $this->referrerFirstName;
    }

    /**
     * @param mixed $referrerFirstName
     */
    public function setReferrerFirstName($referrerFirstName)
    {
        $this->referrerFirstName = $referrerFirstName;
    }

    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param mixed $firstName
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    /**
     * @return mixed
     */
    public function getSurnameName()
    {
        return $this->surnameName;
    }

    /**
     * @param mixed $surnameName
     */
    public function setSurnameName($surnameName)
    {
        $this->surnameName = $surnameName;
    }

    /**
     * @return mixed
     */
    public function getMobile()
    {
        return $this->mobile;
    }

    /**
     * @param mixed $mobile
     */
    public function setMobile($mobile)
    {
        $this->mobile = $mobile;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getReffered()
    {
        return $this->reffered;
    }

    /**
     * @param mixed $reffered
     */
    public function setReffered($reffered)
    {
        $this->reffered = $reffered;
    }

    /**
     * @return mixed
     */
    public function getMatchCriteria()
    {
        return $this->matchCriteria;
    }

    /**
     * @param mixed $matchCriteria
     */
    public function setMatchCriteria($matchCriteria)
    {
        $this->matchCriteria = $matchCriteria;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return mixed
     */
    public function getRegInProgramm()
    {
        return $this->regInProgramm;
    }

    /**
     * @param mixed $regInProgramm
     */
    public function setRegInProgramm($regInProgramm)
    {
        $this->regInProgramm = $regInProgramm;
    }

    /**
     * @return mixed
     */
    public function getTypeOfSurvey()
    {
        return $this->typeOfSurvey;
    }

    /**
     * @param mixed $typeOfSurvey
     */
    public function setTypeOfSurvey($typeOfSurvey)
    {
        $this->typeOfSurvey = $typeOfSurvey;
    }

    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param mixed $createdAt
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }

    /**
     * @return mixed
     */
    public function getTypeOfRecruitment()
    {
        return $this->typeOfRecruitment;
    }

    /**
     * @param mixed $typeOfRecruitment
     */
    public function setTypeOfRecruitment($typeOfRecruitment)
    {
        $this->typeOfRecruitment = $typeOfRecruitment;
    }
}
