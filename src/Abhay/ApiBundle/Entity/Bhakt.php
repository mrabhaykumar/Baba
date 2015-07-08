<?php

namespace Practo\ApiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\ExecutionContext;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Abhay\ApiBundle\Entity\Bhakt
 *
 * @ORM\Table(name="Bhakt")
 * @ORM\Entity()
 * @ORM\Entity(repositoryClass="BhaktRepository")
 */
class Bhakt
{
    /**
    *
    *  @ORM\Column(name="name", type="string", length=100, unique = true, nullable=false)
    *  @Assert\Length(min=1, max=100)
    */
   protected $name;
    /**
    *
    *  @ORM\Column(name="id")
    *
    */
   protected $id;
    
   /**
    *
    *  @ORM\Column(name="email")
    *  @Assert\Length(min=1, max=100)
    */
   protected $email;
    /**
    *
    *  @ORM\Column(name="mobile")
    *
    */
   protected $mobile;
     /**
    *
    *  @ORM\Column(name="gender")
    *
    */
   protected $gender;
   
   /**
     * Set PracticeId
     *
     * @param integer $practiceId - Practice id
     */
   public function setName($name)
   {
    $this->name = $name;
   }
   /**
     * Get PracticeId
     *
     * @return integer
     */

   public function getName()
   {
    return $this->name ;
   }
   /**
     * Set PracticeId
     *
     * @param integer $practiceId - Practice id
     */
   public function setId($id)
   {
    $this->id = $id;
   }
   /**
     * Get PracticeId
     *
     * @return integer
     */

   public function getId()
   {
    return $this->id ;
   }
   /**
     * Set PracticeId
     *
     * @param integer $practiceId - Practice id
     */
   public function setEmail($email)
   {
    $this->email = $email;
   }
   /**
     * Get PracticeId
     *
     * @return integer
     */

   public function getEmail()
   {
    return $this->email ;
   }
   /**
     * Set PracticeId
     *
     * @param integer $practiceId - Practice id
     */
   public function setGender($gender)
   {
    $this->gender = $gender;
   }
   /**
     * Get PracticeId
     *
     * @return integer
     */

   public function getGender()
   {
    return $this->gender ;
   }
    /**
     * Set PracticeId
     *
     * @param integer $practiceId - Practice id
     */
   public function setMobile($mobile)
   {
    $this->mobile = $mobile;
   }
   /**
     * Get PracticeId
     *
     * @return integer
     */

   public function getMobile()
   {
    return $this->mobile ;
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
            'name'=>$this->getName(),
            'gender'=>$this->getGender(),
            'mobile'=>$this->getMobile(),
            'email' =>$this->getEmail(),
        );

        return $data;

    }
}
