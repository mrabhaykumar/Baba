<?php

namespace Abhay\ApiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\ExecutionContext;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Abhay\ApiBundle\Entity\Ashram
 *
 * @ORM\Table(name="ashram")
 * @ORM\Entity()
 * @ORM\Entity(repositoryClass="AshramRepository")
 */
class Ashram
{
    /**
    *
    *  @ORM\Column(name="name", type="string", length=100, unique = true, nullable=false)
    *  @Assert\Length(min=1, max=100)
    */
   protected $name;
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
    *  @ORM\Column(name="address")
    *  @Assert\Length(min=1, max=100)
    */
   protected $address;
   
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
   public function setAddress($address)
   {
    $this->address = $address;
   }
   /**
     * Get PracticeId
     *
     * @return integer
     */

   public function getAddress()
   {
    return $this->address ;
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
            'address'=>$this->getAddress(),
            
        );

        return $data;

    }
    public function isEditableAttribute($attrSnake)
    {
        return in_array($attrSnake, array('name','address',));
    }
}
