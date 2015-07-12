<?php

namespace Abhay\ApiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\ExecutionContext;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Abhay\ApiBundle\Entity\Darshan
 *
 * @ORM\Table(name="darshan")
 * @ORM\Entity()
 * @ORM\Entity(repositoryClass="DarshanRepository")
 */
class Darshan
{
   
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
   protected $id;
    
  
    /**
    *
    *  @ORM\Column(name="bhakt_id")
    */
   protected $bhaktId;
   
    /**
    *
    *  @ORM\Column(name="baba_id")
    */
   protected $babaId;

    /**
    *
    *  @ORM\Column(name="start_time",type="datetime", nullable=false)
    */
   protected $startTime;

    /**
    *
    *  @ORM\Column(name="end_time",type="datetime", nullable=false)
    */
   protected $endTime;
   /**
     * Set PracticeId
     *
     * @param integer $practiceId - Practice id
     */
   public function setId($id)
   {
    $this->id = $id;
   }
   public function getId()
   {
    return $this->id ;
   }
   public function setBhaktId($id)
   {
    $this->bhaktId = $id;
   }
   public function getBhaktId()
   {
    return $this->bhaktId;
   }
   public function setBabaId($id)
   {
    $this->babaId = $id;
   }
   public function getBabaId()
   {
    return $this->babaId ;
   }public function setStartTime($time)
   {
    $this->startTime = new \DateTime($time);
   }
   public function getStartTime()
   {
    return $this->startTime ;
   }public function setEndTime($time)
   {
    $this->endTime = new \DateTime($time);
   }
   public function getEndTime()
   {
    return $this->endTime ;
   }

   public function setAttributes($attributes)
   {
        foreach ($attributes as $attrSnake => $value) {
            if ($this->isEditableAttribute($attrSnake)) {
                $attrCamel = str_replace(' ', '', ucwords(str_replace('_', ' ', $attrSnake)));
                $setter = 'set' . $attrCamel;
                try {
                    if ('' === $value) {
                        $value = null;
                    }
                    $this->$setter($value);
                } catch (NumberParseException $e) {
                    throw new ValidationError(array('mobile' => array('This value is not a valid mobile number')));
                } catch (BadAttributeException $e) {
                    throw $e;
                } catch (\Exception $e) {
                    throw new BadAttributeException($attrSnake);
                }
            } else {
                throw new BadAttributeException($attrSnake);
            }
        }

        return true;
    }

    /**
     * Serialise
     *
     * @return array
     */
    public function serialise()
    {
        $data = array(
            'id' =>$this->getId(),
            'baba_id'=>$this->getBabaId(),
            'bhakt_id'=>$this->getBhaktId(),
            'start_time'=>$this->getStartTime(),
            'end_time'=>$this->getEndTime(),
            
        );

        return $data;

    }
    public function isEditableAttribute($attrSnake)
    {
        return in_array($attrSnake, array('baba_id','bhakt_id','start_time', 'end_time',));
    }
}
